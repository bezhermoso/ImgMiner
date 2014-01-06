<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Routine;


use Bez\Backlog\Entity\JobInterface;
use Bez\Backlog\Repository\RepositoryInterface;
use Bez\Backlog\Routine\RoutineInterface;
use Bez\Backlog\Routine\RoutineResult;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Bez\Backlog\Routine\RoutineEventInterface;

class MasterRoutine implements RoutineInterface, EventManagerAwareInterface
{

    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var RoutineInterface
     */
    protected $subRoutine;

    public function __construct(RepositoryInterface $repository, RoutineInterface $routine)
    {
        $this->repository = $repository;

        if ($routine === $this) {
            throw new \RuntimeException('Circular reference detected: Attempt to assign '
                                        . __CLASS__ . ' as its own sub-routine.');
        }

        $this->subRoutine = $routine;

    }

    /**
     * @return RepositoryInterface
     */
    public function getJobRepository()
    {
        return $this->repository;
    }

    /**
     * @param JobInterface $job
     * @return Result
     * @throws \Exception
     */
    public function process(JobInterface $job = null)
    {
        $eventManager = $this->getEventManager();

        $eventManager->attach(RoutineEventInterface::PROCESS, array($this, 'subRoutineProcess'), 100);

        $job = null;

        try {

            foreach ($this->getJobRepository()->findAll() as $job) {

                $params = array(
                    'Job' => $job
                );

                $results = $eventManager->triggerUntil(RoutineEventInterface::PROCESS, $this, $params, function ($response) {
                    if ($response instanceof RoutineResult) {
                        return $response->getStatus() == RoutineResult::STOP;
                    } else {
                        return true;
                    }
                });

                /** @var $lastResult RoutineResult|mixed */
                $lastResult = $results->last();
                $params['LastResult'] = $lastResult;

                if ($results->stopped()) {
                    $eventName = RoutineEventInterface::PROCESS_STOPPED;
                } elseif ($lastResult->getStatus() == RoutineResult::SUCCESS) {
                    $eventName = RoutineEventInterface::PROCESS_POST;
                } else {
                    $eventName = RoutineEventInterface::PROCESS_ERROR;
                }

                $eventManager->triggerUntil($eventName, $this, $params, function ($response) {
                    return !$response;
                });
            }

            $eventManager->triggerUntil(RoutineEventInterface::PROCESS_FINISHED, $this, array(), function ($response) {
                return !$response;
            });

        } catch (\Exception $e) {

            $params = array(
                'Job' => $job,
                'Exception' => $e,
            );

            $eventManager->triggerUntil(RoutineEventInterface::PROCESS_EXCEPTION, $this, $params, function ($response) {
                return !$response;
            });
        }
    }

    /**
     * @param RoutineEvent $event
     * @return RoutineResult
     */
    public function subRoutineProcess(RoutineEvent $event)
    {
        $job = $event->getJob();
        return $this->subRoutine->process($job);
    }

    /**
     * Inject an EventManager instance
     *
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
            'routines.*',
            'routines.' . $this->jobType,
        ));

        $eventManager->setEventClass('BezBacklogModule\Routine\RoutineEvent');

        $this->events = $eventManager;

        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager(new EventManager());
        }

        return $this->events;
    }
}
 
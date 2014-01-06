<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


use Bez\Backlog\Entity\JobInterface;
use Bez\Backlog\Repository\RepositoryInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class MasterRoutine implements RoutineInterface, EventManagerAwareInterface
{

    /**
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * @var string
     */
    protected $jobType;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var int|null
     */
    protected $limit;

    public function __construct(RepositoryInterface $repository, $jobType)
    {
        $this->repository = $repository;
        $this->jobType = $jobType;
    }

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
        // TODO: Implement getEventManager() method.
    }
}
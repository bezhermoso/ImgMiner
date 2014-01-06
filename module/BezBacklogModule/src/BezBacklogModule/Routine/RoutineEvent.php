<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Routine;


use Bez\Backlog\Routine\RoutineEventInterface;
use Bez\Backlog\Routine\RoutineResult;
use Zend\EventManager\Event;
use Bez\Backlog\Entity\JobInterface;

class RoutineEvent extends Event implements RoutineEventInterface
{
    /**
     * @return JobInterface|null
     */
    public function getJob()
    {
        return $this->getParam('Job');
    }

    /**
     * @param JobInterface $job
     */
    public function setJob(JobInterface $job)
    {
        $this->setParam('Job', $job);
    }

    /**
     * @return \Exception|null
     */
    public function getException()
    {
        return $this->getParam('Exception');
    }

    /**
     * @param \Exception $exception
     */
    public function setException(\Exception $exception)
    {
        $this->setParam('Exception', $exception);
    }

    public function setLastResult($result)
    {
        $this->setParam('LastResult', $result);
    }

    /**
     * @return mixed|RoutineResult
     */
    public function getLastResult()
    {
        return $this->getParam('LastResult');
    }
}
 
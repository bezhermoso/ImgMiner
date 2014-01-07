<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Routine;


use Bez\Backlog\Entity\Job;
use Bez\Backlog\Entity\JobInterface;
use Bez\Backlog\Routine\RoutineInterface;
use Bez\Backlog\Routine\RoutineResult;

class InMemory implements RoutineInterface
{

    /**
     * @param JobInterface $job
     * @return RoutineResult
     * @throws \Exception
     */
    public function process(JobInterface $job)
    {
        var_dump($job);
        return new RoutineResult(RoutineResult::SUCCESS, $job);
    }
}
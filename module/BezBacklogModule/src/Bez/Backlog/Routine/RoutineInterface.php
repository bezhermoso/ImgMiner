<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


use Bez\Backlog\Entity\JobInterface;

interface RoutineInterface
{
    /**
     * @param JobInterface $job
     * @return RoutineResult
     * @throws \Exception
     */
    public function process(JobInterface $job);
}

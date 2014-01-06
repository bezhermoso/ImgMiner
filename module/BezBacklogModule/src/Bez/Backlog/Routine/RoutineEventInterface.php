<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


use Bez\Backlog\Entity\JobInterface;

interface RoutineEventInterface
{
    const PROCESS_POST = 'process.post';

    const PROCESS = 'process';

    const PROCESS_STOPPED = 'process.stopped';

    const PROCESS_ERROR = 'process.error';

    const PROCESS_EXCEPTION = 'process.exception';

    const PROCESS_FINISHED = 'process.finished';

    /**
     * @return JobInterface
     */
    public function getJob();

    /**
     * @param JobInterface $job
     * @return void
     */
    public function setJob(JobInterface $job);

    /**
     * @return \Exception
     */
    public function getException();

    /**
     * @param \Exception $exception
     * @return void
     */
    public function setException(\Exception $exception);

    public function setLastResult($result);

    /**
     * @return mixed|RoutineResult
     */
    public function getLastResult();
}
 
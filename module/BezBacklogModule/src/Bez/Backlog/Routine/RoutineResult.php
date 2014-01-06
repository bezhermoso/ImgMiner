<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


use Bez\Backlog\Entity\JobInterface;

class RoutineResult
{
    const SUCCESS = 1;

    const FAILURE = 0;

    const STOP = -1;

    protected $status;

    protected $job;

    protected $messages;

    protected $params;

    public function __construct($status, JobInterface $job = null, $messages = null)
    {
        $this->status = $status;

        if (null !== $job) {
            $this->job = $job;
        }

        if (null !== $messages) {
            $this->messages = is_array(messages) ? $messages : array($messages);
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getJob()
    {
        return $this->job;
    }
} 
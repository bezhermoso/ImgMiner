<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Repository;


use Bez\Backlog\Entity\Job;
use Bez\Backlog\Entity\JobInterface;
use Bez\Backlog\Repository\RepositoryInterface;

class InMemory implements RepositoryInterface
{

    protected $jobs;

    /**
     * @return array|JobInterface[]
     */
    public function findAll()
    {
        return $this->getJobs();
    }

    protected function getJobs()
    {
        if (null === $this->jobs) {

            $this->jobs = array();

            for ($i = 1; $i <= 10; $i++) {

                $job = new Job();
                $job->setId($i)
                    ->setType('foo');

                $this->jobs[$i] = $job;
            }
        }

        return $this->jobs;
    }

    /**
     * @param JobInterface $job
     * @return void
     */
    public function save(JobInterface $job)
    {

    }

    /**
     * @param JobInterface $job
     * @return void
     */
    public function remove(JobInterface $job)
    {
        // TODO: Implement remove() method.
    }
}
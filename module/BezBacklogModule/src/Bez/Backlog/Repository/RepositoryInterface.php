<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Repository;


use Bez\Backlog\Entity\JobInterface;

interface RepositoryInterface
{
    /**
     * @return array|JobInterface[]
     */
    public function findAll();

    /**
     * @param JobInterface $job
     * @return void
     */
    public function save(JobInterface $job);

    /**
     * @param JobInterface $job
     * @return void
     */
    public function remove(JobInterface $job);

}

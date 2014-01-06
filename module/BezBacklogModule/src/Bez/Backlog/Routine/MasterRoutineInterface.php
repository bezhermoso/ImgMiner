<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


use Bez\Backlog\Repository\RepositoryInterface;

interface MasterRoutineInterface extends RoutineInterface
{
    /**
     * @return RepositoryInterface
     */
    public function getJobRepository();

    /**
     * @return RoutineInterface
     */
    public function getSubRoutine();
}
 
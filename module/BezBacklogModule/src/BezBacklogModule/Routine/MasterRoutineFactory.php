<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Routine;

use Bez\Backlog\Routine\Manager\ManagerInterface as RoutineManager;
use Bez\Backlog\Repository\Manager\ManagerInterface as RepositoryManager;
use Bez\Backlog\Routine\MasterRoutineFactoryInterface;

class MasterRoutineFactory implements MasterRoutineFactoryInterface
{
    protected $repositories;

    protected $routines;

    public function __construct(RepositoryManager $repositories, RoutineManager $routines)
    {
        $this->repositories = $repositories;
        $this->routines = $routines;
    }
    /**
     * @param string $type
     * @return MasterRoutine
     */
    public function createMasterRoutineForType($type)
    {
        $repository = $this->repositories->getRepository($type);
        $routine = $this->routines->getRoutine($type);

        return new MasterRoutine($repository, $routine);
    }
}

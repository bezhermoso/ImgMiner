<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine\Manager;


use Bez\Backlog\Routine\Exception\RoutineNotFoundException;
use Bez\Backlog\Routine\RoutineInterface;

interface ManagerInterface
{
    /**
     * @param $name
     * @return RoutineInterface
     * @throws RoutineNotFoundException
     */
    public function getRoutine($name);
}
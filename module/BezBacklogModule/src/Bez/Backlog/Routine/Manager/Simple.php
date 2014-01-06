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

class Simple implements ManagerInterface
{
    /**
     * @var array|RoutineInterface[]
     */
    protected $routines = array();

    public function __construct(array $routines = null)
    {
        if (null !== $routines) {
            foreach ($routines as $name => $routine) {
                $this->setRoutine($name, $routine);
            }
        }
    }

    public function setRoutine($name, RoutineInterface $routine)
    {
        $this->routines[$name] = $routine;
    }

    /**
     * @param $name
     * @return RoutineInterface
     */
    public function getRoutine($name)
    {
        if (!isset($this->routines[$name])) {
            throw new RoutineNotFoundException(sprintf('No routine found for name "%s".', $name));
        }

        return $this->routines[$name];
    }
}
 
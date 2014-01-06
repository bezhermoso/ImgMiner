<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Routine;


interface MasterRoutineFactoryInterface
{
    /**
     * @param $type
     * @return RoutineInterface
     */
    public function createMasterRoutineForType($type);
}
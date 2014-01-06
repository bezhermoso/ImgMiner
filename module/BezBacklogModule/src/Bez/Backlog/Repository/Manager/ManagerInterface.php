<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace Bez\Backlog\Repository\Manager;


use Bez\Backlog\Repository\Exception\RepositoryNotFoundException;
use Bez\Backlog\Repository\RepositoryInterface;

interface ManagerInterface
{
    /**
     * @param $name
     * @return RepositoryInterface
     * @throws RepositoryNotFoundException
     */
    public function getRepository($name);
}

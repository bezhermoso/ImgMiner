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

class Simple implements ManagerInterface
{

    protected $repositories = array();

    public function __construct(array $repositories = null)
    {
        if ($repositories !== null) {
            foreach ($repositories as $name => $repository) {
                $this->setRepository($name, $repository);
            }
        }
    }
    /**
     * @param $name
     * @return RepositoryInterface
     * @throws RepositoryNotFoundException
     */
    public function getRepository($name)
    {
        if (!isset($this->repositories[$name])) {
            throw new RepositoryNotFoundException(sprintf('Cannot find a repository for type "%s".', $name));
        }

        return $this->repositories[$name];

    }

    /**
     * @param $name
     * @param RepositoryInterface $repository
     */
    public function setRepository($name, RepositoryInterface $repository)
    {
        $this->repositories[$name] = $repository;
    }
}
 
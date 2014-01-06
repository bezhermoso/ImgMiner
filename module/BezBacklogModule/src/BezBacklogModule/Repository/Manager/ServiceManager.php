<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Repository\Manager;


use Bez\Backlog\Repository\Exception\RepositoryNotFoundException;
use Bez\Backlog\Repository\Manager\ManagerInterface;
use Bez\Backlog\Repository\RepositoryInterface;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceManager implements ManagerInterface
{

    protected $serviceLocator;

    protected $map;

    public function __construct(ServiceLocatorInterface $locator, $map)
    {
        if (!is_array($map) && !$map instanceof \Traversable) {
            throw new \InvalidArgumentException(sprintf('Expected array or an instance of \ArrayAccess. "%s" given.', get_class($map)));
        }

        $this->serviceLocator = $locator;
        $this->map = $map;
    }

    /**
     * @param $name
     * @throws \RuntimeException
     * @throws \Bez\Backlog\Repository\Exception\RepositoryNotFoundException
     * @return RepositoryInterface
     */
    public function getRepository($name)
    {
        if (!isset($this->map[$name])) {
            throw new RepositoryNotFoundException(sprintf('"%s" is not mapped to any repository.', $name));
        }

        try {

            $repository = $this->serviceLocator->get($this->map[$name]);

            if (!$repository instanceof RepositoryInterface) {
                throw new \RuntimeException(
                                sprintf(
                                    'Object with service name "%s" must implement %s. Instance of "%s" received.',
                                    'Bez\Backlog\Repository\RepositoryInterface',
                                    get_class($repository)));
            }

            return $repository;

        } catch (ServiceNotFoundException $e) {
            throw new RepositoryNotFoundException(
                        sprintf(
                            '"%s" [%s] cannot be found in service locator.',
                            $this->map[$name],
                            $name), null, $e);
        }

    }
}

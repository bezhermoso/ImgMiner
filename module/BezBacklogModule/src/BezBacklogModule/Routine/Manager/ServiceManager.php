<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Routine\Manager;


use Bez\Backlog\Routine\Exception\RoutineNotFoundException;
use Bez\Backlog\Routine\Manager\ManagerInterface;
use Bez\Backlog\Routine\RoutineInterface;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceManager implements ManagerInterface, ServiceLocatorAwareInterface
{

    protected $map;

    protected $serviceLocator;

    public function __construct($map)
    {
        if (!is_array($map) && !$map instanceof \Traversable) {
            throw new \InvalidArgumentException(sprintf('Expected array or an instance of \ArrayAccess. "%s" given.', get_class($map)));
        }

        $this->map = $map;
    }

    /**
     * @param $name
     * @throws \RuntimeException
     * @throws \Bez\Backlog\Routine\Exception\RoutineNotFoundException
     * @return RoutineInterface
     */
    public function getRoutine($name)
    {
        if (!isset($this->map[$name])) {
            throw new RoutineNotFoundException(sprintf('"%s" is not mapped to any routine..', $name));
        }

        try {

            $repository = $this->serviceLocator->get($this->map[$name]);

            if (!$repository instanceof RoutineInterface) {
                throw new \RuntimeException(
                    sprintf(
                        'Object with service name "%s" must implement %s. Instance of "%s" received.',
                        'Bez\Backlog\Repository\RoutineInterface',
                        get_class($repository)));
            }

            return $repository;

        } catch (ServiceNotFoundException $e) {
            throw new RoutineNotFoundException(
                sprintf(
                    '"%s" [%s] cannot be found in service locator.',
                    $this->map[$name],
                    $name), null, $e);
        }
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}

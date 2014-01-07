<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Service;


use Bez\Backlog\Routine\MasterRoutineFactoryInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MasterRoutineAbstractFactory implements AbstractFactoryInterface
{

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return preg_match('/^routines\.(.*)\w+/', $requestedName);
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {

        /** @var $factory MasterRoutineFactoryInterface */
        $factory = $serviceLocator->get('BezBacklogModule\Routine\MasterRoutineFactory');

        $type = substr($requestedName, strrpos($requestedName, '.') + 1);

        if (!$type) {
            throw new \InvalidArgumentException('Master routine ID must be in this format: "routines.(ID)"');
        }

        $routine = $factory->createMasterRoutineForType($type);

        return $routine;

    }
}
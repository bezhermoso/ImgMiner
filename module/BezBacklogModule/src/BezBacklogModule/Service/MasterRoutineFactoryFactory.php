<?php
/**
 * Copyright 2014 Bezalel Hermoso <bezalelhermoso@gmail.com>
 * 
 * This project is free software released under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php 
 */

namespace BezBacklogModule\Service;


use BezBacklogModule\Routine\MasterRoutineFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MasterRoutineFactoryFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('BezBacklogModule\Config');

        $repositoryManager = $serviceLocator->get($config['repository_manager']);
        $routineManager = $serviceLocator->get($config['routine_manager']);

        $factory = new MasterRoutineFactory($repositoryManager, $routineManager);
        return $factory;

    }
}
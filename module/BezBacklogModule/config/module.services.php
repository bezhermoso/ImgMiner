<?php

return array(
    'factories' => array(
        'BezBacklogModule\Config' => 'BezBacklogModule\Service\ConfigFactory',

        'BezBacklogModule\Repository\Manager\ServiceManager'
                        => 'BezBacklogModule\Service\RepositoryManagerServiceManagerFactory',

        'BezBacklogModule\Routine\Manager\ServiceManager'
                        => 'BezBacklogModule\Service\RoutineManagerServiceManagerFactory',

        'BezBacklogModule\Routine\MasterRoutineFactory'
                        => 'BezBacklogModule\Service\MasterRoutineFactoryFactory',


        'Bez\Backlog\Repository\Manager\ManagerInterface'
                        => 'BezBacklogModule\Service\RepositoryManagerFactory',

        'Bez\Backlog\Routine\Manager\ManagerInterface'
                        => 'BezBacklogModule\Service\RoutineManagerFactory',
    ),

    'invokables' => array(
        'BezBacklogModule\Repository\InMemory'
                        => 'BezBacklogModule\Repository\InMemory',


        'BezBacklogModule\Routine\InMemory'
        => 'BezBacklogModule\Routine\InMemory',
    ),

    'abstract_factories' => array(
        'BezBacklogModule\Service\MasterRoutineAbstractFactory',
    ),
);
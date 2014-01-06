<?php

return array(
    'backlog' => array(
        'repository_manager' => 'Bez\Backlog\RepositoryManager\ServiceLocator',
        'repositories' => array(
            'foo' => 'Backlog\FooRepository',
        ),

        'routine_manager' => 'Bez\Backlog\RoutineManager\ServiceLocator',
        'routines' => array(
            'foo' => 'Backlog\FooRoutine',
        ),
    )
);
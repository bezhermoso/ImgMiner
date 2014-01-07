<?php

return array(
    'backlog' => array(
        'repository_manager' => 'BezBacklogModule\Repository\Manager\ServiceManager',
        'repositories' => array(
            'foo' => 'BezBacklogModule\Repository\InMemory',
        ),

        'routine_manager' => 'BezBacklogModule\Routine\Manager\ServiceManager',
        'routines' => array(
            'foo' => 'BezBacklogModule\Routine\InMemory',
        ),
    )
);
<?php
return [
    'router' => [
        'routes' => [
            'api' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/api'
                ],
                'child_routes' => [
                    'backup' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/backup',
                            'defaults' => [
                                'controller' => 'DbManager\Controller\IndexController',
                                'action' => 'backup'
                            ]
                        ],
                        'may_terminate' => true,
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'DbManager\Controller\IndexController' => 'DbManager\Controller\IndexController',
        ]
    ]
];
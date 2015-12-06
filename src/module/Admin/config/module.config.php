<?php
return [
    'router' => [
        'routes' => [
            'admin' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/admin',
                    'defaults' => [
                        'controller' => 'Admin\Controller\IndexController',
                        'action'    => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'login' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/login',
                            'defaults' => [
                                'action' => 'login'
                            ]
                        ]
                    ],
                    'test' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/test',
                            'defaults' => [
                                'action' => 'test'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Admin\Controller\IndexController' => 'Admin\Controller\IndexController',
        ]
    ],
    'password_additional' => 'linfeiyang'
];
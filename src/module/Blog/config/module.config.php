<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:50
 */
return [
    'router' => [
        'routes' => [
            'admin' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/admin',
                    'defaults' => [
                        'controller' => 'Blog\Controller\Admin\IndexController',
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
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Blog\Controller\Admin\IndexController' => 'Blog\Controller\Admin\IndexController',
            'Blog\Controller\Api\IndexController' => 'Blog\Controller\Api\IndexController'
        ]
    ],
    'password_additional' => 'linfeiyang'
];
<?php
/**
 * Created by PhpStorm.
 * User: linfeiyang
 * Date: 2015/11/5
 * Time: 20:18
 */

return [
    'router' => [
        'routes' => [
            'tb-tool' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tb-tool'
                ],
                'child_routes' => [
                    'test' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/test',
                            'defaults' => [
                                'controller' => 'TestController',
                                'action' => 'index'
                            ]
                        ],
                        'may_terminate' => true
                    ],
                    'index' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '[/]',
                            'defaults' => [
                                'controller' => 'IndexController',
                                'action' => 'index'
                            ]
                        ],
                        'may_terminate' => true
                    ]
                ]
            ]
        ],
    ],
    'controllers' => [
        'invokables' => [
            'TestController' => 'TbTool\Controller\TestController',
            'IndexController' => 'TbTool\Controller\IndexController'
        ]
    ]
];
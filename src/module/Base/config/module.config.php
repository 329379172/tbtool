<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午1:31
 */

return [

    'router' => [
        'routes' => [
            'test' => [
                'type' => 'segment',
                'options' => [
                    'route'=> '/test',
                    'defaults' => [
                        'controller' => 'Base\Controller\TestController',
                        'action' => 'test'
                    ]
                ],
                'may_terminate' => true,
            ],
            'route' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/route',
                    'defaults' => [
                        'controller' => 'Base\Controller\TestController',
                        'action' => 'route'
                    ]
                ],
                'may_terminate' => true
            ]
        ]
    ],
    'mail' => [
        'name' => 'qq',
        'host' => 'smtp.qq.com',
        'connection_class' => 'login',
        'connection_config' => [
            'username' => '',
            'password' => ''
        ]
    ],
    'xq_mail' => [
        'mail_to' => '329379172@qq.com',
        'mail_from' => '329379172@qq.com'
    ],
    'redis' => [
        'scheme' => 'tcp',
        'host' => 'redis',
        'port' => 6379
    ]
];
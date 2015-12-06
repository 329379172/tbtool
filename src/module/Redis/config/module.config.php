<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/30
 * Time: 下午4:48
 */
return [
    'Redis' => [
        'adapter' => 'redis',
        'options' => [
            'server' => [
                'host' => '127.0.0.1',
                'port' => 6379
            ]
        ]
    ]
];
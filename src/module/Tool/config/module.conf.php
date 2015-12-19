<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/20
 * Time: 上午10:45
 */
return [
    'router' => [
        'routes' => [
            'tool' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tool'
                ],
                'child_routes' => [
                    'longdai' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/longdai',
                        ],
                        'child_routes' => [
                            'longdai' => [
                                'type' => 'literal',
                                'options' => [
                                    'route' => '/redbag',
                                    'defaults' => [
                                        'controller' => 'LongDaiController',
                                        'action' => 'grabRedBag'
                                    ]
                                ],
                                'may_terminate' => true
                            ]
                        ]
                    ],
					'webqq' => [
						'type' => 'literal',
						'options' => [
							'route' => '/webqq',
							'defaults' => [
								'controller' => 'LongDaiController',
								'action' => 'webqq'
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
            'LongDaiController' => 'Tool\Controller\LongDaiController',
        ]
    ]
];

<?php
return [
    'service_manager' => [
        'factories' => [
            'campaignmonitor_options' => 'Campaignmonitor\Options\Factory\CampaignmonitorOptionsFactory',
            'campaignmonitor_transactional' => 'Campaignmonitor\Transactional\TransactionalServiceFactory',
            'campaignmonitor_subscribers' => 'Campaignmonitor\Transactional\SubscribersServiceFactory',
            'campaignmonitor_lists' => 'Campaignmonitor\Lists\ListsServiceFactory'
        
        ]
    ]
    ,
    'controllers' => [
        'invokables' => [
            'Campaignmonitor\Controller\Index' => 'Campaignmonitor\Controller\IndexController'
        ]
    ],
    'router' => [
        'routes' => [
            'campaignmonitor' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/index',
                    'defaults' => [
                        '__NAMESPACE__' => 'Campaignmonitor\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => []
                        ]
                    ]
                ]
            ]
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Campaignmonitor' => __DIR__ . '/../view'
        ]
    ]
];

<?php
/*
 * This file is part of the Ginger Workflow Framework.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 06.12.14 - 22:26
 */
return array(
    'dashboard' => [
        /*
        'sqlconnector_config_widget' => [
            'controller' => 'SqlConnector\Controller\DashboardWidget',
            'order' => 90 //50 - 99 connectors range
        ]
        */
    ],
    'router' => [
        'routes' => [

        ]
    ],
    'view_manager' => array(
        'template_map' => [
            'sqlconnector/partials/pm-metadata-config' => __DIR__ . '/../view/sqlconnector/partials/pm-metadata-config.phtml'
        ]
    ),
    'process_manager' => [
        'view_addons' => [
            'sqlconnector/partials/pm-metadata-config'
        ]
    ],
    'asset_manager' => array(
        'resolver_configs' => array(
            'collections' => array(
                //Inject process manager metadata configurator for sql connectors
                'js/process-config/app.js' => [
                    'js/sqlconnector/controllers/pm-metadata.js',
                    'js/sqlconnector/views/pm-metadata.js',
                ]
            ),
            'paths' => array(
                __DIR__ . '/../public',
            ),
        ),
    ),
    'service_manager' => [
        'factories' => [


        ]
    ],
    'controllers' => array(

    ),
    'prooph.psb' => [
        'command_router_map' => [

        ]
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'SqlConnector\Controller\Configuration' => 'Json',
        ],
        'accept_whitelist' => [
            'SqlConnector\Controller\Configuration' => ['application/json'],
        ],
        'content_type_whitelist' => [
            'SqlConnector\Controller\Configuration' => ['application/json'],
        ],
    ]
);
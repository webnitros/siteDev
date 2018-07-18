<?php

return [
    'web' => [
        'index' => [
            'pagetitle' => 'Главная',
            'template' => 0,
            'hidemenu' => false,
            'content' => "{include 'file:resources/main.tpl'}",
            'properties' => [
                'templatename' => 'Main'
            ],
        ],
        'catalog' => [
            'pagetitle' => 'Каталог',
            'template' => 0,
            'hidemenu' => false,
            'content' => "{include 'file:resources/catalog.tpl'}",
            'class_key' => 'msCategory',
            'properties' => [
                'templatename' => 'Catalog'
            ],
            'resources' => [
                'washer' => [
                    'pagetitle' => 'Стиральны машинки',
                    'template' => 0,
                    'hidemenu' => false,
                    'content' => "{include 'file:resources/catalog.tpl'}",
                    'class_key' => 'msCategory',
                    'properties' => [
                        'templatename' => 'Catalog'
                    ],
                    'resources' => [
                        'washer' => [
                            'pagetitle' => 'Стиральная машина SAMSUNG WW80J5545FW',
                            'template' => 0,
                            'hidemenu' => true,
                            'uri' => 'product-1',
                            'uri_override' => true,
                            'class_key' => 'msProduct',
                            'price' => '27999',
                            'old_price' => '30999',
                            'properties' => [
                                'templatename' => 'Product'
                            ],
                        ]
                    ],
                ],
                'tv' => [
                    'pagetitle' => 'Телевизор',
                    'template' => 0,
                    'hidemenu' => false,
                    'content' => "{include 'file:resources/catalog.tpl'}",
                    'class_key' => 'msCategory',
                    'properties' => [
                        'templatename' => 'Catalog'
                    ],
                    'resources' => [
                        'samsung-UE40MU6100UXRU' => [
                            'pagetitle' => 'Ultra HD (4K) LED телевизор SAMSUNG UE40MU6100UXRU',
                            'template' => 0,
                            'hidemenu' => true,
                            'uri' => 'product-2',
                            'uri_override' => true,
                            'class_key' => 'msProduct',
                            'price' => '33999',
                            'properties' => [
                                'templatename' => 'Product'
                            ],
                        ]
                    ],
                ]
            ],
        ],
        'card' => [
            'pagetitle' => 'Корзина',
            'template' => 0,
            'hidemenu' => false,
            'content' => "{include 'file:resources/card.tpl'}",
            'properties' => [
                'templatename' => 'Page'
            ],
        ],
        'system' => [
            'pagetitle' => 'system',
            'properties' => [
                'templatename' => 'Service'
            ],
            'template' => 0,
            'hidemenu' => true,
            'published' => false,
            'resources' => [
                'error403' => [
                    'pagetitle' => 'Доступ запрещен',
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'error403',
                    'uri_override' => true,
                    'content' => "{include 'file:resources/service/error403.tpl'}",
                    'properties' => [
                        'templatename' => 'Service'
                    ],
                ],
                'error404' => [
                    'pagetitle' => 'Страница не найдена',
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'error404',
                    'uri_override' => true,
                    'content' => "{include 'file:resources/service/error404.tpl'}",
                    'properties' => [
                        'templatename' => 'Service'
                    ],
                ],
                'error503' => [
                    'pagetitle' => 'Сайт временно не доступен',
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'error503',
                    'uri_override' => true,
                    'content' => "{include 'file:resources/service/error503.tpl'}",
                    'properties' => [
                        'templatename' => 'Service'
                    ],
                ],
                'sitemap.xml' => [
                    'pagetitle' => 'sitemap.xml',
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'sitemap.xml',
                    'uri_override' => true,
                    'content' => '[[!pdoSitemap? &checkPermissions=`list`]]',
                ],
                'robots.txt' => [
                    'pagetitle' => 'robots.txt',
                    'content_type' => 3,
                    'template' => 0,
                    'hidemenu' => true,
                    'uri' => 'robots.txt',
                    'uri_override' => true,
                    'content' => "{include 'file:resources/service/robots.tpl'}",
                ],
            ],
        ],
    ],
];
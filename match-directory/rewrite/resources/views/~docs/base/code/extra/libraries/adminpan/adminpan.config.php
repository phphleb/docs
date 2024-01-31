<?php

return [
    'design' => 'base', // base|light default `base`
    'breadcrumbs' => 'on', // on|off default 'on'
    'section' => [
        [
            'name' => [
                'ru' => 'Главное меню',
                'en' => 'Main menu'
            ],
            'section' => [
                [
                    'route' => 'adminpan.default',
                    'name' => [
                        'en' => 'Test page',
                        'ru' => 'Тестовая страница',
                    ],
                ],
            ],
        ],
    ]
];
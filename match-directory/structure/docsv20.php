<?php
/**
 * The returned array contains a list of pages for making an interactive menu from them.
 * Each page must match the route by name.
 *
 * Возвращаемый массив содержит перечень страниц для составления из них интерактивного меню.
 * Каждая страница должна содержать соответствие с маршрутом по названию.
 */

return [
    'design' => 'light',
    'logoUri' => null, // Relative link to the PNG, JPG or SVG (230x55px)
    'breadcrumbs' => 'on', // on|off default 'on'
    'section' => [
        [
            'route' => 'docs.2.0.title.page',
            'name' => [
                'ru' => 'Оглавление',
            ],
        ],
        [
            'route' => 'docs.2.0.search.page',
            'name' => [
                'ru' => 'Поиск',
            ],
        ],
        [
            'name' => [
                'ru' => 'Документация',
            ],
            'section' => [
                [
                    'route' => 'docs.2.0.introduction.page',
                    'name' => [
                        'ru' => 'Введение',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Установка и настройка',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.installation.page',
                            'name' => [
                                'ru' => '1. Установка проекта',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.tuning.page',
                            'name' => [
                                'ru' => '2. Настройка фреймворка',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.configuration.page',
                            'name' => [
                                'ru' => '3. Конфигурация',
                            ],
                        ],
                     ],
                ],
                [
                    'route' => 'docs.2.0.directories.page',
                    'name' => [
                        'ru' => 'Структура проекта',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Запуск приложения',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.start.php-server.page',
                            'name' => [
                                'ru' => 'PHP-сервер',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.nginx.page',
                            'name' => [
                                'ru' => 'Nginx',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.apache.page',
                            'name' => [
                                'ru' => 'Apache',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.roadrunner.page',
                            'name' => [
                                'ru' => 'RoadRunner',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.swoole.page',
                            'name' => [
                                'ru' => 'Swoole',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.hosting.page',
                            'name' => [
                                'ru' => 'Хостинг',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.routes.page',
                    'name' => [
                        'ru' => 'Маршрутизация',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Контроллеры',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.controller.controller.page',
                            'name' => [
                                'ru' => 'Контроллер',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.controller.module.page',
                            'name' => [
                                'ru' => 'Модуль',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.controller.middleware.page',
                            'name' => [
                                'ru' => 'Middleware',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.models.page',
                    'name' => [
                        'ru' => 'Модели',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Шаблоны',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.template.standard.page',
                            'name' => [
                                'ru' => 'Стандартные шаблоны',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.template.cached.page',
                            'name' => [
                                'ru' => 'Кешируемые шаблоны',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.template.twig.page',
                            'name' => [
                                'ru' => 'Шаблонизатор TWIG',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.console.command.page',
                    'name' => [
                        'ru' => 'Консольные команды',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Контейнер',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.container.container.page',
                            'name' => [
                                'ru' => 'Устройство контейнера',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.container.get.page',
                            'name' => [
                                'ru' => 'Получение сервиса',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.container.di.page',
                            'name' => [
                                'ru' => 'Внедрение зависимостей',
                            ],
                        ],
                        [
                            'name' => [
                                'ru' => 'Сервисы',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.service.request.page',
                                    'name' => [
                                        'ru' => 'Request',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.response.page',
                                    'name' => [
                                        'ru' => 'Response',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.cache.page',
                                    'name' => [
                                        'ru' => 'Cache',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.log.page',
                                    'name' => [
                                        'ru' => 'Log',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.path.page',
                                    'name' => [
                                        'ru' => 'Path',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.db.page',
                                    'name' => [
                                        'ru' => 'DB',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.session.page',
                                    'name' => [
                                        'ru' => 'Session',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.cookies.page',
                                    'name' => [
                                        'ru' => 'Cookies',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.redirect.page',
                                    'name' => [
                                        'ru' => 'Redirect',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.router.page',
                                    'name' => [
                                        'ru' => 'Router',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.settings.page',
                                    'name' => [
                                        'ru' => 'Settings',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.csrf.page',
                                    'name' => [
                                        'ru' => 'Csrf',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.converter.page',
                                    'name' => [
                                        'ru' => 'Converter',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.events.page',
                    'name' => [
                        'ru' => 'События',
                    ],
                ],
            ],
        ],
        [
            'name' => [
                'ru' => 'Дополнительно',
            ],
            'section' => [
                [
                    'name' => [
                        'ru' => 'Специальные возможности',
                    ],
                    'section' => [
                        [
                            'name' => [
                                'ru' => 'Консольные команды',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.task.extended.name.page',
                                    'name' => [
                                        'ru' => 'Пользовательские названия команд',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.task.extended.args.page',
                                    'name' => [
                                        'ru' => 'Настраиваемые параметры команд',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.generate.mvc.page',
                                    'name' => [
                                        'ru' => 'Консольная генерация шаблонов MVC',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.console.bowling.page',
                                    'name' => [
                                        'ru' => 'Консольная игра в боулинг',
                                    ],
                                ],
                            ]
                        ],
                        [
                            'name' => [
                                'ru' => 'Контейнер и сервисы',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.container.extended.add.page',
                                    'name' => [
                                        'ru' => 'Добавление сервиса в контейнер',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.container.extended.replace.page',
                                    'name' => [
                                        'ru' => 'Переопределение стандартного сервиса',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.container.extended.prof.page',
                                    'name' => [
                                        'ru' => 'Нестандартное использование контейнера',
                                    ],
                                ],
                            ]
                        ],
                        [
                            'route' => 'docs.2.0.web.console.page',
                            'name' => [
                                'ru' => 'Веб-консоль',
                            ],
                        ]
                    ]
                ],
                [
                    'route' => 'docs.2.0.testing.page',
                    'name' => [
                        'ru' => 'Тестирование',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Расширения',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.hlogin.page',
                            'name' => [
                                'ru' => 'HLOGIN - модуль регистрации',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.adminpan.page',
                            'name' => [
                                'ru' => 'Модуль административной панели',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.api.page',
                            'name' => [
                                'ru' => 'Набор трейтов для создания API',
                            ],
                        ],
                    ]
                ],
            ]
        ],
        [
            'route' => 'docs.2.0.about.page',
            'name' => [
                'ru' => 'Информация о проекте',
            ],
        ],
    ],
];


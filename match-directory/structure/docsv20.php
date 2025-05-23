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
                'en' => 'Table of contents',
                'zh' => '目录',
            ],
        ],
        [
            'route' => 'docs.2.0.search.page',
            'name' => [
                'ru' => 'Поиск',
                'en' => 'Search',
                'zh' => '搜索',
            ],
        ],
        [
            'name' => [
                'ru' => 'Документация',
                'en' => 'Documentation',
                'zh' => '文档',
            ],
            'section' => [
                [
                    'route' => 'docs.2.0.introduction.page',
                    'name' => [
                        'ru' => 'Введение',
                        'en' => 'Introduction',
                        'zh' => '前言',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Установка и настройка',
                        'en' => 'Installation and configuration',
                        'zh' => '安装与配置',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.installation.page',
                            'name' => [
                                'ru' => '1. Установка проекта',
                                'en' => '1. Installation of the project',
                                'zh' => '1. 项目的安装',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.tuning.page',
                            'name' => [
                                'ru' => '2. Настройка фреймворка',
                                'en' => '2. Setting up the framework',
                                'zh' => '2. 搭建框架',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.configuration.page',
                            'name' => [
                                'ru' => '3. Конфигурация',
                                'en' => '3. Configuration',
                                'zh' => '3. 配置',
                            ],
                        ],
                     ],
                ],
                [
                    'route' => 'docs.2.0.directories.page',
                    'name' => [
                        'ru' => 'Структура проекта',
                        'en' => 'Project structure',
                        'zh' => '项目结构',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Запуск приложения',
                        'en' => 'Launching the application',
                        'zh' => '启动应用程序',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.start.php-server.page',
                            'name' => [
                                'ru' => 'PHP-сервер',
                                'en' => 'PHP server',
                                'zh' => 'PHP服务器',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.nginx.page',
                            'name' => [
                                'ru' => 'Nginx',
                                'en' => 'Nginx',
                                'zh' => 'Nginx',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.apache.page',
                            'name' => [
                                'ru' => 'Apache',
                                'en' => 'Apache',
                                'zh' => 'Apache',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.roadrunner.page',
                            'name' => [
                                'ru' => 'RoadRunner',
                                'en' => 'RoadRunner',
                                'zh' => 'RoadRunner',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.workerman.page',
                            'name' => [
                                'ru' => 'Workerman',
                                'en' => 'Workerman',
                                'zh' => 'Workerman',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.swoole.page',
                            'name' => [
                                'ru' => 'Swoole',
                                'en' => 'Swoole',
                                'zh' => 'Swoole',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.hosting.page',
                            'name' => [
                                'ru' => 'Хостинг',
                                'en' => 'Shared hosting',
                                'zh' => '网站托管',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.webrotor.page',
                            'name' => [
                                'ru' => 'WebRotor',
                                'en' => 'WebRotor',
                                'zh' => 'WebRotor',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.start.frankenphp.page',
                            'name' => [
                                'ru' => 'FrankenPHP',
                                'en' => 'FrankenPHP',
                                'zh' => 'FrankenPHP',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.routes.page',
                    'name' => [
                        'ru' => 'Маршрутизация',
                        'en' => 'Routing',
                        'zh' => '路由',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Контроллеры',
                        'en' => 'Controllers',
                        'zh' => '控制器',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.controller.controller.page',
                            'name' => [
                                'ru' => 'Контроллер',
                                'en' => 'Controller',
                                'zh' => '控制器',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.controller.module.page',
                            'name' => [
                                'ru' => 'Модуль',
                                'en' => 'Module',
                                'zh' => '模块',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.controller.middleware.page',
                            'name' => [
                                'ru' => 'Middleware',
                                'en' => 'Middleware',
                                'zh' => 'Middleware',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.models.page',
                    'name' => [
                        'ru' => 'Модели',
                        'en' => 'Models',
                        'zh' => '结构模型',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Шаблоны',
                        'en' => 'Templates',
                        'zh' => '模板',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.template.standard.page',
                            'name' => [
                                'ru' => 'Стандартные шаблоны',
                                'en' => 'Standard Templates',
                                'zh' => '标准模板',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.template.cached.page',
                            'name' => [
                                'ru' => 'Кешируемые шаблоны',
                                'en' => 'Cacheable Templates',
                                'zh' => '可缓存模板',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.template.twig.page',
                            'name' => [
                                'ru' => 'Шаблонизатор TWIG',
                                'en' => 'Template engine TWIG',
                                'zh' => '模板引擎 TWIG',
                            ],
                        ],
                    ],
                ],
                [
                    'route' => 'docs.2.0.console.command.page',
                    'name' => [
                        'ru' => 'Консольные команды',
                        'en' => 'Console commands',
                        'zh' => '控制台命令',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Контейнер',
                        'en' => 'Container',
                        'zh' => '容器',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.container.container.page',
                            'name' => [
                                'ru' => 'Устройство контейнера',
                                'en' => 'Container structure',
                                'zh' => '集装箱结构',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.container.get.page',
                            'name' => [
                                'ru' => 'Получение сервиса',
                                'en' => 'Receiving service',
                                'zh' => '收货服务',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.container.di.page',
                            'name' => [
                                'ru' => 'Внедрение зависимостей',
                                'en' => 'Dependency Injection',
                                'zh' => '依赖注入',
                            ],
                        ],
                        [
                            'name' => [
                                'ru' => 'Сервисы',
                                'en' => 'Services',
                                'zh' => '服务',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.service.request.page',
                                    'name' => [
                                        'ru' => 'Request',
                                        'en' => 'Request',
                                        'zh' => 'Request',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.response.page',
                                    'name' => [
                                        'ru' => 'Response',
                                        'en' => 'Response',
                                        'zh' => 'Response',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.cache.page',
                                    'name' => [
                                        'ru' => 'Cache',
                                        'en' => 'Cache',
                                        'zh' => 'Cache',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.log.page',
                                    'name' => [
                                        'ru' => 'Log',
                                        'en' => 'Log',
                                        'zh' => 'Log',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.path.page',
                                    'name' => [
                                        'ru' => 'Path',
                                        'en' => 'Path',
                                        'zh' => 'Path',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.db.page',
                                    'name' => [
                                        'ru' => 'DB',
                                        'en' => 'DB',
                                        'zh' => 'DB',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.session.page',
                                    'name' => [
                                        'ru' => 'Session',
                                        'en' => 'Session',
                                        'zh' => 'Session',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.cookies.page',
                                    'name' => [
                                        'ru' => 'Cookies',
                                        'en' => 'Cookies',
                                        'zh' => 'Cookies',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.redirect.page',
                                    'name' => [
                                        'ru' => 'Redirect',
                                        'en' => 'Redirect',
                                        'zh' => 'Redirect',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.router.page',
                                    'name' => [
                                        'ru' => 'Router',
                                        'en' => 'Router',
                                        'zh' => 'Router',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.settings.page',
                                    'name' => [
                                        'ru' => 'Settings',
                                        'en' => 'Settings',
                                        'zh' => 'Settings',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.csrf.page',
                                    'name' => [
                                        'ru' => 'Csrf',
                                        'en' => 'Csrf',
                                        'zh' => 'Csrf',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.service.converter.page',
                                    'name' => [
                                        'ru' => 'Converter',
                                        'en' => 'Converter',
                                        'zh' => 'Converter',
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
                        'en' => 'Events',
                        'zh' => '事件',
                    ],
                ],
            ],
        ],
        [
            'name' => [
                'ru' => 'Дополнительно',
                'en' => 'Additionally',
                'zh' => '此外',
            ],
            'section' => [
                [
                    'name' => [
                        'ru' => 'Специальные возможности',
                        'en' => 'Accessibility',
                        'zh' => '无障碍',
                    ],
                    'section' => [
                        [
                            'name' => [
                                'ru' => 'Консольные команды',
                                'en' => 'Console commands',
                                'zh' => '控制台命令',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.task.extended.name.page',
                                    'name' => [
                                        'ru' => 'Пользовательские названия команд',
                                        'en' => 'Custom command names',
                                        'zh' => '自定义命令名称',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.task.extended.args.page',
                                    'name' => [
                                        'ru' => 'Настраиваемые параметры команд',
                                        'en' => 'Customizable command options',
                                        'zh' => '可定制的命令选项',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.generate.mvc.page',
                                    'name' => [
                                        'ru' => 'Консольная генерация шаблонов MVC',
                                        'en' => 'Console generation of MVC templates',
                                        'zh' => '控制台生成MVC模板',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.console.bowling.page',
                                    'name' => [
                                        'ru' => 'Консольная игра в боулинг',
                                        'en' => 'Console bowling game',
                                        'zh' => '控制台保龄球游戏',
                                    ],
                                ],
                            ]
                        ],
                        [
                            'name' => [
                                'ru' => 'Асинхронность',
                                'en' => 'Asynchrony',
                                'zh' => '异步',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.async.async.interface.page',
                                    'name' => [
                                        'ru' => 'Сброс состояния после запроса',
                                        'en' => 'Reset state after request',
                                        'zh' => '请求后重置状态',
                                    ],
                                ],
                            ]
                        ],
                        [
                            'name' => [
                                'ru' => 'Контейнер и сервисы',
                                'en' => 'Container and services',
                                'zh' => '容器和服务',
                            ],
                            'section' => [
                                [
                                    'route' => 'docs.2.0.container.extended.add.page',
                                    'name' => [
                                        'ru' => 'Добавление сервиса в контейнер',
                                        'en' => 'Adding a service to a container',
                                        'zh' => '将服务添加到软件容器',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.container.extended.replace.page',
                                    'name' => [
                                        'ru' => 'Переопределение стандартного сервиса',
                                        'en' => 'Overriding a standard service',
                                        'zh' => '覆盖标准软件服务',
                                    ],
                                ],
                                [
                                    'route' => 'docs.2.0.container.extended.prof.page',
                                    'name' => [
                                        'ru' => 'Нестандартное использование контейнера',
                                        'en' => 'Non-standard container use',
                                        'zh' => '集装箱使用不规范',
                                    ],
                                ],
                            ]
                        ],
                        [
                            'route' => 'docs.2.0.web.console.page',
                            'name' => [
                                'ru' => 'Веб-консоль',
                                'en' => 'Web Console',
                                'zh' => '网页控制台',
                            ],
                        ]
                    ],
                ],
                [
                    'route' => 'docs.2.0.testing.page',
                    'name' => [
                        'ru' => 'Тестирование',
                        'en' => 'Testing',
                        'zh' => '测试',
                    ],
                ],
                [
                    'name' => [
                        'ru' => 'Расширения',
                        'en' => 'Extensions',
                        'zh' => '软件扩展',
                    ],
                    'section' => [
                        [
                            'route' => 'docs.2.0.hlogin.page',
                            'name' => [
                                'ru' => 'HLOGIN - модуль регистрации',
                                'en' => 'HLOGIN - registration module',
                                'zh' => 'HLOGIN——注册模块',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.adminpan.page',
                            'name' => [
                                'ru' => 'Модуль административной панели',
                                'en' => 'Administrative panel module',
                                'zh' => '管理面板模块',
                            ],
                        ],
                        [
                            'route' => 'docs.2.0.api.page',
                            'name' => [
                                'ru' => 'Набор трейтов для создания API',
                                'en' => 'A set of traits for creating an API',
                                'zh' => '一组用于创建 API 的特征',
                            ],
                        ],
                    ]
                ],
                [
                    'route' => 'docs.2.0.functions.page',
                    'name' => [
                        'ru' => 'Функции',
                        'en' => 'Functions',
                        'zh' => '函数',
                    ],
                ],
            ]
        ],
        [
            'route' => 'docs.2.0.about.page',
            'name' => [
                'ru' => 'Информация о проекте',
                'en' => 'Project information',
                'zh' => '项目信息',
            ],
        ],
    ],
];


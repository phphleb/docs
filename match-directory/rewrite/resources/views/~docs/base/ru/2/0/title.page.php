<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Документация') ?><br>

<?= Paragraph::h2('Предисловие') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.introduction.page'); ?>">Введение</a></b>.
    Предисловие к изучению фреймворка HLEB2.
</p>

<?= Paragraph::h2('Установка и настройка') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.installation.page'); ?>">Установка проекта</a></b>.
    Способы развертывания проекта.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.tuning.page'); ?>">Настройка фреймворка</a></b>.
    Базовая настройка работы фреймворка.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.configuration.page'); ?>">Параметры конфигурации</a></b>.
    Основные глобальные настройки.
</p>

<?= Paragraph::h2('Структура проекта') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.directories.page'); ?>">Структура проекта</a></b>.
    Обзор директорий проекта.
</p>

<?= Paragraph::h2('Запуск приложения') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.start.php-server.page'); ?>">PHP-сервер</a></b>.
    Встроенный сервер PHP.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.nginx.page'); ?>">Nginx</a></b>.
    Использование популярного веб-сервера.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.apache.page'); ?>">Apache</a></b>.
    Проверенный временем HTTP-сервер.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>">RoadRunner</a></b>.
    Асинхронный веб-сервер на Go.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.workerman.page'); ?>">Workerman</a></b>.
    Асинхронный веб-сервер на PHP.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.swoole.page'); ?>">Swoole</a></b>.
    Асинхронный сервер в виде расширения для PHP.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.hosting.page'); ?>">Хостинг</a></b>.
    Особенности установки на хостинге.
</p>

<p>
    <b><a href="<?= Link::url('docs.2.0.start.webrotor.page'); ?>">WebRotor</a></b>.
    Асинхронность для shared hosting.
</p>

<?= Paragraph::h2('Маршрутизация') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.routes.page'); ?>">Маршрутизация</a></b>.
    Обработчики для адресов страниц.
</p>

<?= Paragraph::h2('Контроллеры') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">Контроллер</a></b>.
    Стандартный класс для обработки маршрута.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">Модуль</a></b>.
    Обособленная часть проекта.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">Middleware</a></b>.
    Вспомогательный класс-посредник.
</p>

<?= Paragraph::h2('Модели') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.models.page'); ?>">Модель</a></b>.
    Компонент MVC, отвечающий за данные.
</p>

<?= Paragraph::h2('Шаблоны') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">Стандартные шаблоны</a></b>.
    Возвращаемые структуры данных.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.cached.page'); ?>">Кешируемые шаблоны</a></b>.
    Использование кеша шаблонов.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.twig.page'); ?>">Шаблонизатор TWIG</a></b>.
    Альтернатива шаблонизатору фреймворка.
</p>

<?= Paragraph::h2('Консольные команды') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.console.command.page'); ?>">Консольные команды</a></b>.
    Задачи для запуска из терминала.
</p>

<?= Paragraph::h2('Контейнер') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.container.container.page'); ?>">Устройство контейнера</a></b>.
    Обращение к сервисам.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.get.page'); ?>">Получение сервиса</a></b>.
    Способы использования контейнера.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.di.page'); ?>">Внедрение зависимостей</a></b>.
    Реализация DI во фреймворке.
</p>

<?= Paragraph::h2('Сервисы') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.service.request.page'); ?>">Request</a></b>.
    Объект для работы с данными запроса.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.response.page'); ?>">Response</a></b>.
    Формирование возвращаемых данных.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.cache.page'); ?>">Cache</a></b>.
    Файловое кеширование данных.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.log.page'); ?>">Log</a></b>.
    Универсальный механизм логирования.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.path.page'); ?>">Path</a></b>.
    Менеджер относительных путей.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.db.page'); ?>">DB</a></b>.
    Базовая обёртка над PHP PDO.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.session.page'); ?>">Session</a></b>.
    Удобная работа с HTTP-сессиями.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.cookies.page'); ?>">Cookies</a></b>.
    Получение и отправка cookies.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.redirect.page'); ?>">Redirect</a></b>.
    Перенаправление на другую страницу.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.router.page'); ?>">Router</a></b>.
    Взаимодействие с данными маршрутов.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.settings.page'); ?>">Settings</a></b>.
    Различные настройки фреймворка.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.csrf.page'); ?>">Csrf</a></b>.
    Защита от подделок межсайтовых запросов.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.converter.page'); ?>">Converter</a></b>.
    Преобразование в стандарты PSR.
</p>

<?= Paragraph::h2('События') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.events.page'); ?>">События</a></b>.
    Сопутствующее выполнение действий.
</p>

<?= Paragraph::h1('Дополнительно') ?>

<p>
    Специальные возможности фреймворка, которые в некоторых случаях могут быть полезны.
</p>


<?= Paragraph::h2('Консольные команды') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.name.page'); ?>">Пользовательские названия команд</a></b>,
    в том числе - сокращённые.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">Настраиваемые параметры команд</a></b>.
    Именованные аргументы.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">Консольная генерация шаблонов MVC</a></b>
    (Model-View-Controller).
</p>

<?= Paragraph::h2('Асинхронность') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.async.async.interface.page'); ?>">Сброс состояния</a></b>
    для асинхронных запросов.
</p>

<?= Paragraph::h2('Контейнер и сервисы') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">Добавление сервиса в контейнер</a></b>.
    На реальном примере.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">Переопределение стандартного сервиса</a></b>
    или его удаление.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.prof.page'); ?>">Нестандартное
    использование</a></b> контейнера. Более сложные примеры.
</p>

<?= Paragraph::h2('Веб-консоль') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Веб-консоль</a></b>.
    Защищённый HTTP-терминал.
</p>

<?= Paragraph::h2('Тестирование') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.testing.page'); ?>">Тестирование</a></b>
    программных структур на основе фреймворка.
</p>

<?= Paragraph::h2('Расширения') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.hlogin.page'); ?>">HLOGIN - модуль регистрации</a></b>
    и авторизации.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.adminpan.page'); ?>">Модуль административной панели</a></b>
    или публичного сайта.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.api.page'); ?>">Набор трейтов для создания API</a></b>.
    Пагинация и валидатор.
</p>

<?= Paragraph::h2('Функции') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.functions.page'); ?>">Встроенные функции</a></b>
    фреймворка.
</p>

<?= Paragraph::h2('Информация о проекте') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.about.page'); ?>">Информация о проекте</a></b>
    в качестве послесловия.
</p>

<br><br>


<?php insertTemplate('/docs/ru/footer') ?>;

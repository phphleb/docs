<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Структура проекта') ?>

<p>
    Фреймворк <span class="notranslate">HLEB2</span> реализует определённую структуру директорий проекта, таким образом поддерживая соглашение с разработчиком, в каких директориях хранить настройки и классы, необходимые фреймворку, и позволяет быстро разобраться в структуре этих папок на новом проекте, основанном на фреймворке <span class="notranslate">HLEB2</span>.
</p>
<p>
   На следующей схеме показаны папки нового проекта после установки фреймворка:
</p>

<div class="hl-text-block hl-dir-block notranslate">
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>app</b> &nbsp;&nbsp;- папка с кодом приложения<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Bootstrap</b> &nbsp;&nbsp;- классы, необходимые для управления фреймворком<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Events</b> &nbsp;&nbsp;- действия к определённым событиям<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ControllerEvent.php</span> &nbsp;&nbsp;- при инициализации контроллера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">MiddlewareEvent.php</span>  &nbsp;&nbsp;- при инициализации middleware<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleEvent.php</span> &nbsp;&nbsp;- при обращении к контроллеру модуля<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">PageEvent.php</span> &nbsp;&nbsp;- при обращении к контроллеру 'страницы'<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">TaskEvent.php</span> &nbsp;&nbsp;- при выполнении команды<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Http</b><br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ErrorContent.php</span> &nbsp;&nbsp;- контент для HTTP-ошибок<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">BaseContainer.php</span> &nbsp;&nbsp;- класс контейнера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ContainerFactory.php</span> &nbsp;&nbsp;- управление сервисами в контейнере<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ContainerInterface.php</span> &nbsp;&nbsp;- интерфейс контейнера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Commands</b> &nbsp;&nbsp;- папка с классами команд<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultTask.php</span> &nbsp;&nbsp;- пустой шаблон для создания команды<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span class="hl-directory-file">RotateLogs.php</span> &nbsp;&nbsp;- команда для ротации логов<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Controllers</b> &nbsp;&nbsp;- папка для классов контроллеров<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultController.php</span> &nbsp;&nbsp;- пустой шаблон для создания контроллера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Middlewares</b> &nbsp;&nbsp;- папка для контроллеров-посредников<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultMiddleware.php</span> &nbsp;&nbsp;- пустой шаблон для создания middleware<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Models</b><br>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModel.php</span> &nbsp;&nbsp;- пустой шаблон для создания Модели<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>config</b> &nbsp;&nbsp;- файлы с настройками<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">common.php</span> &nbsp;&nbsp;- основные настройки<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span> &nbsp;&nbsp;- настройки баз данных<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- переопределяемые в модулях настройки<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">system.php</span> &nbsp;&nbsp;- системные настройки<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>public</b> &nbsp;&nbsp;- публичная папка, в неё должен быть направлен веб-сервер<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>css</b> &nbsp;&nbsp;- публичные файлы стилей<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>images</b> &nbsp;&nbsp;- публичные файлы изображений<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>js</b> &nbsp;&nbsp;- публичные файлы со скриптами<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">.htaccess</span> &nbsp;&nbsp;- настройки сервера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">favicon.ico</span><br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-point">index.php</span> &nbsp;&nbsp;- точка доступа для веб-сервера<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">robots.txt</span><br></span>
<span class="hl-directory-dir">&#9724;</span> <b>resources</b> &nbsp;&nbsp;- пользовательские ресурсы проекта<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>views</b> &nbsp;&nbsp;- файлы представлений (шаблоны)<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">default.php</span> &nbsp;&nbsp;- демонстрационный шаблон фреймворка<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">error.php</span> &nbsp;&nbsp;- шаблон страницы с ошибкой<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>routes</b> &nbsp;&nbsp;- папка с файлами маршрутов<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">map.php</span><br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>storage</b> &nbsp;&nbsp;- папка-хранилище, содержит вспомогательные файлы<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>logs</b> &nbsp;&nbsp;- папка c логами в файлах<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>vendor</b> &nbsp;&nbsp;- папка с установленными библиотеками<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>phphleb</b> &nbsp;&nbsp;- папка с библиотеками фреймворка<br></span>
<span class="hl-nowrap"><span class="hl-directory-file">.gitignore</span> &nbsp;&nbsp;- управление видимостью файлов для Git<br></span>
<span class="hl-nowrap"><span class="hl-directory-file">.hgignore</span> &nbsp;&nbsp;- управление видимостью файлов для Mercurial<br></span>
<span class="hl-nowrap"><span class="hl-directory-file">composer.json</span> &nbsp;&nbsp;- настройки Composer<br></span>
<span class="hl-nowrap"><span class="hl-directory-point">console</span> &nbsp;&nbsp;- точка доступа для консольных команд<br></span>
<span class="hl-nowrap"><span class="hl-directory-file">readme.md</span> &nbsp;&nbsp;- описание фреймворка<br></span>
</div>

<p>
    Перечисленные на схеме файлы установлены вместе с фреймворком и являются частью его структуры, но предназначены для внесения правок и наполнения разработчиком.
    Кроме этого, разработчик может далее развивать проект согласно этой структуре, добавляя новые классы, папки, библиотеки и остальное.
</p>
<p>
    В отличии от предыдущей версии фреймворка, теперь появилась новая папка <span class="notranslate">Bootstrap</span>, в которой находятся классы для разработки, привязанные при этом к процессам ядра фреймворка.<br>
    С помощью этих классов работа фреймворка избавлена от лишних абстракций, ранее эти классы создавались из конфигурации, а теперь разработчик может напрямую их изменять по своему усмотрению.
</p>

<?= Paragraph::h1('app', true) ?>

<p>
    Папка <span class="notranslate">app</span> предназначена для кода самого приложения, основанного на фреймворке.
</p>

<?= Paragraph::h2('Bootstrap') ?>

<p>
    В этой директории содержаться классы для создания контейнера и сервисов, а также другие, являющиеся одновременно классами, код которых можно редактировать, и частями самого фреймворка.
</p>

<?= Paragraph::h2('Events') ?>

<p>
    Содержит классы, ответственные за обработку конкретных событий, возникающих при обработке запроса фреймворком.
</p>

<?= Paragraph::h2('Http') ?>

<p>
    Включает класс <b>ErrorContent.php</b> для назначения пользовательского контента, возвращаемого при возникновении <span class="notranslate">HTTP</span>-ошибок.
</p>

<?= Paragraph::h2('Commands') ?>

<p>
    Здесь находятся команды для выполнения из консоли или из кода напрямую.
    Можно создавать собственные команды, основываясь на шаблоне команды <b>DefaultTask.php</b>.
    Встроенные команды фреймворка при этом содержатся в коде самого фреймворка.
</p>

<?= Paragraph::h2('Controllers') ?>

<p>
    Папка для контроллеров фреймворка. Шаблон создания контроллера - файл <span class="notranslate"><b>DefaultController.php</b></span>.<br><br>
    Контроллер — часть архитектуры <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб), отвечает за дальнейшее управление обработкой запроса, уже идентифицированного маршрутизатором, но не должен содержать бизнес-логику.
</p>

<?= Paragraph::h2('Middlewares') ?>

<p>
    Директория предназначена для контроллеров-посредников (middleware), выполняющихся до или после контроллера, который может быть использован только один в маршруте.
</p>

<?= Paragraph::h2('Models') ?>

<p>
    Папка предназначена для классов Моделей.<br>
    Модель — ещё одна часть архитектуры <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб), отвечающая за данные.
</p>

<?= Paragraph::h1('config', true) ?>

<p>
    Конфигурация состоит из <span class="notranslate">PHP</span>-файлов, содержащих настройки фреймворка.
</p>

<?= Paragraph::h1('public', true) ?>

<p>
    Публичная директория. Содержит файл <span class="notranslate"><b>index.php</b></span> как точку входа для веб-сервера.
</p>

<?= Paragraph::h1('resources', true) ?>

<p>
    Предназначено для различных служебных файлов.<br>
    Здесь могут храниться как шаблоны страниц или писем, так и исходники для сборки стилей и скриптов, etc.
</p>

<?= Paragraph::h2('views') ?>

<p>
    Вид (представление) — часть архитектуры MVC (Action-Domain-Responder для веб).
    Эта папка предназначена для шаблонов веб-страниц.
    Здесь также могут храниться шаблоны Twig.
</p>

<?= Paragraph::h1('routes', true) ?>

<p>
    Маршрутизация - важная часть любого веб-фреймворка.
    В этой папке находится файл <span class="notranslate"><b>map.php</b></span>, содержащий карту маршрутов фреймворка.
</p>

<?= Paragraph::h1('storage', true) ?>

<p>
    Вспомогательные файлы, генерируемые в процессе работы фреймворка.<br>
    Права доступа к этой папке должны разрешать полный доступ как веб-серверу, так и разработчику для работы в терминале.
</p>

<?= Paragraph::h2('logs') ?>

<p>
    Логи и отчёты об ошибках в стандартизированном формате.
</p>

<?= Paragraph::h1('console', true) ?>

<p>
    Этот файл без расширения содержит <span class="notranslate">PHP</span>-код и выполняет консольные команды.
    Например:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --version</p>

<p>
    Выведет информацию о текущей версии фреймворка.
</p>

<?= Link::previousPage('docs.2.0.configuration.page', 'Конфигурация фреймворка'); ?>

<?= Link::nextPage('docs.2.0.start.php-server.page', 'Запуск на PHP-сервере'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer');

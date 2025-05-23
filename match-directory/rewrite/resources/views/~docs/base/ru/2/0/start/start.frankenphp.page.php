<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('FrankenPHP') ?>

<p>
    <span class="notranslate">FrankenPHP</span> — это современный сервер приложений для <span class="notranslate">PHP</span>, разработанный для высокой производительности, поддерживающий асинхронные задачи, <span class="notranslate">HTTP/2</span>, <span class="notranslate">HTTP/3</span> и <span class="notranslate">WebSockets</span>. Сервер работает как самостоятельное приложение или расширение для различных веб-серверов, например, <span class="notranslate">Caddy</span>.<br>
    Данный веб-сервер написан на языке <span class="notranslate">Go</span> и использует <span class="notranslate">CGO</span> для тесной интеграции с <span class="notranslate">PHP</span>, что обеспечивает низкие накладные расходы и быструю обработку запросов. Поддерживает стандартные расширения <span class="notranslate">PHP</span>, инструменты отладки (например, <span class="notranslate">Xdebug</span>), а также интеграцию с профилировщиками и системами мониторинга.
</p>
<p class="hl-info-block">
    <span class="notranslate">FrankenPHP</span> плохо поддерживается для <span class="notranslate">Windows</span>.
</p>
<p>
    Сервер <span class="notranslate">FrankenPHP</span> распространяется в виде бинарных файлов и <span class="notranslate">Docker</span>-образов. Актуальные версии доступны в официальном <a href="https://github.com/dunglas/frankenphp" target="_blank"><span class="notranslate">GitHub</span>-репозитории</a>. Установка описана в разделе документации сервера <a href="https://frankenphp.dev/docs/" target="_blank">frankenphp.dev/docs</a>.
</p>
<p>
    <span class="notranslate">FrankenPHP</span> работает в различных режимах, здесь будет показан самый простой, достаточный, чтобы попробовать работу с фреймворком локально и продемонстрировать, что фреймворк поддерживает этот веб-сервер.<br>
    Для фреймворка <span class="notranslate">HLEB2</span> достаточно указать путь к публичной папке при запуске из корневой директории проекта:
</p>
<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>frankenphp php-server -r public/ --listen 127.0.0.1:8080</p>
<p>
    Здесь еще добавлен конкретный адрес и порт для локальной разработки. Убедитесь, что этот порт был свободен.
</p>
<p>
    Теперь приложение будет доступно по адресу:<br> <a href="http://127.0.0.1:8088" target="_blank">http://127.0.0.1:8088</a>
</p>

<?= Link::previousPage('docs.2.0.start.webrotor.page', 'WebRotor'); ?>

<?= Link::nextPage('docs.2.0.routes.page', 'Маршрутизация'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

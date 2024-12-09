<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Workerman') ?>

<p>
    <a href="https://manual.workerman.net/doc/ru/" target="_blank"><span class="notranslate">Workerman</span></a> — это высокоэффективный инструмент для построения асинхронных серверов на языке <span class="notranslate">PHP</span>. Он предназначен для работы с вебсокетами, <span class="notranslate">HTTP</span>-серверами, чат-приложениями, <span class="notranslate">API</span> и другими сетевыми приложениями.
</p>
<p>
    <span class="notranslate">Workerman</span> работает без установки дополнительных расширений или зависимостей, так как он полностью реализован на чистом <span class="notranslate">PHP</span>. Это делает его кроссплатформенным и простым в установке.
</p>
<p>
    Стоит отметить, что <span class="notranslate">Workerman</span> поддерживает как <span class="notranslate">HTTP</span>, так и <span class="notranslate">HTTPS</span>, позволяет работать с вебсокетами и легко масштабируется для обработки большого количества соединений одновременно. Благодаря этому он может быть использован для создания <span class="notranslate">realtime</span> приложений, таких как чаты, системы уведомлений и серверы потоковой передачи.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    Установить <span class="notranslate">Workerman</span> можно через <span class="notranslate">Composer</span>, как обычную <span class="notranslate">PHP</span>-библиотеку. Подробнее в <a href="https://manual.workerman.net/doc/ru/install/install.html" target="_blank">инструкции по установке</a> сервера.
</p>

<p>
    Под <span class="notranslate">Workerman</span> необходимо будет изменить файл <span class="notranslate">/public/index.php</span>, чтобы фреймворк <span class="notranslate">HLEB2</span> выполнялся в цикле.<br>
    Базовый рабочий пример:
</p>

<?= Code::fromFile('@views/docs/code/start/workerman.php', true);  ?>

<p>
    Сервер <span class="notranslate">Workerman</span> запускается консольной командой:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php start</p>

<p>
    Согласно указанным настройкам, приложение будет доступно по адресу: <a href="http://127.0.0.1:2345" target="_blank">http://127.0.0.1:2345</a>
</p>

<?= Link::previousPage('docs.2.0.start.roadrunner.page', 'Запуск с помощью Roadrunner'); ?>

<?= Link::nextPage('docs.2.0.start.swoole.page', 'Сервер Swoole'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

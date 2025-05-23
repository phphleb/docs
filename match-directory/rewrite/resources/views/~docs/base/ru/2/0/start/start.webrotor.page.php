<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('WebRotor') ?>

<p>
    <span class="notranslate">WebRotor</span> — это PHP библиотека с помощью которой можно использовать асинхронное выполнение приложения на общем хостинге.
    Как известно, <span class="notranslate">shared hosting</span> обладает множеством ограничений по использованию, но такая специализированная программа дает все преимущества асинхронности и на общем хостинге.
</p>
<p>
    Принцип работы <span class="notranslate">WebRotor</span> в том, что при обращении к приложению индексный файл не обрабатывает запросы, а только посылает воркерам и забирает обратно для отображения. При этом в качестве воркера используется код этого же индексного файла.
    В качестве воркеров выступают обычные <span class="notranslate">CRON</span>-подобные процессы, имеющиеся сейчас на каждом хостинге.
    Разница настройки этих воркеров только в различии дизайна административной панели хостинга.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    Для <span class="notranslate">WebRotor</span> необходимо будет изменить файл <span class="notranslate">/public_html/index.php</span> (предполагаемый путь к индексному файлу на общем хостинге), чтобы фреймворк <span class="notranslate">HLEB2</span> выполнялся в цикле.
    Базовый рабочий пример:
</p>

<?= Code::fromFile('@views/docs/code/start/webrotor.php');  ?>

<p class="hl-info-block">
    В данном коде используется <span class="notranslate">HTTP</span>-клиент <span class="notranslate">nyholm/psr7</span> и <span class="notranslate">nyholm/psr7-server</span>, которые нужно установить дополнительно.
</p>

<p>
    Для такой конфигурации нужно еще будет запустить "воркеры" на хостинге, которые на самом деле предоставляемые хостингом <span class="notranslate">CRON</span>-подобные процессы.
    Обычно они настраиваются в административной панели хостинга и имеют различный дизайн, но принцип у них будет один. Нужно запустить два обработчика с интервалом в две минуты (в соответствии с настройками указанными выше):
</p>

<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=1</p>
<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=2</p>

<p>
    Два этих процесса отличаются только номером <span class="notranslate">ID</span> для воркера. После этого все запросы, поступающие к приложению будут обрабатываться двумя асинхронными воркерами.<br>
    Подробнее в описании библиотеки: <a href="https://github.com/phphleb/webrotor" target="_blank"><span class="notranslate">github.com/phphleb/webrotor</span></a>
</p>
<p>
    Для локальной разработки можно не использовать запуск воркеров, так как если они не запущены или неактивны, то запрос будет выполняться в обычном порядке. Таким образом, локально будут доступны стандартные средства отладки, такие как <span class="notranslate">xDebug</span>.
</p>


<?= Link::previousPage('docs.2.0.start.hosting.page', 'Shared hosting'); ?>

<?= Link::nextPage('docs.2.0.start.frankenphp.page', 'FrankenPHP'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

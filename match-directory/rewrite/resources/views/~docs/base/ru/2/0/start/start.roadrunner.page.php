<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('RoadRunner') ?>

<p>
    <span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">RoadRunner</a></span> — это высокопроизводительный сервер приложений <span class="notranslate">PHP</span>, балансировщик нагрузки и менеджер процессов.<br>
    <span class="notranslate">RoadRunner</span> написан на языке <span class="notranslate">Go</span>, он прост в установке, по принципу действия заменяет собой <span class="notranslate">PHP-FPM</span>.
    Поддерживает <span class="notranslate">xDebug</span> и его аналоги, а также инструменты профилирования и мониторинга, такие как <span class="notranslate">Datadog</span> и <span class="notranslate">New Relic</span>.
    Подробнее в <a href="https://roadrunner.dev/docs/php-debugging" rel="nofollow" target="_blank">документации</a> <span class="notranslate">RoadRunner</span>.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    Установка ресурсов сервера <span class="notranslate">RoadRunner</span> производится из официального репозитория: <span class="hl-nowrap"><span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">github.com/roadrunner-server/roadrunner</a></span></span>.
</p>
<p>
    Под <span class="notranslate">RoadRunner</span> необходимо будет изменить файл <span class="notranslate">/public/index.php</span>, чтобы фреймворк <span class="notranslate">HLEB2</span> выполнялся в цикле.<br>
    Базовый рабочий пример:
</p>

<?= Code::fromFile('@views/docs/code/start/roadrunner.php');  ?>

<p>
    Для <span class="notranslate">RoadRunner</span> также нужно создать конфигурационный файл <span class="notranslate">.rr.yaml</span> в корневой директории проекта (предполагается, что скомпилированный файл сервера c названием <b><span class="notranslate">rr</span></b> находится там же).<br>
    Пример минимальной рабочей конфигурации в .rr.yaml:
</p>

<pre class="hl-text-block notranslate">
version: '3'
server:
    command: 'php ./public/index.php'
http:
    address: :8088
    middleware:
        - gzip
        - static
    static:
        dir: public
        forbid:
            - .php
            - .htaccess
    pool:
        num_workers: 6
        max_jobs: 64
        debug: false
        supervisor:
            max_worker_memory: 5
metrics:
    address: '127.0.0.1:2113'

</pre>

<p>
    В данной конфигурации <span class="notranslate">RoadRunner</span> работа одного процесса (воркера) ограничена по выставленному максимуму допустимой памяти в настройках: <span class="notranslate">http.pool.supervisor.max_worker_memory</span> в мегабайтах.
    Поэтому, если процесс превысил этот лимит, <span class="notranslate">RoadRunner</span> его правильно завершает и приступает к следующему.
</p>

<p>
    Сервер <span class="notranslate">RoadRunner</span> запускается консольной командой:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>./rr serve</p>

<p>
    Согласно конфигурации, приложение будет доступно по адресу:<br> <a href="http://localhost:8088" target="_blank">http://localhost:8088</a>
</p>
<p>
    Метрики работы сервера в формате <span class="notranslate">Prometheus</span>:<br> <a href="http://localhost:2113" target="_blank">http://localhost:2113</a>
</p>

<?= Link::previousPage('docs.2.0.start.apache.page', 'Запуск с помощью Apache'); ?>

<?= Link::nextPage('docs.2.0.start.swoole.page', 'Сервер Swoole'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

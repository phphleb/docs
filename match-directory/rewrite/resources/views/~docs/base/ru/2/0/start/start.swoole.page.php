<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Swoole') ?>

<p>
    <a href="https://openswoole.com/" target="_blank"><span class="notranslate">Open Swoole</span></a> (ранее имевший название <span class="notranslate">Swoole</span>) — это высокопроизводительная платформа для асинхронного запуска подпрограмм на PHP.
</p>
<p>
    <span class="notranslate">Swoole</span> устанавливается как расширение для <span class="notranslate">PHP</span>.
    На данный момент <span class="notranslate">Swoole</span> поддерживается только для <span class="notranslate">Linux</span> и <span class="notranslate">Mac</span>
</p>
<p>
    Стоит иметь в виду, что <span class="notranslate">Swoole</span> не работает с <span class="notranslate">xDebug</span>, самым популярным инструментом отладки в экосистеме <span class="notranslate">PHP</span>, а также плохо совместим с некоторыми другими инструментами профилирования и мониторинга.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    Для <span class="notranslate">Swoole</span> необходимо будет изменить файл <span class="notranslate">/public/index.php</span>, чтобы фреймворк <span class="notranslate">HLEB2</span> выполнялся в цикле.
    Базовый рабочий пример:
</p>

<?= Code::fromFile('@views/docs/code/start/swoole.php');  ?>

<p>
    Сервер <span class="notranslate">Swoole</span> запускается консольной командой:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php</p>

<p>
    Согласно настройкам, приложение будет доступно по адресу:<br> <a href="http://localhost:9504" target="_blank">http://localhost:9504</a>
</p>

<?= Link::previousPage('docs.2.0.start.workerman.page', 'Сервер Workerman'); ?>

<?= Link::nextPage('docs.2.0.start.hosting.page', 'Изпользование хостинга'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

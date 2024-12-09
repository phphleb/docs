<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Workerman') ?>

<p>
    <a href="https://manual.workerman.net/doc/en/" target="blank"><span class="notranslate">Workerman</span></a> is a highly efficient tool for building asynchronous servers in <span class="notranslate">PHP</span>. It is designed for working with WebSockets, <span class="notranslate">HTTP</span> servers, chat applications, <span class="notranslate">APIs</span>, and other network-based applications.
</p>
<p>
    <span class="notranslate">Workerman</span> works without the need for additional extensions or dependencies since it is fully implemented in pure <span class="notranslate">PHP</span>. This makes it cross-platform and simple to install.
</p>
<p>
    Notably, <span class="notranslate">Workerman</span> supports both <span class="notranslate">HTTP</span> and <span class="notranslate">HTTPS</span>, allows working with WebSockets, and easily scales to handle a large number of connections concurrently. This makes it suitable for creating <span class="notranslate">realtime</span> applications, such as chat systems, notification services, and streaming servers.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    You can install <span class="notranslate">Workerman</span> via <span class="notranslate">Composer</span> as a standard <span class="notranslate">PHP</span> library. More details can be found in the <a href="https://manual.workerman.net/doc/en/install/install.html" target="blank">installation guide</a>.
</p>

<p>
    Under <span class="notranslate">Workerman</span>, you need to modify the <span class="notranslate">/public/index.php</span> file so that the <span class="notranslate">HLEB2</span> framework runs in a loop.<br>
    Basic working example:
</p>

<?= Code::fromFile('@views/docs/code/start/workerman.php', true);  ?>

<p>
    The <span class="notranslate">Workerman</span> server is started with the following console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php start</p>

<p>
    According to the specified settings, the application will be available at: <a href="http://127.0.0.1:2345" target="blank">http://127.0.0.1:2345</a>
</p>

<?= Link::previousPage('docs.2.0.start.roadrunner.page', 'Running with Roadrunner'); ?>

<?= Link::nextPage('docs.2.0.start.swoole.page', 'Swoole Server'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

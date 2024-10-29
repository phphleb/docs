<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Swoole') ?>

<p>
    <a href="https://openswoole.com/" target="_blank"><span class="notranslate">Open Swoole</span></a> (previously known as <span class="notranslate">Swoole</span>) is a high-performance platform for asynchronous execution of subprocesses in PHP.
</p>
<p>
    <span class="notranslate">Swoole</span> is installed as an extension for <span class="notranslate">PHP</span>.
    Currently, <span class="notranslate">Swoole</span> is supported only for <span class="notranslate">Linux</span> and <span class="notranslate">Mac</span>.
</p>
<p>
    It's important to note that <span class="notranslate">Swoole</span> does not work with <span class="notranslate">xDebug</span>, the most popular debugging tool in the <span class="notranslate">PHP</span> ecosystem, and is also poorly compatible with some other profiling and monitoring tools.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    For <span class="notranslate">Swoole</span>, you will need to modify the <span class="notranslate">/public/index.php</span> file to ensure the <span class="notranslate">HLEB2</span> framework runs in a loop.
    A basic working example:
</p>

<?= Code::fromFile('@views/docs/code/start/swoole.php');  ?>

<p>
    The <span class="notranslate">Swoole</span> server is started with the console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php</p>

<p>
    According to the configuration, the application will be accessible at the address:<br> <a href="http://localhost:9504" target="_blank">http://localhost:9504</a>
</p>

<?= Link::previousPage('docs.2.0.start.roadrunner.page', 'RoadRunner Server'); ?>

<?= Link::nextPage('docs.2.0.start.hosting.page', 'Using Hosting'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

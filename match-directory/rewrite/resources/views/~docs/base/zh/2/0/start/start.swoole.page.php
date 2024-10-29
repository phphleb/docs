<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Swoole') ?>

<p>
    <a href="https://openswoole.com/" target="_blank"><span class="notranslate">Open Swoole</span></a>（以前称为 <span class="notranslate">Swoole</span>）是一个高性能的 PHP 异步子进程执行平台。
</p>
<p>
    <span class="notranslate">Swoole</span> 作为一个扩展安装到 <span class="notranslate">PHP</span> 中。
    目前，<span class="notranslate">Swoole</span> 仅支持 <span class="notranslate">Linux</span> 和 <span class="notranslate">Mac</span>。
</p>
<p>
    需要注意的是，<span class="notranslate">Swoole</span> 不支持 <span class="notranslate">xDebug</span>，这是 <span class="notranslate">PHP</span> 生态系统中最流行的调试工具，并且与其他一些性能剖析和监控工具不兼容。
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    对于 <span class="notranslate">Swoole</span>，您需要修改 <span class="notranslate">/public/index.php</span> 文件，以确保 <span class="notranslate">HLEB2</span> 框架在循环中运行。
    一个基本的工作示例：
</p>

<?= Code::fromFile('@views/docs/code/start/swoole.php');  ?>

<p>
    使用控制台命令启动 <span class="notranslate">Swoole</span> 服务器:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php</p>

<p>
    根据配置，应用程序可以通过以下地址访问：<br> <a href="http://localhost:9504" target="_blank">http://localhost:9504</a>
</p>

<?= Link::previousPage('docs.2.0.start.roadrunner.page', 'RoadRunner 服务器'); ?>

<?= Link::nextPage('docs.2.0.start.hosting.page', '使用托管'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

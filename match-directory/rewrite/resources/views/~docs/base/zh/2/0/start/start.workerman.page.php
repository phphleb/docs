<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Workerman') ?>

<p>
    <a href="https://manual.workerman.net/doc/zh-cn/" target="blank"><span class="notranslate">Workerman</span></a> 是一个高效的工具，用于在 <span class="notranslate">PHP</span> 中构建异步服务器。它专为处理 WebSocket、<span class="notranslate">HTTP</span> 服务器、聊天应用、<span class="notranslate">API</span> 和其他网络应用程序而设计。
</p>
<p>
    <span class="notranslate">Workerman</span> 在无需任何额外的扩展或依赖的情况下工作，因为它完全使用纯 <span class="notranslate">PHP</span> 实现。这使其成为跨平台且易于安装的解决方案。
</p>
<p>
    值得注意的是，<span class="notranslate">Workerman</span> 同时支持 <span class="notranslate">HTTP</span> 和 <span class="notranslate">HTTPS</span>，可处理 WebSocket，并能轻松扩展以同时处理大量连接。正因如此，它适用于创建<span class="notranslate">实时</span>应用程序，例如聊天系统、通知服务和流媒体服务器。
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    你可以通过 <span class="notranslate">Composer</span> 将 <span class="notranslate">Workerman</span> 安装为一个标准的 <span class="notranslate">PHP</span> 库。详细信息请参阅 <a href="https://manual.workerman.net/doc/zh-cn/install/install.html" target="blank">安装指南</a>。
</p>

<p>
    在 <span class="notranslate">Workerman</span> 下，你需要修改 <span class="notranslate">/public/index.php</span> 文件，使 <span class="notranslate">HLEB2</span> 框架能够在循环中运行。<br>
    基本工作示例：
</p>

<?= Code::fromFile('@views/docs/code/start/workerman.php', true);  ?>

<p>
    可以使用以下控制台命令启动 <span class="notranslate">Workerman</span> 服务器：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php ./public/index.php start</p>

<p>
    根据指定设置，应用将可通过以下地址访问：<a href="http://127.0.0.1:2345" target="blank">http://127.0.0.1:2345</a>
</p>

<?= Link::previousPage('docs.2.0.start.roadrunner.page', '使用 Roadrunner 启动'); ?>

<?= Link::nextPage('docs.2.0.start.swoole.page', 'Swoole 服务器'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

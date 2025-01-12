<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('WebRotor') ?>

<p>
    <span class="notranslate">WebRotor</span> 是一个 PHP 库，支持在共享主机上实现应用的异步执行。
    众所周知，<span class="notranslate">shared hosting</span> 有许多使用限制，但这个专用程序甚至可以在共享主机上带来异步功能的所有优势。
</p>
<p>
    <span class="notranslate">WebRotor</span> 的核心原理是，当应用接收到请求时，索引文件不会直接处理请求，而是将其发送到工作进程（workers），再接收返回的响应用于显示。
    此外，工作进程实际上由同一个索引文件的代码实现。
    这些工作进程是常见的类似 <span class="notranslate">CRON</span> 的进程，这些在几乎每个主机服务中都可以找到。
    配置这些工作进程的区别仅在于主机服务管理面板的界面设计差异。
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    要使用 <span class="notranslate">WebRotor</span>，需要修改文件 <span class="notranslate">/public_html/index.php</span>（这是共享主机上索引文件的假定路径），以让 <span class="notranslate">HLEB2</span> 框架在循环中运行。
    这是一个基本的工作示例：
</p>

<?= Code::fromFile('@views/docs/code/start/webrotor.php'); ?>

<p class="hl-info-block">
    此代码使用了 <span class="notranslate">HTTP</span> 客户端库 <span class="notranslate">nyholm/psr7</span> 和 <span class="notranslate">nyholm/psr7-server</span>，需要额外安装。
</p>

<p>
    为完成该配置，还需要在主机上启动 “workers”，这些实际上是主机服务提供的类似 <span class="notranslate">CRON</span> 的进程。
    通常，它们在主机管理面板中配置，尽管界面可能不同，但原则相同。你需要以两分钟的间隔启动两个处理程序（如前述设置）：
</p>

<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=1</p>
<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=2</p>

<p>
    这两个进程的唯一区别是工作进程的<span class="notranslate">ID</span>编号。完成后，所有传入的应用请求会由两个异步工作进程处理。<br>
    更多细节请参考库文档：<a href="https://github.com/phphleb/webrotor" target="_blank"><span class="notranslate">github.com/phphleb/webrotor</span></a>
</p>

<p>
    在本地开发中，可以不运行工作进程（workers），因为如果它们未运行或处于非激活状态，请求将以通常的方式处理。
    这样，在本地可以使用常规的调试工具，例如 <span class="notranslate">xDebug</span>。
</p>

<?= Link::previousPage('docs.2.0.start.hosting.page', '共享主機'); ?>

<?= Link::nextPage('docs.2.0.routes.page', '路由'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

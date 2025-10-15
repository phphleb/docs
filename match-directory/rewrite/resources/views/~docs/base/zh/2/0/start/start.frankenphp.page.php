<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('FrankenPHP') ?>

<p>
    <span class="notranslate">FrankenPHP</span> 是一个为 <span class="notranslate">PHP</span> 设计的现代应用服务器，具有高性能，并支持异步任务、<span class="notranslate">HTTP/2</span>、<span class="notranslate">HTTP/3</span> 和 <span class="notranslate">WebSockets</span>。该服务器既可作为独立应用程序运行，也可作为多个 Web 服务器（例如 <span class="notranslate">Caddy</span>）的扩展模块。<br>
    该 Web 服务器使用 <span class="notranslate">Go</span> 编写，并通过 <span class="notranslate">CGO</span> 深度集成 <span class="notranslate">PHP</span>，实现极低的资源消耗和高效的请求处理。它兼容标准 <span class="notranslate">PHP</span> 扩展、调试工具（如 <span class="notranslate">Xdebug</span>），以及与性能分析器和监控系统集成。
</p>
<p class="hl-info-block">
    <span class="notranslate">FrankenPHP</span> 对 <span class="notranslate">Windows</span> 的支持非常有限。
</p>
<p>
    <span class="notranslate">FrankenPHP</span> 服务器以二进制文件和 <span class="notranslate">Docker</span> 镜像形式发布。最新版可在官方 <a href="https://github.com/dunglas/frankenphp" target="blank"><span class="notranslate">GitHub</span> 仓库</a> 获取。安装流程详见官方文档：<a href="https://frankenphp.dev/docs/" target="blank">frankenphp.dev/docs</a>。
</p>
<p>
    <span class="notranslate">FrankenPHP</span> 支持多种运行模式，此处展示最基础的本地启动方式，足以让你开始使用这个框架并验证其与该 Web 服务器的兼容性。<br>
    对于 <span class="notranslate">HLEB2</span> 框架，只需在项目根目录下指明 public 目录路径即可启动：
</p>
<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>frankenphp php-server -r public/ --listen 127.0.0.1:8080</p>
<p>
    这里为本地开发环境指定了具体的地址和端口。请确保该端口未被占用。
</p>
<p>
    之后，你的应用将可通过以下地址访问：<br> <a href="http://127.0.0.1:8080" target="blank">http://127.0.0.1:8080</a>
</p>

<?= Link::previousPage('docs.2.0.start.webrotor.page', 'WebRotor'); ?>

<?= Link::nextPage('docs.2.0.routes.page', '路由'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

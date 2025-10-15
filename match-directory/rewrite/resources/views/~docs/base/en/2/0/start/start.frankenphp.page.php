<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('FrankenPHP') ?>

<p>
    <span class="notranslate">FrankenPHP</span> is a modern application server for <span class="notranslate">PHP</span>, designed for high performance with support for asynchronous tasks, <span class="notranslate">HTTP/2</span>, <span class="notranslate">HTTP/3</span>, and <span class="notranslate">WebSockets</span>. The server can function as a standalone application or as an extension for various web servers, such as <span class="notranslate">Caddy</span>.<br>
    This web server is written in <span class="notranslate">Go</span> and leverages <span class="notranslate">CGO</span> for deep integration with <span class="notranslate">PHP</span>, delivering minimal overhead and fast request handling. It supports standard <span class="notranslate">PHP</span> extensions, debugging tools (e.g., <span class="notranslate">Xdebug</span>), as well as integration with profilers and monitoring systems.
</p>
<p class="hl-info-block">
    <span class="notranslate">FrankenPHP</span> has limited support for <span class="notranslate">Windows</span>.
</p>
<p>
    The <span class="notranslate">FrankenPHP</span> server is distributed as binary files and <span class="notranslate">Docker</span> images. The latest releases can be found in the official <a href="https://github.com/dunglas/frankenphp" target="blank"><span class="notranslate">GitHub</span> repository</a>. Installation instructions are available in the server documentation at <a href="https://frankenphp.dev/docs/" target="blank">frankenphp.dev/docs</a>.
</p>
<p>
    <span class="notranslate">FrankenPHP</span> operates in several modes; this example demonstrates the simplest way to get started locally with the framework and to verify that it is compatible with this web server.<br>
    For the <span class="notranslate">HLEB2</span> framework, simply specify the path to the public directory when launching from the project root:
</p>
<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>frankenphp php-server -r public/ --listen 127.0.0.1:8080</p>
<p>
    Here, an explicit address and port have been assigned for local development. Make sure this port is not in use.
</p>
<p>
    Your application will now be accessible at:<br> <a href="http://127.0.0.1:8080" target="blank">http://127.0.0.1:8080</a>
</p>

<?= Link::previousPage('docs.2.0.start.webrotor.page', 'WebRotor'); ?>

<?= Link::nextPage('docs.2.0.routes.page', 'Routing'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

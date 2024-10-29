<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('RoadRunner') ?>

<p>
    <span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">RoadRunner</a></span> 是一个高性能的 <span class="notranslate">PHP</span> 应用服务器、负载均衡器和进程管理器。<br>
    <span class="notranslate">RoadRunner</span> 是用 <span class="notranslate">Go</span> 编写的，易于安装，并且功能上替代了 <span class="notranslate">PHP-FPM</span>。
    它支持 <span class="notranslate">xDebug</span> 及其替代品，以及诸如 <span class="notranslate">Datadog</span> 和 <span class="notranslate">New Relic</span> 的性能分析和监控工具。
    更多详情请参见 <span class="notranslate">RoadRunner</span> 的 <a href="https://roadrunner.dev/docs/php-debugging" rel="nofollow" target="_blank">文档</a>。
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    要安装 <span class="notranslate">RoadRunner</span> 的服务器资源，请使用官方仓库: <span class="hl-nowrap"><span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">github.com/roadrunner-server/roadrunner</a></span></span>。
</p>
<p>
    对于 <span class="notranslate">RoadRunner</span>，您需要修改文件 <span class="notranslate">/public/index.php</span> 以便让 <span class="notranslate">HLEB2</span> 框架在循环中运行。<br>
    基本工作的示例：
</p>

<?= Code::fromFile('@views/docs/code/start/roadrunner.php');  ?>

<p>
    对于 <span class="notranslate">RoadRunner</span>，还需要在项目根目录创建一个配置文件 <span class="notranslate">.rr.yaml</span>  (假设编译后的服务器文件名为 <b><span class="notranslate">rr</span></b> 也在该目录下)。<br>
    .rr.yaml 中最小工作配置的示例：
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
    在此配置中，<span class="notranslate">RoadRunner</span> 通过设置允许的最大内存来限制单个进程（worker）的操作：<span class="notranslate">http.pool.supervisor.max_worker_memory</span>，单位为兆字节。
    因此，如果进程超出了此限制，<span class="notranslate">RoadRunner</span> 将正确地终止它并继续下一个。
</p>

<p>
    使用控制台命令启动 <span class="notranslate">RoadRunner</span> 服务器:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>./rr serve</p>

<p>
    根据配置，应用程序可以通过以下地址访问：<br> <a href="http://localhost:8088" target="_blank">http://localhost:8088</a>
</p>
<p>
    服务器的监控指标使用 <span class="notranslate">Prometheus</span> 格式：<br> <a href="http://localhost:2113" target="_blank">http://localhost:2113</a>
</p>

<?= Link::previousPage('docs.2.0.start.apache.page', '通过 Apache 启动'); ?>

<?= Link::nextPage('docs.2.0.start.swoole.page', 'Swoole 服务器'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

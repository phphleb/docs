<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('RoadRunner') ?>

<p>
    <span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">RoadRunner</a></span> is a high-performance application server <span class="notranslate">PHP</span>, load balancer, and process manager.<br>
    <span class="notranslate">RoadRunner</span> is written in <span class="notranslate">Go</span>, is easy to install, and acts as a replacement for <span class="notranslate">PHP-FPM</span>.
    It supports <span class="notranslate">xDebug</span> and its alternatives, as well as profiling and monitoring tools like <span class="notranslate">Datadog</span> and <span class="notranslate">New Relic</span>.
    For more details, refer to the <a href="https://roadrunner.dev/docs/php-debugging" rel="nofollow" target="_blank">documentation</a> of <span class="notranslate">RoadRunner</span>.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    To install the server resources for <span class="notranslate">RoadRunner</span>, use the official repository: <span class="hl-nowrap"><span class="notranslate"><a href="https://github.com/roadrunner-server/roadrunner" target="_blank" rel="nofollow">github.com/roadrunner-server/roadrunner</a></span></span>.
</p>
<p>
    For <span class="notranslate">RoadRunner</span>, you will need to modify the file <span class="notranslate">/public/index.php</span> so that the <span class="notranslate">HLEB2</span> framework operates in a loop.<br>
    Here’s a basic working example:
</p>

<?= Code::fromFile('@views/docs/code/start/roadrunner.php');  ?>

<p>
    For <span class="notranslate">RoadRunner</span>, you also need to create a configuration file <span class="notranslate">.rr.yaml</span> in the root directory of the project (assuming the compiled server file named <b><span class="notranslate">rr</span></b> is located there).<br>
    An example of a minimal working configuration in .rr.yaml:
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
    In this configuration, <span class="notranslate">RoadRunner</span> limits the operation of a single process (worker) by the maximum allowable memory setting: <span class="notranslate">http.pool.supervisor.max_worker_memory</span> in megabytes.
    Therefore, if the process exceeds this limit, <span class="notranslate">RoadRunner</span> properly terminates it and proceeds to the next one.
</p>

<p>
    The <span class="notranslate">RoadRunner</span> server is started with the console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>./rr serve</p>

<p>
    According to the configuration, the application will be accessible at the address:<br> <a href="http://localhost:8088" target="_blank">http://localhost:8088</a>
</p>
<p>
    Server metrics in <span class="notranslate">Prometheus</span> format:<br> <a href="http://localhost:2113" target="_blank">http://localhost:2113</a>
</p>

<?= Link::previousPage('docs.2.0.start.apache.page', 'Launch with Apache'); ?>

<?= Link::nextPage('docs.2.0.start.workerman.page', 'Workerman Server'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

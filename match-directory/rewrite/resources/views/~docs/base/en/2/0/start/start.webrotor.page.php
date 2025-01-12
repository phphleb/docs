<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('WebRotor') ?>

<p>
    <span class="notranslate">WebRotor</span> is a PHP library that allows asynchronous execution of applications on shared hosting.
    As is known, <span class="notranslate">shared hosting</span> has many usage restrictions, but this specialized program provides all the benefits of asynchronous functionality even on shared hosting.
</p>
<p>
    The core principle of <span class="notranslate">WebRotor</span> is that when a request is made to the application, the index file does not process the requests directly but rather sends them to workers and fetches the responses back for display.
    Moreover, the worker is actually implemented as the code of this same index file.
    The workers are standard <span class="notranslate">CRON</span>-like processes, which are now available on practically every hosting provider.
    The difference in configuring these workers lies only in the designs of hosting providers' admin panels.
</p>

<?php require __DIR__ . '/async.text.php'; ?>

<p>
    To use <span class="notranslate">WebRotor</span>, you will need to modify the <span class="notranslate">/public_html/index.php</span> file (which is the presumed path to the index file on shared hosting) so that the <span class="notranslate">HLEB2</span> framework runs in a loop.
    Here is a basic working example:
</p>

<?= Code::fromFile('@views/docs/code/start/webrotor.php'); ?>

<p class="hl-info-block">
    This code uses the <span class="notranslate">HTTP</span> client libraries <span class="notranslate">nyholm/psr7</span> and <span class="notranslate">nyholm/psr7-server</span>, which need to be installed additionally.
</p>

<p>
    To complete this configuration, you will also need to launch "workers" on your hosting. These are essentially the <span class="notranslate">CRON</span>-like processes provided by the hosting service.
    Typically, they are configured in the hosting admin panel, and while the design of the panel can vary, the principle remains the same. You need to launch two handlers at a two-minute interval (as shown in the settings above):
</p>

<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=1</p>
<p class="hl-bash-block">*/2 * * * * /usr/local/bin/php7.2 /my-project/public_html/index.php --id=2</p>

<p>
    These two processes differ only in the <span class="notranslate">ID</span> number for the workers. After this, all requests coming to the application will be handled by two asynchronous workers.<br>
    For more details, refer to the library documentation: <a href="https://github.com/phphleb/webrotor" target="_blank"><span class="notranslate">github.com/phphleb/webrotor</span></a>
</p>

<p>
    For local development, you can avoid running workers, as requests will be processed in the usual manner if they are not running or inactive.
    This way, standard debugging tools, such as <span class="notranslate">xDebug</span>, will be available locally.
</p>

<?= Link::previousPage('docs.2.0.start.hosting.page', 'Shared hosting'); ?>

<?= Link::nextPage('docs.2.0.routes.page', 'Routing'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

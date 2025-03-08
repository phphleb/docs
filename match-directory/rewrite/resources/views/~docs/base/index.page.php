<?php

use Hleb\Static\System;
use Phphleb\Docs\Config;use Phphleb\Docs\Src\Link;

/** @var \App\Bootstrap\ContainerInterface $container */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="description" content="Framework HLEB"/>
    <meta name="theme-color" content="#ff786c"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/hlresource/docs/v<?= Config::API_VERSION ?>/css/index"/>
    <!--Icons-->
    <link rel="apple-touch-icon" sizes="128x128" href="https://<?php echo $container->request()->getHost(); ?>/docs/touch-icon/apple-touch-icon.png">
    <link rel="mask-icon" href="/docs/touch-icon/safari-pinned-tab.svg" color="#4c7ab5">
    <meta name="msapplication-TileColor" content="#603cba">
    <link rel="icon" type="image/png" sizes="32x32" href="/docs/touch-icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/docs/touch-icon/favicon-16x16.png">
    <meta name="msapplication-config" content="/docs/touch-icon/browserconfig.xml">
    <meta name="theme-color" content="#ea1f61">
    <link rel="manifest" href="/docs/touch-icon/site.webmanifest">
    <!-- -->
    <title>Documentation of PHP framework HLEB2</title>
</head>
<body>
<?php
    if ($container->request()->getHost() === 'hleb2framework.ru'):
?>
<div class="hl-code-backend"><img src="/docs/images/code.png?v=<?= Config::API_VERSION ?>" alt="backend" width="283" height="198"></div>
<?php else: ?>
<div class="hl-demo-index-page">Demo content on <?= $container->request()->getHostName(); ?></div>
<?php endif; ?>
<div align="center">
    <h2 id="hl-main-title"><span class="notranslate">HLEB2</span></h2>
    <div id="hl-main-description">PHP Framework</div>

    <img src="/hlresource/framework/v<?= System::getApiVersion() ?>/svg/logo" width="200" height="200" alt="HL"><br>

    <div class="hl-index-links">
    <a href="<?= Link::url('docs.2.0.introduction.page', 'en', true) ?>"><div class="hl-link">In English</div></a>
    <div class="hl-index-separator">|</div>
    <a href="<?= Link::url('docs.2.0.introduction.page', 'zh', true) ?>"><div class="hl-link">简体中文</div></a>
    <div class="hl-index-separator">|</div>
    <a href="<?= Link::url('docs.2.0.introduction.page', 'ru', true) ?>"><div class="hl-link">На русском</div></a>
    </div>

</div>
    <div id="hl-header-line">
        <a href="https://github.com/phphleb/hleb/" rel="nofollow">
            <img src="/docs/svg/github.svg?v=<?= Config::API_VERSION ?>" width="40" height="40" alt="Project on Github">
        </a>
    </div>
    <div id="hl-footer">
        <span class="hl-nowrap"><b>© <span class="notranslate">Foma Tuturov</span> 2019-<?= date('Y');  ?></b></span>
    </div>
</body>
</html>

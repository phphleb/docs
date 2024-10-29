<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Installation and Hosting Launch') ?>

<p>
    The installation requirements may vary on different hosting providers, but there are basic nuances that will be noted here.
</p>

<?= Paragraph::h2('Disabling DEBUG Mode') ?>

<p>
    Debug mode should be disabled on any public server, and hosting servers are no exception.<br>
    To separate settings from local development, copy the file <span class="notranslate">/config/common.php</span> as <span class="notranslate">/config/common-local.php</span> and disable the <span class="notranslate">debug</span> mode in the first, and enable it in the second.<br>
    Now, if the file <span class="notranslate">/config/common-local.php</span> is not uploaded to the hosting server, the settings will differ.
</p>

<?= Paragraph::h2('Strict Project Structure') ?>

<p>
    Often on hosting servers, the public folder is named <span class="notranslate">public_html</span>, but it could be different. To use this folder, simply rename the <span class="notranslate">public</span> folder in a project with the framework.
    <a href="<?= Link::url('docs.2.0.installation.page'); ?>">Learn more</a> about changing the public folder name.
</p>
<p>
    It's possible that the hosting recommendations suggest placing the project in <span class="notranslate">public_html</span>, but according to the framework structure, it should be placed one directory higher to ensure alignment of public folders when migrating data.
</p>

<?= Paragraph::h2('Using Databases') ?>

<p>
    The hosting provider will likely provide a database and a method to connect to it. These settings may differ from local development settings.
    To resolve this, create a copy of the file <span class="notranslate">/config/database.php</span>, name it <span class="notranslate">/config/database-local.php</span> and set the hosting settings in the first, and local settings in the copy.
    Now, if the file <span class="notranslate">/config/database-local.php</span> is not transferred to the hosting server, the settings will be distinct.
</p>

<?= Paragraph::h2('Task Scheduler') ?>

<p>
    The framework includes both built-in console commands and those defined by the developer.
    If the host offers a task scheduling mechanism, these console commands can be scheduled as tasks.
</p>
<p>
    You may need to specify the full path to the PHP executable when setting a task in the scheduler.<br>
    For example:
</p>

<p class="hl-text-block"><span class="hl-not-selected notranslate">/usr/local/bin/php8.2 ~/project/dir/console rotate-logs 5</span></p>

<p>
    An alternative to running console commands manually is using a special <a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web Console</a> of the framework.
</p>

<?= Link::previousPage('docs.2.0.start.swoole.page', 'Swoole Server'); ?>

<?= Link::nextPage('docs.2.0.routes.page', 'Routing'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

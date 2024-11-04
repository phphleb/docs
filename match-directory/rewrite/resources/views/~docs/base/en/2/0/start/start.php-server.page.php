<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Built-in PHP Web Server') ?>

<p>
    After installing the <span class="notranslate">HLEB2</span> framework, you can verify its functionality and settings using the built-in <span class="notranslate">PHP</span> web server.<br>
    Here’s a <a href="https://www.php.net/manual/en/features.commandline.webserver.php" target="_blank">link</a> to the official documentation.<br>
</p>

<p class="hl-danger-block">
    For Linux, the permissions on resources created by the framework (cache) will be set by the terminal user, so if you have not configured permissions previously, the pages may become inaccessible to another web server afterward.
    Only a complete cache clearance of the framework and routes using <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">console commands</a> can help.
</p>

<p>
    You can check the framework by executing the following command (from the root directory of the installed project):
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php -S localhost:8000 -t public</p>

<p class="hl-info-block">
    Port 8000 may already be in use for <span class="notranslate">localhost</span>, in which case replace it with another free port, such as 8001 or 8002.
</p>

<p>
    Since the <span class="notranslate">public</span> folder (unless you changed its name earlier) is the public directory of the project, after executing this command, the welcome page of the framework will be accessible at <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>.
</p>

<p class="hl-danger-block">
    The built-in <span class="notranslate">PHP</span> web server does not support full server functionalities and should not be used on public networks.
</p>

<?= Link::previousPage('docs.2.0.directories.page', 'Project Structure'); ?>

<?= Link::nextPage('docs.2.0.start.nginx.page', 'Running with Nginx'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

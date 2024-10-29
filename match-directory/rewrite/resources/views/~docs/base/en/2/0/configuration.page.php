<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Configuration Setup') ?>

<p>
    The settings for the <span class="notranslate">HLEB2</span> framework are stored in configuration files within the <span class="notranslate">/<b>config</b>/</span> folder.<br>
    At the beginning of some of these files, you might find a line similar to this:
</p>

<?= Code::fromFile('@views/docs/code/configuration.example.php', false);  ?>

<p>
    This code indicates that if the file <span class="notranslate">common-local.php</span> exists in this folder, its settings will be used instead of the current ones (from the <span class="notranslate">common.php</span> file).
</p>
<p>
    Therefore, you can create copies of these files with the addition of <span class="notranslate">'-local'</span> to their names and use them for local development without adding them to version control (i.e., without pushing them to the target server). In these copied files, make sure to remove this line of code, as it is no longer necessary.
</p>
<p>
    Separate configurations for local development and the final server provide convenience for setup.
</p>

<p class="hl-info-block">
    The framework allows retrieval of any configuration value by its name, so these settings can also be used for initializing third-party libraries.
</p>

<?= Paragraph::h2('Debug Mode') ?>

<p>
    In <span class="notranslate">DEBUG</span> mode, the framework operates slightly differently than usual, displaying debugging information and errors that should not be accessible on a public resource.
</p>

<p class="hl-danger-block">
    The framework's debug mode should only be used for internal development.
</p>

<p>
    To disable/enable debug mode, change the <span class="notranslate"><b>debug</b></span> value in the <span class="notranslate">/config/common.php</span> file as needed.
</p>
<p>
    Similarly, other configuration settings can be modified.
</p>

<?= Paragraph::h2('Caching') ?>

<p>
    In debug mode, it is also helpful to disable caching performed by the framework. The setting <span class="notranslate"><b>app.cache.on</b></span> in the <span class="notranslate">/config/common.php</span> file controls this.
</p>

<?= Paragraph::h2('Automatic Route Cache Update') ?>

<p>
    The framework has built-in automatic route cache updates by default when developers make changes to them.<br>
    This feature is convenient for local development, but as request volume increases, you might disable auto-updating on a production server and use a special console command whenever changes are made. The auto-update mode is adjusted by the <span class="notranslate"><b>routes.auto-update</b></span> parameter in the <span class="notranslate">/config/common.php</span> file.
</p>

<?= Paragraph::h2('Logging Errors') ?>


<p>
    By default, information about errors is saved in the files located in the <span class="notranslate">/storage/logs/</span> folder.
    If <span class="notranslate">DEBUG</span> mode is enabled, errors may also be displayed to the user (in the browser or via <span class="notranslate">API</span>).<br>
    The error level can be configured in the <span class="notranslate"><b>error.reporting</b></span> setting of the <span class="notranslate">/config/common.php</span> file.
    Initially, all levels of <span class="notranslate">PHP</span> errors are reported (recommended setting).
</p>

<?= Paragraph::h2('Timezone') ?>

<p>
    The <span class="notranslate"><b>timezone</b></span> setting in the <span class="notranslate">/config/common.php</span> file specifies the timezone for date/time functions.<br>
    Default: <span class="notranslate">'Europe/Moscow'</span>.
</p>

<?= Paragraph::h2('Database Settings') ?>

<p>
    The <span class="notranslate">/config/database.php</span> file contains settings for the databases in use.
    Initially, it provides several different examples.<br>
    Within the configuration file, the list of configurations is a nested array with the key <span class="notranslate">'db.settings.list'</span>, from which the default settings block is selected, indicated by the <span class="notranslate"><b>'base.db.type'</b></span> option.
</p>

<?= Link::previousPage('docs.2.0.tuning.page', 'Setting up the framework'); ?>

<?= Link::nextPage('docs.2.0.directories.page', 'Project Structure'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

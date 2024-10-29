<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Settings') ?>

<p>
    The <span class="notranslate"><b>Settings</b></span> service allows you to obtain standard or custom framework settings from the files within the <span class="notranslate">/config/</span> directory.
</p>
<p>
    Methods of using <span class="notranslate">Settings</span> in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) exemplified by retrieving the designated timezone from the <span class="notranslate">/config/common.php</span> file:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.container.php', false);  ?>

<p>
    Example of accessing <span class="notranslate">Settings</span> within application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.static.php', false);  ?>

<p>
    The <span class="notranslate">Settings</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the interface <span class="notranslate">Hleb\Reference\Interface\Setting</span>.
</p>
<p>
    Settings are divided into four groups: <span class="notranslate">'common'</span>, <span class="notranslate">'main'</span>, <span class="notranslate">'database'</span>, and <span class="notranslate">'system'</span>.
    They correspond to the configuration files within the <span class="notranslate">/config/</span> directory. If a different file is being used, such as <span class="notranslate">'main-local.php'</span> instead of <span class="notranslate">'main.php'</span>, the setting must still be retrieved using the name <span class="notranslate">'main'</span>.
</p>
<p>
    The service methods - <span class="notranslate"><b>common()</b></span>, <span class="notranslate"><b>main()</b></span>, <span class="notranslate"><b>database()</b></span>, and <span class="notranslate"><b>system()</b></span> allow for retrieving parameters from the respective settings. For example:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.example.php', false);  ?>


<?= Link::previousPage('docs.2.0.service.router.page', 'Router'); ?>

<?= Link::nextPage('docs.2.0.service.csrf.page', 'CSRF Protection'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

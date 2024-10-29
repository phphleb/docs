<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Custom Command Names') ?>

<p>
    In addition to generating <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">console command</a> names from the class name and command folder, there is a direct assignment of a name and also the addition of a short name.
</p>
<p>
    To specify a command name, use one of the following constants in the command class.
    These constants must have public visibility (<span class="notranslate">public</span>).
</p>

<p class="hl-info-block">
    All console command names in the project, including short ones, must be unique.
</p>

<?= Paragraph::h2('TASK_NAME Constant') ?>

<p>
    The feature of the class <span class="notranslate">TASK_NAME</span> constant is replacing the automatically determined command name with the one specified in the constant.
</p>

<?= Paragraph::h2('TASK_SHORT_NAME Constant') ?>

<p>
    The class <span class="notranslate">TASK_SHORT_NAME</span> constant allows you to add a short additional name to the automatically generated command name or to the one directly set in <span class="notranslate">TASK_NAME</span>.
</p>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


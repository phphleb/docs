<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('自定义命令名称') ?>

<p>
    除了从类名和命令文件夹生成<a href="<?= Link::url('docs.2.0.console.command.page'); ?>">控制台命令</a>名称之外，还可以直接指定名称以及添加缩写名称。
</p>
<p>
    要指定命令名称，请在命令类中使用以下常量之一。
    这些常量必须具有公共可见性(<span class="notranslate">public</span>)。
</p>

<p class="hl-info-block">
    项目中的所有控制台命令名称，包括缩写的，必须是唯一的。
</p>

<?= Paragraph::h2('TASK_NAME 常量') ?>

<p>
    类常量<span class="notranslate">TASK_NAME</span>的特点是用常量中指定的名称替换自动确定的命令名称。
</p>

<?= Paragraph::h2('TASK_SHORT_NAME 常量') ?>

<p>
    类常量<span class="notranslate">TASK_SHORT_NAME</span>允许向自动生成的命令名称或在<span class="notranslate">TASK_NAME</span>中直接设置的名称添加简短的附加名称。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


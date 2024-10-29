<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('MVC模板生成') ?>

<p>
    在<span class="notranslate">HLEB2</span>框架中，创建模型、控制器和整个模块时，您可以使用专用的控制台命令。
    此外，初始文件模板可以根据开发者的偏好进行定制。
</p>

<?= Paragraph::h2('控制器生成') ?>

<p>
    用于生成控制器类的控制台命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller Demo/ExampleController</p>

<p>
    该命令将创建文件<span class="notranslate">/app/Controllers/Demo/ExampleController.php</span>，其中包含新的控制器类。
</p>
<p>
    要更改创建类的模板，请将文件<span class="notranslate">'controller_class_template.php'</span>从<span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span>复制到文件夹<span class="notranslate">'/app/Optional/Templates/'</span>并进行必要的修改。
</p>

<?= Paragraph::h2('中间件生成') ?>

<p>
    生成新的<span class="notranslate">middleware</span>的控制台命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware Demo/ExampleMiddleware</p>

<p>
    执行后，将创建文件<span class="notranslate">/app/Middlewares/Demo/ExampleMiddleware.php</span>，其中包含<span class="notranslate">middleware</span>类。
</p>
<p>
    要更改原始<span class="notranslate">middleware</span>模板，请将文件<span class="notranslate">'middleware_class_template.php'</span>从<span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span>复制到文件夹<span class="notranslate">'/app/Optional/Templates/'</span>，然后进行更改。
</p>

<?= Paragraph::h2('模型生成') ?>

<p>
    从控制台创建模型类的示例：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model Demo/ExampleModel</p>

<p>
    此命令将创建文件<span class="notranslate">/app/Models/Demo/ExampleModel.php</span>，其中包含模型类。
</p>

<p>
    要更改模型的原始模板，请将文件<span class="notranslate">'model_class_template.php'</span>从<span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span>复制到文件夹<span class="notranslate">'/app/Optional/Templates/'</span>并根据需要进行编辑。
</p>

<?= Paragraph::h2('生成命令类') ?>

<p>
    用于创建新任务的控制台命令，指定任务名称：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task</p>

<p>
    执行后将创建文件<span class="notranslate">app/Commands/Demo/ExampleTask.php</span>。
</p>

<p>
    要对基类进行更改，请将文件<span class="notranslate">'task_class_template.php'</span>从<span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span>复制到文件夹<span class="notranslate">'/app/Optional/Templates/'</span>并根据需要进行调整。
</p>

<?= Paragraph::h2('生成模块') ?>

<p>
    要在<span class="notranslate">'modules'</span>目录中生成<a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">模块</a>的基础文件（名称可以在设置中更改），请执行以下命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module main</p>

<p>
    其中<span class="notranslate">'main'</span>是新模块的名称。
    对于<span class="notranslate">'modules/demo'</span>文件夹中的嵌套模块，请将命令修改如下：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module demo/main</p>

<p>
    如果需要创建自定义模块模板文件，请将目录<span class="notranslate">'/vendor/phphleb/framework/Optional/Modules/example/'</span>中的内容复制到文件夹<span class="notranslate">'/app/Optional/Modules/example/'</span>并对文件进行必要的更改。
</p>

<p class="hl-info-block">
    在修改基文件时，请注意其中包含的特殊标签，这些标签对于正确替换控制台参数是必要的。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


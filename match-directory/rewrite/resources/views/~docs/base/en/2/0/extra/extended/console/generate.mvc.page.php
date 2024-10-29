<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('MVC Template Generation') ?>

<p>
    In the <span class="notranslate">HLEB2</span> framework, when creating Models, Controllers, and entire modules, you can use special console commands.
    Additionally, the initial file templates are customizable according to the developer's own preferences.
</p>

<?= Paragraph::h2('Controller Generation') ?>

<p>
    Console command to generate a Controller class:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller Demo/ExampleController</p>

<p>
    The command will create the file <span class="notranslate">/app/Controllers/Demo/ExampleController.php</span> with the new Controller class.
</p>
<p>
    To change the template for creating a class, copy the file <span class="notranslate">'controller_class_template.php'</span> from <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> to the folder <span class="notranslate">'/app/Optional/Templates/'</span> and make the necessary modifications.
</p>

<?= Paragraph::h2('Middleware Generation') ?>

<p>
    Console command to generate new <span class="notranslate">middleware</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware Demo/ExampleMiddleware</p>

<p>
    After execution, the file <span class="notranslate">/app/Middlewares/Demo/ExampleMiddleware.php</span> with the <span class="notranslate">middleware</span> class will be created.
</p>
<p>
    To modify the original <span class="notranslate">middleware</span> template, copy the file <span class="notranslate">'middleware_class_template.php'</span> from <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> to the folder <span class="notranslate">'/app/Optional/Templates/'</span>, and then make changes.
</p>

<?= Paragraph::h2('Model Generation') ?>

<p>
    Example of creating a Model class from the console:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model Demo/ExampleModel</p>

<p>
    This command will create the file <span class="notranslate">/app/Models/Demo/ExampleModel.php</span> with the Model class.
</p>

<p>
    To change the original template for the Model, copy the file <span class="notranslate">'model_class_template.php'</span> from <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> to the folder <span class="notranslate">'/app/Optional/Templates/'</span> and edit it as needed.
</p>

<?= Paragraph::h2('Generating a Command Class') ?>

<p>
    Console command to create a new task, specifying the task name:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task</p>

<p>
    Upon execution, the file <span class="notranslate">app/Commands/Demo/ExampleTask.php</span> will be created.
</p>

<p>
    To make changes to the base class, copy the file <span class="notranslate">'task_class_template.php'</span> from <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> to the folder <span class="notranslate">'/app/Optional/Templates/'</span> and adjust it as needed.
</p>

<?= Paragraph::h2('Generating a Module') ?>

<p>
    To generate the base files for a <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">Module</a> in the <span class="notranslate">'modules'</span> directory (the name can be changed in the settings), execute the following command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module main</p>

<p>
    Where <span class="notranslate">'main'</span> is the name of the new module.
    For a nested module in the <span class="notranslate">'modules/demo'</span> folder, modify the command as follows:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module demo/main</p>

<p>
    If you need to create your own module template files, copy the contents of the directory <span class="notranslate">'/vendor/phphleb/framework/Optional/Modules/example/'</span> to the folder <span class="notranslate">'/app/Optional/Modules/example/'</span> and make the necessary changes to the files.
</p>

<p class="hl-info-block">
    When modifying the base files, keep in mind that special tags are included, and they are necessary for the correct substitution of console parameters.
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


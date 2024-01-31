<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Генерация MVC-шаблонов') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> при создании Моделей, Контроллеров и целых модулей можно воспользоваться специальными консольными командами.
    В дополнение к этому исходные шаблоны файлов настраиваются по собственным предпочтениям разработчика.
</p>

<?= Paragraph::h2('Генерация Контроллера') ?>

<p>
    Консольная команда для генерации класса Контроллера:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller Demo/ExampleController</p>

<p>
    Команда создаст файл <span class="notranslate">/app/Controllers/Demo/ExampleController.php</span> c классом нового Контроллера.
</p>
<p>
    Для изменения образца создания класса скопируйте файл <span class="notranslate">'controller_class_template.php'</span> из <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> в папку <span class="notranslate">'/app/Optional/Templates/'</span> и произведите необходимые изменения.
</p>

<?= Paragraph::h2('Генерация Middleware') ?>

<p>
    Консольная команда для генерации нового <span class="notranslate">middleware</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware Demo/ExampleMiddleware</p>

<p>
    После выполнения будет создан файл <span class="notranslate">/app/Middlewares/Demo/ExampleMiddleware.php</span> c классом <span class="notranslate">middleware</span>.
</p>
<p>
    Чтобы изменить исходный образец <span class="notranslate">middleware</span> скопируйте файл <span class="notranslate">'middleware_class_template.php'</span> из <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> в папку <span class="notranslate">'/app/Optional/Templates/'</span>, после этого внесите изменения.
</p>

<?= Paragraph::h2('Генерация Модели') ?>

<p>
    Пример создания класса Модели из консоли:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model Demo/ExampleModel</p>

<p>
    Эта команда создаст файл <span class="notranslate">/app/Models/Demo/ExampleModel.php</span> c классом Модели.
</p>

<p>
    Для изменения оригинала для шаблона Модели скопируйте файл <span class="notranslate">'model_class_template.php'</span> из <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> в папку <span class="notranslate">'/app/Optional/Templates/'</span> и измените к необходимому виду.
</p>

<?= Paragraph::h2('Генерация класса команды') ?>

<p>
    Консольная команда для создания новой задачи, указывается название команды:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task</p>

<p>
    При выполнении будет создан файл <span class="notranslate">app/Commands/Demo/ExampleTask.php</span>.
</p>

<p>
    Для внесения изменений в исходный класс скопируйте файл <span class="notranslate">'task_class_template.php'</span> из <span class="notranslate">'/vendor/phphleb/framework/Optional/Templates/'</span> в папку <span class="notranslate">'/app/Optional/Templates/'</span> и приведите его к нужному виду.
</p>

<?= Paragraph::h2('Генерация модуля') ?>

<p>
    Чтобы сгенерировать базовые файлы <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">Модуля</a> в директории <span class="notranslate">'modules'</span> (название может быть изменено в настройках) необходимо выполнить следующую команду:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module main</p>

<p>
    Где <span class="notranslate">'main'</span> - название нового модуля.
    Для вложенного модуля в папку <span class="notranslate">'modules/demo'</span> эту команду нужно изменить так:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module demo/main</p>

<p>
    При необходимости создать собственные файлы шаблонов модуля, скопируйте содержимое директории <span class="notranslate">'/vendor/phphleb/framework/Optional/Modules/example/'<span class="notranslate"> в папку <span class="notranslate">'/app/Optional/Modules/example/'</span> и внесите в файлы необходимые изменения.
</p>

<p class="hl-info-block">
    При изменении исходных файлов нужно учесть, что в них включены специальные метки, они необходимы для правильной подстановки консольных параметров.
</p>


<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


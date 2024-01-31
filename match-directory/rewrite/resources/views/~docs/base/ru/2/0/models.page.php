<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Модель') ?>

<p>
    Модель — это составная часть архитектурного паттерна <span class="notranslate">MVC</span><br>
    (<span class="notranslate">Action-Domain-Responder</span> для веб).
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> Модель представлена шаблоном, который имеет статические методы доступа.
    Доступ Модель может предоставлять к некоему набору данных, обычно это подключаемая СУБД (Система управления базами данных).
</p>
<p>
    Предоставляемый шаблон может использоваться разработчиком по-своему.
    В нём можно использовать встроенную обёртку над <span class="notranslate">PDO</span> (класс <span class="notranslate">Hleb\Static\DB</span>) или заменить на свой собственный шаблон, с подключением, например, одной из существующих <span class="notranslate">ORM</span>.
</p>

<?= Paragraph::h2('Создание шаблона') ?>

<p>
    Кроме копирования демонстрационного файла <span class="notranslate">DefaultModel.php</span> и его изменения, есть еще один простой способ создания нужного класса с использованием консольной команды.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model ExampleModel</p>

<p>
    Эта команда создаст новый шаблон <span class="notranslate">/app/Models/ExampleModel.php.</span><br>
    Можно использовать другое подходящее название для класса.<br>
    Фреймворк <span class="notranslate">HLEB2</span> позволяет также создать <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">собственный шаблон</a> по умолчанию для этой команды.
</p>


<?= Link::previousPage('docs.2.0.controller.middleware.page', 'Middleware'); ?>

<?= Link::nextPage('docs.2.0.template.standard.page', 'Шаблоны'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

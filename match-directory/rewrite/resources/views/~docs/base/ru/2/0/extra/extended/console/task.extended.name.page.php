<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Пользовательские названия команд') ?>

<p>
    В дополнение к генерации названий <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">консольных команд</a> из имени класса и папки команды существует прямое назначение названия и также добавление сокращенного названия.
</p>
<p>
    Для того чтобы указать название команды, используйте одну из следующих констант в классе команды.
    Эти константы должны иметь публичную область видимости (<span class="notranslate">public</span>).
</p>

<p class="hl-info-block">
    Все названия консольных команд в проекте, включая сокращенные, не должны повторяться.
</p>

<?= Paragraph::h2('Константа TASK_NAME') ?>

<p>
    Особенностью константы <span class="notranslate">TASK_NAME</span> класса является замена автоматически определяемого названия команды на указанное в константе.
</p>

<?= Paragraph::h2('Константа TASK_SHORT_NAME') ?>

<p>
    Константа <span class="notranslate">TASK_SHORT_NAME</span> класса позволяет добавить сокращенное дополнительное название команды к автоматически генерируемому названию команды или установленному напрямую в <span class="notranslate">TASK_NAME</span>.
</p>


<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


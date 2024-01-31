<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Шаблонизатор TWIG') ?>
<p>
    Шаблонизатор <span class="notranslate">Twig</span> довольно известный в своем роде и используется во фреймворке <span class="notranslate">Symfony</span> по умолчанию.<br>
    Его можно использовать как замену стандартным шаблонам фреймворка <span class="notranslate">HLEB2</span>.
</p>

<?= Paragraph::h2('Подключение TWIG') ?>

<p>
    При помощи <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require "twig/twig:^3.0"</p>

<?= Paragraph::h2('Использование TWIG') ?>

<p>
    При назначении шаблона в функции <span class="notranslate">view()</span> необходимо указывать расширение <span class="notranslate">.twig</span> для шаблонов <span class="notranslate">Twig</span>.<br>
    Параметры шаблона из этой функции будут аналогичным образом переданы в шаблон <span class="notranslate">Twig</span> в качестве переменных.
</p>
<p>
    В настройках фреймворка есть несколько, применимых к шаблонизатору <span class="notranslate">Twig</span>, а точнее - в файле <span class="notranslate">/config/common.php</span>:
</p>
<p>
    <span class="notranslate"><b>twig.options</b></span> - содержит перечень настроек, аналогичный <a href="https://twig.symfony.com/doc/3.x/api.html#environment-options" target="_blank" rel="nofollow">документации <span class="notranslate">Twig</span></a> для настройки шаблонизатора.
</p>
<p>
    <span class="notranslate"><b>twig.cache.inverted</b></span> - исключает перечисленные директории из кеша, иначе (в зависимости от включенного кеша) - включает.
</p>
<br>
<p class="hl-info-block">
    Шаблонизатор <span class="notranslate">Twig</span> распространяется под лицензией <span class="notranslate"><b>BSD 3-Clause</b></span>, которая накладывает некоторые ограничения на его использование.
</p>

<?= Link::previousPage('docs.2.0.template.cached.page', 'Кешируемые шаблоны'); ?>

<?= Link::nextPage('docs.2.0.console.command.page', 'Консольные команды'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

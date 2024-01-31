<?php

use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Консольная игра Боулинг') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> встроена небольшая консольная игра в боулинг.
    На данный момент это однопользовательская игра с подсчётом очков, уровнями и страйками по правилам реальной игры в боулинг.
    Запускается игра командой вида:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console flat-kegling-feature 8 1 50</p>

<p>
    Числовые параметры команды отвечают за силу броска шара (1-10), целеуказание на номер кегли (1-10) и коэффициент точности попадания в пределах целевой кегли (1-49 левее и 51-100 в правую сторону).
</p>



<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


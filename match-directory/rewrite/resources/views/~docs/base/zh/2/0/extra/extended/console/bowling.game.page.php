<?php

use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('控制台保龄球游戏') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架中内置了一个小型保龄球控制台游戏。
    目前，这是一款根据真实保龄球比赛规则进行计分的单人游戏，包含计分、等级以及全倒。
    游戏通过如下命令启动：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console flat-kegling-feature 8 1 50</p>

<p>
    命令的数值参数对应于球的投掷力度（1-10），目标球瓶的编号（1-10），以及击中目标球瓶精度系数（1-49 左侧，51-100 右侧）。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


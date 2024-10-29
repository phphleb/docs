<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Twig 模板引擎') ?>

<p>
    <span class="notranslate">Twig</span> 模板引擎在其领域内非常有名，并且默认用于 <span class="notranslate">Symfony</span> 框架中。<br>
    它可以作为 <span class="notranslate">HLEB2</span> 框架中标准模板的替代方案。
</p>

<?= Paragraph::h2('集成 TWIG') ?>

<p>
    使用 <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require "twig/twig:^3.0"</p>

<?= Paragraph::h2('使用 TWIG') ?>

<p>
    在 <span class="notranslate">view()</span> 函数中指定模板时，需要为 <span class="notranslate">Twig</span> 模板指定 <span class="notranslate">.twig</span> 扩展名。<br>
    从此函数传递的参数将以类似的方式作为变量传递给 <span class="notranslate">Twig</span> 模板。
</p>
<p>
    框架的配置中有几个适用于 <span class="notranslate">Twig</span> 模板引擎的设置，特别是在 <span class="notranslate">/config/common.php</span> 文件中：
</p>
<p>
    <span class="notranslate"><b>twig.options</b></span> - 包含一系列与 <a href="https://twig.symfony.com/doc/3.x/api.html#environment-options" target="_blank" rel="nofollow">Twig 文档</a>中类似的设置，用于配置模板引擎。
</p>
<p>
    <span class="notranslate"><b>twig.cache.inverted</b></span> - 排除指定目录的缓存，否则（取决于是否启用缓存）将包括它们。
</p>
<br>
<p class="hl-info-block">
    <span class="notranslate">Twig</span> 模板引擎根据 <span class="notranslate"><b>BSD 3-Clause</b></span> 许可证分发，该许可证对其使用施加了一定的限制。
</p>

<?= Link::previousPage('docs.2.0.template.cached.page', '缓存模板'); ?>

<?= Link::nextPage('docs.2.0.console.command.page', '控制台命令'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

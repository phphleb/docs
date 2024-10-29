<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Twig Templating Engine') ?>

<p>
    The <span class="notranslate">Twig</span> templating engine is quite well-known in its field and is used by default in the <span class="notranslate">Symfony</span> framework.<br>
    It can be used as a replacement for the standard templates in the <span class="notranslate">HLEB2</span> framework.
</p>

<?= Paragraph::h2('Integrating TWIG') ?>

<p>
    Using <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require "twig/twig:^3.0"</p>

<?= Paragraph::h2('Using TWIG') ?>

<p>
    When assigning a template in the <span class="notranslate">view()</span> function, you need to specify the <span class="notranslate">.twig</span> extension for <span class="notranslate">Twig</span> templates.<br>
    The parameters from this function will be passed as variables to the <span class="notranslate">Twig</span> template in a similar manner.
</p>
<p>
    The framework configuration has several settings applicable to the <span class="notranslate">Twig</span> templating engine, specifically in the <span class="notranslate">/config/common.php</span> file:
</p>
<p>
    <span class="notranslate"><b>twig.options</b></span> - contains a list of settings similar to those in the <a href="https://twig.symfony.com/doc/3.x/api.html#environment-options" target="_blank" rel="nofollow">Twig documentation</a> for configuring the templating engine.
</p>
<p>
    <span class="notranslate"><b>twig.cache.inverted</b></span> - excludes the specified directories from caching, otherwise (depending on whether caching is enabled) it includes them.
</p>
<br>
<p class="hl-info-block">
    The <span class="notranslate">Twig</span> templating engine is distributed under the <span class="notranslate"><b>BSD 3-Clause</b></span> license, which imposes certain restrictions on its usage.
</p>

<?= Link::previousPage('docs.2.0.template.cached.page', 'Cached Templates'); ?>

<?= Link::nextPage('docs.2.0.console.command.page', 'Console Commands'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

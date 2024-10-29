<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Standard Templates') ?>

<p>
    <span class="notranslate">View</span> is a component of the architectural pattern <span class="notranslate">MVC</span> <span class="hl-nowrap">(<span class="notranslate">Action-Domain-Responder</span> for the web).</span>
</p>
<p>
    Templates store the structure of the response that will be sent to the browser.
    Often this is <span class="notranslate">HTML</span> code containing <span class="notranslate">PHP</span> variables defined outside the template.<br>
    Templates can be nested within other templates.
</p>
<p>
    Importing one template into another is accomplished in the framework through special functions.
</p>
<p class="hl-info-block">
    The function <span class="notranslate">view()</span> for embedding a template from a route or controller is intended for templates with the extension <span class="notranslate">.php</span> or <span class="notranslate">.twig</span>.<br>
    When using <span class="notranslate">TWIG</span>, you won't need the standard framework functions for embedding and caching templates since <span class="notranslate">TWIG</span> provides its own tools.
</p>

<?= Paragraph::h2('Function insertTemplate()') ?>

<p>
    Code parts in included files from the <span class="notranslate">/resources/views/</span> directory can be repetitive.
    To extract them into a separate template, independent of the surrounding content, use the function <span class="notranslate">insertTemplate()</span>, with the first argument specifying the template name from the <span class="notranslate">/resources/views/</span> folder, and the second specifying an array of variables that will be available in the template by array keys.
    To differentiate templates from other files, it's recommended to place them in a separate <span class="notranslate">/templates/</span> folder.
</p>
<p>
    Example of how another template <span class="notranslate">/resources/views/templates/counter.php</span> is inserted into the template <span class="notranslate">/resources/views/content.php</span>, using part of the data from the first.
</p>

<?= Code::fromFile('@views/docs/code/template/insert.template.php');  ?>

<?= Code::fromFile('@views/docs/code/template/insert.counter.template.php');  ?>

<?= Paragraph::h2('Function template()') ?>

<p>
    The helper function <span class="notranslate">template()</span> is similar to <span class="notranslate">insertTemplate()</span>, but it returns the template content as a string representation, instead of outputting it at the place where it is defined.
</p>

<?= Link::previousPage('docs.2.0.models.page', 'Models'); ?>

<?= Link::nextPage('docs.2.0.template.cached.page', 'Cached Templates'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

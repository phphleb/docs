<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Cached Templates') ?>

<p>
    Besides the functions built into the framework that allow embedding <a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">standard templates</a>, there is the possibility of placing template content in the cache.
</p>
<p>
    Caching can both speed up some parts of the application and slow them down if those parts already operate quickly.
    Given that a template should only deliver data and not perform complex calculations, caching should be done at a higher level.
    However, for strictly specialized cases, especially when multiple templates are embedded within another, leading to increased resource consumption, it makes sense to cache the template for a short period.
</p>
<p>
    Template caching is not suitable for dynamically changing and internal site pages that require authorization, since during the cache lifetime, a user might log out, but this won't be reflected on the page.
    It is best used for static site pages, where changes are infrequent and in areas where security-critical conditions (such as authorization) are not present.
</p>

<?= Paragraph::h2('Function insertCacheTemplate()') ?>

<p>
    This function is similar to insertTemplate(), but includes an additional argument sec, where you can specify the duration in seconds to set caching.
    After this period expires, the next request to the template will refresh it in the cache for the same number of seconds (one minute in the example).
</p>

<?= Code::fromFile('@views/docs/code/template/insert.cached.template.php');  ?>

<p>
    Care should be taken with the data that enters the cached template and also with data that might be obtained within the template from external sources.<br>
    In the first case, a new cache will be created based on the hash of changed data, leading to increased disk space usage by cached data.
    In the second case, the data will not change and will remain in the cache from the moment it was refreshed.
</p>

<?= Code::fromFile('@views/docs/code/template/param.cached.template.php');  ?>

<p>
    In the example, a separate hash will be created for each different user ID upon request, and for the value NULL, another cache variant will be returned.<br>
</p>

<p class="hl-danger-block">
    When in doubt about the appropriateness of template caching, it's better not to do it.
</p>

<?= Link::previousPage('docs.2.0.template.standard.page', 'Standard Templates'); ?>

<?= Link::nextPage('docs.2.0.template.twig.page', 'TWIG Templating Engine'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

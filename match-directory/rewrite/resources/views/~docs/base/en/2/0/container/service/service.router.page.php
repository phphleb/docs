<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Router Service') ?>

<p>
    The <span class="notranslate"><b>Router</b></span> service is designed for interacting with route data in the <span class="notranslate">HLEB2</span> framework.
</p>
<p>
    Ways to use <span class="notranslate">Router</span> in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) demonstrated with relative URL formation by route name:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.container.php', false);  ?>

<p>
    Example of accessing <span class="notranslate">Router</span> in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.static.php', false);  ?>

<p>
    The <span class="notranslate">Router</span> object can also be obtained via <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> using the <span class="notranslate">Hleb\Reference\Interface\Router</span> interface.
</p>
<p>
    For simplicity, further examples will only include references through <span class="notranslate">Hleb\Static\Router</span>.
</p>

<?= Paragraph::h2('url()') ?>

<p>
    The <span class="notranslate">url()</span> method is intended for converting a route name into a relative <span class="notranslate">URL</span> address.
    A simple example:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.url.php', false);  ?>

<p>
    Since route addresses may have dynamic parameters and an optional trailing part, specify these in additional arguments when present.
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.url.php', false);  ?>

<?= Paragraph::h2('address()') ?>

<p>
    The <span class="notranslate">address()</span> method is similar to the <span class="notranslate">url()</span> method but returns the full <span class="notranslate">URL</span> including the <span class="notranslate">HTTP</span> scheme and domain name from the current request.
    Since the domain is assigned only the current one, use concatenation with <span class="notranslate">Route::url()</span> for another domain.
</p>

<p class="hl-info-block">
    The returned address for the specified methods will include or exclude a trailing slash based on the corresponding framework settings.
</p>
<p class="hl-info-block">
    Built-in framework functions <span class="notranslate">url()</span> and <span class="notranslate">address()</span> are shorthand for calling the same-named <span class="notranslate">Router</span> methods.
</p>


<?= Paragraph::h2('name()') ?>

<p>
    The <span class="notranslate">name()</span> method can be used to find out the name of the current route, if it is assigned.
</p>

<?= Paragraph::h2('data()') ?>
<p>
    The <span class="notranslate">data()</span> method returns data for the current <span class="notranslate">middleware</span> if it has been set in the route. It can be used only in <span class="notranslate">middleware</span>.
</p>

<?= Link::previousPage('docs.2.0.service.redirect.page', 'Redirect'); ?>

<?= Link::nextPage('docs.2.0.service.settings.page', 'Settings'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

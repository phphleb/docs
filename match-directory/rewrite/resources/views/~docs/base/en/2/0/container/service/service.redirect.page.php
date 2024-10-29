<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Redirection') ?>

<p>
    The <span class="notranslate"><b>Redirect</b></span> service provides a method to redirect to an internal page or a full <span class="notranslate">URL</span>.
</p>
<p>
    Since this service is based on the <span class="notranslate">'Location'</span> header, it must be applied before any content is rendered. The redirection can be executed in a controller or <span class="notranslate">middleware</span>, for example:
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.container.php', false);  ?>

<p>
    Additionally, the <span class="notranslate">Redirect</span> object can be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> using the <span class="notranslate">Hleb\Reference\Interface\Redirect</span> interface.
</p>

<p>
    To redirect to a route address by its name, use <span class="notranslate">Redirect</span> together with the <a href="<?= Link::url('docs.2.0.service.router.page'); ?>">Router</a> service, which allows you to retrieve this address.
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.route.php', false);  ?>

<?= Link::previousPage('docs.2.0.service.cookies.page', 'Cookies'); ?>

<?= Link::nextPage('docs.2.0.service.router.page', 'Router'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

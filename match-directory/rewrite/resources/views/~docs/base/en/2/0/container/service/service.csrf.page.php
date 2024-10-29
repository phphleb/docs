<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Protection against CSRF') ?>

<p>
    The <span class="notranslate">Csrf</span> service in the <span class="notranslate">HLEB2</span> framework is designed to protect against <span class="notranslate">CSRF(Cross-Site Request Forgery)</span> attacks, based on cross-site user request forgery.
</p>
<p>
    The principle of protection is implemented in the framework by passing a token through the <span class="notranslate">frontend</span> of the application while simultaneously saving the token value in the user's session.
    These values will be checked by the framework to ensure the user came from the page where the token was set, otherwise an error message will be displayed.
</p>

<p class="hl-info-block">
    To have the framework verify the passed token, add the <span class="notranslate">protect()</span> method to the target route.
</p>

<p>
    Methods of using the <span class="notranslate">Csrf</span> service in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) illustrated by obtaining the hash code for request verification:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.container.php', false);  ?>

<p>
    Example of accessing the <span class="notranslate">Csrf</span> service in template code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.template.php');  ?>

<p>
    For <span class="notranslate">TWIG</span> template engine:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.twig.php', false);  ?>

<p>
    The <span class="notranslate">Csrf</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> using the <span class="notranslate">Hleb\Reference\Interface\Csrf</span> interface.
</p>

<?= Paragraph::h2('token()') ?>

<p>
    The <span class="notranslate">token()</span> method returns a unique user session token.
</p>

<?= Paragraph::h2('field()') ?>

<p>
    The <span class="notranslate">field()</span> method returns <span class="notranslate">HTML</span> content to insert in the form to pass the token with other data.
</p>

<?= Paragraph::h2('validate()') ?>

<p>
    This method allows manual token validation (if protection is not enabled on the route).
</p>

<?= Link::previousPage('docs.2.0.service.settings.page', 'Getting settings'); ?>

<?= Link::nextPage('docs.2.0.service.converter.page', 'Conversion to PSR'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

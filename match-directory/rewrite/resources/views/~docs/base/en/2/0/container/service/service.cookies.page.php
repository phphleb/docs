<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Cookies') ?>

<p>
    The <span class="notranslate">HTTP cookies</span> in the <span class="notranslate">HLEB2</span> framework are handled by the <span class="notranslate"><b>Cookies</b></span> service.
</p>
<p>
    Examples of using <span class="notranslate">Cookies</span> in controllers (and all classes inheriting from <span class="notranslate">Hleb\Base\Container</span>), such as retrieving a value from <span class="notranslate">cookies</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.container.php', false);  ?>

<p>
    Example of accessing <span class="notranslate">cookies</span> in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.static.php', false);  ?>

<p>
    The <span class="notranslate">Cookies</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Cookie</span> interface.
</p>

<p>
    To simplify examples, the following will only include access through <span class="notranslate">Hleb\Static\Cookies</span>.
</p>

<?= Paragraph::h2('get()') ?>

<p>
    The <span class="notranslate">get()</span> method returns the <span class="notranslate">cookie</span> by name as an object.
    Through this object, you can obtain both raw data and data transformed into the required format.
    The framework handles <span class="notranslate">HTML</span> tag transformation, which is necessary if the data is to be displayed on a page to avoid potential <span class="notranslate">cookie-based XSS</span> vulnerabilities.<br>
    The example shows various ways to retrieve the <span class="notranslate">cookie</span> value:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.http.params.php', false);  ?>

<?= Paragraph::h2('all()') ?>

<p>
    The <span class="notranslate">all()</span> method returns a named array of objects similar to those obtained with the <span class="notranslate">get()</span> method, from which you can retrieve values of all or specific <span class="notranslate">cookies</span>.
</p>

<p class="hl-info-block">
    The most common error when using the object returned by these methods is treating the object as a value instead of retrieving the value from the object.
</p>

<?= Paragraph::h2('set()') ?>
<p>
    The <span class="notranslate">set()</span> method is used to set or update a <span class="notranslate">cookie</span> by its name. The first argument is the <span class="notranslate">cookie</span> name, the second one is the value to be assigned. The third argument <span class="notranslate">'options'</span> expects an array of additional parameters, similar to the PHP function <a href="https://www.php.net/manual/en/function.setcookie.php" target="blank" rel="nofollow"><span class="notranslate">setcookie()</span></a>, where you can set options like <span class="notranslate">'expires'</span>, <span class="notranslate">'path'</span>, <span class="notranslate">'domain'</span>, <span class="notranslate">'secure'</span>, <span class="notranslate">'httponly'</span>, and <span class="notranslate">'samesite'</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.example.setcookie.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    The <span class="notranslate">delete()</span> method is used for deleting a cookie by its name.
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    The <span class="notranslate">clear()</span> method allows you to clear all cookies.
</p>

<?= Paragraph::h2('Asynchronous Mode') ?>

<p>
    In the asynchronous usage of the framework, the methods of the <span class="notranslate">Cookies</span> service function similarly, but a different mechanism is used for setting and reading them.
</p>

<?= Link::previousPage('docs.2.0.service.session.page', 'Sessions'); ?>

<?= Link::nextPage('docs.2.0.service.redirect.page', 'Redirect'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

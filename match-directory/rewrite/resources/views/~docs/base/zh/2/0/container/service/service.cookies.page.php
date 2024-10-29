<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Cookies') ?>

<p>
    在 <span class="notranslate">HLEB2</span> 框架中，<span class="notranslate">HTTP cookies</span> 由 <span class="notranslate"><b>Cookies</b></span> 服务处理。
</p>
<p>
    使用 <span class="notranslate">Cookies</span> 在控制器中（以及所有继承自 <span class="notranslate">Hleb\Base\Container</span> 的类）的示例， 例如从 <span class="notranslate">cookies</span> 中获取值：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.container.php', false);  ?>

<p>
    在应用程序代码中访问 <span class="notranslate">cookies</span> 的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.static.php', false);  ?>

<p>
    也可以通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 接口 <span class="notranslate">Hleb\Reference\Interface\Cookie</span> 获取 <span class="notranslate">Cookies</span> 对象。
</p>

<p>
    为简化示例，以下内容仅包括通过 <span class="notranslate">Hleb\Static\Cookies</span> 进行访问。
</p>

<?= Paragraph::h2('get()') ?>

<p>
    <span class="notranslate">get()</span> 方法按名称返回一个 <span class="notranslate">cookie</span> 对象。
    通过该对象，您可以获取原始数据和转换后格式的数据。
    框架会处理 <span class="notranslate">HTML</span> 标签转换，这是必要的，如果数据将在页面上显示以避免潜在的 <span class="notranslate">cookie-based XSS</span> 漏洞。<br>
    示例展示了多种获取 <span class="notranslate">cookie</span> 值的方式：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.http.params.php', false);  ?>

<?= Paragraph::h2('all()') ?>

<p>
    <span class="notranslate">all()</span> 方法返回一个命名数组，其中包含与 <span class="notranslate">get()</span> 方法获得的对象类似的对象，您可以从中获取所有或特定 <span class="notranslate">cookies</span> 的值。
</p>

<p class="hl-info-block">
    使用这些方法返回的对象时，最常见的错误是将对象当作值来使用，而不是从对象中获取值。
</p>

<?= Paragraph::h2('set()') ?>
<p>
    使用 <span class="notranslate">set()</span> 方法可以通过名字设置或更新 <span class="notranslate">cookie</span>。第一个参数是 <span class="notranslate">cookie</span> 的名字，第二个参数是要分配的值。第三个参数 <span class="notranslate">'options'</span> 需要一个附加参数的数组，类似于 PHP 函数 <a href="https://www.php.net/manual/zh/function.setcookie.php" target="blank" rel="nofollow"><span class="notranslate">setcookie()</span></a> 的用法，可以在其中设置 <span class="notranslate">'expires'</span>、<span class="notranslate">'path'</span>、<span class="notranslate">'domain'</span>、<span class="notranslate">'secure'</span>、<span class="notranslate">'httponly'</span> 和 <span class="notranslate">'samesite'</span> 等选项。
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.example.setcookie.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    可以使用 <span class="notranslate">delete()</span> 方法根据名字删除一个 cookie。
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    <span class="notranslate">clear()</span> 方法允许您清除所有 cookies。
</p>

<?= Paragraph::h2('异步模式') ?>

<p>
    在框架的异步使用中，<span class="notranslate">Cookies</span> 服务的方法功能类似，但使用了不同的机制来设置和读取它们。
</p>

<?= Link::previousPage('docs.2.0.service.session.page', '会话'); ?>

<?= Link::nextPage('docs.2.0.service.redirect.page', '重定向'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('路由器服务') ?>

<p>
    <span class="notranslate"><b>Router</b></span> 服务旨在与 <span class="notranslate">HLEB2</span> 框架中的路由数据进行交互。
</p>
<p>
    在控制器（以及从 <span class="notranslate">Hleb\Base\Container</span> 继承的所有类）中使用 <span class="notranslate">Router</span> 的方法，示例为通过路由名称形成相对 URL：
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.container.php', false);  ?>

<p>
    在应用代码中访问 <span class="notranslate">Router</span> 的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.static.php', false);  ?>

<p>
    还可以通过使用 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 获取 <span class="notranslate">Router</span> 对象接口 <span class="notranslate">Hleb\Reference\Interface\Router</span>。
</p>
<p>
    为简化起见，后续示例将仅包含通过 <span class="notranslate">Hleb\Static\Router</span> 的引用。
</p>

<?= Paragraph::h2('url()') ?>

<p>
    <span class="notranslate">url()</span> 方法用于将路由名称转换为相对 <span class="notranslate">URL</span> 地址。
    一个简单的例子：
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.url.php', false);  ?>

<p>
    由于路由地址可能有动态参数和可选的尾部部分，因此在存在时需在附加参数中指定。
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.url.php', false);  ?>

<?= Paragraph::h2('address()') ?>

<p>
    <span class="notranslate">address()</span> 方法类似于 <span class="notranslate">url()</span> 方法，但返回完整的 <span class="notranslate">URL</span> ，包括来自当前请求的 <span class="notranslate">HTTP</span> 协议和域名。
    由于域只分配给当前的一个，对于另一个域使用与 <span class="notranslate">Route::url()</span> 的串联。
</p>

<p class="hl-info-block">
    指定方法返回的地址将根据相应的框架设置包含或不包含结尾的斜杠。
</p>
<p class="hl-info-block">
    内置框架函数 <span class="notranslate">url()</span> 和 <span class="notranslate">address()</span> 是调用同名 <span class="notranslate">Router</span> 方法的简写版本。
</p>

<?= Paragraph::h2('name()') ?>

<p>
    使用 <span class="notranslate">name()</span> 方法可以查找当前路由的名称，如果已指定。
</p>

<?= Paragraph::h2('data()') ?>
<p>
    方法 <span class="notranslate">data()</span> 返回当前 <span class="notranslate">middleware</span> 的数据，如果这些数据已在路由中设置。它只能在 <span class="notranslate">middleware</span> 中使用。
</p>

<?= Link::previousPage('docs.2.0.service.redirect.page', 'Redirect'); ?>

<?= Link::nextPage('docs.2.0.service.settings.page', 'Settings'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

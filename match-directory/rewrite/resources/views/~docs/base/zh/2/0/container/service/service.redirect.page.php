<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('重定向') ?>

<p>
    <span class="notranslate"><b>Redirect</b></span> 服务提供了重定向到内部页面或完整 <span class="notranslate">URL</span> 的方法。
</p>
<p>
    由于该服务基于 <span class="notranslate">'Location'</span> 标头，因此必须在渲染任何内容之前应用。可以在控制器或 <span class="notranslate">middleware</span> 中执行重定向，例如：
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.container.php', false);  ?>

<p>
    此外，可以通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 并使用 <span class="notranslate">Hleb\Reference\Interface\Redirect</span> 接口获取 <span class="notranslate">Redirect</span> 对象。
</p>

<p>
    若要通过路由名称重定向到指定地址，可以将 <span class="notranslate">Redirect</span> 与 <a href="<?= Link::url('docs.2.0.service.router.page'); ?>">Router</a> 服务结合使用，该服务允许获取该地址。
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.route.php', false);  ?>

<?= Link::previousPage('docs.2.0.service.cookies.page', 'Cookies'); ?>

<?= Link::nextPage('docs.2.0.service.router.page', 'Router'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('CSRF 防护') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架中的 <span class="notranslate">Csrf</span> 服务旨在防止基于跨站点用户请求伪造的 <span class="notranslate">CSRF(Cross-Site Request Forgery)</span> 攻击。
</p>
<p>
    防护原理在框架中通过应用的 <span class="notranslate">frontend</span> 传递令牌的同时将令牌值保存到用户的会话中。
    这些值将由框架检查，以确保用户来自设置了此令牌的页面，否则将显示错误消息。
</p>

<p class="hl-info-block">
    要让框架验证传递的令牌，需要在目标路由中添加 <span class="notranslate">protect()</span> 方法。
</p>

<p>
    在控制器（以及所有继承自 <span class="notranslate">Hleb\Base\Container</span> 的类）中使用 <span class="notranslate">Csrf</span> 服务的方法，通过获取请求验证的哈希码说明：
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.container.php', false);  ?>

<p>
    在模板代码中访问 <span class="notranslate">Csrf</span> 服务的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.template.php');  ?>

<p>
    对于 <span class="notranslate">TWIG</span> 模板引擎：
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.twig.php', false);  ?>

<p>
    也可以通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 获取 <span class="notranslate">Csrf</span> 对象，使用接口 <span class="notranslate">Hleb\Reference\Interface\Csrf</span>。
</p>

<?= Paragraph::h2('token()') ?>

<p>
    <span class="notranslate">token()</span> 方法返回唯一的用户会话令牌。
</p>

<?= Paragraph::h2('field()') ?>

<p>
    <span class="notranslate">field()</span> 方法返回用于在表单中插入以传递令牌和其他数据的 <span class="notranslate">HTML</span> 内容。
</p>

<?= Paragraph::h2('validate()') ?>

<p>
    此方法允许手动令牌校验（如果在路由上未启用保护）。
</p>

<?= Link::previousPage('docs.2.0.service.settings.page', '获取设置'); ?>

<?= Link::nextPage('docs.2.0.service.converter.page', '转换为 PSR'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

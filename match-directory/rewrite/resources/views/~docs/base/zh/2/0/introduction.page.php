<?php

use Hleb\Static\System;
use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('介绍') ?>

<p>
    <b><span class="notranslate">HLEB2</span></b> 是 <span class="notranslate">HLEB</span> 框架的第二个版本，经过完全重构和改进。
</p>
<p>
    它支持 <span class="notranslate">PHP</span> 版本 8.2 及以上，但如果您想使用早期版本的 <span class="notranslate">PHP</span>，您可以尝试该框架的 <a href="https://phphleb.ru/ru/v1/" target="_blank">第一个版本</a>。<br>
</p>
<p>
    框架的初始版本 2.0.0 于 2024 年 2 月发布。<br>
    新版本引入了异步执行的支持，使框架可以与 <span class="notranslate">RoadRunner</span> 和 <span class="notranslate">Swoole</span> 等技术一起使用。<br>
    在性能和可维护性上给予了很大的关注，已实现与 <span class="notranslate">PSR</span> 的兼容性，并添加了服务容器及 <span class="notranslate">依赖注入</span> 的实现，还有更多功能。
</p>

<p>
    它符合 <span class="notranslate">PSR-1</span>、<span class="notranslate">PSR-2</span>、<span class="notranslate">PSR-3</span>、<span class="notranslate">PSR-4</span>、<span class="notranslate">PSR-7</span>、<span class="notranslate">PSR-11</span>、<span class="notranslate">PSR-12</span> 和 <span class="notranslate">PSR-16</span> 的建议，而不强制在开发中使用。
</p>

<?= Paragraph::h2('目的') ?>

<p>

    此框架可以作为小型项目的基础，例如：单独的管理面板、微服务、聊天机器人、实验性的宠物项目、控制台处理器；以及中型网站，并且还可以为开发具有扩展能力的自定义框架奠定基础。在最后一种情况下，它也可以用于大型企业网站。
</p>
<p>
    <span class="hl-select-block">
        <span class="notranslate">HLEB2</span> 被定位为一个简单且快速的框架，能够高效地执行其工作。
    </span>
</p>
<p>
    <span class="notranslate">HLEB</span> 框架（以及 HLEB2）的一大特点是完全放弃基本配置中的第三方库；同时，如果有必要，可以集成第三方库。<br>
    因此，进一步的操作并不受依赖性的预先规定，确保必要的灵活性。
</p>
<p>
    要使用该框架，至少需要具备基本的 PHP 编程知识。
</p>
<p>
    该框架是一个多功能工具，每个工具都可以用于非预期的目的，因此假设应用开发者理解他们正在做什么，并能够为其特定项目选择适当的方法。
</p>
<p>
    框架的代码经过单元测试仔细测试。
</p>

<?= Paragraph::h2('性能表现') ?>

<p>
    根据第三方<a href="https://web-frameworks-benchmark.netlify.app/compare?f=hleb2,slim,lumen,yii,laminas,codeigniter4,spiral,laravel,symfony" target="blank">性能指标</a>，该框架在速度和运行稳定性方面都具有优势。
</p>

<?= Paragraph::h2('基于框架的项目') ?>

<p>
    在作者已知的基于 HLEB2 的应用程序中，值得注意的是讨论（和问答）引擎 LibArea。
    GitHub 项目: <a href="https://github.com/LibArea/libarea">github.com/LibArea/libarea</a><br>
    假定基于 LibArea 的项目也在 HLEB2 框架上运行。
</p>

<?= Paragraph::h2('如何使用文档') ?>

<p>
    框架的详细指南由多个章节组成。
    部分信息附有代码示例，例如（路由声明）:
</p>

<?= Code::fromFile('@views/docs/code/test.php', false); ?>

<p>
    文档章节列表位于网站菜单中。<br>
    对于初学者，建议从安装、路由和配置编辑主题开始探索框架。
</p>

<p class="hl-info-block">
    需要特别注意的信息将用这样的块突出显示。
</p>

<p class="hl-danger-block">
    不应忽视的警告将用这种块显示。
</p>

<?= Paragraph::h2('文档的本地安装') ?>

<p>
    此文档可以<a href="https://github.com/phphleb/docs/" target="_blank">安装</a>并离线使用。
    代码位于开放存储库中，本地安装后只需关注更新即可。
</p>

<?= Link::nextPage('docs.2.0.installation.page', '框架安装'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


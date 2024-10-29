<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('管理面板') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架中的“管理面板”模块是 <span class="notranslate">HLOGIN</span> 注册库的扩展，但也可以独立使用，作为一个或多个站点的管理面板，或网站的公共前端。
</p>
<p>
    此库用于创建此框架文档站点的外观，而无需进行重大修改。
</p>

<?= Paragraph::h2('安装') ?>

<p>
    使用 <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/adminpan</p>

<?= Paragraph::h2('配置') ?>

<p>
    通过运行以下命令，将包含如何构建管理面板菜单结构的描述的 <span class="notranslate">adminpan.php</span> 文件复制到 <span class="notranslate">/config/structure/</span> 目录中。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/adminpan add</p>

<p>
    初始情况下，<span class="notranslate">/config/structure/adminpan.php</span> 文件包含一个空数组，未定义任何菜单部分。
    菜单部分通过指定特殊的路由名称（或常规链接）分配。
    演示路由示例：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.route.php', false);  ?>

<p>
    在这里，指定了菜单 <span class="notranslate">'adminpan'</span>（与 <span class="notranslate">adminpan.php</span> 文件同名）的 <span class="notranslate">URL</span> <span class="notranslate">'/{lang}/panel/page/default'</span> 被分配给 <span class="notranslate">ExamplePanelController</span> 类的 <span class="notranslate">page()</span> 控制器，目标是 <span class="notranslate">'index'</span> 方法。
    此外，路由具有名称 <span class="notranslate">'adminpan.default'</span>，该名称用于映射到菜单中的部分。
    现在可以在 <span class="notranslate">/config/structure/adminpan.php</span> 文件中创建第一个菜单项。
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.config.php');  ?>
<p>
    菜单可以包含嵌套的下拉列表（<span class="notranslate">'section'</span>），目前只分配了一个菜单项。
</p>
<p>
    如果你导航到 URL <span class="notranslate">'/ru/panel/page/default'</span>，页面的设计将设为 <span class="notranslate">'base'</span>（根据设置），同时菜单中会有“主要菜单”，活跃项目是“测试页面”，在该页面上将显示来自 <span class="notranslate">ExamplePanelController</span> 的内容。
</p>
<p>
    与 <span class="notranslate">HLOGIN</span> 库结合使用时，管理员面板路由可能只对特定类型的用户（经过身份验证的）可访问。
</p>
<p>
    为了深入了解管理员面板的操作，你可以在本地部署<a href="https://github.com/phphleb/docs/" target="blank">这个站点</a>并探索其菜单结构。
</p>
<p>
    库的代码仓库：<span class="notranslate"><a href="https://github.com/phphleb/adminpan" target="blank">github.com/phphleb/adminpan</a></span>
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('标准模板') ?>

<p>
    <span class="notranslate">View</span> 是架构模式<span class="notranslate">MVC</span>的组成部分 <span class="hl-nowrap">用于网络的<span class="notranslate">Action-Domain-Responder</span>）。</span>
</p>
<p>
    模板存储将发送到浏览器的响应结构。
    通常这是包含来自模板外部定义的<span class="notranslate">PHP</span>变量的<span class="notranslate">HTML</span>代码。<br>
    模板可以嵌套到其他模板中。
</p>
<p>
    在框架中通过特殊功能导入一个模板到另一个。
</p>
<p class="hl-info-block">
    函数<span class="notranslate">view()</span>用于从路由或控制器嵌入模板，适用于扩展名为<span class="notranslate">.php</span>或<span class="notranslate">.twig</span>的模板。
    在使用<span class="notranslate">TWIG</span>时，不需要框架的标准函数来嵌入和缓存模板，因为<span class="notranslate">TWIG</span>提供自己的工具。
</p>

<?= Paragraph::h2('函数 insertTemplate()') ?>

<p>
    位于 <span class="notranslate">/resources/views/</span> 目录的包含文件中的代码部分可以重复。
    使用<span class="notranslate">insertTemplate()</span>函数将其提取到一个独立于周围内容的单独模板中，第一个参数指定来自<span class="notranslate">/resources/views/</span>文件夹的模板名称，第二个参数指定将在模板中通过数组键可用的变量数组。
    为了区分模板和其他文件，建议将它们放在一个独立的<span class="notranslate">/templates/</span>文件夹中。
</p>
<p>
    示例展示了如何使用来自第一个模板部分的数据，将模板<span class="notranslate">/resources/views/templates/counter.php</span>嵌入到模板<span class="notranslate">/resources/views/content.php</span>中。
</p>

<?= Code::fromFile('@views/docs/code/template/insert.template.php');  ?>

<?= Code::fromFile('@views/docs/code/template/insert.counter.template.php');  ?>

<?= Paragraph::h2('函数 template()') ?>

<p>
    辅助函数<span class="notranslate">template()</span>类似于<span class="notranslate">insertTemplate()</span>，但它返回模板内容的字符串表示，而不是在定义的地方输出。
</p>

<?= Link::previousPage('docs.2.0.models.page', '模型'); ?>

<?= Link::nextPage('docs.2.0.template.cached.page', '缓存模板'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

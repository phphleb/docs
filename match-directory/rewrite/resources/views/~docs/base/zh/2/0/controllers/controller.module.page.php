<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('模块') ?>
<p>
    软件架构中的模块化方法可以将项目逻辑上划分为较大的组成部分（模块）。
    模块的标志是它的自足性，在某种意义上，它是在单体应用中划分 "微服务" 的一种形式。<br>
    与微服务的主要区别在于，模块必须通过预定义的契约交换数据，这些契约取代了 <span class="notranslate">HTTP API</span>（或消息代理），并且模块共享用于路由、服务和来自 <span class="notranslate">/vendor/</span> 目录的外部库的公共文件夹。
    建议设计契约时，使其在需要时能够将模块提取为一个完整的微服务。
</p>
<p>
    在 <span class="notranslate">HLEB2</span> 框架中，模块本质上是一个小型的 <span class="notranslate">MVC</span>（<span class="notranslate">Action-Domain-Responder</span> 用于 Web）。
    模块有自己的控制器、自己的模板文件夹，甚至可以有自己的配置，这些都位于模块的文件夹中。
    模块还可以有自己的逻辑（以及模型），但为此，建议在项目的 <span class="notranslate">/app/</span> 文件夹或模块内部创建一个单独的结构。
</p>
<p>
    在项目中使用完全自主的部分时，这就是模块化开发的本质，您可以完全不使用来自 <span class="notranslate">/app/</span> 的控制器、中间件和模型，并在模块中实现一切功能。
</p>
<p>
    模块控制器在路由中的作用与普通控制器不同，方法名称为 <span class="notranslate">'module'</span>，而不是 <span class="notranslate">'controller'</span>，并且包含一个额外的初始参数，即模块名称。
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.route.php', false);  ?>

<p class="hl-info-block">
    模块的控制器必须继承自 <span class="notranslate">Hleb\Base\Module</span>。
</p>
<p class="hl-info-block">

    为了让 <span class="notranslate">Composer</span> 类加载器为模块生成类映射，请在 <span class="notranslate"><b>/composer.json</b></span> 文件的 <span class="notranslate">"autoload" > "classmap"</span> 部分中添加模块文件夹名称 (<span class="notranslate">"modules/"</span>)。
</p>

<?= Paragraph::h2('创建模块') ?>

<p>
    使用控制台命令创建模块基本结构的简单方法：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module example</p>

<p>
    此命令将在项目的<span class="notranslate">/modules/example/</span>目录中创建一个新的模块模板。
    您可以为模块使用另一个合适的名称，由小写拉丁字母、数字、破折号和 '/' 符号（表示嵌套）组成。
    可以选择<a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">重写</a>生成过程中使用的原始模块文件。
</p>
<p>
    创建后的模块结构（如果之前没有<span class="notranslate">modules</span>文件夹，控制台命令将在项目根目录创建它）：
</p>
<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b> &nbsp;&nbsp;- 模块目录<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>example</b> &nbsp;&nbsp;- example 模块文件夹<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- 模块设置<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModuleController.php</span> &nbsp;&nbsp;- 模块控制器<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">example.php</span> &nbsp;&nbsp;- 模块模板<br></span>
</div>

<p>
    main.php 文件可以包含类似于<span class="notranslate">/config/main.php</span>文件的设置，但使用仅在模块中使用的值，这意味着它将“覆盖”它们。
    最初，main.php 文件不包含任何设置；使用所有来自<span class="notranslate">/config/main.php</span>的设置。<br>
    同样，通过创建同名文件，可以替换<span class="notranslate">/config/database.php</span>的设置。
    其他配置文件的设置始终全局有效。
</p>

<p>
    模块控制器类似于框架的标准控制器。
    使用<span class="notranslate">view()</span>函数时，模板路径将指向模块的<span class="notranslate">'views'</span>文件夹，就像框架的所有内置模板工作函数一样。
</p>

<?= Paragraph::h2('嵌套模块') ?>


<p>
    有一个选项可以将模块分组到不同的<span class="notranslate">/modules/</span>子文件夹中的集合。
    为此，模块放置在更低的一级，并且模块名称包含组名称。
    这构成了模块嵌套的<i>第二级</i>。
</p>
<p>
    假设我们需要放置一个名为<span class="notranslate">'main-product'</span>的模块组，其中将包含模块<span class="notranslate">'first-feature'</span> 和 <span class="notranslate">'second-feature'</span>。
</p>

<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b><br></span>
    <span class="hl-nowrap">&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>main-product</b> - 模块组<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>first-feature</b> &nbsp;&nbsp;- first-feature 模块文件夹<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleGetController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModulePostController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>second-feature</b> &nbsp;&nbsp;- second-feature 模块文件夹<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>middlewares</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleMiddleware.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
</div>

<p>
    这就是它在路由图中的样子：
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.group.route.php', false);  ?>

<p>
    在名为 <span class="notranslate">'first-feature'</span> 的组中，重新分配了设置，包括对数据库的设置。<br>
    <span class="notranslate">'second-feature'</span> 的示例使用了全局设置，另外，它还有一个给控制器的 <span class="notranslate">middleware</span>。
    可能会有更多的控制器在此出现。
</p>

<p class="hl-info-block">
    如果需要，可以为第三层嵌套创建一个结构。
</p>

<?= Paragraph::h2('模块文件夹的名称') ?>

<p>
    最初，模块文件夹称为 <span class="notranslate">'modules'</span>；在创建模块之前，可以在设置中更改该名称，例如更改为 <span class="notranslate">'products'</span>。<br>
    这是在 <span class="notranslate">/config/system.php</span> 文件中完成的 - 设置 <span class="notranslate">'module.dir.name'</span>。
    如果是在已存在的模块类的情况下进行更改，则需要为符合 PSR-0 的模块修正 <span class="notranslate">namespace</span>。
</p>

<?= Paragraph::h2('重写设置') ?>

<p>
    在模块中，可以重写两个配置文件 - <span class="notranslate">/config/main.php</span> 和 <span class="notranslate">/config/database.php</span>。<br>
    参数值按键递归重写，否则，参数具有全局值。没有全局对照的新参数将在模块中本地可用。
</p>

<?= Paragraph::h2('模块中的模板路径') ?>

<p>
    当使用模块作为单独的包时，不总是需要包中包含 <span class="notranslate">View</span> 模板，因为样式和结果输出可能是应用程序结构中的单独层。<br>
    因此，对于使用模板可以有两种选择。
    “使用”指的是在 <span class="notranslate">view()</span> 函数中的模板指针以及像 <span class="notranslate">insertTemplate()</span> 这样的特殊函数。
</p>
<p>
    如果模块中有 <span class="notranslate">/views/</span> 文件夹，模板路径将指向该文件夹。<br>
    但如果没有这样的文件夹，模板搜索将发生在项目的 <span class="notranslate">/resources/views/</span> 目录中。
</p>

<?= Link::previousPage('docs.2.0.controller.controller.page', '控制器'); ?>

<?= Link::nextPage('docs.2.0.controller.middleware.page', '中间件'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


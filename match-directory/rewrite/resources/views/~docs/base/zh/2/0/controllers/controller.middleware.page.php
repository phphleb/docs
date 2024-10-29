<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Middleware') ?>

<p>
    Middleware 是一种<a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">控制器</a>，但其主要目的不是向用户提供预期响应（尽管 Middleware 可以返回错误文本），而是在响应生成之前或之后执行特定任务。
</p>
<p>
    不同于控制器，这个 Middleware 可以不仅分配给一个路由，还可以分配给一组路由。两个地方可以有多个不同的 Middleware（或者甚至相同的 Middleware，如果需要的话）。
</p>
<p>
    例如，用户授权可以在 Middleware 中实现并应用于需要的路由组。在路由附加的控制器或其他主要操作执行之前，会确定当前用户及其授权状态。<br>
    否则，Middleware 类将执行交给另一个控制器，返回错误，或根据实现情况重定向到其他路由。
</p>

<p>
    当 Middleware() 方法（选项 after() 或 before()）在路由中应用时，它具有一个 data 参数。这是与控制器的另一个区别，可以将数据数组传递给此参数，然后这些数据在 Middleware 中可用。
    数组数据在方法 Hleb\Static\Router::data() 中或通过容器访问。
</p>

<p class="hl-info-block">
    Middleware 类必须继承自 Hleb\Base\Middleware。
</p>

<?= Paragraph::h2('返回值') ?>

<p>
    通常，该类的被调用方法的目的是不返回任何内容，而是检查条件。但在某些情况下，也允许返回值。
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - 这些类型将被转换为字符串并以文本形式输出。
</p>
<p>
    <span class="notranslate"><b>array</b></span> - 返回的数组将转换为 <span class="notranslate">JSON</span> 字符串。执行到此终止。
</p>
<p>
    <span class="notranslate"><b>bool</b></span> - 如果返回 <span class="notranslate">false</span>，则相当于停止进一步执行。
</p>

<?= Paragraph::h2('创建 Middleware') ?>

<p>
    除了拷贝示例文件 <span class="notranslate">DefaultMiddleware.php</span>并修改之外，还有一种简单方法可以通过控制台命令创建所需的类。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware ExampleMiddleware</p>
<p>
    这个命令将创建一个新的模板 <span class="notranslate">/app/Middlewares/ExampleMiddleware.php.</span><br>
    可以为类使用另一个合适的名称。<br>
    <span class="notranslate">HLEB2</span> 框架默认也允许为此命令创建一个<a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">自定义模板</a>。
</p>

<?= Link::previousPage('docs.2.0.controller.module.page', '模块'); ?>

<?= Link::nextPage('docs.2.0.models.page', '模型'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


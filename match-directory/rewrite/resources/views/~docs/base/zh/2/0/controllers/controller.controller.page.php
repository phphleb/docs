<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('控制器') ?>

<p>
    控制器是<span class="notranslate">MVC</span>架构的一部分（用于网页的<span class="notranslate">Action-Domain-Responder</span>），负责进一步管理已经由路由器识别的请求的处理，但不应包含业务逻辑。
</p>
<p>
    在<span class="notranslate">HLEB2</span>框架中，控制器是通过<span class="notranslate">controller()</span>方法绑定到路由的普通处理类。<br>
    该方法指向控制器类及其可执行的方法。
    在匹配时，框架会创建该类的实例并调用该方法。
</p>

<p class="hl-info-block">
    控制器类必须继承自<span class="notranslate">Hleb\Base\Controller</span>。
</p>

<p>
    框架根据控制器的<span class="notranslate">namespace</span>在<span class="notranslate">/app/Controllers/</span>文件夹中查找控制器。
    以下是默认控制器的代码：
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.class.php');  ?>

<p>
    在示例中，控制器的<span class="notranslate">'index'</span>方法返回一个由<span class="notranslate">view()</span>函数生成的<span class="notranslate">View</span>对象，并指向<span class="notranslate">/resources/views/</span>文件夹中的模板。<br>
    将使用模板<span class="notranslate">/resources/views/default.php</span><br>
    这是一个简单的示例，因为可以以类似的方式在路由中使用此函数。
</p>

<?= Paragraph::h2('view()函数') ?>

<p>
    函数的第一个参数指定模板，第二个参数是用于传递变量及其值到模板的命名数组，第三个参数可以指定响应状态码的数值。
</p>

<?= Code::fromFile('@views/docs/code/controller/view.example.php', false);  ?>

<p>
    如果在控制器中使用此示例，将调用模板<span class="notranslate">/resources/views/template/file.php</span>。<br>
    在文件中，将可用到变量<span class="notranslate">$title</span>和<span class="notranslate">$description</span>及其对应的值：
</p>
<?= Code::fromFile('@views/docs/code/controller/view.template.php');  ?>

<p>
    如果模板文件的扩展名不是<span class="notranslate">.php</span>，例如<span class="notranslate">.twig</span>模板，则需要在函数中重命名模板路径，指定扩展名。
</p>

<?= Paragraph::h2('返回值') ?>

<p>
    除了之前提到的 <span class="notranslate">View</span> 对象，控制器方法还可以返回其他类型的值：
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - 这些类型将被转换为字符串并以其原始形式输出为文本。
</p>
<p>
    <span class="notranslate"><b>array</b></span> - 返回的数组将被转换为 <span class="notranslate">JSON</span> 字符串。
</p>
<p>
    <b>bool</b> - 如果返回 <span class="notranslate">false</span>，则会显示标准的404错误。
</p>
<p>
    具有 <span class="notranslate"><b>Hleb\Reference\ResponseInterface</b></span> 接口的对象（来自容器）将被转换为响应。
</p>
<p>
    具有 <span class="notranslate"><b>Psr\Http\Message\ResponseInterface</b></span> 接口的对象将被转换为响应。
</p>

<?php insertTemplate('/docs/ru/2/0/controllers/xssi.json.array'); ?>

<?= Paragraph::h2('插入动态变量') ?>

<p>
    框架可能与动态路由一起定义与 <span class="notranslate">URL</span> 的命名部分相匹配的值。
    例如，对于以下路由：
</p>

<?= Code::fromFile('@views/docs/code/controller/dynamic.uri.php', false);  ?>

<p>
    变量 <span class="notranslate">$version</span> 和 <span class="notranslate">$page</span> 可以插入到控制器方法 <span class="notranslate">'resource'</span> 中。
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.init.class.php');  ?>

<?= Paragraph::h2('使用另一个控制器') ?>

<p>
    一个控制器可以返回另一个的数据显示，但返回的数据类型必须匹配。
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.other.class.php');  ?>

<p>
    没有为控制器分配的事件将应用于这个嵌套的控制器。
</p>

<?= Paragraph::h2('预定义的 HTTP 错误类') ?>

<p>
    如果控制器代码中的某个条件应以 <span class="notranslate">HTTP</span> 错误结束，则有几个预定义的异常类，例如 <span class="notranslate">'Http404NotFoundException'</span> 和 <span class="notranslate">'Http403ForbiddenException'</span>。<br>
    例如，通过将错误指定为 <span class="notranslate">'throw new Hleb\Http404NotFoundException();'</span>，框架会在响应中生成 <span class="notranslate">HTTP</span> 代码和标准的 404 错误文本。
</p>

<?= Paragraph::h2('验证传入数据') ?>

<p>
    在 <span class="notranslate">HLEB2</span> 框架中，动态路由地址部分的基本验证可以通过在路由中使用 <span class="notranslate">where()</span> 方法直接声明。如果需要验证有效载荷数据，例如 <span class="notranslate">JSON</span> 格式的 <span class="notranslate">POST</span> 请求数据，可以选择使用 <a href="<?= Link::url('docs.2.0.api.page'); ?>">api-multitool</a> 库。<br>
    使用这个库中的 trait <span class="notranslate">Phphleb\ApiMultitool\ApiRequestDataManagerTrait</span> 后，可以使用 <span class="notranslate">check()</span> 方法来验证各种请求数据。
</p>

<?= Paragraph::h2('创建控制器') ?>

<p>
    除了复制和修改演示文件 <span class="notranslate">DefaultController.php</span> 之外，使用控制台命令创建控制器也是一个简单的方法。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller ExampleController</p>

<p>
    该命令将在 <span class="notranslate">/app/Controllers/ExampleController.php</span> 创建新的控制器模板。<br>
    可以使用类的其他合适名称。<br>
    框架还允许为此命令创建 <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">自定义默认模板</a>。
</p>

<?= Link::previousPage('docs.2.0.routes.page', '路由'); ?>

<?= Link::nextPage('docs.2.0.controller.module.page', '模块'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('事件') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架中有几个预定义的常规事件，每个事件都分配给特定的动作类型。<br>
    所有事件类都位于 <span class="notranslate">/app/Bootstrap/Events/</span> 文件夹中，可以进行修改。从技术上讲，它们替代了配置，消除了项目中不必要的“魔法”。
</p>
<p class="hl-info-block">
    由于这些类与全局事件相关联，建议将依赖于私有实现的代码分离到单独的类中。
</p>
<p class="hl-danger-block">
    未优化的事件中的代码可能会导致项目整体性能下降。
</p>

<?= Paragraph::h2('ControllerEvent') ?>

<p>
    此类的 <span class="notranslate">before()</span> 方法在框架的每次控制器调用之前执行。它允许您确定涉及哪个类和方法，并在需要时更改作为命名数组提供的参数，并将它们返回到被调用的控制器方法。<br>
    例如，如果使用第三方库验证传入请求，可以通过 <span class="notranslate">ControllerEvent</span> 事件实现此检查。
</p>
<p>
    如果存在，<span class="notranslate">after()</span> 方法允许重定义控制器的响应，并在控制器之后立即执行。该方法通过引用在 <span class="notranslate">'result'</span> 参数中接收此结果，允许您更改特定类和方法的返回数据。<br>
    全局上，这可能涉及将返回的数组从默认的 <span class="notranslate">JSON</span> 更改为另一个格式，如 <span class="notranslate">XML</span>。
</p>
<p>
    以下示例演示了在调用特定类和控制器方法之前附加额外操作：
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.controller.php');  ?>

<?= Paragraph::h2('MiddlewareEvent') ?>

<p>
    这个中间件类的 <span class="notranslate">before()</span> 方法在框架的每次 <span class="notranslate">middleware</span> 调用之前执行。该方法的参数允许您确定涉及哪个类和方法，以及此 <span class="notranslate">middleware</span> 是否在主要操作之后执行。<br>
    如有必要，可以更改目标 <span class="notranslate">middleware</span> 方法的参数，进行更改，并从当前方法返回。如果是这种情况，需要定义条件以便在结果输出后终止脚本执行，可以通过从 <span class="notranslate">after()</span> 方法返回 <span class="notranslate">false</span> 来实现。
</p>
<p class="hl-info-block">
    中间件的执行顺序可以通过路由改变，这在为其分配事件时必须考虑到，如有必要，可将依赖于执行顺序的事件元素替换为相应的独立中间件。
</p>
<?= Paragraph::h2('ModuleEvent') ?>

<p>
    由于模块是独立存在的，每个模块的控制器都有自己的事件。<br>
    <span class="notranslate">ModuleEvent</span> 类的 <span class="notranslate">before()</span> 方法在框架中任何模块的每次控制器调用之前执行。<br>
    与 <span class="notranslate">ControllerEvent</span> 不同，增加了一个额外的参数 <span class="notranslate">$module</span> 来确定模块名称。<br>
    与控制器事件相似，此事件也可以有一个 <span class="notranslate">after()</span> 方法。
</p>

<?= Paragraph::h2('PageEvent') ?>

<p>
    这是另一个类似于 <span class="notranslate">ControllerEvent</span> 的事件，绑定到特殊“页面控制器”的调用。<br>
    此类页面用于框架的注册库中的管理面板以及此文档网站上。
</p>

<?= Paragraph::h2('KernelEvent') ?>

<p>
    <span class="notranslate">KernelEvent</span> 事件不一定需要存在于与其他事件相同的文件夹中，但如果创建了具有此类名的文件，框架将会使用它。其独特功能是能够在最高级别拦截所有 Web 请求并为其创建全局操作。例如，这可以用于记录用户请求日志（框架中最初并未包含此功能）。
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.kernel.php');  ?>

<?= Paragraph::h2('TaskEvent') ?>

<p>
    在每次框架命令启动之前执行，排除了那些默认内置的命令。
    还可以确定被调用的类和调用的来源（来自代码或来自控制台）。
    <span class="notranslate">TaskEvent</span> 接收并返回最终方法的参数的最终数据，因此可以在此处连接第三方库。
    例如，这可以是来自 <span class="notranslate">Symfony</span> 的标准控制台处理程序。
</p>
<p>
    这个事件的 <span class="notranslate">after()</span> 方法的不同之处在于它可以访问任务中设置为 <span class="notranslate">setResult()</span> 的数据。
    这些数据通过引用传递给 <span class="notranslate">'result'</span> 参数，并且可以被修改。<br>
    如有必要，可以通过使用 <span class="notranslate">statusCode()</span> 方法以相同的方式更改返回的响应状态。
</p>
<p>
    演示示例，展示了一种组织响应到不同任务的执行（使用一个通用接口）的方法：
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.task.php');  ?>

<p>
    此原则不仅可以应用于任务事件，也可以应用于其他事件。
</p>

<p class="hl-info-block">

    为事件选择 <span class="notranslate">switch</span> 操作符是因为它能够将一个结果与多个 <span class="notranslate">case</span> 块匹配。
</p>

<?= Paragraph::h2('扩展条件') ?>

<p>
    可以根据其他条件分配关联的动作，例如，通过 <span class="notranslate">namespace</span> 中的一般组：
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.namespace.php', false);  ?>
<p>
    此外，事件类继承自 <span class="notranslate">Hleb\Base\Container</span>，这使得它们可以使用容器中的服务。
    在事件类的构造函数中也可以通过 <span class="notranslate">Dependency Injection</span> 获取这些服务。<br>
    使用的可能性没有限制，当然要保持代码的可读性和优化。
    下面是如何为特定的类和方法设置基于 <span class="notranslate">HTTP</span> 请求方法的条件：
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.method.php', false);  ?>

<?= Link::previousPage('docs.2.0.console.command.page', '控制台命令'); ?>

<?= Link::nextPage('docs.2.0.introduction.page', '介绍'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('容器') ?>
<p>
    在 <span class="notranslate">HLEB2</span> 框架中，<b>容器</b> 是一个所谓的 <b>服务</b> 集合，可以从中获取服务或将服务添加到容器中。<br>
    服务是逻辑上自包含的结构，用于特定目的。
</p>
<p>
    在 <span class="notranslate">HLEB2</span> 框架中，容器中的服务初始化过程被简化，没有不必要的抽象。<br>
    服务并不是通过框架从配置中初始化的，而是在一个特殊的类 <span class="notranslate">App\Bootstrap\BaseContainer</span> 中，该类可以被使用框架的开发者编辑。
    （大多数情况下，您会使用 <span class="notranslate">App\Bootstrap\ContainerFactory</span> 类，因为在该类中将服务定义为 <span class="notranslate"><i>单例</i></span>。）<br>
    这些类的所有文件都位于项目的 <span class="notranslate">/app/Bootstrap/</span> 目录中。
</p>
<p>
    通过这种结构，可以在容器中添加大量服务，而不会显著影响性能。
</p>

<?= Paragraph::h2('BaseContainer 类') ?>

<p>
    该类表示将用于获取服务的容器。
</p>
<p>
    如果每次从容器中请求服务时都需要新建一个该类的实例，则应在这里通过 <span class="notranslate">match()</span> 表达式指定。
</p>

<?= Code::fromFile('@views/docs/code/container/base.container.class.php');  ?>

<p>
    添加服务的方式类似于在 <span class="notranslate">ContainerFactory</span> 类中添加服务的方式。
</p>

<?= Paragraph::h2('ContainerFactory 类') ?>

<p>
    一个用于创建服务的 <span class="notranslate">单例</span> 工厂，并具备<a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">覆盖</a>框架默认服务的功能。
    用于添加自定义服务，这些服务仅在每个请求中初始化一次。
</p>
<p>
    例如，可能需要添加一个 <span class="notranslate">RequestIdService</span>，它返回当前请求的唯一 <span class="notranslate">ID</span>。
    这是一个演示服务示例，通常服务表示更复杂的结构。
    将其创建添加到 <span class="notranslate">ContainerFactory</span> 类中：
</p>

<?= Code::fromFile('@views/docs/code/container/container.factory.class.php');  ?>

<p>
    现在，当从容器中请求 <span class="notranslate">RequestIdInterface</span> 时，它将返回一个作为 <span class="notranslate">单例</span> 的 <span class="notranslate">RequestIdService</span> 实例。<br>
    获取的键不仅可以定义为接口，还可以是基础类 <span class="notranslate">RequestIdService</span>，在 <span class="notranslate">DI</span>（依赖注入）中将以这种方式使用。
</p>
<p class="hl-danger-block">
    尽管 <span class="notranslate">match()</span> 表达式可以包含多个键指向一个值，但为了避免服务重复（从而违反 <span class="notranslate">singleton</span> 原则），应只分配一个。
</p>

<p>
    从 <span class="notranslate">PHP v8.4</span> 开始，你可以在容器中使用对“延迟对象”的支持。
    这种类型的对象从容器中获取时不会立即初始化，只有在首次访问时才会初始化。在 <span class="notranslate">App\Bootstrap\ContainerFactory</span> 类中，你需要如下定义服务：
</p>

<?= Code::fromFile('@views/docs/code/container/lazy.load.in.container.class.php', false);  ?>

<?= Paragraph::h2('在容器中创建方法') ?>

<p>
    为了简化使用键为 <span class="notranslate">RequestIdInterface</span> 的新服务的工作，让我们在容器中添加一个新方法。这将使通过 <span class="notranslate">IDE</span> 在容器中更容易找到它。<br>
    新方法 <span class="notranslate">requestId</span> 被添加到容器类 <span class="notranslate">(BaseContainer)</span>。现在该类看起来如下所示：
</p>

<?= Code::fromFile('@views/docs/code/container/new.base.container.class.php');  ?>

<p>
    重要！为了使其工作，<span class="notranslate">requestId</span> 方法还必须添加到 <span class="notranslate">App\Bootstrap\ContainerInterface</span> 接口中。
</p>
<p class="hl-info-block">
    在示例中，服务通过接口分配，这允许容器中的服务类发生变化，同时保持对接口的绑定。
    对于您自己的应用程序内部类，您也可以在此省略接口，并直接指定类映射。
</p>

<p class="hl-info-block">
    对于框架的标准服务，这些操作都已经完成；您可以通过相应的控制器方法获取它们。
</p>

<p>
    新服务的创建过程详见<a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">添加</a> 实际库的示例。
</p>
<p>
    创建互相依赖的服务在 <a href="<?= Link::url('docs.2.0.container.extended.prof.page'); ?>">非标准容器使用</a> 一节中描述。
</p>


<?= Paragraph::h2('容器的 rollback() 函数') ?>

<p>
    您可能已经注意到 <span class="notranslate">ContainerFactory</span> 类中的 <span class="notranslate">rollback()</span> 函数。
    该函数对于在框架的异步使用期间重置服务状态是必需的，例如，当与 <a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>"><span class="notranslate">RoadRunner</span></a> 一起使用时。
</p>
<p>

    其工作原理如下：<br>
    当框架完成异步请求时，它会重置标准服务的状态。<br>
    然后，它调用 <span class="notranslate">rollback()</span> 函数，以执行其中包含的代码以重置手动添加的服务的状态。
</p>
<p>
    因此，如果在异步模式下使用框架，您可以在此初始化服务状态重置（以及任何其他模块的重置）。
</p>


<?= Link::previousPage('docs.2.0.console.command.page', '控制台命令'); ?>

<?= Link::nextPage('docs.2.0.container.get.page', '使用容器'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

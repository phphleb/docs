<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('依赖注入') ?>

<p>
    <b>依赖注入</b>（也称为 <span class="notranslate">Dependency injection</span> 或 <span class="notranslate">DI</span>）是框架为创建对象的构造函数或其他方法提供依赖关系的机制。
</p>
<p>
    当框架创建诸如控制器、<span class="notranslate">middlewares</span>、命令等对象时，依赖注入已在调用目标方法（包括构造函数）时设置。
</p>
<p>
    根据 <span class="notranslate">DI</span> 机制，如果在方法的依赖（参数）中指定所需的类或接口，框架将尝试在容器中查找此类匹配项，从容器获取或自行创建对象并将其替换到必要的参数中。<br>
    如果在容器中未找到这样的服务，将尝试从项目中的合适类创建对象，而如果后者有自己的构造函数中的依赖，则框架将尝试以类似方式填充它们。<br>
    如果缺少具有默认值的参数的替换值，将使用默认值。<br>
    否则，框架将返回一条错误信息，指示无法成功使用指定依赖的 <span class="notranslate">DI</span>。
</p>

<?= Paragraph::h2('框架中的 DI 实现') ?>

<p>
    当框架侧创建控制器或 <span class="notranslate">middleware</span> 对象时，首先解决构造函数的依赖，然后是调用的方法。
</p>
<p>
    同样，当框架处理请求时，在匹配的控制器中将只调用一个方法。在这种情况下，依赖关系的来源（来自构造函数或方法）并不重要，尽管在某些情况下，构造函数更为方便。
</p>
<p>
    以下示例显示了通过 <span class="notranslate">DI</span> 从容器中不同分配 <span class="notranslate">$logger</span> 的两个控制器方法。
</p>

<?= Code::fromFile('@views/docs/code/di/controller.di.example.php'); ?>

<p>

    <span class="notranslate">middleware</span> 的依赖关系以类似方式设置。
</p>
<p>
    在框架命令和事件 <span class="notranslate">(Events)</span> 中，这以类似方式实现，但仅通过构造函数：
</p>

<?= Code::fromFile('@views/docs/code/di/command.di.example.php'); ?>

<?= Paragraph::h2('使用 DI 创建对象') ?>

<p>
    依赖注入的便捷之处在于，在测试期间我们可以为类的依赖关系创建必要的值。
    然而，手动创建对象时，自己初始化所有依赖会不方便。
    为了自动化这个过程，框架提供了 <span class="notranslate">Hleb\Static\DI</span> 类。
</p>

<?= Code::fromFile('@views/docs/code/di/object.di.example.php', false); ?>
<p>
    本节展示了如何创建一个类的对象，该类的构造函数中具有依赖项，以及如何调用对象的所需方法，该方法中也需要自动插入值。
    该示例还显示了一个不是来自容器的依赖关系（<span class="notranslate">Insert</span> 类），其对象被创建并注入到方法中。
</p>
<p>
    一个经常使用的 <span class="notranslate">DI</span> 变体与 <span class="notranslate">Request</span> 和 <span class="notranslate">Response</span>（在这种情况下从容器中获取）：
</p>

<?= Code::fromFile('@views/docs/code/di/class.di.example.php'); ?>

<p class="hl-info-block">
    由于接口命名法中存在不同的方式，从容器中获取标准服务可能涉及接口以 <span class="notranslate">Interface</span> 结尾或不结尾。
    例如，<span class="notranslate">Hleb\Reference\RequestInterface</span> 等同于 <span class="notranslate">Hleb\Reference\Interface\Request</span>。
</p>

<?= Paragraph::h2('自动连接未在容器中找到的依赖项') ?>

<p>
    正如前面提到的，如果在解析依赖项的过程中框架找不到容器中的依赖项，它将尝试自己创建该类的对象，并解析类构造函数中指定的依赖项。
</p>
<p>
    有一些方法可以指示在这种情况下应遵循的路径。
    配置参数 <span class="notranslate">system.autowiring.mode</span> 设置此类依赖项的管理模式。
    有一种模式可以完全禁用对未在容器中找到的依赖项的自动连接，还有一种类似的模式，但允许在存在 <span class="notranslate">AllowAutowire</span> 属性时使用类对象，以及 <span class="notranslate">NoAutowire</span> 属性，如果启用了支持此属性的允许模式，则禁止当前类的自动连接。
</p>

<?= Paragraph::h2('依赖管理') ?>

<p>
    使用特殊的 <span class="notranslate">DI</span> 属性，您可以在特定位置（类方法）指定要使用的具有指定接口的特定依赖项。如果在容器中找到来自属性的依赖项，则将从容器中使用。如果没有，那么与直接在方法中指定的情况一样，适用对于未在容器中找到的依赖项的自动连接规则。示例：
</p>

<?= Code::fromFile('@views/docs/code/di/class.autowiring.example.php'); ?>

<p>
    这展示了如何在参数中指定所需接口的特定类以及在属性中创建所需类的选项。
</p>

<?= Link::previousPage('docs.2.0.container.get.page', '检索服务'); ?>

<?= Link::nextPage('docs.2.0.service.request.page', '请求'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

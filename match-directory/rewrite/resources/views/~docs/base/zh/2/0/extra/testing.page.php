<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('测试') ?>

<p>
    框架的结构设计旨在避免对基于此框架的代码测试设置障碍。这适用于所有类型的控制器、标准服务以及自定义的框架功能。
</p>
<p>
    测试方法取决于服务的使用类型，这可以是同名类，具有静态方法格式如 <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span>，用于框架内置服务，或使用 <span class="notranslate">DI</span>，后者是将服务（及其他对象）注入到类的方法和构造函数中。
</p>
<p class="hl-info-block">
    在框架内，<span class="notranslate">Dependency Injection</span>仅适用于由框架创建的对象，包括控制器、<span class="notranslate">middleware</span>、命令、事件以及由名为<span class="notranslate">DI</span>的服务创建的对象。
</p>

<?= Paragraph::h2('Dependency Injection 测试') ?>

<p>
    这是一个使用 <span class="notranslate">DI</span> 的示例控制器：
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.di.php');  ?>

<p>
    假设您需要确保控制器返回文本<span class="notranslate">'OK'</span>，但不会发送消息到日志。
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.di.php', false);  ?>

<p>
    在这里，日志类被替换为具有相同接口的类，但其方法不会发送任何内容到日志。
</p>

<p class="hl-info-block">

    假定使用了某个专门的测试库（例如 <span class="notranslate"><a href="https://github.com/phphleb/test-o/">github.com/phhleb/test-o</a></span>），并通过其实现检查。
</p>

<p>
    现在，通过 <span class="notranslate">DI</span> 服务（具体是框架服务，而不是架构方法）调用任意类的方法：
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.service.di.php', false);  ?>

<p>
    在这种情况下，日志服务将从容器中注入，消息将记录到日志中。我们将修改方法调用以进行测试：
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.service.di.php', false);  ?>

<p>
    现在类已通过测试且没有进行日志记录。您可以通过这种方式将任何 <span class="notranslate">DI</span> 对象替换为自定义类，从而便于测试。
</p>

<?= Paragraph::h2('标准服务测试') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架的内置服务可以通过静态方法 <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span> 访问。
    这种方法简化了对服务的访问，但可能会使包含它们的模块的测试变得复杂，尽管仍然可行。以下是日志记录的示例：
</p>
<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.static.php', false);  ?>

<p>
    示例展示了如何将服务状态替换为测试对象，然后恢复到初始值。
    为防止在测试之外使用此方法，在生产项目中，<span class="notranslate">/config/common.php</span> 文件中的配置参数 <span class="notranslate">'container.mock.allowed'</span> 被设置为 <span class="notranslate">false</span>。
</p>

<?= Paragraph::h2('功能测试') ?>

<p>
    要运行初始化框架核心的测试，您可能需要将容器中的一些或所有服务替换为测试对象。
    为此，只需根据条件实现和分配您的服务（在示例中，这是全局常量 <span class="notranslate">APP_TEST_ON</span>）：
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.container.php');  ?>

<?= Paragraph::h2('测试内置功能') ?>

<p>
    框架中多项简化服务调用的内置功能，例如 <span class="notranslate">logger()</span> 函数，通过可测试的服务调用实现，在这种情况下是对 <span class="notranslate">Hleb\Static\Log</span> 的包装。
</p>

<?= Paragraph::h2('类中的$this-container测试') ?>

<p>
    在控制器、<span class="notranslate">middlewares</span>、命令、事件以及从 <span class="notranslate">Hleb\Base\Container</span> 继承的其他类中，可以像 <span class="notranslate">$this-container</span> 这样访问容器。
    如果您选择这种使用容器的方法（在项目中混合使用不同的方法会显得奇怪），则需要特别初始化对象构造函数以进行测试。
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.container.php', false);  ?>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


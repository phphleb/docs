<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('容器的非标准使用') ?>

<?= Paragraph::h2('初始化服務中的服務') ?>

<p>
    尽管通过<span class="notranslate">new</span>和空构造函数在容器中创建对象是一个良好的实践，最终，您可以将所有必要依赖项的创建委托给一个特殊类中的单独方法，并在容器中注册其执行。不过，也有方法可以在不创建单独包装类的情况下解决依赖关系。
</p>
<p>
    如果需要重用容器中的服务来初始化容器中的另一个服务，我们可以借助<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>提供的功能。在类<span class="notranslate">App\Bootstrap\ContainerFactory</span>中，这些方法是可用的，就像在用于创建容器的特殊类中一样。
</p>
<p>
    例如，必须初始化容器中的服务构造函数。为此，在<span class="notranslate">App\Bootstrap\ContainerFactory</span>类的<span class="notranslate">match</span>运算符体内，您需要添加以下匹配项：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.example.di.container.class.php', false);  ?>

<p>
    现在，在<span class="notranslate">DemoService</span>类的构造函数中，当前的<span class="notranslate">ExampleService</span>将按照容器中的定义注入。使用的示例中未明确指定的所有依赖项将自动解决（变体2）。
</p>

<p class="hl-info-block">
    重要的是确保依赖关系不会形成循环依赖，这种情况可能发生在容器中的对象再次请求容器以初始化其自身时。
</p>
<p>
    更复杂的示例：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.demo.di.container.class.php', false);  ?>

<p>
    通过这种方式，尽管框架容器看似简单，您可以添加各种相互依赖的服务。
</p>

<?= Paragraph::h2('在用户代码中添加服务') ?>

<p>
    默认情况下，框架不允许在容器初始化后添加服务。然而，通过在 <span class="notranslate">ContainerFactory</span> 类中将 <span class="notranslate">getSingleton()</span> 方法重写为公共的，你可以通过这个静态方法在用户代码中将对象添加到容器中。以下是修改类的示例：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/set.singleton.container.class.php', false);  ?>

<p>
    从示例可以看出，还增加了通过 <span class="notranslate">callable</span> 类型及其处理程序的延迟初始化支持。
</p>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


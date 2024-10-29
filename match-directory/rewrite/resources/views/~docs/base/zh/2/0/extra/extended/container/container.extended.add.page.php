<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('将服务添加到容器中') ?>

<p>
    在描述<span class="notranslate">HLEB2</span>框架的<a href="<?= Link::url('docs.2.0.container.container.page'); ?>">容器</a>部分中，此文档已经提供了一个添加演示服务的简单示例。
    接下来，我们将着眼于将一个真实的互斥锁库作为服务添加的示例。
</p>

<p class="hl-info-block">
    库<a href="https://github.com/phphleb/conductor">github.com/phphleb/conductor</a>包含互斥锁机制。如果您计划使用此库，则需要先安装它。
</p>

<p>
    可以将容器中的键指定为库中的类，但以后这可能会导致问题，因为应用程序的代码将与特定类或库接口绑定，无法替换。
</p>

<p>
    将外部库连接到项目最好使用适配器模式，其类将作为容器中的服务键。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.class.php');  ?>

<p>
    此服务的包装类创建在/app/Bootstrap/Services/文件夹中。
    尽管这对于示例来说是一个方便的目录，但从结构上讲，服务文件夹应位于项目逻辑旁边。
</p>
<p>
    现在通过创建的类将库添加到容器中：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.container.php');  ?>

<p>
    从示例中可以看到，<span class="notranslate">rollback()</span>方法被添加以重置支持异步的互斥锁库的状态。
</p>
<p>
    添加后，新服务可以通过此类以<span class="notranslate">singleton</span>的方式从容器中获取。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.code.php', false);  ?>

<p>
    在控制器、命令和事件中（在所有继承自<span class="notranslate">Hleb\Base\Container</span>的类中）使用新增服务的方法：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.controller.php', false);  ?>

<p>
    您可以通过在<span class="notranslate">App\Bootstrap\BaseContainer</span>类及其接口中添加一个同名方法<span class="notranslate">mutex()</span>来简化服务调用：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.method.php', false);  ?>

<p>
    现在调用将如下：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.method.method.php', false);  ?>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


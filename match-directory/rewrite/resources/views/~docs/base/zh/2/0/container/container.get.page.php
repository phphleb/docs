<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('从容器获取服务') ?>

<p>
    可以通过多种方式实现对容器内容的直接访问。
    为了选择适合具体项目代码的合适方法，有必要考虑每种方法的优缺点以及测试选项。
</p>

<?= Paragraph::h2('当前类中对容器的引用') ?>

<p>
    从类 <span class="notranslate">Hleb\Base\Container</span> 继承的类在方法和属性 <span class="notranslate"><b>$this->container</b></span> 中获得了访问服务的额外功能。
    框架的标准类 - 控制器、<span class="notranslate">middlewares</span>、命令、事件，已经从该类继承。
</p>
<p>
    如果容器接口中的服务分配了自己的方法，则可以通过该方法访问服务。
    控制器中演示服务的访问示例：
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.class.php'); ?>

<p>
    指向容器的引用存储在从 <span class="notranslate">Hleb\Base\Container</span> 继承的对象类的属性 <span class="notranslate">$this->config</span>（数组中的键 <span class="notranslate">'container'</span>）中。
    在创建指定对象时，可以在参数 <span class="notranslate">'config'</span> 中分配不同的值（例如，带测试容器）。<br>

    否则，如果在参数 <span class="notranslate">'config'</span> 中未指定特定的容器或缺少构造函数的参数 <span class="notranslate">'config'</span>，则默认会创建容器。
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.example.php'); ?>

<p>
    模型类是例外，其中文件同样获取服务将如下：
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.model.php'); ?>

<?= Paragraph::h2('Container 类') ?>

<p>
    对服务容器的访问还由 <span class="notranslate">Hleb\Static\Container</span> 类提供，例如：
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.container.php', false); ?>

<?= Paragraph::h2('标准服务') ?>

<p>
    在 <span class="notranslate">/vendor/phphleb/framework/Static/</span> 文件夹中，有框架标准服务的包装类，可以在代码中类似于类 <span class="notranslate">Hleb\Static\Container</span> 使用，但仅用于单独的服务。<br>
    这些服务也可以通过先前提到的方法获得。
</p>

<p class="hl-info-block">
    由于接口命名中存在不同的方法，从容器中获取标准服务可以带有 <span class="notranslate">Interface</span> 后缀，也可以不带。
    例如，<span class="notranslate">Hleb\Reference\RequestInterface</span> 等同于 <span class="notranslate">Hleb\Reference\Interface\Request</span>。
</p>

<?= Link::previousPage('docs.2.0.container.container.page', '容器结构'); ?>

<?= Link::nextPage('docs.2.0.container.di.page', '依赖注入'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

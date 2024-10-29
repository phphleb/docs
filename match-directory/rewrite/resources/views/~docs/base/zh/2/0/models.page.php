<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('模型') ?>

<p>
    模型是架构模式<span class="notranslate">MVC</span>的组成部分<br>
    （用于网络的<span class="notranslate">Action-Domain-Responder</span>）。
</p>
<p>
    在<span class="notranslate">HLEB2</span>框架中，模型由具有静态访问方法的模板表示。
    模型可以为某些数据集提供访问，通常是连接的数据库管理系统（DBMS）。
</p>
<p>
    提供的模板可由开发者自行使用。
    可以使用<span class="notranslate">PDO</span>的内置包装器（类<span class="notranslate">Hleb\Static\DB</span>）或替换为您自己的模板，例如，通过连接一个现有的<span class="notranslate">ORM</span>。
</p>

<?= Paragraph::h2('创建模板') ?>

<p>
    除了复制和修改示例文件<span class="notranslate">DefaultModel.php</span>之外，还有另一种简单方法，通过控制台命令创建所需的类。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model ExampleModel</p>

<p>
    这个命令将创建一个新的模板<span class="notranslate">/app/Models/ExampleModel.php.</span><br>
    可以为类使用另一个合适的名称。<br>
    <span class="notranslate">HLEB2</span>框架还允许为此命令创建<a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">自定义模板</a>。
</p>

<?= Link::previousPage('docs.2.0.controller.middleware.page', '中间件'); ?>

<?= Link::nextPage('docs.2.0.template.standard.page', '模板'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

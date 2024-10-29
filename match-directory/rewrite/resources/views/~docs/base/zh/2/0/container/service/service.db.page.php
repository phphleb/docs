<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('DB 服务 — 使用数据库') ?>

<p>
    <span class="notranslate"><b>DB</b></span> 服务提供了向数据库发送查询的初始能力。通过使用 <span class="notranslate">PDO</span> 和 <span class="notranslate">HLEB2</span> 框架的数据库配置的包装器，该服务提供了简单的方法与各种数据库（由 <span class="notranslate">PDO</span> 支持）进行交互。
</p>

<p class="hl-info-block">
    必须启用 <span class="notranslate">PHP PDO</span> 扩展和必要的数据库<a href="https://www.php.net/manual/zh/pdo.installation.php" rel="nofollow" target="_blank">驱动程序</a>才能让此服务工作。
</p>

<p>
    要使用不同的连接方法，例如 <span class="notranslate">ORM(对象关系映射)</span>，请根据框架的配置设置添加选择的 <span class="notranslate">ORM</span> 作为服务容器。
</p>
<P>
    根据 <span class="notranslate">HLEB2</span> 框架提供的项目结构，<span class="notranslate">DB</span> 服务只能在模型类中使用。<br>
    一个模型类（其模板可以使用控制台命令创建）作为<span class="notranslate">MVC</span>（用于 Web 的 <span class="notranslate">Action-Domain-Responder</span>）中使用的基本框架。
    可以根据需要调整或替换为选择的 <span class="notranslate">AR(活动记录)</span> 或 <span class="notranslate">ORM</span> 库（然后调整控制台命令的模板）。
</P>
<p>
    在模型中使用数据库查询的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.container.php');  ?>

<p>
    使用以下 <span class="notranslate">DB</span> 服务的方法来执行数据库查询。
</p>

<?= Paragraph::h2('dbQuery()') ?>

<p>
    <span class="notranslate"><b>dbQuery()</b></span> 方法在上面的示例中用于直接创建 <span class="notranslate">SQL</span> 数据库查询。
    在它中，查询和查询参数没有分开，因此必须使用特殊的 <span class="notranslate"><b>quote()</b></span> 方法处理（正确地转义）每个可疑参数，尤其是来自 <span class="notranslate">Request</span> 的参数。
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.query.php', false);  ?>

<p class="hl-danger-block">
    转义查询参数可确保防止 <span class="notranslate">SQL</span> 注入。
    这种攻击基于将任意 <span class="notranslate">SQL</span> 表达式注入为外部数据的一部分。
</p>

<p>
    <span class="notranslate">DB</span> 服务的另一种方法更为通用并简化了参数处理。
</p>

<?= Paragraph::h2('run()') ?>
<p>
    成功执行后，<span class="notranslate"><b>run()</b></span>方法将返回一个已初始化的<span class="notranslate">PDOStatement</span>对象。
    该对象的所有方法，如<span class="notranslate">fetch()</span>和<span class="notranslate">fetchColumn()</span>，都是<span class="notranslate">PDO</span>的标准方法。
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.run.php', false);  ?>

<p>
    <span class="notranslate">PDOStatement</span>的功能已在<a href="https://www.php.net/manual/zh/class.pdostatement.php" target="_blank" rel="nofollow">PDO文档</a>中详细描述。
</p>

<?= Paragraph::h2('异步查询') ?>

<p>
    对于异步查询，使用该服务的方式类似，并取决于所使用的Web服务器配置。
</p>
<p>
    此外，一些<span class="notranslate">ORM</span>库已适应此模式运行。
</p>
<p>
    根据其文档，其中一个这样的库是<span class="notranslate"><span class="hl-nowrap"><a href="https://github.com/cycle/orm" target="_blank" rel="nofollow">Cycle ORM</a></span></span>。
</p>

<?= Link::previousPage('docs.2.0.service.path.page', 'Path'); ?>

<?= Link::nextPage('docs.2.0.service.session.page', 'Sessions'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

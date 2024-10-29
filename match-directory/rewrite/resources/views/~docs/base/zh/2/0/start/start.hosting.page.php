<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('安装和托管启动') ?>

<p>
    不同主机上的安装要求可能有所不同，但有一些基本细节将在此注明。
</p>

<?= Paragraph::h2('禁用DEBUG模式') ?>

<p>
    在任何公共服务器上都应该禁用调试模式，托管服务器也不例外。<br>
    为了与本地开发的设置分开，将文件 <span class="notranslate">/config/common.php</span> 复制为 <span class="notranslate">/config/common-local.php</span>，并在第一个文件中禁用 <span class="notranslate">debug</span> 模式，然后在第二个文件中启用它。<br>
    现在，如果没有将文件 <span class="notranslate">/config/common-local.php</span> 上传到托管服务器，设置将会有所不同。
</p>

<?= Paragraph::h2('严格的项目结构') ?>

<p>
    在主机服务器上，公共文件夹通常命名为 <span class="notranslate">public_html</span>，但也可能不同。要使用该文件夹，只需对框架项目中的 <span class="notranslate">public</span> 文件夹重新命名。
    <a href="<?= Link::url('docs.2.0.installation.page'); ?>">详细了解</a>如何更改公共文件夹名称。
</p>
<p>
    托管建议可能要求将项目放置在 <span class="notranslate">public_html</span> 中，但根据框架结构，应该将其放在上一级目录，以确保在迁移数据时公共文件夹的一致性。
</p>

<?= Paragraph::h2('使用数据库') ?>

<p>
    托管提供商很可能提供一个数据库和连接的方法。这些设置可能与本地开发的设置不同。
    为了解决这个问题，请创建文件 <span class="notranslate">/config/database.php</span> 的副本，并命名为 <span class="notranslate">/config/database-local.php</span>，在第一个文件中设置托管配置，在副本中设置本地配置。

    现在，如果没有将文件 <span class="notranslate">/config/database-local.php</span> 传输到托管服务器，设置将保持独立。
</p>

<?= Paragraph::h2('任务调度') ?>

<p>
    框架包括内置的控制台命令及开发者定义的命令。
    如果主机提供了任务调度机制，这些控制台命令可以安排为任务。
</p>
<p>
    在调度器中设置任务时可能需要指定PHP可执行文件的完整路径。<br>
    例如：
</p>

<p class="hl-text-block"><span class="hl-not-selected notranslate">/usr/local/bin/php8.2 ~/project/dir/console rotate-logs 5</span></p>

<p>
    手动执行控制台命令的替代方法是使用框架的特别<a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web控制台</a>。
</p>

<?= Link::previousPage('docs.2.0.start.swoole.page', 'Swoole服务器'); ?>

<?= Link::nextPage('docs.2.0.routes.page', '路由'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

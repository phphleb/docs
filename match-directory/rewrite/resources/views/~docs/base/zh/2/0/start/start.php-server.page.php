<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('内置 PHP 网络服务器') ?>

<p>
    在安装 <span class="notranslate">HLEB2</span> 框架后，您可以使用内置的 <span class="notranslate">PHP</span> 网络服务器来验证其功能和设置。<br>
    这是官方文档的 <a href="https://www.php.net/manual/zh/features.commandline.webserver.php" target="_blank">链接</a>。<br>
</p>

<p class="hl-danger-block">
    对于 Linux，框架创建的资源（缓存）的权限将由终端用户设置，因此如果您之前没有配置权限，页面之后可能会对其他网络服务器变得不可访问。
    唯一能帮助的是通过 <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">控制台命令</a> 完全清除框架和路由的缓存。
</p>

<p>
    您可以通过在已安装项目的根目录中执行以下命令来检查框架：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php -S localhost:8000 -t public</p>

<p>
    由于 <span class="notranslate">public</span> 文件夹（如果您之前没有更改名称）是项目的公共目录，因此在执行此命令后，框架的欢迎页面将可以通过 <a href="http://localhost:8000" target="_blank">http://localhost:8000</a> 访问。
</p>

<p class="hl-danger-block">
    内置的 <span class="notranslate">PHP</span> 网络服务器不支持完整的服务器功能，且不应在公共网络中使用。
</p>

<?= Link::previousPage('docs.2.0.directories.page', '项目结构'); ?>

<?= Link::nextPage('docs.2.0.start.nginx.page', '使用 Nginx 运行'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

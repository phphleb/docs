<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('配置设置') ?>

<p>
    <span class="notranslate">HLEB2</span>框架的设置存储在<span class="notranslate">/<b>config</b>/</span>文件夹中的配置文件中。<br>
    在其中的一些文件的开头，您可能会发现类似这样的行：
</p>

<?= Code::fromFile('@views/docs/code/configuration.example.php', false);  ?>

<p>
    这段代码表示，如果在此文件夹中存在<span class="notranslate">common-local.php</span>文件，其设置将取代当前的（<span class="notranslate">common.php</span>文件）。
</p>
<p>
    因此，您可以创建这些文件的副本，并在名称中添加<span class="notranslate">'-local'</span>用于本地开发，而不用将它们添加到版本控制中（即，不上传至目标服务器）。在这些复制的文件中，请确保删除该代码行，因为它不再需要。
</p>
<p>
    为本地开发和最终服务器提供分开的配置便于设置。
</p>

<p class="hl-info-block">
    框架允许通过名称检索任何配置值，因此这些设置也可用于初始化第三方库。
</p>

<?= Paragraph::h2('调试模式') ?>

<p>
    在<span class="notranslate">DEBUG</span>模式下，框架的运行方式与通常略有不同，它显示调试信息和错误，这些信息和错误不应在公共资源上访问。
</p>

<p class="hl-danger-block">
    框架的调试模式仅应用于内部开发。
</p>

<p>
    要禁用/启用调试模式，请在<span class="notranslate">/config/common.php</span>文件中按需更改<span class="notranslate"><b>debug</b></span>值。
</p>
<p>
    其他配置设置可以用类似的方法修改。
</p>

<?= Paragraph::h2('主机限制') ?>

<p>
    为了防止头部 Host 欺骗，请在 <span class="notranslate"><b>allowed.hosts</b></span> 设置中指定支持的主机地址，例如在 <span class="notranslate">/config/common.php</span> 文件中使用的 <span class="notranslate">"example.com"</span> 和 <span class="notranslate">"www.example.com"</span>。您还可以使用正则表达式设置限制。在 <span class="notranslate">DEBUG</span> 模式下，将不会执行对此列表的主机匹配检查。
</p>
<p class="hl-info-block">
    良好的实践是在项目中使用不指定网站主机（域名）的相对链接。
</p>

<?= Paragraph::h2('缓存') ?>

<p>
    在调试模式下，关闭框架执行的缓存也很有帮助。此功能由<span class="notranslate">/config/common.php</span>文件中的设置<span class="notranslate"><b>app.cache.on</b></span>控制。
</p>

<?= Paragraph::h2('自动路由缓存更新') ?>

<p>

    框架默认内置了当开发人员对路由进行更改时自动更新路由缓存的功能。<br>
    这种功能对本地开发很便利，但随着请求量的增加，您可以在生产服务器上禁用自动更新，并在每次更改时使用特殊的控制台命令。自动更新模式通过<span class="notranslate"><b>routes.auto-update</b></span>参数在<span class="notranslate">/config/common.php</span>文件中调整。
</p>

<?= Paragraph::h2('错误日志输出') ?>

<p>
    默认情况下，错误信息会保存在<span class="notranslate">/storage/logs/</span>文件夹中的文件中。
    如果启用了<span class="notranslate">DEBUG</span>模式，则错误还可以显示给用户（在浏览器或通过<span class="notranslate">API</span>）。<br>
    错误级别可以在<span class="notranslate">/config/common.php</span>文件的<span class="notranslate"><b>error.reporting</b></span>设置中进行配置。
    初始状态下，报告所有<span class="notranslate">PHP</span>错误级别（推荐设置）。
</p>

<?= Paragraph::h2('时区') ?>

<p>
    <span class="notranslate">/config/common.php</span>文件中的<span class="notranslate"><b>timezone</b></span>设置指定日期/时间函数的时区。<br>
    默认：<span class="notranslate">'Europe/Moscow'</span>。
</p>

<?= Paragraph::h2('数据库设置') ?>

<p>
    <span class="notranslate">/config/database.php</span>文件包含所使用数据库的设置。
    最初，它提供了几个不同的示例。<br>
    在配置文件中，配置列表是一个具有键<span class="notranslate">'db.settings.list'</span>的嵌套数组，从中选择 <span class="notranslate"><b>'base.db.type'</b></span>选项指定的默认设置块。
</p>

<?= Link::previousPage('docs.2.0.tuning.page', '框架调整'); ?>

<?= Link::nextPage('docs.2.0.directories.page', '项目结构'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

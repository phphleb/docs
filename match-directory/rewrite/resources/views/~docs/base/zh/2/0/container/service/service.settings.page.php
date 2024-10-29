<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Settings') ?>

<p>
    <span class="notranslate"><b>Settings</b></span> 服务允许你从 <span class="notranslate">/config/</span> 目录中的文件获取标准或自定义的框架设置。
</p>
<p>
    在控制器（以及从 <span class="notranslate">Hleb\Base\Container</span> 继承的所有类）中使用 <span class="notranslate">Settings</span> 的方法，通过从 <span class="notranslate">/config/common.php</span> 文件中获取指定的时区为例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.container.php', false);  ?>

<p>
    在应用程序代码中访问 <span class="notranslate">Settings</span> 的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.static.php', false);  ?>

<p>
    <span class="notranslate">Settings</span> 对象也可以通过接口 <span class="notranslate">Hleb\Reference\Interface\Setting</span> 进行<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>获取。
</p>
<p>
    设置分为四组：<span class="notranslate">'common'</span>、<span class="notranslate">'main'</span>、<span class="notranslate">'database'</span> 和 <span class="notranslate">'system'</span>。
    它们对应于 <span class="notranslate">/config/</span> 目录中的配置文件。如果使用不同的文件，例如 <span class="notranslate">'main-local.php'</span> 而不是 <span class="notranslate">'main.php'</span>，则无论如何都必须使用名称 <span class="notranslate">'main'</span> 来获取设置。
</p>
<p>
    服务方法 - <span class="notranslate"><b>common()</b></span>, <span class="notranslate"><b>main()</b></span>, <span class="notranslate"><b>database()</b></span> 和 <span class="notranslate"><b>system()</b></span> 允许从相应的设置中检索参数。例如：
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.example.php', false);  ?>


<?= Link::previousPage('docs.2.0.service.router.page', 'Router'); ?>

<?= Link::nextPage('docs.2.0.service.csrf.page', 'CSRF Protection'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

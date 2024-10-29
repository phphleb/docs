<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('数据缓存') ?>

<p>
    框架的<span class="notranslate"><b>Cache</b></span>服务是简单的数据文件缓存。
    它的方法支持<span class="notranslate">PSR-16</span>。缓存的工作原理如下：<br>
    数据以唯一键存储于缓存中，并指定<span class="notranslate">ttl</span>（时间生存）以秒为单位。<br>
    从缓存创建开始的这段时间内，使用此键的缓存请求会返回缓存数据，数据保持不变。<br>
    可随时按键或全部清除缓存。<br>
    如果缓存未创建、清除或过期，将为指定时间创建新缓存。
</p>
<p>
    内置服务实现支持主要的<span class="notranslate">PHP</span>数据类型——字符串、数值、数组、对象（通过序列化）。
</p>

<p class="hl-info-block">
    如果需要更高级的缓存功能，可以在容器中添加另一个实现，替换或补充当前的实现。
    这可以是<a href="https://github.com/symfony/cache" target="_blank" rel="nofollow">github.com/symfony/cache</a>组件。
</p>

<p>
    在控制器（以及从<span class="notranslate">Hleb\Base\Container</span>继承的所有类）中使用<span class="notranslate">Cache</span>的方法，示例通过键获取缓存：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.container.php', false);  ?>

<p>
    在应用代码中从<span class="notranslate">Cache</span>获取缓存的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.static.php', false);  ?>

<p>

    还可以通过接口<span class="notranslate">Hleb\Reference\Interface\Cache</span>使用<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>访问<span class="notranslate">Cache</span>对象。
</p>

<p>
    为简化示例，后续将仅使用<span class="notranslate">Hleb\Static\Cache</span>访问。
</p>

<?= Paragraph::h2('唯一键') ?>

<p>
    这种缓存方法的最大挑战（除失效外）是选择一个能唯一标识缓存数据的唯一键。
</p>
<p>
    例如，如果您正在缓存从数据库获取的特定查询的数据，则键应包含有关该查询的信息，以及数据库名称，如果类似的查询可能在不同数据库中执行。
</p>

<?= Paragraph::h2('缓存初始化') ?>

<p>
    在此示例中，将以一分钟的过期期将测试验证结果添加到缓存中。当然，在实用条件下，选择缓存数据时，应选择生成比使用缓存更耗费资源的数据。
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.get.php', false);  ?>

<p>
    这里使用了 <span class="notranslate"><b>get()</b></span>、<span class="notranslate"><b>set()</b></span> 和 <span class="notranslate"><b>has()</b></span> 方法，分别用于根据键获取、添加到缓存和检查其存在性。
</p>
<p>
    这三个方法被一个名为 <span class="notranslate"><b>getConform()</b></span> 的方法所取代，该方法使用 Closure 函数来获取数据，如果在缓存中找不到它们。
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.conform.php', false);  ?>

<p>
    使用外部上下文的闭包函数示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.function.php', false);  ?>

<?= Paragraph::h2('清除缓存') ?>

<p>
    整个框架的缓存通过 <span class="notranslate"><b>clear()</b></span> 方法清除，但对大量缓存要谨慎使用。此调用应相对不频繁使用，也可以通过控制台命令来完成：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --clear-cache</p>

<p class="hl-info-block">
    清除整个缓存只会影响缓存的模板数据和由 Cache 服务添加的框架数据。
    <span class="notranslate">TWIG</span> 模板引擎有自己的缓存实现，并且提供了一个单独的控制台命令来清除它。
</p>

<p>
    如果需要按某个键删除缓存，可以使用 <b>delete()</b> 方法。
</p>
<p>
    为了让框架自动跟踪缓存的最大大小，需要在 <span class="notranslate">/config/common.php</span> 文件中配置 <span class="notranslate">'max.cache.size'</span> 选项。<br>
    该值以兆字节为单位的整数表示。
    由于缓存文件不均匀分布，这将是缓存文件目录最大大小的大致跟踪。
</p>

<p class="hl-info-block">
    如果不发生缓存，请确保在 <span class="notranslate">/config/common.php</span> 文件中启用 <span class="notranslate">'app.cache.on'</span> 设置；建议在调试模式下禁用它。
</p>


<?= Link::previousPage('docs.2.0.service.response.page', 'Response'); ?>

<?= Link::nextPage('docs.2.0.service.log.page', '日志记录'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

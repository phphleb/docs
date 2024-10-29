<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('转换为PSR') ?>

<p>
    为了使用基于 <a href="https://www.php-fig.org/psr/" target="_blank" rel="nofollow">PSR</a> 推荐的契约的外部库，你可能需要将自己的框架实体转换为相应的 <span class="notranslate">PSR</span> 对象。
</p>
<p class="hl-info-block">
    由于框架的自给自足原则和最初拒绝外部依赖，框架的系统类与标准类相似，但具有自己的接口。为了遵循标准，这通过使用作为服务实现的 <span class="notranslate">Converter</span> 适配器解决。
</p>
<p>
    <span class="notranslate"><b>Converter</b></span> 服务提供根据 <span class="notranslate">PSR</span> 接口获取对象的方法，这些接口由 <span class="notranslate">HLEB2</span> 框架的系统对象形成。
</p>
<p>
    在控制器中使用 <span class="notranslate">Converter</span> 的方法（以及从 <span class="notranslate">Hleb\Base\Container</span> 继承的所有类），通过使用 <span class="notranslate">PSR-3</span> 获取日志记录对象为例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.container.php', false);  ?>

<p>

    在应用程序代码中从 <span class="notranslate">Converter</span> 服务中获取 <span class="notranslate">logger</span> 对象的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.static.php', false);  ?>

<p>
    <span class="notranslate">Converter</span> 服务也可以通过接口 <span class="notranslate">Hleb\Reference\Interface\Converter</span> 进行<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>获取。
</p>

<?= Paragraph::h2('toPsr3Logger') ?>

<p>
    <span class="notranslate">toPsr3Logger()</span> 方法返回一个具有 <span class="notranslate">PSR-3</span> 接口的日志对象 (<span class="notranslate">Psr\Log\LoggerInterface</span>)。
</p>

<?= Paragraph::h2('toPsr11Container') ?>

<p>
    <span class="notranslate">toPsr11Container()</span> 方法返回一个具有 <span class="notranslate">PSR-11</span> 接口的容器对象 (<span class="notranslate">Psr\Container\ContainerInterface</span>)。
</p>

<?= Paragraph::h2('toPsr16SimpleCache') ?>

<p>
    <span class="notranslate">toPsr16SimpleCache()</span> 方法返回一个具有 <span class="notranslate">PSR-16</span> 接口的缓存对象 (<span class="notranslate">Psr\SimpleCache\CacheInterface</span>)。
</p>

<?= Paragraph::h2('PSR-7 对象') ?>

<p>
    有足够数量的第三方库用于处理 <span class="notranslate">PSR-7</span> 对象，因此在框架中包括另一个实现是没有必要的。例如，可以使用流行的 <span class="notranslate"><a href="https://github.com/Nyholm/psr7" target="_blank" rel="nofollow">Nyholm\Psr7</a></span> 库创建它们：
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.psr7.php', false);  ?>
<p>
    构造函数中的参数集取决于所选择的库。<br>
    为避免每次以这种方式初始化，可以将实现委托给一个单独的类或服务。
</p>

<?= Link::previousPage('docs.2.0.service.csrf.page', 'CSRF Protection'); ?>

<?= Link::nextPage('docs.2.0.events.page', 'Events'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

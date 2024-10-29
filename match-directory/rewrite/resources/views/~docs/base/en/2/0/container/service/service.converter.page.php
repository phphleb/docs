<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Converting to PSR') ?>

<p>
    To use external libraries that employ contracts based on <a href="https://www.php-fig.org/psr/" target="_blank" rel="nofollow">PSR</a> recommendations, you may need to convert your own framework entities into the appropriate <span class="notranslate">PSR</span> objects.
</p>
<p class="hl-info-block">
    Due to the framework's principle of self-sufficiency and initial rejection of external dependencies, the framework's system classes are similar to standard ones, but have their own interface. To adhere to the standards, this is addressed by using the <span class="notranslate">Converter</span> adapter, implemented as a Service.
</p>
<p>
    The <span class="notranslate"><b>Converter</b></span> service provides methods to obtain objects according to <span class="notranslate">PSR</span> interfaces, derived from the system objects of the <span class="notranslate">HLEB2</span> framework.
</p>
<p>
    Methods of using <span class="notranslate">Converter</span> in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) exemplified by retrieving an object for logging using <span class="notranslate">PSR-3</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.container.php', false);  ?>

<p>
    Example of retrieving a <span class="notranslate">logger</span> object from the <span class="notranslate">Converter</span> service within application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.static.php', false);  ?>

<p>
    The <span class="notranslate">Converter</span> service can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the interface <span class="notranslate">Hleb\Reference\Interface\Converter</span>.
</p>

<?= Paragraph::h2('toPsr3Logger') ?>

<p>
    The <span class="notranslate">toPsr3Logger()</span> method returns a logging object with the <span class="notranslate">PSR-3</span> interface (<span class="notranslate">Psr\Log\LoggerInterface</span>).
</p>

<?= Paragraph::h2('toPsr11Container') ?>

<p>
    The <span class="notranslate">toPsr11Container()</span> method returns a container object with the <span class="notranslate">PSR-11</span> interface (<span class="notranslate">Psr\Container\ContainerInterface</span>).
</p>

<?= Paragraph::h2('toPsr16SimpleCache') ?>

<p>
    The <span class="notranslate">toPsr16SimpleCache()</span> method returns a caching object with the <span class="notranslate">PSR-16</span> interface (<span class="notranslate">Psr\SimpleCache\CacheInterface</span>).
</p>

<?= Paragraph::h2('PSR-7 Objects') ?>

<p>
    There are a sufficient number of third-party libraries for handling <span class="notranslate">PSR-7</span> objects, so including another implementation in the framework is unnecessary. For example, they can be created using the popular <span class="notranslate"><a href="https://github.com/Nyholm/psr7" target="_blank" rel="nofollow">Nyholm\Psr7</a></span> library:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.psr7.php', false);  ?>
<p>
    The set of parameters in the constructor depends on the chosen library.<br>
    To avoid initializing this way each time, the implementation can be delegated to a separate class or service.
</p>

<?= Link::previousPage('docs.2.0.service.csrf.page', 'CSRF Protection'); ?>

<?= Link::nextPage('docs.2.0.events.page', 'Events'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

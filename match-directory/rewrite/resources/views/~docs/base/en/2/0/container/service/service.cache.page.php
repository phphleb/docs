<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Data Caching') ?>

<p>
    The framework's <span class="notranslate"><b>Cache</b></span> service is a simple file cache for data.
    Its methods support <span class="notranslate">PSR-16</span>. The caching works as follows:<br>
    Data is stored in the cache with a unique key, specifying a <span class="notranslate">ttl</span> in seconds.<br>
    Within this time, starting from cache creation, cache requests by this key return cached data, which remains unchanged.<br>
    The cache can be forcibly cleared by key or entirely at any time.<br>
    If the cache was not created, cleared, or expired, a new cache will be created for the specified duration.
</p>
<p>
    The built-in service implementation supports main <span class="notranslate">PHP</span> data types—strings, numeric values, arrays, objects (via serialization).
</p>

<p class="hl-info-block">
    If you need more advanced caching features, add another implementation to the container, replacing or supplementing the current one.
    This could be the <a href="https://github.com/symfony/cache" target="_blank" rel="nofollow">github.com/symfony/cache</a> component.
</p>

<p>
    Methods for using <span class="notranslate">Cache</span> in controllers (and all classes inheriting from <span class="notranslate">Hleb\Base\Container</span>) using the example of retrieving cache by key:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.container.php', false);  ?>

<p>
    Example of retrieving cache from <span class="notranslate">Cache</span> in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.static.php', false);  ?>

<p>
    The <span class="notranslate">Cache</span> object can also be accessed through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Cache</span> interface.
</p>

<p>
    To simplify examples, further ones will only use access through <span class="notranslate">Hleb\Static\Cache</span>.
</p>

<?= Paragraph::h2('Unique Key') ?>

<p>
    The most challenging aspect of this caching method (besides invalidation) is choosing a unique key that uniquely identifies the cached data.
</p>
<p>
    For instance, if you're caching data obtained from a database with a specific query, the key should include information about this query, as well as the database name if a similar query could be made from different databases.
</p>

<?= Paragraph::h2('Cache Initialization') ?>

<p>
    In this example, a test verification result will be added to the cache with an expiration period of one minute. Naturally, in real conditions, you should choose data for caching where forming it is more resource-intensive than using the cache.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.get.php', false);  ?>

<p>
    The methods <span class="notranslate"><b>get()</b></span>, <span class="notranslate"><b>set()</b></span>, and <span class="notranslate"><b>has()</b></span> have been used here respectively for retrieving, adding to the cache, and checking its existence by key.
</p>
<p>
    These three methods are replaced by a single method <span class="notranslate"><b>getConform()</b></span>, which operates with a Closure function to get data if they are not found in the cache.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.conform.php', false);  ?>

<p>
    Example with a closure function that uses an external context:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.function.php', false);  ?>

<?= Paragraph::h2('Clearing Cache') ?>

<p>
    The entire cache within the framework is cleared by using the <span class="notranslate"><b>clear()</b></span> method, but caution must be taken with a large amount of cache. This call should be used rather infrequently, and it can also be done via a console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --clear-cache</p>

<p class="hl-info-block">
    Clearing the entire cache will only affect the cached template data and the framework data added by the Cache service.
    The <span class="notranslate">TWIG</span> templating engine has its own cache implementation, and a separate console command is provided for clearing it.
</p>

<p>
    If there is a need to delete the cache by one of the keys, this can be done using the <b>delete()</b> method.
</p>
<p>
    To have the framework automatically track the maximum cache size, you need to configure the <span class="notranslate">'max.cache.size'</span> option in the <span class="notranslate">/config/common.php</span> file.<br>
    The value is represented as an integer in megabytes.
    Due to the uneven distribution of cache in the files, this will be an approximate tracking of the maximum directory size for cache files.
</p>

<p class="hl-info-block">
    If caching is not occurring, make sure the <span class="notranslate">'app.cache.on'</span> setting is enabled in the <span class="notranslate">/config/common.php</span> file; this is recommended to be disabled in debug mode.
</p>

<?= Link::previousPage('docs.2.0.service.response.page', 'Response'); ?>

<?= Link::nextPage('docs.2.0.service.log.page', 'Logging'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

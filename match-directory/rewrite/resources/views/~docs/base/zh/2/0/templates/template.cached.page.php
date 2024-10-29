<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('缓存模板') ?>

<p>
    除了内置于框架中的功能允许嵌入<a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">标准模板</a>之外，还可以将模板内容放入缓存中。
</p>
<p>
    缓存可以加速应用程序的某些部分，也可能减慢它们，如果这些部分已经运行得很快。
    鉴于模板应该只提供数据而不是进行复杂计算，缓存应在更高层进行。
    然而，对于严格专用的情况，尤其是在另一个模板中嵌入多个模板导致资源消耗增加的情况下，缓存该模板一小段时间是有意义的。
</p>
<p>
    模板缓存不适用于需要授权的动态更改页面和站点内部页面，因为在缓存生命周期内，用户可能会退出，但这不会在页面上反映出来。
    最好用于静态站点页面，这些页面很少更改，并且在没有安全关键条件（如授权）的区域中。
</p>

<?= Paragraph::h2('函数 insertCacheTemplate()') ?>

<p>
    此函数类似于 insertTemplate()，但包含一个额外的参数 sec，您可以在其中指定缓存的持续时间（以秒为单位）。
    在此期限届满后，下一次请求模板将在缓存中刷新相同数量的秒数（示例中为一分钟）。
</p>

<?= Code::fromFile('@views/docs/code/template/insert.cached.template.php');  ?>

<p>
    对进入缓存模板的数据以及可能从外部源在模板内获取的数据应保持谨慎。<br>
    在第一个情况下，将根据更改的数据的哈希创建新缓存，导致缓存数据占用的磁盘空间增加。
    在第二种情况下，数据将不会更改，并且从刷新时起将保留在缓存中。
</p>

<?= Code::fromFile('@views/docs/code/template/param.cached.template.php');  ?>

<p>
    在示例中，每个不同的用户 ID 都会在请求时创建一个单独的哈希，而对于值为 NULL，则会返回另一个缓存变体。<br>
</p>

<p class="hl-danger-block">
    对于模板缓存的适合性有任何疑问时，最好不要这样做。
</p>

<?= Link::previousPage('docs.2.0.template.standard.page', '标准模板'); ?>

<?= Link::nextPage('docs.2.0.template.twig.page', 'TWIG 模板引擎'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('重写默认服务') ?>

<p>
    从<a href="<?= Link::url('docs.2.0.container.container.page'); ?>">容器</a>中获取默认服务可以通过在用户容器中添加一个具有类似接口的自定义服务来修改。
    您需要创建一个新服务，并在App\Bootstrap\ContainerFactory类的 'getSingleton' 方法中返回它，然后再从默认服务中进行选择。
    在 <span class="notranslate">HLEB2</span> 框架中，每个内置服务使用两个相同的接口（用于不同的命名选项），您必须为以 <span class="notranslate">'Interface'</span>结尾的接口返回您的自定义服务作为<span class="notranslate">singleton</span>。
    例如，对于缓存服务，它将是<span class="notranslate">'Hleb\Reference\CacheInterface'</span>。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/replace/replace.example.compare.php');  ?>

<p>
    该示例展示了如何将默认缓存服务替换为您自己的服务。
    在这里，它可以使用数据库存储进行缓存，而不是基于文件的（默认）。
</p>
<p>
    同样，您可以通过将默认服务重写为 <span class="notranslate">NULL</span> 值来“删除”它。
    但首先，您必须确保该服务既未在框架本身的代码中使用，也未在应用程序代码中使用。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


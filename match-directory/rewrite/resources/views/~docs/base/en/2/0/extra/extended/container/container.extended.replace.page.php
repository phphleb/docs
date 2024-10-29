<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Overriding the Default Service') ?>

<p>
    Fetching a default service from the <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">container</a> can be modified by adding your own service with a similar interface to the user container.
    You need to create a new service and return it from the 'getSingleton' method of the App\Bootstrap\ContainerFactory class before selecting from the default services.
    In the <span class="notranslate">HLEB2</span> framework, each built-in service uses two identical interfaces (for different naming options), and you must return your own service as a <span class="notranslate">singleton</span> for the interface ending with <span class="notranslate">'Interface'</span>.
    For example, for the caching service, it would be <span class="notranslate">'Hleb\Reference\CacheInterface'</span>.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/replace/replace.example.compare.php');  ?>

<p>
    The example shows how to replace the default caching service with your own.
    Here, it could be caching with database storage instead of file-based (default).
</p>
<p>
    Similarly, you can "remove" a default service from the container by overriding it with a <span class="notranslate">NULL</span> value.
    But first, you must ensure that the service is not used in either the framework's own code or the application's code.
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


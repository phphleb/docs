<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Non-Standard Use of the Container') ?>

<p>
    Although creating an object in the container using <span class="notranslate">new</span> with an empty constructor is a good practice, eventually, you can outsource the creation of all necessary dependencies to a separate method in a special class and register its execution in the container. However, there are ways to resolve dependencies without resorting to creating a separate wrapper class.
</p>
<p>
    If it becomes necessary to reuse a service from the container to initialize another service in the container, we turn to the capabilities provided by <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a>. In the class <span class="notranslate">App\Bootstrap\ContainerFactory</span>, these methods are available, as they are in a special class for creating the container.
</p>
<p>
    For example, it is necessary to initialize the constructor of a service in the container. To do this, in the body of the <span class="notranslate">match</span> operator of the <span class="notranslate">App\Bootstrap\ContainerFactory</span> class, you need to add approximately the following match:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.example.di.container.class.php', false);  ?>

<p>
    Now in the constructor of the <span class="notranslate">DemoService</span> class, the current <span class="notranslate">ExampleService</span> will be injected as defined in the container. All dependencies not explicitly specified in the used example will be resolved automatically (variant 2).
</p>

<p class="hl-info-block">
    It is important to ensure that dependencies do not form a cyclic dependency, which can occur if the object in the container makes another request to the container for the initialization of itself.
</p>
<p>
    A more complex example:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.demo.di.container.class.php', false);  ?>

<p>
    In this way, in the framework's container, despite its seeming simplicity, you can add various interdependent services.
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


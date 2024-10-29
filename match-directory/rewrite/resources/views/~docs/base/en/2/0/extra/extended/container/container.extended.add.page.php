<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Adding a Service to the Container') ?>

<p>
    In the section describing the <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">Container</a> for the <span class="notranslate">HLEB2</span> framework, this documentation already provides a simple example of adding a demo service.
    Next, we'll look at an example of adding a real library for mutexes as a Service.
</p>

<p class="hl-info-block">
    The library <a href="https://github.com/phphleb/conductor">github.com/phphleb/conductor</a> contains a mutex mechanism. If you plan to use this library, you need to install it first.
</p>

<p>
    It is perfectly possible to assign a key in the container as a class from the library, but this may cause issues later as the application's code will be tied to a specific class or library interface, making it impossible to change it.
</p>

<p>
    It is better to connect external libraries to the project using the Adapter pattern, the class of which will be the key of the service in the container.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.class.php');  ?>

<p>
    This wrapper class for the service is created in the /app/Bootstrap/Services/ folder.
    Although this is a convenient directory for examples, structurally the Services folder should be located next to the project logic.
</p>
<p>
    Now let's add the library to the container by the created class:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.container.php');  ?>

<p>
    As seen in the example, the <span class="notranslate">rollback()</span> method has been added to reset the state for the connected mutex library that supports asynchrony.
</p>
<p>
    After adding, the new service is available from the container as a <span class="notranslate">singleton</span> through this class.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.code.php', false);  ?>

<p>
    The method of using the added service in controllers, commands, and events (in all classes inherited from <span class="notranslate">Hleb\Base\Container</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.controller.php', false);  ?>

<p>
    You can simplify the example call to the service by adding a new method with the same name <span class="notranslate">mutex()</span> to the <span class="notranslate">App\Bootstrap\BaseContainer</span> class and its interface:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.method.php', false);  ?>

<p>
    Now the call will look like this:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.method.method.php', false);  ?>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


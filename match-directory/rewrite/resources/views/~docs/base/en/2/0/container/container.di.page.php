<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Dependency Injection') ?>

<p>
    <b>Dependency Injection</b> (also <span class="notranslate">DI</span>) is a framework mechanism for supplying dependencies to the constructor or other methods of created objects.
</p>
<p>
    When the framework creates objects such as controllers, <span class="notranslate">middlewares</span>, commands, and others, dependency injection is already set up when the target method (including the constructor) is called.
</p>
<p>
    According to the <span class="notranslate">DI</span> mechanism, if you specify the necessary classes or interfaces in the method's dependencies (arguments), the framework will attempt to find such matches in the container, retrieve them from the container, or create the object itself and substitute it in the required argument.<br>
    If such a service is not found in the container, an attempt will be made to create an object from a suitable class in the project, and if the latter has dependencies in its constructor, the framework will try to fill them in a similar way.<br>
    If there are no substitution values for arguments with default values, the default will be used.<br>
    Otherwise, the framework will return an error indicating that the <span class="notranslate">DI</span> for the specified dependencies could not be successfully used.
</p>

<?= Paragraph::h2('DI Implementation in the Framework') ?>

<p>
    When a controller or <span class="notranslate">middleware</span> object is created on the framework side, the constructor's dependencies are resolved first, then those of the called method.
</p>
<p>
    Also, when a request is processed by the framework, only one method in the matched controller will be called. In such a case, it doesn't matter where the dependency comes from, whether from the constructor or method, although in some cases, the constructor is more convenient.
</p>
<p>
    The following example shows two controller methods with different assignments of <span class="notranslate">$logger</span> from the container via <span class="notranslate">DI</span>.
</p>

<?= Code::fromFile('@views/docs/code/di/controller.di.example.php'); ?>

<p>
    Dependencies for <span class="notranslate">middleware</span> are set in a similar manner.
</p>
<p>
    In the framework commands and events <span class="notranslate">(Events)</span>, this is implemented in a similar way, but only through the constructor:
</p>

<?= Code::fromFile('@views/docs/code/di/command.di.example.php'); ?>

<?= Paragraph::h2('Creating Objects with DI') ?>

<p>
    Dependency injection is convenient because during testing, we can create the necessary values for class dependencies.
    However, when creating an object manually, initializing all its dependencies ourselves would be inconvenient.
    To automate this process, the framework provides the <span class="notranslate">Hleb\Static\DI</span> class.
</p>

<?= Code::fromFile('@views/docs/code/di/object.di.example.php', false); ?>
<p>
    This section demonstrates how to create an object of a class whose constructor has a dependency, and how to call the desired method of the object where a value also needs to be automatically inserted.
    The example also shows a dependency that is not from the container (the <span class="notranslate">Insert</span> class), whose object is created and injected into the method.
</p>
<p>
    A frequently used variant of <span class="notranslate">DI</span> with <span class="notranslate">Request</span> and <span class="notranslate">Response</span> (in this case obtained from the container):
</p>

<?= Code::fromFile('@views/docs/code/di/class.di.example.php'); ?>

<p class="hl-info-block">
    Due to various approaches in interface naming conventions, obtaining standard services from the container may involve interfaces ending with <span class="notranslate">Interface</span> or not.
    For example, <span class="notranslate">Hleb\Reference\RequestInterface</span> is equivalent to <span class="notranslate">Hleb\Reference\Interface\Request</span>.
</p>

<?= Link::previousPage('docs.2.0.container.get.page', 'Retrieving Service'); ?>

<?= Link::nextPage('docs.2.0.service.request.page', 'Request'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

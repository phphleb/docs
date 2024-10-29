<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Container') ?>
<p>
    The <b>Container</b> in the <span class="notranslate">HLEB2</span> framework is a collection of so-called <b>services</b>, which can be retrieved from or added to the container.<br>
    Services are logically self-contained structures with a specific purpose.
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, the initialization of services in the container is streamlined without unnecessary abstraction.<br>
    Services are not initialized by the framework from configuration, as is typically implemented, but rather within a special class <span class="notranslate">App\Bootstrap\BaseContainer</span>, which is accessible for editing by the developer using the framework.
    (Most often, you'll use the <span class="notranslate">App\Bootstrap\ContainerFactory</span> class, where services are defined as <span class="notranslate"><i>singletons</i></span>.)<br>
    All the files for these classes are located in the <span class="notranslate">/app/Bootstrap/</span> directory of the project.
</p>
<p>
    This structure allows a significant number of services to be added to the container without a major impact on performance.
</p>

<?= Paragraph::h2('BaseContainer Class') ?>

<p>
    This class represents the container that will be used to retrieve services.
</p>
<p>
    If a service needs to be a new instance of the class each time it's requested from the container, it should be specified here within a <span class="notranslate">match()</span> expression.
</p>

<?= Code::fromFile('@views/docs/code/container/base.container.class.php');  ?>

<p>
    Adding a service is similar to adding it in the <span class="notranslate">ContainerFactory</span> class.
</p>

<?= Paragraph::h2('ContainerFactory Class') ?>

<p>
    A factory for creating services as <span class="notranslate">singletons</span>, with the ability to <a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">override</a> the framework's default services.
    It's used to add custom services, which are initialized only once per request.
</p>
<p>
    For example, we might need to add a <span class="notranslate">RequestIdService</span> that returns a unique <span class="notranslate">ID</span> for the current request.
    This is a demonstration example of a service; in general, services represent more complex structures.
    Let's add its creation to the <span class="notranslate">ContainerFactory</span> class:
</p>

<?= Code::fromFile('@views/docs/code/container/container.factory.class.php');  ?>

<p>
    Now, when the <span class="notranslate">RequestIdInterface</span> is requested from the container, it will return an instance of <span class="notranslate">RequestIdService</span>, stored as a <span class="notranslate">singleton</span>.<br>
    The key for retrieval can be defined not only as an interface but also as the base class <span class="notranslate">RequestIdService</span>, as it will be utilized in <span class="notranslate">DI</span> (Dependency Injection).
</p>
<p class="hl-danger-block">
    Despite the fact that the <span class="notranslate">match()</span> expression can contain multiple keys to a value, to avoid duplicating services (and consequently violating the <span class="notranslate">singleton</span> principle), only one should be assigned.
</p>

<?= Paragraph::h2('Creating a Method in the Container') ?>

<p>
    To simplify working with the new service keyed by <span class="notranslate">RequestIdInterface</span>, let's add a new method in the container. This will make it easier to find in the container through the <span class="notranslate">IDE</span>.<br>
    The new method <span class="notranslate">requestId</span> is added to the container class <span class="notranslate">(BaseContainer)</span>. Now the class looks like this:
</p>

<?= Code::fromFile('@views/docs/code/container/new.base.container.class.php');  ?>

<p>
    Important! For this to work, the <span class="notranslate">requestId</span> method must also be added to the <span class="notranslate">App\Bootstrap\ContainerInterface</span> interface.
</p>
<p class="hl-info-block">
    In the example, the service is assigned by interface, allowing the service class in the container to change while maintaining the interface linkage.
    For your own internal application classes, you can also omit the interface here and specify the class mapping directly.
</p>

<p class="hl-info-block">
    For the framework's standard services, all these actions have already been done; you can retrieve them through the corresponding controller method.
</p>

<p>
    The process of creating a new service is detailed in the <a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">example of adding</a> a real library.
</p>
<p>
    Creating interdependent services is described in the section <a href="<?= Link::url('docs.2.0.container.extended.prof.page'); ?>">non-standard container usage</a>.
</p>


<?= Paragraph::h2('rollback() Function of the Container') ?>

<p>
    You have probably noticed the <span class="notranslate">rollback()</span> function in the <span class="notranslate">ContainerFactory</span> class.
    This function is necessary for resetting the states of services during asynchronous use of the framework, for example, when used with <a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>"><span class="notranslate">RoadRunner</span></a>.
</p>
<p>
    Here is how it works:<br>
    When the framework completes an asynchronous request, it resets the state of standard services.<br>
    Then, it calls the <span class="notranslate">rollback()</span> function to execute the code it contains to reset the state of manually added services.
</p>
<p>
    Therefore, if the framework is used in asynchronous mode, you can initialize the service state reset (as well as that of any other module) here.
</p>


<?= Link::previousPage('docs.2.0.console.command.page', 'Console Commands'); ?>

<?= Link::nextPage('docs.2.0.container.get.page', 'Using the Container'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Accessing a Service from the Container') ?>

<p>
    Direct access to the container's content is implemented in several ways.
    To choose the appropriate method suitable for coding a specific project, it is necessary to consider the pros and cons of each approach, as well as their testing options.
</p>

<?= Paragraph::h2('Reference to the Container in the Current Class') ?>

<p>
    Classes inherited from the <span class="notranslate">Hleb\Base\Container</span> class gain additional capabilities in the form of methods and the <span class="notranslate"><b>$this->container</b></span> property to access services.
    The standard framework classes — controllers, <span class="notranslate">middlewares</span>, commands, events — are already inherited from this class.
</p>
<p>
    If a service in the container interface has its own method assigned, the service can be accessed through this method.
    Example of accessing a demo service in a controller:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.class.php'); ?>

<p>
    The reference to the container is stored in the <span class="notranslate">$this->config</span> property (key <span class="notranslate">'container'</span> in the array) of the object class inherited from <span class="notranslate">Hleb\Base\Container</span>.
    When creating the specified object, a different value can be assigned (for example, with a test container) in the <span class="notranslate">'config'</span> argument.<br>
    Otherwise, if a specific container is not specified in the <span class="notranslate">'config'</span> argument or the <span class="notranslate">'config'</span> argument of the constructor is missing, the container will be created by default.
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.example.php'); ?>

<p>
    Exceptions are the Model classes, where accessing the service similarly will be as follows:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.model.php'); ?>

<?= Paragraph::h2('Container Class') ?>

<p>
    Access to the service container is also provided by the <span class="notranslate">Hleb\Static\Container</span> class, for example:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.container.php', false); ?>

<?= Paragraph::h2('Standard Services') ?>

<p>
    In the <span class="notranslate">/vendor/phphleb/framework/Static/</span> folder, there are wrapper classes over the framework's standard services, which can be used in code similarly to the <span class="notranslate">Hleb\Static\Container</span> class, but for individual services.<br>
    These services can also be accessed using the previously mentioned methods.
</p>

<p class="hl-info-block">
    Due to the existence of different approaches in naming interfaces, accessing standard services from the container can be either with or without the <span class="notranslate">Interface</span> suffix.
    For example, <span class="notranslate">Hleb\Reference\RequestInterface</span> is equivalent to <span class="notranslate">Hleb\Reference\Interface\Request</span>.
</p>

<?= Link::previousPage('docs.2.0.container.container.page', 'Container Structure'); ?>

<?= Link::nextPage('docs.2.0.container.di.page', 'Dependency Injection'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

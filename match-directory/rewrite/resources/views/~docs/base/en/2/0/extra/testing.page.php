<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Testing') ?>

<p>
    The framework structure is designed to avoid any obstacles to code testing built on it. This applies to all types of controllers, standard services, and custom framework functions.
</p>
<p>
    The testing approach depends on the usage type of the services, which may be a corresponding class with static methods such as <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span> for built-in framework services, or <span class="notranslate">DI</span>, referring to service (and other object) injection into class methods and constructors.
</p>
<p class="hl-info-block">
    Dependency Injection within the framework is limited to objects created by it, including controllers, <span class="notranslate">middleware</span>, commands, events, and objects created by the service known as <span class="notranslate">DI</span>.
</p>

<?= Paragraph::h2('Testing for Dependency Injection') ?>

<p>
    A simple example of a demonstration controller with <span class="notranslate">DI</span>:
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.di.php');  ?>

<p>
    Suppose you need to ensure that the controller returns the text <span class="notranslate">'OK'</span> without sending a message to the logs.
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.di.php', false);  ?>

<p>
    Here, the logging class is replaced by a class with the same interface, but its methods do not send anything to the log.
</p>

<p class="hl-info-block">
    It is assumed that one of the special testing libraries (such as <span class="notranslate"><a href="https://github.com/phphleb/test-o/">github.com/phhleb/test-o</a></span>) is used, with checks implemented through it.
</p>

<p>
    Now, let’s invoke the method of an arbitrary class through the <span class="notranslate">DI</span> service (specifically the framework service, not the architectural pattern itself):
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.service.di.php', false);  ?>

<p>
    In this case, the logging service will be injected from the container, and the message will be logged. Let’s modify the method invocation for testing:
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.service.di.php', false);  ?>

<p>
    Now the class has been tested without logging occurring. You can substitute any <span class="notranslate">DI</span> object with a custom class designed for the required behavior, making it convenient for testing.
</p>

<?= Paragraph::h2('Testing Standard Services') ?>

<p>
    The built-in services of the <span class="notranslate">HLEB2</span> framework can be accessed with static methods such as <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span>.
    This approach simplifies access to services but can complicate testing of the modules containing them, although it is still feasible. Here's an example with logging:
</p>
<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.static.php', false);  ?>

<p>
    The example shows how the service state was replaced with a test object and then reverted to its initial value.
    To prevent this approach from being used outside of tests, in a production project, the configuration parameter <span class="notranslate">'container.mock.allowed'</span> in the <span class="notranslate">/config/common.php</span> file is set to <span class="notranslate">false</span>.
</p>

<?= Paragraph::h2('Functional Testing') ?>

<p>
    To run tests that initialize the core of the framework, you may need to replace some or all services in the container with test objects.
    To do this, simply implement your own service and assign it based on a condition (in the example, this is the global constant <span class="notranslate">APP_TEST_ON</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.container.php');  ?>

<?= Paragraph::h2('Testing Built-in Functions') ?>

<p>
    Several built-in framework functions that simplify service calls, such as the <span class="notranslate">logger()</span> function, are implemented through tested service calls, in this case, as a wrapper around <span class="notranslate">Hleb\Static\Log</span>.
</p>

<?= Paragraph::h2('Testing for $this-container in Classes') ?>

<p>
    In controllers, <span class="notranslate">middlewares</span>, commands, events, and other classes inherited from <span class="notranslate">Hleb\Base\Container</span>, the container can be accessed as <span class="notranslate">$this-container</span>.
    If you choose this method of using the container (mixing various methods within a project would look odd), special initialization of the object constructor is required for testing.
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.container.php', false);  ?>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


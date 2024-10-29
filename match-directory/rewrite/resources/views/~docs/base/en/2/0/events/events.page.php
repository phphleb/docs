<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Events') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework has several predefined general events, each assigned to a specific action type.<br>
    All event classes are located in the <span class="notranslate">/app/Bootstrap/Events/</span> folder and are open to modifications. Technically, they replace the configuration, removing unnecessary "magic" from the project.
</p>
<p class="hl-info-block">
    Since these classes are tied to global events, it is recommended to segregate code depending on private implementations into separate classes.
</p>
<p class="hl-danger-block">
    Unoptimized code within Events can lead to reduced overall project performance.
</p>

<?= Paragraph::h2('ControllerEvent') ?>

<p>
    The <span class="notranslate">before()</span> method of this class is executed before each controller call from the framework. It allows you to determine which class and method are involved and, if necessary, alter the arguments given as a named array, returning them to the invoked controller method.<br>
    For instance, if an incoming Request validation by a third-party library is used, this check can be implemented through the <span class="notranslate">ControllerEvent</span> event.
</p>
<p>
    If present, the <span class="notranslate">after()</span> method allows you to override the controller's response and is executed immediately after the controller. The method receives this result in the <span class="notranslate">'result'</span> argument by reference, allowing you to change the returned data for a specific class and method of the controller.<br>
    Globally, this might involve transforming a returned array not into <span class="notranslate">JSON</span> as set by default, but into another format like <span class="notranslate">XML</span>.
</p>
<p>
    The following example demonstrates attaching an additional action before calling a specific class and method of the controller:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.controller.php');  ?>

<?= Paragraph::h2('MiddlewareEvent') ?>

<p>
    The <span class="notranslate">before()</span> method of this middleware class is executed before each middleware call from the framework. The method's arguments allow you to determine which class and method are involved, and whether this <span class="notranslate">middleware</span> is executed after the main action.<br>
    If necessary, there are options to modify the target middleware method's arguments, altering them, and returning them from the current method. In such a case, it is necessary to specify the condition to terminate the script execution after the result is output, by returning <span class="notranslate">false</span> from the <span class="notranslate">after()</span> method.
</p>
<p class="hl-info-block">
    The order of middlewares execution can be changed in routes, and this must be accounted for when assigning events to them, if necessary replacing elements of the Event depending on the execution order with corresponding separate middlewares.
</p>
<?= Paragraph::h2('ModuleEvent') ?>

<p>
    Since modules exist in isolation, each module's controllers have their own Event.<br>
    The <span class="notranslate">before()</span> method of the <span class="notranslate">ModuleEvent</span> class is executed before each controller call of any module in the framework.<br>
    Unlike <span class="notranslate">ControllerEvent</span>, there is an additional argument <span class="notranslate">$module</span> to determine the module name.<br>
    Similar to the controller event, this Event can also have an <span class="notranslate">after()</span> method.
</p>

<?= Paragraph::h2('PageEvent') ?>

<p>
    This is another event similar to <span class="notranslate">ControllerEvent</span>, tied to calls of special 'page controllers'.<br>
    Such pages are used in the framework's registration library for the admin panel and also on this documentation site.
</p>

<?= Paragraph::h2('TaskEvent') ?>

<p>
    The execution occurs before each framework command launch, excluding those built into it by default.
    It also allows determining the called class and the source of the call (from the code or from the console).
    <span class="notranslate">TaskEvent</span> receives and returns the final data for the arguments of the final method, thus allowing the connection of a third-party library here.
    For example, this could be a standard console handler from <span class="notranslate">Symfony</span>.
</p>
<p>
    The <span class="notranslate">after()</span> method for this event differs in that it has access to the data set in the task as <span class="notranslate">setResult()</span>.
    This data is passed by reference to the <span class="notranslate">'result'</span> argument and can be modified.<br>
    If necessary, you can similarly change the returned response status using the <span class="notranslate">statusCode()</span> method.
</p>
<p>
    A demonstration example showing one of the ways to organize response (with a single common interface) to the execution of various tasks:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.task.php');  ?>

<p>
    This principle can be applied not only to task events but to other Events as well.
</p>

<p class="hl-info-block">
    The <span class="notranslate">switch</span> operator is chosen for the Event due to its ability to match one result to multiple <span class="notranslate">case</span> blocks.
</p>

<?= Paragraph::h2('Extended Conditions') ?>

<p>
    Associated actions can also be assigned based on other conditions, for example, by a general group in the <span class="notranslate">namespace</span>:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.namespace.php', false);  ?>
<p>
    Additionally, event classes are inherited from <span class="notranslate">Hleb\Base\Container</span>, allowing them to use services from the container.
    These services can also be obtained in the event class constructors through <span class="notranslate">Dependency Injection.</span><br>
    The possibilities of using them are not limited, provided the code remains readable and optimized.
    Here's how you can set a condition based on the <span class="notranslate">HTTP</span> request method for a specific class and method:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.method.php', false);  ?>

<?= Link::previousPage('docs.2.0.console.command.page', 'Console commands'); ?>

<?= Link::nextPage('docs.2.0.introduction.page', 'Introduction'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


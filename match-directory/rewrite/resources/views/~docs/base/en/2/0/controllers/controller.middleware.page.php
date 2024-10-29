<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Middleware') ?>

<p>
    Middleware is a type of <a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">controller</a>, but its primary purpose is not to provide the expected response to the user (although middleware can return error texts), but to perform specific tasks before or after that response is generated.
</p>
<p>
    Unlike a controller, this middleware can be assigned not only to a route but also to a group of routes. Both can have multiple different middleware (or even the same ones, if needed).
</p>
<p>
    For example, user authorization can be implemented in middleware and applied to a group of routes where it is needed. Before the execution of the controller or any other primary action attached to the route, the current user and their authorization status will be determined.<br>
    Otherwise, the middleware class will hand over execution to another controller, return an error, or redirect to another route, depending on the implementation.
</p>

<p>
    When the middleware() method (options after() or before()) is applied in a route, it takes a data argument. This is another difference from the controller; a data array can be passed to this argument, which will then be available in middleware.
    The array data is accessible in the method Hleb\Static\Router::data() or via the container.
</p>

<p class="hl-info-block">
    The middleware class must inherit from Hleb\Base\Middleware.
</p>

<?= Paragraph::h2('Return Values') ?>

<p>
    Typically, the purpose of the called method of this class is not to return anything, but to validate conditions. However, in some cases, returning a value is allowed.
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - these types will be converted to a string and output as text in their original form.
</p>
<p>
    <span class="notranslate"><b>array</b></span> - the returned array will be converted into a <span class="notranslate">JSON</span> string. After this, further execution is terminated.
</p>
<p>
    <span class="notranslate"><b>bool</b></span> - if <span class="notranslate">false</span> is returned, it is equivalent to stopping further execution.
</p>

<?= Paragraph::h2('Creating Middleware') ?>

<p>
    Besides copying the demonstration file <span class="notranslate">DefaultMiddleware.php</span> and modifying it, there is another simple way to create the required class using a console command.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware ExampleMiddleware</p>
<p>
    This command will create a new template <span class="notranslate">/app/Middlewares/ExampleMiddleware.php.</span><br>
    You can use another suitable name for the class.<br>
    The <span class="notranslate">HLEB2</span> framework also allows you to create a <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">custom template</a> by default for this command.
</p>

<?= Link::previousPage('docs.2.0.controller.module.page', 'Module'); ?>

<?= Link::nextPage('docs.2.0.models.page', 'Models'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


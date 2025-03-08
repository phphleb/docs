<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Controller') ?>

<p>
    The Controller is part of the <span class="notranslate">MVC</span> architecture (<span class="notranslate">Action-Domain-Responder</span> for web), responsible for further managing the handling of a request that has already been identified by the router, but should not contain business logic.
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, controllers are regular handler classes bound to a route using the <span class="notranslate">controller()</span> method.<br>
    This method points to the controller class and its executable method.
    Upon a match, the framework creates an instance of this class and calls the method.
</p>

<p class="hl-info-block">
    The controller class must inherit from <span class="notranslate">Hleb\Base\Controller</span>.
</p>

<p>
    The framework searches for the controller in the <span class="notranslate">/app/Controllers/</span> folder according to its <span class="notranslate">namespace</span>.
    Here is the default controller code:
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.class.php');  ?>

<p>
    In the example, the controller's <span class="notranslate">'index'</span> method returns a <span class="notranslate">View</span> object, created by the <span class="notranslate">view()</span> function and pointing to a template from the <span class="notranslate">/resources/views/</span> folder.<br>
    The template <span class="notranslate">/resources/views/default.php</span> will be used<br>
    This is a simple example, as this function can be used similarly in a route.
</p>

<?= Paragraph::h2('view() Function') ?>

<p>
    The first argument of the function is the template, the second is a named array for passing variables and their values to the template, and the third argument can specify a numeric response status code.
</p>

<?= Code::fromFile('@views/docs/code/controller/view.example.php', false);  ?>

<p>
    If you use this example in a controller, the template <span class="notranslate">/resources/views/template/file.php</span> will be called.<br>
    In the file, the variables <span class="notranslate">$title</span> and <span class="notranslate">$description</span> will be available with their corresponding values:
</p>

<?= Code::fromFile('@views/docs/code/controller/view.template.php');  ?>

<p>
    In case the template file extension is not <span class="notranslate">.php</span>, for example, a <span class="notranslate">.twig</span> template, you need to rename the path to the template in the function, specifying the extension.
</p>

<?= Paragraph::h2('Return Values') ?>

<p>
    Besides the previously mentioned <span class="notranslate">View</span> object, other types of values can be returned from a controller method:
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - these types will be converted to a string and output in their original form as text.
</p>
<p>
    <span class="notranslate"><b>array</b></span> - the returned array will be converted to a <span class="notranslate">JSON</span> string.
</p>
<p>
    <b>bool</b> - if <span class="notranslate">false</span> is returned, a standard 404 error will be displayed.
</p>
<p>
    An object (from the container) with the <span class="notranslate"><b>Hleb\Reference\ResponseInterface</b></span> interface will be converted to a response.
</p>
<p>
    An object with the <span class="notranslate"><b>Psr\Http\Message\ResponseInterface</b></span> interface will be converted to a response.
</p>

<?php insertTemplate('/docs/ru/2/0/controllers/xssi.json.array'); ?>

<?= Paragraph::h2('Inserting Dynamic Variables') ?>

<p>
    Together with a dynamic route, values that match the named parts of the <span class="notranslate">URL</span> may be defined by the framework.
    For example, for the following route:
</p>

<?= Code::fromFile('@views/docs/code/controller/dynamic.uri.php', false);  ?>

<p>
    The variables <span class="notranslate">$version</span> and <span class="notranslate">$page</span> can be inserted into the <span class="notranslate">'resource'</span> controller method.
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.init.class.php');  ?>

<?= Paragraph::h2('Using Another Controller') ?>

<p>
    One controller can return data from another, but the return data types must match.
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.other.class.php');  ?>

<p>
    No Events assigned to controllers will be applied to this nested controller.
</p>

<?= Paragraph::h2('HTTP Error Classes') ?>

<p>
    If a certain condition in the controller code should end with an <span class="notranslate">HTTP</span> error, there are several predefined exception classes for this, such as <span class="notranslate">'Http404NotFoundException'</span> and <span class="notranslate">'Http403ForbiddenException'</span>.<br>
    For example, by specifying the error as <span class="notranslate">'throw new Hleb\Http404NotFoundException();'</span>, the framework will generate the <span class="notranslate">HTTP</span> code and standard 404 error text in the response.
</p>

<?= Paragraph::h2('Incoming Data Validation') ?>

<p>
    In the <span class="notranslate">HLEB2</span> framework, basic validation of dynamic parts of the route address can be declared directly in the route using the <span class="notranslate">where()</span> method. If you need to validate payload data, such as <span class="notranslate">POST</span> request data in <span class="notranslate">JSON</span> format, one option is to use the <a href="<?= Link::url('docs.2.0.api.page'); ?>">api-multitool</a> library.<br>
    By using the trait from this library <span class="notranslate">Phphleb\ApiMultitool\ApiRequestDataManagerTrait</span>, the <span class="notranslate">check()</span> method becomes available and can be used to validate various request data.
</p>


<?= Paragraph::h2('Creating a Controller') ?>

<p>
    Besides copying and modifying the demo file <span class="notranslate">DefaultController.php</span>, there is also a simple way to create a controller using a console command.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller ExampleController</p>

<p>
    This command will create a new controller template at <span class="notranslate">/app/Controllers/ExampleController.php.</span><br>
    A different suitable name for the class can be used.<br>
    The framework also allows creating a <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">custom default template</a> for this command.
</p>

<?= Link::previousPage('docs.2.0.routes.page', 'Routing'); ?>

<?= Link::nextPage('docs.2.0.controller.module.page', 'Module'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


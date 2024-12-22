<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Routing') ?>

<p>
    Routing is the primary task of the framework in handling incoming requests.
    Here, the route responsible for the request address is defined, and subsequent actions are assigned.
</p>
<p>
    Sometimes routing in frameworks is also referred to as "routing," which is the same thing.
</p>
<p>
    Project routes are defined by the developer in the <span class="notranslate">/routes/map.php</span> file. Other route files from the <span class="notranslate">"routes"</span> folder can be included in this file, and together they form the routing map.
    A notable feature of these routes is that when they are loaded, the framework checks them for overall correctness and the sequence of methods used. In case of an exception, an error is generated with a reason for the exception.
    Since all routes in the routing map are subject to verification, this guarantees their overall correctness.
</p>

<p class="hl-info-block">
    After the first request or when using a special console command, routes are updated and cached.
    Therefore, route files should not include external code, only methods from the <span class="notranslate">Route</span> class.
</p>

<p>
    If after making changes to the routing map, the framework does not generate characteristic messages, these messages will not appear in the future, at least until the next changes in the connected route files.
</p>
<p>
    Routes are defined by methods of the <b>Route</b> class, one of the most commonly used being <b>get()</b>.
    The methods of this class are used exclusively in the routing map.
</p>

<?= Paragraph::h2('Route::get() Method') ?>

<p>
    This method allows you to specify the handling of the <span class="notranslate">HTTP</span> <span class="notranslate">GET</span> method under specified conditions.
    As shown in the example:
</p>

<?= Code::fromFile('@views/docs/code/routes/get.method.php', false); ?>

<p>
    The route will display the line <span class="notranslate">"Hello, world!"</span> when accessed at the root <span class="notranslate">URL</span> of the site.
    To render <span class="notranslate">HTML</span> code (which may contain <span class="notranslate">PHP</span> code) from a template, the method is used together with the <span class="notranslate"><b>view()</b></span> function.
</p>

<?= Paragraph::h2('Dynamic Addresses') ?>

<p>
    The HLEB2 framework processes arbitrary addresses according to the scheme defined by the application developer, for example:
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.uri.php', false); ?>

<p>
    In this case, all <span class="notranslate">URL</span> addresses matching the conditional scheme <span class="notranslate">"site.com/resource/.../.../"</span> will return the same text string, and the values <span class="notranslate">"version"</span> and <span class="notranslate">"page"</span> become accessible from the <span class="notranslate">Hleb\Static\Request</span> object: <span class="notranslate">Request::param("version")->asString()</span> and <span class="notranslate">Request::param("page")->asPositiveInt()</span>.<br>
    These values can also be retrieved from the container and through the same-named arguments of the controller method.
</p>
<p>
    In the route address, you may specify that the last part can be optional:
</p>

<?= Code::fromFile('@views/docs/code/routes/empty.end.part.uri.php', false); ?>

<p>
    If the address is missing, it will still match this route, but the value of <span class="notranslate">'id'</span> will be NULL.
</p>

<?= Paragraph::h2('Default Values for Dynamic Addresses') ?>

<p>
    An example of a dynamic route in which default values are specified for the <span class="notranslate">second</span> and <span class="notranslate">third</span> named parts.
</p>

<?= Code::fromFile('@views/docs/code/routes/default.dynamic.parts.php', false); ?>

<p>
    Similar to <span class="notranslate">'/example/{first}/two/three?'</span>, only in the given <span class="notranslate">Request</span>, additional values <span class="notranslate">'second' => 'two', 'third' => 'three'</span> will be added to the already existing dynamic parameter <span class="notranslate">'first'</span>. If the final parameter is absent, it will be <span class="notranslate">null</span>.
</p>

<?= Paragraph::h2('Variable Addresses') ?>

<p>
    Multiple route assignments (a numbered array of <span class="notranslate">URL</span> segments will appear in <span class="notranslate">Request::param()</span>):
</p>

<?= Code::fromFile('@views/docs/code/routes/variable.uri.php', false);  ?>


<?= Paragraph::h2('Tag in Address') ?>

<p>
    The framework does not allow interpreting parts of the <span class="notranslate">URL</span> as compound segments, as this contradicts standards, but there is an exception to this rule.<br>
    A common scenario is when a user's login is prefixed with a special <span class="notranslate">@</span> tag in the <span class="notranslate">URL</span>.
    It can be set as follows:
</p>

<?= Code::fromFile('@views/docs/code/routes/tag.uri.php', false);  ?>


<?= Paragraph::h2('Function view()') ?>

<p>
    The function specifies which template from the <span class="notranslate">/resources/views/</span> folder to associate with the route.
    Example for the file <span class="notranslate">/resources/views/index.php</span>:
</p>

<?= Code::fromFile('@views/docs/code/routes/view.index.php', false);  ?>

<p>
    Variables can be passed to the function as a second argument in an associative array.
</p>

<?= Code::fromFile('@views/docs/code/routes/view.params.php', false);  ?>

<p>
    The variables will be available in the template.
</p>

<?= Code::fromFile('@views/docs/code/template/view.param.php');  ?>

<p>
    For predefined addresses '404', '403', and '401', the corresponding standard error page will be displayed in the <span class="notranslate">view()</span> function.
</p>

<?= Paragraph::h2('Function preview()') ?>

<p>
    Sometimes, to specify a predefined textual response in a route, it is necessary to set the appropriate <span class="notranslate">Content-Type</span> header and output certain request parameters. Currently, in the <span class="notranslate">preview()</span> function, it only supports injecting the original route address, dynamic parameters from the address, the current IP address, and the <span class="notranslate">HTTP</span> request method. For example:
</p>

<?= Code::fromFile('@views/docs/code/template/preview.param.php', false);  ?>

<?= Paragraph::h2('Function redirect()') ?>

<p>
    The <span class="notranslate">redirect()</span> method is used to specify address redirections in routes. It can contain links to internal or external <span class="notranslate">URL</span>s and can also include dynamic query parameters from the original route:
</p>

<?= Code::fromFile('@views/docs/code/template/redirect.param.php', false);  ?>


<?= Paragraph::h2('Route Grouping') ?>

<p>
    Route grouping is used to assign common properties to routes by adding methods to groups, which then apply the method's action to the entire group.<br>
    The scope of a group is defined using the <span class="notranslate"><b>toGroup()</b></span> method at the beginning of the group and <span class="notranslate"><b>endGroup()</b></span> at the end.
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example.php', false);  ?>

<p>
    In this case, the <span class="notranslate"><b>prefix()</b></span> method added to the group applies to all routes within it.
</p>
<p>
    Groups can be nested within other groups. There is also an alternative syntax for groups:
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example2.php', false);  ?>

<?= Paragraph::h2('Named Routes') ?>

<p>
    Each route can be assigned a unique name.
</p>

<?= Code::fromFile('@views/docs/code/test.php', false);  ?>

<p>
    This name can be used to generate its <span class="notranslate">URL</span>, making the code independent of the actual <span class="notranslate">URL</span> addresses.<br>
    This is achieved by using route names instead of addresses.
    For example, this site operates using route names to build links to pages.
</p>

<?= Paragraph::h2('Handling HTTP Methods') ?>

<p>
    Similar to the <span class="notranslate">get()</span> method for the <span class="notranslate">HTTP</span> <span class="notranslate">GET</span> method, there are methods like <span class="notranslate"><b>post()</b>, <b>put()</b>, <b>patch()</b>, <b>delete()</b>, <b>options()</b></span> corresponding to <span class="notranslate">POST, PUT, PATCH, DELETE, OPTIONS</span>.
</p>
<p>
    These methods match their respective <span class="notranslate">HTTP</span> methods, except for <span class="notranslate">options()</span>.<br>
    In all other cases, the <span class="notranslate">OPTIONS</span> method is handled according to the standard, but with <span class="notranslate">options()</span>, you can separately define how OPTIONS requests are processed (redefine them).
</p>

<?= Code::fromFile('@views/docs/code/routes/http.methods.php', false);  ?>

<?= Paragraph::h2('Route::any() Method') ?>

<p>
    Assigned to a route, it matches all <span class="notranslate">HTTP</span> methods, behaving otherwise like <span class="notranslate">get()</span>.
</p>

<?= Paragraph::h2('Route::match() Method') ?>

<p>
    Similar to the <span class="notranslate">get()</span> method, but with an additional first argument where you can pass an array of the supported <span class="notranslate">HTTP</span> methods.
</p>

<?= Code::fromFile('@views/docs/code/routes/match.method.php', false);  ?>

<?= Paragraph::h2('Route::fallback() Method') ?>

<p>
    Catches all unmatched paths for all <span class="notranslate">HTTP</span> methods (or specified ones).
    There can only be one <span class="notranslate">fallback()</span> method in routes for a specific <span class="notranslate">HTTP</span> method.
</p>
<p>
    This allows you to assign handling for an unmatched route (instead of a 404 error) for all types of <span class="notranslate">HTTP</span> methods or individually.
</p>

<?= Paragraph::h2('Route Protection') ?>

<p>
    To protect routes from <span class="notranslate">CSRF</span> attacks, the <span class="notranslate"><b>protect()</b></span> method is used.
    Assigning it to a route or group of routes adds a check for the presence of a special token set previously.
</p>

<?= Code::fromFile('@views/docs/code/routes/protect.method.php', false);  ?>

<p>
    It works as follows:<br>
    An access token is output on the page, you can use the <span class="notranslate">csrf_token()</span> or <span class="notranslate">csrf_field()</span> function.<br>
    This token is sent via <span class="notranslate">JavaScript</span> or in a form with the request.<br>
    The request's route has the <span class="notranslate">protect()</span> method and checks the token.
</p>

<?= Paragraph::h2('Controller Assignment') ?>

<p>
    <a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">Controller</a> is a part of the <span class="notranslate">MVC</span> architecture (<span class="notranslate">Action-Domain-Responder</span> for the web), responsible for the subsequent handling of a request identified by the router but should not contain business logic.
</p>
<p>
    A controller cannot be used for a group of routes; it is assigned to a specific one or individually.
    The <span class="notranslate"><b>controller()</b></span> method is used for this.
</p>

<?= Code::fromFile('@views/docs/code/controller/example.php', false);  ?>

<p>
    In the example, the first argument is the class of the assigned controller, the second is the controller method used.
    The <span class="notranslate">'index'</span> method can be omitted as it is used by default.<br>
    Note that the <span class="notranslate">get()</span> method no longer needs a second argument when a controller is used.
</p>

<?= Paragraph::h2('Middleware Controllers') ?>

<p>
    If a controller can only be assigned once to a route, multiple middlewares can be applied. You can also assign a <a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">middleware</a> to a group of routes.
</p>

<?= Code::fromFile('@views/docs/code/controller/middleware.example.php', false);  ?>

<p>
    The <b><span class="notranslate">middleware()</span></b> method means that the middleware will be executed before the main route handler.
    There is a similar method, <span class="notranslate"><b>before()</b></span>, and a method <span class="notranslate"><b>after()</b></span> (which runs after the main handler).
    The <i>main handler</i> here refers to the text returned by the route, the assigned template, or the execution of the controller.
</p>
<p>
    Assigned middlewares are executed in the order they are declared.
</p>
<p>
    The arguments for the middleware method are similar to the controller. You can specify the method to be executed as the second argument, with the default being <span class="notranslate">'index'</span>.
    The difference is the presence of a third argument, which can pass an array of parameters to the <span class="notranslate">middleware</span>.
    These parameters are available in the Hleb\Static\Router::data() method or via the container.
</p>

<?= Paragraph::h2('Modules') ?>

<p>
    A module is a type of controller. It points to the project's <span class="notranslate">/modules/</span> directory and contains the name of the <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">module</a> being used.
</p>

<?= Code::fromFile('@views/docs/code/controller/module.example.php', false);  ?>

<?= Paragraph::h2('Where() Method Validation') ?>

<p>
    A route can have dynamic parts in its URL, and with the <span class="notranslate">where()</span> method, you can define rules for those parts.
</p>

<?= Code::fromFile('@views/docs/code/routes/where.example.php', false);  ?>

<p>
    In this example, the parts named <span class="notranslate">'lang'</span>, <span class="notranslate">'user'</span>, and <span class="notranslate">'id'</span> will be validated using regular expressions.
</p>

<?= Paragraph::h2('Domain Limitation') ?>

<p>
    The special method <span class="notranslate"><b>domain()</b></span> can be assigned to a route or group of routes. <br>
    The first argument can specify the domain or subdomain name, and the second argument defines the level of rule matching.
</p>


<?= Paragraph::h2('Substitution Principle') ?>

<p>
    There is a method where the target controller and method are determined based on the values of the dynamic URL.<br>
    In this case, the route might look like this:
</p>

<?= Code::fromFile('@views/docs/code/routes/parts.uri.php', false);  ?>

<p>
    In this example, for the <span class="notranslate">URL</span> <span class="notranslate">/page/part/first/</span>, the framework will attempt to determine the controller as <span class="notranslate">'MainPartController'</span> and the method as <span class="notranslate">'initFirst'</span> (converted following the <span class="notranslate">camelCase</span> principle).
</p>

<p class="hl-danger-block">
    The substitution principle in handlers should be managed carefully, as URL data may lead to unexpected controllers or methods being invoked.
</p>

<p>
    Additionally, you can specify dependencies on the request <span class="notranslate">HTTP method</span> by using the key <span class="notranslate">'[verb]'</span>.
</p>

<?= Code::fromFile('@views/docs/code/routes/part.param.php', false);  ?>

<p>
    In this example, for the <span class="notranslate">URL</span> <span class="notranslate">/page/example/</span>, the framework will attempt to determine the controller as <span class="notranslate">'MainExampleGetController'</span> and the method as <span class="notranslate">'getMethod'</span> (converted following the <span class="notranslate">camelCase</span> principle).<br>
    For the <span class="notranslate">POST</span> method, these will be <span class="notranslate">'MainExamplePostController'</span> and <span class="notranslate">'postMethod'</span>.
</p>
<p>
    The ability to perform substitutions can be particularly useful when distributing request <span class="notranslate">HTTP</span> methods across controller methods.
</p>

<?= Paragraph::h2('Disabling Debug Mode in a Route') ?>

<p>
    In some routes, the output of the <span class="notranslate">DEBUG</span> panel may not be provided in debug mode. For instance, this applies to <span class="notranslate">GET</span> requests to an <span class="notranslate">API</span> where a response is expected in <span class="notranslate">JSON</span> format. There is a temporary way to disable debug mode by using a <span class="notranslate">GET</span> parameter <span class="notranslate">_debug=off</span> in the request, but there is also a permanent way by specifying the <span class="notranslate">noDebug()</span> method for a route. This method can also be applied to a group of routes. In this example, it is applied to all <span class="notranslate">API</span> requests.
</p>
<p>
    If the <span class="notranslate">DEBUG</span> panel output is disabled using the <span class="notranslate">noDebug()</span> method, but you still temporarily need to enable debug mode, it is enough to specify <span class="notranslate">_debug=on</span> in the <span class="notranslate">GET</span> parameters of the request. It is important to keep in mind that the enabling/disabling of debug mode discussed here is only relevant if the <span class="notranslate">DEBUG</span> mode is active in the configuration settings; otherwise, it remains completely disabled.
</p>


<?= Paragraph::h2('Updating Route Cache') ?>

<p>
    By default, the route cache in the framework is automatically updated after changes are made to the <span class="notranslate">/routes/map.php</span> file.
    There is also a console command to update the route cache:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --routes-upd</p>

<p>
    For high-traffic projects, you might need to disable automatic updates in <span class="notranslate">production</span> and only recalculate the route cache using the console command.<br>
    This is configured via the <span class="notranslate">'routes.auto-update'</span> setting in the <span class="notranslate">/config/common.php</span> file.
</p>

<?= Link::previousPage('docs.2.0.start.hosting.page', 'Using Hosting'); ?>

<?= Link::nextPage('docs.2.0.controller.controller.page', 'Controller'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

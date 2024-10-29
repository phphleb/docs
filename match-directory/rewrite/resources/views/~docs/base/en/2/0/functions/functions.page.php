<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Built-in Framework Functions') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework introduces a number of its own functions of various purposes, which reduce code size and accelerate application development, as they are shorthand for common actions.
</p>

<p class="hl-info-block">
    Some built-in framework functions have <b><span class="notranslate">hl_</span></b> at the beginning of their names, and there are also duplicates of functions without this prefix. Therefore, if you forget the name of the desired function, just type <i><span class="notranslate">hl_</span></i> and your IDE should suggest available options.
</p>

<?= Paragraph::h2('Working with Route Data') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework has its own routing system. The following functions are intended to interact with this system. If you practice assigning custom names to routes, they might be useful here.
</p>

<?= Paragraph::h3('route_name()') ?>

<p>
    This function returns the name of the current route or <span class="notranslate">null</span> if it is not assigned.<br>
    Despite this very useful information, it may only be needed in conjunction with another function that works with addresses.
</p>

<?= Paragraph::h3('url()') ?>

<p>
    The <span class="notranslate">url()</span> function returns a <b>relative</b> URL by route name with substitutions for necessary parameters.<br>
    Function arguments:<br>
    <b><span class="notranslate">routeName</span></b> - the name of the route for which the address is needed.<br>
    <b><span class="notranslate">replacements</span></b> - an array of substitution parts if the route is dynamic.<br>
    <b><span class="notranslate">endPart</span></b> - a boolean value determining if the last part of the address is required, if it is optional in the route.<br>
    <b><span class="notranslate">method</span></b> - for which HTTP method the address is needed. Some methods may not fit the route, and in such cases, it will return an error. By default, <span class="notranslate">'get'</span>.
</p>

<?= Code::fromFile('@views/docs/code/function/function.address.example.php', false);  ?>

<p class="hl-info-block">
    Consistent use of internal URLs by their route names allows the entire application to change static parts of addresses in routes without making changes to the rest of the code.
</p>

<?= Paragraph::h3('address()') ?>

<p>
    The <span class="notranslate">address()</span> function returns the <b>full</b> <span class="notranslate">URL</span> based on the route name with the substitution of the current domain. Since the domain is only the current one, use concatenation with <span class="notranslate">url()</span> for a different domain.<br>
    The set of parameters is similar to the <span class="notranslate">url()</span> function. This function allows you to generate correct links to the project pages. However, it is better to use <i>relative</i> URLs for in-app navigation.
</p>

<?= Paragraph::h2('Retrieving Current HTTP Request Data') ?>

<?= Paragraph::h3('request_uri()') ?>

<p>
    Returns an object with information from the relative URL of the current request.<br>
    The basis for the object returned by the <span class="notranslate"><b>request_uri()</b></span> function is the <span class="notranslate">UriInterface</span> (method <span class="notranslate">getUri()</span>) from <span class="notranslate">PSR-7</span>, which allows you to obtain the following request data:<br>
    <span class="notranslate">request_uri()-><b>getHost()</b></span> - The domain name of the current request, such as <span class="notranslate">'mob.example.com'</span>. May include the port depending on its presence in the request.<br>
    <span class="notranslate">request_uri()-><b>getPath()</b></span> - The path from the address after the host, such as <span class="notranslate">'/ru/example/page'</span> or <span class="notranslate">'/ru/example/page/'</span>.<br>
    <span class="notranslate">request_uri()-><b>getQuery()</b></span> - Request parameters, such as <span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>.<br>
    <span class="notranslate">request_uri()-><b>getPort()</b></span> - The request port.<br>
    <span class="notranslate">request_uri()-><b>getScheme()</b></span> - The <span class="notranslate">HTTP</span> scheme of the request, either <span class="notranslate">'http'</span> or <span class="notranslate">'https'</span>.<br>
    <span class="notranslate">request_uri()-><b>getIp()</b></span> - The <span class="notranslate">IP</span> address of the request.
</p>

<p class="hl-info-block">
    In these examples with <span class="notranslate">request_uri()</span>, two styles of naming conventions are used within a single expression (<span class="notranslate">snake_case</span> and <span class="notranslate">camelCase</span>), which is because most functions of the <span class="notranslate">HLEB2</span> framework are in <span class="notranslate">snake_case</span> similar to PHP functions, while the methods of the returned object are in <span class="notranslate">camelCase</span>, according to <span class="notranslate">PSR-12</span>. If you are accustomed to a different function format, wrap the current ones in the necessary style.
</p>

<?= Paragraph::h3('request_host()') ?>
<p>
    The <span class="notranslate">request_host()</span> function allows you to obtain the current host, possibly along with the port. For example, <span class="notranslate">example.com</span> or <span class="notranslate">example.com:8080</span> if it is specified in the request URL. This is useful for generating correct links to project pages. However, for internal navigation within the application, it is better to use relative URLs.
</p>

<?= Paragraph::h3('request_path()') ?>

<p>
    The <span class="notranslate">request_path()</span> function returns the current relative request path from the URL without GET parameters. For example, <span class="notranslate">/ru/example/page</span> or <span class="notranslate">/ru/example/page/</span>.
</p>

<?= Paragraph::h3('request_address()') ?>

<p>
    The <span class="notranslate">request_address()</span> function returns the complete current request address from the URL without GET parameters. For example, <span class="notranslate">`https://example.com/ru/example/page`</span> or <span class="notranslate">`https://example.com/ru/example/page/`</span>.
</p>

<?= Paragraph::h2('Redirect') ?>

<p>
    Redirecting to other pages of the application or other <span class="notranslate">URLs</span>.
</p>

<?= Paragraph::h3('hl_redirect()') ?>

<p>
    The <span class="notranslate">hl_redirect()</span> function performs a redirect using a specified header and exits the script. Thus, if content has already been output before this function is applied, headers will not be sent, and a warning will be displayed instead of redirecting. It operates based on the <span class="notranslate">'Location'</span> header. When used in framework-based classes, such as in controllers, it's more appropriate to use a similar method <span class="notranslate">Redirect::to()</span>.
</p>

<?= Code::fromFile('@views/docs/code/function/function.redirect.example.php', false);  ?>

<?= Paragraph::h2('Fetching Framework Configuration Data') ?>

<p>
    Configuration data from the framework or custom settings can be used in the application code. The following functions allow these data to be retrieved anywhere in the project code.
</p>

<p class="hl-info-block">
    Project parameters and settings should be collected in its configuration files, and they can be used not only for the application's needs but also for configuring connected third-party libraries.
</p>

<?= Paragraph::h3('config()') ?>

<p>
    Each configuration parameter is distributed by groups according to the main filename.<br>
    These might be standard groups (<span class="notranslate">'common'</span>, <span class="notranslate">'database'</span>, <span class="notranslate">'main'</span>, <span class="notranslate">'system'</span>) or additional ones created for the project. The group's name is passed as the first argument to the <span class="notranslate">config()</span> function.<br>
    The parameter's name itself is the second argument. The function returns this parameter's value. For example:
</p>

<?= Code::fromFile('@views/docs/code/function/function.config.example.php', false);  ?>

<?= Paragraph::h3('get_config_or_fail()') ?>

<p>
    As the name <span class="notranslate">get_config_or_fail()</span> suggests, this function returns the configuration parameter's value or throws an error if the parameter is not found or is <span class="notranslate">null</span>.
    The arguments are similar to the <span class="notranslate">config()</span> function.
</p>

<?= Paragraph::h3('setting()') ?>

<p>
    Since it’s recommended to add custom values to the <span class="notranslate">'main'</span> group,
    a separate function <span class="notranslate">setting()</span> is provided for frequent use of this configuration.
    Its application is similar to the <span class="notranslate">config()</span> function with the first argument <span class="notranslate">'main'</span>.
</p>

<?= Paragraph::h3('hl_db_config()') ?>

<p>
    The special function <span class="notranslate">hl_db_config()</span> serves as an equivalent of the <span class="notranslate">config()</span> function with the first argument <span class="notranslate">'database'</span>.
</p>

<?= Paragraph::h3('hl_db_connection()') ?>

<p>
    The <span class="notranslate">hl_db_connection()</span> function is used to retrieve data from any existing connection in the <span class="notranslate">'db.settings.list'</span> of the <span class="notranslate">'database'</span> settings group. It returns an array of settings or throws an error if they are not found.
</p>

<?= Paragraph::h3('hl_db_active_connection()') ?>

<p>
    The <span class="notranslate">hl_db_active_connection()</span> function, like the <span class="notranslate">hl_db_connection()</span> function, returns a settings array but specifically for the connection marked as "active" in the <span class="notranslate">'base.db.type'</span> parameter.
</p>

<p class="hl-info-block">
    These functions for accessing database parameters are essential when adding third-party libraries that require a connection configuration to a specific database.
</p>

<?= Paragraph::h2('Debugging Functions') ?>

<p>
    The framework includes several functions for quick code debugging. They complement and extend the <span class="notranslate">PHP</span> <span class="notranslate">var_dump()</span> function in various ways. Depending on the situation, a suitable one can be chosen.
</p>

<?= Paragraph::h3('print_r2()') ?>

<p>
    This function has been retained from the first version of the framework. It is used to display data in a readable format for the debug panel. Thus, when DEBUG mode is off, debug data passed to the function won’t be displayed, as the debug panel is disabled. This is convenient during development, as you don’t need to worry about its visibility outside of debug mode. An optional second argument to the <span class="notranslate">print_r2()</span> function allows you to add a description to the displayed data for easy identification in the panel. Example:
</p>

<?= Code::fromFile('@views/docs/code/function/function.print_r2.example.php', false);  ?>

<?= Paragraph::h3('var_dump2()') ?>

<p>
    The <span class="notranslate">var_dump2()</span> function is a complete analog of <span class="notranslate">var_dump()</span>, but it outputs more structured information. If the output is intended for a browser, the original line breaks and indents are preserved.
</p>

<?= Paragraph::h3('dump()') ?>

<p>
    The <span class="notranslate">dump()</span> function is another wrapper around <span class="notranslate">var_dump()</span>, but it converts the result to <span class="notranslate">HTML</span> code, which appears cleaner and more informative than the standard output.
</p>

<?= Paragraph::h3('dd()') ?>

<p>
    Similar to <span class="notranslate">dump()</span>, it outputs <span class="notranslate">HTML</span> code but also terminates the script after that. The <span class="notranslate">dd()</span> function is easy to locate on the application page, as its output will be at the very bottom.
</p>

<?= Paragraph::h2('File System Operations') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework organizes file and directory operations based on relative paths from the project root. Such paths begin with '@/' to denote the root directory. This approach is used across many standard services in the framework and is recommended for consistent usage. The following functions serve as wrappers around equivalent <span class="notranslate">PHP</span> functions, adding the capability to use the '@' prefix.
</p>

<?= Paragraph::h3('hl_file_exists()') ?>

<p>
    The <span class="notranslate">hl_file_exists()</span> function is analogous to the <span class="notranslate">PHP</span> function <span class="notranslate">file_exists()</span>, but it also accepts special paths starting with '@'.
</p>

<?= Paragraph::h3('hl_file_get_contents()') ?>

<p>
    The <span class="notranslate">hl_file_get_contents()</span> function is similar to the <span class="notranslate">PHP</span> function <span class="notranslate">file_get_contents()</span>, but it allows for special paths starting with '@'.
</p>

<?= Paragraph::h3('hl_file_put_contents()') ?>

<p>
    The <span class="notranslate">hl_file_put_contents()</span> function is equivalent to the <span class="notranslate">PHP</span> function <span class="notranslate">file_put_contents()</span> and also accepts paths starting with '@'.
</p>

<?= Paragraph::h3('hl_is_dir()') ?>

<p>
    The <span class="notranslate">hl_is_dir()</span> function is similar to the <span class="notranslate">PHP</span> function <span class="notranslate">is_dir()</span>, but it can also accept paths with a starting '@'.
</p>

<?= Paragraph::h2('CSRF Protection') ?>

<p>
    Detailed documentation on the implementation of <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">protection against <span class="notranslate">CSRF</span> attacks</a> in the framework.
</p>

<?= Paragraph::h3('csrf_token()') ?>

<p>
    The <span class="notranslate">csrf_token()</span> function returns a secure token for protection against <span class="notranslate">CSRF</span> attacks.
</p>

<?= Paragraph::h3('csrf_field()') ?>
<p>
    The <span class="notranslate">csrf_field()</span> function returns <span class="notranslate">HTML</span> content to insert into a form for <span class="notranslate">CSRF</span> attack protection.
</p>

<?= Paragraph::h2('Templates') ?>

<p>
    Although the framework allows integration with the Twig templating engine, it also provides a straightforward implementation of built-in templates that do not use custom syntax different from standard <span class="notranslate">PHP</span> or <span class="notranslate">HTML</span>. <a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">Learn more</a> about the framework's standard templates.
</p>

<?= Paragraph::h3('insertTemplate()') ?>

<p>
    With the <span class="notranslate">insertTemplate()</span> function, the generated template is inserted at the location in the file where this function is called. Key parameters:<br>
    <b><span class="notranslate">viewPath</span></b> - a specific path to the template file. This format is similar to the path types used in the <span class="notranslate">view()</span> function.<br>
    <b><span class="notranslate">extractParams</span></b> - an associative array of values that will be converted into template variables.
</p>

<?= Paragraph::h3('template()') ?>

<p>
    The <span class="notranslate">template()</span> function returns the framework template's text representation. This is useful if you need to pass the content further, for example, if it is an email template. Parameters are similar to those in the <span class="notranslate">insertTemplate()</span> function.
</p>

<?= Paragraph::h3('insertCacheTemplate()') ?>

<p>
    The <span class="notranslate">insertCacheTemplate()</span> function is similar to <span class="notranslate">insertTemplate()</span> except that the template is cached for the specified number of seconds in the <b><span class="notranslate">sec</span></b> parameter. Other arguments are identical to those in the <span class="notranslate">insertTemplate()</span> function.
</p>

<?= Paragraph::h2('Additional') ?>

<p>
    Various specialized functions.
</p>

<?= Paragraph::h3('is_empty()') ?>

<p>
    Checks for emptiness in a more selective way than the <span class="notranslate">PHP</span> function <span class="notranslate">empty()</span>.
    The <span class="notranslate">is_empty</span> function will return <span class="notranslate">false</span> only in four scenarios: an empty string, <span class="notranslate">null</span>, <span class="notranslate">false</span> or an empty array. Passing an undeclared variable will result in an error; therefore, to mimic the original function, you can suppress this error by adding '@' before the function like this:
</p>

<?= Code::fromFile('@views/docs/code/function/function.is_empty.example.php', false);  ?>

<p class="hl-info-block">
    While using error suppression is poor practice, the code within the <span class="notranslate">is_empty()</span> function does not imply the occurrence of other errors.
</p>

<?= Paragraph::h3('logger()') ?>

<p>
    The function for logging <span class="notranslate">logger()</span> returns an object with methods for logging data across various levels.
</p>

<?= Code::fromFile('@views/docs/code/function/function.logger.example.php', false);  ?>

<?= Paragraph::h3('once()') ?>

<p>
    The <span class="notranslate">once()</span> function allows code to be executed only once for a single request,
    and on subsequent calls, it returns the previous result.<br>
    The result of execution is stored in memory for the entire duration of the request.<br>
    In this scenario, the anonymous function passed to <span class="notranslate">once()</span> will execute on the first call to once:
</p>

<?= Code::fromFile('@views/docs/code/function/function.once.example.php', false);  ?>

<?= Paragraph::h3('param()') ?>
<p>
    Returns an object containing dynamic request data by parameter name with the option to select the value format.<br>
    For example, if the dynamic route specified the parameter <span class="notranslate">/{test}/</span>, and the request was <span class="notranslate">/example/</span>, then <span class="notranslate">param('test')</span>-><span class="notranslate">value</span> will return <span class="notranslate">'example'</span>.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>;</span>   - directly retrieves the value.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>();</span> - directly retrieves the value.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>();</span> - returns the value converted to an <span class="notranslate">integer</span>, or <span class="notranslate">null</span> if absent.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>($default);</span> - returns the value converted to an <span class="notranslate">integer</span>,
    and <span class="hl-nowrap"><span class="notranslate">$default</span></span> is returned if absent.<br>
    If the last part of the route is an optional variable value, it will be <span class="notranslate">null</span>.<br>
    Caution is advised with user data obtained as direct values.
</p>

<?= Paragraph::h2('Framework Function Testing') ?>

<p class="hl-info-block">
    In most cases, the framework's standard functions are wrappers around corresponding services, so testing them is similar to testing the service.
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


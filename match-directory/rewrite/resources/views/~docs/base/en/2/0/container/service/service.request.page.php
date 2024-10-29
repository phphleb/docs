<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Request Object') ?>

<p>
    The system <span class="notranslate">Request</span> object is created at the very beginning of the framework's HTTP request processing.
    It is not only created but also populated with information (headers, parameters, etc.)<br>
    This object facilitates the initial functioning of the <span class="notranslate">HLEB2</span> framework while processing a request.
    The system <span class="notranslate">Request</span> is solely intended for this purpose.
</p>
<p>
    The <span class="notranslate"><b>Request</b></span> service, which can be obtained from the container by default and through which the current request data can be utilized, is a wrapper over the system object.
</p>
<p>
    Methods of obtaining data from the <span class="notranslate">Request</span> in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) using the current <span class="notranslate">HTTP</span> method:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.container.php', false);  ?>

<p>
    Example of obtaining the <span class="notranslate">HTTP</span> method from the <span class="notranslate">Request</span> in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.static.php', false);  ?>

<p>
    Additionally, the <span class="notranslate">Request</span> object can be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Request</span> interface.
</p>

<p>
    To simplify examples, henceforth they will only contain references through <span class="notranslate">Hleb\Static\Request</span>.
</p>

<?= Paragraph::h2('HTTP Request Method') ?>
<p>
    A request to the application is made with a specific HTTP method; the framework supports the following: <span class="notranslate">'GET', 'POST', 'DELETE', 'PUT', 'PATCH', 'OPTIONS'</span> (and <span class="notranslate">'HEAD'</span>).<br>
    The methods <span class="notranslate"><b>getMethod()</b></span> and <span class="notranslate"><b>isMethod()</b></span> help determine the current method.
    The former returns a value like <span class="notranslate">'GET'</span>, while the <span class="notranslate">isMethod(...)</span> method requires specifying the sought value for comparison.
</p>

<?= Paragraph::h2('Parameters from $_GET, $_POST, and Request Body') ?>

<p>
    Data sent along with the request can be used in various ways.
    They can be stored in their original form without requiring preliminary processing.
    However, if they need to be displayed immediately in the response, the data should be secured against the injection of executable scripts.
    The <span class="notranslate"><b>get()</b></span> and <span class="notranslate"><b>post()</b></span> methods return an object with the corresponding parameter. This object can be used to obtain both raw data and data transformed into the required format.
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.http.params.php', false);  ?>

<p class="hl-info-block">
    The most common mistake when using the object returned by these methods is using this object as a value instead of obtaining the value from the object.
</p>

<p>
    If you need to get the result as an array, for example, for a query with <span class="notranslate">'?param[key]=value'</span>, the object with the value has an <span class="notranslate">asArray()</span> method, where array values will be protected from XSS vulnerabilities. The <span class="notranslate">value()</span> method returns an array but contains raw, unprocessed data.
</p>
<p>
    The <span class="notranslate"><b>input()</b></span> method is used to determine and retrieve an array of data from the body of the request.
    This can be <span class="notranslate">JSON</span> data or <span class="notranslate">url-encoded</span> parameters transformed into an array.<br>
    Thus, you can retrieve as an array <span class="notranslate">POST-, PUT-, PATCH-,</span> or <span class="notranslate">DELETE</span> parameters or parameters passed in the body of the request in <span class="notranslate">JSON</span> format.
</p>
<p>
    Data obtained with the <span class="notranslate">input()</span> method represents processed values with HTML tags converted into special characters.
</p>
<p>
    If you need to get the body of the request as an array in its original form, the <span class="notranslate"><b>getParsedBody()</b></span> method is designed for this purpose.
    It is similar to <span class="notranslate">input()</span>, but it returns data in unprocessed form.
</p>
<p>
    If the previous formats do not fit, the request body in its original form, as a string value, is returned by the <span class="notranslate"><b>getRawBody()</b></span> method.
    This way, you can transform the data into the required format yourself.
</p>

<?= Paragraph::h2('Dynamic Route Parameters') ?>

<p>
    These request parameters refer to the dynamic parts of the route, with specific values assigned to them in the request.
    The <span class="notranslate"><b>param()</b></span> method allows retrieving these values by the name of the dynamic parameter.
    The result will be an object through which the value can be accessed in the desired format.
</p>
<p>
    For instance, if a request matches a route of this type:
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.example.uri.php', false);  ?>

<p>
    For the URL <span class="notranslate">/10/main/</span>, the parameters <span class="notranslate">'version'</span> and <span class="notranslate">'page'</span> are defined as follows:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.param.params.php', false);  ?>

<p class="hl-info-block">
    A common mistake when using the object returned by this method can be using this object as the value itself, rather than extracting the value from the object.
</p>

<p>
    The <span class="notranslate"><b>data()</b></span> method returns an array of objects for all dynamic parameters.
    Values from these objects can similarly be accessed in both raw and processed formats.
</p>
<p>
    To retrieve the original dynamic route parameters as an array of values without processing, use the <span class="notranslate"><b>rawData()</b></span> method.
</p>

<p class="hl-danger-block">
    Note that when the framework processes incoming data (when selected), it only protects against XSS attacks. In other cases, such as when quote escaping is required for database storage, additional security measures must be applied.
</p>

<?= Paragraph::h2('Request URI Data') ?>

<p>
    The object returned by the <span class="notranslate"><b>getUri()</b></span> method is based on the <span class="notranslate">UriInterface</span> from <span class="notranslate">PSR-7</span>, enabling you to retrieve the following request data:<br>
    <span class="notranslate">getUri()-><b>getHost()</b></span> - the domain name of the current request, such as <span class="notranslate">'mob.example.com'</span>. It may include the port if it’s specified in the request.<br>
    <span class="notranslate">getUri()-><b>getPath()</b></span> - the path in the address following the host, e.g., <span class="notranslate">'/ru/example/page'</span> or <span class="notranslate">'/ru/example/page/'</span>.<br>
    <span class="notranslate">getUri()-><b>getQuery()</b></span> - the query parameters, such as <span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>.<br>
    <span class="notranslate">getUri()-><b>getPort()</b></span> - the request port.<br>
    <span class="notranslate">getUri()-><b>getScheme()</b></span> - the <span class="notranslate">HTTP</span> scheme of the request, <span class="notranslate">'http'</span> or <span class="notranslate">'https'</span>.<br>
    <span class="notranslate">getUri()-><b>getIp()</b></span> - the request <span class="notranslate">IP</span> address.
</p>

<?= Paragraph::h2('Request HTTP Scheme') ?>

<p>
    To specify the type of HTTP scheme, use the <span class="notranslate"><b>isHttpSecure()</b></span> method.
    It returns whether the scheme is <span class="notranslate">'https'.</span>
</p>
<p>
    The <span class="notranslate"><b>getHttpScheme()</b></span> method returns the current <span class="notranslate">HTTP</span> scheme as either <span class="notranslate">'http://'</span> or <span class="notranslate">'https://'</span>.
</p>

<?= Paragraph::h2('Getting the Host from the Address') ?>

<p>
    The <span class="notranslate"><b>getHost()</b></span> method is used to retrieve the domain name of the current request.
    It is equivalent to <span class="notranslate">getUri()->getHost()</span>.
</p>
<p>
    Together with the <span class="notranslate">HTTP</span> scheme, you can get the host address by using the <span class="notranslate"><b>getSchemeAndHost()</b></span> method.
</p>

<?= Paragraph::h2('Request URL') ?>

<p>
    The <span class="notranslate"><b>getAddress()</b></span> method returns the full <span class="notranslate">URL</span> of the request, excluding <span class="notranslate">GET</span> parameters.
</p>

<?= Paragraph::h2('File Uploads') ?>

<p>
    When a user uploads a file or files, you can retrieve their data using the <span class="notranslate"><b>getFiles()</b></span> method.
    It returns an array of arrays with data or an array of objects, depending on whether the framework was initiated with an external <span class="notranslate">Request</span>.
</p>

<?= Paragraph::h2('Request Headers') ?>

<p>
    The array of all incoming request headers is returned by the <span class="notranslate"><b>getHeaders()</b></span> method.
    These are request headers sorted by key (name).
</p>
<p>
    You can check for the existence of a header by name using the <span class="notranslate"><b>hasHeader()</b></span> method.
</p>
<p>
    The <span class="notranslate"><b>getHeader()</b></span> method returns an array of matching headers (values) by name.
</p>
<p>
    The <span class="notranslate"><b>getHeaderLine()</b></span> method also returns header values by name, but as a string in enumeration form.
</p>

<?= Paragraph::h2('$_SERVER Data') ?>

<p>
    To retrieve data set by the web server in the <span class="notranslate">$_SERVER</span> variable, you can use the <span class="notranslate"><b>server()</b></span> method.
    It returns the value by parameter name.
</p>

<?= Paragraph::h2('Request Protocol Version') ?>

<p>
    The <b>getProtocolVersion()</b> method returns the request protocol version, for example '1.1'.
</p>

<?= Link::previousPage('docs.2.0.container.di.page', 'Dependency Injection'); ?>

<?= Link::nextPage('docs.2.0.service.response.page', 'Response'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Response Object') ?>

<p>
    The framework's <span class="notranslate"><b>Response</b></span> service holds global data for forming a response to the client.
    When using the framework asynchronously, this data reverts to default values after each request ends.<br>
</p>
<p>
    Methods for assigning data to <span class="notranslate">Response</span> in controllers:
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.container.php', false);  ?>

<p>
    The method is similar for all classes inheriting from <span class="notranslate">Hleb\Base\Container</span>, but forming a response directly in <span class="notranslate">Response</span> outside the controller is considered bad practice.
</p>
<p>
    Example of using <span class="notranslate">Response</span> in application code (the code will also be difficult to maintain in this case):
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.static.php', false);  ?>

<p>
    Access to the <span class="notranslate">Response</span> service can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Response</span> interface.
</p>
<p>
    To simplify examples, they will only include access via <span class="notranslate">DI</span> from now on.
</p>

<p class="hl-info-block">
    Combined with <span class="notranslate">print</span> and <span class="notranslate">echo</span> outputs, data from Response will be shown later; the correct strategy is to use only one method for outputting results.
</p>
<p>
    At the end of a request, the framework will still refer to the specified <span class="notranslate">Response</span> object for output, even if this object wasn't returned from the controller.
    This can be handy for one-time or sequential data addition in <span class="notranslate">Response</span> within a single controller method.
    If it's necessary to manipulate response objects containing different data, any other <span class="notranslate">Response</span> can be used according to <span class="notranslate">PSR-7</span>.
    The alternative <span class="notranslate">Response</span> must be returned in the invoked controller method.
</p>

<?= Paragraph::h2('Response Body') ?>

<p>
    The response body consists of data added to the <span class="notranslate">Response</span> object, which can be converted into a string.
    Typically, this is message text displayed to the user or data in the format of <span class="notranslate">JSON</span> or <span class="notranslate">XML</span>, possibly dynamically generated <span class="notranslate">HTML</span>, etc.
</p>
<p>
    The following methods of the <span class="notranslate">Response</span> service are available for adding data:<br>
    <span class="notranslate"><b>set()</b></span> or <span class="notranslate"><b>setBody()</b></span> — assigns data, completely overwriting any previous response body if it exists.<br>
    <span class="notranslate"><b>add()</b></span> or <span class="notranslate"><b>addToBody()</b></span> — appends to the end of the previously added data.
</p>
<p>
    To retrieve data from the service:<br>
    <span class="notranslate"><b>get()</b></span> or <span class="notranslate"><b>getBody()</b></span> — retrieves the current state of the response body in the <span class="notranslate">Response</span> object.
</p>

<p class="hl-danger-block">
    Before sending data to the client, ensure it is checked for <span class="hl-nowrap"><span class="notranslate">XSS</span> vulnerabilities</span>.
    If the data has not been processed in this way before, it can be passed through the <span class="hl-nowrap"><span class="notranslate">PHP</span> function</span> <span class="notranslate"><a href="https://www.php.net/manual/en/function.htmlspecialchars.php" target="_blank" rel="nofollow">htmlspecialchars()</a></span>.
</p>

<?= Paragraph::h2('HTTP Response Status') ?>

<p>
    By default, the status is set to 200.<br>
    If the response should have a different status, use the <span class="notranslate"><b>setStatus()</b></span> method, with the first argument being the status and the second a short status message if it differs from the standard.
    In the status <span class="notranslate">'404 Not Found'</span>, such a message is <span class="notranslate">'Not Found'</span>.
</p>
<p>
    Standard status messages are usually used, so you can set the status by number directly in the <b>set()</b> method as the second argument.
</p>
<p>
    The method <span class="notranslate"><b>getStatus()</b></span> allows you to obtain the current <span class="notranslate">HTTP</span> status from the <span class="notranslate">Response</span> service.
</p>

<?= Paragraph::h2('Response Headers') ?>

<p>
    Besides the global server-side response headers, you can specify your own headers to be returned with a specific response from the framework.
    The following methods of the <span class="notranslate">Response</span> service are intended for this second type of headers.
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.headers.php');  ?>

<p>
    The <span class="notranslate"><b>setHeader()</b></span> method sets a header by name, overriding the previous value if it was set.
    In the rare case where multiple identical headers are needed, the <span class="notranslate">replace</span> argument allows adding a header to the current value.
</p>
<p>
    The <span class="notranslate"><b>hasHeader()</b></span> method checks if a header exists by name.
</p>
<p>
    The <span class="notranslate"><b>getHeader()</b></span> method is designed to obtain an array of header data by name.
</p>
<p>
    The <span class="notranslate"><b>getHeaders()</b></span> method returns the data of all headers set in <span class="notranslate">Response</span> as an array.
</p>

<p class="hl-danger-block">
    While operations on headers using standard <span class="hl-nowrap"><span class="notranslate">PHP</span> functions</span> will work in conjunction, conflicts may arise when used together with the <span class="notranslate">Response</span> object.
    It is better to use just one approach throughout the application.
</p>

<?= Paragraph::h2('HTTP Protocol Version') ?>

<p>
    The default <span class="notranslate">HTTP</span> protocol version is <span class="notranslate">'1.1'</span> unless determined from the current request.
    Since the return value should usually match the request itself, changes are rarely used.
</p>
<p>
    Nevertheless, the <span class="notranslate"><b>getVersion()</b></span> and <span class="notranslate"><b>setVersion()</b></span> methods are available for getting and setting the version respectively.
</p>

<?= Link::previousPage('docs.2.0.service.request.page', 'Request'); ?>

<?= Link::nextPage('docs.2.0.service.cache.page', 'Caching'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

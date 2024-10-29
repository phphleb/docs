<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Request 对象') ?>

<p>
    系统 <span class="notranslate">Request</span> 对象是在框架处理 HTTP 请求的最初阶段创建的。
    它不仅被创建，还被填充了信息（标头、参数等）<br>
    该对象有助于 <span class="notranslate">HLEB2</span> 框架在处理请求时的初始运行。
    系统 <span class="notranslate">Request</span> 对象仅用于此目的。
</p>
<p>
    默认情况下可以从容器中获取的 <span class="notranslate"><b>Request</b></span> 服务，它是一个包裹在系统对象上的封装，通过它可以使用当前请求的数据。
</p>
<p>
    使用当前 <span class="notranslate">HTTP</span> 方法从控制器（和所有从 <span class="notranslate">Hleb\Base\Container</span> 继承的类）中的 <span class="notranslate">Request</span> 获取数据的方法：
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.container.php', false);  ?>

<p>
    在应用程序代码中从 <span class="notranslate">Request</span> 获取 <span class="notranslate">HTTP</span> 方法的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.static.php', false);  ?>

<p>
    此外，通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 可以通过 <span class="notranslate">Hleb\Reference\Interface\Request</span> 接口获取 <span class="notranslate">Request</span> 对象。
</p>

<p>
    为简化示例，今后的示例将仅包含通过 <span class="notranslate">Hleb\Static\Request</span> 的引用。
</p>

<?= Paragraph::h2('HTTP 请求方法') ?>
<p>
    请求应用程序时会使用特定的 HTTP 方法；框架支持以下方法：<span class="notranslate">'GET', 'POST', 'DELETE', 'PUT', 'PATCH', 'OPTIONS'</span>（以及 <span class="notranslate">'HEAD'</span>）。<br>
    方法 <span class="notranslate"><b>getMethod()</b></span> 和 <span class="notranslate"><b>isMethod()</b></span> 帮助确定当前的方法。
    前者返回一个值，例如 <span class="notranslate">'GET'</span>，而在 <span class="notranslate">isMethod(...)</span> 方法中需要指定要比较的值。
</p>

<?= Paragraph::h2('来自 $_GET, $_POST 和请求体的参数') ?>

<p>
    随请求发送的数据可以以各种方式使用。
    它们可以以原始形式保存，这样不需要预处理。
    但是，如果需要立即在响应中显示数据，则应保护数据免受可执行脚本的注入。
    <span class="notranslate"><b>get()</b></span> 和 <span class="notranslate"><b>post()</b></span> 方法返回一个带有相应参数的对象。这个对象可以用来获取原始数据和转换成所需格式的数据。
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.http.params.php', false);  ?>

<p class="hl-info-block">
    使用这些方法返回的对象时，最常见的错误是将该对象用作值，而不是从对象中获取值。
</p>

<p>
    如果需要将结果作为数组，例如用于查询 <span class="notranslate">'?param[key]=value'</span>，具有该值的对象有一个 <span class="notranslate">asArray()</span> 方法，该方法可以保护数组值免受 XSS 漏洞的影响。<span class="notranslate">value()</span> 方法会返回一个数组，但其中包含原始的未处理数据。
</p>
<p>
    <span class="notranslate"><b>input()</b></span> 方法用于确定并从请求体中获取数据数组。
    这些可能是 <span class="notranslate">JSON</span> 数据或 <span class="notranslate">url-encoded</span> 参数，转换为数组。<br>
    因此，您可以以数组形式获取 <span class="notranslate">POST-，PUT-，PATCH-</span> 或 <span class="notranslate">DELETE</span> 参数，或 <span class="notranslate">JSON</span> 格式的请求体中的参数。
</p>
<p>
    通过 <span class="notranslate">input()</span> 方法获得的数据表示处理过的值，<span class="notranslate">HTML</span> 标签转换为特殊字符。
</p>
<p>
    如果需要以数组形式获得请求体的原始数据，则 <span class="notranslate"><b>getParsedBody()</b></span> 方法就是为此而设计的。
    它类似于 <span class="notranslate">input()</span>，但返回未经处理的数据。
</p>
<p>
    如果前面的格式不合适，请求体的原始形式作为字符串值由 <span class="notranslate"><b>getRawBody()</b></span> 方法返回。
    这样可以自己将数据转换为所需的格式。
</p>

<?= Paragraph::h2('动态路线参数') ?>

<p>
    这些请求参数涉及到路线的动态部分，在请求中为其分配了特定的值。
    <span class="notranslate"><b>param()</b></span> 方法允许通过动态参数的名称来获取这些值。
    结果将是一个对象，通过该对象可以以所需格式获取值。
</p>
<p>
    例如，如果请求匹配了如下形式的路由：
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.example.uri.php', false);  ?>

<p>
    对于地址 <span class="notranslate">/10/main/</span>，参数 <span class="notranslate">'version'</span> 和 <span class="notranslate">'page'</span> 的定义如下：
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.param.params.php', false);  ?>

<p class="hl-info-block">
    使用该方法返回的对象时，常见的错误是将对象当作值本身使用，而不是从对象中提取值。
</p>

<p>
    <span class="notranslate"><b>data()</b></span> 方法返回所有动态参数的对象数组。
    可以类似地从这些对象中获取参数的原始和处理后的值。
</p>
<p>
    要以未经处理的值数组形式获取原始动态路由参数，请使用 <span class="notranslate"><b>rawData()</b></span> 方法。
</p>

<p class="hl-danger-block">
    请注意，当框架处理传入数据时（当选择此选项时），它仅防止 XSS 攻击。在其他情况下，例如需要为数据库存储进行引号转义时，必须应用附加的安全措施。
</p>


<?= Paragraph::h2('请求 URI 数据') ?>

<p>
    由 <span class="notranslate"><b>getUri()</b></span> 方法返回的对象基于 <span class="notranslate">PSR-7</span> 的 <span class="notranslate">UriInterface</span>，可以获取以下请求数据：<br>
    <span class="notranslate">getUri()-><b>getHost()</b></span> - 当前请求的域名，例如 <span class="notranslate">'mob.example.com'</span>。如果请求中包含端口，可能会一起返回。<br>
    <span class="notranslate">getUri()-><b>getPath()</b></span> - 地址中主机之后的路径，例如 <span class="notranslate">'/ru/example/page'</span> 或 <span class="notranslate">'/ru/example/page/'</span>。<br>
    <span class="notranslate">getUri()-><b>getQuery()</b></span> - 查询参数，例如 <span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>。<br>
    <span class="notranslate">getUri()-><b>getPort()</b></span> - 请求的端口。<br>
    <span class="notranslate">getUri()-><b>getScheme()</b></span> - 请求的 <span class="notranslate">HTTP</span> 协议方案，如 <span class="notranslate">'http'</span> 或 <span class="notranslate">'https'</span>。<br>
    <span class="notranslate">getUri()-><b>getIp()</b></span> - 请求的 <span class="notranslate">IP</span> 地址。
</p>

<?= Paragraph::h2('请求的 HTTP 协议方案') ?>

<p>
    为了确认 HTTP 协议的类型，可以使用 <span class="notranslate"><b>isHttpSecure()</b></span> 方法。
    它会返回是否为 <span class="notranslate">'https'</span> 的检查结果。
</p>
<p>

    <span class="notranslate"><b>getHttpScheme()</b></span> 方法返回当前的 <span class="notranslate">HTTP</span> 协议方案为 <span class="notranslate">'http://'</span> 或 <span class="notranslate">'https://'</span>。
</p>

<?= Paragraph::h2('从地址获取主机名') ?>

<p>
    <span class="notranslate"><b>getHost()</b></span> 方法用于获取当前请求的域名。
    与 <span class="notranslate">getUri()->getHost()</span> 等效。
</p>
<p>
    使用 <span class="notranslate"><b>getSchemeAndHost()</b></span> 方法可以同时获取 <span class="notranslate">HTTP</span> 协议方案和主机名。
</p>

<?= Paragraph::h2('请求 URL') ?>

<p>
    <span class="notranslate"><b>getAddress()</b></span> 方法返回请求的完整 <span class="notranslate">URL</span>，不包含 <span class="notranslate">GET</span> 参数。
</p>

<?= Paragraph::h2('文件上传') ?>

<p>
    当用户上传文件时，可以使用方法<span class="notranslate"><b>getFiles()</b></span>获取其数据。
    它返回一个包含数据的数组数组或者对象数组，具体取决于框架是否通过外部<span class="notranslate">Request</span>初始化。
</p>

<?= Paragraph::h2('请求头') ?>

<p>
    所有传入请求头的数组由方法<span class="notranslate"><b>getHeaders()</b></span>返回。
    这些是按键（名称）排序的请求头。
</p>
<p>
    可以通过方法<span class="notranslate"><b>hasHeader()</b></span>检查是否存在某个名称的头。
</p>
<p>
    方法<span class="notranslate"><b>getHeader()</b></span>根据名称返回匹配的头（值）的数组。
</p>
<p>
    方法<span class="notranslate"><b>getHeaderLine()</b></span>也根据名称返回头值，但以枚举形式的字符串。
</p>

<?= Paragraph::h2('$_SERVER数据') ?>

<p>
    要获取由web服务器设置在<span class="notranslate">$_SERVER</span>变量中的数据，可以使用方法<span class="notranslate"><b>server()</b></span>。
    它根据参数名称返回值。
</p>

<?= Paragraph::h2('请求协议版本') ?>

<p>
    方法<b>getProtocolVersion()</b>返回请求协议版本，例如 '1.1'。
</p>

<?= Link::previousPage('docs.2.0.container.di.page', '依赖注入'); ?>

<?= Link::nextPage('docs.2.0.service.response.page', '响应'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

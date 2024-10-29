<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('响应对象') ?>

<p>
    框架的<span class="notranslate"><b>Response</b></span>服务包含用于生成客户端响应的全局数据。
    在异步使用框架时，这些数据在每个请求结束后会恢复为默认值。<br>
</p>
<p>
    在控制器中为<span class="notranslate">Response</span>分配数据的方法：
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.container.php', false);  ?>

<p>
    对于从<span class="notranslate">Hleb\Base\Container</span>继承的所有类，该方法是相似的，但在控制器外的<span class="notranslate">Response</span>中形成响应被认为是坏的实践。
</p>
<p>
    在应用程序代码中使用<span class="notranslate">Response</span>的示例（此情况下代码也难以维护）：
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.static.php', false);  ?>

<p>
    还可以通过接口<span class="notranslate">Hleb\Reference\Interface\Response</span>使用<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>访问<span class="notranslate">Response</span>服务。
</p>
<p>
    为简化示例，之后仅包含通过<span class="notranslate">DI</span>的访问。
</p>

<p class="hl-info-block">
    与<span class="notranslate">print</span>和<span class="notranslate">echo</span>输出结合，Response数据将后面显示，正确的策略是仅使用一种方法输出结果。
</p>
<p>
    在请求结束时，框架无论如何都会引用指定的<span class="notranslate">Response</span>对象进行输出，即使该对象未从控制器返回。
    这在单次或连续地在单个控制器方法中添加数据到<span class="notranslate">Response</span>时很方便。
    如有需要操作包含不同数据的响应对象，任何其他符合<span class="notranslate">PSR-7</span>的<span class="notranslate">Response</span>均可使用。
    替代的<span class="notranslate">Response</span>必须在被调用的控制器方法中返回。
</p>

<?= Paragraph::h2('响应体') ?>

<p>
    响应体由添加到 <span class="notranslate">Response</span> 对象中的数据组成，可以转换为字符串。
    通常是展示给用户的消息文本或者格式为 <span class="notranslate">JSON</span> 或 <span class="notranslate">XML</span> 的数据，可能是动态生成的 <span class="notranslate">HTML</span> 等。
</p>
<p>
    用于添加数据的 <span class="notranslate">Response</span> 服务方法有：<br>
    <span class="notranslate"><b>set()</b></span> 或 <span class="notranslate"><b>setBody()</b></span> — 赋值数据，完全覆盖以前存在的响应体。<br>
    <span class="notranslate"><b>add()</b></span> 或 <span class="notranslate"><b>addToBody()</b></span> — 在以前添加的数据末尾追加。
</p>
<p>
    从服务中获取数据：<br>
    <span class="notranslate"><b>get()</b></span> 或 <span class="notranslate"><b>getBody()</b></span> — 获取 <span class="notranslate">Response</span> 对象中当前响应体的状态。
</p>

<p class="hl-danger-block">
    在向客户端发送数据之前，确保其已检查 <span class="hl-nowrap"><span class="notranslate">XSS</span> 漏洞</span>。
    如果先前未处理过此类数据，可通过 <span class="hl-nowrap"><span class="notranslate">PHP</span> 函数</span> <span class="notranslate"><a href="https://www.php.net/manual/en/function.htmlspecialchars.php" target="_blank" rel="nofollow">htmlspecialchars()</a></span> 进行过滤。
</p>

<?= Paragraph::h2('HTTP 响应状态') ?>

<p>
    默认情况下，状态码设为 200。<br>
    如果响应需要设置不同的状态码，可以使用 <span class="notranslate"><b>setStatus()</b></span> 方法，第一个参数为状态码，第二个为简短的状态消息，如果它与标准消息不同。
    在 <span class="notranslate">'404 Not Found'</span> 状态中，该消息为 <span class="notranslate">'Not Found'</span>。
</p>
<p>
    通常使用标准状态消息，因此可以在 <b>set()</b> 方法中直接通过数字参数进行设置。
</p>
<p>
通过 <span class="notranslate"><b>getStatus()</b></span> 方法，可以从 <span class="notranslate">Response</span> 服务中获取当前 <span class="notranslate">HTTP</span> 状态。
</p>

<?= Paragraph::h2('响应头') ?>

<p>
    除了全局服务器端响应头之外，您可以为框架返回的特定响应指定自己的头。
    <span class="notranslate">Response</span> 服务的以下方法是为这第二种类型的头设计的。
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.headers.php');  ?>

<p>
    <span class="notranslate"><b>setHeader()</b></span> 方法根据名称设置头，如果先前有设置则覆盖其值。
    在需要创建多个相同头的罕见情况下，<span class="notranslate">replace</span> 参数允许将头添加到当前值。
</p>
<p>
    <span class="notranslate"><b>hasHeader()</b></span> 方法检查名称是否存在头。
</p>
<p>
    <span class="notranslate"><b>getHeader()</b></span> 方法用于按名称获取头数据数组。
</p>
<p>
    <span class="notranslate"><b>getHeaders()</b></span> 方法以数组形式返回所有在 <span class="notranslate">Response</span> 中设置的头数据。
</p>

<p class="hl-danger-block">
    虽然使用标准 <span class="hl-nowrap"><span class="notranslate">PHP</span> 函数</span> 对头的操作会共同起作用，但与 <span class="notranslate">Response</span> 对象一起使用时可能会出现冲突。
    更好地在整个应用程序中只使用一种方法。
</p>

<?= Paragraph::h2('HTTP 协议版本') ?>

<p>
    默认的 <span class="notranslate">HTTP</span> 协议版本是 <span class="notranslate">'1.1'</span>，除非从当前请求中确定。
    因为返回值通常应与请求本身相匹配，所以很少需要更改。
</p>
<p>
    尽管如此，<span class="notranslate"><b>getVersion()</b></span> 和 <span class="notranslate"><b>setVersion()</b></span> 方法被用于分别获取和设置版本。
</p>

<?= Link::previousPage('docs.2.0.service.request.page', 'Request'); ?>

<?= Link::nextPage('docs.2.0.service.cache.page', '缓存'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

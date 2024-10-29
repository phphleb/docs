<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('内置框架功能') ?>

<p>
    <span class="notranslate">HLEB2</span>框架引入了一些自定义功能，不同的用途旨在减少代码大小并加快应用程序开发，因为它们是常见操作的简写。
</p>

<p class="hl-info-block">
    一些内置框架的功能名称以<b><span class="notranslate">hl_</span></b>开头，并且这些功能也有不带该前缀的重复。因此，如果忘记所需函数的名称，只需在代码中键入<i><span class="notranslate">hl_</span></i>，您的IDE应该会自动建议可用选项。
</p>

<?= Paragraph::h2('路由数据处理') ?>

<p>
    <span class="notranslate">HLEB2</span>框架具有自己的路由系统。以下功能旨在与此系统进行交互。如果您习惯为路由分配自定义名称，它们可能会在此处派上用场。
</p>

<?= Paragraph::h3('route_name()') ?>

<p>
    此函数返回当前路由的名称或<span class="notranslate">null</span>如果未分配名称。<br>
    尽管这是一条非常有用的信息，但它可能只有在使用另一个与地址结合的函数时才需要。
</p>

<?= Paragraph::h3('url()') ?>

<p>
    <span class="notranslate">url()</span>函数根据路由名称及替换必要参数返回<b>相对</b>URL地址。<br>
    函数参数：<br>
    <b><span class="notranslate">routeName</span></b> - 需要获取地址的路由名称。<br>
    <b><span class="notranslate">replacements</span></b> - 如果路由是动态的, 替换部分的数组。<br>
    <b><span class="notranslate">endPart</span></b> - 布尔值, 确定地址的最后一部分是否需要, 如果在路由中是可选的。<br>
    <b><span class="notranslate">method</span></b> - 需要哪个HTTP方法的地址。某些方法可能不适合此路由，在这种情况下将返回错误。默认是<span class="notranslate">'get'</span>。
</p>

<?= Code::fromFile('@views/docs/code/function/function.address.example.php', false);  ?>

<p class="hl-info-block">
    通过路由名称一致地使用内部 URL，应用程序可以改变路由中地址的静态部分，而无需更改其余代码。
</p>
<?= Paragraph::h3('address()') ?>

<p>
    <span class="notranslate">address()</span>函数返回基于路由名的<b>完整</b><span class="notranslate">URL</span>，并替换当前域。由于域名仅为当前域名，对于其他域，请使用与<span class="notranslate">url()</span>的连接。<br>
    参数集与<span class="notranslate">url()</span>函数类似。此函数可用生成项目页面的正确链接。然而，对于应用内导航，最好使用<i>相对</i>的URL。
</p>

<?= Paragraph::h2('获取当前HTTP请求数据') ?>

<?= Paragraph::h3('request_uri()') ?>

<p>
    返回包含当前请求的相对URL信息的对象。<br>
    由<span class="notranslate"><b>request_uri()</b></span>函数返回的对象基于<span class="notranslate">PSR-7</span>中的<span class="notranslate">UriInterface</span>（方法<span class="notranslate">getUri()</span>），由此可以获取以下请求数据：<br>

    <span class="notranslate">request_uri()-><b>getHost()</b></span> - 当前请求的域名，例如<span class="notranslate">'mob.example.com'</span>。根据请求中的存在，可能包括端口。<br>
    <span class="notranslate">request_uri()-><b>getPath()</b></span> - 主机后的地址路径，例如<span class="notranslate">'/ru/example/page'</span>或<span class="notranslate">'/ru/example/page/'</span>。<br>
    <span class="notranslate">request_uri()-><b>getQuery()</b></span> - 请求参数，例如<span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>。<br>
    <span class="notranslate">request_uri()-><b>getPort()</b></span> - 请求端口。<br>
    <span class="notranslate">request_uri()-><b>getScheme()</b></span> - 请求的<span class="notranslate">HTTP</span>方案，<span class="notranslate">'http'</span>或<span class="notranslate">'https'</span>。<br>
    <span class="notranslate">request_uri()-><b>getIp()</b></span> - 请求的<span class="notranslate">IP</span>地址。
</p>

<p class="hl-info-block">
    在这些<span class="notranslate">request_uri()</span>的例子中，一个表达式中使用了两种命名风格（<span class="notranslate">snake_case</span>和<span class="notranslate">camelCase</span>），因为大多数<span class="notranslate">HLEB2</span>框架的函数采用类似于PHP函数的<span class="notranslate">snake_case</span>，而返回对象的方法按照<span class="notranslate">PSR-12</span>采用<span class="notranslate">camelCase</span>。如果您习惯其他函数格式，则将当前函数包装为所需的格式。
</p>

<?= Paragraph::h3('request_host()') ?>
<p>
    <span class="notranslate">request_host()</span>函数允许获取当前主机，可能包含端口。例如，<span class="notranslate">example.com</span>或<span class="notranslate">example.com:8080</span>，如果它在请求URL中指定。这对生成项目页面的正确链接非常有用。然而，应用程序内部导航最好使用相对URL。
</p>

<?= Paragraph::h3('request_path()') ?>

<p>
    <span class="notranslate">request_path()</span>函数从URL中返回当前请求的相对路径，不包含GET参数。例如，<span class="notranslate">/ru/example/page</span>或<span class="notranslate">/ru/example/page/</span>。
</p>

<?= Paragraph::h3('request_address()') ?>

<p>
    <span class="notranslate">request_address()</span>函数从URL中返回当前请求的完整地址，不包含GET参数。例如，<span class="notranslate">`https://example.com/ru/example/page`</span>或<span class="notranslate">`https://example.com/ru/example/page/`</span>。
</p>

<?= Paragraph::h2('重定向') ?>

<p>
    重定向到应用程序的其他页面或其他<span class="notranslate">URL</span>。
</p>
<?= Paragraph::h3('hl_redirect()') ?>

<p>
    <span class="notranslate">hl_redirect()</span> 函数使用指定的头执行重定向并退出脚本。因此，如果在应用此函数之前已经输出了内容，标题不会被发送，而是会显示警告而不是重定向。它基于 <span class="notranslate">'Location'</span> 头操作。在基于框架的类中，例如控制器中，更适合使用类似的方法 <span class="notranslate">Redirect::to()</span>。
</p>

<?= Code::fromFile('@views/docs/code/function/function.redirect.example.php', false);  ?>

<?= Paragraph::h2('获取框架配置数据') ?>

<p>
    框架或自定义设置中的配置数据可以在应用程序代码中使用。以下函数允许在项目代码的任何地方检索这些数据。
</p>

<p class="hl-info-block">
    项目参数和设置应被收集在其配置文件中，并且它们不仅可以用于应用程序的需求，也可用于配置连接的第三方库。
</p>

<?= Paragraph::h3('config()') ?>

<p>
    每个配置参数根据主文件名按组分配。<br>
    这些可能是标准组 (<span class="notranslate">'common'</span>, <span class="notranslate">'database'</span>, <span class="notranslate">'main'</span>, <span class="notranslate">'system'</span>) 或为项目创建的附加组。组名作为第一个参数传递给 <span class="notranslate">config()</span> 函数。<br>
    参数名本身是第二个参数。函数返回该参数的值。例如：
</p>

<?= Code::fromFile('@views/docs/code/function/function.config.example.php', false);  ?>

<?= Paragraph::h3('get_config_or_fail()') ?>

<p>
    如 <span class="notranslate">get_config_or_fail()</span> 名称所示，此函数返回配置参数的值或在找不到参数或其为 <span class="notranslate">null</span> 时抛出错误。
    参数与 <span class="notranslate">config()</span> 函数类似。
</p>

<?= Paragraph::h3('setting()') ?>

<p>
    由于建议将自定义值添加到 <span class="notranslate">'main'</span> 组中，因此为频繁使用此配置提供了一个单独的函数 <span class="notranslate">setting()</span>。
    它的用法类似于 <span class="notranslate">config()</span> 函数，第一个参数为 <span class="notranslate">'main'</span>。
</p>

<?= Paragraph::h3('hl_db_config()') ?>

<p>
    特殊函数 <span class="notranslate">hl_db_config()</span> 是 <span class="notranslate">config()</span> 函数的等效函数，第一个参数为 <span class="notranslate">'database'</span>。
</p>

<?= Paragraph::h3('hl_db_connection()') ?>

<p>
    <span class="notranslate">hl_db_connection()</span> 函数用于从 <span class="notranslate">'database'</span> 设置组的 <span class="notranslate">'db.settings.list'</span> 列表中获取任何现有连接的数据。它返回包含设置的数组，如果找不到设置则抛出错误。
</p>

<?= Paragraph::h3('hl_db_active_connection()') ?>

<p>
    <span class="notranslate">hl_db_active_connection()</span> 函数类似于 <span class="notranslate">hl_db_connection()</span> 函数，但用于返回在 <span class="notranslate">'base.db.type'</span> 参数中标记为 "active" 的连接设置数组。
</p>

<p class="hl-info-block">
    这些访问数据库参数的函数在添加需要特定数据库连接配置的第三方库时非常重要。
</p>

<?= Paragraph::h2('调试函数') ?>

<p>
    框架包含几个用于快速代码调试的函数。它们以多种方式补充和扩展了 <span class="notranslate">PHP</span> 的 <span class="notranslate">var_dump()</span> 函数。可以根据情况选择合适的函数。
</p>

<?= Paragraph::h3('print_r2()') ?>

<p>

    这个函数保留自框架的第一个版本。它用于以可读的格式显示数据，以便在调试面板中查看。因此，在关闭 DEBUG 模式时，传递给函数的调试数据不会显示，因为调试面板已禁用。这在开发过程中很方便，因为无需担心它在非调试模式下的可见性。<span class="notranslate">print_r2()</span> 函数的第二个可选参数允许您为显示的数据添加描述，以便在面板中轻松识别。示例：
</p>

<?= Code::fromFile('@views/docs/code/function/function.print_r2.example.php', false);  ?>

<?= Paragraph::h3('var_dump2()') ?>

<p>
    <span class="notranslate">var_dump2()</span> 函数是 <span class="notranslate">var_dump()</span> 的完全等价物，但输出的信息更具结构性。如果输出用于浏览器，则会保留原始的换行和缩进。
</p>

<?= Paragraph::h3('dump()') ?>

<p>
    <span class="notranslate">dump()</span> 函数是 <span class="notranslate">var_dump()</span> 的另一个封装，但它将结果转换为 <span class="notranslate">HTML</span> 代码，比标准输出更清晰和信息丰富。
</p>

<?= Paragraph::h3('dd()') ?>

<p>
    类似于 <span class="notranslate">dump()</span>，它输出 <span class="notranslate">HTML</span> 代码，但在输出后终止脚本。<span class="notranslate">dd()</span> 函数在应用页面中很容易找到，因为它的输出将显示在页面的最下方。
</p>

<?= Paragraph::h2('文件系统操作') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架在项目根目录下通过相对路径组织文件和目录操作。这样的路径以 '@/' 开头以表示根目录。这种方法在框架中的许多标准服务中被使用，且推荐保持一致使用。以下函数是对相应的 <span class="notranslate">PHP</span> 函数的封装，增加了 '@' 前缀的支持。
</p>

<?= Paragraph::h3('hl_file_exists()') ?>

<p>

    <span class="notranslate">hl_file_exists()</span> 函数是 <span class="notranslate">PHP</span> 函数 <span class="notranslate">file_exists()</span> 的类似功能，但它也接受以 '@' 开头的特殊路径。
</p>

<?= Paragraph::h3('hl_file_get_contents()') ?>

<p>
    <span class="notranslate">hl_file_get_contents()</span> 函数类似于 <span class="notranslate">PHP</span> 函数 <span class="notranslate">file_get_contents()</span>，但允许使用以 '@' 开头的特殊路径。
</p>

<?= Paragraph::h3('hl_file_put_contents()') ?>

<p>
    <span class="notranslate">hl_file_put_contents()</span> 函数与 <span class="notranslate">PHP</span> 函数 <span class="notranslate">file_put_contents()</span> 相同，也接受以 '@' 开头的路径。
</p>

<?= Paragraph::h3('hl_is_dir()') ?>

<p>
    <span class="notranslate">hl_is_dir()</span> 函数类似于 <span class="notranslate">PHP</span> 函数 <span class="notranslate">is_dir()</span>，但它也可以接受带有 '@' 前缀的路径。
</p>

<?= Paragraph::h2('CSRF 保护') ?>

<p>
    框架中关于 <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">CSRF 攻击保护</a> 的详细实现文档。
</p>

<?= Paragraph::h3('csrf_token()') ?>

<p>
    <span class="notranslate">csrf_token()</span> 函数返回一个用于防护 <span class="notranslate">CSRF</span> 攻击的安全令牌。
</p>

<?= Paragraph::h3('csrf_field()') ?>
<p>
    <span class="notranslate">csrf_field()</span> 函数返回用于插入表单的 <span class="notranslate">HTML</span> 内容，以保护免受 <span class="notranslate">CSRF</span> 攻击。
</p>

<?= Paragraph::h2('模板') ?>

<p>
    虽然框架支持集成 Twig 模板引擎，但它还提供了一种简单的内置模板实现，不使用不同于标准 <span class="notranslate">PHP</span> 或 <span class="notranslate">HTML</span> 的自定义语法。<a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">了解更多</a>关于框架的标准模板。
</p>

<?= Paragraph::h3('insertTemplate()') ?>

<p>
    使用 <span class="notranslate">insertTemplate()</span> 函数，生成的模板会插入在调用该函数的位置。主要参数：<br>
    <b><span class="notranslate">viewPath</span></b> - 指向模板文件的特定路径。格式类似于 <span class="notranslate">view()</span> 函数中使用的路径类型。<br>
    <b><span class="notranslate">extractParams</span></b> - 一个关联数组，将被转换为模板变量。
</p>

<?= Paragraph::h3('template()') ?>

<p>
    <span class="notranslate">template()</span> 函数返回框架模板的文本表示。如果需要将内容传递到其他地方，例如用于邮件模板时，这非常有用。参数与 <span class="notranslate">insertTemplate()</span> 函数类似。
</p>

<?= Paragraph::h3('insertCacheTemplate()') ?>

<p>
    <span class="notranslate">insertCacheTemplate()</span> 函数类似于 <span class="notranslate">insertTemplate()</span>，区别在于模板会缓存指定在 <b><span class="notranslate">sec</span></b> 参数中的秒数。其他参数与 <span class="notranslate">insertTemplate()</span> 函数相同。
</p>

<?= Paragraph::h2('附加功能') ?>

<p>
    各种专用功能。
</p>

<?= Paragraph::h3('is_empty()') ?>

<p>
    以比<span class="notranslate">PHP</span>函数<span class="notranslate">empty()</span>更挑剔的方式检查值是否为空。
    <span class="notranslate">is_empty</span>函数只会在四种情况下返回<span class="notranslate">false</span>：传入空字符串、<span class="notranslate">null</span>、<span class="notranslate">false</span>或空数组。传入未声明的变量将导致错误，因此为了模拟原始函数，可以通过在函数前添加'@'来抑制此错误，例如：
</p>

<?= Code::fromFile('@views/docs/code/function/function.is_empty.example.php', false);  ?>

<p class="hl-info-block">
    尽管使用错误抑制是一种不良实践，但在<span class="notranslate">is_empty()</span>函数中的代码不意味着会发生其他错误。
</p>

<?= Paragraph::h3('logger()') ?>

<p>
    日志记录函数<span class="notranslate">logger()</span>返回一个对象，该对象具有记录各种级别数据的方法。
</p>

<?= Code::fromFile('@views/docs/code/function/function.logger.example.php', false);  ?>

<?= Paragraph::h3('once()') ?>

<p>
    <span class="notranslate">once()</span>函数使代码只对单个请求执行一次，并且在随后的调用中返回先前的结果。<br>
    执行结果在请求的整个持续期间内存储在内存中。<br>
    在此场景中，传递给<span class="notranslate">once()</span>的匿名函数将在第一次调用once时执行：
</p>

<?= Code::fromFile('@views/docs/code/function/function.once.example.php', false);  ?>

<?= Paragraph::h3('param()') ?>
<p>
    返回按参数名获取的动态请求数据对象，并可以选择值的格式。<br>
    例如，如果动态路由指定参数 <span class="notranslate">/{test}/</span>，而请求是 <span class="notranslate">/example/</span>，则 <span class="notranslate">param('test')</span>-><span class="notranslate">value</span> 将返回 <span class="notranslate">'example'</span>。<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>;</span>   - 直接获取值。<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>();</span> - 直接获取值。<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>();</span> - 返回转换为 <span class="notranslate">integer</span> 的值，不存在则为 <span class="notranslate">null</span>。<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>($default);</span> - 返回转换为 <span class="notranslate">integer</span> 的值，
    不存在则返回 <span class="hl-nowrap"><span class="notranslate">$default</span></span>。<br>
    如果路由的最后一部分是可选变量值，该值将为 <span class="notranslate">null</span>。<br>
    对于作为直接值获取的用户数据，需要注意安全。
</p>

<?= Paragraph::h2('框架功能测试') ?>

<p class="hl-info-block">
    在大多数情况下，框架的标准功能是相应服务的包装器，因此其测试类似于该服务的测试。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


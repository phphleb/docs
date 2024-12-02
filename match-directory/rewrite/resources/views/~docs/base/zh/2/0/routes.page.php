<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('路由') ?>

<p>
    路由是框架处理传入请求的主要任务。
    在这里，定义负责请求地址的路由，并分配后续的操作。
</p>
<p>
    有时在框架中，路由也被称为“路由”，两者是同一个概念。
</p>
<p>
    项目的路由由开发者在文件 <span class="notranslate">/routes/map.php</span> 中定义，来自 <span class="notranslate">"routes"</span> 文件夹的其他路由文件可以包含在此文件中，组合起来形成路由映射。
    这些路由的一个显著特点是，在加载时，框架会检查其整体的正确性以及所使用方法的顺序。如果出现异常，会生成带有异常原因的错误。
    由于路由映射中的所有路由都经过验证，这保证了它们的整体正确性。
</p>

<p class="hl-info-block">
    在首次请求之后或使用特定的控制台命令时，路由会更新并缓存。
    因此，路由文件不应包含外部代码，只应包含 <span class="notranslate">Route</span> 类的方法。
</p>

<p>
    如果在修改路由映射后，框架没有生成相应的提示信息，那么在将来的操作中这些信息不会再出现，至少在下一次修改相关路由文件之前不会出现。
</p>
<p>
    路由由 <b>Route</b> 类的方法定义，其中最常用的一个方法是 <b>get()</b>。
    此类方法仅用于路由映射中。
</p>

<?= Paragraph::h2('Route::get() 方法') ?>

<p>
    此方法允许您在指定条件下处理 <span class="notranslate">HTTP</span> <span class="notranslate">GET</span> 方法。
    如示例所示：
</p>

<?= Code::fromFile('@views/docs/code/routes/get.method.php', false); ?>

<p>
    该路由将在访问网站根 <span class="notranslate">URL</span> 时显示 <span class="notranslate">"Hello, world!"</span> 这行文字。
    要从模板中渲染 <span class="notranslate">HTML</span> 代码（可能包含 <span class="notranslate">PHP</span> 代码），该方法与 <span class="notranslate"><b>view()</b></span> 函数一起使用。
</p>

<?= Paragraph::h2('动态地址') ?>

<p>
    HLEB2 框架根据应用程序开发人员定义的方案处理任意地址，例如：
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.uri.php', false); ?>

<p>
    在这种情况下，所有符合条件方案 <span class="notranslate">"site.com/resource/.../.../"</span> 的 <span class="notranslate">URL</span> 地址将返回相同的文本字符串，并且 <span class="notranslate">"version"</span> 和 <span class="notranslate">"page"</span> 的值可以通过 <span class="notranslate">Hleb\Static\Request</span> 对象访问：<span class="notranslate">Request::param("version")->asString()</span> 和 <span class="notranslate">Request::param("page")->asPositiveInt()</span>。<br>
    这些值也可以通过容器和控制器方法中的同名参数获得。
</p>
<p>
    在路由地址中，可以指定最后一部分可能是可选的：
</p>

<?= Code::fromFile('@views/docs/code/routes/empty.end.part.uri.php', false); ?>

<p>
    如果地址缺失，它仍与该路由匹配，但<span class="notranslate">'id'</span> 的值将为 NULL。
</p>

<?= Paragraph::h2('动态地址的默认值') ?>

<p>
    示例动态路由，其中为 <span class="notranslate">second</span> 和 <span class="notranslate">third</span> 命名部分指定了默认值。
</p>

<?= Code::fromFile('@views/docs/code/routes/default.dynamic.parts.php', false); ?>

<p>
    类似于 <span class="notranslate">'/example/{first}/two/three?'</span>，但在给定的 <span class="notranslate">Request</span> 中，会将附加值 <span class="notranslate">'second' => 'two', 'third' => 'three'</span> 添加到已存在的动态参数 <span class="notranslate">'first'</span>。如果最终参数缺失，则将为 <span class="notranslate">null</span>。
</p>

<?= Paragraph::h2('可变地址') ?>

<p>
    多重路由分配（在 <span class="notranslate">Request::param()</span> 中将会出现一个编号数组，包含 <span class="notranslate">URL</span> 的部分）：
</p>

<?= Code::fromFile('@views/docs/code/routes/variable.uri.php', false);  ?>


<?= Paragraph::h2('地址中的标签') ?>

<p>
    框架不允许将 <span class="notranslate">URL</span> 的部分解释为复合段，因为这与标准相悖，但对此规则有一个例外。<br>
    一个常见的情况是用户登录名在 <span class="notranslate">URL</span> 中用特殊的 <span class="notranslate">@</span> 标签作为前缀。
    可以如下设置：
</p>

<?= Code::fromFile('@views/docs/code/routes/tag.uri.php', false);  ?>


<?= Paragraph::h2('view() 函数') ?>

<p>
    该函数指定从 <span class="notranslate">/resources/views/</span> 文件夹中与路由关联的模板。
    <span class="notranslate">/resources/views/index.php</span> 文件的示例：
</p>

<?= Code::fromFile('@views/docs/code/routes/view.index.php', false);  ?>

<p>
    可以将变量作为第二个参数传递给函数，使用命名数组。
</p>

<?= Code::fromFile('@views/docs/code/routes/view.params.php', false);  ?>

<p>
    变量将在模板中可用。
</p>

<?= Code::fromFile('@views/docs/code/template/view.param.php');  ?>

<p>
    对于预定义地址 '404'，'403' 和 '401'，<span class="notranslate">view()</span> 函数中将显示相应的标准错误页面。
</p>

<?= Paragraph::h2('预览功能 preview()') ?>

<p>
    有时候，为了在路由中指定某些预先定义的文本响应，需要设置适当的 <span class="notranslate">Content-Type</span> 标头并输出一些请求参数。目前，仅支持注入原始路由地址、地址中的动态参数以及 <span class="notranslate">HTTP</span> 请求方法。例如：
</p>

<?= Code::fromFile('@views/docs/code/template/preview.param.php', false);  ?>

<?= Paragraph::h2('函数 redirect()') ?>

<p>
    在路由中使用 <span class="notranslate">redirect()</span> 方法来指定地址重定向。它可以包含指向内部或外部 <span class="notranslate">URL</span> 的链接，还可以包括从原始路由获取的动态查询参数：
</p>

<?= Code::fromFile('@views/docs/code/template/redirect.param.php', false);  ?>

<?= Paragraph::h2('路由分组') ?>

<p>
    路由分组用于通过向组中添加方法为路由分配通用属性，方法的行为将应用于整个组。<br>
    组的作用范围通过在组的开头使用方法 <span class="notranslate"><b>toGroup()</b></span> 来定义，并在结束时使用 <span class="notranslate"><b>endGroup()</b></span> 结束。
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example.php', false);  ?>

<p>
    在这种情况下，添加到组中的方法 <span class="notranslate"><b>prefix()</b></span> 将应用于组内的所有路由。
</p>
<p>
    组可以嵌套到其他组中。此外，还存在组的另一种语法：
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example2.php', false);  ?>

<?= Paragraph::h2('命名路由') ?>

<p>
    每个路由都可以分配一个唯一的名称。
</p>

<?= Code::fromFile('@views/docs/code/test.php', false);  ?>

<p>
    该名称可用于生成其 <span class="notranslate">URL</span>，使代码与实际的 <span class="notranslate">URL</span> 地址解耦。<br>
    通过使用路由名称而不是地址来实现这一点。
    例如，此网站通过使用路由名称生成页面链接。
</p>

<?= Paragraph::h2('处理 HTTP 方法') ?>

<p>
    类似于 <span class="notranslate">get()</span> 方法处理 <span class="notranslate">HTTP</span> 的 <span class="notranslate">GET</span> 方法，存在与 <span class="notranslate">POST, PUT, PATCH, DELETE, OPTIONS</span> 相对应的 <span class="notranslate"><b>post()</b>, <b>put()</b>, <b>patch()</b>, <b>delete()</b>, <b>options()</b></span> 方法。
</p>
<p>
    这些方法与它们各自的 <span class="notranslate">HTTP</span> 方法相匹配，除了 <span class="notranslate">options()</span>。<br>
    在其他所有情况下，<span class="notranslate">OPTIONS</span> 方法是按照标准处理的，但在 <span class="notranslate">options()</span> 中，您可以单独定义如何处理 OPTIONS 请求（重新定义它们）。
</p>

<?= Code::fromFile('@views/docs/code/routes/http.methods.php', false);  ?>

<?= Paragraph::h2('Route::any() 方法') ?>

<p>
    分配给路由时，它匹配所有 <span class="notranslate">HTTP</span> 方法，在其他方面类似于 <span class="notranslate">get()</span>。
</p>

<?= Paragraph::h2('Route::match() 方法') ?>

<p>
    类似于 <span class="notranslate">get()</span> 方法，但具有一个额外的第一个参数，您可以在其中传递一个支持的 <span class="notranslate">HTTP</span> 方法数组。
</p>

<?= Code::fromFile('@views/docs/code/routes/match.method.php', false);  ?>

<?= Paragraph::h2('Route::fallback() 方法') ?>

<p>
    捕获所有未匹配的路径，适用于所有 <span class="notranslate">HTTP</span> 方法（或指定的）。对于特定的 <span class="notranslate">HTTP</span> 方法在路由中只能有一个 <span class="notranslate">fallback()</span> 方法。
</p>
<p>
    这样可以为未找到匹配（而不是 404 错误）的所有类型 <span class="notranslate">HTTP</span> 方法或单独指定处理方法。
</p>

<?= Paragraph::h2('路由保护') ?>

<p>
    用于防御 <span class="notranslate">CSRF</span> 攻击的方法是 <span class="notranslate"><b>protect()</b></span>.
    将其分配给路由或路由组将添加对之前设置的特殊令牌的检查。
</p>

<?= Code::fromFile('@views/docs/code/routes/protect.method.php', false);  ?>

<p>
    工作原理如下:<br>
    在页面上输出访问令牌，可以使用 <span class="notranslate">csrf_token()</span> 或 <span class="notranslate">csrf_field()</span> 函数。<br>

    通过 <span class="notranslate">JavaScript</span> 或表单与请求一起发送此令牌。<br>
    请求的路由具有 <span class="notranslate">protect()</span> 方法并检查令牌。
</p>

<?= Paragraph::h2('控制器分配') ?>

<p>
    <a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">控制器</a> 是 <span class="notranslate">MVC</span> 架构的一部分（用于 web 的 <span class="notranslate">Action-Domain-Responder</span>），负责对路由器识别的请求进行后续处理，但不应包含业务逻辑。
</p>
<p>
    控制器无法用于路由组，它是针对某个具体或单独路由分配的。
    为此使用方法 <span class="notranslate"><b>controller()</b></span>。
</p>

<?= Code::fromFile('@views/docs/code/controller/example.php', false);  ?>

<p>
    在示例中，第一个参数是分配的控制器类，第二个参数是使用的控制器方法。
    <span class="notranslate">'index'</span> 方法可以省略，因为它是默认使用的。<br>
    注意，使用控制器时 <span class="notranslate">get()</span> 方法不再需要第二个参数。
</p>

<?= Paragraph::h2('中间件控制器') ?>

<p>
    如果一个控制器只能被分配给一个路由，那么可以应用多个中间件 (<span class="notranslate">middlewares</span>)。您也可以将 <a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">中间件</a> 分配给一组路由。
</p>

<?= Code::fromFile('@views/docs/code/controller/middleware.example.php', false);  ?>

<p>
    <b><span class="notranslate">middleware()</span></b> 方法意味着中间件会在主路由处理程序之前执行。
    该方法有类似的 <span class="notranslate"><b>before()</b></span> 方法和 <span class="notranslate"><b>after()</b></span> 方法（在主处理程序之后运行）。
    这里的<i>主处理程序</i>是指路由返回的文本、分配的模板或控制器的执行。
</p>
<p>
    指定的中间件按声明的顺序执行。
</p>
<p>
    中间件方法的参数与控制器类似。第二个参数可以指定要执行的方法，默认是 <span class="notranslate">'index'</span>。
    不同之处在于第三个参数可以传递一个数组参数给 <span class="notranslate">middleware</span>。
    这些参数可以通过 Hleb\Static\Router::data() 方法或通过容器获取。
</p>

<?= Paragraph::h2('模块') ?>

<p>
    模块是一种控制器。它指向项目的 <span class="notranslate">/modules/</span> 目录，并包含所使用的 <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">模块</a> 名称。
</p>

<?= Code::fromFile('@views/docs/code/controller/module.example.php', false);  ?>

<?= Paragraph::h2('Where() 方法验证') ?>

<p>
    路由的 URL 中可以包含动态部分，可以使用 <span class="notranslate">where()</span> 方法为这些部分定义规则。
</p>

<?= Code::fromFile('@views/docs/code/routes/where.example.php', false);  ?>

<p>
    在此示例中，名为 <span class="notranslate">'lang'</span>、<span class="notranslate">'user'</span> 和 <span class="notranslate">'id'</span> 的部分将通过正则表达式进行验证。
</p>

<?= Paragraph::h2('域限制') ?>

<p>
    特殊方法 <span class="notranslate"><b>domain()</b></span> 可以分配给一个路由或一组路由。<br>
    第一个参数可以指定域名或子域名，第二个参数定义规则匹配的级别。
</p>

<?= Paragraph::h2('替换原则') ?>

<p>
    有一种方法可以根据动态 <span class="notranslate">URL</span> 的值来确定目标控制器和方法。<br>
    在这种情况下，路由可能如下所示：
</p>

<?= Code::fromFile('@views/docs/code/routes/parts.uri.php', false);  ?>

<p>
    在这个例子中，对于 <span class="notranslate">URL</span> <span class="notranslate">/page/part/first/</span>，框架将尝试将控制器确定为 <span class="notranslate">'MainPartController'</span> 和方法为 <span class="notranslate">'initFirst'</span>（按照<span class="notranslate">camelCase</span>原则转换）。
</p>

<p class="hl-danger-block">
    在处理程序中使用替换原则应谨慎管理，因为 <span class="notranslate">URL</span> 数据可能导致调用未预见的控制器或方法。
</p>

<p>
    此外，您可以通过使用键 <span class="notranslate">'[verb]'</span> 来指定对请求 <span class="notranslate">HTTP 方法</span> 的依赖。
</p>

<?= Code::fromFile('@views/docs/code/routes/part.param.php', false);  ?>

<p>
    在此示例中，对于 <span class="notranslate">URL</span> <span class="notranslate">/page/example/</span>，框架将尝试确定控制器为 <span class="notranslate">'MainExampleGetController'</span> 和方法为 <span class="notranslate">'getMethod'</span>（按照<span class="notranslate">camelCase</span>原则转换）。<br>
    对于 <span class="notranslate">POST</span> 方法，这些将是 <span class="notranslate">'MainExamplePostController'</span> 和 <span class="notranslate">'postMethod'</span>。
</p>
<p>

    替换的功能在根据控制器方法分配请求 <span class="notranslate">HTTP</span> 方法时特别有用。
</p>

<?= Paragraph::h2('更新路由缓存') ?>

<p>
    默认情况下，在 <span class="notranslate">/routes/map.php</span> 文件进行更改后，框架会自动更新路由缓存。
    还有一个命令行更新路由缓存的命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --routes-upd</p>

<p>
    对于高流量项目，您可能需要禁用 <span class="notranslate">production</span> 中的自动更新，并仅通过控制台命令重新计算路由缓存。<br>
    这可以通过在 <span class="notranslate">/config/common.php</span> 文件中配置 <span class="notranslate">'routes.auto-update'</span> 设置来实现。
</p>

<?= Link::previousPage('docs.2.0.start.hosting.page', '使用托管'); ?>

<?= Link::nextPage('docs.2.0.controller.controller.page', '控制器'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

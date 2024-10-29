<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('项目结构') ?>

    <p>
        <span class="notranslate">HLEB2</span>框架实现了特定的项目目录结构，从而维持了与开发者的协议，规定了在哪些目录中存储框架所需的设置和类。同时，它还允许开发者迅速理解基于<span
                class="notranslate">HLEB2</span>框架的新项目的文件夹结构。
    </p>
    <p>
        以下图示展示了安装框架后的新项目文件夹：
    </p>

    <div class="hl-text-block hl-dir-block notranslate">
        <span class="hl-nowrap"><span
                    class="hl-directory-dir">&#9724;</span> <b>app</b> &nbsp;&nbsp;- 应用代码文件夹<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Bootstrap</b> &nbsp;&nbsp;- 管理框架所需的类<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Events</b> &nbsp;&nbsp;- 针对特定事件的操作<br></span>

        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ControllerEvent.php</span> &nbsp;&nbsp;- 控制器初始化时<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">MiddlewareEvent.php</span>  &nbsp;&nbsp;- 中间件初始化时<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ModuleEvent.php</span> &nbsp;&nbsp;- 模块控制器调用时<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">PageEvent.php</span> &nbsp;&nbsp;- '页面'控制器调用时<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">TaskEvent.php</span> &nbsp;&nbsp;- 执行命令时<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Http</b><br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ErrorContent.php</span> &nbsp;&nbsp;- HTTP错误的内容<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">BaseContainer.php</span> &nbsp;&nbsp;- 容器类<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ContainerFactory.php</span> &nbsp;&nbsp;- 管理容器中的服务<br></span>

        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ContainerInterface.php</span> &nbsp;&nbsp;- 容器接口<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Commands</b> &nbsp;&nbsp;- 包含命令类的文件夹<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultTask.php</span> &nbsp;&nbsp;- 创建命令的空模板<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">RotateLogs.php</span> &nbsp;&nbsp;- 用于日志轮换的命令<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Controllers</b> &nbsp;&nbsp;- 控制器类文件夹<br></span>

        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultController.php</span> &nbsp;&nbsp;- 创建控制器的空模板<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Middlewares</b> &nbsp;&nbsp;- 中间件文件夹<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultMiddleware.php</span> &nbsp;&nbsp;- 创建中间件的空模板<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Models</b><br>

<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModel.php</span> &nbsp;&nbsp;- 创建模型的空模板<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>config</b> &nbsp;&nbsp;- 配置文件<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">common.php</span> &nbsp;&nbsp;- 通用设置<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span> &nbsp;&nbsp;- 数据库设置<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- 模块可重写的设置<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">system.php</span> &nbsp;&nbsp;- 系统设置<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>public</b> &nbsp;&nbsp;- 公共文件夹，需指向该目录的网络服务器<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>css</b> &nbsp;&nbsp;- 公共样式文件<br></span>

<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>images</b> &nbsp;&nbsp;- 公共图像文件<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>js</b> &nbsp;&nbsp;- 公共脚本文件<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">.htaccess</span> &nbsp;&nbsp;- 服务器配置<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
            class="hl-directory-file">favicon.ico</span><br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-point">index.php</span> &nbsp;&nbsp;- 网络服务器入口点<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
            class="hl-directory-file">robots.txt</span><br></span>
<span class="hl-directory-dir">&#9724;</span> <b>resources</b> &nbsp;&nbsp;- 项目自定义资源<br></span>

        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>views</b> &nbsp;&nbsp;- 视图文件（模板）<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">default.php</span> &nbsp;&nbsp;- 框架演示模板<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">error.php</span> &nbsp;&nbsp;- 错误页面模板<br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>routes</b> &nbsp;&nbsp;- 路由文件夹<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">map.php</span><br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>storage</b> &nbsp;&nbsp;- 储存文件夹，包含辅助文件<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>logs</b> &nbsp;&nbsp;- 日志文件夹<br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>vendor</b> &nbsp;&nbsp;- 已安装的库文件夹<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>phphleb</b> &nbsp;&nbsp;- 框架库文件夹<br></span>
        <span class="hl-nowrap"><span
                    class="hl-directory-file">.gitignore</span> &nbsp;&nbsp;- Git 文件可见性管理<br></span>
        <span class="hl-nowrap"><span
                    class="hl-directory-file">.hgignore</span> &nbsp;&nbsp;- Mercurial 文件可见性管理<br></span>
        <span class="hl-nowrap"><span
                    class="hl-directory-file">composer.json</span> &nbsp;&nbsp;- Composer 设置<br></span>
        <span class="hl-nowrap"><span
                    class="hl-directory-point">console</span> &nbsp;&nbsp;- 控制台命令入口点<br></span>
        <span class="hl-nowrap"><span class="hl-directory-file">readme.md</span> &nbsp;&nbsp;- 框架说明<br></span>
    </div>
    <p>
        图表中列出的文件是与框架一起安装的，属于其结构的一部分，但旨在由开发者进行修改和填充。
        此外，开发者可以根据此结构进一步开发项目，添加新的类、文件夹、库等。
    </p>
    <p>
        与之前版本的框架不同，现在有一个新的文件夹 <span class="notranslate">Bootstrap</span>，其中包含与核心框架过程相关的开发类。<br>
        通过这些类，框架的操作摆脱了不必要的抽象；以前，这些类是从配置中创建的，而现在开发者可以根据需要直接修改它们。
    </p>

<?= Paragraph::h1('app', true) ?>

    <p>
        <span class="notranslate">app</span> 文件夹用于基于框架的应用程序代码。
    </p>

<?= Paragraph::h2('Bootstrap') ?>

    <p>
        该目录包含用于创建容器和服务的类，以及作为可编辑类和框架本身部分的其他类。
    </p>

<?= Paragraph::h2('Events') ?>

    <p>
        包含负责处理框架请求处理过程中发生的特定事件的类。
    </p>

<?= Paragraph::h2('Http') ?>


    <p>
        包含类 <b>ErrorContent.php</b> 用于分配在 <span class="notranslate">HTTP</span> 错误时返回的自定义内容。
    </p>

<?= Paragraph::h2('Commands') ?>

    <p>
        这里是从控制台或直接从代码执行的命令。
        可以基于命令模板 <b>DefaultTask.php</b> 创建自定义命令。
        框架的内置命令则包含在框架代码中。
    </p>

<?= Paragraph::h2('Controllers') ?>

    <p>
        框架控制器的文件夹。创建控制器的模板是文件 <span class="notranslate"><b>DefaultController.php</b></span>。<br><br>
        控制器是 <span class="notranslate">MVC</span> 架构的一部分（对网页来说是 <span class="notranslate">Action-Domain-Responder</span>架构），负责进一步管理已经由路由器识别的请求处理，但不应包含业务逻辑。
    </p>

<?= Paragraph::h2('Middlewares') ?>

    <p>
        该目录用于中间件控制器，它在控制器之前或之后执行，该控制器在一个路由中只能使用一次。
    </p>

<?= Paragraph::h2('Models') ?>

    <p>
        文件夹用于模型类。<br>
        模型是 <span class="notranslate">MVC</span> 架构的另一部分（对网页来说是 <span class="notranslate">Action-Domain-Responder</span>架构），负责数据。
    </p>

<?= Paragraph::h1('config', true) ?>

    <p>
        配置由包含框架设置的 <span class="notranslate">PHP</span> 文件组成。
    </p>

<?= Paragraph::h1('public', true) ?>

    <p>
        公共目录。包含文件 <span class="notranslate"><b>index.php</b></span> 作为网络服务器的入口点。
    </p>

<?= Paragraph::h1('resources', true) ?>

    <p>
        用于存放各种辅助文件。<br>
        这里可以存放网页或邮件的模板，以及用于编译样式和脚本的源文件等。
    </p>

<?= Paragraph::h2('views') ?>

    <p>
        视图是 MVC 架构的一部分（对网页来说是 Action-Domain-Responder 架构）。
        这个文件夹用于网页模板。
        这里也可以存放 Twig 模板。
    </p>

<?= Paragraph::h1('routes', true) ?>

    <p>
        路由是任何网络框架的重要部分。
        这个文件夹包含文件 <span class="notranslate"><b>map.php</b></span>，其中存储着框架的路由图。
    </p>

<?= Paragraph::h1('storage', true) ?>

    <p>
        框架运行过程中生成的辅助文件。<br>
        对该文件夹的访问权限应允许网络服务器和开发者在终端中进行完全访问。
    </p>

<?= Paragraph::h2('logs') ?>

    <p>
        以标准化格式的日志和错误报告。
    </p>

<?= Paragraph::h1('console', true) ?>

    <p>
        这个没有扩展名的文件包含 <span class="notranslate">PHP</span> 代码并执行控制台命令。
        例如：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --version</p>

    <p>
        显示有关框架当前版本的信息。
    </p>

<?= Link::previousPage('docs.2.0.configuration.page', '框架配置'); ?>

<?= Link::nextPage('docs.2.0.start.php-server.page', '在 PHP 服务器上运行'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer');

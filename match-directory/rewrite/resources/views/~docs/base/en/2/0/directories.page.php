<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Project Structure') ?>

    <p>
        The <span class="notranslate">HLEB2</span> framework implements a specific project directory structure, thus
        maintaining an agreement with the developer on which directories to store settings and classes necessary for the
        framework. It also allows developers to quickly understand the folder structure in a new project based on the
        <span class="notranslate">HLEB2</span> framework.
    </p>
    <p>
        The following diagram shows the folders of a new project after installing the framework:
    </p>

    <div class="hl-text-block hl-dir-block notranslate">
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>app</b> &nbsp;&nbsp;- application code folder<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Bootstrap</b> &nbsp;&nbsp;- classes essential for managing the framework<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Events</b> &nbsp;&nbsp;- actions for specific events<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ControllerEvent.php</span> &nbsp;&nbsp;- on controller initialization<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">MiddlewareEvent.php</span>  &nbsp;&nbsp;- on middleware initialization<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ModuleEvent.php</span> &nbsp;&nbsp;- on module controller call<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">PageEvent.php</span> &nbsp;&nbsp;- on 'page' controller call<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">TaskEvent.php</span> &nbsp;&nbsp;- when executing a command<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>Http</b><br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ErrorContent.php</span> &nbsp;&nbsp;- content for HTTP errors<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">BaseContainer.php</span> &nbsp;&nbsp;- container class<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ContainerFactory.php</span> &nbsp;&nbsp;- managing services in the container<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">ContainerInterface.php</span> &nbsp;&nbsp;- container interface<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Commands</b> &nbsp;&nbsp;- folder with command classes<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultTask.php</span> &nbsp;&nbsp;- empty template for creating a command<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">RotateLogs.php</span> &nbsp;&nbsp;- command for log rotation<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Controllers</b> &nbsp;&nbsp;- folder for controller classes<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultController.php</span> &nbsp;&nbsp;- empty template for creating a controller<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Middlewares</b> &nbsp;&nbsp;- folder for middleware<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&vdash;<span
                    class="hl-directory-file">DefaultMiddleware.php</span> &nbsp;&nbsp;- empty template for creating middleware<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>Models</b><br>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModel.php</span> &nbsp;&nbsp;- empty template for creating a model<br></span>
<span class="hl-nowrap"><span
            class="hl-directory-dir">&#9724;</span> <b>config</b> &nbsp;&nbsp;- configuration files<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">common.php</span> &nbsp;&nbsp;- common settings<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span> &nbsp;&nbsp;- database settings<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- module-overridable settings<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">system.php</span> &nbsp;&nbsp;- system settings<br></span>
<span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>public</b> &nbsp;&nbsp;- public folder, where the web server should be pointed<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>css</b> &nbsp;&nbsp;- public style files<br></span>

<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>images</b> &nbsp;&nbsp;- public image files<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>js</b> &nbsp;&nbsp;- public script files<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">.htaccess</span> &nbsp;&nbsp;- server configuration<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
            class="hl-directory-file">favicon.ico</span><br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-point">index.php</span> &nbsp;&nbsp;- web server entry point<br></span>
<span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span
            class="hl-directory-file">robots.txt</span><br></span>
<span class="hl-directory-dir">&#9724;</span> <b>resources</b> &nbsp;&nbsp;- custom project resources<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>views</b> &nbsp;&nbsp;- view files (templates)<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">default.php</span> &nbsp;&nbsp;- framework demo template<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">error.php</span> &nbsp;&nbsp;- error page template<br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>routes</b> &nbsp;&nbsp;- folder with route files<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">map.php</span><br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>storage</b> &nbsp;&nbsp;- storage folder, contains auxiliary files<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>logs</b> &nbsp;&nbsp;- folder with log files<br></span>
        <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>vendor</b> &nbsp;&nbsp;- folder with installed libraries<br></span>
        <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>phphleb</b> &nbsp;&nbsp;- folder with framework libraries<br></span>
        <span class="hl-nowrap"><span class="hl-directory-file">.gitignore</span> &nbsp;&nbsp;- Git visibility management for files<br></span>
        <span class="hl-nowrap"><span class="hl-directory-file">.hgignore</span> &nbsp;&nbsp;- Mercurial visibility management for files<br></span>
        <span class="hl-nowrap"><span class="hl-directory-file">composer.json</span> &nbsp;&nbsp;- Composer settings<br></span>
        <span class="hl-nowrap"><span class="hl-directory-point">console</span> &nbsp;&nbsp;- entry point for console commands<br></span>
        <span class="hl-nowrap"><span class="hl-directory-file">readme.md</span> &nbsp;&nbsp;- framework description<br></span>
    </div>
    <p>
        The files listed in the diagram are installed with the framework and are part of its structure, but are intended
        for modifications and filling by the developer.
        In addition to this, the developer can further develop the project according to this structure by adding new
        classes, folders, libraries, and more.
    </p>
    <p>
        Unlike the previous version of the framework, there is now a new folder <span
                class="notranslate">Bootstrap</span>, which contains development classes that are tied to the core
        framework processes.<br>
        With these classes, the framework's operation is freed from unnecessary abstractions; previously, these classes
        were created from configuration, but now the developer can modify them directly at their discretion.
    </p>

<?= Paragraph::h1('app', true) ?>

    <p>
        The <span class="notranslate">app</span> folder is intended for the application code that is based on the
        framework.
    </p>

<?= Paragraph::h2('Bootstrap') ?>

    <p>
        This directory contains classes for creating containers and services, as well as others that serve as both
        editable classes and parts of the framework itself.
    </p>

<?= Paragraph::h2('Events') ?>

    <p>
        Contains classes responsible for handling specific events that occur during the processing of requests by the
        framework.
    </p>

<?= Paragraph::h2('Http') ?>

    <p>
        Includes the class <b>ErrorContent.php</b> for assigning custom content returned during <span
                class="notranslate">HTTP</span> errors.
    </p>

<?= Paragraph::h2('Commands') ?>

    <p>
        Here are commands to execute from the console or directly from the code.
        You can create custom commands based on the <b>DefaultTask.php</b> command template.
        The built-in framework commands are contained within the framework's code.
    </p>

<?= Paragraph::h2('Controllers') ?>

    <p>
        Folder for framework controllers. The template for creating a controller is the file <span
                class="notranslate"><b>DefaultController.php</b></span>.<br><br>
        The controller is a part of the <span class="notranslate">MVC</span> architecture (<span class="notranslate">Action-Domain-Responder</span>
        for web), responsible for further managing the request processing that has already been identified by the
        router, but should not contain business logic.
    </p>

<?= Paragraph::h2('Middlewares') ?>

    <p>
        This directory is intended for middleware controllers, executed before or after a controller, which can be used
        only once in a route.
    </p>

<?= Paragraph::h2('Models') ?>

    <p>
        The folder is intended for Model classes.<br>
        The model is another part of the <span class="notranslate">MVC</span> architecture (<span class="notranslate">Action-Domain-Responder</span>
        for web), responsible for data.
    </p>

<?= Paragraph::h1('config', true) ?>

    <p>
        Configuration consists of <span class="notranslate">PHP</span> files containing the framework's settings.
    </p>

<?= Paragraph::h1('public', true) ?>

    <p>
        Public directory. Contains the file <span class="notranslate"><b>index.php</b></span> as the entry point for the
        web server.
    </p>

<?= Paragraph::h1('resources', true) ?>

    <p>
        Intended for various auxiliary files.<br>
        This can include templates for pages or emails, as well as sources for compiling styles and scripts, etc.
    </p>

<?= Paragraph::h2('views') ?>

    <p>
        The view is a part of the MVC architecture (Action-Domain-Responder for web).
        This folder is intended for web page templates.
        Twig templates can also be stored here.
    </p>

<?= Paragraph::h1('routes', true) ?>

    <p>
        Routing is an important part of any web framework.
        This folder contains the file <span class="notranslate"><b>map.php</b></span>, which holds the routing map of
        the framework.
    </p>

<?= Paragraph::h1('storage', true) ?>

    <p>
        Auxiliary files generated during the framework's operation.<br>
        Access permissions to this folder should allow full access for both the web server and a developer for terminal
        work.
    </p>

<?= Paragraph::h2('logs') ?>

    <p>
        Logs and error reports in a standardized format.
    </p>

<?= Paragraph::h1('console', true) ?>

    <p>
        This file without an extension contains <span class="notranslate">PHP</span> code and executes console commands.
        For example:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --version</p>

    <p>
        Displays information about the current version of the framework.
    </p>

<?= Link::previousPage('docs.2.0.configuration.page', 'Framework Configuration'); ?>

<?= Link::nextPage('docs.2.0.start.php-server.page', 'Running on PHP Server'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer');

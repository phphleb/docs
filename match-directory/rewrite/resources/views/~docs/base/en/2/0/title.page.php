<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Documentation') ?><br>

<?= Paragraph::h2('Foreword') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.introduction.page'); ?>">Introduction</a></b>.
    A preface for studying the HLEB2 framework.
</p>

<?= Paragraph::h2('Installation and Setup') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.installation.page'); ?>">Project Installation</a></b>.
    Methods for deploying the project.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.tuning.page'); ?>">Framework Configuration</a></b>.
    Basic configuration settings for the framework.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.configuration.page'); ?>">Configuration Parameters</a></b>.
    Main global settings.
</p>

<?= Paragraph::h2('Project Structure') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.directories.page'); ?>">Project Structure</a></b>.
    An overview of the project's directories.
</p>

<?= Paragraph::h2('Running the Application') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.start.php-server.page'); ?>">PHP Server</a></b>.
    The built-in PHP server.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.nginx.page'); ?>">Nginx</a></b>.
    Using the popular web server.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.apache.page'); ?>">Apache</a></b>.
    A time-tested HTTP server.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>">RoadRunner</a></b>.
    An asynchronous web server in Go.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.workerman.page'); ?>">Workerman</a></b>.
    An asynchronous web server in PHP.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.swoole.page'); ?>">Swoole</a></b>.
    An asynchronous server as a PHP extension.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.hosting.page'); ?>">Hosting</a></b>.
    Specifics of installing on hosting environments.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.webrotor.page'); ?>">WebRotor</a></b>.
    Asynchrony for shared hosting.
</p>


<?= Paragraph::h2('Routing') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.routes.page'); ?>">Routing</a></b>.
    Handlers for page address routes.
</p>

<?= Paragraph::h2('Controllers') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">Controller</a></b>.
    A standard class for route handling.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">Module</a></b>.
    An isolated part of the project.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">Middleware</a></b>.
    An auxiliary class for handling requests.
</p>

<?= Paragraph::h2('Models') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.models.page'); ?>">Model</a></b>.
    The MVC component responsible for data.
</p>

<?= Paragraph::h2('Templates') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">Standard Templates</a></b>.
    Data structures returned.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.cached.page'); ?>">Cached Templates</a></b>.
    Utilizing template caching.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.twig.page'); ?>">TWIG Template Engine</a></b>.
    An alternative templating engine for the framework.
</p>

<?= Paragraph::h2('Console Commands') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.console.command.page'); ?>">Console Commands</a></b>.
    Tasks to run from the terminal.
</p>

<?= Paragraph::h2('Container') ?>


<p>
    <b><a href="<?= Link::url('docs.2.0.container.container.page'); ?>">Container Structure</a></b>.
    Accessing services.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.get.page'); ?>">Getting a Service</a></b>.
    Ways to utilize the container.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.di.page'); ?>">Dependency Injection</a></b>.
    DI implementation within the framework.
</p>

<?= Paragraph::h2('Services') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.service.request.page'); ?>">Request</a></b>.
    An object for managing request data.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.response.page'); ?>">Response</a></b>.
    Formulating return data.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.cache.page'); ?>">Cache</a></b>.
    File-based data caching.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.log.page'); ?>">Log</a></b>.
    A universal logging mechanism.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.path.page'); ?>">Path</a></b>.
    A manager for relative paths.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.db.page'); ?>">DB</a></b>.
    A basic wrapper over PHP PDO.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.session.page'); ?>">Session</a></b>.
    Convenient handling of HTTP sessions.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.cookies.page'); ?>">Cookies</a></b>.
    Receiving and sending cookies.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.redirect.page'); ?>">Redirect</a></b>.
    Redirecting to another page.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.router.page'); ?>">Router</a></b>.
    Interacting with routing data.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.settings.page'); ?>">Settings</a></b>.
    Various framework settings.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.csrf.page'); ?>">Csrf</a></b>.
    Cross-site request forgery protection.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.converter.page'); ?>">Converter</a></b>.
    Conversion to PSR standards.
</p>

<?= Paragraph::h2('Events') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.events.page'); ?>">Events</a></b>.
    Supporting the execution of actions.
</p>

<?= Paragraph::h1('Additional') ?>

<p>
    Special features of the framework that can be useful in certain cases.
</p>


<?= Paragraph::h2('Console Commands') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.name.page'); ?>">Custom Command Names</a></b>,
    including shortcuts.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">Customizable Command Parameters</a></b>.
    Named arguments.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">MVC Template Console Generation</a></b>
    (Model-View-Controller).
</p>

<?= Paragraph::h2('Asynchronous') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.async.async.interface.page'); ?>">Resetting State</a></b>
    for asynchronous requests.
</p>

<?= Paragraph::h2('Container and Services') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">Adding a Service to the Container</a></b>.
    On a real example.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">Overriding a Standard Service</a></b>
    or removing it.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.prof.page'); ?>">Custom
            usage</a></b> of the container. More complex examples.
</p>

<?= Paragraph::h2('Web Console') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web Console</a></b>.
    A secured HTTP terminal.
</p>

<?= Paragraph::h2('Testing') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.testing.page'); ?>">Testing</a></b>
    framework-based software structures.
</p>

<?= Paragraph::h2('Extensions') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.hlogin.page'); ?>">HLOGIN - Registration Module</a></b>
    and authentication.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.adminpan.page'); ?>">Administrative Panel Module</a></b>
    or public site.
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.api.page'); ?>">Traits for API Creation</a></b>.
    Pagination and validator.
</p>

<?= Paragraph::h2('Functions') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.functions.page'); ?>">Built-in functions</a></b>
    of the framework.
</p>

<?= Paragraph::h2('Project Information') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.about.page'); ?>">Project Information</a></b>
    as an afterword.
</p>


<br><br>


<?php insertTemplate('/docs/en/footer') ?>;

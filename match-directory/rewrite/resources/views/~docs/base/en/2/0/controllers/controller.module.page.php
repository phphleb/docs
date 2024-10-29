<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Module') ?>
<p>
    The modular approach in software architecture allows you to logically divide a project into large composite fragments (modules).
    A defining feature of a module is its self-sufficiency; in some sense, it’s a form of dividing a monolithic application into "microservices".<br>
    The key difference from microservices is that modules must exchange data through predefined contracts, which replace <span class="notranslate">HTTP API</span> (or message brokers), and they also share a common folder for routes, services, and external libraries from the <span class="notranslate">/vendor/</span> directory.
    It is recommended to design contracts in a way that would allow extracting a module into a full-fledged microservice if needed.
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, a Module is essentially an <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> for web) in miniature.
    The module has its own controller, its own folder for templates, and even its own configuration is permissible, all of which are located within the module’s folder.
    Its own logic is also assumed (as well as Models), but for this, it is recommended to create a separate structure in the project’s <span class="notranslate">/app/</span> folder or within the module itself.
</p>
<p>
    When using the approach of full autonomy of parts in the project, which is the essence of modular development, you may not use controllers, middleware, or models from <span class="notranslate">/app/</span> at all, implementing everything within the modules.
</p>
<p>
    The role of a module’s controller in the route differs from a regular controller in that the method is named <span class="notranslate">'module'</span> instead of <span class="notranslate">'controller'</span>, and it contains an additional initial argument with the module’s name.
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.route.php', false);  ?>

<p class="hl-info-block">
    The module’s controller must inherit from <span class="notranslate">Hleb\Base\Module</span>.
</p>
<p class="hl-info-block">
    For the <span class="notranslate">Composer</span> class loader to generate the class map for modules, add the module folder name (<span class="notranslate">"modules/"</span>) to the <span class="notranslate">"autoload" > "classmap"</span> section of the <span class="notranslate"><b>/composer.json</b></span> file.
</p>

<?= Paragraph::h2('Creating a Module') ?>

<p>
    A simple way to create the basic structure of a module using a console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module example</p>

<p>
    This command will create a new module template in the <span class="notranslate">/modules/example/</span> directory of the project.
    You can use another suitable name for the module, consisting of lowercase Latin letters, numbers, dashes, and the '/' symbol (indicating nesting).
    There is an option to <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">override</a> the original module files used during generation.
</p>
<p>
    Structure of the module after creation (if there was no <span class="notranslate">modules</span> folder previously, the console command will create it in the project root):
</p>
<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b> &nbsp;&nbsp;- directory for modules<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>example</b> &nbsp;&nbsp;- example module folder<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- module settings<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModuleController.php</span> &nbsp;&nbsp;- module controller<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">example.php</span> &nbsp;&nbsp;- module template<br></span>
</div>

<p>
    The main.php file can contain settings similar to the <span class="notranslate">/config/main.php</span> file but with values used only in the module, meaning it will "override" them.
    Initially, the main.php file contains no settings; all settings from <span class="notranslate">/config/main.php</span> are used.<br>
    Similarly, settings in the <span class="notranslate">/config/database.php</span> can be replaced by creating a file with the same name.
    Settings of other configuration files always act globally.
</p>

<p>
    The module controller is similar to the standard controller of the framework.
    When using the <span class="notranslate">view()</span> function, the path to the template will point to the module's <span class="notranslate">'views'</span> folder, as it does for all built-in framework functions for template work.
</p>

<?= Paragraph::h2('Nested Modules') ?>

<p>
    There is an option to group modules into collections nested in different subfolders within <span class="notranslate">/modules/</span>.
    For this, modules are placed one level down, and the module name includes the group name.
    This creates a <i>second level</i> of module nesting.
</p>
<p>
    Let's assume we need to place a module group named <span class="notranslate">'main-product'</span>, which will contain the modules <span class="notranslate">'first-feature'</span> and <span class="notranslate">'second-feature'</span>.
</p>

<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b><br></span>
    <span class="hl-nowrap">&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>main-product</b> - module group<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>first-feature</b> &nbsp;&nbsp;- first-feature module folder<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleGetController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModulePostController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>second-feature</b> &nbsp;&nbsp;- second-feature module folder<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>middlewares</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleMiddleware.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
</div>

<p>
    This is how it will look in the route map:
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.group.route.php', false);  ?>

<p>
    In the group named <span class="notranslate">'first-feature'</span>, there is a reassignment of settings, including for databases.<br>
    The example for <span class="notranslate">'second-feature'</span> uses global settings, additionally, it has <span class="notranslate">middleware</span> for the controller.
    It is possible that more controllers may appear there.
</p>

<p class="hl-info-block">
    Similarly, a structure is created for the third level of nesting if it is necessary.
</p>

<?= Paragraph::h2('Folder Name with Modules') ?>

<p>
    Initially, the folder with modules is called <span class="notranslate">'modules'</span>; before creating modules, you can change this name in the settings, for example, to <span class="notranslate">'products'</span>.<br>
    This is done in the file <span class="notranslate">/config/system.php</span> - setting <span class="notranslate">'module.dir.name'</span>.
    If the change is made with already existing module classes, you need to correct the <span class="notranslate">namespace</span> for modules that are PSR-0 compliant.
</p>

<?= Paragraph::h2('Overriding Settings') ?>

<p>
    In a module, two configuration files can be overridden - <span class="notranslate">/config/main.php</span> and <span class="notranslate">/config/database.php</span>.<br>
    The values of the parameters are overridden recursively by key; otherwise, the parameter has a global value. New parameters that have no global counterpart will be available locally within the module.
</p>

<?= Paragraph::h2('Paths to Templates in Modules') ?>

<p>
    When using modules as separate packages, it is not always necessary for the package to include <span class="notranslate">View</span> templates, as styling and result output may be a separate layer in the application structure.<br>
    Therefore, there can be two options for using templates.
    "Using" refers to pointers to templates in the function <span class="notranslate">view()</span> as well as in special functions like <span class="notranslate">insertTemplate()</span>.
</p>
<p>
    If the module has a folder <span class="notranslate">/views/</span>, template paths will point to it.<br>
    However, if there is no such folder, the template search will occur in the project's <span class="notranslate">/resources/views/</span> directory.
</p>

<?= Link::previousPage('docs.2.0.controller.controller.page', 'Controller'); ?>

<?= Link::nextPage('docs.2.0.controller.middleware.page', 'Middleware'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


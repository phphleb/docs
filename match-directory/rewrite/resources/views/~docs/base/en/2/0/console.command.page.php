<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Console Commands') ?>

<p>
    The framework <span class="notranslate">HLEB2</span> includes both built-in console commands and the capability for developers using the framework to create their own.
</p>
<p>
    Console commands are executed from the terminal or task scheduler, and their entry point is the <span class="notranslate">'console'</span> file located in the project root, which is a regular <span class="notranslate">PHP</span> file.
</p>

<?= Paragraph::h2('Standard Commands') ?>
<p>
    You can get the list of framework commands by running the console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --help</p>

<pre class="hl-text-block">
--version or -v                                 (displays the current version of the framework)
--info or -i [name]                             (shows current settings from common)
--help or -h                                    (displays the default list of commands)
--ping                                          (service check, returns predefined value)
--logs or -lg                                   (outputs the last lines from log files)
--list or -l                                    (displays the list of added commands)
--routes or -r                                  (formatted list of routes)
--find-route (or -fr) &lt;url&gt; [method] [domain]   (route search by URL)
--route-info (or -ri) &lt;url&gt; [method] [domain]   (route info by URL)
--clear-routes-cache or -cr                     (removes route cache)
--update-routes-cache or --routes-upd or -u     (updates route cache)
--clear-cache or -cc                            (clears framework cache)
--add &lt;task|controller|middleware|model&gt; &lt;name&gt; [desc]   (creates a class)
--create module &lt;name&gt;                          (creates module files)
--clear-cache--twig or -cc-twig                 (clears cache for Twig template engine)

&lt;command&gt; --help                                (displays command help)
</pre>

<?= Paragraph::h2('Creating Your Own Console Command') ?>

<p>
    Example of adding your own console command by creating the corresponding class in the <span class="notranslate">/app/Commands/Demo/</span> folder:
</p>

<?= Code::fromFile('@views/docs/code/task/default.task.class.php');  ?>

<p>
    Or through the built-in console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task "task description"</p>

<p>
    A file <span class="notranslate">/app/Commands/Demo/ExampleTask.php</span> will be created.
    If necessary, you can <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">modify the default template</a> for generating tasks.
</p>
<p class="hl-info-block">
    In the framework, the command name consists of the class name (relative path) located in the <span class="notranslate">/app/Commands/</span> folder.
    Therefore, it is recommended to initially give significant names to commands that reflect the essence of their action.
</p>
<p>
    Now you can run the new command from the console, and it will also appear in the general list of commands.<br>
    But since there is no output result yet, add the <span class="notranslate">--help</span> parameter to get information about the command.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task --help</p>

<?= Paragraph::h2('Passing Parameters with a Command') ?>

<p>
    Modify the command class so that the <span class="notranslate">run()</span> method accepts arguments.
</p>

<?= Code::fromFile('@views/docs/code/task/args.task.class.php'); ?>

<p class="hl-info-block">
    The return value <span class="notranslate">self::SUCCESS_CODE</span> in the command class indicates that the command completed successfully.
    If commands in the console or task scheduler are chained with <span class="notranslate">&&</span>, execution will stop if <span class="notranslate">self::ERROR_CODE</span> is returned.
    This can also be useful in complex cases like <span class="notranslate">CI/CD</span>.
</p>

<p>
    Next, run the command with two arguments to get the output <span class="notranslate">'speed and quality'</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task speed quality</p>

<p>
    For specific cases, the framework allows creating <a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">named parameters</a> for commands.
</p>

<?= Paragraph::h2('Executing a Command from Code') ?>

<p>
    You can execute the created command from within application code or from another console command.
</p>

<?= Code::fromFile('@views/docs/code/task/execute.task.class.php', false); ?>

<p>
    However, in this case, the command’s output will not be displayed since its purpose has changed.<br>
    To retrieve the command’s result, use the <span class="notranslate">$this->setResult()</span> method within the class to set the data, and then access this data externally via the <span class="notranslate">getResult()</span> method.
</p>

<?= Code::fromFile('@views/docs/code/task/result.task.class.php', false); ?>

<?= Paragraph::h2('Specifying Text Color in the Terminal') ?>

<p>
    To output text or a portion of it in one of the basic terminal colors, use the specially designated <span class="notranslate">color()</span> method in the command.<br>
    For example:
</p>

<?= Code::fromFile('@views/docs/code/task/color.task.example.php'); ?>


<?= Paragraph::h2('Setting Command Restrictions with Attributes') ?>

<p>
    The type and intended use of created commands can be controlled using <span class="notranslate">PHP</span> attributes.
</p>
<p>
    The attribute <span class="notranslate"><b>#[Purpose]</b></span> is used to define the command’s visibility scope.
</p>

<?= Code::fromFile('@views/docs/code/attribute/purpose.task.php'); ?>

<p>
    This attribute has a <span class="notranslate">status</span> argument, where you can specify options:<br>
    <span class="notranslate">Purpose::FULL</span> - unrestricted, the default value.<br>
    <span class="notranslate">Purpose::CONSOLE</span> - can only be used as a console command.<br>
    <span class="notranslate">Purpose::EXTERNAL</span> - used only in code, not listed in command list.<br>
</p>
<p>
    The <span class="notranslate"><b>#[Disabled]</b></span> attribute for a command class disables the command.
</p>
<p>
    The <span class="notranslate"><b>#[Hidden]</b></span> attribute for a command class hides it from the console command list.
</p>

<?= Link::previousPage('docs.2.0.template.twig.page', 'Template Engine TWIG'); ?>

<?= Link::nextPage('docs.2.0.container.container.page', 'Container'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

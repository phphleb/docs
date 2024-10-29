<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Model') ?>

<p>
    Model is a component of the architectural pattern <span class="notranslate">MVC</span><br>
    (<span class="notranslate">Action-Domain-Responder</span> for the web).
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, the Model is represented by a template that has static access methods.
    The Model can provide access to a certain dataset, usually a connected DBMS (Database Management System).
</p>
<p>
    The provided template can be used by the developer in their own way.
    It can use the built-in wrapper over <span class="notranslate">PDO</span> (class <span class="notranslate">Hleb\Static\DB</span>) or be replaced by your own template, for example, by connecting one of the existing <span class="notranslate">ORM</span>.
</p>

<?= Paragraph::h2('Creating a Template') ?>

<p>
    Apart from copying and modifying the demonstration file <span class="notranslate">DefaultModel.php</span>, there is another simple way to create the required class using a console command.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add model ExampleModel</p>

<p>
    This command will create a new template <span class="notranslate">/app/Models/ExampleModel.php.</span><br>
    You can use another suitable name for the class.<br>
    The <span class="notranslate">HLEB2</span> framework also allows you to create a <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">custom template</a> by default for this command.
</p>

<?= Link::previousPage('docs.2.0.controller.middleware.page', 'Middleware'); ?>

<?= Link::nextPage('docs.2.0.template.standard.page', 'Templates'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

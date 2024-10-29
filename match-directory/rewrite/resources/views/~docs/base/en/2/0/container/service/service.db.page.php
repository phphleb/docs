<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('DB Service — Using Databases') ?>

<p>
    The <span class="notranslate"><b>DB</b></span> service provides the initial capability to send queries to databases. Using a wrapper over <span class="notranslate">PDO</span> and the database configuration of the <span class="notranslate">HLEB2</span> framework, the service offers simple methods to interact with various databases (supported by <span class="notranslate">PDO</span>).
</p>

<p class="hl-info-block">
    The <span class="notranslate">PHP PDO</span> extension and necessary database <a href="https://www.php.net/manual/en/pdo.installation.php" rel="nofollow" target="_blank">drivers</a> must be enabled for this service to work.
</p>

<p>
    To use a different connection method, such as <span class="notranslate">ORM(Object-Relational Mapping)</span>, add the instantiation of the chosen <span class="notranslate">ORM</span> as a service container using the framework's configuration settings.
</p>
<P>
    According to the project's structure provided with the <span class="notranslate">HLEB2</span> framework, the <span class="notranslate">DB</span> service can only be used in Model classes.<br>
    A Model class (whose template can be created using a console command) acts as a basic framework for use within <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> for web).
    It can be adapted or replaced according to preference for the selected <span class="notranslate">AR(Active Record)</span> or <span class="notranslate">ORM</span> library (and then adjust the template for the console command).
</P>
<p>
    Examples of usage in a Model for database queries:
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.container.php');  ?>

<p>
    The following methods of the <span class="notranslate">DB</span> service are used for executing database queries.
</p>

<?= Paragraph::h2('dbQuery()') ?>

<p>
    The <span class="notranslate"><b>dbQuery()</b></span> method was used in the examples above for creating direct <span class="notranslate">SQL</span> queries to the database.
    The query and query parameters are not separated in it, so every suspicious parameter, especially those coming from a <span class="notranslate">Request</span>, must be handled (with proper escaping) using the special <span class="notranslate"><b>quote()</b></span> method.
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.query.php', false);  ?>

<p class="hl-danger-block">
    Escaping query parameters ensures protection against <span class="notranslate">SQL</span> injection.
    Such attacks are based on injecting arbitrary <span class="notranslate">SQL</span> expressions as part of external data.
</p>

<p>
    Another method of the <span class="notranslate">DB</span> service is more versatile and simplifies parameter handling.
</p>

<?= Paragraph::h2('run()') ?>
<p>
    When successfully executed, the <span class="notranslate"><b>run()</b></span> method returns an initialized <span class="notranslate">PDOStatement</span> object.
    All methods of this object, such as <span class="notranslate">fetch()</span> and <span class="notranslate">fetchColumn()</span>, are standard for <span class="notranslate">PDO</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.run.php', false);  ?>

<p>
    The capabilities of <span class="notranslate">PDOStatement</span> are described in the <a href="https://www.php.net/manual/en/class.pdostatement.php" target="_blank" rel="nofollow">PDO documentation</a>.
</p>

<?= Paragraph::h2('Asynchronous Queries') ?>

<p>
    For asynchronous queries, using this service is similar and depends on the configuration of the web server in use.
</p>
<p>
    Additionally, some <span class="notranslate">ORM</span>s are adapted to support this mode of operation.
</p>
<p>
    One such library, as indicated in its documentation, is <span class="notranslate"><span class="hl-nowrap"><a href="https://github.com/cycle/orm" target="_blank" rel="nofollow">Cycle ORM</a></span></span>.
</p>

<?= Link::previousPage('docs.2.0.service.path.page', 'Path'); ?>

<?= Link::nextPage('docs.2.0.service.session.page', 'Sessions'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

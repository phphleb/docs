<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Sessions') ?>

<p>
    The user session mechanism in the <span class="notranslate">HLEB2</span> framework is provided by the <span class="notranslate"><b>Session</b></span> service — a simple wrapper around PHP's session management functions.
</p>
<p>
    Examples of using <span class="notranslate">Session</span> in controllers (and all classes inheriting from <span class="notranslate">Hleb\Base\Container</span>), such as retrieving a value from a session:
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.container.php', false);  ?>

<p>
    Example of accessing a session in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.static.php', false);  ?>

<p>
    The <span class="notranslate">Session</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Session</span> interface.
</p>

<p>
    To simplify examples, the following will only include access through <span class="notranslate">Hleb\Static\Session</span>.
</p>

<p class="hl-info-block">
    In the standard Session service implementation, methods appropriately use the global $_SESSION variable.
</p>

<?= Paragraph::h2('get()') ?>

<p>
    The get() method retrieves session data by parameter name.
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.get.php', false);  ?>

<?= Paragraph::h2('set()') ?>

<p>
    The set() method allows assigning session data by name.
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.set.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    The delete() method removes session data by name.
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    The clear() method removes all session data.
</p>

<?= Paragraph::h2('all()') ?>

<p>
    The all() method returns an array with all session data.
</p>

<?= Paragraph::h2('getSessionId()') ?>

<p>
    The getSessionId() method returns the current session identifier.<br>
    The session identifier can be modified in the 'session.name' configuration setting in the /config/system.php file, and is initially set to 'PHPSESSID'.
</p>

<?= Paragraph::h2('Asynchronous Mode') ?>

<p>
    In asynchronous use of the framework, the methods of the Session service function similarly, but a different mechanism for setting and reading them is used.
</p>

<?= Link::previousPage('docs.2.0.service.db.page', 'DB'); ?>

<?= Link::nextPage('docs.2.0.service.cookies.page', 'Cookies'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

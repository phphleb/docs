<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Logging Service') ?>
<p>
    The <b>Log</b> service is a logging mechanism in the <span class="notranslate">HLEB2</span> framework that allows storing errors and messages in a dedicated log storage.
    The principle of log retention in the framework is based on <span class="notranslate">PSR-3</span>.
</p>
<p>
    By default, the framework uses a built-in logging mechanism that saves logs to a file.
    All <span class="notranslate">PHP</span> errors and the operation of the application itself are logged, as well as informational and debug logs specified by the developer in the code.
</p>

<p class="hl-info-block">
    The framework's standard file logs are stored in the project's <span class="notranslate">/storage/logs/</span> folder.
</p>

<p>
    Ways to use <span class="notranslate">Log</span> in controllers (and all classes inherited from <span class="notranslate">Hleb\Base\Container</span>) are exemplified by adding an informational message:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.container.php', false); ?>

<p>
    Example of logging in application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.static.php', false); ?>

<p>
    The <span class="notranslate">Log</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Log</span> interface.
</p>

<p>
    For simplicity, examples hereafter will only use the function <span class="notranslate">logger()</span>.
</p>
<p>
    Executing one of the previous examples will create a log file in the <span class="notranslate">/storage/logs/</span> directory (if it did not exist previously) with a line added similar to this:
</p>

<div class="hl-text-block notranslate">
    <div class="hl-nowrap">[13:01:12.211556 10.01.2024 UTC+03] Web:INFO Sample message {/path/to/project/app/Controllers/TestController.php on line 31} {App\Controllers\TestController->get()} GET http://example-domain.ru/test-log 127.0.0.1 #{"request-id":"71cc0539-af41-556d-9c48-2a6cd2d8090f","debug":true}</div>
</div>

<p>
    The log text shows that a message <span class="notranslate">'Sample message'</span> was output with a specified level <span class="notranslate">'INFO'</span>, along with additional information about the log call, precise time, and basic request data.
</p>

<p class="hl-info-block">
    Confidential information and data within logs, whose disclosure could lead to security breaches of the project, are not recommended to be sent to third-party services for log storage as they can be susceptible to hacking.
</p>


<?= Paragraph::h2('Logging Levels') ?>

<p>
    When choosing a logging level, you should be guided by the content and importance of the data being output.
    The list from ordinary messages to critical errors in ascending order:
</p>
<p>
    <span class="notranslate"><b>debug()</b></span> - debug messages, usually used only during project development.
    By default, the framework settings have a maximum level set below (<span class="notranslate">info</span>), and these messages will not be saved to the log.
</p>
<p>
    <span class="notranslate"><b>info()</b></span> - informational messages that are necessary to understand how a particular part of the code functions and if all conditions are met.
    Here you can output a specific SQL query so you can later verify its correct execution.
</p>
<p>
    <span class="notranslate"><b>notice()</b></span> - notifications about events in the system.
    For example, it can signal an approach to a critical threshold of some important value that has not yet been reached.
</p>
<p>
    <span class="notranslate"><b>warning()</b></span> - for logging exceptional cases, not as critical errors, but as warnings.
    For example, the use of deprecated <span class="notranslate">APIs</span>, misuse of <span class="notranslate">APIs</span>, and other undesirable cases.
</p>
<p>
    <span class="notranslate"><b>error()</b></span> - runtime errors occurring under certain conditions.
    These errors do not require immediate action but should be registered and monitored.
</p>
<p>
    <span class="notranslate"><b>critical()</b></span> - critical errors in the program, such as the unavailability of one of the components.
</p>
<p>
    <span class="notranslate"><b>alert()</b></span> - general system unavailability, which could be a database failure, entire website downtime, etc.
    Actions to resolve this should be taken immediately.
</p>
<p>
    <span class="notranslate"><b>emergency()</b></span> - the system is completely unusable.
</p>

<?= Paragraph::h2('Logging Context') ?>

<p>
    According to <span class="notranslate">PSR-3</span>, you can pass a named array of data as the second argument for substitution in the message text, for example:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.replace.php', false); ?>

<p>
    In the built-in framework log, you can also add other data to the array, and they will be output by key in the log in the section with <span class="notranslate">'request-id'</span>.
    Third-party logging mechanisms may not support this feature.
</p>

<?= Paragraph::h2('Alternative Logger') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework supports only one active instance of the logging mechanism; if you need to replace it with a third-party logger, this must be done during the framework initialization.
    This necessity is justified by the fact that error logging should start from the very beginning of loading and operation of the framework itself.
</p>

<?= Paragraph::h2('Logging Settings') ?>

<p>
    In the <span class="notranslate">/config/common.php</span> file:<br>
    <span class="notranslate"><b>log.enabled</b></span> - enables/disables saving to logs, which can be useful when temporarily disabling logging to reduce application load.<br>
    <span class="notranslate"><b>max.log.level</b></span> - sets the maximum logging level (from messages to critical errors).
    For example, if you set the level to <span class="notranslate">'warning'</span>, logs with levels <span class="notranslate">'debug'</span>, <span class="notranslate">'info'</span>, and <span class="notranslate">'notice'</span> will not be saved.<br>
    <span class="notranslate"><b>max.cli.log.level</b></span> - the maximum logging level when using the framework via console commands from the terminal or task scheduler.<br>
    <span class="notranslate"><b>error.reporting</b></span> - this parameter relates to the error level but is also related to logging as it determines which errors will enter the log.<br>
    <span class="notranslate"><b>log.sort</b></span> - for standard file logging, it splits logs by source (site domain).<br>
    <span class="notranslate"><b>log.stream</b></span> - outputs logs to the specified output stream if specified, for example, <span class="notranslate">'/dev/stdout'</span>.<br>
    <span class="notranslate"><b>log.format</b></span> - two formats are available for standard logging, <span class="notranslate">'row'</span> (default) and <span class="notranslate">'json'</span>, the latter converts log outputs into <span class="notranslate">JSON</span> format.<br>
</p>
<p>
    In the <span class="notranslate">/config/main.php</span> file:<br>
    <span class="notranslate"><b>db.log.enabled</b></span> - logs all queries to the databases.
</p>

<?= Paragraph::h2('Usage Examples') ?>
<p>
    General examples that show the difference between logging errors and regular informational logs:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.example.php', false); ?>

<?= Paragraph::h2('Viewing Logs') ?>

<p>
    With standard file storage of logs, the most recently added logs can be displayed in the terminal using the console command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console  --logs 3 5</p>

<p>
    The specified command will display the last three logs for the five most recent log files by date.
</p>
<p>
    In the log record (by default, in files), each log entry has a <span class="notranslate">"request-id"</span> label, which can be used to filter all logs for a specific request.<br>
    For <span class="notranslate">UNIX</span> systems and macOS, you can use the <span class="notranslate">'grep'</span> command to search by error type:
</P>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>grep -m10 :ERROR ./storage/logs/*</p>

<p>
    This command's flexibility allows searches under various conditions, including by <span class="notranslate">"request-id"</span> of a request.
</p>
<p>
    For <span class="notranslate">Windows</span>, an alternative would be the <span class="notranslate">'findstr'</span> command:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">D:\project></span>findstr /S /C:":ERROR" "storage/logs/*"</p>

<?= Paragraph::h2('Log Rotation') ?>

<p>
    The framework includes the <span class="notranslate">App\Commands\RotateLogs</span> class, a console command implementation for deleting outdated log files.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console rotate-logs 5</p>

<p>
    This command will delete all log files created more than five days ago.
    By default, it is set to three days.
    The command is intended for manual rotation or to be added to a task scheduler (for daily execution).
</p>
<p>
    To enable the framework to automatically monitor the maximum size of log files, configure the <span class="notranslate">'max.log.size'</span> option in the <span class="notranslate">/config/common.php</span> file.
    The value is specified as an integer in megabytes.
    However, with this setting active, if there is an unexpectedly high log volume within the current day, all logs from the previous day may be deleted.
</p>

<?= Link::previousPage('docs.2.0.service.cache.page', 'Caching'); ?>

<?= Link::nextPage('docs.2.0.service.path.page', 'Path'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

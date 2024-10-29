<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('File Path Manager') ?>

<p>
    For application versatility and portability, all operations involving file and directory path references within the project must be relative to its root directory.
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, the file path manager is handled by the <b>Path</b> service.
    It enables manipulation of relative file paths in the project by providing a wrapper over the corresponding <span class="notranslate">PHP</span> functions.
</p>
<p>
    Usage of <span class="notranslate">Path</span> in controllers (and any classes inheriting from <span class="notranslate">Hleb\Base\Container</span>) as an example of obtaining a full path from the root directory:
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.container.php', false);  ?>

<p>
    Example of defining a file path in the application code:
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.static.php', false);  ?>

<p>
    The <span class="notranslate">Path</span> object can also be obtained through <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">dependency injection</a> via the <span class="notranslate">Hleb\Reference\Interface\Path</span> interface.
</p>
<p>
    To simplify examples, only usage through <span class="notranslate">Hleb\Static\Path</span> will be shown in further examples.
</p>

<?= Paragraph::h2('The @ Symbol') ?>
<p>
    In the examples above, there is a '@' symbol at the beginning of the relative path. It indicates that the path starts from the root directory of the project.<br>
    If the project's root directory is <span class="notranslate">/var/www/hleb/</span>, the example would return the string <span class="notranslate">'/var/www/hleb/storage/public/files'</span>.
    On <span class="notranslate">Windows</span>, the result would look slightly different, but it would still be a valid full path to the specified folder.
</p>
<p>
    The prefix <span class="notranslate">'@storage'</span> is predefined for the framework. Here is a list of other assigned mappings:
</p>
<p>
    <b>'@'</b> - the root directory of the project with the <span class="notranslate">HLEB2</span> framework.
    The path can be specified arbitrarily, for example <span class="notranslate">'@/other/folder'</span>.<br>
    <span class="notranslate"><b>'@app'</b></span> - the path to the project's <span class="notranslate">/app/</span> folder.<br>
    <span class="notranslate"><b>'@public'</b></span> - the path to the project's <span class="notranslate">/public/</span> folder with public project files, which is targeted by the web server.
    Even if the name is changed, it will still correspond to <span class="notranslate">'@public'</span>.<br>
    <span class="notranslate"><b>'@storage'</b></span> - the path to the project's <span class="notranslate">/storage/</span> folder, where caches, logs, and other auxiliary files are stored.<br>
    <span class="notranslate"><b>'@resources'</b></span> - the path to the project's <span class="notranslate">/resources/</span> folder.
    This folder contains various project resources: page templates, email templates, build templates, etc.<br>
    <span class="notranslate"><b>'@views'</b></span> - the path to the project's <span class="notranslate">/resources/views/</span> folder.<br>
    <span class="notranslate"><b>'@modules'</b></span> - the path to the project's <span class="notranslate">/modules/</span> folder, even if the module directory name has been changed in the settings.<br>
    <span class="notranslate"><b>'@vendor'</b></span> - the path to the project's library folder, which remains the same even if the folder name is different.<br>
</p>
<p>
    Thus, any path within the project is allowed, so transferring to a server with a different directory structure or to another folder won't be an issue, as paths will always point to the correct location.
</p>
<p>
    The <span class="notranslate">Path</span> service has several methods that correctly recognize relative paths starting with '@'.
</p>

<p class="hl-info-block">
    A trailing slash for a relative path string, such as <span class="notranslate">'@storage/logs/'</span>, is significant. The full path returned by the method will include the trailing slash in this case.
</p>


<?= Paragraph::h2('getReal()') ?>

<p>
    The <span class="notranslate">getReal()</span> method can be seen in the examples above.
    It returns a string with the full path derived from a relative one.
    If the specified path does not exist, the method returns <span class="notranslate">false</span>.<br>
    The <span class="notranslate"><b>hl_realpath()</b></span> framework function works in the same way.
</p>

<?= Paragraph::h2('get()') ?>

<p>
    The <span class="notranslate">get()</span> method differs from <span class="notranslate">getReal()</span> in that it will return a string for the full path even if the path does not exist, without checking for existence.<br>
    The function <span class="notranslate"><b>hl_path()</b></span> can be used as an alternative to this method.
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.get.php', false);  ?>

<?= Paragraph::h2('relative()') ?>

<p>
    This method differs from other methods of the <span class="notranslate">Path</span> service in that it takes a full path and returns a relative one with '@' at the beginning.
    Sometimes it is necessary to output the relative path in project logs or in other places, hiding the full path.
    The <span class="notranslate">relative()</span> method helps in such cases.
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.relative.php', false);  ?>

<p>
    The example shows obtaining the relative path to the current file.
</p>

<?= Paragraph::h2('createDirectory()') ?>

<p>
    The <span class="notranslate">createDirectory()</span> method creates a directory (if it does not exist) along with any nested subfolders by the specified relative path with '@' at the beginning or a full path.
</p>

<?= Paragraph::h2('exists()') ?>

<p>
    The <span class="notranslate">exists()</span> method is used to check for the existence of a file or directory.
    It accepts both full paths and relative paths with '@' at the beginning.<br>
    The framework function <span class="notranslate"><b>hl_file_exists()</b></span> has a similar action.
</p>

<?= Paragraph::h2('contents()') ?>

<p>
    The <span class="notranslate">contents()</span> method is a wrapper around <span class="notranslate">file_get_contents()</span>, but it can also accept a relative path starting with '@' in addition to a full path.<br>
    This method is duplicated by the framework function <span class="notranslate"><b>hl_file_get_contents()</b></span>.
</p>

<?= Paragraph::h2('put()') ?>

<p>
    This method is similar to the <span class="notranslate">file_put_contents()</span> function.
    Besides a full path, the <span class="notranslate">put()</span> method can also accept a relative path starting with '@'.<br>
    The framework function <span class="notranslate"><b>hl_file_put_contents()</b></span> can be used as an alternative to this method.
</p>

<?= Paragraph::h2('isDir()') ?>

<p>
    The <span class="notranslate">isDir()</span> method is a wrapper around the <span class="notranslate">is_dir()</span> function, and it can accept both a full path and a relative path starting with '@'.<br>
    The function <span class="notranslate"><b>hl_is_dir()</b></span> can be used instead of this method.
</p>

<?= Paragraph::h2('Asynchronous Requests') ?>

<p class="hl-danger-block">
    Some file operations, such as writing to a file, are blocking for asynchronous calls, so it is recommended to use their asynchronous-supported alternatives.
</p>

<?= Link::previousPage('docs.2.0.service.log.page', 'Logging'); ?>

<?= Link::nextPage('docs.2.0.service.db.page', 'DB Service'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

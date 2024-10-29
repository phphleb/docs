<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Framework Setup') ?>

    <p>
        After installing the project, you need to configure the framework itself.
        In the previous step, the project was installed in the <b><span class="notranslate">new_project</span></b> directory (or any other directory name you chose), to execute the following console commands, you need to navigate to this directory:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>cd new_project</p>

    <p>
        The example provided may differ for various console environments.
    </p>
    <p>
        It is assumed that all console commands in the documentation are run from this root project directory unless otherwise specified.
    </p>

    <p class="hl-info-block">
        If the application is running on a host where the framework’s console commands are not available, they can be executed via the framework’s special <span class="hl-nowrap"><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web Console</a></span>.
    </p>

<?= Paragraph::h2('Access Rights Configuration in Linux') ?>

    <p class="hl-danger-block">
        Warning! A command like <b><span class="notranslate">sudo chmod -R 777 ./storage</span></b>, replacing the following permissions setup, can be applied only on a local development machine that is not public.
    </p>

    <p>
        After installing the <span class="notranslate">HLEB2</span> framework on <span class="notranslate">Linux</span>, it is necessary to configure permissions.
        To do this, you need to know the web server group's name.
        Next, here's how you can set extended edit permissions for files in the project's <span class="notranslate">/storage/</span> directory.
        The web server may be named <span class="notranslate">www-data</span>, and its group may be named the same <span class="notranslate">www-data</span>.
        When running the framework, if the permissions are not yet set, an error will be displayed attempting to determine the active web server's name and group.
        To allow new files created by the web server to be editable via the console by the current user, add the user to the web server group:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo usermod -aG www-data ${USER}</p>

    <p>
        After these group changes, to apply them, you need to log out and log back into the system as this user, or run the following command:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>su - ${USER}</p>

    <p>
        The next check should display <span class="notranslate">'www-data'</span> in the group list:
    </p>


<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>id -nG</p>

    <p>
        Then, extend permissions on the <span class="notranslate">/storage/</span> directory for the group (from the root directory of the project).
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo chmod -R 750 ./ ; sudo chmod -R 770 ./storage</p><br>

<?= Paragraph::h2('Auto-configuration via Console Command') ?>

    <p>
        After setting permissions, if needed, you can use the framework's own console commands.
        If the project was installed not via <span class="notranslate">Composer</span>, which should have executed this script automatically (and then removed it), run the command manually:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console project-setup-task</p>

    <p>
        This action will perform several minor optimizations of the project that do not directly affect its operability.
    </p>

<?= Paragraph::h2('Project Settings') ?>

    <p>
        The <span class="notranslate">/config/</span> directory is often used to store the project's settings.
        If you want to fetch additional settings using the framework, add them to the <span class="notranslate">/config/main.php</span> file in a similar manner to its settings.
        However, if there are many such settings, it is advisable to use the <span class="notranslate">'custom.setting.files'</span> parameter from the <span class="notranslate">/config/system.php</span> file and list files containing separate settings.
    </p>

<?= Paragraph::h2('Dynamic Settings') ?>

    <p>
        The <span class="notranslate">'start.unixtime'</span> parameter under the settings name <span class="notranslate">'common'</span> contains the <span class="notranslate">UNIX</span> time of the request processing start by the framework in milliseconds.
        This parameter remains constant throughout the request.
    </p>

<?= Paragraph::h2('Class Autoloading') ?>

    <p>
        A universal class autoloader is provided alongside <span class="notranslate">Composer</span>, and its use is preferred.
        If a file (class) is not found, an attempt will be made to load it with the framework’s auxiliary autoloader, which follows <span class="notranslate">PSR-0</span> naming conventions and works independently of Composer.
        For instance, for the framework's autoloader, the class <span class="notranslate">App\Controllers\ExampleController</span> should correspond to the file <span class="notranslate">/app/Controllers/ExampleController.php</span> in the project.
    </p>

<?= Paragraph::h1('Optimization') ?>


<?= Paragraph::h2('Class Preloading in OPcache') ?>

    <p>
        For enhanced performance, add the following directive for the <span class="notranslate">preload.php</span> file in your current <span class="notranslate">php.ini</span> file to precompile the framework's classes and place them in the opcode cache.
    </p>
    <p class="hl-text-block notranslate">
        opcache.preload=/path/to/project/vendor/phphleb/framework/preload.php
    </p>
    <p>
        In this line, replace <span class="notranslate">'/path/to/project/'</span> with the path to your project's root directory.<br>
        Learn more about <a href="https://www.php.net/manual/en/opcache.preloading.php" target="_blank" rel="nofollow">preloading</a> in the PHP documentation.
    </p>

    <p class="hl-info-block">
        Preloading is not supported on Windows.
    </p>

<?= Paragraph::h2('Reducing Framework Size') ?>

    <p>
        When deploying the project for <span class="notranslate">production</span> (target public server), you can reduce the framework size by 30% by removing code comments using a dedicated console command.
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console clearing-comment-feature</p>

<?= Link::previousPage('docs.2.0.installation.page', 'Project Installation'); ?>

<?= Link::nextPage('docs.2.0.configuration.page', 'Configuration Setup'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer');

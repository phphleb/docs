<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Project Installation') ?>

    <p>
        The <b><span class="notranslate">HLEB2</span></b> framework is designed such that its installation and requirements are minimally simple.<br>
        To install the framework, all you need is <span class="notranslate">PHP</span> version 8.2 or higher with a basic set of extensions and 2 megabytes of free space on your device.<br><br>
        If you want to use a <span class="notranslate">PHP</span> version below 8.2, try the <a href="https://phphleb.ru/ru/v1/" target="_blank">first version</a> of the framework.<br>
    </p>
    <p>
        The framework's code is located in the <span class="notranslate">GitHub</span> repository at <a href="https://github.com/phphleb/hleb" target="_blank">https://github.com/phphleb/hleb</a>.
        The first step of installation involves copying this code to a server or a local folder where it will be used.<br>
    </p>

<?= Paragraph::h2('Copying from Repository') ?>

    <p>
        Visit the project's repository on <span class="notranslate">GitHub</span> (link above).<br>
        Click on the <b><span class="notranslate">Code</span></b> button and then <a href="https://github.com/phphleb/hleb/archive/refs/heads/master.zip" download><span class="notranslate">Download ZIP</span></a> (direct link to the file).
        Extract the downloaded archive to the desired folder on the server or locally.<br>
    </p>
    <p class="hl-danger-block">
        Use only verified links to the official repository of the framework.
    </p>

<?= Paragraph::h2('Cloning Using Git') ?>

    <p>
        To clone the framework repository into the <span class="notranslate">new_project</span> folder, execute the following <span class="notranslate">git</span> command:
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>git clone https://github.com/phphleb/hleb new_project</p>

    <p>
        This command will create a <span class="notranslate">new_project</span> folder, initialize a <span class="notranslate">.git</span> subdirectory in it, then download all the data for this repository and extract a working copy of the latest version.
        If you navigate to the directory created by this command <span class="notranslate">new_project</span>, you will find the project files ready for use.
    </p>

<?= Paragraph::h2('Local Development with Docker') ?>

    <p>
        To try the framework's capabilities and deploy local development from a <span class="notranslate">Docker</span> image, use
        the repository <a href="https://github.com/phphleb/toaster" target="_blank"><span class="notranslate">phphleb/toaster</span></a>.
    </p>

<?= Paragraph::h2('Installation Using Composer') ?>

    <p>
        An alternative option is using <a href="https://getcomposer.org/" target="_blank"><span class="notranslate">Composer</span></a>.
        This method is more preferable, as <span class="notranslate">Composer</span> will allow you to install various packages and extensions in the future.
        Install the current version of the project using the console command (assuming <span class="notranslate">Composer</span> is installed globally):
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer create-project phphleb/hleb new_project</p>

    <p>
        This command will install the framework into the <span class="notranslate">new_project</span> folder.<br>
    </p>

<?= Paragraph::h2('Extension for Database Operations') ?>

    <p>
        If your application will work with a database, you need to install the <a href="https://www.php.net/manual/en/pdo.installation.php">PHP PDO extension</a> and the corresponding driver (for example, <span class="notranslate">pdo_mysql</span> for <span class="notranslate">MySQL</span>).
    </p>

<?= Paragraph::h2('Project Public Directory') ?>

    <p>
        For further actions, you need to configure the framework's public folder if the initial name <b><span class="notranslate">public</span></b> does not fit for some reason.<br>
        For instance, on some hosting services, a folder named <b><span class="notranslate">public_html</span></b> is used. To change the project's public folder, simply rename the <b><span class="notranslate">public</span></b> folder.<br>
        Additionally, in this case, you need to change the predefined name in the <b><span class="notranslate">console</span></b> file, which is located in the root folder of the project.<br>
    </p>

<?= Link::previousPage('docs.2.0.introduction.page', 'Introduction'); ?>

<?= Link::nextPage('docs.2.0.tuning.page', 'Setting up the framework'); ?><br><br>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer');

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('HLOGIN - Registration Module') ?>

<p>
    Creating user registration on a website often becomes necessary after the framework installation. Before beginning page development, you need to designate their visibility for different categories of users.
</p>
<p>
    The <span class="notranslate">HLOGIN</span> library extends the capabilities of the <span class="notranslate">HLEB2</span> framework by adding comprehensive user registration to the site, distinguished by easy configuration and quick setup, along with convenient and diverse functionality. It supports multilingualism and several design options. Optionally, you may include a feedback form, which accompanies registration and authentication. The automatically generated admin panel contains tools for user management and display settings. After integrating registration, you can immediately focus on creating content for the site.
</p>
<p>
    Several basic design types are available. You can view a demonstration of the function and appearance of registration pop-up windows by clicking <a href="https://auth2.phphleb.ru/" target="_blank">here</a>.
</p>

<?= Paragraph::h2('Installation') ?>

<p>
    Step 1: Install via <span class="notranslate">Composer</span> in a <span class="notranslate">HLEB2</span>-based project:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/hlogin</p>

<p>
    Step 2: Install the library in the project. You will be prompted to select a design type from several options:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>

<?= Paragraph::h2('Connection') ?>

<p>
    Step 3: You must have an active database connection before performing this action. In the project settings <span class="notranslate">'/config/database.php'</span>, you need to add a connection or ensure it exists, and also verify its name is in the <span class="notranslate">'base.db.type'</span> parameter.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-login-table</p>

<p>
    After this, use the console command to create a user with administrator rights (you will be prompted to provide <span class="hl-nowrap">E-mail</span> and password):
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-admin</p>

<p class="hl-info-block">
    If you cannot execute the console command, create the tables using the appropriate <span class="notranslate">SQL</span> query from the file <span class="hl-nowrap">/vendor/phphleb/hlogin/planB.sql</span>. Then register an administrator and set their <span class="notranslate">'regtype'</span> to 11.
</p>

<p>
    Step 4: Now you can proceed to the main placeholder page of the website if it is the default framework page without changes and check that the authorization panels are available. If the library is installed in a HLEB2-based project not from the start and the placeholder has been removed, check the login on the page <span class="notranslate">'/en/login/action/enter/'</span> of the site (using the administrator data from the previous step).
</p>
<p>
    Step 5: Installation of registration on specific pages through routing. To do this, set the following conditions in the routing files (project folder <span class="notranslate">/routes/</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.rules.php', false);  ?>

<p>
    It is sufficient to distribute the site's routes according to these conditions (groups) so that user authorization rules are applied to them.
</p>
<p>
    Note that pages not included in any of these groups with conditions are outside the registration rules, and this library is not connected to them.
</p>
<p>
    Step 6: Configuration. After authorization, the administrator profile (<span class="notranslate">/en/login/profile/</span>) displays a button to access the admin panel. In it, you can configure registration panels and other parameters.
</p>

<?= Paragraph::h1('Additional Information', true) ?>

<p>
    If you need to display data depending on the user registration type:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.data.php', false);  ?>
<p>
    You can also add the class <span class="hl-nowrap">Phphleb\Hlogin\Container\Auth</span> to the <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">container</a> and retrieve this data from it.
</p>
<p>
    By default, the language used for panels is extracted from the <span class="notranslate">url</span> parameter (following the domain) or the <span class="notranslate">lang</span> attribute within the <span class="notranslate">'&lt;html lang="en"&gt;'</span> tag. To forcefully set the design and/or language of the panels on a page:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.data.php');  ?>

<?= Paragraph::h2('Panel Management') ?>

<p>
    Standard authorization buttons can be replaced with any others by disabling the default ones in the admin panel beforehand. Custom buttons can be assigned one of the following actions (for <span class="notranslate">JavaScript</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.button.php', false);  ?>

<p>
    Or, using attributes:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.attr.php', false);  ?>

<p>
    As can be understood, registration cannot be available for users with <span class="notranslate">JavaScript</span> disabled in the browser. There are hardly any left now.
</p>

<?= Paragraph::h2('Specific Pages') ?>

<p>
    If there is a need to direct a user immediately to a login or registration page, several necessary pages are automatically created:
</p>
<p>
    Registration Page<br>
    <b>/</b>ru<b>/login/action/registration/</b>
</p>
<p>
    Login Page<br>
    <b>/</b>ru<b>/login/action/enter/</b>
</p>
<p>
    Profile Page<br>
    <b>/</b>ru<b>/login/profile/</b>
</p>
<p>
    Contact Page<br>
    <b>/</b>ru<b>/login/action/contact/</b>
</p>
<p>
    Admin Panel Settings Page<br>
    <b>/</b>ru<b>/adminzone/registration/settings/</b>
</p>

<?= Paragraph::h2('Additional Data Processing') ?>

<p>
    When validating values on the backend side submitted from registration forms, you can additionally process them with your own <span class="notranslate">PHP script</span>, if available. This way, for example, you can add a custom field to the form and check it yourself. The queries are divided into separate classes, which can be found in the folder <span class="notranslate">/vendor/phphleb/hlogin/Optional/Inserted/</span>. They can only be used after copying into the folder <span class="notranslate">/app/Bootstrap/Auth/Handlers/</span>.
</p>

<?= Paragraph::h2('Design') ?>

<p>
    Custom design is available by choosing the <span class="notranslate">"blank"</span> type in the admin panel. After this, you can copy and modify the <span class="notranslate">CSS</span> file from any existing design, connecting it to the site yourself. You can also make edits based on the design type.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.design.php', false);  ?>

<?= Paragraph::h2('Localization') ?>

<p>
    By default, several switchable languages are used for registration and authorization. However, all labels can be customized to your own settings. It is important to check that lengthy words fit within the panel interface.
</p>
<p>
    For <span class="notranslate">backend</span> localization, copy the necessary language files from <span class="notranslate">/vendor/phphleb/hlogin/App/BackendTranslation/</span> to the folder <span class="notranslate">/app/Bootstrap/Auth/Resources/php/</span> and make changes in the latter.
</p>
<p>
    For <span class="notranslate">frontend</span> localization, copy the necessary language files (starting with <span class="notranslate">'hloginlang'</span>) from <span class="notranslate">/vendor/phphleb/library/hlogin/web/js/</span> to the folder <span class="notranslate">/app/Bootstrap/Auth/Resources/js/</span> and make changes.
</p>
<p>
    You can add an additional language(s) by creating appropriately named files for <span class="notranslate">backend</span> and <span class="notranslate">frontend</span> localizations and adding it to the list of allowed languages in the <span class="notranslate">'allowed.languages'</span> setting in the <span class="notranslate">/config/main.php</span> file (this file may be duplicated in Modules).
</p>

<?= Paragraph::h2('Adminzone') ?>

<p>
    When creating your additional pages in the admin panel, surround their routes with access restrictions as shown below:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.adminpan.page.php', false);  ?>

<p>
    The creation of pages in the admin section is described <a href="<?= Link::url('docs.2.0.adminpan.page'); ?>">in the relevant section</a> of this documentation.
</p>

<?= Paragraph::h2('Sending Emails') ?>

<p>
    Sending emails with notifications and access recovery is done using the <a href="https://github.com/phphleb/muller" target="_blank">github.com/phphleb/muller</a> library. In the admin panel, the sender's <span class="notranslate">E-mail</span> should be specified, for which sending from the server must be allowed. For most hostings, it is enough to create such a mailbox. The available sending <span class="notranslate">E-mail</span> is located in <span class="notranslate">php.ini</span> <span class="notranslate">(sendmail_path = ... -f'<b>email@example.com</b>')</span>.
</p>
<p>
    By default, emails are additionally logged into the folder <span class="notranslate">'/storage/logs/'</span> with the name ending in <span class="notranslate">'mail.log'</span>. This logging can be disabled in the settings of the admin panel.
</p>

<?= Paragraph::h2('Mail Server') ?>
<p>
    The default library used for sending emails has limited capabilities and should be replaced with a suitable mail server or another equivalent as the project evolves.
</p>
<p>
    Create the class <span class="notranslate">App\Bootstrap\Auth\MailServer</span> at the path <span class="notranslate">/app/Bootstrap/Auth/MailServer.php</span>, which implements the interface <span class="notranslate">Phphleb\Hlogin\App\Mail\MailInterface</span>. Once the file is created, emails will be sent using this class, so you should first implement your own sending logic for the chosen mail server.
</p>

<?= Paragraph::h2('Library Update') ?>

<p>
    To update, execute the console commands:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer update phphleb/hlogin</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>

<p>
    During the installation process, choose the current design that is used by default.
</p>

<?= Paragraph::h2('Links') ?>

<p>
    <span class="notranslate">HLOGIN</span> library on <span class="notranslate">GitHub</span>: <a href="https://github.com/phphleb/hlogin" target="_blank">github.com/phphleb/hlogin</a>
</p>
<p>
    Demo registration page: <a href="https://auth2.phphleb.ru/" target="_blank">auth2.phphleb.ru</a>
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


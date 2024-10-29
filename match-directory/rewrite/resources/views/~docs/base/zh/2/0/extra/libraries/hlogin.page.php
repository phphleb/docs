<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('HLOGIN - 注册模块') ?>

<p>
    在安装框架后，通常有必要在网站上创建用户注册。在开始页面开发之前，您需要为不同类别的用户指定页面的可见性。
</p>
<p>
    <span class="notranslate">HLOGIN</span> 库扩展了 <span class="notranslate">HLEB2</span> 框架的功能，通过添加全面的用户注册，该功能具有简单的配置和快速的设置，并且功能便捷且多样化。它支持多语言和多种设计选项。您可以选择加上注册和认证后的反馈表单。在自动生成的管理面板中，包含用户管理和显示设置的工具。在集成注册后，您可以立即将精力集中在为网站创建内容上。
</p>
<p>
    提供了几种基本设计类型。您可以通过点击<a href="https://auth2.phphleb.ru/" target="_blank">这里</a>查看注册弹出窗口的功能演示和外观。
</p>

<?= Paragraph::h2('安装') ?>

<p>
    步骤 1：通过 <span class="notranslate">Composer</span> 在基于 <span class="notranslate">HLEB2</span> 的项目中安装：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/hlogin</p>

<p>
    步骤 2：在项目中安装库。您将被提示从多个选项中选择一种设计类型：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>


<?= Paragraph::h2('连接') ?>

<p>
    步骤 3：在执行此操作之前，必须具有有效的数据库连接。在项目设置中 <span class="notranslate">'/config/database.php'</span>，您需要添加一个连接或确保它存在，并验证其名称在参数<span class="notranslate">'base.db.type'</span>中。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-login-table</p>

<p>
    之后，使用控制台命令创建具有管理员权限的用户（系统会提示您提供<span class="hl-nowrap">E-mail</span>和密码）：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-admin</p>

<p class="hl-info-block">
    如果无法执行控制台命令，请使用文件<span class="hl-nowrap">/vendor/phphleb/hlogin/planB.sql</span>中的相应<span class="notranslate">SQL</span>查询来创建表。然后注册一个管理员并将他的<span class="notranslate">'regtype'</span>设置为11。
</p>

<p>
    步骤 4：现在您可以继续访问网站的主占位页面，如果它是未更改的默认框架页面，检查授权面板是否可用。如果库不是从一开始就在基于HLEB2的项目中安装的，并且删除了占位符，请在网站的<span class="notranslate">'/en/login/action/enter/'</span>页面上检查登录情况（使用上一步的管理员数据）。
</p>
<p>
    步骤 5：通过路由在特定页面上安装注册。为此，请在路由文件中设置以下条件（项目文件夹<span class="notranslate">/routes/</span>）：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.rules.php', false);  ?>

<p>
    根据这些条件（组）分配网站的路由即可，对其应用用户授权规则。
</p>
<p>
    请注意，不在任何具有条件的这些组中的页面处于注册规则之外，此库未连接到它们。
</p>
<p>
    步骤 6：配置。授权后，管理员资料(<span class="notranslate">/en/login/profile/</span>)中显示进入管理面板的按钮。在这里您可以配置注册面板和其他参数。
</p>

<?= Paragraph::h1('补充信息', true) ?>

<p>

    如果需要根据用户注册类型输出数据：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.data.php', false);  ?>
<p>
    您还可以将类 <span class="hl-nowrap">Phphleb\Hlogin\Container\Auth</span> 添加到 <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">容器</a> 中，并从中获取这些数据。
</p>
<p>
    默认情况下，面板所用的语言是从 <span class="notranslate">url</span> 参数（域名后的部分）或 <span class="notranslate">'&lt;html lang="en"&gt;'</span> 标签中的 <span class="notranslate">lang</span> 属性中提取的。要强制设置页面上的面板设计和/或语言：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.data.php');  ?>

<?= Paragraph::h2('面板管理') ?>

<p>
    可以通过在管理面板中预先禁用默认的按钮来更换标准授权按钮。自定义按钮可以被分配以下操作之一（对于 <span class="notranslate">JavaScript</span>）：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.button.php', false);  ?>

<p>
    或者，使用属性：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.attr.php', false);  ?>

<p>
    可以理解，注册对浏览器中禁用<span class="notranslate">JavaScript</span>的用户不可用。现在几乎没有这样的用户了。
</p>

<?= Paragraph::h2('特定页面') ?>

<p>
    如果需要立即将用户引导到登录或注册页面，则会自动创建若干必要的页面：
</p>
<p>
    注册页面<br>
    <b>/</b>ru<b>/login/action/registration/</b>
</p>
<p>
    登录页面<br>
    <b>/</b>ru<b>/login/action/enter/</b>
</p>
<p>
    个人资料页面<br>
    <b>/</b>ru<b>/login/profile/</b>
</p>
<p>
    联系页面<br>
    <b>/</b>ru<b>/login/action/contact/</b>
</p>
<p>
    管理面板设置页面<br>
    <b>/</b>ru<b>/adminzone/registration/settings/</b>
</p>

<?= Paragraph::h2('附加数据处理') ?>

<p>
    在验证从注册表单提交的后端值时，可以使用您自己的<span class="notranslate">PHP脚本</span>对其进行额外处理（如果可用）。这样，例如，您可以在表单中添加自定义字段，并自行进行检查。查询被分为单独的类，可以在文件夹<span class="notranslate">/vendor/phphleb/hlogin/Optional/Inserted/</span>中找到。它们只能在复制到文件夹<span class="notranslate">/app/Bootstrap/Auth/Handlers/</span>后使用。
</p>

<?= Paragraph::h2('设计') ?>

<p>
    选择管理面板中的<span class="notranslate">"blank"</span>类型可以使用自定义设计。之后，您可以从现有设计中复制并修改<span class="notranslate">CSS</span>文件，自己将其连接到网站。还可以根据设计类型进行修改。
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.design.php', false);  ?>

<?= Paragraph::h2('本地化') ?>

<p>
    默认情况下，注册和认证使用多种可切换语言。不过，所有名词，可以根据需要进行自定义。重要的是要检查长词是否适合面板界面。
</p>
<p>
    对于 <span class="notranslate">后端</span> 本地化，从 <span class="notranslate">/vendor/phphleb/hlogin/App/BackendTranslation/</span> 中复制必要的语言文件到文件夹 <span class="notranslate">/app/Bootstrap/Auth/Resources/php/</span> 并在后者中进行更改。
</p>
<p>
    对于 <span class="notranslate">前端</span> 本地化，从 <span class="notranslate">/vendor/phphleb/library/hlogin/web/js/</span> 中复制必要的语言文件（以 <span class="notranslate">'hloginlang'</span> 开头）到文件夹 <span class="notranslate">/app/Bootstrap/Auth/Resources/js/</span> 并进行更改。
</p>
<p>
    您可以通过为 <span class="notranslate">后端</span> 和 <span class="notranslate">前端</span> 本地化创建相应名称的文件并在 <span class="notranslate">/config/main.php</span> 文件的 <span class="notranslate">'allowed.languages'</span> 设置中添加语言来添加额外的语言（此文件可能会在模块中重复出现）。
</p>

<?= Paragraph::h2('管理区') ?>

<p>
    在管理面板中创建自己的附加页面时，请如下所示围绕它们的路由添加访问限制：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.adminpan.page.php', false);  ?>

<p>
    在管理部分中创建页面的描述在本文档的相应部分< </p> 此处标准的 <a href="<?= Link::url('docs.2.0.adminpan.page'); ?>"> 查看相关分节</a>。
</p>

<?= Paragraph::h2('发送邮件') ?>

<p>

    使用 <a href="https://github.com/phphleb/muller" target="_blank">github.com/phphleb/muller</a> 库进行通知和恢复访问的邮件发送。在管理面板中，一定要指定发送人的 <span class="notranslate">E-mail</span>，该邮箱必须被允许从服务器发送邮件。对于大多数托管，仅需要创建这样的邮箱即可。可用发送电子邮件在 <span class="notranslate">php.ini</span> <span class="notranslate">(sendmail_path = ... -f'<b>email@example.com</b>')</span> 中找的到。
</p>
<p>
    默认情况下，邮件还会被记录到文件夹 <span class="notranslate">'/storage/logs/'</span> 中，文件名以 <span class="notranslate">'mail.log'</span> 作为后缀。可以在管理面板设置中禁用此记录。
</p>

<?= Paragraph::h2('邮件服务器') ?>
<p>
    默认用于发送电子邮件的库功能有限，随着项目的发展，应将其替换为合适的邮件服务器或其他等效服务。
</p>
<p>
    在路径<span class="notranslate">/app/Bootstrap/Auth/MailServer.php</span>上创建类<span class="notranslate">App\Bootstrap\Auth\MailServer</span>，它实现接口<span class="notranslate">Phphleb\Hlogin\App\Mail\MailInterface</span>。文件创建后，电子邮件将使用此类发送，因此您应首先实现您选择的邮件服务器的发送逻辑。
</p>

<?= Paragraph::h2('库更新') ?>

<p>
    要更新，请执行以下控制台命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer update phphleb/hlogin</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>

<p>
    在安装过程中，选择当前默认使用的设计。
</p>

<?= Paragraph::h2('链接') ?>

<p>
    在<span class="notranslate">GitHub</span>上的<span class="notranslate">HLOGIN</span>库：<a href="https://github.com/phphleb/hlogin" target="_blank">github.com/phphleb/hlogin</a>
</p>
<p>
    演示注册页面：<a href="https://auth2.phphleb.ru/" target="_blank">auth2.phphleb.ru</a>
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


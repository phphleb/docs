<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('框架设置') ?>

    <p>
        安装项目后，需要配置框架本身。
        在上一步中，项目被安装在<b><span class="notranslate">new_project</span></b>目录（或您选择的任何其他目录名称），要执行以下控制台命令，您需要进入此目录：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>cd new_project</p>

    <p>
        所提供的示例可能因不同的控制台环境而有所不同。
    </p>
    <p>
        除非另有指定，否则假定文档中的所有控制台命令均从此根项目目录运行。
    </p>

    <p class="hl-info-block">
        如果应用程序运行在框架控制台命令不可用的主机上，则可以通过框架的特殊<span class="hl-nowrap"><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web 控制台</a></span>来执行它们。
    </p>

<?= Paragraph::h2('Linux 中的访问权限配置') ?>

    <p class="hl-info-block">
        默认情况下，在DEBUG模式下，不需要此权限设置，并且主机通常提供高级权限，因此，如果项目处于开发模式或托管上，则可以跳过此步骤。
    </p>

    <p>
        在 <span class="notranslate">Linux</span> 上安装 <span class="notranslate">HLEB2</span>框架后，必须配置权限。
        为此，您需要知道 Web 服务器组的名称。
        接下来，您可以了解如何为项目 <span class="notranslate">/storage/</span> 目录中的文件设置扩展编辑权限。
        Web 服务器可能命名为 <span class="notranslate">www-data</span>，其组名可能相同 <span class="notranslate">www-data</span>。
        运行框架时，如果尚未设置权限，将显示错误以试图确定活动 Web 服务器的名称和组。
        为了让 Web 服务器创建的新文件可以通过当前用户在控制台上编辑，需要将当前用户添加到 Web 服务器组中：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo usermod -aG www-data ${USER}</p>

    <p>
        进行这些组变更后，为了应用这些变更，您需要注销并重新登录到系统作为此用户，或者执行以下命令：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>su - ${USER}</p>

    <p>

        下一次检查应在组列表中显示<span class="notranslate">'www-data'</span>：
    </p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>id -nG</p>

    <p>
        然后扩展组<span class="notranslate">/storage/</span>目录的权限（从项目的根目录）。
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo chmod -R 750 ./ ; sudo chmod -R 770 ./storage</p><br>

<?= Paragraph::h2('通过控制台命令进行自动配置') ?>

    <p>
        设置权限后，如有需要，您可以使用框架自身的控制台命令。
        如果项目不是通过<span class="notranslate">Composer</span>安装的，该脚本应已自动执行此操作（然后删除），请手动运行命令：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console project-setup-task</p>

    <p>
        此操作将执行多个不直接影响项目可操作性的次要优化。
    </p>

<?= Paragraph::h2('项目设置') ?>

    <p>
        <span class="notranslate">/config/</span>目录通常用于存储项目的设置。
        如果您想使用框架获取其他设置，请将它们添加到文件<span class="notranslate">/config/main.php</span>中，类似于其设置。
        但如果有许多这样的设置，建议使用文件<span class="notranslate">/config/system.php</span>中的参数<span class="notranslate">'custom.setting.files'</span>并列出包含单独设置的文件。
    </p>

<?= Paragraph::h2('动态设置') ?>

    <p>
        设置名<span class="notranslate">'common'</span>下的参数<span class="notranslate">'start.unixtime'</span>包含框架请求处理开始的<span class="notranslate">UNIX</span>时间，以毫秒为单位。
        此参数在整个请求过程中保持不变。
    </p>

<?= Paragraph::h2('类自动加载') ?>

    <p>
        随<span class="notranslate">Composer</span>一起提供了一个通用的类自动加载器，首选使用它。
        如果文件（类）未找到，将尝试使用框架的辅助自动加载器来加载它，该加载器遵循<span class="notranslate">PSR-0</span>命名规范，并独立于Composer运行。
        例如，对于框架的自动加载器，类<span class="notranslate">App\Controllers\ExampleController</span>应对应于项目中的文件<span class="notranslate">/app/Controllers/ExampleController.php</span>。
    </p>

<?= Paragraph::h1('优化') ?>


<?= Paragraph::h2('OPcache中的类预加载') ?>

    <p>
        为了提高性能，请在当前的<span class="notranslate">php.ini</span>文件中添加以下关于<span class="notranslate">preload.php</span>文件的指令，以便预先编译框架类并将它们放入字节码缓存。
    </p>
    <p class="hl-text-block notranslate">
        opcache.preload=/path/to/project/vendor/phphleb/framework/preload.php
    </p>
    <p>
        在此行中，将<span class="notranslate">'/path/to/project/'</span>替换为项目根目录的路径。<br>
        在PHP文档中了解更多关于<a href="https://www.php.net/manual/zh/opcache.preloading.php" target="_blank" rel="nofollow">预加载</a>的信息。
    </p>

    <p class="hl-info-block">
        预加载在Windows上不受支持。
    </p>

<?= Paragraph::h2('减少框架大小') ?>

    <p>
        部署项目到<span class="notranslate">production</span>（目标公开服务器）时，可以通过使用专用控制台命令删除代码注释将框架大小减少30%。
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console clearing-comment-feature</p>

<?= Link::previousPage('docs.2.0.installation.page', '项目安装'); ?>

<?= Link::nextPage('docs.2.0.configuration.page', '配置设置'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer');

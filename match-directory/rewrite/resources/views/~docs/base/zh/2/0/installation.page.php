<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('项目安装') ?>

    <p>
        <b><span class="notranslate">HLEB2</span></b> 框架的设计使其安装和需求非常简单。<br>
        安装该框架只需 <span class="notranslate">PHP</span> 8.2 或更高版本的基础扩展和 2 兆字节的设备自由空间。<br><br>
        如果您想使用低于 8.2 的 <span class="notranslate">PHP</span> 版本，请尝试框架的<a href="https://phphleb.ru/ru/v1/" target="_blank">第一个版本</a>。<br>
    </p>
    <p>
        框架的代码位于 <span class="notranslate">GitHub</span> 仓库中，地址为 <a href="https://github.com/phphleb/hleb" target="_blank">https://github.com/phphleb/hleb</a>。
        安装的第一步是将此代码复制到服务器或使用的本地文件夹中。<br>
    </p>

<?= Paragraph::h2('从仓库复制') ?>

    <p>
        访问 <span class="notranslate">GitHub</span> 上的项目存储库（上面的链接）。<br>

        点击 <b><span class="notranslate">Code</span></b> 按钮，然后 <a href="https://github.com/phphleb/hleb/archive/refs/heads/master.zip" download><span class="notranslate">下载 ZIP</span></a>（文件的直接链接）。
        将下载的档案解压到服务器上或本地需要的文件夹。<br>
    </p>
    <p class="hl-danger-block">
        仅使用经过验证的指向框架官方存储库的链接。
    </p>

<?= Paragraph::h2('使用 Git 克隆') ?>

    <p>
        要将框架仓库克隆到 <span class="notranslate">new_project</span> 文件夹中，执行下面的 <span class="notranslate">git</span> 命令：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>git clone https://github.com/phphleb/hleb new_project</p>

    <p>
        这条命令将创建 <span class="notranslate">new_project</span> 文件夹，在其中初始化 <span class="notranslate">.git</span> 子目录，然后下载此仓库的所有数据并提取最新版本的工作副本。
        如果您进入该命令创建的目录 <span class="notranslate">new_project</span>，您将看到项目文件已准备好供使用。
    </p>

<?= Paragraph::h2('使用 Docker 进行本地开发') ?>

    <p>
        要尝试框架的功能并从 <span class="notranslate">Docker</span> 图像展开本地开发，请使用
        存储库 <a href="https://github.com/phphleb/toaster" target="_blank"><span class="notranslate">phphleb/toaster</span></a>。
    </p>

<?= Paragraph::h2('使用 Composer 安装') ?>

    <p>
        另一个选项是使用 <a href="https://getcomposer.org/" target="_blank"><span class="notranslate">Composer</span></a>。
        这种方法更为优选，因为 <span class="notranslate">Composer</span> 将来允许安装各种包和扩展。
        使用控制台命令（假设 <span class="notranslate">Composer</span> 全球安装）安装项目的当前版本：
    </p>

    <p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer create-project phphleb/hleb new_project</p>

    <p>
        此命令将框架安装到 <span class="notranslate">new_project</span> 文件夹中。<br>
    </p>

<?= Paragraph::h2('数据库操作扩展') ?>

    <p>
        如果您的应用程序需要与数据库协作，需要安装 <a href="https://www.php.net/manual/zh/pdo.installation.php">PHP PDO 扩展</a> 和相应的驱动程序（例如，<span class="notranslate">pdo_mysql</span> 适用于 <span class="notranslate">MySQL</span>）。
    </p>

<?= Paragraph::h2('项目公共目录') ?>

    <p>
        如果由于某些原因初始名称 <b><span class="notranslate">public</span></b> 不适用，您需要为框架配置公共文件夹。<br>
        例如，在某些托管服务上使用 <b><span class="notranslate">public_html</span></b> 命名的文件夹。要更改项目的公共文件夹，只需重命名 <b><span class="notranslate">public</span></b> 文件夹。<br>
        同时，在这种情况下，您需要修改位于项目根目录中的 <b><span class="notranslate">console</span></b> 文件中的预定义名称。<br>
    </p>

<?= Link::previousPage('docs.2.0.introduction.page', '介绍'); ?>

<?= Link::nextPage('docs.2.0.tuning.page', '框架配置'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer');

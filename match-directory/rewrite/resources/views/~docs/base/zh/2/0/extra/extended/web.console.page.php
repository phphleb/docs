<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Web 控制台') ?>

<p>
    在<span class="notranslate">HLEB2</span> 框架中，特别的 Web 控制台通过用户的浏览器提供执行控制台命令的访问权限。仅支持框架命令，即那些以 <span class="notranslate">'php console'</span> 开头的命令。
</p>
<p>
    出于安全原因，Web 控制台默认情况下是禁用的。
</p>
<p>
    要指定显示 Web 控制台的应用页面，请为此创建具有地址的路由。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.route.php', false);  ?>

<p>
    您还需要创建一个输出 Web 控制台的<span class="notranslate">HTML</span>表单的模板：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.template.php');  ?>

<p>
    现在 Web 控制台在站点的相对地址<span class="notranslate">'/web-console'</span>下可用。此外，您需要从文件<span class="notranslate"><span class="hl-nowrap">'/storage/keys/web-console.key'</span></span>中复制密钥并使用它来访问命令执行表单。
</p>

<p class="hl-text-block">
    <img src="/docs/images/webconsole.png">
</p>

<p class="hl-info-block">
    需要用户输入的命令无法通过 Web 控制台工作。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


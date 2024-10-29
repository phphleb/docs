<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('控制台命令') ?>

<p>
    框架 <span class="notranslate">HLEB2</span> 包含内置的控制台命令，以及开发人员使用框架创建自己命令的功能。
</p>
<p>
    控制台命令从终端或任务调度程序执行，它们的入口点是位于项目根目录下的 <span class="notranslate">'console'</span> 文件，这是一个常规的 <span class="notranslate">PHP</span> 文件。
</p>

<?= Paragraph::h2('标准命令') ?>
<p>
    可通过运行控制台命令获取框架命令列表：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --help</p>

<pre class="hl-text-block">
--version or -v                                 (显示框架的当前版本)
--info or -i [name]                             (显示 common 中的当前设置)
--help or -h                                    (显示默认命令列表)
--ping                                          (服务检查，返回预定义值)
--logs or -lg                                   (输出日志文件的最后几行)
--list or -l                                    (显示已添加命令列表)
--routes or -r                                  (格式化的路由列表)
--find-route (or -fr) &lt;url&gt; [method] [domain]   (通过 URL 搜索路由)
--route-info (or -ri) &lt;url&gt; [method] [domain]   (通过 URL 获取路由信息)
--clear-routes-cache or -cr                     (清除路由缓存)
--update-routes-cache or --routes-upd or -u     (更新路由缓存)
--clear-cache or -cc                            (清除框架缓存)
--add &lt;task|controller|middleware|model&gt; &lt;name&gt; [desc] (创建类)
--create module &lt;name&gt;                          (创建模块文件)
--clear-cache--twig or -cc-twig                 (清除 Twig 模板引擎的缓存)

&lt;command&gt; --help                                (显示命令帮助信息)
</pre>

<?= Paragraph::h2('创建自定义控制台命令') ?>

<p>
    通过在 <span class="notranslate">/app/Commands/Demo/</span> 文件夹中创建相应的类来添加自定义控制台命令的示例：
</p>

<?= Code::fromFile('@views/docs/code/task/default.task.class.php');  ?>

<p>
    或通过内置的控制台命令：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task "task description"</p>

<p>
    将创建一个文件 <span class="notranslate">/app/Commands/Demo/ExampleTask.php</span>。
    如果需要，可以 <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">修改默认模板</a> 来生成任务。
</p>
<p class="hl-info-block">
    在框架中，命令名称由位于 <span class="notranslate">/app/Commands/</span> 文件夹中的类名称（相对路径）组成。
    因此，建议最初给命令赋予有意义的名称，以反映其动作的本质。
</p>
<p>
    现在你可以从控制台运行新命令，它也会出现在命令列表中。<br>
    但是由于它尚未输出结果，添加 <span class="notranslate">--help</span> 参数以获取命令信息。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task --help</p>


<?= Paragraph::h2('通过命令传递参数') ?>

<p>
    修改命令类，使 <span class="notranslate">run()</span> 方法能够接受参数。
</p>

<?= Code::fromFile('@views/docs/code/task/args.task.class.php'); ?>

<p class="hl-info-block">
    命令类中的返回值 <span class="notranslate">self::SUCCESS_CODE</span> 表示命令成功执行。
    如果控制台或任务调度器中的命令通过 <span class="notranslate">&&</span> 链接，则在返回 <span class="notranslate">self::ERROR_CODE</span> 时执行将停止。
    这在 <span class="notranslate">CI/CD</span> 等复杂场景中也很有用。
</p>

<p>
    接下来，使用两个参数执行命令以获取输出 <span class="notranslate">'speed and quality'</span>：
</p>
<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task speed quality</p>

<p>
    对于特殊情况，框架允许为命令创建<a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">命名参数</a>。
</p>

<?= Paragraph::h2('从代码执行命令') ?>

<p>
    可以从应用程序代码或其他控制台命令中执行创建的命令。
</p>

<?= Code::fromFile('@views/docs/code/task/execute.task.class.php', false); ?>

<p>
    但是，在这种情况下命令的输出将不会显示，因为其用途已改变。<br>
    若要获取命令的结果，需要在类中使用 <span class="notranslate">$this->setResult()</span> 方法来设置数据，然后通过 <span class="notranslate">getResult()</span> 方法从外部访问这些数据。
</p>

<?= Code::fromFile('@views/docs/code/task/result.task.class.php', false); ?>

<?= Paragraph::h2('在终端中指定文本颜色') ?>

<p>
    要在终端中输出部分或全部文本为基本颜色之一，需要在命令中使用专门的 <span class="notranslate">color()</span> 方法。<br>
    例如：
</p>

<?= Code::fromFile('@views/docs/code/task/color.task.example.php'); ?>


<?= Paragraph::h2('使用属性设置命令限制') ?>

<p>
    可以使用 <span class="notranslate">PHP</span> 属性来控制创建命令的类型和用途。
</p>
<p>
    属性 <span class="notranslate"><b>#[Purpose]</b></span> 用于定义命令的可见性范围。
</p>

<?= Code::fromFile('@views/docs/code/attribute/purpose.task.php'); ?>

<p>
    此属性有一个 <span class="notranslate">status</span> 参数，您可以在其中指定选项：<br>
    <span class="notranslate">Purpose::FULL</span> - 无限制，默认值。<br>
    <span class="notranslate">Purpose::CONSOLE</span> - 只能用作控制台命令。<br>
    <span class="notranslate">Purpose::EXTERNAL</span> - 仅用于代码中，不列在命令列表中。<br>
</p>
<p>
    命令类的 <span class="notranslate"><b>#[Disabled]</b></span> 属性禁用该命令。
</p>
<p>
    命令类的 <span class="notranslate"><b>#[Hidden]</b></span> 属性将其从控制台命令列表中隐藏。
</p>

<?= Link::previousPage('docs.2.0.template.twig.page', '模板引擎 TWIG'); ?>

<?= Link::nextPage('docs.2.0.container.container.page', '容器'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

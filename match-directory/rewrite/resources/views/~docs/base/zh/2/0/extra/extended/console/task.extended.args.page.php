<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('可配置命令选项') ?>

<p>
    最初，执行<a href="<?= Link::url('docs.2.0.console.command.page'); ?>">控制台命令</a>的选项是在命令类的<span class="notranslate">'run'</span>方法中设置的。
    它们对应于方法参数的顺序。
</p>
<p>
    在<span class="notranslate">HLEB2</span>框架中，您还可以为命令指定一个或多个命名参数。
    调用命令时的命名参数顺序无关紧要。
</p>

<?= Paragraph::h2('rules()方法') ?>

<p>
    命令类的<span class="notranslate">rules()</span>方法返回一个包含扩展参数规则的数组。
    如果此方法不存在，请将其添加为命令类的第一个方法。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.base.php', false);  ?>

<p>
    示例中显示了三种不同类型的命名参数。
    参数名称是必需的，不能重复。
</p>
<p>
    第一个参数支持两个值<span class="notranslate">-N</span>和<span class="notranslate">--Name</span>，其存在是必需的。
    默认情况下，<span class="notranslate">--Name</span>等于字符串<span class="notranslate">'Undefined'</span>，传入的值只能是字符串（不是数组）。
    值可以是<span class="notranslate">--Name=Fedor</span>或<span class="notranslate">-N=Mark</span>的形式，而<span class="notranslate">--Name</span>将等于<span class="notranslate">'Undefined'</span>。
</p>
<p>

    第二个参数的形式是<span class="notranslate">--force</span>（无值）；如果存在，它等于<span class="notranslate">true</span>。
</p>
<p>
    第三个参数的形式是数组，值可以多次指定，如<span class="notranslate">--UserData=1</span>和<span class="notranslate">--UserData=2</span>，等同于<span class="notranslate">--UserData=[1,2]</span>。其存在是可选的，如果没有值或调用为<span class="notranslate">--UserData</span>，它将等于[]（空数组）。
</p>

<?= Paragraph::h2('获取参数值') ?>

<p>
    可以在命令的<span class="notranslate">run()</span>方法中以<span class="notranslate"><span class="hl-nowrap">$this-><b>getOptions()</b></span></span>或<span class="notranslate"><span class="hl-nowrap">$this-><b>getOption()</b></span></span>获取参数数据。
    第一种方法返回一个命名系统对象数组，可以从中获得所需格式的值。
    另一种方法返回一个类似的单参数系统对象通过名称（主要必要，不是缩写）。
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.value.php', false);  ?>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


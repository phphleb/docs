<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Configurable Command Options') ?>

<p>
    Initially, the options for executing <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">console commands</a> are set in the <span class="notranslate">'run'</span> method of the command class.
    They correspond to the method's argument order.
</p>
<p>
    In the <span class="notranslate">HLEB2</span> framework, you can also specify one or several named parameters for a command.
    The order of named parameters does not matter when invoking the command.
</p>

<?= Paragraph::h2('rules() Method') ?>

<p>
    The <span class="notranslate">rules()</span> method of the command class returns an array with rules for extended parameters.
    If such a method does not exist, add it as the first method of the command class.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.base.php', false);  ?>

<p>
    The example shows three different named parameters of different types.
    The parameter name is mandatory and must not be duplicated.
</p>
<p>
    The first parameter supports two values <span class="notranslate">-N</span> and <span class="notranslate">--Name</span>, its presence is required.
    By default, <span class="notranslate">--Name</span> is equal to the string <span class="notranslate">'Undefined'</span>, and the incoming value can only be a string (not an array).
    The value can be in the form <span class="notranslate">--Name=Fedor</span> or <span class="notranslate">-N=Mark</span>, while <span class="notranslate">--Name</span> will be equal to <span class="notranslate">'Undefined'</span>.
</p>
<p>
    The second parameter is of the form <span class="notranslate">--force</span> (without a value); if present, it equals <span class="notranslate">true</span>.
</p>
<p>
    The third parameter is in the form of an array, and the value can be specified multiple times, such as <span class="notranslate">--UserData=1</span> and <span class="notranslate">--UserData=2</span>, which is equivalent to <span class="notranslate">--UserData=[1,2]</span>. Its presence is optional, and if there is no value or it is called like <span class="notranslate">--UserData</span>, it will be equal to [] (an empty array).
</p>

<?= Paragraph::h2('Retrieving Parameter Values') ?>

<p>
    The parameter data can be obtained as <span class="notranslate"><span class="hl-nowrap">$this-><b>getOptions()</b></span></span> or <span class="notranslate"><span class="hl-nowrap">$this-><b>getOption()</b></span></span> in the <span class="notranslate">run()</span> method of the command.
    The first method returns a named array of system objects, from each of which you can get the value in the required format.
    The other returns a similar system object of one parameter by name (mandatory main, not short).
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.value.php', false);  ?>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


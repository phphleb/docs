<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('用于创建API的一组traits') ?>

<p>
    在<span class="notranslate">HLEB2</span>框架中实现<span class="notranslate">API</span>时，提供了一组traits以简化控制器中的验证和数据处理（应用了这些traits的地方）。
</p>
<p class="hl-info-block">
    在<span class="notranslate">PHP</span>中使用traits是众说纷纭的，这就是为什么这个模块被提供为一个单独的库，你可以选择使用；
    市场上有相当多的验证器可用于在<span class="notranslate">PHP</span>中开发，这只是一个简单的工作替代品。
</p>
<p>
    使用<span class="notranslate">Composer</span>安装库<span class="notranslate"><a href="https://github.com/phphleb/api-multitool" target="_blank">github.com/phphleb/api-multitool</a></span>：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/api-multitool</p>

<p>
    或下载并解压库到文件夹<span class="notranslate">/vendor/phphleb/api-multitool</span>。
</p>

<?= Paragraph::h2('连接BaseApiTrait（traits集合）') ?>

<p>

    首先，你需要创建一个父类<span class="notranslate">BaseApiActions</span>（或其他名称）用于具有<span class="notranslate">API</span>的控制器：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.base.php');  ?>

<p>
    所有辅助traits都被收集在<span class="notranslate">BaseApiTrait</span>作为一个集合中。
    因此，只需将其连接到控制器就可以获得完整的实现。
    如果需要不同的traits集合，可以将它们组合成一个新的集合。
</p>
<p>
    在这个类继承的所有控制器中，集合中的每个trait的方法将会出现：
</p>

<?= Paragraph::h2('ApiHandlerTrait') ?>

<p>
    trait<span class="notranslate">ApiHandlerTrait</span>包含几个可能有助于处理返回的<span class="notranslate">API</span>数据的方法。
    这并不意味着其方法<span class="notranslate">'present'</span>和<span class="notranslate">'error'</span>构成最终的响应，它们返回命名的数组，可以根据更复杂的标准使用。
    控制器方法中的示例：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.handler.php');  ?>

<p>
    在<span class="notranslate">HLEB</span>框架中，从控制器返回数组时会自动转换为<span class="notranslate">JSON</span>。
    输出格式化数组时，会添加一个值<span class="notranslate">'error_cells'</span>，其中列出了发生验证错误的字段（如果有的话）。
</p>

<?= Paragraph::h2('ApiMethodWrapperTrait') ?>

<p>
    拦截系统错误并将其输出到此前的trait<span class="notranslate">ApiHandlersTrait</span>的<span class="notranslate">'error'</span>方法，或者另一个指定为此目的的方法（如果未使用上述trait）。
    如果调用控制器方法，为了正确处理其错误，需要在控制器中添加前缀<span class="notranslate">'action'</span>，而在路由中保持无前缀。例如，对于前面的控制器示例，路由大约如下：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.action.route.php', false);  ?>

<p>
    这里需要注意的是，最初调用的是控制器方法<span class="notranslate">'getOne'</span>，而在控制器本身中，该方法是<span class="notranslate">'actionGetOne'</span>。
</p>

<?= Paragraph::h2('ApiPageManagerTrait') ?>

<p>
    实现了通常需要的分页功能。
    添加<span class="notranslate">'getPageInterval'</span>方法，它将分页数据转换为更方便的格式。
    这计算出选择的初始值，这对于与数据库协同工作很有帮助。
</p>

<?= Paragraph::h2('ApiRequestDataManagerTrait') ?>

<p>
    添加方法<span class="notranslate">'check'</span>，允许通过一个数组中的条件检查另一个数组中的数据。
    使用此trait可验证转换为数组的任何传入数据，无论是<span class="notranslate">POST</span>请求参数还是<span class="notranslate">JSON Body</span>。
    开发者可以编写条件列表来验证数据。
    例如，<span class="notranslate">HLEB2</span>框架中的(<span class="notranslate">Request::input()</span>返回一个<span class="notranslate">JSON Body</span>数组):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.body.php', false);  ?>

<p>
    <span class="notranslate"><b>required</b></span> - 必填字段，总是在开头位置。
</p>
<p>
    可能的类型列表(<span class="notranslate">'type'</span> - 必须位于第一位置或在<span class="notranslate">required</span>之后):<br>

    <span class="notranslate"><b>string</b></span> - 检查是否有字符串值，可以限制为<span class="notranslate">minlength</span>和<span class="notranslate">maxlength</span>。<br>
    <span class="notranslate"><b>float</b></span> - 检查类型是否为<span class="notranslate">float(double)</span>，限制可以为<span class="notranslate">max</span>和<span class="notranslate">min</span>。<br>
    <span class="notranslate"><b>int</b></span> - 检查类型是否为<span class="notranslate">int(integer)</span>，限制可以为<span class="notranslate">max</span>和<span class="notranslate">min</span>。<br>
    <span class="notranslate"><b>regex</b></span> - 检查正则表达式，例如<span class="notranslate">'regex:[0-9]+'</span>。<br>
    <span class="notranslate"><b>fullregex</b></span> - 检查完整正则表达式，类似<span class="notranslate">'fullregex:/^[0-9]+$/i'</span>，必须用斜杠括起来，可以包含字符 : 和 |，与较简单的<span class="notranslate">regex</span>不同。<br>
    <span class="notranslate"><b>bool</b></span> - 检查是否为布尔值，仅<span class="notranslate">true</span>或<span class="notranslate">false</span>。<br>
    <span class="notranslate"><b>null</b></span> - 检查是否为<span class="notranslate">null</span>作为有效值。<br>
    <span class="notranslate"><b>void</b></span> - 检查是否为空字符串作为有效值。<br>
</p>
<p>
    枚举类型:<br>
    <span class="notranslate"><b>enum</b></span> - 在可能值中查找，例如<span class="notranslate">'enum:1,2,3,4,south,east,north,west'</span>。<br>
    等值检查不严格，因此4和'4'都是正确的；为了精确匹配，最好伴随类型检查。
</p>
<p>
<p>
    您可以添加两种或更多类型，它们将被包含性地检查所有通用条件，例如<span class="notranslate">'type:string,null,void|minlen:5'</span> - 这意味着字符串应被检查，至少5个字符长，或者为空，或者<span class="notranslate">null</span>值。在所有其他情况下，它会返回<span class="notranslate">false</span>作为验证失败的结果。
</p>
<p>
    您还可以检查具有标准数组字段列表的字段数组（它们将根据统一模板进行检查）：
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.array.php', false);  ?>

<p>
    要检查检查数组中的嵌套数组的值，名称在方括号中指定。
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.example.php', false);  ?>

<p>
    上述条件将返回考虑嵌套性的成功检查。
</p>

<?= Paragraph::h2('测试') ?>

<p>
    <span class="notranslate">API</span> traits使用 <a href="https://github.com/phphleb/api-tests" target="_blank">github.com/phphleb/api-tests</a> 进行测试。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


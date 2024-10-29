<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('日志服务') ?>
<p>
    <b>Log</b> 服务是 <span class="notranslate">HLEB2</span> 框架中的日志机制，可以将错误和消息存储在专用的日志存储中。
    框架中的日志存储原则基于 <span class="notranslate">PSR-3</span>。
</p>
<p>
    默认情况下，框架使用内置的日志记录机制，将日志保存到文件中。
    所有 <span class="notranslate">PHP</span> 错误和应用程序本身的操作都会被记录，还有开发人员在代码中指定的信息和调试日志。
</p>

<p class="hl-info-block">
    框架的标准文件日志保存在项目中的 <span class="notranslate">/storage/logs/</span> 文件夹中。
</p>

<p>
    在控制器（以及从 <span class="notranslate">Hleb\Base\Container</span> 继承的所有类）中使用 <span class="notranslate">Log</span> 的方式，通过添加信息性消息进行说明：
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.container.php', false); ?>

<p>
    应用程序代码中的日志记录示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.static.php', false); ?>

<p>
    还可以通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> 根据 <span class="notranslate">Hleb\Reference\Interface\Log</span> 接口获取 <span class="notranslate">Log</span> 对象。
</p>

<p>
    为了简化，以下示例将仅使用 <span class="notranslate">logger()</span> 函数。
</p>
<p>

    执行前面的示例之一会在 <span class="notranslate">/storage/logs/</span> 目录中创建日志文件（如果之前不存在），并添加以下类似的行：
</p>

<div class="hl-text-block notranslate">
    <div class="hl-nowrap">[13:01:12.211556 10.01.2024 UTC+03] Web:INFO Sample message {/path/to/project/app/Controllers/TestController.php on line 31} {App\Controllers\TestController->get()} GET http://example-domain.ru/test-log 127.0.0.1 #{"request-id":"71cc0539-af41-556d-9c48-2a6cd2d8090f","debug":true}</div>
</div>

<p>
    日志文本显示，输出了一条消息 <span class="notranslate">'Sample message'</span>，具有指定的级别 <span class="notranslate">'INFO'</span>，以及关于日志调用的附加信息、准确时间和基本请求数据。
</p>

<p class="hl-info-block">
    建议不要将日志内含有机密信息和数据发送到第三方服务进行日志存储，因为这些信息和数据的泄露可能导致项目的安全漏洞，并且这些服务可能容易受到攻击。
</p>

<?= Paragraph::h2('日志级别') ?>

<p>
    选择日志级别时，应根据输出数据的内容和重要性进行指导。
    从普通消息到严重错误按递增顺序列表如下：
</p>
<p>
    <span class="notranslate"><b>debug()</b></span> - 调试消息，通常仅在项目开发期间使用。
    默认情况下，框架设置的最大级别为低于 (<span class="notranslate">info</span>)，这些消息将不会保存到日志中。
</p>
<p>
    <span class="notranslate"><b>info()</b></span> - 信息性消息，必要时可以了解代码的特定部分是如何工作的以及是否满足所有条件。
    在此处可以输出具体的SQL查询，以便稍后验证其正确执行。
</p>
<p>
    <span class="notranslate"><b>notice()</b></span> - 系统中事件的通知。
    例如，可以提醒某些重要值的临界值接近，但尚未达到。
</p>
<p>
    <span class="notranslate"><b>warning()</b></span> - 记录异常情况，不作为重大错误，而是作为警告。
    例如，使用已弃用的 <span class="notranslate">API</span>，错误使用 <span class="notranslate">API</span>，以及其他不希望出现的情况。
</p>
<p>
    <span class="notranslate"><b>error()</b></span> - 在某些条件下发生的运行时错误。
    这些错误不需要立即行动，但应记录和监控。
</p>
<p>
    <span class="notranslate"><b>critical()</b></span> - 程序中的严重错误，例如某个组件不可用。
</p>
<p>
    <span class="notranslate"><b>alert()</b></span> - 一般系统不可用，例如数据库故障、整个网站停机等。
    应立即采取行动进行修复。
</p>
<p>
    <span class="notranslate"><b>emergency()</b></span> - 系统完全不可用。
</p>

<?= Paragraph::h2('日志上下文') ?>

<p>
    根据 <span class="notranslate">PSR-3</span>，您可以将命名数据数组作为第二参数传递，用于消息文本中的替换，例如：
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.replace.php', false); ?>

<p>
    在框架的内置日志中，您还可以将其他数据添加到数组中，它们将按键输出到包含 <span class="notranslate">'request-id'</span> 的日志部分。
    第三方日志机制可能不支持此功能。
</p>

<?= Paragraph::h2('替代日志记录器') ?>

<p>
    <span class="notranslate">HLEB2</span> 框架仅支持一个活动的日志记录机制实例；如果需要用第三方日志器替换它，则必须在框架初始化期间完成。
    这种必要性是因为错误记录应从框架本身加载和操作的最开始阶段开始。
</p>

<?= Paragraph::h2('日志设置') ?>

<p>
    在 <span class="notranslate">/config/common.php</span> 文件中：<br>
    <span class="notranslate"><b>log.enabled</b></span> - 启用/禁用日志保存，这在临时禁用日志记录以减少应用程序负载时可能很有用。<br>
    <span class="notranslate"><b>max.log.level</b></span> - 设置最大日志记录级别(从消息到关键错误)。
    例如，如果将级别设置为 <span class="notranslate">'warning'</span>，则<span class="notranslate">'debug'</span>，<span class="notranslate">'info'</span> 和 <span class="notranslate">'notice'</span> 级别的日志将不会被保存。<br>
    <span class="notranslate"><b>max.cli.log.level</b></span> - 当通过终端或任务调度器使用框架时的最大日志记录级别。<br>
    <span class="notranslate"><b>error.reporting</b></span> - 此参数与错误级别有关，但也与日志记录有关，因为它确定哪些错误会进入日志。<br>
    <span class="notranslate"><b>log.sort</b></span> - 对于标准文件日志记录，将日志按源（网站域）拆分。<br>
    <span class="notranslate"><b>log.stream</b></span> - 如果指定，则将日志输出到指定的输出流，例如在 <span class="notranslate">'/dev/stdout'</span> 中。<br>

    <span class="notranslate"><b>log.format</b></span> - 标准日志记录可用两种格式，<span class="notranslate">'row'</span>（默认）和 <span class="notranslate">'json'</span> ，后者将日志输出转换为 <span class="notranslate">JSON</span> 格式。<br>
</p>
<p>
    在 <span class="notranslate">/config/main.php</span> 文件中：<br>
    <span class="notranslate"><b>db.log.enabled</b></span> - 记录所有对数据库的请求。
</p>

<?= Paragraph::h2('使用示例') ?>
<p>
    展示错误日志记录和常规信息日志之间差异的通用示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.example.php', false); ?>

<?= Paragraph::h2('查看日志') ?>

<p>
    通过文件标准存储日志时，可以使用控制台命令在终端中显示最新添加的日志：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console  --logs 3 5</p>

<p>
    指定的命令将显示最近五个日志文件的最后三个日志记录。
</p>
<p>
    在日志记录（默认为文件）中，每个日志条目都有一个 <span class="notranslate">"request-id"</span> 标签，可用于筛选特定请求的所有日志。<br>
    对于 <span class="notranslate">UNIX</span> 系统和 macOS，可以使用 <span class="notranslate">'grep'</span> 命令按错误类型搜索：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>grep -m10 :ERROR ./storage/logs/*</p>

<p>
    此命令的灵活性允许在各种条件下搜索，包括按请求的 <span class="notranslate">"request-id"</span>。
</p>
<p>
    对于 <span class="notranslate">Windows</span>，可以使用 <span class="notranslate">'findstr'</span> 命令作为替代：
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">D:\project></span>findstr /S /C:":ERROR" "storage/logs/*"</p>

<?= Paragraph::h2('日志轮替') ?>

<p>
    框架中包含 <span class="notranslate">App\Commands\RotateLogs</span> 类，这是用于删除过期日志文件的控制台命令实现。
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console rotate-logs 5</p>

<p>
    此命令将删除五天前创建的所有日志文件。
    默认情况下设为三天。
    该命令适用于手动轮替或添加到任务调度程序（每日执行）。
</p>
<p>
    若要让框架自动监控日志文件的最大大小，请在 <span class="notranslate">/config/common.php</span> 文件中设置 <span class="notranslate">'max.log.size'</span> 选项。
    该值以兆字节（MB）为单位指定。
    但在启用该设置的情况下，如果当天日志量意外过大，可能会删除前一天的所有日志。
</p>

<?= Link::previousPage('docs.2.0.service.cache.page', '缓存'); ?>

<?= Link::nextPage('docs.2.0.service.path.page', 'Path'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

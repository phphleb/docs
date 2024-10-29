<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

hl_realpath("@app/");

?>
<?= Paragraph::h1('文件路径管理器') ?>

<p>
    为了应用程序的多功能性和可移植性，所有涉及项目中文件和目录路径引用的操作都必须相对于其根目录。
</p>
<p>
    在<span class="notranslate">HLEB2</span>框架中，文件路径管理由<b>Path</b>服务处理。
    它通过提供对相应<span class="notranslate">PHP</span>函数的封装，使项目中相对文件路径的操作变得更加方便。
</p>
<p>
    在控制器中使用<span class="notranslate">Path</span>（以及从<span class="notranslate">Hleb\Base\Container</span>继承的所有类）的示例，通过该示例可以从根目录获取完整路径：
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.container.php', false);  ?>

<p>
    在应用程序代码中定义文件路径的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.static.php', false);  ?>

<p>
    还可以通过<a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a>并使用<span class="notranslate">Hleb\Reference\Interface\Path</span>接口来获取<span class="notranslate">Path</span>对象。
</p>
<p>
    为简化示例，接下来的示例仅包含通过<span class="notranslate">Hleb\Static\Path</span>的使用。
</p>

<?= Paragraph::h2('符号@') ?>
<p>
    在上面的示例中，相对路径的开头有一个 '@' 符号。它表示路径从项目的根目录开始。<br>
    如果项目的根目录是 <span class="notranslate">/var/www/hleb/</span>，则示例将返回字符串 <span class="notranslate">'/var/www/hleb/storage/public/files'</span>。
    在 <span class="notranslate">Windows</span> 上，结果会略有不同，但它仍然是指向指定文件夹的有效完整路径。
</p>
<p>
    前缀 <span class="notranslate">'@storage'</span> 在框架中是预定义的。以下是其他指定映射的列表：
</p>
<p>
    <b>'@'</b> - 项目使用 <span class="notranslate">HLEB2</span> 框架的根目录。
    路径可以随意指定，例如 <span class="notranslate">'@/other/folder'</span>。<br>
    <span class="notranslate"><b>'@app'</b></span> - 项目 <span class="notranslate">/app/</span> 文件夹的路径。<br>
    <span class="notranslate"><b>'@public'</b></span> - 项目 <span class="notranslate">/public/</span> 文件夹的路径，存放公共项目文件，Web 服务器指向此文件夹。
    即使更改了名称，它仍然会对应 <span class="notranslate">'@public'</span>。<br>
    <span class="notranslate"><b>'@storage'</b></span> - 项目 <span class="notranslate">/storage/</span> 文件夹的路径，用于存储缓存、日志和其他辅助文件。<br>
    <span class="notranslate"><b>'@resources'</b></span> - 项目 <span class="notranslate">/resources/</span> 文件夹的路径。
    该文件夹包含项目的各种资源：页面模板、邮件模板、构建模板等。<br>
    <span class="notranslate"><b>'@views'</b></span> - 项目 <span class="notranslate">/resources/views/</span> 文件夹的路径。<br>
    <span class="notranslate"><b>'@modules'</b></span> - 项目 <span class="notranslate">/modules/</span> 文件夹的路径，即使模块目录名称在设置中已更改。<br>
    <span class="notranslate"><b>'@vendor'</b></span> - 项目的库文件夹的路径，即使文件夹名称不同，它仍然保持不变。<br>
</p>
<p>
    因此，项目内的任何路径都是允许的，因此即使在具有不同目录结构的服务器上转移或移动到另一个文件夹也不会成为问题，因为路径总是会指向正确的位置。
</p>
<p>
    <span class="notranslate">Path</span> 服务有几个方法可以正确识别以 '@' 开头的相对路径。
</p>

<p class="hl-info-block">
    对于带有相对路径的字符串，例如 <span class="notranslate">'@storage/logs/'</span>，末尾的斜杠是有意义的。在这种情况下，方法返回的完整路径将包括末尾的斜杠。
</p>

<?= Paragraph::h2('getReal()') ?>

<p>
    <span class="notranslate">getReal()</span> 方法在上面的示例中可以看到。
    它返回从相对路径派生的完整路径字符串。
    如果指定的路径不存在，该方法返回 <span class="notranslate">false</span>。<br>
    框架函数 <span class="notranslate"><b>hl_realpath()</b></span> 以同样的方式工作。
</p>

<?= Paragraph::h2('get()') ?>

<p>
    <span class="notranslate">get()</span> 方法与 <span class="notranslate">getReal()</span> 的不同之处在于即使路径不存在，它也会返回完整路径的字符串，而不检查存在性。<br>
    函数 <span class="notranslate"><b>hl_path()</b></span> 可用作该方法的替代。
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.get.php', false);  ?>

<?= Paragraph::h2('relative()') ?>

<p>
    该方法与 <span class="notranslate">Path</span> 服务的其他方法不同，它接受完整路径并返回以 '@' 开头的相对路径。
    有时需要在项目日志或其他地方输出相对路径，以隐藏完整路径。
    <span class="notranslate">relative()</span> 方法在这种情况下非常有用。
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.relative.php', false);  ?>

<p>
    示例显示了获取当前文件相对路径的过程。
</p>

<?= Paragraph::h2('createDirectory()') ?>

<p>
    <span class="notranslate">createDirectory()</span> 方法通过指定的相对路径（以 '@' 开头）或完整路径创建一个目录（如果不存在），包括所有嵌套的子文件夹。
</p>

<?= Paragraph::h2('exists()') ?>

<p>
    <span class="notranslate">exists()</span> 方法用于检查文件或目录是否存在。
    它接受完整路径和以 '@' 开头的相对路径。<br>
    框架函数 <span class="notranslate"><b>hl_file_exists()</b></span> 具有类似的作用。
</p>

<?= Paragraph::h2('contents()') ?>

<p>
    <span class="notranslate">contents()</span> 方法是 <span class="notranslate">file_get_contents()</span> 的包装，但除了接受完整路径以外，还可以接受以 '@' 开头的相对路径。<br>
    框架函数 <span class="notranslate"><b>hl_file_get_contents()</b></span> 也能实现这个方法。
</p>

<?= Paragraph::h2('put()') ?>

<p>
    该方法类似于 <span class="notranslate">file_put_contents()</span> 函数。
    除了完整路径之外，<span class="notranslate">put()</span> 方法还接受以 '@' 开头的相对路径。<br>
    框架函数 <span class="notranslate"><b>hl_file_put_contents()</b></span> 可替代使用这个方法。
</p>

<?= Paragraph::h2('isDir()') ?>

<p>
    <span class="notranslate">isDir()</span> 方法是 <span class="notranslate">is_dir()</span> 函数的包装，它可以接受完整路径和以 '@' 开头的相对路径。<br>
    可以使用函数 <span class="notranslate"><b>hl_is_dir()</b></span> 代替这个方法。
</p>

<?= Paragraph::h2('异步请求') ?>

<p class="hl-danger-block">
    某些文件操作，如写入文件，对于异步调用是阻塞的，因此建议使用它们的支持异步的替代方法。
</p>

<?= Link::previousPage('docs.2.0.service.log.page', '日志记录'); ?>

<?= Link::nextPage('docs.2.0.service.db.page', '数据库服务'); ?><br><br>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

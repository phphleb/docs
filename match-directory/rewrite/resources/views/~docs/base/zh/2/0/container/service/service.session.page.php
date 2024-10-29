<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('会话') ?>

<p>
    在 <span class="notranslate">HLEB2</span> 框架中，用户会话机制由 <span class="notranslate"><b>Session</b></span> 服务提供—这是 PHP 会话管理函数的一个简单封装。
</p>
<p>
    使用 <span class="notranslate">Session</span> 在控制器中（以及所有继承自 <span class="notranslate">Hleb\Base\Container</span> 的类）的示例，例如从会话中获取值：
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.container.php', false);  ?>

<p>
    在应用程序代码中访问会话的示例：
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.static.php', false);  ?>

<p>
    通过 <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a> ，也可以通过接口 <span class="notranslate">Hleb\Reference\Interface\Session</span> 获取 <span class="notranslate">Session</span> 对象。
</p>

<p>
    为简化示例，以下内容将仅包括通过 <span class="notranslate">Hleb\Static\Session</span> 进行访问。
</p>

<p class="hl-info-block">
    在 Session 服务的标准实现中，其方法使用全局变量 $_SESSION 进行相应处理。
</p>

<?= Paragraph::h2('get()') ?>

<p>
    get() 方法按参数名检索会话数据。
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.get.php', false);  ?>

<?= Paragraph::h2('set()') ?>

<p>
    set() 方法允许按名称分配会话数据。
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.set.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    delete() 方法按名称删除会话数据。
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    clear() 方法清除所有会话数据。
</p>

<?= Paragraph::h2('all()') ?>

<p>
    all() 方法返回包含所有会话数据的数组。
</p>

<?= Paragraph::h2('getSessionId()') ?>

<p>
    getSessionId() 方法返回当前会话标识符。<br>
    会话标识符可以在 /config/system.php 文件中的 'session.name' 配置项中修改，初始值为 'PHPSESSID'。
</p>

<?= Paragraph::h2('异步模式') ?>

<p>
    在异步使用框架时，Session 服务的方法以类似方式工作，但采用不同的设置和读取机制。
</p>

<?= Link::previousPage('docs.2.0.service.db.page', 'DB'); ?>

<?= Link::nextPage('docs.2.0.service.cookies.page', 'Cookies'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

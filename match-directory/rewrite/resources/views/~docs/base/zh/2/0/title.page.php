<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('文档') ?><br>

<?= Paragraph::h2('前言') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.introduction.page'); ?>">介绍</a></b>.
    HLEB2 框架学习的前言。
</p>

<?= Paragraph::h2('安装与设置') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.installation.page'); ?>">项目安装</a></b>.
    部署项目的方法。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.tuning.page'); ?>">框架配置</a></b>.
    框架的基本配置设置。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.configuration.page'); ?>">配置参数</a></b>.
    主要的全局设置。
</p>

<?= Paragraph::h2('项目结构') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.directories.page'); ?>">项目结构</a></b>.
    项目目录的概述。
</p>

<?= Paragraph::h2('运行应用程序') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.start.php-server.page'); ?>">PHP 服务器</a></b>.
    内置的 PHP 服务器。
</p>
<p>

    <b><a href="<?= Link::url('docs.2.0.start.nginx.page'); ?>">Nginx</a></b>.
    使用流行的网络服务器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.apache.page'); ?>">Apache</a></b>.
    一个历经考验的 HTTP 服务器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>">RoadRunner</a></b>.
    一个用 Go 编写的异步 web 服务器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.workerman.page'); ?>">Workerman</a></b>.
    一个用 PHP 编写的异步 web 服务器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.swoole.page'); ?>">Swoole</a></b>.
    一个作为 PHP 扩展的异步服务器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.start.hosting.page'); ?>">托管</a></b>.
    在托管环境上的安装细节。
</p>

<?= Paragraph::h2('路由') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.routes.page'); ?>">路由</a></b>.
    页面地址路由的处理程序。
</p>

<?= Paragraph::h2('控制器') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">控制器</a></b>.
    处理路由的标准类。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">模块</a></b>.
    项目的独立部分。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">中间件</a></b>.
    用于处理请求的辅助类。
</p>

<?= Paragraph::h2('模型') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.models.page'); ?>">模型</a></b>.
    负责数据的 MVC 组件。
</p>

<?= Paragraph::h2('模板') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">标准模板</a></b>.
    返回的数据结构。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.cached.page'); ?>">缓存模板</a></b>.
    使用模板缓存。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.template.twig.page'); ?>">TWIG 模板引擎</a></b>.
    框架的替代模板引擎。
</p>

<?= Paragraph::h2('控制台命令') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.console.command.page'); ?>">控制台命令</a></b>.
    从终端运行的任务。
</p>

<?= Paragraph::h2('容器') ?>


<p>
    <b><a href="<?= Link::url('docs.2.0.container.container.page'); ?>">容器结构</a></b>.
    访问服务。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.get.page'); ?>">获取服务</a></b>.
    利用容器的方法。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.di.page'); ?>">依赖注入</a></b>.
    在框架中实现 DI。
</p>

<?= Paragraph::h2('服务') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.service.request.page'); ?>">请求</a></b>.
    管理请求数据的对象。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.response.page'); ?>">响应</a></b>.
    构建返回数据。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.cache.page'); ?>">缓存</a></b>.
    基于文件的数据缓存。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.log.page'); ?>">日志</a></b>.
    通用的日志记录机制。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.path.page'); ?>">路径</a></b>.
    管理相对路径的管理器。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.db.page'); ?>">数据库</a></b>.
    基于 PHP PDO 的基本封装。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.session.page'); ?>">会话</a></b>.
    方便地处理 HTTP 会话。
</p>
<p>

    <b><a href="<?= Link::url('docs.2.0.service.cookies.page'); ?>">Cookies</a></b>.
    接收和发送 cookies。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.redirect.page'); ?>">重定向</a></b>.
    重定向到另一个页面。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.router.page'); ?>">路由器</a></b>.
    与路由数据的交互。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.settings.page'); ?>">设置</a></b>.
    各种框架设置。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.csrf.page'); ?>">Csrf</a></b>.
    防止跨站请求伪造。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.service.converter.page'); ?>">转换器</a></b>.
    转换为 PSR 标准。
</p>

<?= Paragraph::h2('事件') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.events.page'); ?>">事件</a></b>.
    支持执行动作。
</p>

<?= Paragraph::h1('附加') ?>

<p>
    框架的特殊功能，在某些情况下可能会很有用。
</p>


<?= Paragraph::h2('控制台命令') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.name.page'); ?>">自定义命令名称</a></b>,
    包括快捷方式。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">可自定义的命令参数</a></b>.
    命名参数。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">MVC 模板控制台生成</a></b>
    （模型-视图-控制器）。
</p>

<?= Paragraph::h2('异步') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.async.async.interface.page'); ?>">状态重置</a></b>
    用于异步请求。
</p>

<?= Paragraph::h2('容器和服务') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">向容器中添加服务</a></b>。
    一个真实案例中。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">重写标准服务</a></b>
    或者删除它。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.container.extended.prof.page'); ?>">自定义
            使用</a></b> 容器。更复杂的示例。
</p>


<?= Paragraph::h2('Web 控制台') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Web 控制台</a></b>。
    一个安全的 HTTP 终端。
</p>

<?= Paragraph::h2('测试') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.testing.page'); ?>">测试</a></b>
    基于框架的软件结构。
</p>

<?= Paragraph::h2('扩展') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.hlogin.page'); ?>">HLOGIN - 注册模块</a></b>
    和认证。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.adminpan.page'); ?>">管理面板模块</a></b>
    或公开网站。
</p>
<p>
    <b><a href="<?= Link::url('docs.2.0.api.page'); ?>">用于创建 API 的 Traits</a></b>。
    分页和验证器。
</p>

<?= Paragraph::h2('函数') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.functions.page'); ?>">内置函数</a></b>
    框架的。
</p>

<?= Paragraph::h2('项目信息') ?>

<p>
    <b><a href="<?= Link::url('docs.2.0.about.page'); ?>">项目信息</a></b>
    作为后记。
</p>


<br><br>


<?php insertTemplate('/docs/zh/footer') ?>;

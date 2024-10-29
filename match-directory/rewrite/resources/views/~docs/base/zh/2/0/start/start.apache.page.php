<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Apache') ?>

<p>
    项目的公共文件夹中包含一个 <span class="notranslate">.htaccess</span> 文件，具有运行 <span class="notranslate">HLEB2</span> 框架所需的设置。<br><br>
    在将框架与 <span class="notranslate">Apache</span> 一起使用之前，请确保启用 <span class="notranslate">mod_rewrite</span> 模块，以便服务器可以处理 <span class="notranslate">.htaccess</span> 文件。
</p>
<p>
    通过设置 <span class="notranslate">Apache</span> 的基本配置。默认情况下，这些设置已在 <span class="notranslate">/public/.htaccess</span> 中指定，但在使用 <span class="notranslate">.htaccess</span> 文件时，请确保 <span class="notranslate">AllowOverride</span> 设置为 <span class="notranslate">All</span>。
</p>

<pre class="hl-text-block">
&lt;VirtualHost *:80&gt;
ServerName mysite.com
# 公共文件夹的路径
DocumentRoot    /var/www/mysite.com/public/

# 如果不使用 .htaccess
&lt;Directory /var/www/mysite.com/public/&gt;
AddDefaultCharset UTF-8
    &lt;IfModule mod_rewrite.c&gt;
      &lt;IfModule mod_negotiation.c&gt;
        Options +FollowSymLinks -MultiViews -Indexes
      &lt;/IfModule&gt;
      RewriteEngine on
      # 将所有请求重定向到 index.php
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^ index.php [L]
    &lt;/IfModule&gt;
&lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>

<p>
    启动服务器后，您可以在浏览器地址栏中输入之前分配的（本地或远程服务器上）资源地址来验证安装。
</p>

<?= Link::previousPage('docs.2.0.start.nginx.page', '使用 Nginx 运行'); ?>

<?= Link::nextPage('docs.2.0.start.roadrunner.page', 'RoadRunner 服务器'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

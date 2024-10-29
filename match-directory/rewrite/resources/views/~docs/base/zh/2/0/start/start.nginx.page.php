<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Nginx') ?>

<p>
    使用 <span class="notranslate">Nginx</span>（或其分支 <span class="notranslate">Angie</span>）运行 <span class="notranslate">HLEB2</span> 框架可以通过 <span class="notranslate">nginx + PHP-FPM</span> 或 <span class="notranslate">nginx + apache</span>，以及使用 <span class="notranslate">NGINX Unit</span> 来实现。<br>
    本指南将仅介绍最常见的 <span class="notranslate">nginx + PHP-FPM</span> 选项。
</p>
<p>
    <b><span class="notranslate">Nginx + PHP-FPM</span></b> 的基本配置：
</p>

<pre class="hl-text-block notranslate">
server {
    listen 80;
    server_name mysite.com;

    # 公共文件夹的路径
    root /var/www/mysite.com/public/;

    index index.php;

    location / {
        # 将所有请求重定向到 index.php
        try_files   $uri $uri/ /index.php?$query_string;
    }

    # 用 FPM 处理 PHP 文件
    location ~ \.php$ {
        try_files $uri =404;
        include /etc/nginx/fastcgi.conf;
        # 所需 PHP 版本的套接字路径
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    # 隐藏特定文件
    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
</pre>

<p>
    启动服务器后，您可以在浏览器地址栏中输入之前分配的（本地或远程服务器上）资源地址来验证安装。
</p>

<?= Link::previousPage('docs.2.0.start.php-server.page', '使用 PHP 服务器'); ?>

<?= Link::nextPage('docs.2.0.start.apache.page', '使用 Apache 运行'); ?><br><br>


<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>

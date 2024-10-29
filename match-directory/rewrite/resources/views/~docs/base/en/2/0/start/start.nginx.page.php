<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Nginx') ?>

<p>
    Running the <span class="notranslate">HLEB2</span> framework using <span class="notranslate">Nginx</span> (or its fork <span class="notranslate">Angie</span>) can be accomplished with either <span class="notranslate">nginx + PHP-FPM</span> or <span class="notranslate">nginx + apache</span>, as well as with <span class="notranslate">NGINX Unit</span>.<br>
    This guide will only cover the <span class="notranslate">nginx + PHP-FPM</span> option as it is the most common.
</p>
<p>
    Basic configuration for <b><span class="notranslate">Nginx + PHP-FPM</span></b>:
</p>

<pre class="hl-text-block notranslate">
server {
    listen 80;
    server_name mysite.com;

    # Path to the public folder
    root /var/www/mysite.com/public/;

    index index.php;

    location / {
        # Redirect all requests to index.php
        try_files   $uri $uri/ /index.php?$query_string;
    }

    # Process PHP files with FPM
    location ~ \.php$ {
        try_files $uri =404;
        include /etc/nginx/fastcgi.conf;
        # Path to the socket with the required PHP version
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    # Hide specific files
    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
</pre>

<p>
    After starting the server, you can verify the installation by entering the previously assigned (locally or on a remote server) resource address in the browser's address bar.
</p>

<?= Link::previousPage('docs.2.0.start.php-server.page', 'Using PHP Server'); ?>

<?= Link::nextPage('docs.2.0.start.apache.page', 'Running with Apache'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

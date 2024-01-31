<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Nginx') ?>

<p>
    Запуск фреймворка <span class="notranslate">HLEB2</span> с использованием <span class="notranslate">Nginx</span> (или его форка <span class="notranslate">Angie</span>) может быть выполнен как с <span class="notranslate">nginx + PHP-FPM</span>, так и <span class="notranslate">nginx + apache</span>, а также с помощью <span class="notranslate">NGINX Unit</span>.<br>
    В этой инструкции будет рассмотрен только вариант с <span class="notranslate">nginx + PHP-FPM</span> как самый распространённый.
</p>
<p>
    Базовая настройка <b><span class="notranslate">Nginx + PHP-FPM</span></b>:
</p>

<pre class="hl-text-block notranslate">
server {
    listen 80;
    server_name mysite.com;

    # Путь к папке public
    root /var/www/mysite.com/public/;

    index index.php;

    location / {
        # Направление всех запросов в index.php
        try_files   $uri $uri/ /index.php?$query_string;
    }

    # Обработка php файлов с помощью fpm
    location ~ \.php$ {
        try_files $uri =404;
        include /etc/nginx/fastcgi.conf;
        # Путь до сокета с нужной версией PHP
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    # Скрытие специализированных файлов
    location ~ /\.(ht|svn|git) {
        deny all;
    }
}
</pre>

<p>
    После запуска сервера можно проверить установку, набрав в адресной строке браузера назначенный ранее (локально или на удаленном сервере) адрес ресурса.
</p>

<?= Link::previousPage('docs.2.0.start.php-server.page', 'Использование PHP-сервера'); ?>

<?= Link::nextPage('docs.2.0.start.apache.page', 'Запуск с помощью Apache'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

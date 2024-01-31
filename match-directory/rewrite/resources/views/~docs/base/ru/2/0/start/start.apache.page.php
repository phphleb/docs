<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Apache') ?>

<p>
    Публичная папка проекта включает файл <span class="notranslate">.htaccess</span> с необходимыми настройками для запуска фреймворка <span class="notranslate">HLEB2</span>.<br><br>
    Прежде чем использовать фреймворк с <span class="notranslate">Apache</span>, обязательно включите модуль <span class="notranslate">mod_rewrite</span>, чтобы файл <span class="notranslate">.htaccess</span> обрабатывался сервером.
</p>
<p>
    Базовая настройка <span class="notranslate">Apache</span> через конфигурацию. По умолчанию в <span class="notranslate">/public/.htaccess</span> уже заданы эти настройки, но при использовании файла <span class="notranslate">.htaccess</span> нужно убедиться, что <span class="notranslate">AllowOverride</span> здесь выставлено как <span class="notranslate">All</span>.
</p>

<pre class="hl-text-block">
&lt;VirtualHost *:80&gt;
ServerName mysite.com
# Путь к папке public
DocumentRoot    /var/www/mysite.com/public/

# Если .htaccess не используется
&lt;Directory /var/www/mysite.com/public/&gt;
AddDefaultCharset UTF-8
    &lt;IfModule mod_rewrite.c&gt;
      &lt;IfModule mod_negotiation.c&gt;
        Options +FollowSymLinks -MultiViews -Indexes
      &lt;/IfModule&gt;
      RewriteEngine on
      # Направление всех запросов в index.php
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^ index.php [L]
    &lt;/IfModule&gt;
&lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>

<p>
    После запуска сервера можно проверить установку, набрав в адресной строке браузера назначенный ранее (локально или на удаленном сервере) адрес ресурса.
</p>

<?= Link::previousPage('docs.2.0.start.nginx.page', 'Запуск с помощью Nginx'); ?>

<?= Link::nextPage('docs.2.0.start.roadrunner.page', 'Сервер RoadRunner'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

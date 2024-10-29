<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Apache') ?>

<p>
    The project's public folder includes a <span class="notranslate">.htaccess</span> file with the necessary settings for running the <span class="notranslate">HLEB2</span> framework.<br><br>
    Before using the framework with <span class="notranslate">Apache</span>, make sure to enable the <span class="notranslate">mod_rewrite</span> module so that the <span class="notranslate">.htaccess</span> file is handled by the server.
</p>
<p>
    Basic configuration of <span class="notranslate">Apache</span> through setup. By default, these settings are already specified in <span class="notranslate">/public/.htaccess</span>, but when using the <span class="notranslate">.htaccess</span> file, ensure that <span class="notranslate">AllowOverride</span> is set to <span class="notranslate">All</span> here.
</p>

<pre class="hl-text-block">
&lt;VirtualHost *:80&gt;
ServerName mysite.com
# Path to the public folder
DocumentRoot    /var/www/mysite.com/public/

# If .htaccess is not used
&lt;Directory /var/www/mysite.com/public/&gt;
AddDefaultCharset UTF-8
    &lt;IfModule mod_rewrite.c&gt;
      &lt;IfModule mod_negotiation.c&gt;
        Options +FollowSymLinks -MultiViews -Indexes
      &lt;/IfModule&gt;
      RewriteEngine on
      # Redirect all requests to index.php
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule ^ index.php [L]
    &lt;/IfModule&gt;
&lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>

<p>
    After starting the server, you can verify the installation by entering the previously assigned (locally or on a remote server) resource address in the browser's address bar.
</p>

<?= Link::previousPage('docs.2.0.start.nginx.page', 'Running with Nginx'); ?>

<?= Link::nextPage('docs.2.0.start.roadrunner.page', 'RoadRunner Server'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

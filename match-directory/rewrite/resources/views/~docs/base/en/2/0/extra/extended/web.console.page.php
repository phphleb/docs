<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Web Console') ?>

<p>
    In the <span class="notranslate">HLEB2</span> framework, a special Web Console provides access through the user's browser for executing console commands. Only framework commands are supported, meaning those starting with <span class="notranslate">'php console'</span>.
</p>
<p>
    By default, the Web Console is disabled for security reasons.
</p>
<p>
    To specify the application page on which to display the Web Console, create a route for this with an address.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.route.php', false);  ?>

<p>
    You also need to create a template that outputs an <span class="notranslate">HTML</span> form for the Web Console:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.template.php');  ?>

<p>
    Now the Web Console is available at the relative address <span class="notranslate">'/web-console'</span> of the site. Additionally, you need to copy the key from the file <span class="notranslate"><span class="hl-nowrap">'/storage/keys/web-console.key'</span></span> and use it to access the command execution form.
</p>

<p class="hl-text-block">
    <img src="/docs/images/webconsole.png">
</p>

<p class="hl-info-block">
    Commands that require user input will not work through the Web Console.
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


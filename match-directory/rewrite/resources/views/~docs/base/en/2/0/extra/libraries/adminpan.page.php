<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Administrative Panel') ?>

<p>
    The 'Administrative Panel' module in the <span class="notranslate">HLEB2</span> framework is an extension to the <span class="notranslate">HLOGIN</span> registration library, but it can also be used independently as one or more administrative panels on a single site or as a public frontend for a website.
</p>
<p>
    This library was used to create the look of this framework documentation site without significant modifications.
</p>

<?= Paragraph::h2('Installation') ?>

<p>
    Using <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/adminpan</p>

<?= Paragraph::h2('Configuration') ?>

<p>
    By running the following command, the <span class="notranslate">adminpan.php</span> file, describing how to build a menu structure for the administrative panel, will be copied to the <span class="notranslate">/config/structure/</span> directory.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/adminpan add</p>

<p>
    Initially, the <span class="notranslate">/config/structure/adminpan.php</span> file contains an empty array, with no menu sections defined.
    Menu sections are assigned by specifying special route names (or standard links).
    Example for a demo route:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.route.php', false);  ?>

<p>
    Here, it specifies that for the menu <span class="notranslate">'adminpan'</span> (named the same as the <span class="notranslate">adminpan.php</span> file), the <span class="notranslate">URL</span> <span class="notranslate">'/{lang}/panel/page/default'</span> is assigned the <span class="notranslate">page()</span> controller of the <span class="notranslate">ExamplePanelController</span> class, targeting the <span class="notranslate">'index'</span> method.
    Additionally, the route has a name <span class="notranslate">'adminpan.default'</span>, which is needed for mapping to a section in the menu.
    Now the first menu item can be created in the <span class="notranslate">/config/structure/adminpan.php</span> file.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.config.php');  ?>

<p>
    The menu can contain nested dropdown lists (<span class="notranslate">'section'</span>), currently there's only one assigned with a single item.
</p>
<p>
    If you navigate to the URL <span class="notranslate">'/ru/panel/page/default'</span>, the design will be set to <span class="notranslate">'base'</span> (from the settings) for the page. Also, the menu will have the 'Main Menu' with the active item 'Test Page' where content from the <span class="notranslate">ExamplePanelController</span> will be displayed.
</p>
<p>
    When used in conjunction with the <span class="notranslate">HLOGIN</span> library, the admin panel routes may be accessible only to a specific type of user (authenticated).
</p>
<p>
    For a deeper understanding of the admin panel operation, you can deploy <a href="https://github.com/phphleb/docs/" target="blank">this site locally</a> and explore its menu structure.
</p>
<p>
    Library repository: <span class="notranslate"><a href="https://github.com/phphleb/adminpan" target="blank">github.com/phphleb/adminpan</a></span>
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


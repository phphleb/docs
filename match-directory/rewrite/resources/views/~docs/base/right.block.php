<?php
/** @var array $versions $ */
?><a href="/">
    <h2 class="hl-right-title">HLEB2</h2>
</a>

<form class="hl-pan-menu-version-content">
    <select class="hl-pan-menu-version-select" name="version">
        <?php
         foreach($versions as $version => $link) {
             echo "<option value=\"{$link}\">v {$version}</option>";
         }
        ?>
    </select>
</form>

<span class="hl-line-gh">
    <a href="https://github.com/phphleb/hleb/">
        <img src="/docs/svg/github2.svg" width="36" height="36" alt="phphleb" title="Project on GitHub">
    </a>
</span>

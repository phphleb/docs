<?php

use Phphleb\Docs\Config;
use Phphleb\Docs\Src\Paragraph;
?>
<?= Paragraph::h1('搜索文档') ?>

<p class="hl-nowrap hl-search-block">
    <input type="text" class="hl-search" value="">
    <button class="hl-search-button">
        <img src="/docs/svg/magnifier.svg?v=<?= Config::API_VERSION ?>" width="20" height="20">
    </button>
</p>
<p>
    <div class="hl-search-result"> </div>
</p>


<?php insertTemplate('/docs/zh/footer'); ?>

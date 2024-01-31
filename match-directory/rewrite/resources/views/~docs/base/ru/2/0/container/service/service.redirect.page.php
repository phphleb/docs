<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Перенаправление') ?>

<p>
    Сервис <span class="notranslate"><b>Redirect</b></span> содержит способ перенаправления на внутреннюю страницу или полный <span class="notranslate">URL</span>.
</p>
<p>
    Так как этот сервис основан на заголовке <span class="notranslate">'Location'</span>, то он должен применятся до вывода какого-либо контента.
    Перенаправление может быть осуществлено в контроллере или <span class="notranslate">middleware</span>, например:
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.container.php', false);  ?>

<p>
    Также объект <span class="notranslate">Redirect</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Redirect</span>.
</p>

<p>
    Для редиректа на адрес по названию маршрута используйте <span class="notranslate">Redirect</span> совместно с сервисом <a href="<?= Link::url('docs.2.0.service.router.page'); ?>">Router</a>, позволяющим получить этот адрес.
</p>

<?= Code::fromFile('@views/docs/code/container/service/redirect/get.redirect.route.php', false);  ?>

<?= Link::previousPage('docs.2.0.service.cookies.page', 'Cookies'); ?>

<?= Link::nextPage('docs.2.0.service.router.page', 'Router'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

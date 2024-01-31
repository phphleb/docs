<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Сервис Router') ?>

<p>
    Для взаимодействия с данными маршрутов во фреймворке <span class="notranslate">HLEB2</span> предназначен сервис <span class="notranslate"><b>Router</b></span>.
</p>
<p>
    Способы использования <span class="notranslate">Router</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере формирования относительного URL по названию маршрута:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.container.php', false);  ?>

<p>
    Пример обращения к <span class="notranslate">Router</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/get.router.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Router</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Router</span>.
</p>
<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">Hleb\Static\Router</span>.
</p>

<?= Paragraph::h2('url()') ?>

<p>
    Метод <span class="notranslate">url()</span> предназначен для преобразования названия маршрута в относительный адрес <span class="notranslate">URL</span>.
    Простой пример:
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/simple.router.url.php', false);  ?>

<p>
    Так как в адресе маршрута могут быть динамические параметры и не обязательная последняя часть, то при их наличии нужно указать это в дополнительных аргументах.
</p>

<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.route.php', false);  ?>
<?= Code::fromFile('@views/docs/code/container/service/router/dynamic.router.url.php', false);  ?>

<?= Paragraph::h2('address()') ?>

<p>
    Метод <span class="notranslate">address()</span> аналогичен методу <span class="notranslate">url()</span>, только возвращает полный <span class="notranslate">URL</span> адрес с <span class="notranslate">HTTP</span>-схемой и доменным именем из текущего запроса.
    Так как домен присваивается только текущий, для другого домена используйте конкатенацию с <span class="notranslate">Route::url()</span>.
</p>

<p class="hl-info-block">
    Возвращаемый адрес для указанных методов будет содержать конечный слеш или не содержать в зависимости от соответствующих настроек фреймворка.
</p>
<p class="hl-info-block">
    Встроенные функции фреймворка <span class="notranslate">url()</span> и <span class="notranslate">address()</span> представляют собой сокращённое написание вызова одноимённых методов <span class="notranslate">Router</span>.
</p>


<?= Paragraph::h2('name()') ?>

<p>
    При помощи метода <span class="notranslate">name()</span> можно узнать название текущего маршрута, если оно ему назначено.
</p>

<?= Paragraph::h2('data()') ?>

<p>
    Метод <span class="notranslate">data()</span> возвращает данные для текущего <span class="notranslate">middleware</span>, если они были установлены в маршруте, он может быть использован только в <span class="notranslate">middleware</span>.
</p>


<?= Link::previousPage('docs.2.0.service.redirect.page', 'Redirect'); ?>

<?= Link::nextPage('docs.2.0.service.settings.page', 'Settings'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

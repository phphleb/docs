<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Cookies') ?>

<p>
    Для обработки <span class="notranslate">HTTP cookies</span> во фреймворке <span class="notranslate">HLEB2</span> предназначен сервис <span class="notranslate"><b>Cookies</b></span>.
</p>
<p>
    Способы использования <span class="notranslate">Cookies</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения значения из <span class="notranslate">cookies</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.container.php', false);  ?>

<p>
    Пример обращения к <span class="notranslate">cookies</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.cookie.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Cookies</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Cookie</span>.
</p>

<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate"><span class="notranslate">Hleb\Static\Cookies</span></span>.
</p>

<?= Paragraph::h2('get()') ?>

<p>
    Метод <span class="notranslate">get()</span> возвращает <span class="notranslate">cookie</span> по названию в виде объекта.
    При помощи этого объекта можно получить как необработанные данные, так и преобразованные в нужном формате.
    Преобразование тегов <span class="notranslate">HTML</span> производится фреймворком и необходимо в том случае, если данные после получения будут выведены на странице, что может создать <span class="notranslate">cookie-based XSS</span> уязвимость.<br>
    В примере показаны различные варианты получения значения <span class="notranslate">cookie</span>:

</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.http.params.php', false);  ?>

<?= Paragraph::h2('all()') ?>

<p>
    Метод <span class="notranslate">all()</span> возвращает именованный массив объектов, аналогичных полученному в методе <span class="notranslate">get()</span>, из которых можно получить значения всех или конкретных <span class="notranslate">сookies</span>.
</p>

<p class="hl-info-block">
    Наиболее частой ошибкой при использовании объекта, возвращаемого этими методами, может быть использование этого объекта как значения, вместо получения значения из объекта.
</p>

<?= Paragraph::h2('set()') ?>

<p>
    Для установки или изменения <span class="notranslate">cookie</span> по названию предназначен метод <span class="notranslate">set()</span>.
    Первым аргументом передаётся название <span class="notranslate">cookie</span>, вторым - значение, которое будет присвоено.
    Третьим аргументом <span class="notranslate">'options'</span> ожидается массив дополнительных параметров, аналогично использованию PHP функции <a href="https://www.php.net/manual/ru/function.setcookie.php" target="_blank" rel="nofollow"><span class="notranslate">setcookie()</span></a>, в котором можно установить опции <span class="notranslate">'expires'</span>, <span class="notranslate">'path'</span>, <span class="notranslate">'domain'</span>, <span class="notranslate">'secure'</span>, <span class="notranslate">'httponly'</span> и <span class="notranslate">'samesite'</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cookie/get.example.setcookie.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    При помощи метода <span class="notranslate">delete()</span> удаляется cookie по названию.
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    Метод <span class="notranslate">clear()</span> позволяет очистить все cookies.
</p>

<?= Paragraph::h2('Асинхронный режим') ?>

<p>
    При асинхронном использовании фреймворка методы сервиса <span class="notranslate">Cookies</span> функционируют аналогичным образом, но при этом используется другой механизм их установки и чтения.
</p>

<?= Link::previousPage('docs.2.0.service.session.page', 'Сессии'); ?>

<?= Link::nextPage('docs.2.0.service.redirect.page', 'Redirect'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

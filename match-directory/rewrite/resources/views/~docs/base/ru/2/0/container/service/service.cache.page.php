<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Кеширование данных') ?>

<p>
    Сервис кеширования фреймворка <span class="notranslate"><b>Cache</b></span> представляет собой простой файловый кеш для данных.
    Его методы поддерживают <span class="notranslate">PSR-16</span>. Принцип работы кеширования следующий:<br>
    Данные помещаются в кеш по уникальному ключу c указанием времени <span class="notranslate">ttl</span> в секундах.<br>
    В течении этого времени, начиная от создания кеша, запросы кеша по этому ключу отдают кешированные данные, они не изменяются.<br>
    Можно очистить кеш принудительно по ключу или весь в любое время.<br>
    Если кеш не был создан, очищен или просрочен, то будет создан новый кеш на указанное время.
</p>
<p>
    Во встроенной реализации сервиса поддерживаются основные типы данных <span class="notranslate">PHP</span> - строки, числовые значения, массивы, объекты (через сериализацию).
</p>

<p class="hl-info-block">
    Если вам нужны более расширенные возможности для кеширования, то добавьте в контейнер другую реализацию, заменяющую текущую или дополнительную.
    Это может быть компонент <a href="https://github.com/symfony/cache" target="_blank" rel="nofollow">github.com/symfony/cache</a>.
</p>

<p>
    Способы использования <span class="notranslate">Cache</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения кеша по ключу:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.container.php', false);  ?>

<p>
    Пример получения кеша из <span class="notranslate">Cache</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Cache</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Cache</span>.
</p>

<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">Hleb\Static\Cache</span>.
</p>

<?= Paragraph::h2('Уникальный ключ') ?>

<p>
    Самое сложное в таком способе кеширования (кроме инвалидации) - подобрать уникальный ключ, однозначно идентифицирующий кешируемые данные.
</p>
<p>
   Например, если вы кешируете данные, полученные из базы данных с определённой выборкой, то ключ должен содержать информацию об этой выборке, а также название БД, если похожая выборка может быть сделана из различных баз данных.
</p>

<?= Paragraph::h2('Инициализация кеша') ?>

<p>
    В этом примере в кеш с периодом истечения в одну минуту будет добавлен тестовый проверочный результат, само собой, для кеширования в реальных условиях нужно выбирать данные, формирование которых более резурсозатратно, чем использование кеша.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.get.php', false);  ?>

<p>
    Здесь были использованы методы <span class="notranslate"><b>get()</b></span>, <span class="notranslate"><b>set()</b></span> и <span class="notranslate"><b>has()</b></span>, соответственно - получение, добавление в кеш и проверка его наличия по ключу.
</p>
<p>
    Эти три метода заменяет один метод <span class="notranslate"><b>getConform()</b></span>, который оперирует с Closure-функцией для получения данных, если они не найдены в кеше.
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.conform.php', false);  ?>

<p>
    Пример с функцией-замыканием, использующей внешний контекст:
</p>

<?= Code::fromFile('@views/docs/code/container/service/cache/get.cache.function.php', false);  ?>

<?= Paragraph::h2('Очистка кеша') ?>

<p>
    Весь кеш во фреймворке очищается методом <span class="notranslate"><b>clear()</b></span>, но нужно быть осторожным при большом количестве кеша, этот вызов должен использоваться достаточно редко, также это можно сделать консольной командой:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --clear-cache</p>


<p class="hl-info-block">
    Очистка всего кеша повлияет только на данные кешированных шаблонов и данные фреймворка, добавленные сервисом Cache.
    Шаблонизатор <span class="notranslate">TWIG</span> имеет собственную реализацию кеша и для его очистки предназначена отдельная консольная команда.
</p>

<p>
    Если возникла необходимость удалить кеш по одному из ключей, то это можно сделать при помощи метода <b>delete()</b>.
</p>
<p>
    Для того чтобы фреймворк отслеживал автоматически максимальный размер кеша, нужно настроить опцию <span class="notranslate">'max.cache.size'</span> в файле <span class="notranslate">/config/common.php</span>.<br>
    Значение представляет собой целое число в мегабайтах.
    В силу неравномерного распределения кеша в файлах это будет приблизительное отслеживание максимального размера директории с файлами кеша.
</p>

<p class="hl-info-block">
    Если кеширование не происходит, то убедитесь, что включена настройка <span class="notranslate">'app.cache.on'</span> в файле <span class="notranslate">/config/common.php</span>, которую рекомендовано отключать в режиме отладки.
</p>


<?= Link::previousPage('docs.2.0.service.response.page', 'Response'); ?>

<?= Link::nextPage('docs.2.0.service.log.page', 'Логирование'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Преобразование в PSR') ?>

<p>
    Для использования внешних библиотек, использующих контракты на основе рекомендаций <a href="https://www.php-fig.org/psr/" target="_blank" rel="nofollow">PSR</a>, вам может понадобиться преобразовать собственные сущности фреймворка в соответствующие объекты <span class="notranslate">PSR</span>.
</p>
<p class="hl-info-block">
    В силу принципа самодостаточности фреймворка и первоначальному отказу от внешних зависимостей, системные классы фреймворка схожи со стандартными, но у них собственный интерфейс.
    Для следования стандартам это решается применением адаптера <span class="notranslate">Converter</span>, реализованного в виде Сервиса.
</p>
<p>
    Сервис <span class="notranslate"><b>Converter</b></span> — предоставляет методы получения объектов согласно интерфейсам <span class="notranslate">PSR</span>, сформированных из системных объектов фреймворка <span class="notranslate">HLEB2</span>.
</p>
<p>
    Способы использования <span class="notranslate">Converter</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения объекта для логирования по <span class="notranslate">PSR-3</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.container.php', false);  ?>

<p>
    Пример получения объекта <span class="notranslate">logger</span> из сервиса <span class="notranslate">Converter</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.static.php', false);  ?>

<p>
    Также сервис <span class="notranslate">Converter</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Converter</span>.
</p>

<?= Paragraph::h2('toPsr3Logger') ?>

<p>
    Метод <span class="notranslate">toPsr3Logger()</span> возвращает объект для логирования с интерфейсом <span class="notranslate">PSR-3</span> (<span class="notranslate">Psr\Log\LoggerInterface</span>).
</p>

<?= Paragraph::h2('toPsr11Container') ?>

<p>
    Метод <span class="notranslate">toPsr11Container()</span> возвращает объект контейнера с интерфейсом <span class="notranslate">PSR-11</span> (<span class="notranslate">Psr\Container\ContainerInterface</span>).
</p>

<?= Paragraph::h2('toPsr16SimpleCache') ?>

<p>
    Метод <span class="notranslate">toPsr16SimpleCache()</span> возвращает объект для кеширования с интерфейсом <span class="notranslate">PSR-16</span> (<span class="notranslate">Psr\SimpleCache\CacheInterface</span>).
</p>

<?= Paragraph::h2('PSR-7 объекты') ?>

<p>
    Для манипуляций с <span class="notranslate">PSR-7</span> объектами существует достаточно большое количество сторонних библиотек, чтобы включать еще одну реализацию во фреймворк.
    Например, их можно создать при использовании популярной библиотеки <span class="notranslate"><a href="https://github.com/Nyholm/psr7" target="_blank" rel="nofollow">Nyholm\Psr7</a></span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/converter/get.converter.psr7.php', false);  ?>

<p>
    Состав параметров в конструкторе зависит от выбранной библиотеки.<br>
    Чтобы не инициировать таким образом каждый раз, реализацию можно вынести в отдельный класс или сервис.
</p>


<?= Link::previousPage('docs.2.0.service.csrf.page', 'Защита от CSRF'); ?>

<?= Link::nextPage('docs.2.0.events.page', 'События'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

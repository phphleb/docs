<?php

use Hleb\Static\System;
use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Введение') ?>

<p>
    <b><span class="notranslate">HLEB2</span></b> — это вторая версия фреймворка <span class="notranslate">HLEB</span>, полностью изменённая и улучшенная.
</p>
<p>
    Поддерживает <span class="notranslate">PHP</span> версии 8.2 и выше.
</p>
<p>
    Начальная версия 2.0.0 фреймворка  выпущена в феврале 2024 г.<br>
    В новой версии реализована поддержка асинхронного выполнения, фреймворк можно использовать с такими технологиями как <span class="notranslate">RoadRunner</span> и <span class="notranslate">Swoole</span>.<br>
    Много внимания было уделено быстродействию и гибкости сопровождения, реализована совместимость с <span class="notranslate">PSR</span>, добавлен сервисный контейнер вместе с реализацией <span class="notranslate">Dependency Injection</span> и многое другое.
</p>

<p>
    Поддерживает рекомендации <span class="notranslate">PSR-1</span>, <span class="notranslate">PSR-2</span>, <span class="notranslate">PSR-3</span>, <span class="notranslate">PSR-4</span>,<span class="notranslate">PSR-7</span>, <span class="notranslate">PSR-11</span>, <span class="notranslate">PSR-12</span>, <span class="notranslate">PSR-16</span> без обязательности их использования в разработке.
</p>

<?= Paragraph::h2('Предназначение') ?>

<p>
    Данный фреймворк может послужить основой для небольших проектов, таких как: отдельная админпанель, микро-сервис, чат-бот, экспериментальный пет-проект, консольный обработчик; так и среднего размера сайтов, а также может стать фундаментом для разработки собственного фреймворка с расширенными возможностями.
    В последнем случае его можно будет использовать и для крупных корпоративных сайтов.
</p>
<p>
    <span class="hl-select-block">
        <span class="notranslate">HLEB2</span> позиционируется как простой и быстрый фреймворк, который эффективно выполняет свою работу.
    </span>
</p>
<p>
    Особенностью фреймворка <span class="notranslate">HLEB</span>(и HLEB2 также) стал полный отказ от сторонних библиотек в базовой комплектации и, вместе с тем, есть возможность подключать библиотеки сторонних разработчиков, если возникнет такая необходимость.<br>
    Таким образом, дальнейшие действия не предопределены зависимостями, предусмотрена необходимая гибкость.
</p>
<p>
    Для использования фреймворка как минимум необходимо обладать первоначальными знаниями программирования на языке PHP.
</p>
<p>
    Фреймворк — это многоцелевой инструмент, а каждый инструмент можно использовать не по назначению, поэтому подразумевается, что разработчик приложения при этом понимает, что делает, и может выбрать подходящий подход для конкретного проекта.
</p>
<p>
    Код фреймворка тщательно протестирован с помощью модульных тестов.
</p>

<?= Paragraph::h2('Производительность') ?>

<p>
Согласно сторонним <a href="https://web-frameworks-benchmark.netlify.app/compare?f=hleb2,slim,lumen,yii,laminas,codeigniter4,spiral,laravel,symfony" target="_blank">метрикам производительности</a>, данный фреймворк имеет преимущества как по скорости, так и по стабильности работы.
</p>

<?= Paragraph::h2('Проекты на основе фреймворка') ?>

<p>
    Из известных автору приложений на основе HLEB2 выделяется дискуссионный (и Q&A) движок LibArea.
    Проект на GitHub: <a href="https://github.com/LibArea/libarea">github.com/LibArea/libarea</a><br>
    Подразумевается, что основанные на LibArea проекты работают и на фреймворке HLEB2.
</p>

<?= Paragraph::h2('Как пользоваться документацией') ?>

<p>
    Подробная инструкция к фреймворку состоит из различных разделов.
    Часть информации снабжена примерами кода, например (объявление маршрута):
</p>

<?= Code::fromFile('@views/docs/code/test.php', false);  ?>

<p>
   Список разделов документации находится в меню сайта.<br>
   Для начинающих — знакомство с фреймворком рекомендуется начать с тем про установку, маршрутизацию и редактирование настроек.
</p>

<p class="hl-info-block">
    Информация, на которую нужно обратить особое внимание, будет выделена таким блоком.
</p>

<p class="hl-danger-block">
    Предупреждение, которым не стоит пренебрегать, будет выделено таким блоком.
</p>

<?= Paragraph::h2('Локальная установка документации') ?>

<p>
    Данную документацию можно <a href="https://github.com/phphleb/docs/" target="_blank">установить</a> и использовать оффлайн.
    Код расположен в открытом репозитории и после локальной установки останется только следить за обновлениями.
</p>

<?= Link::nextPage('docs.2.0.installation.page', 'Установка фреймворка'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


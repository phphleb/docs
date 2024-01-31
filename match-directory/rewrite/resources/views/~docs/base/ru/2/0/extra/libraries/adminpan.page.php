<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Административная панель') ?>

<p>
    Модуль 'Административная панель' во фреймворке <span class="notranslate">HLEB2</span> представляет собой дополнение к библиотеке регистрации <span class="notranslate">HLOGIN</span>, но также может быть использован отдельно, в качестве одной или нескольких административных панелей на одном сайте или публичного оформления для сайта.
</p>
<p>
    С помощью этой библиотеки создан внешний вид этого сайта документации фреймворка без значительных изменений.
</p>

<?= Paragraph::h2('Установка') ?>

<p>
    При помощи <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/adminpan</p>

<?= Paragraph::h2('Настройка') ?>

<p>
    Если выполнить следующую команду, то в раздел <span class="notranslate">/config/structure/</span> будет скопирован файл <span class="notranslate">adminpan.php</span> с описанием того, как создать структуру меню для административной панели.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/adminpan add</p>

<p>
    Первоначально файл <span class="notranslate">/config/structure/adminpan.php</span> содержит пустой массив, никаких разделов меню не задано.
    Разделы меню назначаются по названиям специальных маршрутов (или обычным ссылкам).
    Пример для демонстрационного маршрута:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.route.php', false);  ?>

<p>
    Здесь указано, что для меню <span class="notranslate">'adminpan'</span> (одноименное с файлом <span class="notranslate">adminpan.php</span>) по <span class="notranslate">URL</span> адресу <span class="notranslate">'/{lang}/panel/page/default'</span> назначен контроллер <span class="notranslate">page()</span> класса <span class="notranslate">ExamplePanelController</span> для метода <span class="notranslate">'index'</span>.
    Кроме того, маршрут имеет название <span class="notranslate">'adminpan.default'</span>, которое нужно для сопоставления с разделом в меню.
    Теперь можно создать первый пункт меню в файле <span class="notranslate">/config/structure/adminpan.php</span>.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/adminpan/adminpan.config.php');  ?>

<p>
    Меню может содержать вложенные раскрывающиеся списки (<span class="notranslate">'section'</span>), сейчас назначен только один с одним пунктом.
</p>
<p>
    Если перейти по адресу URL <span class="notranslate">'/ru/panel/page/default'</span>, то для страницы будет назначен дизайн <span class="notranslate">'base'</span> (из настроек), а также меню, в котором будет список 'Главное меню' c активным пунктом 'Тестовая страница' на которой будет выведен контент из контроллера <span class="notranslate">ExamplePanelController</span>.
</p>
<p>
    Совместно используя с библиотекой <span class="notranslate">HLOGIN</span>, маршруты админпанели могут быть доступны только определенному типу пользователей (авторизованным).
</p>
<p>
    Для углубленного понимания работы админпанели вы можете развернуть <a href="https://github.com/phphleb/docs/" target="_blank">этот сайт локально</a> и посмотреть его устройство меню.
</p>
<p>
    Репозиторий библиотеки: <span class="notranslate"><a href="https://github.com/phphleb/adminpan" target="_blank">github.com/phphleb/adminpan</a></span>
</p>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


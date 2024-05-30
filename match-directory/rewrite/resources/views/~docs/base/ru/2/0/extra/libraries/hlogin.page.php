<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('HLOGIN - модуль регистрации') ?>

<p>
    Создание регистрации пользователей на сайте часто бывает необходимым после установки фреймворка.
    Прежде, чем начать разработку страниц, необходимо обозначить их видимость для той или иной категории пользователей.
</p>
<p>
    Библиотека <span class="notranslate">HLOGIN</span> расширяет возможности фреймворка <span class="notranslate">HLEB2</span>, добавляя полноценную регистрацию пользователей на сайте, которая отличается простотой настроек и быстрой установкой, и, вместе с тем, удобной и разнообразной функциональностью, поддерживающей мультиязычность и несколько вариантов дизайна.
    Опционально можно вывести форму обратной связи, которая идёт дополнительно к регистрации и авторизации.
    В автоматически создаваемой админпанели находятся средства для управления пользователями и настройки отображения.
    После внедрения регистрации можно сразу направить свои мысли на создание контента для сайта.
</p>
<p>
    Доступно несколько базовых видов дизайна.
    Демонстрационную работу и внешний вид всплывающих окон регистрации можно увидеть по <a href="https://auth2.phphleb.ru/" target="_blank">ссылке</a>.
</p>

<?= Paragraph::h2('Установка') ?>

<p>
    Шаг 1. Установка через <span class="notranslate">Composer</span> в проекте на основе фреймворка <span class="notranslate">HLEB2</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/hlogin</p>

<p>
    Шаг 2. Установка библиотеки в проект.
    Будет предложено выбрать тип дизайна из нескольких:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>

<?= Paragraph::h2('Подключение') ?>

<p>
    Шаг 3. Перед выполнением этого действия необходимо иметь действующее подключение к базе данных.
    В настройках проекта <span class="notranslate">'/config/database.php'</span> нужно добавить подключение или убедиться, что оно существует, а также проверить, что его название находится в параметре <span class="notranslate">'base.db.type'</span>.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-login-table</p>

<p>
    После этого консольной командой создаётся пользователь с правами администратора (будет предложено указать <span class="hl-nowrap">E-mail</span> и пароль):
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console hlogin/create-admin</p>

<p class="hl-info-block">
    Если нет возможности выполнить консольную команду, то создайте таблицы соответствующим <span class="notranslate">SQL</span>-запросом из файла <span class="hl-nowrap">`/vendor/phphleb/hlogin/planB.sql`</span>.
    После этого зарегистрируйте администратора и установите ему <span class="notranslate">'regtype'</span> равное 11.
</p>

<p>
    Шаг 4. Теперь вы можете перейти на главную страницу-заглушку сайта, если это дефолтная страница фреймворка без изменений и убедиться, что доступны панели авторизации.
    Если библиотека устанавливается в разрабатываемый проект на фреймворке <span class="notranslate">HLEB2</span> не с самого начала и заглушка удалена, то проверьте вход на странице <span class="notranslate">'/en/login/action/enter/'</span> сайта (с данными администратора из предыдущего шага).
</p>
<p>
    Шаг 5. Установка регистрации на сайте на определенных страницах через маршрутизацию.
    Для этого нужно в файлах роутинга (папка проекта <span class="notranslate">/routes/</span>) задать следующие условия:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.rules.php', false);  ?>

<p>
    Достаточно распределить маршруты сайта по этим условиям (группам), чтобы к ним применялись правила авторизации пользователей.
</p>
<p>
    Следует иметь в виду, что страницы, не попавшие ни в одну из таких групп с условиями, находятся вне правил регистрации и данная библиотека к ним не подключена.
</p>
<p>
    Шаг 6. Настройка. После авторизации у администратора в профиле (<span class="notranslate">/en/login/profile/</span>) отображается кнопка входа в админпанель.
    В ней можно настроить панели регистрации и прочие параметры.
</p>

<?= Paragraph::h1('Дополнительно', true) ?>

<p>
    Если нужно выводить данные в зависимости от типа регистрации пользователя:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.data.php', false);  ?>

<p>
    Также можно добавить класс <span class="hl-nowrap">Phphleb\Hlogin\Container\Auth</span> в <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">контейнер</a> и получить эти данные из него.
</p>
<p>
    По умолчанию используемый язык панелей извлекается из параметра <span class="notranslate">url</span> (следующего за доменом) или метки <span class="notranslate">lang</span> в теге <span class="notranslate">'&lt;html lang="en"&gt;'</span>.
    Установить принудительно дизайн и/или язык панелей на странице:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.data.php');  ?>

<?= Paragraph::h2('Управление панелями') ?>

<p>
    Заменить стандартные кнопки авторизации можно на любые, предварительно отключив стандартные в админпанели.
    Собственным кнопкам возможно назначить одно из следующих действий (для <span class="notranslate">JavaScript</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.button.php', false);  ?>

<p>
    Или, при помощи атрибутов:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.attr.php', false);  ?>

<p>
    Как можно понять, регистрация не может быть доступна для пользователей с отключенным <span class="notranslate">JavaScript</span> в браузере.
    Сейчас таких почти не осталось.
</p>

<?= Paragraph::h2('Отдельные страницы') ?>

<p>
    Если необходимо направить пользователя сразу на страницу входа или регистрации, то необходимых страниц автоматически создается несколько:
</p>
<p>
    Страница регистрации<br>
    <b>/</b>ru<b>/login/action/registration/</b>
</p>
<p>
    Страница входа<br>
    <b>/</b>ru<b>/login/action/enter/</b>
</p>
<p>
    Страница профиля<br>
    <b>/</b>ru<b>/login/profile/</b>
</p>
<p>
    Страница обратной связи<br>
    <b>/</b>ru<b>/login/action/contact/</b>
</p>
<p>
    Страница админпанели с настройками регистрации<br>
    <b>/</b>ru<b>/adminzone/registration/settings/</b>
</p>

<?= Paragraph::h2('Дополнительная обработка данных') ?>

<p>
    При валидации значений на стороне бекенда, посылаемых из форм регистрации, также можно дополнительно обработать их собственным <span class="notranslate">PHP-скриптом</span>, при его наличии.
    Таким образом можно, например, добавить собственное поле в форму и проверить его самостоятельно.
    Запросы разделены на отдельные классы, которые можно найти в папке <span class="notranslate">/vendor/phphleb/hlogin/Optional/Inserted/</span>.
    Они могут быть использованы только после копирования в папку <span class="notranslate">/app/Bootstrap/Auth/Handlers/</span>.
</p>

<?= Paragraph::h2('Дизайн') ?>

<p>
    Собственный дизайн доступен при выборе типа <span class="notranslate">"blank"</span> в админпанели.
    После этого можно скопировать и изменить файл <span class="notranslate">CSS</span> любого другого дизайна из существующих, подключив его к сайту самостоятельно.
    Также можно внести правки по типу дизайна.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.panel.design.php', false);  ?>

<?= Paragraph::h2('Локализация') ?>

<p>
    По умолчанию используются несколько переключаемых языков для регистрации и авторизации.
    Но все именования можно изменить на свои.
    При этом важным будет проверить, чтобы длинные слова умещались в интерфейс панелей.
</p>
<p>
    Для <span class="notranslate">backend</span>-локализации скопируйте необходимые языковые файлы из <span class="notranslate">/vendor/phphleb/hlogin/App/BackendTranslation/</span> в папку <span class="notranslate">/app/Bootstrap/Auth/Resources/php/</span> и внесите изменения в последние.
</p>
<p>
    Для <span class="notranslate">frontend</span>-локализации скопируйте необходимые языковые файлы (начинающиеся с <span class="notranslate">'hloginlang'</span>) из <span class="notranslate">/vendor/phphleb/library/hlogin/web/js/</span> в папку <span class="notranslate">/app/Bootstrap/Auth/Resources/js/</span> и внесите в них изменения.
</p>
<p>
    Можно добавить дополнительный язык(и), создав соответствующие по названию файлы для <span class="notranslate">backend</span> и <span class="notranslate">frontend</span> локализаций, а также добавив его в перечень разрешённых языков настройки <span class="notranslate">'allowed.languages'</span> файла <span class="notranslate">/config/main.php</span> (этот файл может дублироваться в Модулях).
</p>

<?= Paragraph::h2('Админзона') ?>

<p>
    При создании собственных дополнительных страниц в панели администратора, окружите их маршруты ограничением доступа, как показано далее:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/hlogin/hlogin.adminpan.page.php', false);  ?>

<p>
    Создание страниц в разделе администратора описано <a href="<?= Link::url('docs.2.0.adminpan.page'); ?>">в соответствующем разделе</a> данной документации.
</p>

<?= Paragraph::h2('Отправка писем') ?>

<p>
    Отправка писем с уведомлениями и восстановлением доступа осуществляется при помощи библиотеки <a href="https://github.com/phphleb/muller" target="_blank">github.com/phphleb/muller</a>.
    В админпанели указывается <span class="notranslate">E-mail</span> отправителя, для которого должна быть разрешена отправка с сервера, для большинства хостингов достаточно создать такой почтовый ящик.
    Доступный <span class="notranslate">E-mail</span> отправки находится в <span class="notranslate">php.ini</span> <span class="notranslate">(sendmail_path = ... -f'<b>email@example.com</b>')</span>.
</p>
<p>
    По умолчанию письма дополнительно логируются в папку <span class="notranslate">'/storage/logs/'</span> c окончанием <span class="notranslate">'mail.log'</span> в названии файла.
    Это логирование отключается в настройках панели администратора.
</p>

<?= Paragraph::h2('Почтовый сервер') ?>

<p>
    Библиотека по умолчанию, применяемая для рассылки писем, обладает ограниченными возможностями и при развитии проекта подлежит замене на подходящий почтовый сервер или иной аналог.
</p>
<p>
    Создайте класс <span class="notranslate">App\Bootstrap\Auth\MailServer</span> по адресу <span class="notranslate">/app/Bootstrap/Auth/MailServer.php</span>, который имплементирует интерфейс <span class="notranslate">Phphleb\Hlogin\App\Mail\MailInterface</span>.
    После создания файла письма будут отправляться с использованием этого класса, поэтому сначала нужно реализовать в нём собственную отправку для выбранного почтового сервера.
</p>

<?= Paragraph::h2('Обновление библиотеки') ?>

<p>
    Для обновления выполните консольные команды:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer update phphleb/hlogin</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console phphleb/hlogin add</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer dump-autoload</p>

<p>
    В процессе установки выберите текущий дизайн, который используется по умолчанию.
</p>

<?= Paragraph::h2('Ссылки') ?>

<p>
    Библиотека <span class="notranslate">HLOGIN</span> на <span class="notranslate">GitHub</span>: <a href="https://github.com/phphleb/hlogin" target="_blank">github.com/phphleb/hlogin</a>
</p>
<p>
    Демонстрационная страница с регистрацией: <a href="https://auth2.phphleb.ru/" target="_blank">auth2.phphleb.ru</a>
</p>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


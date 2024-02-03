<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Модуль') ?>
<p>
    Модульный подход в программной архитектуре позволяет логически разделить проект на крупные составные фрагменты (модули).
    Показателем модуля является его самодостаточность, в некотором смысле - это разделение на "микросервисы" внутри монолитного приложения.<br>
    Основные отличия от микросервисов состоят в том, что модули должны обмениваться данными через определенные контракты, заменяющие собой <span class="notranslate">HTTP API</span> (или брокер сообщений), а также используют общую папку с маршрутами, сервисы и внешние библиотеки из папки <span class="notranslate">/vendor/</span>.
    Контракты рекомендуется составить таким образом, чтобы они позволяли при необходимости выделить модуль в полноценный микросервис.
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> подразумевается, что Модуль представляет собой <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб) в миниатюре.
    У модуля есть свой контроллер, своя папка с шаблонами, даже своя конфигурация допустима, это всё находится внутри папки с модулем.
    Своя логика тоже подразумевается (как и Модели), но для этого рекомендуется создать отдельную структуру в папке <span class="notranslate">/app/</span> проекта или в самом модуле.
</p>
<p>
    При использовании подхода полной автономности частей в проекте, в чем и заключается применение модульной разработки, можно не использовать совсем контроллеры, middleware и модели из <span class="notranslate">/app/</span>, реализовав всё в модулях.
</p>
<p>
    Назначение контроллера модуля в маршруте отличается от обычного контроллера тем, что метод называется <span class="notranslate">'module'</span>, а не <span class="notranslate">'controller'</span>, и в нём содержится дополнительный начальный аргумент с названием модуля.
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.route.php', false);  ?>

<p class="hl-info-block">
    Контроллер модуля должен быть унаследован от <span class="notranslate">Hleb\Base\Module</span>.
</p>
<p class="hl-info-block">
    Для того чтобы загрузчик классов Composer составил карту классов для модулей, добавьте в раздел 'classmap' файла '/composer.json' строчку с названием папки модулей ("modules/").
</p>

<?= Paragraph::h2('Создание модуля') ?>

<p>
    Простой способ создания базовой структуры модуля через консольную команду:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --create module example</p>

<p>
    Эта команда создаст новый шаблон модуля в директории <span class="notranslate">/modules/example/</span> проекта.
    Можно использовать другое подходящее название для модуля, состоящее из латинских букв в нижнем регистре, цифр, дефиса и символа '/' (указывающего на вложенность).
    Есть возможность <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">переопределить</a> исходные файлы модуля, используемые при генерации.
</p>
<p>
    Структура модуля после создания (если ранее не было папки <span class="notranslate">modules</span>, то консольная команда её создаст в корне проекта):
</p>
<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b> &nbsp;&nbsp;- директория для модулей<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-dir">&#9724;</span> <b>example</b> &nbsp;&nbsp;- папка модуля example<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span> &nbsp;&nbsp;- настройки модуля<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">DefaultModuleController.php</span> &nbsp;&nbsp;- контроллер модуля<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">example.php</span> &nbsp;&nbsp;- шаблон модуля<br></span>
</div>

<p>
    Файл main.php может содержать настройки, аналогичные файлу <span class="notranslate">/config/main.php</span>, но c используемыми только в модуле значениями, то есть будет их "перекрывать".
    Изначально файл main.php не содержит никаких настроек, используются все настройки из <span class="notranslate">/config/main.php</span>.<br>
    Подобным образом здесь могут быть заменены настройки файла <span class="notranslate">/config/database.php</span> созданием одноимённого файла.
    Настройки других конфигурационных файлов всегда действуют глобально.
</p>

<p>
    Контроллер модуля аналогичен стандартному контроллеру фреймворка.
    При использовании в нём функции <span class="notranslate">view()</span> путь к шаблону будет указывать в папку <span class="notranslate">'views'</span> модуля, как и для всех встроенных функций фреймворка для работы с шаблонами
</p>

<?= Paragraph::h2('Вложенные модули') ?>

<p>
    Существует возможность объединять модули в группы, вложенные в разные подпапки <span class="notranslate">/modules/</span>.
    Для этого модули размещаются уровнем ниже, а в название модуля добавляется название группы.
    Это составляет <i>второй уровень</i> вложенности модулей.
</p>
<p>
    Представим, что необходимо разместить группу модулей под названием <span class="notranslate">'main-product'</span>, в ней будут модули <span class="notranslate">'first-feature'</span> и <span class="notranslate">'second-feature'</span>.
</p>

<div class="hl-text-block hl-dir-block notranslate">
    <span class="hl-nowrap"><span class="hl-directory-dir">&#9724;</span> <b>modules</b><br></span>
    <span class="hl-nowrap">&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>main-product</b> - группа модулей<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>first-feature</b> &nbsp;&nbsp;- папка модуля first-feature<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>config</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">main.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">database.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleGetController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModulePostController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>second-feature</b> &nbsp;&nbsp;- папка модуля second-feature<br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>controllers</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleController.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>middlewares</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="hl-directory-separator">|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">ModuleMiddleware.php</span><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-dir">&#9724;</span> <b>views</b><br></span>
    <span class="hl-nowrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&vdash;<span class="hl-directory-file">template.php</span><br></span>
</div>

<p>
    Вот так это будет выглядеть в карте маршрутов:
</p>

<?= Code::fromFile('@views/docs/code/controller/module/example.group.route.php', false);  ?>

<p>
    В группе под названием <span class="notranslate">'first-feature'</span> присутствует переназначение настроек, в том числе для баз данных.<br>
    Пример для <span class="notranslate">'second-feature'</span> использует глобальные настройки, дополнительно у него есть <span class="notranslate">middleware</span> к контроллеру.
    Возможно, что там могут появиться ещё контроллеры.
</p>

<p class="hl-info-block">
    Аналогичным образом создается структура для третьего уровня вложенности, если он необходим.
</p>

<?= Paragraph::h2('Название папки с модулями') ?>

<p>
    Изначально папка с модулями называется <span class="notranslate">'modules'</span>, до создания модулей можно изменить это название в настройках, например на <span class="notranslate">'products'</span>.<br>
    Делается это в файле <span class="notranslate">/config/system.php</span> - настройка <span class="notranslate">'module.dir.name'</span>.
    Если изменение производится с уже существующими классами модулей - необходимо исправить <span class="notranslate">namespace</span> модулям, которые по PSR-0.
</p>

<?= Paragraph::h2('Переопределение настроек') ?>

<p>
    В модуле могут быть переопределены два файла конфигурации - <span class="notranslate">/config/main.php</span> и <span class="notranslate">/config/database.php</span>.<br>
    Переопределяются значения параметров по ключу рекурсивно, иначе параметр имеет глобальное значение. Новые параметры, не имеющие глобального аналога, будут доступны локально в модуле.
</p>

<?= Paragraph::h2('Пути к шаблонам в модулях') ?>

<p>
    При использовании модулей как отдельных пакетов, не всегда нужно, чтобы в пакете были шаблоны <span class="notranslate">View</span>, так как оформление и вывод результата может быть отдельным слоем в структуре приложения.<br>
    Поэтому, может быть два варианта использования шаблонов.
    Под "использованием" подразумеваются как указатели на шаблоны в функции <span class="notranslate">view()</span>, так и в специальных функциях вида <span class="notranslate">insertTemplate()</span>.
</p>
<p>
    Если в модуле есть папка <span class="notranslate">/views/</span>, то пути шаблонов будут указывать в неё.<br>
    Но если такой папки нет, то поиск шаблона будет происходить в директории <span class="notranslate">/resources/views/</span> проекта.
</p>

<?= Link::previousPage('docs.2.0.controller.controller.page', 'Контроллер'); ?>

<?= Link::nextPage('docs.2.0.controller.middleware.page', 'Middleware'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


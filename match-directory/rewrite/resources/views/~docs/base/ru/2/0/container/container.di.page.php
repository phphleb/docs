<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Внедрение зависимостей') ?>

<p>
    <b>Внедрение зависимостей</b> (также <span class="notranslate">Dependency injection</span> или <span class="notranslate">DI</span>) — механизм подстановки фреймворком зависимостей для конструктора или других методов у создаваемых объектов.
</p>
<p>
    При создании объектов фреймворком, таких, как контроллеры, <span class="notranslate">middlewares</span>, команды и другие, внедрение зависимостей уже назначено при вызове целевого метода (в том числе конструктора).
</p>
<p>
    Согласно механизму <span class="notranslate">DI</span> предполагается, что если указать в зависимостях (аргументах) метода нужные в нём классы или интерфейсы, то фреймворк попытается найти такие соответствия в контейнере, получит из контейнера или самостоятельно создаст объект и подставит его в необходимый аргумент.<br>
    При этом, если в контейнере такой сервис найден не будет, то будет произведена попытка создать объект из обычного подходящего класса в проекте, а если у последнего есть свои зависимости в конструкторе, то фреймворк попробует их наполнить аналогичным образом.<br>
    При отсутствии подстановочного значения для аргументов, которые имеют значения по умолчанию, будет использовано дефолтное.<br>
    Иначе фреймворк вернёт ошибку с информацией, что успешно использовать <span class="notranslate">DI</span> для указанных зависимостей не удалось.
</p>

<?= Paragraph::h2('Реализация DI во фреймворке') ?>

<p>
    Когда объект контроллера или <span class="notranslate">middleware</span> создается на стороне фреймворка, то сначала разрешаются зависимости конструктора, затем вызываемого метода.
</p>
<p>
    Также, когда запрос обрабатывается фреймворком, то в совпавшем контроллере вызовется только один метод, в таком случае нет разницы, откуда получать зависимость, из конструктора или метода, хотя из конструктора в некоторых случаях удобнее.
</p>
<p>
    На следующем примере показаны два метода контроллера с различным присвоением <span class="notranslate">$logger</span> из контейнера через <span class="notranslate">DI</span>.
</p>

<?= Code::fromFile('@views/docs/code/di/controller.di.example.php'); ?>

<p>
    Аналогичным образом устанавливаются зависимости для <span class="notranslate">middleware</span>.
</p>
<p>
    В командах фреймворка и в событиях <span class="notranslate">(Events)</span> реализовано похожим образом, но только через конструктор:
</p>

<?= Code::fromFile('@views/docs/code/di/command.di.example.php'); ?>

<?= Paragraph::h2('Создание объектов с DI') ?>

<p>
    Внедрение зависимостей удобно тем, что при тестировании мы можем создать нужные значения для зависимостей класса.
    Однако, при создании объекта вручную, было бы неудобно инициализировать самим все его зависимости.
    Чтобы автоматизировать этот процес, существует класс <span class="notranslate">Hleb\Static\DI</span> фреймворка.
</p>

<?= Code::fromFile('@views/docs/code/di/object.di.example.php', false); ?>

<p>
    Здесь показано, как создать объект класса, в конструкторе которого есть зависимость, а также вызвать нужный метод объекта, в котором также нужно автоматически подставить значение.
    На примере также есть зависимость не из контейнера (класс <span class="notranslate">Insert</span>), объект которой создается и подстанавливается в метод.
</p>
<p>
    Довольно часто используемый вариант <span class="notranslate">DI</span> c <span class="notranslate">Request</span> и <span class="notranslate">Response</span> (в данном случае получаемых из контейнера):
</p>

<?= Code::fromFile('@views/docs/code/di/class.di.example.php'); ?>

<p class="hl-info-block">
    Из-за существования различных подходов в именовании интерфейсов, получение стандартных сервисов из контейнера может быть как по интерфейсу с окончанием <span class="notranslate">Interface</span>, так и без.
    Например, <span class="notranslate">Hleb\Reference\RequestInterface</span> аналогичен <span class="notranslate">Hleb\Reference\Interface\Request</span>.
</p>

<?= Paragraph::h2('Автоподстановка для не найденных в контейнере зависимостей') ?>

<p>
    Как уже было упомянуто выше, если в процессе разрешения зависимостей фреймворк не находит зависимость в контейнере, то он попытается самостоятельно создать объект такого класса и разрешить зависимости последнего, если они указаны в конструкторе класса.
</p>
<p>
    Существуют способы для указания, каким путём нужно следовать в таком случае.
    Через параметр конфигурации <span class="notranslate">`system`.`autowiring.mode`</span> устанавливается режим управления такими зависимостями.
    Существует режим, в котором можно полностью отключить автоподстановку не найденных в контейнере зависимостей и режим аналогичный этому, но при наличии атрибута <span class="notranslate">AllowAutowire</span> разрешающий использовать объект класса, а также атрибут <span class="notranslate">NoAutowire</span>, запрещающий автопостановку текущего класса, если включен разрешающий режим с поддержкой этого атрибута.
</p>

<?= Paragraph::h2('Управление зависимостями') ?>

<p>
    При помощи специального атрибута <span class="notranslate">DI</span> можно указать в конкретном месте (методе класса), какую именно зависимость с указанным интерфейсом нужно использовать. Если такая зависимость из атрибута будет найдена в контейнере, то будет использована из контейнера. Если нет, то здесь действуют те же правила автоподстановки не найденных в контейнере зависимостей, как если бы она была указана напрямую в методе. Примеры:
</p>

<?= Code::fromFile('@views/docs/code/di/class.autowiring.example.php'); ?>

<p>
    Показаны варианты, как можно указать конкретный класс для требуемого интерфейса в параметре, а также создание нужного класса в атрибуте.
</p>


<?= Link::previousPage('docs.2.0.container.get.page', 'Получение сервиса'); ?>

<?= Link::nextPage('docs.2.0.service.request.page', 'Request'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

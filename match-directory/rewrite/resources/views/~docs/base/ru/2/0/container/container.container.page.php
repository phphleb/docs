<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Контейнер') ?>

<p>
    <b>Контейнер</b> во фреймворке <span class="notranslate">HLEB2</span> представляет собой сборник так называемых <b>сервисов</b>, которые можно из него получить, а также добавить в контейнер.<br>
    Сервисы - логически самодостаточные структуры по предназначению.
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> инициализация сервисов в контейнере избавлена от лишней абстракции.<br>
    Они инициализируются не фреймворком из конфигурации, как это обычно реализовано, а в специальном классе <span class="notranslate">App\Bootstrap\BaseContainer</span>, доступному для редактирования разработчиком, использующим фреймворк.
    (По большей части вам понадобится класс <span class="notranslate">App\Bootstrap\ContainerFactory</span>, так как там задаются сервисы в качестве <span class="notranslate"><i>singleton</i></span>.)<br>
    Все файлы этих классов находятся в папке <span class="notranslate">/app/Bootstrap/</span> проекта.
</p>
<p>
    Благодаря такому устройству, в контейнер может быть добавлено достаточно большое количество сервисов без значимого ущерба для производительности.
</p>

<?= Paragraph::h2('Класс BaseContainer') ?>

<p>
    Представляет собой тот самый контейнер, который будет использоваться для получения сервисов.
</p>
<p>
    Если необходим сервис как новый экземпляр класса при каждом запросе из контейнера, то его нужно указать здесь в выражении <span class="notranslate">match()</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/base.container.class.php');  ?>

<p>
    Добавление сервиса аналогично его добавлению в классе <span class="notranslate">ContainerFactory</span>.
</p>

<?= Paragraph::h2('Класс ContainerFactory') ?>

<p>
    Фабрика для создания сервисов в качестве <span class="notranslate">singletons</span>, имеет возможность <a href="<?= Link::url('docs.2.0.container.extended.replace.page'); ?>">переопределить</a> стандартные сервисы самого фреймворка.
    Используется для добавления собственных сервисов, которые инициализируются один раз по запросу.
</p>
<p>
    Например, нужно добавить сервис <span class="notranslate">RequestIdService</span>, который возвращает уникальный <span class="notranslate">ID</span> текущего запроса.
    Это демонстрационный пример сервиса, в основном сервисы представляют более сложные структуры.
    Добавим его создание в класс <span class="notranslate">ContainerFactory</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/container.factory.class.php');  ?>

<p>
    Теперь при запросе из контейнера интерфейса <span class="notranslate">RequestIdInterface</span> будет получен экземпляр <span class="notranslate">RequestIdService</span>, который хранится в контейнере как <span class="notranslate">singleton</span>.<br>
    Ключом для получения может быть задан не только интерфейс, но и исходный класс <span class="notranslate">RequestIdService</span>, в дальнейшем он именно так будет использован <span class="notranslate">DI</span> (внедрением зависимостей).
</p>

<p class="hl-danger-block">
    Несмотря на то, что выражение <span class="notranslate">match()</span> может содержать несколько ключей к значению, во избежание дублирования сервисов (и как следствие нарушения принципа <span class="notranslate">singleton</span>) назначен должен быть только один.
</p>

<?= Paragraph::h2('Создание метода в контейнере') ?>

<p>
    Чтобы упростить работу с новым сервисом по ключу <span class="notranslate">RequestIdInterface</span> добавим новый метод в контейнер, так будет его проще найти в контейнере через <span class="notranslate">IDE</span>.<br>
    Новый метод <span class="notranslate">requestId</span> добавляется в класс контейнера <span class="notranslate">(BaseContainer)</span>, теперь класс выглядит вот так:
</p>

<?= Code::fromFile('@views/docs/code/container/new.base.container.class.php');  ?>

<p>
    Важно! Чтобы заработало, метод <span class="notranslate">requestId</span> также должен быть добавлен в интерфейс <span class="notranslate">App\Bootstrap\ContainerInterface</span>.
</p>
<p class="hl-info-block">
    В примере использовано назначение по интерфейсу сервиса, это позволяет изменить класс сервиса в контейнере, оставив привязку к интерфейсу.
    Для собственных внутренних классов приложения здесь также можно обойтись без интерфейса, указав соответствие по классу.
</p>

<p class="hl-info-block">
    Для стандартных сервисов фреймворка все эти действия уже сделаны, их можно получить через соответствующий метод контроллера.
</p>

<p>
    Более подробно создание нового сервиса рассматривается на <a href="<?= Link::url('docs.2.0.container.extended.add.page'); ?>">примере добавления</a> реальной библиотеки.
</p>


<?= Paragraph::h2('Функция rollback() контейнера') ?>

<p>
    Наверняка вы заметили функцию <span class="notranslate">rollback()</span> в классе <span class="notranslate">ContainerFactory</span>.
    Она необходима для сброса состояния сервисов при асинхронном использовании фреймворка, например, вместе с <a href="<?= Link::url('docs.2.0.start.roadrunner.page'); ?>"><span class="notranslate">RoadRunner</span></a>.
</p>
<p>
    Происходит это так:<br>
    Фреймворк при завершении асинхронного запроса сбрасывает состояние у стандартных сервисов.<br>
    Потом вызывает данную функцию <span class="notranslate">rollback()</span>, чтобы выполнился указанный в ней код для сброса состояния добавленных вручную сервисов.
</p>
<p>
    Таким образом, если фреймворк используется в асинхронном режиме, то сброс состояния сервиса (как и любого другого модуля) можно инициализировать здесь.
</p>


<?= Link::previousPage('docs.2.0.console.command.page', 'Консольные команды'); ?>

<?= Link::nextPage('docs.2.0.container.get.page', 'Использование контейнера'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

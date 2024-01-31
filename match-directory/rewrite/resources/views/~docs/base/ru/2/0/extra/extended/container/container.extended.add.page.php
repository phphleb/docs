<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Добавление сервиса в контейнер') ?>

<p>
    В разделе с описанием <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">Контейнера</a> для фреймворка <span class="notranslate">HLEB2</span> данной документации уже есть простой пример с добавлением демонстрационного сервиса.
    Далее рассмотрим пример с добавлением реальной библиотеки для мьютексов как Сервиса.
</p>

<p class="hl-info-block">
    Библиотека <a href="https://github.com/phphleb/conductor">github.com/phphleb/conductor</a> содержит механизм мьютексов, если вы собираетесь использовать эту библиотеку, то её нужно сначала установить.
</p>

<p>
    Вполне возможно назначить ключ в контейнере как класс из библиотеки, но в дальнейшем с этим могут быть проблемы, так как код приложения будет завязан на конкретный класс или интерфейс библиотеки, с невозможностью его подменить.
</p>

<p>
    Внешние библиотеки лучше подключать к проекту используя паттерн Адаптер, класс которого и будет ключом сервиса в контейнере.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.class.php');  ?>

<p>
    Этот класс обёртки для сервиса создан в папке /app/Bootstrap/Services/.
    Несмотря на то, что это удобная директория для примеров, структурно папка с Сервисами должна находиться рядом с логикой проекта.
</p>
<p>
    Теперь добавим библиотеку в контейнер по созданному классу:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.container.php');  ?>

<p>
    На примере видно, что в метод <span class="notranslate">rollback()</span> добавлен сброс состояния для подключенной библиотеки мьютексов, которая поддерживает асинхронность.
</p>
<p>
    После добавления новый сервис доступен из контейнера по этому классу как <span class="notranslate">singleton</span>.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.code.php', false);  ?>

<p>
    Способ использования добавленного сервиса в контроллерах, командах и событиях (во всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.controller.php', false);  ?>

<p>
    Упростить приведённый вызов сервиса можно при добавлении нового одноимённого метода <span class="notranslate">mutex()</span> в класс <span class="notranslate">App\Bootstrap\BaseContainer</span> и его интерфейс:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.container.method.php', false);  ?>

<p>
    Теперь вызов будет выглядеть так:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/add/mutex.method.method.php', false);  ?>


<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


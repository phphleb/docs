<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Получение сервиса из контейнера') ?>

<p>
    Прямой доступ к содержимому контейнера реализован несколькими способами.
    Для того чтобы выбрать необходимый способ, который будет подходящим для создания кода конкретного проекта, необходимо рассмотреть все плюсы и минусы каждого подхода, а также варианты их тестирования.
</p>

<?= Paragraph::h2('Ссылка на контейнер в текущем классе') ?>

<p>
    Классы, унаследованные от класса <span class="notranslate">Hleb\Base\Container</span> получают дополнительные возможности в виде методов и свойство <span class="notranslate"><b>$this->container</b></span> для обращения к сервисам.
    Стандартные классы фреймворка — контроллеры, <span class="notranslate">middlewares</span>, команды, события, уже унаследованы от этого класса.
</p>
<p>
    Если для сервиса в интерфейсе контейнера назначен собственный метод, то сервис можно получить через этот метод.
    Получение демонстрационного сервиса на примере контроллера:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.class.php'); ?>

<p>
    Ссылка на контейнер хранится в свойстве <span class="notranslate">$this->config</span> (ключ <span class="notranslate">'container'</span> в массиве) объекта класса унаследованного от <span class="notranslate">Hleb\Base\Container</span>.
    При создании указанного объекта можно присвоить другое значение (например, c тестовым контейнером) в аргументе <span class="notranslate">'config'</span>.<br>
    Иначе, если не указан конкретный контейнер в аргументе <span class="notranslate">'config'</span> или отсутствует сам аргумент <span class="notranslate">'config'</span> конструктора, то контейнер будет создан по умолчанию.
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.example.php'); ?>

<p>
    Исключения составляют классы Моделей, в них аналогичное получение сервиса будет таким:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.in.model.php'); ?>

<?= Paragraph::h2('Класс Container') ?>

<p>
    Доступ к контейнеру с сервисами предоставляет также класс <span class="notranslate">Hleb\Static\Container</span>, пример:
</p>

<?= Code::fromFile('@views/docs/code/container/get.container.container.php', false); ?>

<?= Paragraph::h2('Стандартные сервисы') ?>

<p>
    В папке <span class="notranslate">/vendor/phphleb/framework/Static/</span> находятся классы-обёртки над стандартными сервисами фреймворка, которые можно использовать в коде аналогично классу <span class="notranslate">Hleb\Static\Container</span>, только для отдельных сервисов.<br>
    Эти сервисы можно получить и предыдущими перечисленными способами.
</p>

<p class="hl-info-block">
    Из-за существования различных подходов в именовании интерфейсов, получение стандартных сервисов из контейнера может быть как по интерфейсу с окончанием <span class="notranslate">Interface</span>, так и без.
    Например, <span class="notranslate">Hleb\Reference\RequestInterface</span> аналогичен <span class="notranslate">Hleb\Reference\Interface\Request</span>.
</p>

<?= Link::previousPage('docs.2.0.container.container.page', 'Устройство контейнера'); ?>

<?= Link::nextPage('docs.2.0.container.di.page', 'Внедрение зависимостей'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

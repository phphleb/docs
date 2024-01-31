<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('События') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> существует несколько предопределённых общих событий, назначенных к конкретному типу действия каждое.<br>
    Все классы событий расположены в папке <span class="notranslate">/app/Bootstrap/Events/</span> и доступны к внесению изменений.
    Технически они заменяют собой конфигурацию, избавляя проект от лишней "магии".
</p>
<p class="hl-info-block">
    Учитывая, что перечисленные классы привязаны к глобальным событиям, код в них, зависящий от частных реализаций, рекомендовано выносить в отдельные классы.
</p>
<p class="hl-danger-block">
    Неоптимизированный код, находящийся в Событиях, может привести к уменьшению общей производительности проекта.
</p>

<?= Paragraph::h2('ControllerEvent') ?>

<p>
    Метод <span class="notranslate">before()</span> этого класса выполняется перед каждым вызовом контроллера из фреймворка.
    Через аргументы можно определить, что за класс и метод задействованы и, если требуется, внести изменения в аргументы в виде именованного массива, вернув их в метод вызываемого контроллера.<br>
    Например, если используется валидация входящего Request сторонней библиотекой, эту проверку можно реализовать через событие <span class="notranslate">ControllerEvent</span>.
</p>
<p>
    Метод <span class="notranslate">after()</span>, при его наличии, позволяет переопределить ответ контроллера и выполняется сразу после контроллера.
    Метод принимает этот результат в аргументе <span class="notranslate">'result'</span> по ссылке, в процессе можно изменить возвращаемые данные для конкретного класса и метода контроллера.<br>
    Глобально это может быть преобразование возвращаемого массива не в <span class="notranslate">JSON</span> как установлено по умолчанию, а в другой формат, например, в <span class="notranslate">XML</span>.
</p>
<p>
    На следующем примере показано прикрепление дополнительного действия перед вызовом определенного класса и метода контроллера:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.controller.php');  ?>

<?= Paragraph::h2('MiddlewareEvent') ?>

<p>
    Метод <span class="notranslate">before()</span> этого класса-посредника выполняется перед каждым вызовом <span class="notranslate">middleware</span> из фреймворка.
    Аргументы метода дают возможность выяснить, что за класс и метод задействованы, а также является ли этот <span class="notranslate">middleware</span> выполняющимся после основного действия.<br>
    При необходимости, есть возможности внести изменения в аргументы целевого метода <span class="notranslate">middleware</span>, изменив их и вернув из текущего метода.
    В таком случае необходимо определить условие, что после вывода результата нужно прекратить выполнение скрипта, для этого из метода <span class="notranslate">after()</span> достаточно вернуть <span class="notranslate">false</span>.
</p>
<p class="hl-info-block">
    Очередность выполнения middlewares может меняться в маршрутах, это необходимо учесть при назначении событий к ним, при необходимости заменив зависящие от порядка выполнения элементы События на соответствующие отдельные middlewares.
</p>

<?= Paragraph::h2('ModuleEvent') ?>

<p>
    Так как модули существуют обособленно, то контроллеры модуля получили собственное Событие.<br>
    Метод <span class="notranslate">before()</span> класса <span class="notranslate">ModuleEvent</span> выполняется перед каждым вызовом контроллера любого модуля из фреймворка.<br>
    В отличие от <span class="notranslate">ControllerEvent</span> здесь присутствует дополнительный аргумент <span class="notranslate">$module</span> для определения названия модуля.<br>
    Аналогично событию контроллера, это Событие тоже может иметь метод <span class="notranslate">after()</span>.
</p>

<?= Paragraph::h2('PageEvent') ?>

<p>
    Это ещё одно событие по аналогии с <span class="notranslate">ControllerEvent</span>, оно привязано к вызовам специальных 'контроллеров для страниц'.<br>
    Такие страницы используются в библиотеке регистрации фреймворка для административной панели и еще на этом сайте с документацией.
</p>

<?= Paragraph::h2('TaskEvent') ?>

<p>
    Выполняется перед запуском каждой команды фреймворка, кроме встроенных в него по умолчанию.
    Также позволяет определить вызываемый класс и источник вызова (из кода или из консоли).
    <span class="notranslate">TaskEvent</span> принимает и возвращает итоговые данные для аргументов конечного метода, вследствие чего здесь также можно подключить стороннюю библиотеку.
    Например, это может быть стандартный консольный обработчик из <span class="notranslate">Symfony</span>.
</p>
<p>
    Метод <span class="notranslate">after()</span> для этого события отличается тем, что имеет доступ к данным, установленные в задаче как <span class="notranslate">setResult()</span>.
    Эти данные передаются по ссылке аргументу <span class="notranslate">'result'</span> и могут быть изменены.<br>
    По необходимости, можно таким же образом изменить возвращаемый статус ответа, применив метод <span class="notranslate">statusCode()</span>.
</p>
<p>
    Демонстрационный пример, показывающий один из способов организовать реагирование (с одним общим интерфейсом) на выполнение различныx задач:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.task.php');  ?>

<p>
    Такой принцип может быть применён не только к событиям для задач, но и к другим Событиям.
</p>

<p class="hl-info-block">
    Оператор <span class="notranslate">switch</span> для События выбран из-за его способности сопоставлять один результат к нескольким блокам <span class="notranslate">case</span>.
</p>

<?= Paragraph::h2('Расширенные условия') ?>

<p>
    Сопутствующие действия могут быть назначены и по иным условиям, например по общей группе в <span class="notranslate">namespace</span>:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.namespace.php', false);  ?>

<p>
    Кроме того, классы событий унаследованы от <span class="notranslate">Hleb\Base\Container</span>, что даёт возможность использовать в них сервисы из контейнера.
    Также в конструкторе классов событий можно получить эти сервисы через <span class="notranslate">Dependency Injection.</span><br>
    Возможности использования их не ограничены, конечно в рамках правил написания читабельного и оптимизированного кода.
    Вот так можно назначить условие по методу <span class="notranslate">HTTP</span>-запроса для конкретного класса и метода:
</p>

<?= Code::fromFile('@views/docs/code/event/class.event.method.php', false);  ?>


<?= Link::previousPage('docs.2.0.console.command.page', 'Консольные команды'); ?>

<?= Link::nextPage('docs.2.0.introduction.page', 'Введение'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


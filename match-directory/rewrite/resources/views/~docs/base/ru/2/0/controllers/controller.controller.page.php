<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Контроллер') ?>

<p>
    Контроллер — часть архитектуры <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб), отвечает за дальнейшее управление обработкой запроса, уже идентифицированного маршрутизатором, но не должен содержать бизнес-логику.
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> контроллерами являются обычные классы-обработчики, привязанные к маршруту методом <span class="notranslate">controller()</span>.<br>
    Этот метод указывает на класс контроллера и его выполняемый метод.
    При совпадении — фреймворк создаёт объект этого класса и вызывает метод.
</p>
<p>
    Фреймворк производит поиск контроллера в папке <span class="notranslate">/app/Controllers/</span> согласно его <span class="notranslate">namespace</span>.
    Вот код контроллера по умолчанию:
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.class.php');  ?>

<p>
    В примере метод <span class="notranslate">'index'</span> контроллера возвращает объект <span class="notranslate">View</span>, сформированный функцией <span class="notranslate">view()</span> и указывающий на шаблон из папки <span class="notranslate">/resources/views/</span>.<br>
    Будет использован шаблон <span class="notranslate">/resources/views/default.php</span><br>
    Это простой пример, так как можно использовать эту функцию аналогичным образом в маршруте.
</p>

<?= Paragraph::h2('Функция view()') ?>

<p>
    Первым аргументом функции назначается шаблон, вторым - именованный массив для передачи в шаблон переменных и их значений, третьим аргументом можно указать числовой код состояния ответа.
</p>

<?= Code::fromFile('@views/docs/code/controller/view.example.php', false);  ?>

<p>
    Если использовать этот пример в контроллере, то будет вызван шаблон <span class="notranslate">/resources/views/template/file.php</span>.<br>
    В файле будут доступны переменные <span class="notranslate">$title</span> и <span class="notranslate">$description</span> c соответствующими значениями:
</p>

<?= Code::fromFile('@views/docs/code/controller/view.template.php');  ?>

<p>
    В случае, если расширение файла шаблона не <span class="notranslate">.php</span>, например, шаблон <span class="notranslate">.twig</span>, то нужно переименовать в функции путь к шаблону, указав расширение.
</p>

<?= Paragraph::h2('Возвращаемые значения') ?>

<p>
    Кроме уже упомянутого объекта <span class="notranslate">View</span>, из метода контроллера могут возвращаться и другие типы значений:
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - эти типы будут преобразованы в строку и выведены в исходном виде как текст.
</p>
<p>
    <span class="notranslate"><b>array</b></span> - возвращаемый массив будет преобразован в <span class="notranslate">JSON</span>-строку.
</p>
<p>
    <b>bool</b> - если возвращается <span class="notranslate">false</span>, то будет выведена стандартная ошибка 404.
</p>
<p>
    Объект (из контейнера) с интерфейсом <span class="notranslate"><b>Hleb\Reference\ResponseInterface</b></span> - будет преобразован в ответ.
</p>
<p>
    Объект с интерфейсом <span class="notranslate"><b>Psr\Http\Message\ResponseInterface</b></span> - будет преобразован в ответ.
</p>

<?php insertTemplate('/docs/ru/2/0/controllers/xssi.json.array'); ?>

<?= Paragraph::h2('Подстановка динамических переменных') ?>

<p>
    Вместе с динамическим маршрутом могут быть определены значения фреймворком, совпадающие с именованными частями <span class="notranslate">URL</span>.
    Например, для следующего маршрута:
</p>

<?= Code::fromFile('@views/docs/code/controller/dynamic.uri.php', false);  ?>

<p>
    Переменные <span class="notranslate">$version</span> и <span class="notranslate">$page</span> могут быть подставлены в метод  контроллера <span class="notranslate">'resource'</span>.
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.init.class.php');  ?>

<?= Paragraph::h2('Использование другого контроллера') ?>

<p>
    Из одного контроллера можно вернуть данные другого, только при этом должны совпадать типы возвращаемых данных.
</p>

<?= Code::fromFile('@views/docs/code/controller/controller.other.class.php');  ?>

<p>
    Для этого вложенного контроллера не будет применено ни одно Событие, из назначенных контроллерам.
</p>

<?= Paragraph::h2('Создание контроллера') ?>

<p>
    Кроме копирования демонстрационного файла <span class="notranslate">DefaultController.php</span> и его изменения, есть еще один простой способ создания контроллера с использованием консольной команды.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add controller ExampleController</p>

<p>
    Эта команда создаст новый шаблон контроллера <span class="notranslate">/app/Controllers/ExampleController.php.</span><br>
    Можно использовать другое подходящее название для класса.<br>
    Фреймворк позволяет также создать <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">собственный шаблон</a> по умолчанию для этой команды.
</p>


<?= Link::previousPage('docs.2.0.routes.page', 'Маршрутизация'); ?>

<?= Link::nextPage('docs.2.0.controller.module.page', 'Модуль'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


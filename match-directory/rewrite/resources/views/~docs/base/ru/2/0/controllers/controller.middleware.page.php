<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Middleware') ?>

<p>
    Middleware (контроллер-посредник) представляет собой разновидность <a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">контроллера</a>, но его основное назначение — не вывод ожидаемого ответа пользователю (хотя <span class="notranslate">middleware</span> может возвращать текст ошибок), а выполнение определённых задач перед тем или после того, как этот ответ будет сформирован.
</p>
<p>
    В отличие от контроллера, этот посредник может быть назначен не только к маршруту, но и к группе маршрутов.
    И там и там может быть несколько разных <span class="notranslate">middleware</span> (и даже одинаковых, если вдруг такое понадобится).
</p>
<p>
    Например, авторизация пользователей может быть реализована в <span class="notranslate">middleware</span> и применена к группе маршрутов, где она необходима.
    Ещё до выполнения контроллера или иного основного действия, прикреплённого к маршруту, будет определён текущий пользователь и статус его авторизации.<br>
    В противном случае класс-посредник передаст выполнение другому контроллеру, вернет ошибку или перенаправит на иной маршрут, в зависимости от реализации.
</p>

<p>
    Когда <span class="notranslate">middleware()</span> метод (варианты <span class="notranslate">after()</span> или <span class="notranslate">before()</span>) применяется в маршруте, он имеет аргумент <span class="notranslate">data</span>.
    Это еще одно отличие от контроллера, в этот аргумент можно передать массив, который затем будет доступен в <span class="notranslate">middleware</span>.
    Данные массива доступны в методе <span class="notranslate">Hleb\Static\Router::data()</span> или через контейнер.
</p>

<p class="hl-info-block">
    Класс middleware должен быть унаследован от <span class="notranslate">Hleb\Base\Middleware</span>.
</p>

<?= Paragraph::h2('Возвращаемые значения') ?>

<p>
    Как правило, предназначение вызванного метода этого класса не возвращать что-либо, а проверять условия.
    Но в некоторых случаях предусмотрен возврат значения.
</p>
<p>
    <span class="notranslate"><b>string</b>|<b>int</b>|<b>float</b></span> - эти типы будут преобразованы в строку и выведены в исходном виде как текст.
</p>
<p>
    <span class="notranslate"><b>array</b></span> - возвращаемый массив будет преобразован в <span class="notranslate">JSON</span>-строку.
    После этого дальнейшее выполнение прерывается.
</p>
<p>
    <span class="notranslate"><b>bool</b></span> - если возвращается <span class="notranslate">false</span>, то это равносильно прерыванию дальнейшего выполнения.
</p>

<?= Paragraph::h2('Создание middleware') ?>

<p>
    Кроме копирования демонстрационного файла <span class="notranslate">DefaultMiddleware.php</span> и его изменения, есть еще один простой способ создания нужного класса с использованием консольной команды.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add middleware ExampleMiddleware</p>

<p>
    Эта команда создаст новый шаблон <span class="notranslate">/app/Middlewares/ExampleMiddleware.php.</span><br>
    Можно использовать другое подходящее название для класса.<br>
    Фреймворк <span class="notranslate">HLEB2</span> позволяет также создать <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">собственный шаблон</a> по умолчанию для этой команды.
</p>

<?= Link::previousPage('docs.2.0.controller.module.page', 'Модуль'); ?>

<?= Link::nextPage('docs.2.0.models.page', 'Модели'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


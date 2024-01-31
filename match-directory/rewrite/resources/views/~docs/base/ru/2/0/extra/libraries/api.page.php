<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Набор трейтов для создания API') ?>

<p>
    Для реализации <span class="notranslate">API</span> на фреймворке <span class="notranslate">HLEB2</span> предусмотрен набор трейтов, упрощающих валидацию и обработку данных в контроллерах (там, где эти трейты применены).
</p>
<p  class="hl-info-block">
    Применение трейтов в <span class="notranslate">PHP</span> является поводом для различных мнений, поэтому этот модуль вынесен в отдельную библиотеку, применять которую вы можете по желанию.
    Существует достаточно большой выбор валидаторов для разработки на <span class="notranslate">PHP</span>, данный лишь представляет простой работоспособный аналог.
</p>
<p>
    Установка библиотеки <span class="notranslate"><a href="https://github.com/phphleb/api-multitool" target="_blank">github.com/phphleb/api-multitool</a></span> при помощи <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/api-multitool</p>

<p>
    или скачайте и распакуйте архив с библиотекой в папку <span class="notranslate">/vendor/phphleb/api-multitool</span>.
</p>

<?= Paragraph::h2('Подключение трейта BaseApiTrait (набор трейтов)') ?>

<p>
    Сначала нужно создать родительский класс <span class="notranslate">BaseApiActions</span> (или с другим названием) для контроллеров с <span class="notranslate">API</span>:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.base.php');  ?>

<p>
    Bсе вспомогательные трейты собраны в трейте <span class="notranslate">BaseApiTrait</span> как набор.
    Поэтому достаточно подключить его к контроллеру и получить полную реализацию.
    Если необходим другой набор из этих трейтов, то нужно или использовать их группой или соединить в собственный набор.

</p>
<p>
    После этого во всех наследуемых от этого класса контроллерах появятся методы от каждого трейта в наборе:
</p>

<?= Paragraph::h2('ApiHandlerTrait') ?>

<p>
    Трейт <span class="notranslate">ApiHandlerTrait</span> содержит несколько методов, которые могут пригодиться для обработки возвращаемых данных <span class="notranslate">API</span>.
    Это не значит, что его методы <span class="notranslate">'present'</span> и <span class="notranslate">'error'</span> формируют окончательный ответ, они возвращают именованные массивы, которые можно использовать по собственному более сложному стандарту.
    Пример в методе контроллера:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.handler.php');  ?>

<p>
    Во фреймворке <span class="notranslate">HLEB</span> при возвращении массива из контроллера он автоматически преобразуется в <span class="notranslate">JSON</span>.
    При выводе отформатированного массива к нему добавлено значение <span class="notranslate">'error_cells'</span> с перечнем полей, в которых произошли ошибки валидации (при наличии таковых).
</p>

<?= Paragraph::h2('ApiMethodWrapperTrait') ?>

<p>
    Осуществляет перехват системных ошибок и вывод их в метод <span class="notranslate">'error'</span> предыдущего трейта <span class="notranslate">ApiHandlersTrait</span> или иного, предназначенного для этой цели (если упомянутый трейт не используется).
    Если вызван метод контроллера, то для правильной обработки его ошибок необходимо добавить префикс <span class="notranslate">'action'</span> в контроллере, а в маршруте оставить без префикса, как, например, для предыдущего примера контроллера роутинг будет примерно таким:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.action.route.php', false);  ?>

<p>
    Здесь нужно уточнить, что в оригинале вызов идёт к методу <span class="notranslate">'getOne'</span> контроллера, а в самом контроллере метод <span class="notranslate">'actionGetOne'</span>.
</p>

<?= Paragraph::h2('ApiPageManagerTrait') ?>

<p>
    Реализует довольно частно необходимую функцию пагинации выводимых данных.
    Добавляет метод <span class="notranslate">'getPageInterval'</span>, который преобразует данные пагинации в более удобный вид.
    При этом вычисляется начальное значение выборки, что удобно для работы с базой данных.
</p>

<?= Paragraph::h2('ApiRequestDataManagerTrait') ?>

<p>
    Добавляет метод <span class="notranslate">'check'</span>, при помощи которого можно проверить данные одного массива при помощи условий проверки из другого.
    Использование этого трейта добавляет возможность проверить любые входящие данные, преобразованные в массив, будь это параметры <span class="notranslate">POST</span>-запроса или <span class="notranslate">JSON Body</span>.
    Существует перечень возможных условий, при помощи которых можно проверить данные, они составляются разработчиком.
    Например (<span class="notranslate">Request::input()</span> для фреймворка <span class="notranslate">HLEB2</span> возвращает массив <span class="notranslate">JSON Body</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.body.php', false);  ?>

<p>
    <span class="notranslate"><b>required</b></span> - обязательное поле, располагается строго в начале.
</p>
<p>
    Список возможных типов (<span class="notranslate">'type'</span> - обязательно на первом месте или после <span class="notranslate">required</span>):<br>
    <span class="notranslate"><b>string</b></span> - проверяет наличие строкового значения, ограничения могут быть <span class="notranslate">minlength</span> и <span class="notranslate">maxlength</span>.<br>
    <span class="notranslate"><b>float</b></span> - проверка на тип <span class="notranslate">float(double)</span>, ограничения могут быть <span class="notranslate">max</span> и <span class="notranslate">min</span>.<br>
    <span class="notranslate"><b>int</b></span> - проверка на тип <span class="notranslate">int(integer)</span>, ограничения могут быть <span class="notranslate">max</span> и <span class="notranslate">min</span>.<br>
    <span class="notranslate"><b>regex</b></span> - проверка по регулярному выражению, например <span class="notranslate">'regex:[0-9]+'</span>.<br>
    <span class="notranslate"><b>fullregex</b></span> - проверка по полному регулярному выражению, аналогично <span class="notranslate">'fullregex:/^[0-9]+$/i'</span>, обязательно обрамлённое слешами, может содержать символы : и |, в отличие от более простого <span class="notranslate">regex</span>.<br>
    <span class="notranslate"><b>bool</b></span> - проверка на булево значение, только <span class="notranslate">true</span> или <span class="notranslate">false</span>.<br>
    <span class="notranslate"><b>null</b></span> - проверка на <span class="notranslate">null</span> как правильное значение.<br>
    <span class="notranslate"><b>void</b></span> - проверка на пустую строку как правильное значение.<br>
</p>
<p>
    Тип для перечислений:<br>
    <span class="notranslate"><b>enum</b></span> - поиск среди возможных значений, например <span class="notranslate">'enum:1,2,3,4,south,east,north,west'</span>.<br>
    Проверка на равенство не строгая, поэтому правильно будет как 4, так и '4', для точного соответствия лучше сопроводить проверкой на тип.
</p>
<p>
    Можно добавить два и более типа, они будут проверены на все общие условия включительно, например <span class="notranslate">'type:string,null,void|minlen:5'</span> - будет означать, что проверяется строка, минимум 5 символов или пустая, или же значение <span class="notranslate">null</span>, во всех остальных случаях возвращает <span class="notranslate">false</span> как результат не пройденной проверки валидации.
</p>
<p>
    Также можно проверить массив из поля со списком стандартных полей массива (будут проверяться по единому шаблону):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.array.php', false);  ?>

<p>
    Для проверки значений вложенных массивов в проверочном массиве название указывается в квадратных скобках.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.example.php', false);  ?>

<p>
    Приведённое выше условие вернёт успешную проверку с учётом вложенности.
</p>

<?= Paragraph::h2('Тестирование') ?>

<p>
    Трейты <span class="notranslate">API</span> проверены при помощи <a href="https://github.com/phphleb/api-tests" target="_blank">github.com/phphleb/api-tests</a>
</p>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


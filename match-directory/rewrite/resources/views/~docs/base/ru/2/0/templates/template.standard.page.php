<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Стандартные шаблоны') ?>

<p>
    <span class="notranslate">View</span> или Вид (еще называемый Представление) — это составная часть архитектурного паттерна <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб).
</p>
<p>
    Шаблоны хранят в себе структуру ответа, который будет отправлен в браузер.
    Часто это <span class="notranslate">HTML</span>-код содержащий <span class="notranslate">PHP</span>-переменные, определённые извне шаблона.<br>
    Шаблоны можно вставлять в другие шаблоны.
</p>
<p>
    Импорт одних шаблонов в другие производится во фреймворке через специальные функции.
</p>
<p class="hl-info-block">
    Функция <span class="notranslate">view()</span> для вставки шаблона из маршрута или контроллера предназначена для шаблонов с расширением <span class="notranslate">.php</span> или <span class="notranslate">.twig</span>.
    При использовании <span class="notranslate">TWIG</span> вам не понадобятся стандартные функции фреймворка для вставки шаблонов в шаблоны и их кеширования, так как <span class="notranslate">TWIG</span> предоставляет собственные средства.
</p>

<?= Paragraph::h2('Функция insertTemplate()') ?>

<p>
    Части кода в подключаемых файлах папки <span class="notranslate">/resources/views/</span> могут повторяться.
    Чтобы вынести их в отдельный шаблон, независимый от окружающего контента, используется функция <span class="notranslate">insertTemplate()</span>, первым аргументом которой указывается название шаблона из папки <span class="notranslate">/resources/views/</span>, а вторым - массив переменных, которые будут доступны в шаблоне по ключам массива.
    Для отличия шаблонов от других файлов их рекомендуется разместить в отдельной папке <span class="notranslate">/templates/</span>.
</p>
<p>
    Пример того, как в шаблон <span class="notranslate">/resources/views/content.php</span> вставляется другой шаблон <span class="notranslate">/resources/views/templates/counter.php</span>, используя часть данных из первого.
</p>


<?= Code::fromFile('@views/docs/code/template/insert.template.php');  ?>

<?= Code::fromFile('@views/docs/code/template/insert.counter.template.php');  ?>


<?= Paragraph::h2('Функция template()') ?>

<p>
    Вспомогательная функция <span class="notranslate">template()</span> аналогична <span class="notranslate">insertTemplate()</span>, только возвращает содержимое шаблона в виде строкового представления, а не выводит его в том месте, где определена.
</p>

<?= Link::previousPage('docs.2.0.models.page', 'Модели'); ?>

<?= Link::nextPage('docs.2.0.template.cached.page', 'Кешируемые шаблоны'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

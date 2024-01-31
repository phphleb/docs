<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Настраиваемые параметры команд') ?>

<p>
    Изначально параметры для выполнения <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">консольных команд</a> задаются в методе <span class="notranslate">'run'</span> класса команды.
    Они соответствуют очередности аргументов метода.
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> присутствует возможность также задать один именованный параметр или несколько именованных параметров для команды.
    Для именованных параметров очередность не имеет значения при вызове команды.
</p>

<?= Paragraph::h2('Метод rules()') ?>

<p>
    Метод <span class="notranslate">rules()</span> класса команды возвращает массив с правилами для расширенных параметров.
    Если такой метод отсутствует, то добавьте его первым методом класса команды.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.base.php', false);  ?>

<p>
    В примере показаны три различных именованных параметра разного типа.
    Название параметра обязательное и не должно дублироваться.
</p>
<p>
    Первый параметр поддерживает два значения <span class="notranslate">-N</span> и <span class="notranslate">--Name</span>, наличие его обязательно.
    По умолчанию <span class="notranslate">--Name</span> равен строке <span class="notranslate">'Undefined'</span>, входящее значение может быть только строкой (не массив).
    Значение может быть вида <span class="notranslate">--Name=Fedor</span> или <span class="notranslate">-N=Mark</span>, при <span class="notranslate">--Name</span> будет равно <span class="notranslate">'Undefined'</span>.
</p>
<p>
    Второй параметр вида <span class="notranslate">--force</span> (без значения), если присутствует, то равен <span class="notranslate">true</span>.
</p>
<p>
    Третий параметр в виде массива, значение может быть задано несколько раз как <span class="notranslate">--UserData=1</span> и <span class="notranslate">--UserData=2</span>, что равнозначно <span class="notranslate">--UserData=[1,2]</span>, наличие его необязательно и при отсутствии значения или вызове как <span class="notranslate">--UserData</span> будет равен [] (пустому массиву).
</p>

<?= Paragraph::h2('Получение значений параметров') ?>

<p>
    Данные параметров можно получить как <span class="notranslate"><span class="hl-nowrap">$this-><b>getOptions()</b></span></span> или <span class="notranslate"><span class="hl-nowrap">$this-><b>getOption()</b></span></span> в методе <span class="notranslate">run()</span> команды.
    Первый способ возвращает именованный массив системных объектов, из каждого можно получить значение в нужном формате.
    Другой возвращает аналогичный системный объект одного параметра по названию (обязательному основному, не сокращённому).
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/console/arguments/example.rules.value.php', false);  ?>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


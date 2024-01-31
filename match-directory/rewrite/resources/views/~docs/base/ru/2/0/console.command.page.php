<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Консольные команды') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> есть как встроенные консольные команды, так и возможность создания их разработчиком, использующим фреймворк.
</p>
<p>
    Консольные команды запускаются из терминала или планировщика задач, входная точка для них — файл <span class="notranslate">'console'</span> в корне проекта, представляющий собой обычный <span class="notranslate">PHP</span>-файл.
</p>

<?= Paragraph::h2('Стандартные команды') ?>
<p>
    Список команд фреймворка можно получить консольной командой:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --help</p>

<pre class="hl-text-block">
--version or -v                                 (отображает текущую версию фреймворка)
--info or -i [name]                              (показ актуальных настроек из common)
--help or -h                                      (выводит список команд по умолчанию)
--ping                        (проверка сервиса, возвращает предопределённое значение)
--logs or -lg                             (вывод последних строчек из файлов с логами)
--list or -l                                    (отображает список добавленных команд)
--routes or -r                                    (отформатированный список маршрутов)
--find-route (or -fr) &lt;url&gt; [method] [domain]                  (поиск маршрута по URL)
--route-info (or -ri) &lt;url&gt; [method] [domain]           (информация о маршруте по URL)
--clear-routes-cache or -cr                                    (удаляет кеш маршрутов)
--update-routes-cache or --routes-upd or -u                  (обновляет кеш маршрутов)
--clear-cache or -cc                                     (очистка кеша для фреймворка)
--add &lt;task|controller|middleware|model&gt; &lt;name&gt; [desc]               (создание класса)
--create module &lt;name&gt;                                        (создание файлов модуля)
--clear-cache--twig or -cc-twig                  (очистка кеша для шаблонизатора Twig)

&lt;command&gt; --help                                            (запрос справки о команде)
</pre>

<?= Paragraph::h2('Создание собственной консольной команды') ?>

<p>
    Пример добавления собственной консольной команды при помощи создания соответствующего класса в папке <span class="notranslate">/app/Commands/Demo/</span>:
</p>

<?= Code::fromFile('@views/docs/code/task/default.task.class.php');  ?>

<p>
    Или через встроенную консольную команду:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --add task demo/example-task "task description"</p>

<p>
    Будет создан файл <span class="notranslate">/app/Commands/Demo/ExampleTask.php</span>.
    При необходимости можно <a href="<?= Link::url('docs.2.0.generate.mvc.page'); ?>">изменить исходный шаблон</a> для генерации задач.
</p>
<p class="hl-info-block">
    Во фреймворке название команды складывается из названия (относительного пути) класса, находящегося в папке <span class="notranslate">/app/Commands/</span>.
    Поэтому рекомендуется изначально давать командам значимые названия, отображающие суть их действия.
</p>
<p>
    Теперь можно запустить новую команду из консоли, также она станет видна в общем списке команд.<br>
    Но так как в ней пока нет выводимого результата, добавим параметр <span class="notranslate">--help</span>, чтобы получить информацию о команде.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task --help</p>

<?= Paragraph::h2('Передача параметров с командой') ?>

<p>
    Изменим созданный класс команды так, чтобы метод <span class="notranslate">run()</span> принимал аргументы.
</p>

<?= Code::fromFile('@views/docs/code/task/args.task.class.php');  ?>

<p class="hl-info-block">
    Возвращаемое значение <span class="notranslate">self::SUCCESS_CODE</span> в классе команды показывает, что команда выполнилась успешно.
    Если команды в консоли или планировщике задач должны выполнится подряд через <span class="notranslate">&&</span>, то выполнение прервется при возврате <span class="notranslate">self::ERROR_CODE</span>.
    Это может быть полезно и в других комплексных случаях, таких как <span class="notranslate">CI/CD</span>.
</p>

<p>
    После этого выполним команду с двумя аргументами, чтобы получить вывод <span class="notranslate">'speed and quality'</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console demo/example-task speed quality</p>

<p>
    Для специальных случаев фреймворк позволяет создавать <a href="<?= Link::url('docs.2.0.task.extended.args.page'); ?>">именованные параметры</a> команд.
</p>

<?= Paragraph::h2('Выполнение команды из кода') ?>

<p>
    Созданную команду можно выполнить из кода приложения или из другой консольной команды.
</p>

<?= Code::fromFile('@views/docs/code/task/execute.task.class.php', false);  ?>

<p>
    Но только в этом случае результат работы команды не будет выведен, так как предназначение её теперь иное.<br>
    Чтобы получить результат работы команды, необходимо использовать внутри класса метод <span class="notranslate">$this->setResult()</span> для установки данных, а затем получить извне эти данные через метод <span class="notranslate">getResult()</span>.
</p>

<?= Code::fromFile('@views/docs/code/task/result.task.class.php', false);  ?>

<?= Paragraph::h2('Ограничения команд через атрибуты') ?>

<p>
    Тип созданных команд и предназначение можно контролировать атрибутами <span class="notranslate">PHP</span>.
</p>
<p>
    Аттрибут <span class="notranslate"><b>#[Purpose]</b></span> предназначен для задания области видимости команд.
</p>

<?= Code::fromFile('@views/docs/code/attribute/purpose.task.php');  ?>

<p>
    У этого атрибута существует один аргумент <span class="notranslate">status</span>, в котором можно указать варианты: <br>
    <span class="notranslate">Purpose::FULL</span> - без ограничений, значение по умолчанию.<br>
    <span class="notranslate">Purpose::CONSOLE</span> - можно использовать только как консольную команду.<br>
    <span class="notranslate">Purpose::EXTERNAL</span> - использование только в коде, отсутствует в списке команд.<br>
</p>
<p>
    Аттрибут <span class="notranslate"><b>#[Disabled]</b></span> у класса команды делает её неактивной.
</p>
<p>
    Аттрибут <span class="notranslate"><b>#[Hidden]</b></span>  у класса команды скрывает её из списка консольных команд.
</p>

<?= Link::previousPage('docs.2.0.template.twig.page', 'Шаблонизатор TWIG'); ?>

<?= Link::nextPage('docs.2.0.container.container.page', 'Контейнер'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Сервис логирования') ?>
<p>
    Сервис <b>Log</b> — это механизм логирования во фреймворке <span class="notranslate">HLEB2</span>, позволяющий сохранять ошибки и сообщения в специальное хранилище логов.
    Принцип сохранения логов во фреймворке основан на <span class="notranslate">PSR-3</span>.
</p>
<p>
    По умолчанию во фреймворке используется встроенный механизм логирования, сохраняющий логи в файл.
    Логируются все ошибки <span class="notranslate">PHP</span> и работы самого приложения, а также информационные и отладочные логи, заданные разработчиком в коде.
</p>

<p class="hl-info-block">
    Стандартные файловые логи фреймворка сохраняются в папку <span class="notranslate">/storage/logs/</span> проекта.
</p>

<p>
    Способы использования <span class="notranslate">Log</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере добавления информационного сообщения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.container.php', false);  ?>

<p>
    Пример логирования в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Log</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Log</span>.
</p>

<p>
    Для упрощения примеров, далее они будут содержать только обращение через функцию <span class="notranslate">logger()</span>.
</p>
<p>
    При выполнении одного из предыдущих примеров в директории <span class="notranslate">/storage/logs/</span> будет создан файл лога (если не существовал ранее) с добавлением строчки, которая примерно будет выглядеть так:
</p>

<div class="hl-text-block notranslate">
    <div class="hl-nowrap">[13:01:12.211556 10.01.2024 UTC+03] Web:INFO Sample message {/path/to/project/app/Controllers/TestController.php on line 31} {App\Controllers\TestController->get()} GET http://example-domain.ru/test-log 127.0.0.1 #{"request-id":"71cc0539-af41-556d-9c48-2a6cd2d8090f","debug":true}</div>
</div>

<p>
    Из текста лога видно, что было выведено сообщение <span class="notranslate">'Sample message'</span> с указанием заданного уровня <span class="notranslate">'INFO'</span>, а также дополнительная информация о вызове лога, точное время и базовые данные запроса.
</p>

<p class="hl-info-block">
    Конфиденциальную информацию и данные в составе логов, раскрытие которых может привести к нарушениям безопасности проекта, не рекомендуется отправлять в сторонние сервисы для хранения логов, так как они могут быть подвержены взлому.
</p>

<?= Paragraph::h2('Уровни логирования') ?>

<p>
    При выборе уровня логирования нужно руководствоваться содержанием и важностью выводимых данных.
    Список от обычных сообщений до критических ошибок по возрастанию:
</p>
<p>
    <span class="notranslate"><b>debug()</b></span> - отладочные сообщения, обычно используются только при разработке проекта.
    По умолчанию в настройках фреймворка задан максимальным уровень ниже (<span class="notranslate">info</span>) и эти сообщения не будут сохранены в лог.
</p>
<p>
    <span class="notranslate"><b>info()</b></span> - информационные сообщения, которые необходимы для представления о том, как функционирует та или иная часть кода, все ли условия выполняются.
    Здесь может быть выведен конкретный SQL запрос, чтобы можно было затем проверить правильность выполнения.
</p>
<p>
    <span class="notranslate"><b>notice()</b></span> - уведомления о событиях в системе.
    Например, может сигнализировать о приближении к критическому порогу некоторого важного значения, но который еще не был достигнут.
</p>
<p>
    <span class="notranslate"><b>warning()</b></span> - для логирования исключительных случаев, не в качестве критических ошибок, а предупреждений.
    К примеру, использование устаревших <span class="notranslate">API</span>, неправильное использование <span class="notranslate">API</span>, другие нежелательные случаи.
</p>
<p>
    <span class="notranslate"><b>error()</b></span> - ошибки выполнения, возникающие при определённых условиях.
    Эти ошибки не требуют немедленных действий, но должны быть зарегистрированы и контролироваться.
</p>
<p>
    <span class="notranslate"><b>critical()</b></span> - критические ошибки в программе, как, например, недоступность одного из компонентов.
</p>
<p>
    <span class="notranslate"><b>alert()</b></span> - общая недоступность системы, это может быть неработоспособность базы данных, всего веб-сайта и т.д.
    Действия по исправлению должны быть приняты немедленно.
</p>
<p>
    <span class="notranslate"><b>emergency()</b></span> - система полностью непригодна для использования.
</p>

<?= Paragraph::h2('Контекст логирования') ?>

<p>
    Согласно <span class="notranslate">PSR-3</span> вы можете передать вторым аргументом именованный массив данных для подстановки в текст сообщения, например:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.replace.php', false);  ?>

<p>
    Во встроенном логе фреймворка вы также можете добавить в массив другие данные и они будут выведены по ключу в лог в разделе с <span class="notranslate">'request-id'</span>.
    Сторонние механизмы логирования могут не поддерживать эту возможность.
</p>

<?= Paragraph::h2('Альтернативный Logger') ?>

<p>
    Фреймворк <span class="notranslate">HLEB2</span> поддерживает только один актуальный экземпляр механизма логирования, если нужно заменить его на сторонний, то это нужно сделать при инициализации фреймворка.
    Эта необходимость обоснована тем, что логирование ошибок должно начинаться с самого начала загрузки и работы самого фреймворка.
</p>

<?= Paragraph::h2('Настройки логирования') ?>

<p>
    В файле <span class="notranslate">/config/common.php</span>:<br>
    <span class="notranslate"><b>log.enabled</b></span> - включение/отключение сохранения в логи, может быть полезным при кратковременном отключении логирования для снятия нагрузки на приложение.<br>
    <span class="notranslate"><b>max.log.level</b></span> - установка максимального уровня логирования (от сообщений до критических ошибок).
    Например, если установить уровень <span class="notranslate">'warning'</span>, то логи с уровнями <span class="notranslate">'debug'</span>, <span class="notranslate">'info'</span> и <span class="notranslate">'notice'</span> сохраняться не будут.<br>
    <span class="notranslate"><b>max.cli.log.level</b></span> - максимальный уровень логирования при использовании фреймворка через консольные команды из терминала или планировщика задач.<br>
    <span class="notranslate"><b>error.reporting</b></span> - этот параметр относится к уровню ошибок, но имеет отношение и к логированию, так как определяет ошибки, которые попадут в лог.<br>
    <span class="notranslate"><b>log.sort</b></span> - при стандартном файловом логировании разбивает логи по источнику (домену сайта).<br>
    <span class="notranslate"><b>log.stream</b></span> - выводит логи в указанный поток вывода, если он указан, например в <span class="notranslate">'/dev/stdout'</span>.<br>
    <span class="notranslate"><b>log.format</b></span> - доступно два формата для стандартного логирования, <span class="notranslate">'row'</span>(по умолчанию) и <span class="notranslate">'json'</span>, последний преобразует вывод логов в <span class="notranslate">JSON</span>-формате.<br>
</p>
<p>
    В файле <span class="notranslate">/config/main.php</span>:<br>
    <span class="notranslate"><b>db.log.enabled</b></span> - сохранение в логи всех запросов к базам данных.
</p>

<?= Paragraph::h2('Примеры использования') ?>
<p>
    Обобщённые примеры, показывающие отличие в логировании ошибок и обычных информационных логов:
</p>

<?= Code::fromFile('@views/docs/code/container/service/log/get.log.example.php', false);  ?>


<?= Paragraph::h2('Просмотр логов') ?>

<p>
    При стандартном хранении логов в файлах, последние добавленные логи можно вывести в терминале с использованием консольной команды:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console  --logs 3 5</p>

<p>
    Указанная команда выведет по три последних лога для пяти крайних по дате файлов с логами.
</p>
<p>
    В журнале логов (по умолчанию в файлах) каждый лог имеет метку <span class="notranslate">"request-id"</span>, по которому можно выбрать все логи конкретного запроса.<br>
    Для <span class="notranslate">UNIX</span>-систем и macOS вы можете использовать команду <span class="notranslate">'grep'</span> для поиска по типу ошибки:
</P>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>grep -m10 :ERROR ./storage/logs/*</p>

<p>
    Гибкость этой команды позволяет производить поиск по различным условиям, в том числе и по <span class="notranslate">"request-id"</span> запроса.
</p>
<p>
    Для <span class="notranslate">Windows</span> альтернативой будет команда <span class="notranslate">'findstr'</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">D:\project></span>findstr /S /C:":ERROR" "storage/logs/*"</p>

<?= Paragraph::h2('Ротация логов') ?>

<p>
    В комплекте с фреймворком поставляется класс <span class="notranslate">App\Commands\RotateLogs</span>, это реализация консольной команды для удаления устаревших файлов с логами.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console rotate-logs 5</p>

<p>
    Данная команда удалит все файлы логов созданные ранее пяти дней назад.
    По умолчанию - три дня.
    Команда предназначена как для ручной ротации, так и добавления в планировщике задач (на ежедневное выполнение).
</p>
<p>
    Чтобы фреймворк отслеживал автоматически максимальный размер файловых логов, необходимо настроить опцию <span class="notranslate">'max.log.size'</span> в файле <span class="notranslate">/config/common.php</span>.
    Значение указывается как целое число в мегабайтах.
    Но при активности этого параметра, и при непредсказуемо большом количестве логов за текущий день, могут быть удалены все логи за предыдущий.
</p>

<?= Link::previousPage('docs.2.0.service.cache.page', 'Кеширование'); ?>

<?= Link::nextPage('docs.2.0.service.path.page', 'Path'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

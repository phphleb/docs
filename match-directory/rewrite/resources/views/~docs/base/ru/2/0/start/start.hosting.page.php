<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Установка и запуск на хостинге') ?>

<p>
    На различных хостингах требования к установке могут отличаться, но есть основные нюансы, которые будут здесь приведены.
</p>

<?= Paragraph::h2('Отключение DEBUG-режима') ?>

<p>
    Режим отладки должен быть отключён на любом публичном сервере, поэтому хостинг не исключение.<br>
    Чтобы разделить настройки с локальной разработкой, скопируйте файл <span class="notranslate">/config/common.php</span> как <span class="notranslate">/config/common-local.php</span> и в первом отключите <span class="notranslate">debug</span>-режим, а во втором включите.<br>
    Теперь, если не добавлять файл <span class="notranslate">/config/common-local.php</span> на сервер хостинга, настройки будут различны.
</p>

<?= Paragraph::h2('Строгая структура проекта') ?>

<p>
    Часто на хостингах публичная папка носит название <span class="notranslate">public_html</span>, может быть иначе, но, чтобы использовать эту папку, достаточно изменить название папки <span class="notranslate">public</span> в проекте с фреймворком.
    <a href="<?= Link::url('docs.2.0.installation.page'); ?>">Подробнее</a> о смене названия публичной папки.
</p>
<p>
    Возможно, что в рекомендации хостинга будет размещение проекта именно в <span class="notranslate">public_html</span>, однако, следуя структуре фреймворка, необходимо разместить его директорией выше, чтобы публичные папки совпали при переносе данных.
</p>

<?= Paragraph::h2('Использование баз данных') ?>

<p>
    Скорее всего, хостинг предоставит базу данных и способ подключения к ней, эти настройки могут отличаться от настроек локальной разработки.
    Для исправления этого нужно создать копию файла <span class="notranslate">/config/database.php</span>, назвать <span class="notranslate">/config/database-local.php</span> и установить в первом настройки хостинга, а в копии - локальные настройки.
    Теперь, если не переносить файл <span class="notranslate">/config/database-local.php</span> на сервер хостинга, настройки будут разделены.
</p>

<?= Paragraph::h2('Планировщик задач') ?>

<p>
    Во фреймворке есть как встроенные консольные команды, так и заданные разработчиком.
    Если хостер предоставляет механизм планировщика задач, то можно назначить эти консольные команды в задание.
</p>
<p>
    Для назначения в задание планировщика может понадобиться указать полный путь к исполняемому файлу PHP.<br>
    Например, так:
</p>

<p class="hl-text-block"><span class="hl-not-selected notranslate">/usr/local/bin/php8.2 ~/project/dir/console rotate-logs 5</span></p>

<p>
    Алтернативой для выполнения консольных команд вручную может быть использование специальной <a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Веб-консоли</a> фреймворка.
</p>

<?= Link::previousPage('docs.2.0.start.swoole.page', 'Сервер Swoole'); ?>

<?= Link::nextPage('docs.2.0.start.webrotor.page', 'WebRotor'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

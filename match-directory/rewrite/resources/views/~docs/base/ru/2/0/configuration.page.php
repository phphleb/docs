<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Настройка конфигурации') ?>

<p>
    Настройки фреймворка <span class="notranslate">HLEB2</span> хранятся в конфигурационных файлах папки <span class="notranslate">/<b>config</b>/</span>.<br>
    В начале некоторых из них вы можете найти строчку вроде этой:
</p>

<?= Code::fromFile('@views/docs/code/configuration.example.php', false);  ?>

<p>
    Этот код означает, что при существовании файла <span class="notranslate">common-local.php</span> в этой папке его настройки будут использованы вместо текущих (файла <span class="notranslate">common.php</span>).
</p>
<p>
    Таким образом, можно создать копии этих файлов с добавлением <span class="notranslate">'-local'</span> к названиям и использовать для локальной разработки, не добавляя их в систему контроля версий (т.е. без передачи на целевой сервер).
    Только в скопированных файлах нужно убрать эту строчку с кодом, она уже не нужна.
</p>
<p>
    Раздельные настройки для локального устройства и конечного сервера дают удобство для их конфигурирования.
</p>

<p class="hl-info-block">
    Во фреймворке можно получить любое значение из конфигурации по его названию, таким образом эти настройки могут быть использованы и для инициализации сторонних библиотек.
</p>

<?= Paragraph::h2('Режим отладки') ?>

<p>
    В <span class="notranslate">DEBUG</span>-режиме фреймворк работает немного иначе, чем обычно, он отображает отладочную информацию и ошибки, которые не должны быть доступны на публичном ресурсе.
</p>

<p class="hl-danger-block">
    Режим отладки фреймворка должен использоваться только для внутренней разработки.
</p>

<p>
    Чтобы отключить/включить режим отладки, измените значение <span class="notranslate"><b>debug</b></span> в файле <span class="notranslate">/config/common.php</span> на необходимое.
</p>
<p>
    Подобным образом меняются значения остальных конфигурационных настроек.
</p>

<?= Paragraph::h2('Кеширование') ?>

<p>
    В режиме отладки также будет полезным отключить кеширование, которое производится средствами фреймворка.
    За это отвечает настройка <span class="notranslate"><b>app.cache.on</b></span> в файле <span class="notranslate">/config/common.php.</span>
</p>

<?= Paragraph::h2('Автообновление кеша маршрутов') ?>

<p>
    Во фреймворке по умолчанию встроено автоматическое обновление кеша маршрутов при внесении в них изменений разработчиком приложения.<br>
    Это удобно для локальной работы с фреймворком, но в дальнейшем, когда запросов будет много, на production-сервере можно отключить автообновление и использовать вместо него специальную консольную команду при каждом внесении изменений.
    Режим автообновления изменяется параметром <span class="notranslate"><b>routes.auto-update</b></span> в файле <span class="notranslate">/config/common.php.</span>
</p>

<?= Paragraph::h2('Вывод ошибок в лог') ?>

<p>
    По умолчанию информация о возникших ошибках сохраняется в файлы папки <span class="notranslate">/storage/logs/</span>.
    Если включен режим <span class="notranslate">DEBUG</span>, то дополнительно ошибки могут выводиться пользователю (в браузере или через <span class="notranslate">API</span>).<br>
    Уровень ошибок может регулироваться в настройке <span class="notranslate"><b>error.reporting</b></span> файла <span class="notranslate">/config/common.php</span>.
    Изначально выводятся все уровни ошибок <span class="notranslate">PHP</span> (рекомендованное значение).
</p>

<?= Paragraph::h2('Часовой пояс') ?>

<p>
    За указание часового пояса для функций даты/времени отвечает настройка <span class="notranslate"><b>timezone</b></span>  файла <span class="notranslate">/config/common.php</span>.<br>
    По умолчанию: <span class="notranslate">'Europe/Moscow'</span>.
</p>

<?= Paragraph::h2('Настройки баз данных') ?>

<p>
    Файл <span class="notranslate">/config/database.php</span> содержит настройки для используемых баз данных.
    Изначально там несколько различных примеров.<br>
    В файле настроек перечнем конфигураций является вложенный массив с ключом <span class="notranslate">'db.settings.list'</span>, из него выбирается блок настроек по умолчанию, указанный в опции <span class="notranslate"><b>'base.db.type'</b></span>.
</p>



<?= Link::previousPage('docs.2.0.tuning.page', 'Настройка фреймворка'); ?>

<?= Link::nextPage('docs.2.0.directories.page', 'Структура проекта'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

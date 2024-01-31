<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Настройка фреймворка') ?>

<p>
    После установки проекта предстоит настроить сам фреймворк.
    На предыдущем шаге проект был установлен в папку <b><span class="notranslate">new_project</span></b> (или любое другое название папки, которое было выбрано), для выполнения указанных далее консольных команд необходимо перейти в эту папку:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>cd new_project</p>

<p>
    Указанный пример может отличаться для различных консольных сред.
</p>
<p>
    Подразумевается, что все консольные команды в документации запускаются из этой корневой папки проекта, если не указано иное.
</p>

<p class="hl-info-block">
    Если приложение работает на хостинге, где консольные команды фреймворка недоступны, то их можно выполнить через специальную <span class="hl-nowrap"><a href="<?= Link::url('docs.2.0.web.console.page'); ?>">Веб-консоль</a></span> фреймворка.
</p>

<?= Paragraph::h2('Настройка прав доступа в Linux') ?>

<p class="hl-danger-block">
    Внимание! Команда вида <b><span class="notranslate">sudo chmod -R 777 ./storage</span></b>, заменяющая следующую настройку прав, может быть применима только на локальном устройстве разработки, не являющимся публичным.
</p>

<p>
    После установки фреймворка <span class="notranslate">HLEB2</span> для <span class="notranslate">Linux</span> необходимо настроить права.
    Для этого нужно знать имя группы веб-сервера.
    Далее предложено, как установить расширенные права на редактирование файлов в папке <span class="notranslate">/storage/</span> проекта.
    Веб-сервер может носить имя <span class="notranslate">www-data</span>, а его группа может быть одноимённая <span class="notranslate">www-data</span>.
    При запуске фреймворка, если права ещё не заданы, будет выведена ошибка с попыткой определить имя и группу активного веб-сервера.
    Чтобы новые файлы, создаваемые веб-сервером, могли редактироваться через консоль текущим пользователем, необходимо добавить его в группу веб-сервера:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo usermod -aG www-data ${USER}</p>

<p>
    После этих изменений в составе группы, чтобы изменения применились, необходимо разлогиниться и снова залогиниться в системе под этим пользователем, или выполнить следующую команду:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>su - ${USER}</p>

<p>
    Следующая проверка должна вывести <span class="notranslate">'www-data'</span> в списке групп:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>id -nG</p>

<p>
    Затем расширить права на папку <span class="notranslate">/storage/</span> для группы (из корневой директории проекта).
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>sudo chmod -R 750 ./ ; sudo chmod -R 770 ./storage</p><br>

<?= Paragraph::h2('Автонастройка через консольную команду') ?>

<p>
   После настройки прав, если они понадобились, можно использовать собственные консольные команды фреймворка.
   В случае, при котором проект был установлен не через <span class="notranslate">Composer</span>, который должен был выполнить этот скрипт самостоятельно (а затем удалить), запустите команду вручную:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console project-setup-task</p>

<p>
    Это действие выполнит несколько второстепенных оптимизаций проекта, не влияющих прямо на его работоспособность.
</p>

<?= Paragraph::h2('Настройки проекта') ?>

<p>
    Папка <span class="notranslate">/config/</span> часто используется также для хранения настроек самого проекта.
    Если вы хотите получать другие настройки средствами фреймворка, то добавьте их в файл <span class="notranslate">/config/main.php</span> аналогично его настройкам.
    Но если таких настроек много, то стоит использовать параметр <span class="notranslate">'custom.setting.files'</span> из файла <span class="notranslate">/config/system.php</span> и перечислить файлы с отдельными настройками.
</p>

<?= Paragraph::h2('Динамические настройки') ?>

<p>
    Параметр <span class="notranslate">'start.unixtime'</span> по названию настройки <span class="notranslate">'common'</span> содержит <span class="notranslate">UNIX</span> время начала обработки запроса фреймворком в миллисекундах.
    Этот параметр постоянен на протяжении всего запроса.
</p>

<?= Paragraph::h1('Оптимизация') ?>

<?= Paragraph::h2('Предзагрузка классов в OPcache') ?>

<p>
    Для большего быстродействия поместите следующее указание на файл <span class="notranslate">preload.php</span> в текущий <span class="notranslate">php.ini</span> файл, чтобы скомпилировать классы фреймворка заранее и поместить их в кеш опкодов.
</p>
<p class="hl-text-block notranslate">
    opcache.preload=/path/to/project/vendor/phphleb/framework/preload.php
</p>
<p>
    В этой строчке часть <span class="notranslate">'/path/to/project/'</span> нужно заменить на путь к корневой директории проекта.<br>
    Подробнее про <a href="https://www.php.net/manual/ru/opcache.preloading.php" target="_blank" rel="nofollow">предзагрузку</a> в документации PHP.
</p>

<p class="hl-info-block">
    Предзагрузка не поддерживается в Windows.
</p>

<?= Paragraph::h2('Сокращение размера фреймворка') ?>

<p>
    При развертывании проекта для <span class="notranslate">production</span> (целевого публичного сервера), вы можете сократить размер файлов фреймворка на 30%, удалив комментарии к коду предназначенной для этого консольной командой.
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console clearing-comment-feature</p>

<?= Link::previousPage('docs.2.0.installation.page', 'Установка проекта'); ?>

<?= Link::nextPage('docs.2.0.configuration.page', 'Настройка конфигурации'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer');

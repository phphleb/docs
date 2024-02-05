<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Установка проекта') ?>

<p>
    Фреймворк <b><span class="notranslate">HLEB2</span></b> разработан таким образом, чтобы его установка и требования к установке были минимально простыми.<br>
    Чтобы установить фреймворк, достаточно <span class="notranslate">PHP</span> версии 8.2 или выше с базовым набором расширений и 2 мегабайта свободного места на устройстве.<br><br>
    Если вы хотите использовать версию <span class="notranslate">PHP</span> меньше 8.2, то попробуйте <a href="https://phphleb.ru/ru/v1/" target="_blank">первую версию</a> фреймворка.<br>
</p>
<p>
    Код фреймворка расположен в репозитории <span class="notranslate">GitHub</span> по адресу <a href="https://github.com/phphleb/hleb" target="_blank">https://github.com/phphleb/hleb</a>.
    Первый этап установки представляет собой копирование этого кода на сервер или в локальную папку, где он будет использоваться.<br>
</p>

<?= Paragraph::h2('Копирование из репозитория') ?>

<p>
    Зайдите в репозиторий проекта на <span class="notranslate">GitHub</span> (ссылка выше).<br>
    Выберите кнопку <b><span class="notranslate">Code</span></b> и далее <a href="https://github.com/phphleb/hleb/archive/refs/heads/master.zip" download><span class="notranslate">Download ZIP</span></a> (прямая ссылка на файл).
    Распакуйте скачанный архив в нужную папку на сервере или локально.<br>
</p>
<p class="hl-danger-block">
    Используйте только проверенные ссылки на официальный репозиторий фреймворка.
</p>

<?= Paragraph::h2('Клонирование при помощи Git') ?>

<p>
    Для того чтобы клонировать репозиторий фреймворка в папку <span class="notranslate">new_project</span> выполните следующую команду <span class="notranslate">git</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>git clone https://github.com/phphleb/hleb new_project</p>

<p>
    Эта команда создаст папку <span class="notranslate">new_project</span>, инициализирует в ней подкаталог <span class="notranslate">.git</span>, затем скачает все данные для этого репозитория и извлечёт рабочую копию последней версии.
    Если вы перейдёте в созданную командой директорию <span class="notranslate">new_project</span>, то увидите в ней файлы проекта, готовые для использования.
</p>

<?= Paragraph::h2('Локальная разработка с Docker') ?>

<p>
    Чтобы попробовать возможности фреймворка и развернуть локальную разработку из <span class="notranslate">Docker</span>-образа используйте
    репозиторий <a href="https://github.com/phphleb/toaster" target="_blank"><span class="notranslate">phphleb/toaster</span></a>.
</p>

<?= Paragraph::h2('Установка при помощи Composer') ?>

<p>
    Альтернативным вариантом будет использование <a href="https://getcomposer.org/" target="_blank"><span class="notranslate">Composer</span></a>.
    Этот метод более предпочтителен, так как в дальнейшем <span class="notranslate">Composer</span> позволит устанавливать различные пакеты и расширения.
    Установить актуальную версию проекта при помощи консольной команды (предполагается, что <span class="notranslate">Composer</span> установлен глобально):
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer create-project phphleb/hleb new_project</p>

<p>
    Эта команда установит фреймворк в папку new_project.<br>
</p>

<?= Paragraph::h2('Расширение для работы с базами данных') ?>

<p>
    Если ваше приложение будет работать с базой данных, необходимо установить <a href="https://www.php.net/manual/ru/pdo.installation.php">расширение <span class="notranslate">PHP PDO</span></a> и соответствующий драйвер (например, <span class="notranslate">pdo_mysql</span> для <span class="notranslate">MySQL</span>).
</p>

<?= Paragraph::h2('Публичная директория проекта') ?>

<p>
    Для дальнейших действий нужно настроить публичную папку фреймворка, если первоначальное название <b><span class="notranslate">public</span></b> по каким-либо причинам не подходит.<br>
    Например, на некоторых хостингах используется папка с названием <b><span class="notranslate">public_html</span></b>, чтобы изменить публичную папку проекта, достаточно изменить название папки <b><span class="notranslate">public</span></b>.<br>
    Также, в этом случае, дополнительно нужно изменить предопределённое название в файле <b><span class="notranslate">console</span></b>, который находится в корневой папке проекта.<br>
</p>

<?= Link::previousPage('docs.2.0.introduction.page', 'Введение'); ?>

<?= Link::nextPage('docs.2.0.tuning.page', 'Настройка фреймворка'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer');

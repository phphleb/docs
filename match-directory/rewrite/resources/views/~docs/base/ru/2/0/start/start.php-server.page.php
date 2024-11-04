<?php

use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Встроенный в PHP веб-сервер') ?>

<p>
    После установки фреймворка <span class="notranslate">HLEB2</span> правильность его функционирования и настроек можно проверить при помощи встроенного в <span class="notranslate">PHP</span> веб-сервера.<br>
    <a href="https://www.php.net/manual/ru/features.commandline.webserver.php" target="_blank">Ссылка</a> на официальную документацию.<br>
</p>


<p class="hl-danger-block">
    Для Linux права на создаваемые ресурсы фреймворка (кеш) будут выставлены пользователем терминала, поэтому, если вы ранее не настроили права, страницы могут быть недоступны после этого для другого веб-сервера.
    Поможет только полная очистка кеша фреймворка и маршрутов <a href="<?= Link::url('docs.2.0.console.command.page'); ?>">консольными командами</a>.
</p>

<p>
    Проверку фреймворка можно выполнить следующей командой (из корневой директории установленного проекта):
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php -S localhost:8000 -t public</p>

<p class="hl-info-block">
    Порт 8000 может уже использоваться для <span class="notranslate">localhost</span>, в таком случае замените его на другой свободный, например 8001 или 8002.
</p>

<p>
    Так как папка <span class="notranslate">public</span> (если вы не изменили название ранее) является публичной директорией проекта, то после выполнения этой команды приветственная страница фреймворка будет доступна по адресу <a href="http://localhost:8000" target="_blank">http://localhost:8000</a>
</p>

<p class="hl-danger-block">
    Встроенный веб-сервер <span class="notranslate">PHP</span> не поддерживает функции полноценного сервера и не должен использоваться в общедоступных сетях.
</p>


<?= Link::previousPage('docs.2.0.directories.page', 'Структура проекта'); ?>

<?= Link::nextPage('docs.2.0.start.nginx.page', 'Запуск с помощью Nginx'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

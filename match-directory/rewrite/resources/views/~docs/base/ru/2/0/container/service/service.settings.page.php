<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Settings') ?>

<p>
    При помощи сервиса <span class="notranslate"><b>Settings</b></span> можно получить стандартные или пользовательские настройки фреймворка из файлов папки <span class="notranslate">/config/</span>.
</p>
<p>
    Способы использования <span class="notranslate">Settings</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения заданного часового пояса из файла <span class="notranslate">/config/common.php</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.container.php', false);  ?>

<p>
    Пример обращения к <span class="notranslate">Settings</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Settings</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Setting</span>.
</p>
<p>
    Настройки разделены на четыре группы: <span class="notranslate">'common'</span>, <span class="notranslate">'main'</span>, <span class="notranslate">'database'</span> и <span class="notranslate">'system'</span>.
    Они соответствуют файлам настроек из папки <span class="notranslate">/config/</span>.
    Если используется другой файл, например <span class="notranslate">'main-local.php'</span> вместо <span class="notranslate">'main.php'</span>, то настройку в любом случае нужно получать по названию <span class="notranslate">'main'</span>.
</p>
<p>
    Методы сервиса - <span class="notranslate"><b>common()</b></span>, <span class="notranslate"><b>main()</b></span>, <span class="notranslate"><b>database()</b></span> и <span class="notranslate"><b>system()</b></span> позволяют получить параметр из соответствующих настроек.
    Например:
</p>

<?= Code::fromFile('@views/docs/code/container/service/settings/get.settings.example.php', false);  ?>


<?= Link::previousPage('docs.2.0.service.router.page', 'Router'); ?>

<?= Link::nextPage('docs.2.0.service.csrf.page', 'Защита от CSRF'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Веб-консоль') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> специальная Веб-консоль предоставляет доступ через браузер пользователя к выполнению консольных команд.
    Поддерживаются только команды фреймворка, то есть начинающиеся с <span class="notranslate">'php console'</span>.
</p>
<p>
    По умолчанию Веб-консоль отключена по соображениям безопасности.
</p>
<p>
    Чтобы указать страницу приложения, на которой нужно вывести Веб-консоль, создайте для этого маршрут с адресом.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.route.php', false);  ?>

<p>
    Также нужно создать шаблон с выводом <span class="notranslate">HTML</span>-формы для Веб-консоли:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/webconsole/web.console.template.php');  ?>

<p>
    Теперь Веб-консоль доступна по относительному адресу <span class="notranslate">'/web-console'</span> сайта.
    Также нужно скопировать ключ из файла <span class="notranslate"><span class="hl-nowrap">'/storage/keys/web-console.key'</span></span> и использовать для доступа к форме выполнения команд.
</p>

<p class="hl-text-block">
   <img src="/docs/images/webconsole.png">
</p>

<p class="hl-info-block">
    Команды, которые используют пользовательский ввод данных, не будут работать через Веб-консоль.
</p>


<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


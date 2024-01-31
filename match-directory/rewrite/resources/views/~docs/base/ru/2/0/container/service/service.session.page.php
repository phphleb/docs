<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Сессии') ?>

<p>
    Механизм пользовательских сессий представлен во фреймворке <span class="notranslate">HLEB2</span> сервисом <span class="notranslate"><b>Session</b></span> — простой обёрткой над PHP-функциями для работы с сессиями.
</p>
<p>
    Способы использования <span class="notranslate">Session</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения значения из сессии:
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.container.php', false);  ?>

<p>
    Пример обращения к сессии в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Session</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Session</span>.
</p>

<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">Hleb\Static\Session</span>.
</p>

<p class="hl-info-block">
    В стандартной реализации сервиса Session его методы соответствующим образом используют глобальную переменную $_SESSION.
</p>

<?= Paragraph::h2('get()') ?>

<p>
    Метод get() возвращает данные сессии по названию параметра.
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.get.php', false);  ?>

<?= Paragraph::h2('set()') ?>

<p>
    При помощи метода set() можно назначить данные сессии по названию.
</p>

<?= Code::fromFile('@views/docs/code/container/service/session/get.session.set.php', false);  ?>

<?= Paragraph::h2('delete()') ?>

<p>
    Метод delete() удаляет данные сессии по названию.
</p>

<?= Paragraph::h2('clear()') ?>

<p>
    Метод clear() очищает все данные сессии.
</p>

<?= Paragraph::h2('all()') ?>

<p>
    Метод all() возвращает массив со всеми данными сессии.
</p>

<?= Paragraph::h2('getSessionId()') ?>

<p>
    Метод getSessionId() возвращает идентификатор текущей сессии.<br>
    Идентификатор сессии изменяется в настройках конфигурации 'session.name' файла /config/system.php и изначально установлен как 'PHPSESSID'.
</p>

<?= Paragraph::h2('Асинхронный режим') ?>

<p>
    При асинхронном использовании фреймворка методы сервиса Session функционируют аналогичным образом, но при этом используется другой механизм их установки и чтения.
</p>


<?= Link::previousPage('docs.2.0.service.db.page', 'DB'); ?>

<?= Link::nextPage('docs.2.0.service.cookies.page', 'Cookies'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Сервис DB — использование баз данных') ?>

<p>
    Сервис <span class="notranslate"><b>DB</b></span> — это начальная возможность отправки запросов к базам данных.
    При помощи обёртки над <span class="notranslate">PDO</span> и конфигурации фреймворка <span class="notranslate">HLEB2</span> для баз данных, сервис предоставляет простые методы обращения к различным БД (поддерживаемых <span class="notranslate">PDO</span>).
</p>

<p class="hl-info-block">
    Для работы этого сервиса необходимо включенное расширение <span class="notranslate">PHP PDO</span> и необходимые <a href="https://www.php.net/manual/ru/pdo.installation.php" rel="nofollow" target="_blank">драйверы</a> БД.
</p>

<p>
    Для использования иного способа соединения, например, <span class="notranslate">ORM(Object-Relational Mapping)</span>, добавьте создание объекта выбранной <span class="notranslate">ORM</span> как сервис контейнера с настройками из конфигурации фреймворка.
</p>
<P>
    Согласно заявленной структуре проекта, поставляемой с фреймворком <span class="notranslate">HLEB2</span>, сервис <span class="notranslate">DB</span> можно использовать только в классах Моделей.<br>
    Класс Модели (шаблон которого можно создать консольной командой) представляет собой базовый каркас для использования в составе <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб).
    Его можно преобразовать или заменить по своему усмотрению для выбранной библиотеки <span class="notranslate">AR(Active Record)</span> или <span class="notranslate">ORM</span> (а затем изменить шаблон для консольной команды).
</P>
<p>
    Примеры использования в Модели для обращения к базе данных:
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.container.php');  ?>

<p>
    Для выполнения запросов к базе данных используются следующие методы сервиса <span class="notranslate">DB</span>.
</p>

<?= Paragraph::h2('dbQuery()') ?>

<p>
    Метод <span class="notranslate"><b>dbQuery()</b></span> использовался в приведённых выше примерах для создания прямого <span class="notranslate">SQL</span>-запроса в базу данных.
    В нём запрос и параметры запроса не разделены, поэтому необходимо обрабатывать (с правильным экранированием) каждый сомнительный параметр, а особенно пришедший из <span class="notranslate">Request</span>, с помощью специального метода <span class="notranslate"><b>quote()</b></span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.query.php', false);  ?>

<p class="hl-danger-block">
    Экранирование параметров запроса позволяет избавить запрос от <span class="notranslate">SQL</span>-инъекций.
    Такого рода атаки основаны на внедрении в запрос произвольного <span class="notranslate">SQL</span>-выражения как части внешних данных.
</p>

<p>
    Другой метод сервиса <span class="notranslate">DB</span> более универсален и позволяет упростить обработку параметров.
</p>

<?= Paragraph::h2('run()') ?>

<p>
    При успешном выполнении метод <span class="notranslate"><b>run()</b></span> возвращает инициализированный объект <span class="notranslate">PDOStatement</span>.
    Все методы этого объекта, такие как <span class="notranslate">fetch()</span> и <span class="notranslate">fetchColumn()</span>, стандартные для <span class="notranslate">PDO</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/db/get.db.run.php', false);  ?>

<p>
    Возможности <span class="notranslate">PDOStatement</span> описаны в <a href="https://www.php.net/manual/ru/class.pdostatement.php" target="_blank" rel="nofollow">документации <span class="notranslate">PDO</span></a>.
</p>


<?= Paragraph::h2('Асинхронные запросы') ?>

<p>
    Для асинхронных запросов использование этого сервиса аналогично и зависит от настроек используемого веб-сервера.
</p>
<p>
    Кроме того, некоторые <span class="notranslate">ORM</span> адаптированы к такому режиму работы.
</p>
<p>
    Одной из таких библиотек, согласно её документации, является <span class="notranslate"><span class="hl-nowrap"><a href="https://github.com/cycle/orm" target="_blank" rel="nofollow">Cycle ORM</a></span></span>.
</p>


<?= Link::previousPage('docs.2.0.service.path.page', 'Path'); ?>

<?= Link::nextPage('docs.2.0.service.session.page', 'Сессии'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

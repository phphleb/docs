<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Защита от CSRF') ?>

<p>
    Сервис <span class="notranslate">Csrf</span> фреймворка <span class="notranslate">HLEB2</span> предназначен для защиты от атак <span class="notranslate">CSRF(Сross-Site Request Forgery)</span>, основанных на межсайтовых подделках запроса пользователей.
</p>
<p>
    Принцип защиты представлен во фреймворке передачей токена через <span class="notranslate">frontend</span> приложения и одновременно с сохранением значения токена в сессию пользователя.
    Значения эти будут сверены фреймворком, чтобы убедиться, что пользователь пришел со страницы, где этот токен был установлен, в противном случае будет выведено сообщение об ошибке.
</p>

<p class="hl-info-block">
    Чтобы фреймворк проверял переданный токен необходимо к целевому маршруту добавить метод <span class="notranslate">protect()</span>.
</p>

<p>
    Способы использования сервиса <span class="notranslate">Csrf</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения хеш-кода для проверки запроса:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.container.php', false);  ?>

<p>
    Пример обращения к сервису <span class="notranslate">Csrf</span> в коде шаблонов:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.template.php');  ?>

<p>
    Для шаблонизатора <span class="notranslate">TWIG</span>:
</p>

<?= Code::fromFile('@views/docs/code/container/service/csrf/get.csrf.twig.php', false);  ?>

<p>
    Также объект <span class="notranslate">Csrf</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Csrf</span>.
</p>

<?= Paragraph::h2('token()') ?>

<p>
    Метод <span class="notranslate">token()</span> возвращает уникальный токен сеанса пользователя.
</p>

<?= Paragraph::h2('field()') ?>

<p>
    Метод <span class="notranslate">field()</span> возвращает <span class="notranslate">HTML</span>-контент для вставки в форму для передачи токена с другими данными.
</p>

<?= Paragraph::h2('validate()') ?>

<p>
    При помощи этого метода можно проверить вручную токен (если защита не включена в маршруте).
</p>



<?= Link::previousPage('docs.2.0.service.settings.page', 'Получение настроек'); ?>

<?= Link::nextPage('docs.2.0.service.converter.page', 'Преобразование в PSR'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

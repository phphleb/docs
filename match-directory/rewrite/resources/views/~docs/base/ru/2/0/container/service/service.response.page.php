<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Объект Response') ?>

<p>
    Сервис <span class="notranslate"><b>Response</b></span> фреймворка содержит глобальные данные для формирования ответа клиенту.
    При асинхронном использовании фреймворка эти данные откатываются к значениям по умолчанию после окончания каждого запроса.<br>
</p>
<p>
    Способы присвоения данных для <span class="notranslate">Response</span> в контроллерах:
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.container.php', false);  ?>

<p>
    Способ аналогичен для всех классов, унаследованных от <span class="notranslate"><span class="notranslate">Hleb\Base\Container</span></span>, но формирование ответа напрямую в <span class="notranslate">Response</span> вне контроллера будет плохой практикой.
</p>
<p>
    Пример использования <span class="notranslate">Response</span> в коде приложения (код также будет трудно поддерживать в этом случае):
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.static.php', false);  ?>

<p>
    Также доступ к сервису <span class="notranslate">Response</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Response</span>.
</p>
<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">DI</span>.
</p>

<p class="hl-info-block">
    В сочетании с выводом <span class="notranslate">print</span> и <span class="notranslate">echo</span>, данные из Response будут выведены позже, правильной стратегией будет использование только одного способа для вывода результатов.
</p>
<p>
    При окончании запроса фреймворк в любом случае обратится к указанному объекту <span class="notranslate">Response</span> для вывода ответа, даже если этот объект не был возвращён из контроллера.
    Это может быть удобно при разовом или последовательном добавлении данных в <span class="notranslate">Response</span> в рамках одного метода контроллера.
    При необходимости манипулирования объектами ответа, содержащими различные данные, можно использовать любой другой <span class="notranslate">Response</span> по <span class="notranslate">PSR-7</span>.
    Альтернативный <span class="notranslate">Response</span> необходимо будет вернуть в вызванном методе контроллера.
</p>

<?= Paragraph::h2('Тело ответа') ?>

<p>
    Тело ответа - это добавленные в объект <span class="notranslate">Response</span> данные, которые можно преобразовать в строку.
    Обычно это текст сообщения, отображаемый пользователю или данные в формате <span class="notranslate">JSON</span> или <span class="notranslate">XML</span>, возможно генерируемый на лету <span class="notranslate">HTML</span> и т.д.
</p>
<p>
    Для добавления данных предназначены следующие методы сервиса <span class="notranslate">Response</span>:<br>
    <span class="notranslate"><b>set()</b></span> или <span class="notranslate"><b>setBody()</b></span> — присвоение данных, полностью перезаписывающих предыдущее тело ответа при его наличии.<br>
    <span class="notranslate"><b>add()</b></span> или <span class="notranslate"><b>addToBody()</b></span> — добавление в конец к предыдущим добавленным данным.

</p>
<p>
    Для получения данных из сервиса:<br>
    <span class="notranslate"><b>get()</b></span> или <span class="notranslate"><b>getBody()</b></span> — получение текущего состояния тела запроса в объекте <span class="notranslate">Response</span>.
</p>

<p class="hl-danger-block">
    Перед отправкой данных клиенту необходимо убедиться, что они проверены на <span class="hl-nowrap"><span class="notranslate">XSS</span>-уязвимости</span>.
    Если данные не обрабатывались таким образом ранее, то их можно пропустить через <span class="hl-nowrap"><span class="notranslate">PHP</span>-функцию</span> <span class="notranslate"><a href="https://www.php.net/manual/ru/function.htmlspecialchars.php" target="_blank" rel="nofollow">htmlspecialchars()</a></span>.
</p>

<?= Paragraph::h2('HTTP-статус ответа') ?>

<p>
    По умолчанию статус установлен как 200.<br>
    Если ответ должен иметь иной статус, то можно воспользоваться методом <span class="notranslate"><b>setStatus()</b></span>, первым аргументом которого сам статус, а вторым короткое сообщение статуса, если оно отличается от стандартного.
    В статусе <span class="notranslate">'404 Not Found'</span> таким сообщением будет <span class="notranslate">'Not Found'</span>.
</p>
<p>
    Обычно используются стандартные сообщения статусов, так что установить статус по номеру можно сразу в методе <b>set()</b> вторым аргументом.
</p>
<p>
    Получить текущий <span class="notranslate">HTTP</span>-статус из сервиса <span class="notranslate">Response</span> позволяет метод <span class="notranslate"><b>getStatus()</b></span>.
</p>

<?= Paragraph::h2('Заголовки ответа') ?>

<p>
    Кроме заголовков ответа, заданных глобально на стороне сервера, вы можете задать собственные, возвращаемые с конкретным ответом из фреймворка.
    Для заголовков второго типа и предназначены следующие методы сервиса <span class="notranslate">Response</span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/response/get.response.headers.php');  ?>

<p>
    Метод <span class="notranslate"><b>setHeader()</b></span> устанавливает заголовок по названию, переопределяя предыдущее значение, если оно было установлено.
    В редком случае, когда необходимо создать несколько одинаковых заголовков, аргумент <span class="notranslate">replace</span> метода позволяет добавлять заголовок к текущему значению.
</p>
<p>
    Метод <span class="notranslate"><b>hasHeader()</b></span> проверяет наличие заголовка по названию.
</p>
<p>
    Для получения массива данных заголовка по названию предназначен метод <span class="notranslate"><b>getHeader()</b></span>.
</p>
<p>
    Данные всех установленных в <span class="notranslate">Response</span> заголовков возвращает метод <span class="notranslate"><b>getHeaders()</b></span> в виде массива.
</p>

<p class="hl-danger-block">
    Операции над заголовками с помощью стандартных <span class="hl-nowrap"><span class="notranslate">PHP</span>-функций</span>, хоть и будут работать вместе, но возможны конфликты с совместным использованием через объект <span class="notranslate">Response.</span>
    Лучше использовать только один подход во всём приложении.
</p>

<?= Paragraph::h2('Версия HTTP-протокола') ?>

<p>
    Версия <span class="notranslate">HTTP</span>-протокола по умолчанию равна <span class="notranslate">'1.1'</span>, если не определено из текущего запроса.
    Так как в большинстве случаев вернуться должно значение как в самом запросе, то изменение используется редко.
</p>
<p>
    Тем не менее, методы <span class="notranslate"><b>getVersion()</b></span> и <span class="notranslate"><b>setVersion()</b></span> предназначены для соответствующего получения и присвоения значения.
</p>


<?= Link::previousPage('docs.2.0.service.request.page', 'Request'); ?>

<?= Link::nextPage('docs.2.0.service.cache.page', 'Кеширование'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

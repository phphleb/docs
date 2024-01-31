<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Объект Request') ?>

<p>
    Системный объект <span class="notranslate">Request</span> создается в самом начале обработки HTTP-запроса фреймворком.
    Он не только создается, но и заполняется информацией (заголовками, параметрами и т.д.)<br>
    С его помощью производится начальное функционирование фреймворка <span class="notranslate">HLEB2</span>, обрабатывающего запрос.
    Системный <span class="notranslate">Request</span> предназначен только для этого.
</p>
<p>
    Сервис <span class="notranslate"><b>Request</b></span>, который по умолчанию может быть получен из контейнера и с помощью которого можно использовать данные текущего запроса, является оберткой над системным объектом.
</p>
<p>
    Способы получения данных из <span class="notranslate">Request</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере текущего <span class="notranslate">HTTP</span>-метода:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.container.php', false);  ?>

<p>
    Пример получения <span class="notranslate">HTTP</span>-метода из <span class="notranslate">Request</span> в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.request.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Request</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Request</span>.
</p>

<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">Hleb\Static\Request</span>.
</p>

<?= Paragraph::h2('HTTP-метод запроса') ?>
<p>
    Запрос к приложению выполняется с определённым HTTP-методом, во фреймворке поддерживаются следующие: <span class="notranslate">'GET', 'POST', 'DELETE', 'PUT', 'PATCH', 'OPTIONS'</span> (и <span class="notranslate">'HEAD'</span>).<br>
    Определить текущий помогают методы <span class="notranslate"><b>getMethod()</b></span> и <span class="notranslate"><b>isMethod()</b></span>.
    Первый возвращает значение, например <span class="notranslate">'GET'</span>, а в методе <span class="notranslate">isMethod(...)</span> нужно указать искомое значение для сравнения.
</p>

<?= Paragraph::h2('Параметры из $_GET, $_POST и тела запроса') ?>

<p>
    Данные, переданные вместе с запросом, могут в дальнейшем использоваться по-разному.
    Они могут быть сохранены в исходном виде, тогда предварительная обработка не требуется.
    Но если необходимо отобразить их сразу в ответе, то нужно обезопасить данные от внедрения исполняемых скриптов.
    Методы <span class="notranslate"><b>get()</b></span> и <span class="notranslate"><b>post()</b></span> возвращают объект с соответствующим параметром, при помощи этого объекта можно получить как необработанные данные, так и преобразованные в нужном формате.
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.http.params.php', false);  ?>

<p class="hl-info-block">
    Наиболее частой ошибкой при использовании объекта, возвращаемого этими методами, может быть использование этого объекта как значения, вместо получения значения из объекта.
</p>

<p>
    При необходимости получить результат как массив, например для запроса с <span class="notranslate">'?param[key]=value'</span>, объект со значением имеет метод asArray(), в котором значения массива будут обработаны от XSS-уязвимостей, также метод value() вернёт массив, но в нём будут исходные необработанные данные.
</p>
<p>
    Метод <span class="notranslate"><b>input()</b></span> служит для определения и получения массива данных из тела запроса.
    Это могут быть <span class="notranslate">JSON</span>-данные или кодированные <span class="notranslate">url-encoded</span> параметры, преобразованные в массив.<br>
    Таким образом, можно получить в виде массива <span class="notranslate">POST-, PUT-, PATCH-</span> или <span class="notranslate">DELETE</span>-параметры или переданные параметры в теле запроса в формате <span class="notranslate">JSON</span>.
</p>
<p>
    Данные, полученные методом <span class="notranslate">input()</span>, представляют собой обработанные значения с преобразованными в спецсимволы <span class="notranslate">HTML</span>-тегами.
</p>
<p>
    Если необходимо получить данные тела запроса в исходном виде как массив, то для этого предназначен метод <span class="notranslate"><b>getParsedBody()</b></span>.
    Он аналогичен <span class="notranslate">input()</span>, только возвращает данные в необработанном виде.
</p>
<p>
    Если предыдущие форматы не подошли, то тело запроса в исходном виде, как строковое значение, возвращает метод <b>getRawBody()</b>.
    Таким образом, можно преобразовать данные в нужный формат самостоятельно.
</p>


<?= Paragraph::h2('Параметры динамического маршрута') ?>

<p>
   К таким параметрам запроса относятся динамические части маршрута, в запросе им соответствуют определенные значения.
    Получить эти значения по названию динамического параметра позволяет метод <span class="notranslate"><b>param()</b></span>.
   Результатом будет объект, через методы которого можно получить значение в нужном формате.
</p>
<p>
    Например, если c запросом совпал маршрут такого вида:
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.example.uri.php', false);  ?>

<p>
    Для адреса <span class="notranslate">/10/main/</span> параметры <span class="notranslate">'version'</span> и <span class="notranslate">'page'</span> определяются следующим образом:
</p>

<?= Code::fromFile('@views/docs/code/container/service/request/get.param.params.php', false);  ?>

<p class="hl-info-block">
    Наиболее частой ошибкой при использовании объекта, возвращаемого этим методом, может быть использование этого объекта как значения, вместо получения значения из объекта.
</p>

<p>
    Метод <span class="notranslate"><b>data()</b></span> возвращает массив объектов для всех динамических параметров.
    Из этих объектов аналогично могут быть получены значения параметров в исходном и обработанном виде.
</p>
<p>
    Получить исходные динамические параметры маршрута как массив значений без обработки позволяет метод <span class="notranslate"><b>rawData()</b></span>.
</p>

<p class="hl-danger-block">
    Необходимо учесть, что фреймворк при обработке входящих данных (когда это выбрано) защищает только от XSS-атак, в других случаях, например, когда требуется экранирование кавычек при сохранении в базу данных, нужно применить дополнительные меры защиты.
</p>

<?= Paragraph::h2('Данные URI запроса') ?>

<p>
    Основой для объекта, возвращаемого методом <span class="notranslate"><b>getUri()</b></span>, взят <span class="notranslate">UriInterface</span> из <span class="notranslate">PSR-7</span>, благодаря этому можно получить следующие данные запроса:<br>
    <span class="notranslate">getUri()-><b>getHost()</b></span> - доменное имя текущего запроса, например - <span class="notranslate">'mob.example.com'</span>. Может быть вместе с портом, в зависимости от наличия его в запросе.<br>
    <span class="notranslate">getUri()-><b>getPath()</b></span> - путь из адреса после хоста, например <span class="notranslate">'/ru/example/page'</span> или <span class="notranslate">'/ru/example/page/'</span>.<br>
    <span class="notranslate">getUri()-><b>getQuery()</b></span> - параметры запроса, например <span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>.<br>
    <span class="notranslate">getUri()-><b>getPort()</b></span> - порт запроса.<br>
    <span class="notranslate">getUri()-><b>getScheme()</b></span> - <span class="notranslate">HTTP</span>-схема запроса, <span class="notranslate">'http'</span> или <span class="notranslate">'https'</span>.<br>
    <span class="notranslate">getUri()-><b>getIp()</b></span> - <span class="notranslate">IP</span>-адрес запроса.
</p>

<?= Paragraph::h2('HTTP-схема запроса') ?>

<p>
    Для уточнения типа HTTP-схемы запроса можно воспользоваться методом <span class="notranslate"><b>isHttpSecure()</b></span>.
    Он вернет результат проверки схемы на <span class="notranslate">'https'.</span>
</p>
<p>
    Метод <span class="notranslate"><b>getHttpScheme()</b></span> возвращает текущую <span class="notranslate">HTTP</span>-схему запроса как <span class="notranslate">'http://'</span> или <span class="notranslate">'https://'</span>.
</p>

<?= Paragraph::h2('Получение хоста из адреса') ?>

<p>
    Метод <span class="notranslate"><b>getHost()</b></span> предназначен для получения доменного имени текущего запроса.
    Аналогичен <span class="notranslate">getUri()->getHost()</span>.
</p>
<p>
    Вместе с <span class="notranslate">HTTP</span>-схемой получить хост адреса можно при использовании метода <span class="notranslate"><b>getSchemeAndHost()</b></span>.
</p>

<?= Paragraph::h2('URL запроса') ?>

<p>
    Метод <span class="notranslate"><b>getAddress()</b></span> возвращает полный <span class="notranslate">URL</span> запроса без <span class="notranslate">GET</span>-параметров.
</p>

<?= Paragraph::h2('Загрузка файлов') ?>

<p>
    При загрузке файла или файлов пользователем, получить их данные позволяет метод <span class="notranslate"><b>getFiles()</b></span>.
    Возвращает массив массивов с данными или массив объектов, в зависимости от того, был ли фреймворк инициирован c внешним <span class="notranslate">Request</span>.
</p>

<?= Paragraph::h2('Заголовки запроса') ?>

<p>
    Массив всех заголовков входящего запроса возвращает метод <span class="notranslate"><b>getHeaders()</b></span>.
    Это заголовки запроса, отсортированные по ключу(названию).
</p>
<p>
    Проверить наличие заголовка по названию можно через метод <span class="notranslate"><b>hasHeader()</b></span>.
</p>
<p>
    Метод <span class="notranslate"><b>getHeader()</b></span> по названию возвращает массив соответствующих заголовков (значений).
</p>
<p>
    Метод <span class="notranslate"><b>getHeaderLine()</b></span> также возвращает значения заголовка по названию, но в виде строки как перечисление.
</p>

<?= Paragraph::h2('Данные $_SERVER') ?>

<p>
    Для получения данных, которые установлены веб-сервером в переменной <span class="notranslate">$_SERVER</span>, можно воспользоваться методом <span class="notranslate"><b>server()</b></span>.
    Он возвращает значение по имени параметра.
</p>

<?= Paragraph::h2('Версия протокола запроса') ?>

<p>
    Метод <b>getProtocolVersion()</b> возвращает версию протокола запроса, например '1.1'.
</p>


<?= Link::previousPage('docs.2.0.container.di.page', 'Внедрение зависимостей'); ?>

<?= Link::nextPage('docs.2.0.service.response.page', 'Response'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

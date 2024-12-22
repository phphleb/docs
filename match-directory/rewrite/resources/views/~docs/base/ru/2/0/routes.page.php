<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Маршрутизация') ?>

<p>
    Маршрутизация — это первостепенная задача фреймворка по обработке входящего запроса.
    Здесь определяется маршрут, отвечающий за адрес запроса и назначаются дальнейшие действия.
</p>
<p>
    Иногда маршрутизацию во фреймворках называют "роутингом", это одно и то же.
</p>
<p>
    Маршруты проекта составляются разработчиком в файле <span class="notranslate">/routes/map.php</span>, в этот файл могут быть вставлены (инклюдированы) другие файлы с маршрутами из папки <span class="notranslate">"routes"</span>, которые вместе и составят карту маршрутизации.
    Особенностью данных маршрутов стоит считать, что при их загрузке идёт проверка фреймворком на общую правильность и последовательность использованных методов, в случае исключения генерируется ошибка с указанием причины исключения.
    Так как в карте маршрутов проверке подвергаются все существующие там маршруты, это гарантирует их общую корректность.
</p>

<p class="hl-info-block">
    После первого запроса или при использовании специальной консольной команды происходит обновление и кеширование маршрутов.
    Поэтому файлы с маршрутами не должны включать внешний код, только методы класса <span class="notranslate">Route</span>.
</p>

<p>
    Если после проведенных изменений в карте маршрутизации фреймворк не сгенерировал характерных сообщений, то в дальнейшем эти сообщения не будут появляться, по крайней мере до следующих изменений в подключенных файлах маршрутов.
</p>
<p>
    Маршруты определяются методами класса <b>Route</b>, часто используемым из которых является <b>get()</b>.
    Методы этого класса используются только в карте маршрутизации.
</p>

<?= Paragraph::h2('Метод Route::get()') ?>

<p>
    При помощи этого метода можно указать обработку <span class="notranslate">HTTP</span>-метода <span class="notranslate">GET</span> по указанным условиям.
    Как показано на примере:
</p>

<?= Code::fromFile('@views/docs/code/routes/get.method.php', false);  ?>

<p>
    Маршрут выведет при обращении к корневому <span class="notranslate">URL</span> сайта строчку <span class="notranslate">"Hello, world!"</span>.
    Чтобы вывести <span class="notranslate">HTML</span>-код (может содержать и <span class="notranslate">PHP</span>-код) из шаблона, метод применяется совместно с функцией <span class="notranslate"><b>view()</b></span>.
</p>


<?= Paragraph::h2('Динамические адреса') ?>

<p>
    Фреймворк HLEB2 обрабатывает произвольные адреса по заданной разработчиком приложения схеме, например:
</p>

<?= Code::fromFile('@views/docs/code/routes/dynamic.uri.php', false);  ?>

<p>
    В указанном случае все адреса <span class="notranslate">URL</span>, отвечающие условной схеме <span class="notranslate">"site.com/resource/.../.../"</span> будут отдавать одинаковую текстовую строчку, а значения <span class="notranslate">"version"</span> и <span class="notranslate">"page"</span> становятся доступны из объекта <span class="notranslate">Hleb\Static\Request: Request::param("version")->asString()</span> и <span class="notranslate">Request::param("page")->asPositiveInt()</span>.<br>
    Также эти значения можно получить из контейнера и через одноимённые аргументы метода контроллера.
</p>
<p>
    В адресе маршрута допустимо указать, что последняя часть его может отсутствовать:
</p>

<?= Code::fromFile('@views/docs/code/routes/empty.end.part.uri.php', false);  ?>

<p>
    В случае отсутствия адрес все равно совпадёт с этим маршрутом, но значение <span class="notranslate">'id'</span> будет равно NULL.
</p>

<?= Paragraph::h2('Значения по умолчанию для динамических адресов') ?>

<p>
  Пример динамического маршрута в котором указаны значения для <span class="notranslate">second</span> и <span class="notranslate">third</span> именованных частей.
</p>

<?= Code::fromFile('@views/docs/code/routes/default.dynamic.parts.php', false);  ?>

<p>
    Аналогично <span class="notranslate">'/example/{first}/two/three?'</span>, только в данных <span class="notranslate">Request</span> будут добавлены к уже имеющемуся динамическому параметру <span class="notranslate">'first'</span> дополнительные значения <span class="notranslate">['second' => 'two', 'third' => 'three']</span>. Если конечный параметр отсутствует, то будет равен <span class="notranslate">null</span>.
</p>

<?= Paragraph::h2('Вариативные адреса') ?>

<p>
    Множественное назначение маршрутов (в <span class="notranslate">Request::param()</span> окажется нумерованный массив с частями <span class="notranslate">URL</span>):
</p>

<?= Code::fromFile('@views/docs/code/routes/variable.uri.php', false);  ?>


<?= Paragraph::h2('Тег в адресе') ?>

<p>
    Фреймворк не позволяет интерпретировать части <span class="notranslate">URL</span> как составные, так как это противоречит стандартам, но из этого правила есть исключение.<br>
    Распространена ситуация, когда логин пользователя предваряется специальным тегом <span class="notranslate">@</span> в <span class="notranslate">URL</span>.
    Задать его можно так:
</p>

<?= Code::fromFile('@views/docs/code/routes/tag.uri.php', false);  ?>


<?= Paragraph::h2('Функция view()') ?>

<p>
    Функция указывает, какой шаблон из папки <span class="notranslate">/resources/views/</span> соотнести с маршрутом.
    Пример для файла <span class="notranslate">/resources/views/index.php</span>:
</p>

<?= Code::fromFile('@views/docs/code/routes/view.index.php', false);  ?>

<p>
    Вторым аргументом функции можно передать переменные в именованном массиве.
</p>

<?= Code::fromFile('@views/docs/code/routes/view.params.php', false);  ?>

<p>
    Переменные будут доступны в шаблоне.
</p>

<?= Code::fromFile('@views/docs/code/template/view.param.php');  ?>

<p>
    Для предопределённых адресов '404', '403' и '401' в функции <span class="notranslate">view()</span> будет выведена соответствующая стандартная страница ошибки.
</p>

<?= Paragraph::h2('Функция preview()') ?>

<p>
    Иногда для указания какого-либо предварительно заданного текстового ответа в маршруте необходимо установить соответствующий заголовок <span class="notranslate">Content-Type</span> и вывести некоторые параметры запроса. Пока в функции <span class="notranslate">preview()</span> доступно только внедрение исходного адреса маршрута, динамических параметров из адреса, текущего IP-адреса и <span class="notranslate">HTTP</span>-метода запроса. Например:
</p>

<?= Code::fromFile('@views/docs/code/template/preview.param.php', false);  ?>

<?= Paragraph::h2('Функция redirect()') ?>

<p>
    Для перенаправления на другой адрес в маршрутах используется метод <span class="notranslate">redirect()</span>. В нем могут быть ссылки на внутренние или внешние <span class="notranslate">URL</span>, а также он может включать динамические параметры запроса из оригинального маршрута:
</p>

<?= Code::fromFile('@views/docs/code/template/redirect.param.php', false);  ?>



<?= Paragraph::h2('Группировка маршрутов') ?>

<p>
    Группировка маршрутов используется для назначения общих свойств маршрутам путем добавления методов к группам, после этого действие метода распространяется на всю группу.<br>
    Определение области действия группы обозначается методом <span class="notranslate"><b>toGroup()</b></span> в начале группы и <span class="notranslate"><b>endGroup()</b></span> по завершению.
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example.php', false);  ?>

<p>
    В данном случае метод <span class="notranslate"><b>prefix()</b></span>, добавленный к группе, распространяет своё действие на все маршруты в ней.
</p>
<p>
    Группы могут быть вложены в другие группы. Также существует альтернативный синтаксис для групп:
</p>

<?= Code::fromFile('@views/docs/code/routes/group.example2.php', false);  ?>

<?= Paragraph::h2('Именованные маршруты') ?>

<p>
    Каждому маршруту можно назначить уникальное название.
</p>

<?= Code::fromFile('@views/docs/code/test.php', false);  ?>

<p>
    По этому названию можно генерировать его <span class="notranslate">URL</span> и сделать код независимым от реальных адресов <span class="notranslate">URL</span>.<br>
    Это достигается использованием названий вместо адресов.
    Например, этот сайт оперирует именами маршрутов для составления ссылок на страницы.
</p>

<?= Paragraph::h2('Обработка HTTP-методов') ?>

<p>
    По аналогии с методом <span class="notranslate">get()</span> для <span class="notranslate">HTTP</span>-метода <span class="notranslate">GET</span>, существуют методы <span class="notranslate"><b>post()</b>, <b>put()</b>, <b>patch()</b>, <b>delete()</b>, <b>options()</b></span> по соответствию с <span class="notranslate">POST, PUT, PATCH, DELETE, OPTIONS</span>.
</p>
<p>
    Эти методы одинаково соответствуют своему <span class="notranslate">HTTP</span>-методу, кроме <span class="notranslate">options()</span>.<br>
    Во всех остальных случаях метод <span class="notranslate">OPTIONS</span> обрабатывается по стандарту, только в <span class="notranslate">options()</span> можно задать обработку OPTIONS отдельно (переназначить).
</p>

<?= Code::fromFile('@views/docs/code/routes/http.methods.php', false);  ?>

<?= Paragraph::h2('Метод Route::any()') ?>

<p>
    Назначенный маршруту, соответствует всем <span class="notranslate">HTTP</span>-методам, в остальном аналогичен <span class="notranslate">get()</span>.
</p>

<?= Paragraph::h2('Метод Route::match()') ?>

<p>
    Аналогичен методу <span class="notranslate">get()</span>, только имеет дополнительный первый аргумент, в котором можно передать массив с поддерживаемыми <span class="notranslate">HTTP</span>-методами.
</p>

<?= Code::fromFile('@views/docs/code/routes/match.method.php', false);  ?>

<?= Paragraph::h2('Метод Route::fallback()') ?>

<p>
    Перехватывает все не сопоставленные пути для всех <span class="notranslate">HTTP</span>-методов (или для указанных).
    Может быть только один метод <span class="notranslate">fallback()</span> в маршрутах для конкретного <span class="notranslate">HTTP</span>-метода.
</p>
<p>
    Таким образом можно назначить соответствие для не найденного совпадения (вместо ошибки 404) для всех типов <span class="notranslate">HTTP</span>-методов или в отдельности.
</p>

<?= Paragraph::h2('Защита маршрутов') ?>

<p>
    Для защиты маршрутов от атак типа <span class="notranslate">CSRF</span> предназначен метод <span class="notranslate"><b>protect()</b></span>.
    При назначении его к маршруту или группе маршрутов добавляет проверку на наличие специального токена, установленного ранее.
</p>

<?= Code::fromFile('@views/docs/code/routes/protect.method.php', false);  ?>

<p>
    Работает это следующим образом:<br>
    На странице выводится токен доступа, можно использовать функцию <span class="notranslate">csrf_token()</span> или <span class="notranslate">csrf_field()</span>.<br>
    Этот токен передается при помощи <span class="notranslate">JavaScript</span> или в форме вместе с запросом.<br>
    Маршрут запроса имеет метод <span class="notranslate">protect()</span> и происходит проверка токена.
</p>

<?= Paragraph::h2('Назначение контроллера') ?>

<p>
    <a href="<?= Link::url('docs.2.0.controller.controller.page'); ?>">Контроллер</a> — часть архитектуры <span class="notranslate">MVC</span> (<span class="notranslate">Action-Domain-Responder</span> для веб), отвечает за дальнейшее управление обработкой запроса, уже идентифицированного маршрутизатором, но не должен содержать бизнес-логику.
</p>
<p>
    Контроллер не может быть использован для группы маршрутов, он назначается конкретному или нескольким по отдельности.
    Для этого используется метод <span class="notranslate"><b>controller()</b></span>.
</p>

<?= Code::fromFile('@views/docs/code/controller/example.php', false);  ?>

<p>
    В примере первым аргументом указан класс назначаемого контроллера, вторым - используемый метод контроллера.
    Метод <span class="notranslate">'index'</span> можно не указывать, он используется по умолчанию.<br>
    Можно заметить, что у метода <span class="notranslate">get()</span> отсутствует уже ненужный с контроллером второй аргумент.
</p>

<?= Paragraph::h2('Контроллеры-посредники') ?>

<p>
    Если контроллер можно назначить только один к маршруту, то посредников (<span class="notranslate">middlewares</span>) может быть несколько, также <a href="<?= Link::url('docs.2.0.controller.middleware.page'); ?>">middleware</a> можно назначить к группе маршрутов.
</p>

<?= Code::fromFile('@views/docs/code/controller/middleware.example.php', false);  ?>

<p>
    Метод <b><span class="notranslate">middleware()</span></b> означает, что посредник будет выполнен до основного обработчика маршрута.
    Этому методу есть аналогичный <span class="notranslate"><b>before()</b></span> и метод <span class="notranslate"><b>after()</b></span> (выполнится после основного обработчика).
    Под <i>основным обработчиком</i> здесь подразумевается возвращаемый текст из маршрута, назначенный шаблон или выполнение контроллера.
</p>
<p>
    Назначенные посредники выполняются в той последовательности, в которой расположены.
</p>
<p>
    Аргументы метода для посредника сходны с контроллером, вторым аргументом можно задать выполняемый метод, по умолчанию <span class="notranslate">'index'</span>.
    Отличием является наличие третьего аргумента, в нём можно передать массив параметров в <span class="notranslate">middleware</span>.
    Указанные параметры доступны в методе Hleb\Static\Router::data() или через контейнер.
</p>

<?= Paragraph::h2('Модули') ?>

<p>
    Модуль — это разновидность контроллера, он указывает в папку <span class="notranslate">/modules/</span> проекта и содержит название используемого <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">модуля</a>.
</p>

<?= Code::fromFile('@views/docs/code/controller/module.example.php', false);  ?>

<?= Paragraph::h2('Проверка where()') ?>

<p>
    Маршрут может содержать динамические части в адресе и методом <span class="notranslate">where()</span> можно установить правила для этих частей.
</p>

<?= Code::fromFile('@views/docs/code/routes/where.example.php', false);  ?>

<p>
    В этом примере части под названием <span class="notranslate">'lang'</span>, <span class="notranslate">'user'</span> и <span class="notranslate">'id'</span> будут проверены с помощью регулярных выражений.
</p>

<?= Paragraph::h2('Ограничение по доменам') ?>

<p>
    Специальный метод <span class="notranslate"><b>domain()</b></span> может быть назначен маршруту или группе маршрутов. <br>
    Первым аргументом можно указать название домена или поддомена, вторым аргументом уровень соответствия этого правила.
</p>

<?= Paragraph::h2('Принцип подстановки') ?>

<p>
    Существует способ, при котором целевой контроллер и метод определяются исходя из значений динамического адреса.<br>
    Маршрут в этом случае может быть таким:
</p>

<?= Code::fromFile('@views/docs/code/routes/parts.uri.php', false);  ?>

<p>
    В этом примере для <span class="notranslate">URL</span> <span class="notranslate">/page/part/first/</span> фреймворк попробует определить контроллер как <span class="notranslate">'MainPartController'</span> и метод <span class="notranslate">'initFirst'</span>(преобразовав по принципу <span class="notranslate">camelCase</span>).
</p>

<p class="hl-danger-block">
    Принцип подстановки в обработчики должен быть контролируемым, так как в URL могут попасть данные, которые вызовут непредусмотренный заранее контроллер или его метод.
</p>

<p>
    Кроме этого, можно дополнительно указать зависимость от <span class="notranslate">HTTP-метода</span> запроса ключом <span class="notranslate">'[verb]'</span>.
</p>

<?= Code::fromFile('@views/docs/code/routes/part.param.php', false);  ?>

<p>
    В этом примере для <span class="notranslate">URL</span> <span class="notranslate">/page/example/</span> фреймворк попробует определить контроллер как <span class="notranslate">'MainExampleGetController'</span> и метод <span class="notranslate">'getMethod'</span>(преобразовав по принципу <span class="notranslate">camelCase</span>).<br>
    Для метода <span class="notranslate">POST</span> это будут <span class="notranslate">'MainExamplePostController'</span> и <span class="notranslate">'postMethod'</span>.
</p>
<p>
    Возможность подстановки может быть особенно полезной при распределении <span class="notranslate">HTTP</span>-методов запроса по методам контроллера.
</p>


<?= Paragraph::h2('Отключение отладочного режима в маршруте') ?>

<p>
    В некоторых маршрутах в режиме отладки вывод <span class="notranslate">DEBUG</span>-панели может быть не предусмотрен, например, если это <span class="notranslate">GET</span>-запрос к <span class="notranslate">API</span> и ожидается ответ в формате <span class="notranslate">JSON</span>. Есть временный способ отключения отладочного режима в виде <span class="notranslate">GET</span>-параметра <span class="notranslate">_debug=off</span> для запроса, но также и постоянный, когда маршруту можно указать метод <span class="notranslate">noDebug()</span>. Этот метод может быть добавлен и для группы маршрутов, в данном примере для всех запросов к <span class="notranslate">API</span>.
</p>
<p>
    Если вывод панели отладки запрещен с помощью <span class="notranslate">noDebug()</span> метода, но нужно всё равно временно включить отладочный режим, достаточно указать <span class="notranslate">_debug=on</span> в <span class="notranslate">GET</span>-параметрах запроса. Стоит помнить, что указанное здесь включение/отключение режима отладки актуально только если <span class="notranslate">DEBUG</span>-режим активен в настройках конфигурации, в противном случае он отключен полностью.
</p>

<?= Paragraph::h2('Обновление кеша маршрутов') ?>

<p>
    По умолчанию во фреймворке кеш маршрутов обновляется автоматически после внесения изменений в файл <span class="notranslate">/routes/map.php</span>.
    Существует также консольная команда для обновления кеша маршрутов:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console --routes-upd</p>

<p>
    Для проекта с большой посещаемостью возможно возникнет надобность отключить в <span class="notranslate">production</span> автоматическое обновление и выполнять перерасчёт кеша маршрутов только консольной командой.<br>
    Это делается через настройку <span class="notranslate">'routes.auto-update'</span> в файле <span class="notranslate">/config/common.php</span>.
</p>

<?= Link::previousPage('docs.2.0.start.hosting.page', 'Использование хостинга'); ?>

<?= Link::nextPage('docs.2.0.controller.controller.page', 'Контроллер'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

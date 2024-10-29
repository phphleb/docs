<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Встроенные функции фреймворка') ?>

<p>
    Фреймворк <span class="notranslate">HLEB2</span> добавляет некоторое количество собственных функций различного назначения, сокращающих размер кода и ускоряющих разработку приложения, так как они представляют собой короткое написание распространенных действий.
</p>

<p class="hl-info-block">
    Некоторые встроенные функции фреймворка имеют <b><span class="notranslate">hl_</span></b> в начале названия, функции без такого префикса также имеют дубликаты с его добавлением. Поэтому, если вы забыли название нужной функции, напечатайте в нужном месте кода <i><span class="notranslate">hl_</span></i> и ваша IDE должна подсказать доступные варианты.
</p>

<?= Paragraph::h2('Работа с данными маршрутов') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> собственная система роутинга. Следующие функции предназначены для того, чтобы взаимодействовать с этой системой. Если вы практикуете назначение маршрутам собственных названий, то они могут здесь пригодиться.
</p>

<?= Paragraph::h3('route_name()') ?>

<p>
    Эта функция возвращает название текущего маршрута или <span class="notranslate">null</span> если оно не назначено.<br>
    Несмотря на эту весьма полезную информацию, она может понадобиться только совместно с использованием другой функции по работе с адресами.
</p>

<?= Paragraph::h3('url()') ?>

<p>
    Функция <span class="notranslate">url()</span> возвращает <b>относительный</b> URL-адрес по имени маршрута и подстановкой необходимых параметров.<br>
    Аргументы функции:<br>
    <b><span class="notranslate">routeName</span></b> - название маршрута, для которого нужно получить адрес.<br>
    <b><span class="notranslate">replacements</span></b> - массив подстановочных частей, если маршрут динамический.<br>
    <b><span class="notranslate">endPart</span></b> - булево значение, определяющее, имеет ли получаемый адрес последнюю часть, если она в маршруте не обязательна.<br>
    <b><span class="notranslate">method</span></b> - для какого HTTP-метода нужен адрес. Дело в том, что для некоторых методов маршрут может не подходить и в таком случае вернёт ошибку. По умолчанию <span class="notranslate">'get'</span>.
</p>

<?= Code::fromFile('@views/docs/code/function/function.address.example.php', false);  ?>

<p class="hl-info-block">
    При единообразном использовании внутренних URL по их названиям в маршруте достигается возможность для всего приложения менять статические части адресов в маршрутах, не внося изменений в остальной код.
</p>

<?= Paragraph::h3('address()') ?>

<p>
    Функция <span class="notranslate">address()</span> возвращает <b>полный</b> <span class="notranslate">URL</span>-адрес по имени маршрута с подстановкой текущего домена. Так как домен присваивается только текущий, для другого домена используйте конкатенацию с <span class="notranslate">url()</span>.<br>
    Набор параметров аналогичен функции <span class="notranslate">url()</span>. Благодаря этой функции можно генерировать корректные ссылки на страницы проекта. Однако для переходов внутри приложения лучше использовать <i>относительные</i> URL.
</p>

<?= Paragraph::h2('Получение данных текущего HTTP-запроса') ?>

<?= Paragraph::h3('request_uri()') ?>

<p>
    Возвращает объект с информацией из относительного URL-адреса текущего запроса.<br>
    Основой для объекта, возвращаемого функцией <span class="notranslate"><b>request_uri()</b></span>, взят <span class="notranslate">UriInterface</span> (метод <span class="notranslate">getUri()</span>) из <span class="notranslate">PSR-7</span>, благодаря этому можно получить следующие данные запроса:<br>
    <span class="notranslate">request_uri()-><b>getHost()</b></span> - доменное имя текущего запроса, например - <span class="notranslate">'mob.example.com'</span>. Может быть вместе с портом, в зависимости от наличия его в запросе.<br>
    <span class="notranslate">request_uri()-><b>getPath()</b></span> - путь из адреса после хоста, например <span class="notranslate">'/ru/example/page'</span> или <span class="notranslate">'/ru/example/page/'</span>.<br>
    <span class="notranslate">request_uri()-><b>getQuery()</b></span> - параметры запроса, например <span class="notranslate"><span class="hl-nowrap">'?param1=value1&amp;param2=value2'</span></span>.<br>
    <span class="notranslate">request_uri()-><b>getPort()</b></span> - порт запроса.<br>
    <span class="notranslate">request_uri()-><b>getScheme()</b></span> - <span class="notranslate">HTTP</span>-схема запроса, <span class="notranslate">'http'</span> или <span class="notranslate">'https'</span>.<br>
    <span class="notranslate">request_uri()-><b>getIp()</b></span> - <span class="notranslate">IP</span>-адрес запроса.
</p>

<p class="hl-info-block">
    В этих примерах к <span class="notranslate">request_uri()</span> в одном выражении используется два вида составления названий (<span class="notranslate">snake_case</span> и <span class="notranslate">camelCase</span>), но это объясняется тем, что большинство функций фреймворка <span class="notranslate">HLEB2</span> имеют вид <span class="notranslate">snake_case</span> аналогично функциям в PHP, а методы возвращаемого объекта в <span class="notranslate">camelCase</span>, по <span class="notranslate">PSR-12</span>. Если вам привычен другой формат функций, оберните текущие в необходимый вид.
</p>

<?= Paragraph::h3('request_host()') ?>

<p>
    Функция <span class="notranslate">request_host()</span> позволяет получить текущий хост. Может быть вместе с портом. Например, <span class="notranslate">`example.com`</span> или <span class="notranslate">`example.com:8080`</span> если он передан в URL запроса. Благодаря этому можно генерировать корректные ссылки на страницы проекта. Однако для переходов внутри приложения лучше использовать относительные URL.
</p>

<?= Paragraph::h3('request_path()') ?>

<p>
    Функция <span class="notranslate">request_host()</span> возвращает текущий относительный адрес запроса из URL без GET-параметров. Например <span class="notranslate">`/ru/example/page`</span> или <span class="notranslate">`/ru/example/page/`</span>.
</p>

<?= Paragraph::h3('request_address()') ?>

<p>
    Функция <span class="notranslate">request_address()</span> возвращает текущий полный адрес запроса из URL без GET-параметров. Например <span class="notranslate">`https://example.com/ru/example/page`</span>  или  <span class="notranslate">`https://example.com/ru/example/page/`</span>.
</p>

<?= Paragraph::h2('Редирект') ?>

<p>
    Перенаправление на другие страницы приложения или другие <span class="notranslate">URL</span>.
</p>

<?= Paragraph::h3('hl_redirect()') ?>

<p>
    При помощи функции <span class="notranslate">hl_redirect()</span> осуществляется редирект при помощи переданного специального заголовка и выхода из скрипта. Таким образом, если до применения этой функции уже был вывод контента, заголовки не будут переданы и будет показано предупреждение вместо редиректа. Работает на основе заголовка <span class="notranslate">'Location'</span>. При применении в классах на основе фреймворка, например в контроллерах, более уместным будет использование аналогичного способа <span class="notranslate">Redirect::to()</span>.
</p>

<?= Code::fromFile('@views/docs/code/function/function.redirect.example.php', false);  ?>


<?= Paragraph::h2('Получение данных из конфигурации фреймворка') ?>

<p>
    В коде приложения могут быть использованы данные конфигурации фреймворка или из собственных настроек.
    Следующие функции позволяют получить эти данные в любом месте кода проекта.
</p>

<p class="hl-info-block">
    Параметры и настройки проекта должны быть собраны в его конфигурационных файлах и могут быть использованы не только для нужд приложения, но и для наполнения настроек подключаемых сторонних библиотек.
</p>

<?= Paragraph::h3('config()') ?>

<p>
   Каждый параметр конфигурации распределён по группам по основному названию файла.<br>
    Это могут быть как стандартные группы (<span class="notranslate">'common'</span>, <span class="notranslate">'database'</span>, <span class="notranslate">'main'</span>, <span class="notranslate">'system'</span>) так и дополнительно созданные для проекта. Первым аргументом функции <span class="notranslate">config()</span> передаётся название такой группы.<br>
    Вторым - название самого параметра. Функция возвращает значение этого параметра. Например:
</p>

<?= Code::fromFile('@views/docs/code/function/function.config.example.php', false);  ?>

<?= Paragraph::h3('get_config_or_fail()') ?>

<p>
    Как следует из названия <span class="notranslate">get_config_or_fail()</span>, функция возвращает значение параметра конфигурации или возникает ошибка, если параметр не найден или равен <span class="notranslate">null</span>.
    Аргументы аналогичны функции <span class="notranslate">config()</span>.
</p>

<?= Paragraph::h3('setting()') ?>

<p>
    Так как пользовательские значения рекомендовано добавлять в группу <span class="notranslate">'main'</span>,
    то для частого использования этой конфигурации предусмотрена отдельная функция <span class="notranslate">setting()</span>.
    Применение её аналогично функции <span class="notranslate">config()</span> с первым аргументом <span class="notranslate">'main'</span>.
</p>

<?= Paragraph::h3('hl_db_config()') ?>

<p>
    Специальная функция <span class="notranslate">hl_db_config()</span> представляет собой аналог функции <span class="notranslate">config()</span> с первым аргументом <span class="notranslate">'database'</span>.
</p>

<?= Paragraph::h3('hl_db_connection()') ?>

<p>
    Функция <span class="notranslate">hl_db_connection()</span> нужна для получения данных любого существующего подключения из списка <span class="notranslate">'db.settings.list'</span> группы настроек <span class="notranslate">'database'</span>. Возвращает массив с настройками или выбрасывает ошибку, если они не найдены.
</p>

<?= Paragraph::h3('hl_db_active_connection()') ?>

<p>
    Функция <span class="notranslate">hl_db_active_connection()</span> аналогично функции <span class="notranslate">hl_db_connection()</span> возвращает массив настроек, но для подключения, которое обозначено "активным" в параметре <span class="notranslate">'base.db.type'</span>.
</p>

<p class="hl-info-block">
    Функции для обращения к параметрам баз данных незаменимы при добавлении сторонних библиотек, требующих настройки подключения к той-или мной базе данных.
</p>

<?= Paragraph::h2('Отладочные функции') ?>

<p>
    Во фреймворке есть несколько функций для быстрой отладки кода. Они дополняют и расширяют <span class="notranslate">PHP</span>-функцию <span class="notranslate">var_dump()</span> различными способами. Исходя из ситуации можно выбрать подходящую.
</p>

<?= Paragraph::h3('print_r2()') ?>

<p>
    Эта функция осталась ещё из первой версии фреймворка. Она нужна для вывода данных в читаемом виде для отладочной панели. Таким образом, при отключённом режиме DEBUG переданные в функцию отладочные данные не будут отображаться, так как панель отладки отключена. Эту возможность удобно использовать при разработке, не беспокоясь о видимости её вывода вне режима отладки. Вторым аргументом функции <span class="notranslate">print_r2()</span> допустимо добавить описание к выводимым данным, чтобы потом найти их в панели. Пример:
</p>

<?= Code::fromFile('@views/docs/code/function/function.print_r2.example.php', false);  ?>

<?= Paragraph::h3('var_dump2()') ?>

<p>
    Полный аналог функции <span class="notranslate">var_dump()</span>, только <span class="notranslate">var_dump2()</span> выводит информацию более структурированную, а если вывод предназначен для браузера, то сохраняются оригинальные переносы и отступы.
</p>

<?= Paragraph::h3('dump()') ?>

<p>
    Функция <span class="notranslate">dump()</span> - ещё одна обертка над <span class="notranslate">var_dump()</span>, но преобразует результат в <span class="notranslate">HTML</span>-код, который выглядит красивее и информативнее, чем стандартный вывод.
</p>

<?= Paragraph::h3('dd()') ?>

<p>
    Аналогично <span class="notranslate">dump()</span> выводит <span class="notranslate">HTML</span>-код, но после этого завершает работу скрипта.
    Функцию <span class="notranslate">dd()</span> легко найти на странице приложения, так как её вывод будет в самой нижней части.
</p>

<?= Paragraph::h2('Работа с файловой системой') ?>

<p>
    Во фреймворке <span class="notranslate">HLEB2</span> организована работа с файлами и папками на уровне относительных путей от корня проекта.
    Такие пути начинаются со знака '@/' и обозначают начало корневой директории. Это используется во многих стандартных сервисах фреймворка и рекомендуется для применения. Следующие функции представляют собой обертки над соответствующими функциями в <span class="notranslate">PHP</span> и добавляют возможность использования метки '@'.
</p>

<?= Paragraph::h3('hl_file_exists()') ?>

<p>
    Функция <span class="notranslate">hl_file_exists()</span> аналог <span class="notranslate">PHP</span> функции <span class="notranslate">file_exists()</span>, но дополнительно может принимать специальные пути с '@' в начале.
</p>

<?= Paragraph::h3('hl_file_get_contents()') ?>

<p>
    Функция <span class="notranslate">hl_file_get_contents()</span> аналог <span class="notranslate">PHP</span> функции <span class="notranslate">file_get_contents()</span>, но позволяет использовать и специальные пути начинающиеся с '@'.
</p>

<?= Paragraph::h3('hl_file_put_contents()') ?>

<p>
    Функция <span class="notranslate">hl_file_put_contents()</span> аналог <span class="notranslate">PHP</span> функции <span class="notranslate">file_put_contents()</span>, но также принимает дополнительные пути с начальным '@'.
</p>

<?= Paragraph::h3('hl_is_dir()') ?>

<p>
    Функция <span class="notranslate">hl_is_dir()</span> аналог <span class="notranslate">PHP</span> функции <span class="notranslate">is_dir()</span>, но может принимать также пути с '@' в начале.
</p>

<?= Paragraph::h2('Защита от CSRF-атак') ?>

<p>
    Подробно про реализацию <a href="<?= Link::url('docs.2.0.controller.module.page'); ?>">предохранения от <span class="notranslate">CSRF</span>-атак</a> во фреймворке.
</p>

<?= Paragraph::h3('csrf_token()') ?>

<p>
    Функция <span class="notranslate">csrf_token()</span> возвращает защищённый токен для защиты от <span class="notranslate">CSRF</span>-атак.
</p>

<?= Paragraph::h3('csrf_field()') ?>

<p>
    Функция <span class="notranslate">csrf_field()</span> возвращает <span class="notranslate">HTML</span>-контент для вставки в форму для защиты от <span class="notranslate">CSRF</span>-атак.
</p>

<?= Paragraph::h2('Шаблоны') ?>

<p>
    Несмотря на то, что фреймворк позволяет подключить шаблонизатор Twig, имеются простая реализация встроенных шаблонов,
    не использующих собственной разметки, отличающейся от стандартного <span class="notranslate">PHP</span> или <span class="notranslate">HTML</span>. <a href="<?= Link::url('docs.2.0.template.standard.page'); ?>">Подробнее</a> о стандартных шаблонах фреймворка.
</p>

<?= Paragraph::h3('insertTemplate()') ?>

<p>
    Благодаря функции <span class="notranslate">insertTemplate()</span> сформированный шаблон добавляется в том месте файла, где расположена
    эта функция. Основные параметры:<br>
    <b><span class="notranslate">viewPath</span></b> - специальный путь к файлу шаблона. Формат аналогичен тем типам путей, которые используются в функции <span class="notranslate">view()</span>.<br>
    <b><span class="notranslate">extractParams</span></b> - именованный массив значений, который будет преобразован в переменные шаблона.

</p>

<?= Paragraph::h3('template()') ?>

<p>
    Функция <span class="notranslate">template()</span> возвращает текстовое представление шаблона фреймворка.
    Это нужно, если необходимо передать содержимое далее, например если это шаблон письма.
    Параметры аналогичны функции <span class="notranslate">insertTemplate()</span>.
</p>

<?= Paragraph::h3('insertCacheTemplate()') ?>

<p>
    Функция <span class="notranslate">insertCacheTemplate()</span> похожа на <span class="notranslate">insertTemplate()</span> с тем отличием, что шаблон кешируется на указанное количество секунд, указанное в параметре <b><span class="notranslate">sec</span></b>.
    Остальные аргументы аналогичны функции <span class="notranslate">insertTemplate()</span>.
</p>


<?= Paragraph::h2('Дополнительно') ?>

<p>
    Различные узкоспециальные функции.
</p>

<?= Paragraph::h3('is_empty()') ?>

<p>
    Проверяет более избирательно значение на пустоту, чем <span class="notranslate">PHP</span> функция <span class="notranslate">empty()</span>.
    Функция <span class="notranslate">is_empty</span> вернёт <span class="notranslate">false</span> только в четырёх случаях: передана пустая строка, <span class="notranslate">null</span>, <span class="notranslate">false</span> или пустой массив. При передаче не объявленной переменной будет ошибка, поэтому для аналогии с оригинальной функцией можно подавить эту ошибку добавлением '@' перед функцией, например:
</p>

<?= Code::fromFile('@views/docs/code/function/function.is_empty.example.php', false);  ?>

<p class="hl-info-block">
    Хотя использование подавителя ошибок плохая практика, в коде функции <span class="notranslate">is_empty()</span> не подразумевается возникновение других ошибок.
</p>

<?= Paragraph::h3('logger()') ?>

<p>
    Функция для отправки в лог <span class="notranslate">logger()</span> возвращает объект с методами логирования данных по различным уровням.
</p>

<?= Code::fromFile('@views/docs/code/function/function.logger.example.php', false);  ?>

<?= Paragraph::h3('once()') ?>

<p>
    Функция <span class="notranslate">once()</span> позволяет выполнять часть кода только единожды для одного запроса,
    а при повторном обращении возвращает прежний результат.<br>
    Результат выполнения хранится в памяти в течении всего запроса.<br>
    В этом сценарии анонимная функция, переданная в <span class="notranslate">once()</span>, будет выполнена при первом вызове once:
</p>

<?= Code::fromFile('@views/docs/code/function/function.once.example.php', false);  ?>

<?= Paragraph::h3('param()') ?>

<p>
    Возвращает объект с данными динамического запроса по имени параметра с возможностью выбора формата значения.<br>
    Например, если в динамическом маршруте был указан параметр <span class="notranslate">`/{test}/`</span>,
    а запрос был в виде <span class="notranslate">`/example/`</span>, то <span class="notranslate">param('test')</span>-><span class="notranslate">value</span> вернет <span class="notranslate">'example'</span>.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>;</span>   - прямое получение значения.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>value</b>();</span> - прямое получение значения.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>();</span> - возвращение значения, преобразованного в <span class="notranslate">integer</span>, при отсутствии равно <span class="notranslate">null</span>.<br>
    <span class="notranslate">param('test')</span>-><span class="notranslate"><b>asInt</b>($default);</span> - возвращение значения, преобразованного в <span class="notranslate">integer</span>,
        при отсутствии будет возвращено <span class="hl-nowrap"><span class="notranslate">$default</span>.</span><br>
        Если последняя часть маршрута является необязательным переменным значением, то это значение будет равно <span class="notranslate">null</span>.<br>
        Необходимо быть осторожными с пользовательскими данными, полученными в качестве прямого значения.
</p>

<?= Paragraph::h2('Тестирование функций фреймворка') ?>

<p class="hl-info-block">
    В большинстве случаев стандартные функции фреймворка являются обёртками над соответствующими сервисами, поэтому их тестирование аналогично тестированию этого сервиса.
</p>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


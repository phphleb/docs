<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>

<?= Paragraph::h1('Менеджер файловых путей') ?>

<p>
    Для универсальности разрабатываемого приложения и его переносимости — все операции с направляющими адресами к файлам и директориям проекта должны быть относительными к его корневой директории.
</p>
<p>
    Во фреймворке <span class="notranslate">HLEB2</span> менеджером файловых путей служит сервис <b>Path</b>.
    Он делает доступным манипулирование с относительными файловыми путями в проекте, предоставляя обёртку над соответствующими функциями <span class="notranslate">PHP</span>.
</p>
<p>
    Способы использования <span class="notranslate">Path</span> в контроллерах (и всех классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>) на примере получения полного пути от корневой директории:
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.container.php', false);  ?>

<p>
    Пример определения файлового пути в коде приложения:
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.static.php', false);  ?>

<p>
    Также объект <span class="notranslate">Path</span> может быть получен через <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a> по интерфейсу <span class="notranslate">Hleb\Reference\Interface\Path</span>.
</p>
<p>
    Для упрощения примеров, далее они будут содержать только обращение через <span class="notranslate">Hleb\Static\Path</span>.
</p>

<?= Paragraph::h2('Символ @') ?>

<p>
    В приведённых выше примерах присутствует символ '@' в начале относительного пути.
    Он означает, что путь начинается с корневой директории проекта.<br>
    Если корневая директория проекта <span class="notranslate">/var/www/hleb/</span>, то в примере вернулась бы строка <span class="notranslate">'/var/www/hleb/storage/public/files'</span>.
    Для <span class="notranslate">Windows</span> результат выглядел бы немного иначе, но это все равно был бы существующий полный путь к указанной папке.
</p>
<p>
    Префикс <span class="notranslate">'@storage'</span> здесь является предопределенным для фреймворка, вот список других назначенных соответствий:
</p>
<p>
    <b>'@'</b> - корневая директория проекта с фреймворком <span class="notranslate">HLEB2</span>.
    Путь может быть указан произвольным, например <span class="notranslate">'@/other/folder'</span>.<br>
    <span class="notranslate"><b>'@app'</b></span> - путь к папке <span class="notranslate">/app/</span> проекта.<br>
    <span class="notranslate"><b>'@public'</b></span> - путь к папке <span class="notranslate">/public/</span> проекта c публичными файлами проекта, в эту папку направлен веб-сервер.
    Даже если название её изменено, все равно для соответствия будет <span class="notranslate">'@public'</span>.<br>
    <span class="notranslate"><b>'@storage'</b></span> - путь к папке <span class="notranslate">/storage/</span> проекта, здесь хранятся кеши, логи и другие вспомогательные файлы.<br>
    <span class="notranslate"><b>'@resources'</b></span> - путь к папке <span class="notranslate">/resources/</span> проекта.
    Это папка с различными ресурсами проекта: шаблоны страниц, шаблоны писем, шаблоны для сборки и тд.<br>
    <span class="notranslate"><b>'@views'</b></span> - путь к папке <span class="notranslate">/resources/views/</span> проекта.<br>
    <span class="notranslate"><b>'@modules'</b></span> - путь к папке <span class="notranslate">/modules/</span> проекта, даже если название директории с модулями изменено в настройках.<br>
    <span class="notranslate"><b>'@vendor'</b></span> - путь к папке c библиотеками проекта, остаётся таким же в случае, если название папки отличается.<br>
</p>
<p>
    Таким образом, допускается любой путь в пределах проекта, поэтому перенос на сервер с другим устройством директорий или в другую папку не будет проблемой, пути всегда будут указывать в нужное место.
</p>
<p>
    Для сервиса <span class="notranslate">Path</span> существует несколько методов, правильно распознающих относительные пути с начальной '@'.
</p>

<p class="hl-info-block">
    Конечный слеш для строки с относительным путем, например <span class="notranslate">'@storage/logs/'</span>, имеет значение, возвращённый методом полный путь к папке в этом случае будет включать слеш в конце.
</p>

<?= Paragraph::h2('getReal()') ?>

<p>
    Метод <span class="notranslate">getReal()</span> можно наблюдать в примерах выше.
    Он возвращает строку с полным путём, полученным из относительного.
    Если указанный путь не существует, то метод возвращает <span class="notranslate">false</span>.<br>
    Таким же образом действует функция фреймворка <span class="notranslate"><b>hl_realpath()</b></span>.

</p>

<?= Paragraph::h2('get()') ?>

<p>
    Метод <span class="notranslate">get()</span> отличается от <span class="notranslate">getReal()</span> тем, что при несуществующем пути все равно вернет строку для полного пути, не проверяя существование.<br>
    Заменой этого метода может быть функция <span class="notranslate"><b>hl_path()</b></span>.
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.get.php', false);  ?>

<?= Paragraph::h2('relative()') ?>

<p>
    Этот метод отличается от других методов сервиса <span class="notranslate">Path</span>, он принимает полный путь, а возвращает относительный с '@' в начале.
    Бывает необходимость вывести в пользовательские логи или в ином месте относительный путь в проекте, скрывая полный.
    Метод <span class="notranslate">relative()</span> поможет в таком случае.
</p>

<?= Code::fromFile('@views/docs/code/container/service/path/get.path.relative.php', false);  ?>

<p>
    В примере отображено получение относительного пути к текущему файлу.
</p>

<?= Paragraph::h2('createDirectory()') ?>

<p>
    Метод <span class="notranslate">createDirectory()</span> создает директорию (при её отсутствии) со всеми вложенными подпапками по указанному относительному пути c '@' в начале или полному.
</p>

<?= Paragraph::h2('exists()') ?>

<p>
    Для проверки существования файла или директории предназначен метод <span class="notranslate">exists()</span>.
    Он принимает для проверки как полный, так и относительный путь с '@' в начале.<br>
    Во фреймворке есть функция <span class="notranslate"><b>hl_file_exists()</b></span> с аналогичным действием.
</p>

<?= Paragraph::h2('contents()') ?>

<p>
    Метод <span class="notranslate">contents()</span> является оберткой над <span class="notranslate">file_get_contents()</span>, только кроме полного пути может принимать и относительный путь с '@' в начале.<br>
    Дублирует этот метод функция фреймворка <span class="notranslate"><b>hl_file_get_contents()</b></span>.
</p>

<?= Paragraph::h2('put()') ?>

<p>
    Этот метод аналогичен функции <span class="notranslate">file_put_contents()</span>.
    Кроме полного пути метод <span class="notranslate">put()</span> может принимать и относительный путь с '@' в начале.<br>
    Для замены метода есть функция фреймворка <span class="notranslate"><b>hl_file_put_contents()</b></span>.
</p>

<?= Paragraph::h2('isDir()') ?>

<p>
    Метод <span class="notranslate">isDir()</span> является обёрткой над функцией <span class="notranslate">is_dir()</span>, кроме полного пути может принимать и относительный путь с '@' в начале.<br>
    Вместо этого метода есть возможность использовать функцию <span class="notranslate"><b>hl_is_dir()</b></span>.
</p>

<?= Paragraph::h2('Асинхронные запросы') ?>

<p class="hl-danger-block">
    Некоторые операции над файлами, такие как запись в файл, являются блокирующими для асинхронных вызовов, поэтому рекомендуется использовать их аналоги, поддерживающие асинхронность.
</p>


<?= Link::previousPage('docs.2.0.service.log.page', 'Логирование'); ?>

<?= Link::nextPage('docs.2.0.service.db.page', 'Сервис DB'); ?><br><br>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>

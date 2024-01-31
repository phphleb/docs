<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Переопределение стандартного сервиса') ?>

<p>
    Получение стандартного сервиса из <a href="<?= Link::url('docs.2.0.container.container.page'); ?>">контейнера</a> может быть изменено добавлением в пользовательский контейнер собственного сервиса с аналогичным интерфейсом.
    Необходимо создать новый сервис и вернуть его из метода 'getSingleton' класса App\Bootstrap\ContainerFactory перед выбором из стандартных сервисов.
    Во фреймворке <span class="notranslate">HLEB2</span> используется по два идентичных интерфейса (для разных вариантов именования) для каждого встроенного сервиса, необходимо вернуть собственный сервис как <span class="notranslate">singleton</span> для интерфейса с окончанием <span class="notranslate">'Interface'</span>.
    Например, для сервиса кеширования это будет <span class="notranslate">'Hleb\Reference\CacheInterface'</span>.
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/replace/replace.example.compare.php');  ?>

<p>
    В примере показано, для сервиса кеширования, как изменить стандартный сервис на собственный.
    Здесь это может быть кеширование с хранилищем в базе данных, а не файловое (по умолчанию).
</p>
<p>
    Таким же образом можно "удалить" стандартный сервис из контейнера, переопределив его <span class="notranslate">NULL</span> значением.
    Но сначала необходимо убедиться, что сервис не используется ни в коде самого фреймворка, ни в коде приложения.
</p>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Тестирование') ?>

<p>
    Структура фреймворка проектировалась таким образом, чтобы не создавать препятствий для тестирования кода на его основе.
    Это касается всех разновидностей контроллеров и стандартных сервисов, а также собственных функций фреймворка.
</p>
<p>
    Способ тестирования зависит от вида использования сервисов, это может быть одноимённый класс со статическими методами вида <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span> для встроенных сервисов фреймворка или <span class="notranslate">DI</span>, последнее как внедрение сервисов(и других объектов) в методы и конструктор класса.
</p>
<p class="hl-info-block">
    Внедрение подходящих объектов согласно <span class="notranslate">Dependency Injection</span> распространяется во фреймворке только на создаваемые им объекты классов, таких как контроллеры, <span class="notranslate">middleware</span>, команды, события, а также объекты созданные сервисом под названием <span class="notranslate">DI</span>.
</p>

<?= Paragraph::h2('Тестирование для Dependency Injection') ?>

<p>
    Простой пример демонстрационного контроллера с <span class="notranslate">DI</span>:
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.di.php');  ?>

<p>
    Допустим, необходимо убедиться, что контроллер возвращает текст <span class="notranslate">'OK'</span>, но при этом не отправлять сообщение в логи.
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.di.php', false);  ?>

<p>
    Здесь класс логирования заменён классом с таким-же интерфейсом, но его методы ничего не отправляют в лог.
</p>

<p class="hl-info-block">
    Подразумевается, что для тестирования используется одна из специальных библиотек (например <span class="notranslate"><a href="https://github.com/phphleb/test-o/">github.com/phhleb/test-o</a></span>) и проверка будет реализована её средствами.
</p>

<p>
    Теперь вызовем метод произвольного класса через сервис <span class="notranslate">DI</span> (именно сервис фреймворка, не название архитектурного метода):
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.service.di.php', false);  ?>

<p>
    В данном случае сервис логирования будет подставлен из контейнера и сообщение попадёт в лог.
    Изменим обращение к методу для его тестирования:
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.test.service.di.php', false);  ?>

<p>
    Теперь класс протестирован и логирование не произошло.
    Вы можете подменить таким образом любой объект для <span class="notranslate">DI</span> на специально созданный для этого собственный класс с нужным поведением, который будет удобно тестировать.
</p>

<?= Paragraph::h2('Тестирование стандартных сервисов') ?>

<p>
    Встроенные сервисы фреймворка <span class="notranslate">HLEB2</span> имеют способ обращения со статическими методами вида <span class="notranslate">Hleb\Static\<i>Service</i>::<i>method()</i></span>.
    При использовании этого способа проще обращаться к сервисам, но затрудняется тестирование содержащих их модулей, хотя всё же возможно.
    На примере логирования:
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.static.php', false);  ?>

<p>
    В примере показано, как состояние сервиса было заменено на тестовый объект, а затем произведён откат к начальному значению.
    Чтобы такой способ нельзя было использовать вне тестов, в рабочем проекте, параметру конфигурации <span class="notranslate">'container.mock.allowed'</span> файла <span class="notranslate">/config/common.php</span> выставлено значение <span class="notranslate">false</span>.
</p>

<?= Paragraph::h2('Функциональное тестирование') ?>

<p>
    Для запуска тестов инициирующих ядро фреймворка, вам может понадобиться заменить частично или все сервисы контейнера на тестовые объекты.
    Для этого достаточно сделать свою реализацию и назначить её по условию (в примере это глобальная константа <span class="notranslate">APP_TEST_ON</span>):
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.container.php');  ?>

<?= Paragraph::h2('Тестирование встроенных функций') ?>

<p>
    Несколько встроенных функций фреймворка, упрощающих обращение к сервисам, таких как функция <span class="notranslate">logger()</span>, реализованы через тестируемые обращения к сервисам, в данном случае это обёртка над <span class="notranslate">Hleb\Static\Log</span>.
</p>

<?= Paragraph::h2('Тестирование для $this-container в классах') ?>

<p>
    В контроллерах, <span class="notranslate">middlewares</span>, командах, событиях и других классах, унаследованных от <span class="notranslate">Hleb\Base\Container</span>, обращение к контейнеру может быть как <span class="notranslate">$this-container</span>.
    Если вы выбрали этот способ использования контейнера (смешивание различных способов в проекте выглядело бы странным), то для тестирования необходимо особым образом инициализировать конструктор объекта.
</p>

<?= Code::fromFile('@views/docs/code/extra/testing/testing.example.container.php', false);  ?>

<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Нестандартное использование контейнера') ?>

<?= Paragraph::h2('Инициализация сервиса в сервисе') ?>

<p>
    Несмотря на то, что создание объекта в контейнере через <span class="notranslate">new</span> и c пустым конструктором является хорошей практикой, в конце концов вы можете вынести в отдельный метод специального класса создание всех необходимых зависимостей и зарегистрировать его выполнение в контейнере, несмотря на это есть способы
    разрешения зависимостей не прибегая к созданию отдельного класса-обёртки.
</p>
<p>
    В случае возникновения необходимости переиспользовать сервис из контейнера для инициализации другого сервиса в контейнере обратимся к возможностям, которые даёт <a href="<?= Link::url('docs.2.0.container.di.page'); ?>">внедрение зависимостей</a>. В классе <span class="notranslate">App\Bootstrap\ContainerFactory</span> эти методы доступны, как и в отдельном специальном классе для создания контейнера.
</p>
<p>
    Например, необходимо проинициализировать конструктор сервиса в контейнере. Для этого в теле оператора <span class="notranslate">match</span> класса
    <span class="notranslate">App\Bootstrap\ContainerFactory</span> нужно добавить примерно такое соответствие:
</p>



<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.example.di.container.class.php', false);  ?>

<p>
    Теперь в конструктор класса <span class="notranslate">DemoService</span> будет попадать текущий сервис <span class="notranslate">ExampleService</span> как он определен в контейнере. Все зависимости, не указанные явно, в используемом примере будут разрешены автоматически (вариант 2).
</p>

<p class="hl-info-block">
   Важно следить за тем, чтобы зависимости не зациклились, это может быть в случае если при инициализации объекта в контейнере он повторно обращается в контейнер для инициализации этого же объекта.
</p>
<p>
    Более сложный пример:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/match.demo.di.container.class.php', false);  ?>

<p>
Подобным образом в контейнер фреймворка, несмотря на его кажущуюся простоту, можно добавлять различные взаимозависимые сервисы.
</p>

<?= Paragraph::h2('Добавление сервисов в пользовательском коде') ?>

<p>
    По умолчанию во фреймворке не допускается добавление сервисов после инициализации контейнера. Но при переопределении метода <span class="notranslate">getSingleton()</span> на публичный в классе <span class="notranslate">ContainerFactory</span> появляется возможность добавлять в контейнер объекты в пользовательском коде через этот статический метод. Образец модификации класса:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/container/prof/set.singleton.container.class.php', false);  ?>

<p>
    Из примера видно, что также добавлена поддержка отложенной инициализации через <span class="notranslate">callable</span> тип и его обработчик.
</p>


<?php insertTemplate('/docs/ru/authors'); ?>

<?php insertTemplate('/docs/ru/footer'); ?>


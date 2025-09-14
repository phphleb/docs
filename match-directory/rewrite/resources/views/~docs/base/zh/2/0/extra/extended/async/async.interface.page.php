<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('异步请求的状态重置') ?>

<p>
    <span class="notranslate">HLEB2</span>框架提供执行异步请求的能力，这对代码提出了额外的要求。
    其中一个主要要求是在请求完成时消除存储的状态。
</p>
<p class="hl-info-block">
    在本文中，“异步”一词同时包含真正的异步模式和常见的<span class="notranslate">long-running</span>模式，因为针对两者的建议相同。
</p>
<p>
    存储的状态可以包括当前用户数据、请求数据缓存、各种形式的备忘化等。
</p>
<p class="hl-info-block">
    在编程中，<i>备忘化</i>是一种优化方法，使已经计算过的数据可重用。
    该方法涉及缓存类方法的输出，并强制方法检查所需的计算是否已在缓存中，然后才进行计算。
</p>
<p>
    需要确定哪些存储的状态与请求数据有关，哪些与整个应用程序的运行有关。
    例如，一般费率信息的计算状态不会从请求到请求改变，但每个用户选择的费率需要重置。在异步请求时，下一请求可能属于不同用户，因此重要的是清除前一个用户的信息。
</p>

<?= Paragraph::h2('ResetInterface') ?>
<p>
    通过实现<span class="notranslate">ResetInterface</span>，可以在框架容器中以异步方式现代化地重置服务状态。此机制仅适用于以单例（singleton）方式存储的服务；通过添加该接口并实现其 reset 方法，可以清除服务状态并执行为下一个请求做准备的其他操作。
</p>
<p>
    例如，在此演示的日志服务中，<span class="notranslate">Monolog</span> 日志器的状态将根据其内部实现的同名 <span class="notranslate">reset</span> 方法被重置：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/default.reset.base.php', false);  ?>

<p>
    为了使状态被重置，需要添加 <span class="notranslate">ResetInterface</span> 接口并实现 <span class="notranslate">reset</span> 方法。
</p>

<?= Paragraph::h2('RollbackInterface') ?>
<p>
    现代编程实践不推荐使用存储为类静态属性的状态，但它通常很方便，只有在过渡到异步模式时才需关心这一点。<br>
    为了方便这一转变，<span class="notranslate">HLEB2</span>框架提供了一个特殊的接口<span class="notranslate">RollbackInterface</span>，拥有一个静态方法<span class="notranslate">rollback</span>。
</p>
<p>
    例如，有一个存储的状态包含当前用户数据（简化代码）：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/default.state.base.php', false);  ?>

<p>
    为了重置状态，添加了接口<span class="notranslate">RollbackInterface</span>并实现了方法<span class="notranslate">rollback</span>：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/new.state.base.php', false);  ?>

<p>
    现在，在异步请求完成时，框架会检查类是否具有接口<span class="notranslate">RollbackInterface</span>并执行重置方法<span class="notranslate">rollback</span>。

    需要注意的是，用于重置状态的方法必须是幂等的，而且别无其他。也就是说，重复执行时，应用的结果不会改变。
</p>
<p>
    从下面这个更复杂的示例中可以看出幂等性的必要性，其中接口用于继承（重置方法可能被调用两次）：
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/parent.state.base.php', false);  ?>

<p class="hl-info-block">
    如果需要在完成异步请求后执行任何与特定类中的状态重置无关的操作，可以将其添加到<span class="notranslate">App\Bootstrap\ContainerFactory</span>类的<span class="notranslate">rollback</span>方法中。
</p>

<?php insertTemplate('/docs/zh/authors'); ?>

<?php insertTemplate('/docs/zh/footer'); ?>


<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Resetting State for Asynchronous Requests') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework provides the capability to perform asynchronous requests, which imposes additional requirements on the code.
    One of the main requirements is to eliminate stored state upon the request's completion.
</p>
<p class="hl-info-block">
    Under the term "asynchrony" this document groups together true asynchronous mode and the conventional <span class="notranslate">long-running</span> mode, since the recommendations for both are identical.
</p>
<p>
    Stored state can include current user data, request data cache, various forms of memoization, etc.
</p>
<p class="hl-info-block">
    In programming, <i>memoization</i> is an optimization method that makes already computed data reusable.
    The approach involves caching the output of a class method and forcing the method to check whether the required computation is already in the cache before computing it.
</p>
<p>
    It is necessary to determine which stored states relate to the request data and which pertain to the operation of the application as a whole.
    For example, a computed state for general tariff information won't change from request to request, but the selected tariff for each user needs to be reset. During asynchronous requests, the next request might belong to a different user, making it important to clear information about the previous one.
</p>

<?= Paragraph::h2('ResetInterface') ?>
<p>
    Using <span class="notranslate">ResetInterface</span> provides a modern way to reset the state of services in the framework container asynchronously. This applies only to services stored as singletons and allows you — by adding this interface and its reset method — to clear a service's state and perform other preparations intended for the next request.
</p>
<p>
    For example, in this demonstration logging service, the state of the <span class="notranslate">Monolog</span> logger will be reset according to its own internal implementation of the <span class="notranslate">reset</span> method:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/default.reset.base.php', false);  ?>

<p>
    To enable state reset, the <span class="notranslate">ResetInterface</span> interface is added and the <span class="notranslate">reset</span> method is implemented.
</p>

<?= Paragraph::h2('RollbackInterface') ?>
<p>
    Modern programming practices discourage the use of a state stored as a static class property, but it is often convenient, and concerns about it arise only when transitioning to asynchronous mode.<br>
    To facilitate this transition, the <span class="notranslate">HLEB2</span> framework provides a special interface <span class="notranslate">RollbackInterface</span> with a single static method <span class="notranslate">rollback</span>.
</p>
<p>
    For example, consider a stored state with current user data (simplified code):
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/default.state.base.php', false);  ?>

<p>
    To reset the state, the interface <span class="notranslate">RollbackInterface</span> is added, and the method <span class="notranslate">rollback</span> is implemented:
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/new.state.base.php', false);  ?>

<p>
    Now, upon the completion of an asynchronous request, the framework will check if the class has the <span class="notranslate">RollbackInterface</span> and execute the reset method <span class="notranslate">rollback</span>.
    It is important to ensure that the state-resetting method is idempotent and does nothing more. That is, upon repeated execution, the application of the result will not be different.
</p>
<p>
    The need for idempotency is evident from the following, more complex example, where the interface is applied in inheritance (the reset method could be invoked twice):
</p>

<?= Code::fromFile('@views/docs/code/extra/extended/async/interface/parent.state.base.php', false);  ?>

<p class="hl-info-block">
    If you need to execute any action after completing an asynchronous request that is not related to resetting the state in a specific class, you can add it to the <span class="notranslate">rollback</span> method of the <span class="notranslate">App\Bootstrap\ContainerFactory</span> class.
</p>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


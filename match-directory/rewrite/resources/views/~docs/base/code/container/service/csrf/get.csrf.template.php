<?php
/** @var \App\Bootstrap\ContainerInterface $container */
?>
<form action="/url">
    <!-- ... -->
    <input type="hidden" name="_token" value="<?= $container->csrf()->token(); ?>">
</form>


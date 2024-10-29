<?php

use Phphleb\Docs\Src\Link;

?>
<p class="hl-info-block">
    For the application to function correctly when launched using this technology, it must be developed with support for asynchronous mode.
</p>
<p>
    In asynchronous mode, the loaded framework configurations, classes, initialized services, and cached data are reused, which significantly accelerates performance.<br>
    However, there are distinctive features, such as the need to monitor memory leaks more closely and eliminate blocking operations, and many familiar third-party libraries do not support asynchronous mode.<br>
    Storing state in the logical parts of the application becomes undesirable, especially if it is related to a request.
</p>
<p class="hl-info-block">
    The framework's <span class="notranslate">RollbackInterface</span> is designed for <a href="<?= Link::url('docs.2.0.async.async.interface.page'); ?>">state resetting</a> after each asynchronous request.
</p>


<?php

use Phphleb\Docs\Src\Link;

?>
<p class="hl-info-block">
    为了确保使用此技术启动的应用程序正常运行，必须开发支持异步模式。
</p>
<p class="hl-info-block">
    在本文中，“异步”一词同时包含真正的异步模式和常见的<span class="notranslate">long-running</span>模式，因为针对两者的建议相同。
</p>
<p>
    在异步模式中，已加载的框架配置、类、初始化的服务和缓存的数据将被重用，从而显著加速性能。<br>
    但是，也存在一些特点，例如需要更加密切地监控内存泄漏并消除阻塞操作，许多熟悉的第三方库不支持异步模式。<br>
    在应用程序的逻辑部分存储状态变得不合适，尤其是当它与请求相关时。
</p>
<p class="hl-info-block">
    框架中的接口 <span class="notranslate">ResetInterface</span> 和 <span class="notranslate">RollbackInterface</span> 用于在每次异步请求后进行<a href="<?= Link::url('docs.2.0.async.async.interface.page'); ?>">状态重置</a>。
</p>

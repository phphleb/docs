<?php

use Hleb\Static\System;
use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Link;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Introduction') ?>

<p>
    <b><span class="notranslate">HLEB2</span></b> is the second version of the <span class="notranslate">HLEB</span> framework, completely revamped and improved.
</p>
<p>
    Supports <span class="notranslate">PHP</span> version 8.2 and above.
</p>
<p>
    The initial version 2.0.0 of the framework was released in February 2024.<br>
    The new version has introduced support for asynchronous execution, allowing the framework to be used with technologies such as <span class="notranslate">RoadRunner</span> and <span class="notranslate">Swoole</span>.<br>
    Significant focus has been placed on performance and maintainability, implementing compatibility with <span class="notranslate">PSR</span>, adding a service container along with <span class="notranslate">Dependency Injection</span>, and much more.
</p>

<p>
    It adheres to the recommendations of <span class="notranslate">PSR-1</span>, <span class="notranslate">PSR-2</span>, <span class="notranslate">PSR-3</span>, <span class="notranslate">PSR-4</span>, <span class="notranslate">PSR-7</span>, <span class="notranslate">PSR-11</span>, <span class="notranslate">PSR-12</span>, and <span class="notranslate">PSR-16</span> without mandatory implementation in development.
</p>


<p>
    If you want to study the framework using an AI model, a unified <a href="/en/2/0/process-me">text version</a> of this guide in <span class="notranslate">Markdown</span> format might be useful to you.
</p>


<?= Paragraph::h2('Purpose') ?>

<p>
    This framework can serve as a foundation for small projects, such as: a separate admin panel, microservice, chatbot, experimental pet project, console processor; as well as medium-sized websites, and can also lay the groundwork for developing your own framework with extended capabilities. In the latter case, it can also be used for large enterprise websites.
</p>
<p>
    <span class="hl-select-block">
        <span class="notranslate">HLEB2</span> is positioned as a simple and fast framework that efficiently performs its job.
    </span>
</p>
<p>
    A key feature of the <span class="notranslate">HLEB</span> framework (and also HLEB2) is a complete abandonment of third-party libraries in the basic setup; at the same time, there is the possibility to integrate third-party libraries if necessary.<br>
    Thus, further actions are not predetermined by dependencies, ensuring necessary flexibility.
</p>
<p>
    To use the framework, at minimum, one must have basic programming knowledge of the PHP language.
</p>
<p>
    The framework is a multi-purpose tool, and every tool can be used for unintended purposes, so it is assumed that the application developer understands what they are doing and can choose the appropriate approach for their specific project.
</p>
<p>
    The framework's code is thoroughly tested with unit tests.
</p>


<?= Paragraph::h2('Projects Based on the Framework') ?>

<p>
    Among the applications known to the author based on HLEB2 is the discussion (and Q&A) engine LibArea.
    Project on GitHub: <a href="https://github.com/LibArea/libarea">github.com/LibArea/libarea</a><br>
    It is assumed that projects based on LibArea also operate on the HLEB2 framework.
</p>

<?= Paragraph::h2('How to Use the Documentation') ?>

<p>
    The detailed guide to the framework consists of various sections.
    Some of the information is accompanied by code examples, such as (routing declaration):
</p>

<?= Code::fromFile('@views/docs/code/test.php', false); ?>

<p>
    The list of documentation sections is located in the site's menu.<br>
    For beginners, it's recommended to start exploring the framework with topics on installation, routing, and configuration editing.
</p>

<p class="hl-info-block">
    Information that requires special attention will be highlighted in such a block.
</p>

<p class="hl-danger-block">
    A warning that should not be ignored will be highlighted in this kind of block.
</p>

<?= Paragraph::h2('Local Installation of Documentation') ?>

<p>
    This documentation can be <a href="https://github.com/phphleb/docs/" target="_blank">installed</a> and used offline.
    The code is located in an open repository, and after local installation, you simply need to keep track of updates.
</p>

<?= Link::nextPage('docs.2.0.installation.page', 'Framework Installation'); ?><br><br>


<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


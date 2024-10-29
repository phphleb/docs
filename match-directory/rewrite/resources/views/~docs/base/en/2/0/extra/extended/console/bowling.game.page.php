<?php

use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Console Bowling Game') ?>

<p>
    The <span class="notranslate">HLEB2</span> framework includes a small console bowling game.
    At the moment, it's a single-player game with score counting, levels, and strikes according to the real bowling game rules.
    The game is launched with a command like:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>php console flat-kegling-feature 8 1 50</p>

<p>
    The numerical parameters of the command correspond to the ball throwing force (1-10), target pin number (1-10), and accuracy coefficient of hitting within the target pin (1-49 to the left and 51-100 to the right side).
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>


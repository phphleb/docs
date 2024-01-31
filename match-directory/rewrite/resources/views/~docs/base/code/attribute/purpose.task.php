<?php

namespace App\Commands\Demo;

use Hleb\Base\Task;
use Hleb\Constructor\Attributes\Task\Purpose;

#[Purpose(status:Purpose::CONSOLE)]
class ExampleTask extends Task {
    // ... //
}

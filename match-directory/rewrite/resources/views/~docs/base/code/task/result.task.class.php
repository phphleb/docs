<?php
use App\Commands\Demo\ExampleTask;
use Hleb\Static\Command;

$task = new ExampleTask();
Command::execute($task, ['speed', 'quality']);
echo $task->getResult();
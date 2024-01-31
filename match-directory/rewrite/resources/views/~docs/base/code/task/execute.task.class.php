<?php
use App\Commands\Demo\ExampleTask;
use Hleb\Static\Command;

Command::execute(new ExampleTask(), ['speed ', 'quality']);
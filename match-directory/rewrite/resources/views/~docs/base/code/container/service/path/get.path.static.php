<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\PathInterface;
$path = Container::get(PathInterface::class)->getReal('@storage/public/files');

// variant 2
use Hleb\Static\Path;
$path = Path::getReal('@storage/public/files');

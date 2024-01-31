<?php
// variant 1
use Hleb\Reference\PathInterface;
$path = $this->container->get(PathInterface::class)->getReal('@storage/public/files');

// variant 2
$path = $this->container->path()->getReal('@storage/public/files');

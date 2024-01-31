<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\ConverterInterface;
$logger = Container::get(ConverterInterface::class)->toPsr3Logger();

// variant 2
use Hleb\Static\Converter;
$logger = Converter::toPsr3Logger();

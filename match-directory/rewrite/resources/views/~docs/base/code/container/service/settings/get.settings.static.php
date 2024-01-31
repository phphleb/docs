<?php
// variant 1
use Hleb\Static\Container;
use Hleb\Reference\SettingInterface;
$timezone = Container::get(SettingInterface::class)->getParam('common', 'timezone');

// variant 2
use Hleb\Static\Settings;
$timezone = Settings::getParam('common', 'timezone');

// variant 3
$timezone = config('common', 'timezone');
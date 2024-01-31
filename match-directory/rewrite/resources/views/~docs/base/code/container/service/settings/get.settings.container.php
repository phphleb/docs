<?php
// variant 1
use Hleb\Reference\SettingInterface;
$timezone = $this->container->get(SettingInterface::class)->getParam('common', 'timezone');

// variant 2
$timezone = $this->container->settings()->getParam('common', 'timezone');

// variant 3
$timezone = $this->settings()->getParam('common', 'timezone');

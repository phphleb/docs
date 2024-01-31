<?php
// variant 1
use Hleb\Reference\RedirectInterface;
$this->container->get(RedirectInterface::class)->to('/internal/url/', status: 307);

// variant 2
$this->container->redirect()->to('/internal/url/', status: 307);

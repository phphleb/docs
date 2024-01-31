<?php
// File /resources/views/content.php

/**
 * @var $title string
 * @var $total int
 * @var $unique int
 */
echo "<h1>$title</h1>";

insertTemplate('templates/counter', ['totalVisitors' => $total, 'uniqueVisitors' => $unique]);

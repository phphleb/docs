<?php
use Hleb\Static\Path;

$dir = Path::get('@/non-existent/dir');

$file = Path::get('@/non-existent/file.txt');

$file = hl_path('@/non-existent/file.txt');

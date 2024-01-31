<?php
// Will output to the log.
logger()->info('Info message');

try {
    throw new ErrorException('Warning message');
} catch(\ErrorException $e) {
    // Will output an error to the log and continue execution.
    logger()->warning($e);
}
// Will output an error to the log and interrupt execution.
throw new ErrorException('Error message');


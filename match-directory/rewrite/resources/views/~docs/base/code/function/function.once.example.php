<?php

$value = once(function () {
    // An example of a resource-intensive operation.
    return ExampleStorage::getData();
});

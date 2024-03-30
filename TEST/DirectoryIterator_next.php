<?php
$iterator = new DirectoryIterator(dirname(__FILE__));
var_dump($iterator);
while ($iterator->valid()) {
    $iterator->next();
}

foreach ($iterator as $entry) {
    var_dump($entry);
    $iterator->next();
}
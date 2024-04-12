<?php
// $iterator = new DirectoryIterator(dirname(__FILE__));
// var_dump($iterator);
// while ($iterator->valid()) {
//     $iterator->next();
// }

// foreach ($iterator as $entry) {
//     var_dump($entry);
//     $iterator->next();
// }

$fileInfo = new SplFileInfo(dirname(__FILE__) . '\DirectoryIterator_next.php');

if ($fileInfo->isFile()) {
    $inode = $fileInfo->getInode();
    echo "File Inode: $inode\n";
} else {
    echo "The specified path is not a file.\n";
}

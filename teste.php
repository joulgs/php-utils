<?php
require __DIR__.'/vendor/autoload.php';

use JGS\Utils\FiscalDocuments;

$fd = new FiscalDocuments('274763478');

print_r($fd->getType()."\n");

if($fd->isInvalid())
{
    echo "Invalid CNP\n";
} else {
    echo "Valid CNP\n";
}

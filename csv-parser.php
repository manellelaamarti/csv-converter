<?php
require_once __DIR__ . '/vendor/autoload.php';

if(isset($argv[1])) {
    $path = $argv[1];
} else {
    $path = null;
}

if($path == null) {
    echo "Vous devez fournir un chemin vers le fichier csv \n";
    exit();
}

if(!file_exists($path)) {
    echo "Le chemin est invalide \n";
    exit();
}

$file = fopen($path, "r");

$parser = new \CsvBundle\CsvBundle();

if(($headerRow = fgets($file)) !== false)
    $parser->formatHeaders($headerRow);

while(($row = fgets($file)) !== false) {
    $parser->parseRow($row);
}

$parser->displayTable();

?>
<?php
require_once __DIR__ . '/vendor/autoload.php';

if(isset($argv[1])) { // verification de l'existence d'un argument contenant le chemin vers le csv
    $path = $argv[1];
} else {
    $path = null;
}

if($path == null) {
    echo "Vous devez fournir un chemin vers le fichier csv \n"; // verification
    exit();
}

if(!file_exists($path)) {
    echo "Le chemin est invalide \n"; // verification
    exit();
}

$file = fopen($path, "r"); // ouvre le fichier en lecture ("r" pour read)

$parser = new \CsvBundle\CsvBundle(); // instanciation d'un objet de type CsvBundle afin d'acceder aux méthodes

if(($headerRow = fgets($file)) !== false) // verifie que la premiere ligne du csv ne soit pas vide 
    $parser->formatHeaders($headerRow);

while(($row = fgets($file)) !== false) { // boucle sur toutes les autres lignes du csv tant qu'elles existent
    $parser->parseRow($row);
}

$parser->displayTable(); // affichage du tableau 

?>
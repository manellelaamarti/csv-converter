<?php
namespace CsvBundle;

use LucidFrame\Console\ConsoleTable;

class CsvBundle
{
    private $table;

    function __construct() {
        $this->table = new ConsoleTable(); // j'utilise une librairie afin d'obtenir un tableau plus visuel
    }

    public function formatHeaders($headersRow) {
        $headers = explode(";", $headersRow); // ; va me servir à délimiter chaque string afin d'obtenir un tableau avec chaque colonne depuis une string

        foreach($headers as $key => &$header) {
            if($header == "currency") {
                array_splice($headers, $key, 1); // retire la row currency
            } else {
                if($header == "is_enabled")
                    $header = "Status"; // renomme is_enabled par "Status"

                // formattage du header
                $header = ucfirst($header); // Première lettre en majuscule
                $header = str_replace("_", " ", $header); // On remplace les underscore par un espace
            }            
        }

        $this->table->setHeaders($headers);
    }

    public function parseRow($row) { 
        $columns = explode(";", $row);
        
        foreach($columns as $index => &$column) {
            if($column == "$" || $column == "€") { 
                // contanénation de la colonne contenant le prix + le symbole de la colonne d'après + retrait de la colonne contenant le symbole
                $columns[$index - 1] = $columns[$index - 1] . $columns[$index];
                array_splice($columns, $index, 1);
                continue;
            } else if($column == "1") {
                $column = "Enable";
            } else if($column == "0") {
                $column = "Disable";
            } else if($index == 1) {
                $column = str_replace(" ", "_", $column); // Suppression des espaces
                $column = preg_replace('/[^A-Za-z0-9\-]/', '-', $column); // Suppression des caractères spéciaux
                $column = strtolower($column); // Transformation en minuscule
            }
                
        }

        $this->table->addRow($columns);
    }

    public function displayTable() {
        $this->table->display();
    }

}
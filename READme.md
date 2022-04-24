# Mon convertisseur de fichier CSV

Ce projet va permettre de convertir un fichier CSV en tableau.

## Installation

```
git clone https://github.com/manellelaamarti/csv-converter.git
cd csv-bundle
composer install
```

## Utiliser le convertisseur

Ligne de commande:

```
> php csv-parser.php test.csv
```

## Fichier à lire : *csv-parser.php* -> execute le code de lecture et de mise en forme + de code de CsvBundle (formatage des données).
## Fichier à lire : *test.csv* -> fichier de test.

```
sku;title;is_enabled;price;currency;description;created_at
628937273;Cornelia, the dark unicorn;1;14.87;€;Cornelia, \rThe Dark Unicorn.;2018-12-12 10:34:39
722821313;Be my bestie;0;18.80;€;Be <br/>my bestie, darling sweet.;2018-12-12 10:34:39
```

## Résultat de la ligne de commande 

```
+-----------+----------------------------+---------+--------+-----------------------------------+----------------------+
| Sku       | Title                      | Status  | Price  | Description                       | Created at           |
+-----------+----------------------------+---------+--------+-----------------------------------+----------------------+
| 628937273 | cornelia--the-dark-unicorn | Enable  | 14.87€ | Cornelia, \rThe Dark Unicorn.     | 2018-12-12 10:34:39  |
| 722821313 | be-my-bestie               | Disable | 18.80€ | Be <br/>my bestie, darling sweet. | 2018-12-12 10:34:39  |
+-----------+----------------------------+---------+--------+-----------------------------------+----------------------+
```
# CsvBundle.php

## Méthodes importantes :

## formatHeaders() - parseRows()

```
Méthodes me permettant de définir chaque entête de mon tableau ainsi que chaque colonne,
Dans celles-ci je m'occupe de leur formatage par rapport aux consignes données
(voir commentaires dans le code)
```





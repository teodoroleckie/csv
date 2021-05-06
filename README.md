# PHP csv reader and writer.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tleckie/csv?style=flat-square)](https://packagist.org/packages/tleckie/csv)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/teodoroleckie/csv/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/teodoroleckie/csv/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/teodoroleckie/csv/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://scrutinizer-ci.com/g/teodoroleckie/csv/badges/build.png?b=main)](https://scrutinizer-ci.com/g/teodoroleckie/csv/build-status/main)

## Installation

You can install the package via composer:

```bash
composer require tleckie/csv
```

## Usage


### Reader:
```php
<?php

include_once "vendor/autoload.php";

use Tleckie\Csv\Csv;

$csv = new Csv('file.csv');

$reader = $csv->reader();
foreach($reader as $position => $row){
    
    foreach($row as $index => $value){
        // ...
    }
    
    // byIndex
    $row->byIndex(0);
    // hasIndex
    $row->hasIndex(0);
    // new instance with reversed data  
    $row->reverse();
    // array
    $row->toArray();
    // preserve keys
    $row->removeByIndex(1);
    // removeFirst and preserve keys
    $row->removeFirst();
    // removeLast
    $row->removeLast();
    // countable count($row) or $row->count()
    $row->count(); count($row);
} 
```

#### Explicit reader

```php

use Tleckie\Csv\Reader;

$csv = new Reader('file.csv', ',', '|');
```

### Writer


```php

use Tleckie\Csv\Csv;
use Tleckie\Csv\Row;

$csv = new Csv('file.csv', ',', '"');

$writer = $csv->writer();

$writer->writeLine([1,2,3,4,5,"Test comma, separated"]);
$writer->writeLine(new Row([1,2,3,4,5,"Test comma, separated"]));

```

#### Explicit writer

```php

use Tleckie\Csv\Writer;
use Tleckie\Csv\Row;

$writer = new Writer('file.csv', ',', '|','\\', 'w');

$writer->writeLine([1,2,3,4,5,"Test comma, separated"]);
$writer->writeLine(new Row([1,2,3,4,5,"Test comma, separated"]));

```

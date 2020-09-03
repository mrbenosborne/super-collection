<?php

include 'vendor/autoload.php';

use SuperCollection\Collection;

// Create a new collection from CSV file
$collection = Collection::fromCSVFile(__DIR__ . '/data.csv');

// Dump the collection
dd($collection->all());
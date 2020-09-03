# Super Collection
Enhances the Collection class provided by Laravel.

# Install

```
composer require mrbenosborne/super-collection
```

# Methods

## CSV File
Create a Collection from a CSV file.

```php
<?php

include 'vendor/autoload.php';

use SuperCollection\Collection;

// Create a new collection from CSV file
$collection = Collection::fromCSVFile(__DIR__ . '/data.csv');

// Dump the collection
dd($collection->all());
``` 
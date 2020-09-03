<?php

namespace SuperCollection;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class Collection
 * @package SuperCollection
 */
class Collection extends \Illuminate\Support\Collection
{

    /**
     * @param string $path
     * @param bool $withHeaders
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     * @return \Illuminate\Support\Collection
     * @throws FileNotFoundException
     */
    public static function fromCSVFile(
        string $path,
        bool $withHeaders = false,
        string $delimiter = ',',
        string $enclosure = '"',
        string $escape = '\\'
    ): \Illuminate\Support\Collection {
        if (!file_exists($path)) {
            throw new FileNotFoundException(sprintf('file not found: %s', $path));
        }

        $file = fopen($path, "r");
        $headers = [];
        if ($withHeaders) {
            $headers = fgetcsv($file);
        }

        $items = [];
        while (($data = fgetcsv($file, 0, $delimiter, $enclosure, $escape)) !== false) {
            $item = [];
            for ($key = 0; $key < count($data); $key++) {
                $item[$headers[$key] ?? $key] = $data[$key];
            }
            $items[] = $item;
        }
        return Collection::make($items);
    }

}
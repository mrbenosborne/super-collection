<?php

use PHPUnit\Framework\TestCase;
use SuperCollection\Collection;

/**
 * Class SuperCollectionTest
 */
class SuperCollectionTest extends TestCase
{

    /**
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function testWithHeaders(): void
    {
        $collection = Collection::fromCSVFile('./data/with-headers.csv', true);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $collection);
        $this->assertEquals(1, $collection->count());
        $this->assertEquals([
            'code' => 'LGW',
            'name' => 'London Gatwick',
        ], $collection->first());
    }

    /**
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function testWithoutHeaders(): void
    {
        $collection = Collection::fromCSVFile('./data/without-headers.csv', false);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $collection);
        $this->assertEquals(1, $collection->count());
        $this->assertEquals([
            0 => 'LGW',
            1 => 'London Gatwick',
        ], $collection->first());
    }

}
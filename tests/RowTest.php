<?php

namespace Tleckie\Csv\Test;

use PHPUnit\Framework\TestCase;
use Tleckie\Csv\Row;

/**
 * Class RowTest
 *
 * @package Tleckie\Csv\Test
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class RowTest extends TestCase
{
    /**
     * @test
     */
    public function rewind(): void
    {
        $row = new Row([0, 1, 2, 3]);
        static::assertTrue($row->next());
        $counter = 0;
        foreach ($row as $i => $value) {
            static::assertEquals($i, $value);
            $counter++;
        }
        static::assertEquals(4, $counter);
    }

    /**
     * @test
     */
    public function reverse(): void
    {
        $row = (new Row([0, 1, 2, 3]))->reverse();
        $counter = 4;
        foreach ($row as $i => $value) {
            static::assertEquals(--$counter, $value);
        }
        static::assertEquals(0, $counter);
    }

    /**
     * @test
     */
    public function hasIndex(): void
    {
        $row = (new Row([0, 1, 2, 3]))->reverse();

        static::assertTrue($row->hasIndex(0));
        static::assertTrue($row->hasIndex(3));
        static::assertFalse($row->hasIndex(4));
        static::assertFalse($row->hasIndex(-1));
    }

    /**
     * @test
     */
    public function removeByIndex(): void
    {
        $row = new Row([0, 1, 2, 3]);

        static::assertTrue($row->hasIndex(0));

        $row = $row->removeByIndex(0);

        static::assertFalse($row->hasIndex(0));
        static::assertEquals(null, $row->byIndex(9));
        static::assertTrue($row->hasIndex(3));
    }

    /**
     * @test
     */
    public function removeFirst(): void
    {
        $row = new Row([0, 1, 2, 3]);

        static::assertTrue($row->hasIndex(0));

        static::assertEquals(4, count($row));

        $row = $row->removeFirst();

        static::assertEquals(3, count($row));

        static::assertFalse($row->hasIndex(0));

        static::assertTrue($row->hasIndex(3));
    }

    /**
     * @test
     */
    public function removeLast(): void
    {
        $row = new Row([0, 1, 2, 3]);

        static::assertTrue($row->hasIndex(0));

        static::assertEquals(4, count($row));

        $row = $row->removeLast();

        static::assertEquals(3, count($row));

        static::assertFalse($row->hasIndex(3));
    }
}

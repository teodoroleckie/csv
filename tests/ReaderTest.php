<?php

namespace Tleckie\Csv\Test;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Tleckie\Csv\Reader;
use Tleckie\Csv\Row;

/**
 * Class ReaderTest
 *
 * @package Tleckie\Csv\Test
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class ReaderTest extends TestCase
{
    /**
     * @test
     */
    public function each(): void
    {
        $structure = $structure = [
            'file.csv' => "first1,first2,first3\nsecond1,second2,second3\nthird1,third2,third3\n\n\n"
        ];
        $root = vfsStream::setup('root', null, $structure);

        $reader = new Reader($root->url() . '/file.csv', ',', '|');

        $fields = ['first%s', 'second%s', 'third%s'];
        $counter = 0;
        foreach ($reader as $index => $row) {
            foreach ($row as $key => $value) {
                ++$counter;
                static::assertEquals(sprintf($fields[$index], $key + 1), $row->byIndex($key));
            }
        }
        static::assertEquals(9, $counter);
    }
}

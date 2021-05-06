<?php

namespace Tleckie\Csv\Test;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Tleckie\Csv\Csv;
use Tleckie\Csv\Reader;
use Tleckie\Csv\Row;
use Tleckie\Csv\RowInterface;
use Tleckie\Csv\Writer;

/**
 * Class CsvTest
 *
 * @package Tleckie\Csv\Test
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class CsvTest extends TestCase
{
    /**
     * @test
     */
    public function reader(): void
    {
        $structure = $structure = [
            'file.csv' => "first1,first2,first3\nsecond1,second2,second3\nnone1,none2,none3\n\n\n"
        ];
        $root = vfsStream::setup('root', null, $structure);

        $reader = (new Csv($root->url() . '/file.csv', ',', '|'))->reader('r');

        $fields = ['first%s', 'second%s', 'none%s'];
        $counter = 0;
        foreach ($reader as $index => $row) {
            foreach ($row as $key => $value) {
                ++$counter;
                static::assertEquals(sprintf($fields[$index], $key + 1), $row->byIndex($key));
            }
        }
        static::assertEquals(9, $counter);
    }

    /**
     * @test
     * @dataProvider dataProvider
     * @param array|RowInterface $input
     * @param                    $expected
     */
    public function writer(array|RowInterface $input, $expected): void
    {
        $root = vfsStream::setup('root');

        $writer = (new Csv($root->url() . '/file.csv', ',', '|'))->writer('w');

        $writer->writeLine($input);

        static::assertEquals($expected, file_get_contents($root->url() . '/file.csv'));
    }
    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [[1, 2, 3], "1,2,3\n"],
            [["test value", 2, 3], "|test value|,2,3\n"],
            [new Row([1, 2, 3]), "1,2,3\n"],
            [new Row(["test value", 2, 3]), "|test value|,2,3\n"],
            [new Row([1, 2, 3]), "1,2,3\n"],
            [new Row(["test value", 2, 3]), "|test value|,2,3\n"],
        ];
    }
}

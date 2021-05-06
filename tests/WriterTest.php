<?php

namespace Tleckie\Csv\Test;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Tleckie\Csv\Row;
use Tleckie\Csv\RowInterface;
use Tleckie\Csv\Writer;

/**
 * Class WriterTest
 *
 * @package Tleckie\Csv\Test
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class WriterTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     * @param array|RowInterface $input
     * @param                    $expected
     */
    public function writeLine(array|RowInterface $input, $expected): void
    {
        $root = vfsStream::setup('root');

        $writer = new Writer($root->url() . '/file.csv', ',', '|');

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

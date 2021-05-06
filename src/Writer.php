<?php

namespace Tleckie\Csv;

use Tleckie\Csv\Writer\WriterInterface;

/**
 * Class Writer
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Writer extends CsvAbstract implements WriterInterface
{
    /**
     * Writer constructor.
     *
     * @param string $file
     * @param string $separator
     * @param string $enclosure
     * @param string $escape
     * @param string $mode
     */
    public function __construct(
        string $file,
        string $separator = ',',
        string $enclosure = '"',
        string $escape = "\\",
        string $mode = "a+"
    ) {
        parent::__construct($file, $separator, $enclosure, $escape, $mode);
    }

    /**
     * @inheritdoc
     */
    public function writeLine(RowInterface|array $row): bool
    {
        return $this->fputcsv(
            $row instanceof Row ? $row->toArray() : $row
        );
    }
}

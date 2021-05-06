<?php

namespace Tleckie\Csv;

use Tleckie\Csv\Reader\ReaderInterface;
use Tleckie\Csv\Writer\WriterInterface;

/**
 * Interface CsvInterface
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
interface CsvInterface
{
    /**
     * @param string $mode
     * @return WriterInterface
     */
    public function writer(string $mode = 'a+'): WriterInterface;

    /**
     * @param string $mode
     * @return ReaderInterface
     */
    public function reader(string $mode = 'r'): ReaderInterface;
}

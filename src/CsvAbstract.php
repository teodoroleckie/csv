<?php

namespace Tleckie\Csv;

use SplFileObject;

/**
 * Class CsvAbstract
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
abstract class CsvAbstract extends SplFileObject
{
    /**
     * CsvAbstract constructor.
     *
     * @param string $file
     * @param string $separator
     * @param string $enclosure
     * @param string $escape
     * @param string $mode
     */
    public function __construct(
        string $file,
        string $separator,
        string $enclosure,
        string $escape,
        string $mode
    ) {
        parent::__construct($file, $mode);
        $this->setCsvControl($separator, $enclosure, $escape);
    }
}

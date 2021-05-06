<?php

namespace Tleckie\Csv;

use Tleckie\Csv\Reader\ReaderInterface;
use Tleckie\Csv\Writer\WriterInterface;

/**
 * Class Csv
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Csv implements CsvInterface
{
    /** @var string */
    protected string $file;

    /** @var string */
    protected string $separator;

    /** @var string */
    protected string $enclosure;

    /** @var string */
    protected string $escape;

    /**
     * Reader constructor.
     *
     * @param string $file
     * @param string $separator
     * @param string $enclosure
     * @param string $escape
     */
    public function __construct(
        string $file,
        string $separator = ',',
        string $enclosure = '"',
        string $escape = "\\",
    ) {
        $this->file = $file;
        $this->separator = $separator;
        $this->enclosure = $enclosure;
        $this->escape = $escape;
    }

    /**
     * @inheritdoc
     */
    public function writer(string $mode = 'a+'): WriterInterface
    {
        return new Writer(
            $this->file,
            $this->separator,
            $this->enclosure,
            $this->escape,
            $mode
        );
    }

    /**
     * @inheritdoc
     */
    public function reader(string $mode = 'r'): ReaderInterface
    {
        return new Reader(
            $this->file,
            $this->separator,
            $this->enclosure,
            $this->escape,
            $mode
        );
    }
}

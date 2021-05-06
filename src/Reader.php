<?php

namespace Tleckie\Csv;

use SplFileObject;
use Tleckie\Csv\Reader\ReaderInterface;

/**
 * Class Reader
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Reader extends CsvAbstract implements ReaderInterface
{
    /**
     * Reader constructor.
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
        string $mode = "r"
    ) {
        parent::__construct($file, $separator, $enclosure, $escape, $mode);

        $this->setFlags(
            SplFileObject::READ_CSV |
            SplFileObject::READ_AHEAD |
            SplFileObject::SKIP_EMPTY |
            SplFileObject::DROP_NEW_LINE
        );
    }

    /**
     * @return RowInterface
     */
    public function current(): RowInterface
    {
        return new Row(parent::current());
    }
}

<?php

namespace Tleckie\Csv\Writer;

use Tleckie\Csv\RowInterface;

/**
 * Interface WriterInterface
 *
 * @package Tleckie\Csv\Writer
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
interface WriterInterface
{
    /**
     * @param RowInterface|array $row
     * @return bool
     */
    public function writeLine(RowInterface|array $row): bool;
}

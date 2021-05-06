<?php

namespace Tleckie\Csv;

use Countable;
use Iterator;

/**
 * Interface RowInterface
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
interface RowInterface extends Iterator, Countable
{
    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return RowInterface
     */
    public function reverse(): RowInterface;

    /**
     * @param mixed $index
     * @return mixed
     */
    public function byIndex(mixed $index): mixed;

    /**
     * @param mixed $index
     * @return bool
     */
    public function hasIndex(mixed $index): bool;

    /**
     * @param mixed $index
     * @return RowInterface
     */
    public function removeByIndex(mixed $index): RowInterface;

    /**
     * @return RowInterface
     */
    public function removeFirst(): RowInterface;

    /**
     * @return RowInterface
     */
    public function removeLast(): RowInterface;
}

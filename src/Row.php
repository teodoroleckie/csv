<?php

namespace Tleckie\Csv;

use function current;
use function key;
use function next;
use function reset;

/**
 * Class Row
 *
 * @package Tleckie\Csv
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Row implements RowInterface
{
    /** @var array */
    private array $data;

    /**
     * Row constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function rewind(): void
    {
        reset($this->data);
    }

    /**
     * @inheritdoc
     */
    public function current(): string
    {
        return current($this->data);
    }

    /**
     * @inheritdoc
     */
    public function key(): int
    {
        return key($this->data);
    }

    /**
     * @inheritdoc
     */
    public function next(): bool
    {
        return next($this->data);
    }

    /**
     * @inheritdoc
     */
    public function valid(): bool
    {
        return key($this->data) !== null;
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function reverse(): RowInterface
    {
        return new Row(array_reverse($this->data));
    }

    /**
     * @inheritdoc
     */
    public function byIndex(mixed $index): mixed
    {
        return $this->data[$index] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function hasIndex(mixed $index): bool
    {
        return isset($this->data[$index]);
    }

    /**
     * @inheritdoc
     */
    public function removeByIndex(mixed $index): RowInterface
    {
        $data = $this->data;

        unset($data[$index]);

        return new Row($data);
    }

    /**
     * @inheritdoc
     */
    public function removeFirst(): RowInterface
    {
        $data = array_slice($this->data, 1, null, true);

        return new Row($data);
    }

    /**
     * @inheritdoc
     */
    public function removeLast(): RowInterface
    {
        $data = $this->data;

        array_pop($data);

        return new Row($data);
    }

    /**
     * @inheritdoc
     */
    public function count(): int
    {
        return count($this->data);
    }
}

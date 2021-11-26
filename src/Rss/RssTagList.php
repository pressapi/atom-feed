<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

/**
 * @template T of RssTag
 */
class RssTagList implements RssTag
{
    /** @var array<T> */
    private array $items;

    /**
     * @param array<T> $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function __toString(): string
    {
        return trim(join("\n", $this->items));
    }
}

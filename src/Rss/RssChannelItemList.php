<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

class RssChannelItemList implements RssTag
{
    /** @var array<RssChannelItem> */
    private array $items;

    public function __construct(RssChannelItem ...$items)
    {
        $this->items = $items;
    }

    public function __toString(): string
    {
        return trim(join("\n", $this->items));
    }
}

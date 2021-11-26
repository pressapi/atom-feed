<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

use PressApi\Feed\RssTag;
use PressApi\Feed\RssTagList;

class RssChannel implements RssTag
{
    private string $title;
    private string $link;

    /** @var RssTagList<RssItem> */
    private RssTagList $items;

    /**
     * @param RssTagList<RssItem> $items
     */
    public function __construct(string $title, string $link, RssTagList $items)
    {
        $this->title = $title;
        $this->link = $link;
        $this->items = $items;
    }

    public function __toString(): string
    {
        return <<<XML
        <channel>
          <title>{$this->title}</title>
          <link>{$this->link}</link>
          {$this->items}
        </channel>
        XML;
    }
}

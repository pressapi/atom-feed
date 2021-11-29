<?php

declare(strict_types=1);

namespace PressApi\Feed\Atom;

use DateTimeImmutable;
use PressApi\Feed\RssCategory;
use PressApi\Feed\RssTag;
use PressApi\Feed\RssTagList;

class AtomItem implements RssTag
{
    private string $title;
    private string $link;
    private string $description;
    private string $image;
    private string $guid;
    private DateTimeImmutable $pubDate;
    private string $author;

    /** @var RssTagList<RssCategory> */
    private RssTagList $categories;

    /**
     * @param RssTagList<RssCategory> $categories
     */
    public function __construct(
        string $title,
        string $link,
        string $description,
        string $image,
        string $guid,
        DateTimeImmutable $pubDate,
        string $author,
        RssTagList $categories,
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->image = $image;
        $this->guid = $guid;
        $this->pubDate = $pubDate;
        $this->author = $author;
        $this->categories = $categories;
    }

    public function __toString(): string
    {
        return <<<XML
        <item>
          <title><![CDATA[{$this->title}]]></title>
          <link>{$this->link}</link>
          <description><![CDATA[{$this->description}]]></description>
          <media:thumbnail xmlns:media="https://search.yahoo.com/mrss/" url="{$this->image}"/>
          <guid>{$this->guid}</guid>
          <pubDate>{$this->pubDate->format('r')}</pubDate>
          <author>{$this->author}</author>
          {$this->categories}
        </item>
        XML;
    }
}

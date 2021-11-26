<?php

declare(strict_types=1);

namespace PressApi\Feed\Atom;

use DateTimeImmutable;
use PressApi\Feed\RssTag;
use PressApi\Feed\RssTagList;

class AtomChannelItem implements RssTag
{
    private string $title;
    private string $link;
    private string $description;
    private string $content;
    private string $guid;
    private DateTimeImmutable $pubDate;
    private string $author;

    /** @var RssTagList<AtomChannelItemCategory> */
    private RssTagList $categories;

    /**
     * @param RssTagList<AtomChannelItemCategory> $categories
     */
    public function __construct(
        string $title,
        string $link,
        string $description,
        string $content,
        string $guid,
        DateTimeImmutable $pubDate,
        string $author,
        RssTagList $categories,
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->content = $content;
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
          <content:encoded><![CDATA[{$this->content}]]></content:encoded>
          <guid>{$this->guid}</guid>
          <pubDate>{$this->pubDate->format('r')}</pubDate>
          <author>{$this->author}</author>
          {$this->categories}
        </item>
        XML;
    }
}

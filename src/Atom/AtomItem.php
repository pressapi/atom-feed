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
    private string $content;
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
        string $content,
        string $image,
        string $guid,
        DateTimeImmutable $pubDate,
        string $author,
        RssTagList $categories,
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->content = $content;
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
          <content:encoded xmlns:content="https://purl.org/rss/1.0/modules/content/">
            <![CDATA[<p><img src="{$this->image}"/></p>{$this->content}]]>
          </content:encoded>
          <guid>{$this->guid}</guid>
          <pubDate>{$this->pubDate->format('r')}</pubDate>
          <author>{$this->author}</author>
          {$this->categories}
        </item>
        XML;
    }
}

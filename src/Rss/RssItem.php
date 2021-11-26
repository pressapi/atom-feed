<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

use DateTimeImmutable as Date;
use PressApi\Feed\RssCategory;
use PressApi\Feed\RssTag;
use PressApi\Feed\RssTagList;

class RssItem implements RssTag
{
    private string $enclosure;
    private string $title;
    private string $content;
    private string $description;
    private Date $pubDate;
    private string $author;
    private string $link;

    /** @var RssTagList<RssCategory> */
    private RssTagList $categories;

    /**
     * @param RssTagList<RssCategory> $categories
     */
    public function __construct(
        string $enclosure,
        string $title,
        string $description,
        string $content,
        Date $pubDate,
        string $author,
        string $link,
        RssTagList $categories,
    ) {
        $this->enclosure = $enclosure;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->pubDate = $pubDate;
        $this->author = $author;
        $this->link = $link;
        $this->categories = $categories;
    }

    public function __toString(): string
    {
        return <<<XML
        <item>
          <enclosure url="{$this->enclosure}" type="image/jpeg"/>
          <title>{$this->title}</title>
          <description>{$this->description}</description>
          <content><![CDATA[{$this->content}]]></content>
          <pubDate>{$this->pubDate->format('Y-m-d H:i:s')}</pubDate>
          <author>{$this->author}</author>
          <link>{$this->link}</link>
          {$this->categories}
        </item>
        XML;
    }
}

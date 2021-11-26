<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

use DateTimeImmutable as Date;
use PressApi\Feed\RssTag;

class RssItem implements RssTag
{
    private string $enclosure;
    private string $title;
    private Date $pubDate;
    private string $author;
    private string $link;

    public function __construct(string $enclosure, string $title, Date $pubDate, string $author, string $link)
    {
        $this->enclosure = $enclosure;
        $this->title = $title;
        $this->pubDate = $pubDate;
        $this->author = $author;
        $this->link = $link;
    }

    public function __toString(): string
    {
        return <<<XML
        <item>
          <enclosure url="{$this->enclosure}" type="image/jpeg"/>
          <title>{$this->title}</title>
          <pubDate>{$this->pubDate->format('Y-m-d H:i:s')}</pubDate>
          <author>{$this->author}</author>
          <link>{$this->link}</link>
        </item>
        XML;
    }
}

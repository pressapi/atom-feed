<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

use DateTimeImmutable;

class RssChannelItem implements RssTag
{
    private string $title;
    private string $link;
    private string $description;
    private string $content;
    private string $guid;
    private DateTimeImmutable $pubDate;
    private string $author;

    public function __construct(
        string $title,
        string $link,
        string $description,
        string $content,
        string $guid,
        DateTimeImmutable $pubDate,
        string $author,
    ) {

        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->content = $content;
        $this->guid = $guid;
        $this->pubDate = $pubDate;
        $this->author = $author;
    }

    public function __toString(): string
    {
        return <<<XML
        <item>
          <title>{$this->title}</title>
          <link>{$this->link}</link>
          <description>{$this->description}</description>
          <content:encoded>{$this->content}</content:encoded>
          <guid>{$this->guid}</guid>
          <pubDate>{$this->pubDate->format('r')}</pubDate>
          <author>{$this->author}</author>
        </item>
        XML;
    }
}

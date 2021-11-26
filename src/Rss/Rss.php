<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

use PressApi\Feed\RssTag;

class Rss implements RssTag
{
    private RssChannel $channel;
    private string $version;

    public function __construct(RssChannel $channel, string $version = '2.0')
    {
        $this->channel = $channel;
        $this->version = $version;
    }

    public function __toString(): string
    {
        return <<<XML
        <?xml version="1.0" encoding="utf-8"?>
        <rss version="{$this->version}">
          {$this->channel}
        </rss>
        XML;
    }
}

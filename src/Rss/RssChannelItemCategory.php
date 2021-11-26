<?php

declare(strict_types=1);

namespace PressApi\Feed\Rss;

class RssChannelItemCategory implements RssTag
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return <<<XML
        <category><![CDATA[{$this->name}]]></category>
        XML;
    }
}

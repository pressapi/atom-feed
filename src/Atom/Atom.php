<?php

declare(strict_types=1);

namespace PressApi\Feed\Atom;

use PressApi\Feed\RssTag;

class Atom implements RssTag
{
    private AtomXmlns $xmlns;
    private AtomChannel $channel;
    private string $version;

    public function __construct(AtomXmlns $xmlns, AtomChannel $channel, string $version = '2.0')
    {
        $this->xmlns = $xmlns;
        $this->channel = $channel;
        $this->version = $version;
    }

    public function __toString(): string
    {
        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:content="{$this->xmlns->getContent()}" xmlns:atom="{$this->xmlns->getAtom()}" version="{$this->version}">
  {$this->channel->__toString()}
</rss>
XML;
    }
}

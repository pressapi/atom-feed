<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Atom;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\Atom\Atom;
use PressApi\Feed\Atom\AtomChannel;
use PressApi\Feed\Atom\AtomXmlns;

class AtomRssTest extends TestCase
{
    private const DEFAULT_XML = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel/>
</rss>
XML;

    private const CUSTOM_XML = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:content="http://foo-bar" xmlns:atom="http://biz-baz" version="2.2">
  <channel/>
</rss>
XML;

    public function testRenderRssTagWithDefaults(): void
    {
        $channel = $this->createMock(AtomChannel::class);
        $channel->method('__toString')->willReturn('<channel/>');

        $rss = new Atom(xmlns: new AtomXmlns(), channel: $channel);

        $this->assertXmlStringEqualsXmlString(self::DEFAULT_XML, "{$rss}");
    }

    public function testRenderRssTagWithCustomizedValues(): void
    {
        $channel = $this->createMock(AtomChannel::class);
        $channel->method('__toString')->willReturn('<channel/>');

        $rss = new Atom(xmlns: new AtomXmlns('http://foo-bar', 'http://biz-baz'), channel: $channel, version: '2.2');

        $this->assertEquals(self::CUSTOM_XML, "{$rss}");
    }
}

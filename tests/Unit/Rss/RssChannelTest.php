<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannel;
use PressApi\Feed\Rss\RssTagList;

class RssChannelTest extends TestCase
{
    private const CHANNEL_XML = <<<XML
    <channel>
      <title>My Channel</title>
      <link>https://my-website/my-channel</link>
      <description>My Channel Description</description>
      <language>en-US</language>
      <copyright>PressApi</copyright>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <lastBuildDate>Fri, 26 Nov 2021 10:20:30 +0000</lastBuildDate>
      <ttl>60</ttl>
      <item/>
    </channel>
    XML;

    public function testRenderChannelTag(): void
    {
        $items = $this->createMock(RssTagList::class);
        $items->method('__toString')->willReturn('<item/>');

        $channel = new RssChannel(
            title: 'My Channel',
            link: 'https://my-website/my-channel',
            description: 'My Channel Description',
            language: 'en-US',
            copyright: 'PressApi',
            pubDate: new DateTimeImmutable('2021-11-26 10:15:16 UTC'),
            lastBuildDate: new DateTimeImmutable('2021-11-26 10:20:30 UTC'),
            ttl: 60,
            items: $items,
        );

        $this->assertEquals(self::CHANNEL_XML, "$channel");
    }
}

<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannelItem;

class RssChannelItemTest extends TestCase
{
    private const ITEM_XML = <<<XML
    <item>
      <title>Foo Bar</title>
      <link>http://my-website/my-channel/my-article.html</link>
      <description>Foo Bar Article</description>
      <content:encoded>Foo Bar Content</content:encoded>
      <guid>my-article.html</guid>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <author>Arthur Dent</author>
    </item>
    XML;

    public function testRenderChannelItemTag(): void
    {
        $item = new RssChannelItem(
            title: 'Foo Bar',
            link: 'http://my-website/my-channel/my-article.html',
            description: 'Foo Bar Article',
            content: 'Foo Bar Content',
            guid: 'my-article.html',
            pubDate: new DateTimeImmutable('2021-11-26 10:15:16 UTC'),
            author: 'Arthur Dent',
        );

        $this->assertEquals(self::ITEM_XML, "$item");
    }
}

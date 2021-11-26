<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannelItem;
use PressApi\Feed\Rss\RssChannelItemCategory;
use PressApi\Feed\Rss\RssTagList;

class RssChannelItemTest extends TestCase
{
    private const ITEM_XML = <<<XML
    <item>
      <title><![CDATA[Foo Bar]]></title>
      <link>http://my-website/my-channel/my-article.html</link>
      <description><![CDATA[Foo Bar Article]]></description>
      <content:encoded><![CDATA[Foo Bar Content]]></content:encoded>
      <guid>my-article.html</guid>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <author>Arthur Dent</author>
      <category><![CDATA[Foo Bar]]></category>
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
            categories: new RssTagList([
                new RssChannelItemCategory('Foo Bar'),
            ]),
        );

        $this->assertEquals(self::ITEM_XML, "$item");
    }
}

<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannelItem;
use PressApi\Feed\Rss\RssChannelItemList;

class RssChannelItemListTest extends TestCase
{
    private const ITEM_LIST_XML = <<<XML
    <item>
      <title>Item 1 Title</title>
      <link>http://my-website/my-channel/item-1.html</link>
      <description>Item 1 Description</description>
      <content:encoded>Item 1 Content</content:encoded>
      <guid>item-1.html</guid>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <author>Arthur Dent</author>
    </item>
    <item>
      <title>Item 2 Title</title>
      <link>http://my-website/my-channel/item-2.html</link>
      <description>Item 2 Description</description>
      <content:encoded>Item 2 Content</content:encoded>
      <guid>item-2.html</guid>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <author>John Travolta</author>
    </item>
    XML;

    public function testRenderChannelItemTag(): void
    {
        $item1 = new RssChannelItem(
            title: 'Item 1 Title',
            link: 'http://my-website/my-channel/item-1.html',
            description: 'Item 1 Description',
            content: 'Item 1 Content',
            guid: 'item-1.html',
            pubDate: new DateTimeImmutable('2021-11-26 10:15:16 UTC'),
            author: 'Arthur Dent',
        );
        $item2 = new RssChannelItem(
            title: 'Item 2 Title',
            link: 'http://my-website/my-channel/item-2.html',
            description: 'Item 2 Description',
            content: 'Item 2 Content',
            guid: 'item-2.html',
            pubDate: new DateTimeImmutable('2021-11-26 10:15:16 UTC'),
            author: 'John Travolta',
        );

        $items = new RssChannelItemList($item1, $item2);

        $this->assertEquals(self::ITEM_LIST_XML, "$items");
    }
}

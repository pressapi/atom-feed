<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Atom;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Atom\AtomItem;
use PressApi\Feed\RssCategory;
use PressApi\Feed\RssTagList;

class AtomItemTest extends TestCase
{
    private const ITEM_XML = <<<XML
    <item>
      <title><![CDATA[Foo Bar]]></title>
      <link>http://my-website/my-channel/my-article.html</link>
      <content:encoded xmlns:content="https://purl.org/rss/1.0/modules/content/">
        <![CDATA[<p><img src="http://my-website/my-channel/image-1.jpg"/></p>Foo Bar Article]]>
      </content:encoded>
      <guid>my-article.html</guid>
      <pubDate>Fri, 26 Nov 2021 10:15:16 +0000</pubDate>
      <author>Arthur Dent</author>
      <category><![CDATA[Foo Bar]]></category>
    </item>
    XML;

    public function testRenderChannelItemTag(): void
    {
        $item = new AtomItem(
            title: 'Foo Bar',
            link: 'http://my-website/my-channel/my-article.html',
            content: 'Foo Bar Article',
            image: 'http://my-website/my-channel/image-1.jpg',
            guid: 'my-article.html',
            pubDate: new DateTimeImmutable('2021-11-26 10:15:16 UTC'),
            author: 'Arthur Dent',
            categories: new RssTagList([
                new RssCategory('Foo Bar'),
            ]),
        );

        $this->assertEquals(self::ITEM_XML, "$item");
    }
}

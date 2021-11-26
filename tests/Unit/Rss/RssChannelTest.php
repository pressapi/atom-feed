<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannel;
use PressApi\Feed\RssTagList;

class RssChannelTest extends TestCase
{
    public function testRenderRssChannelItem(): void
    {
        $items = $this->createMock(RssTagList::class);
        $items->method('__toString')->willReturn('<item/>');

        $channel = new RssChannel(
            title: 'Foo Bar',
            link: 'https://my-webiste/my-article.html',
            items: $items,
        );

        $this->assertEquals(
            <<<XML
            <channel>
              <title>Foo Bar</title>
              <link>https://my-webiste/my-article.html</link>
              <item/>
            </channel>
            XML,
            $channel->__toString(),
        );
    }
}

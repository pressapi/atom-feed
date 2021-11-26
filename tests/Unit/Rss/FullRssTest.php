<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\Rss;
use PressApi\Feed\Rss\RssChannel;
use PressApi\Feed\Rss\RssItem;
use PressApi\Feed\RssTagList;

class FullRssTest extends TestCase
{
    public function testFullRssXml(): void
    {
        $rss = new Rss(
            channel: new RssChannel(
                title: 'Foo Bar',
                link: 'https://my-webiste/my-article.html',
                items: new RssTagList([
                    new RssItem(
                        enclosure: 'https://my-webiste/my-article/image.jpg',
                        title: 'Foo Bar',
                        pubDate: new DateTimeImmutable('2021-11-26 15:20:25 UTC'),
                        author: 'Arthur Dent',
                        link: 'https://my-webiste/my-article.html',
                    ),
                    new RssItem(
                        enclosure: 'https://my-webiste/my-second-article/image.jpg',
                        title: 'Second Article',
                        pubDate: new DateTimeImmutable('2021-11-26 15:30:50 UTC'),
                        author: 'Arthur Dent',
                        link: 'https://my-webiste/my-second-article.html',
                    ),
                ]),
            ),
        );

        $this->assertXmlStringEqualsXmlString(
            <<<XML
            <?xml version="1.0" encoding="utf-8"?>
            <rss version="2.0">
                <channel>
                    <title>Foo Bar</title>
                    <link>https://my-webiste/my-article.html</link>
                    <item>
                        <enclosure url="https://my-webiste/my-article/image.jpg" type="image/jpeg"/>
                        <title>Foo Bar</title>
                        <pubDate>2021-11-26 15:20:25</pubDate>
                        <author>Arthur Dent</author>
                        <link>https://my-webiste/my-article.html</link>
                    </item>
                    <item>
                        <enclosure url="https://my-webiste/my-second-article/image.jpg" type="image/jpeg"/>
                        <title>Second Article</title>
                        <pubDate>2021-11-26 15:30:50</pubDate>
                        <author>Arthur Dent</author>
                        <link>https://my-webiste/my-second-article.html</link>
                    </item>
                </channel>
            </rss>
            XML,
            $rss->__toString(),
        );
    }
}

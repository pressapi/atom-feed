<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\Rss;
use PressApi\Feed\Rss\RssChannel;

class RssTest extends TestCase
{
    public function testRenderRss(): void
    {
        $channel = $this->createMock(RssChannel::class);
        $channel->method('__toString')->willReturn('<channel/>');

        $rss = new Rss($channel);

        $this->assertEquals(
            <<<XML
            <?xml version="1.0" encoding="utf-8"?>
            <rss version="2.0">
              <channel/>
            </rss>
            XML,
            $rss->__toString(),
        );
    }
}

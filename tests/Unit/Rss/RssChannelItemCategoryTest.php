<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Rss;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\Rss\RssChannelItemCategory;

class RssChannelItemCategoryTest extends TestCase
{
    private const CATEGORY_XML = <<<XML
    <category><![CDATA[Foo Bar]]></category>
    XML;

    public function testRenderCategoryTag(): void
    {
        $name = 'Foo Bar';

        $category = new RssChannelItemCategory($name);

        $this->assertEquals(self::CATEGORY_XML, "$category");
    }
}

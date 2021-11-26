<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\RssCategory;
use PressApi\Feed\RssTagList;

class RssTagListTest extends TestCase
{
    private const ITEM_LIST_XML = <<<XML
    <category><![CDATA[Foo Bar]]></category>
    <category><![CDATA[Biz Baz]]></category>
    XML;

    public function testRenderChannelItemTag(): void
    {
        $item1 = new RssCategory(name: 'Foo Bar');
        $item2 = new RssCategory(name: 'Biz Baz');

        $items = new RssTagList([$item1, $item2]);

        $this->assertEquals(self::ITEM_LIST_XML, "$items");
    }
}

<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit\Atom;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\Atom\AtomChannelItemCategory;

class AtomRssChannelItemCategoryTest extends TestCase
{
    private const CATEGORY_XML = <<<XML
    <category><![CDATA[Foo Bar]]></category>
    XML;

    public function testRenderCategoryTag(): void
    {
        $name = 'Foo Bar';

        $category = new AtomChannelItemCategory($name);

        $this->assertEquals(self::CATEGORY_XML, "$category");
    }
}

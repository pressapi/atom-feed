<?php

declare(strict_types=1);

namespace Test\PressApi\Feed\Unit;

use PHPUnit\Framework\TestCase;
use PressApi\Feed\RssCategory;

class RssCategoryTest extends TestCase
{
    private const CATEGORY_XML = <<<XML
    <category><![CDATA[Foo Bar]]></category>
    XML;

    public function testRenderCategoryTag(): void
    {
        $name = 'Foo Bar';

        $category = new RssCategory($name);

        $this->assertEquals(self::CATEGORY_XML, "$category");
    }
}

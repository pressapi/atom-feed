<?php

declare(strict_types=1);

namespace PressApi\Feed\Atom;

use PressApi\Feed\RssTag;

class AtomChannelItemCategory implements RssTag
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return <<<XML
        <category><![CDATA[{$this->name}]]></category>
        XML;
    }
}

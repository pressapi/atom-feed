<?php

declare(strict_types=1);

namespace PressApi\Feed\Atom;

class AtomXmlns
{
    private const DEFAULT_CONTENT = 'http://purl.org/rss/1.0/modules/content/';
    private const DEFAULT_ATOM = 'http://www.w3.org/2005/Atom';

    private string $content;
    private string $atom;

    public function __construct(string $content = self::DEFAULT_CONTENT, string $atom = self::DEFAULT_ATOM)
    {
        $this->content = $content;
        $this->atom = $atom;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAtom(): string
    {
        return $this->atom;
    }
}

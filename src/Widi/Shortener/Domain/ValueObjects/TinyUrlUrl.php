<?php


namespace Src\Widi\Shortener\Domain\ValueObjects;

final class TinyUrlUrl
{
    private $value;

    public function __construct(string $url)
    {
        $this->value = $url;
    }

    public function value(): string
    {
        return $this->value;
    }
}

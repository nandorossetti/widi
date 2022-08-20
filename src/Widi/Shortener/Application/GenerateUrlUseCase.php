<?php

namespace Src\Widi\Shortener\Application;

use Src\Widi\Shortener\Domain\ValueObjects\TinyUrlUrl;
use Src\Widi\Shortener\Domain\Services\TinyUrlService;

final class GenerateUrlUseCase
{

    public function __invoke(string $url): string
    {

        // ValueObject
        $url = new TinyUrlUrl($url);

        // Inject TinyURL Service
        $tinyUrlService = new TinyUrlService();

        // Get shortener url from TinyURL service
        $shortUrl = $tinyUrlService->shortUrl($url->value());

        // Response
        return $shortUrl->body();

    }
}

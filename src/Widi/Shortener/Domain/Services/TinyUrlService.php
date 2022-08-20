<?php

namespace Src\Widi\Shortener\Domain\Services;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Src\Widi\Shortener\Domain\Exceptions\TinyUrlApiException;
use Src\Widi\Shortener\Domain\ValueObjects\TinyUrlUrl;

class TinyUrlService
{
    // Base URL (Can be put in config file and env)
    const BASE_URL = "https://tinyurl.com/api-create.php?url=";

    // Function to short url through TinyURL API
    public function shortUrl(string $url) : Response | TinyUrlApiException
    {
        try {
            return Http::get($this->mountUrl($url));
        } catch (Exception $e) {
            throw new TinyUrlApiException($e->getMessage());
        }
    }

    protected function mountUrl(string $url)
    {
        return $this::BASE_URL.$url;
    }

}

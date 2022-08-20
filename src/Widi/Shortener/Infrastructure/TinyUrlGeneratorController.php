<?php

namespace Src\Widi\Shortener\Infrastructure;

use Illuminate\Http\JsonResponse;
use Src\Widi\Shortener\Application\GenerateUrlUseCase;
use Src\Widi\Shortener\Infrastructure\Requests\TinyURLRequest;

final class TinyUrlGeneratorController
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(TinyURLRequest $request) : JsonResponse
    {
        // Retrieve the validated input data
        $validated = $request->validated();

        // Get shortener url from TinyURL service
        $generateUrlUseCase = new GenerateUrlUseCase();
        $shortUrl = $generateUrlUseCase->__invoke($validated['url']);

        // Reponse
        return response()->json(['url' => $shortUrl], 200);

    }
}

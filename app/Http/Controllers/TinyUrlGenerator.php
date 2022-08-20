<?php

namespace App\Http\Controllers;

use App\Http\Requests\TinyURLRequest;
use App\Services\TinyUrlService;
use Illuminate\Http\Request;

class TinyUrlGenerator extends Controller
{

    protected $tinyUrlService;

    // Inject TinyURL Service
    public function __construct(TinyUrlService $tinyUrlService)
    {
        $this->tinyUrlService = $tinyUrlService;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TinyURLRequest $request)
    {
        // Retrieve the validated input data
        $validated = $request->validated();

        // Get shortener url from TinyURL service
        $shortUrl = $this->tinyUrlService->shortUrl($validated['url']);

        // Response
        return response()->json(['url' => $shortUrl->body()], 200);


    }
}

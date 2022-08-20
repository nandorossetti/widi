<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckBearerToken
{
    /**
     * Handle an incoming request with bearer token
     */
    public function handle(Request $request, Closure $next) : Response | JsonResponse
    {

        // Check if berear token is valid
        if(!$this->isValidToken($request->bearerToken())){
            return response()->json(['message' => 'The Bearer token is not valid'], 401);
        }

        return $next($request);
    }


    /**
     * Check for balanced parentheses, brackets and braces
     */
    protected function isValidToken(string|null $token) : bool
    {

        $token = trim($token);
        if (!$token) {
          return true;
        }
        if (strlen($token) === 1) {
          return false;
        }

        $pair = [
          '[' => ']',
          '(' => ')',
          '{' => '}',
        ];

        for ($stack = [], $length = strlen($token), $i = 0; $i < $length; $i++) {
          $symbol = $token[$i];
          if (array_key_exists($symbol, $pair)) {
            $stack[] = $symbol;
          } else {
            $lastInStack = array_pop($stack);
            if (!isset($pair[$lastInStack]) || $symbol !== $pair[$lastInStack]) {
              return false;
            }
          }
        }
        return (count($stack) === 0) ? true : false;



    }
}

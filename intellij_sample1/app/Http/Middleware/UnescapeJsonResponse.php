<?php

namespace App\Http\Middleware;

use Closure;

class UnescapeJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);

        $response = $next($request);

        // JSON以外はそのまま
        if (!$response instanceof JsonResponse) {
            return $response;
        }

        // エンコードオプションを追加して設定し直す
        $newEncodingOptions = $response->getEncodingOptions() | JSON_UNESCAPED_UNICODE;
        $response->setEncodingOptions($newEncodingOptions);

        return $response;
    }
}

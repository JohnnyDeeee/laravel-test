<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestAndResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, $response): void
    {
        $message = sprintf(
            '%s: %s',
            $request->method(),
            $request->route()?->uri()
        );

        $context = [
            'request' => [
                'full_url' => $request->fullUrl(),
                'method' => $request->method(),
                'body' => $request->getContent(),
                'server' => $request->server(),
                'user_id' => $request->user()?->id ?? 0,
            ],
            'response' => [
                'status_code' => $response->status(),
                'body' => $response->getContent(),
                'headers' => $response->headers->all(),
            ],
        ];

        Log::debug($message, $context);
    }
}

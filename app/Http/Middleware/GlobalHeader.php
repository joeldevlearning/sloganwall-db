<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class GlobalHeader
 * @package App\Http\Middleware
 */
class GlobalHeader
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
	    $response = $next($request);

	    $response->header('Content-Type', 'application/json; charset=UTF-8');
	    $response->header('charset', 'utf-8');
	    $response->header('api-version', '0');

	    return $response;
    }
}

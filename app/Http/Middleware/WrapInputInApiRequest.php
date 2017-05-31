<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiRequest\ApiRequestFactory;

class WrapInputInApiRequest
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
    	$factory = new ApiRequestFactory();
	    $apiRequest = $factory->create($request);
	    $request->merge(['apiRequest' => $apiRequest]);

	    return $next($request);
    }
}

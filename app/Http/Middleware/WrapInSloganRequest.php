<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SloganRequest\SloganRequestFactoryInterface;

class WrapInSloganRequest
{
    private $factory;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiRequest = $this->factory->create($request);
        $request->merge(['apiRequest' => $apiRequest]);

        return $next($request);
    }

    /**
     * WrapInputInSloganRequest constructor.
     *
     * @param SloganRequestFactoryInterface $factory
     */
    public function __construct(SloganRequestFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
}

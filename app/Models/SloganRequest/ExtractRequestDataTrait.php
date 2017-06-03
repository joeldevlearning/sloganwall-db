<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

trait ExtractRequestDataTrait
{

    /*
     * UNUSED
     * opposite of extract query
     */
    public function extractRoute(Request $request) : string
    {
        $path = $request->path();
        $everythingAfterSlash = '/([^\/]+$)/';
        return preg_replace($everythingAfterSlash, '', $path);
    }

    public function extractQuery(Request $request) : string
    {
        $path = $request->path();
        $everythingAfterSlash = '/([^\/]+$)/';
        preg_match($everythingAfterSlash, $path, $matches);
        return $matches[1];
    }
}

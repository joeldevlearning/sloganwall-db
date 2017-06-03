<?php

namespace App\Models\SloganRequest;

use Illuminate\Http\Request;

class SloganRequestFactory implements SloganRequestFactoryInterface
{
    use ExtractRequestDataTrait;
    use ValidateSloganRequestTrait;

    private $rawInput;

    public function create(Request $request) : SloganRequestInterface
    {
        if ($request->is('list/all/')) {
            //ignore input
            return new SloganRequest(null);
        }

        if ($request->is('item/by/id/*')) {
            //only allow int
            return new SloganRequest($this->rawInput);
        }
        //else

        if ($request->is('list/by/zi/*')) {
            //only allow chinese characters
            if ($this->isValidZi($this->rawInput)) {
                return new SloganRequest($this->rawInput);
            }
            return abort(422, "Invalid input; should be Chinese characters 汉字");
        }
        //else

        if ($this->isValidText($this->rawInput)) {
            return new SloganRequest($this->rawInput);
        }

        //nothing is valid
        return abort(422, "Invalid input");
    }

    public function __construct(Request $request)
    {
        $input = $this->extractQuery($request);

        if ($this->isUrlEncoded($input)) {
            $this->rawInput = (urldecode($input));
        } else {
            $this->rawInput = $input;
        }
    }
}

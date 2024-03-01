<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends BaseController
{
    public function index(){
        $data = TermsCondition::first();
        // $data = optional($data);

        $data = $data ? $data : NULL;

        return $this->sendResponse($data,'Terms and condition data fetched.');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends BaseController
{
    public function index(){
        $data = Privacy::first();
        $data = optional($data);
        return $this->sendResponse($data,'Privacy fetched successfully');
    }
}

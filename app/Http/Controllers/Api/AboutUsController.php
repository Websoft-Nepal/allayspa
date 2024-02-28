<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends BaseController
{
    public function index(){
        $data = AboutUs::first();
        $data = optional($data);
        return $this->sendResponse($data,'AboutUs data fetched successfully.');
    }
}

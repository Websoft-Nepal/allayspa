<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends BaseController
{
    public function index(){
        $data = SocialMedia::first();
        $data = optional($data);
        return $this->sendResponse($data,'Social Media fetched successfully');
    }
}

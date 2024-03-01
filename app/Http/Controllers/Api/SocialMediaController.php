<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends BaseController
{
    public function index(){
        $data = SocialMedia::first();
        $data = $data ? $data : NULL;
        return $this->sendResponse($data,'Social Media fetched successfully');
    }
}

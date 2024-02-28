<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends BaseController
{
    public function index(){
        $data = Gallery::latest()->paginate(2);
        return $this->sendResponse($data,'Gallery data reterieve successfully.');
    }
}

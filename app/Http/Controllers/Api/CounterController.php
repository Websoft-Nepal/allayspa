<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends BaseController
{
    public function index(){
        $data = Counter::first();
        return $this->sendResponse($data,'Counter data fetched successfully');
    }
}

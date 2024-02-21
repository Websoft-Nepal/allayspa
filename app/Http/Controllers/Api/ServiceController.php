<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends BaseController
{
    public function index()
    {
        $data = Service::all();

        return $this->sendResponse($data, 'Services retrieved successfully.');
    }
}

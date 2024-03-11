<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    public function index(){
        $data = Contact::first();
        $data = $data ? $data : NULL;
        return $this->sendResponse($data,'Contact data fetch successfully');
    }
}

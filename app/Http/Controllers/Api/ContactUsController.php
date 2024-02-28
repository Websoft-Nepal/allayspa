<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ContactUsController extends BaseController
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required|string',

        ]);
        if($validator->fails()){
            return $this->sendError("validation failed",$validator->messages(),400);
        }else{
            $data = [
                // firstname,lastname,email, phonenumber, message
            ];
            DB::beginTransaction();
            try{

                DB::commit();
            }
            catch(\Exception $e){

            }
        }
    }
}

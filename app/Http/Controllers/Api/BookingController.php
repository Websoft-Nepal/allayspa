<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends BaseController
{
    public function index(){
        try{
            $bookings = Booking::paginate(10);
            return $this->sendResponse($bookings,'Data fetched successfully');
        }
        catch(\Exception $e){
            return $this->sendError($e->getMessage(),"Unable to fetch data");
        }

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255',
            'number'=>'required|max:15',
            'address'=>'nullable|string',
            'date'=>'required|date_format:Y-m-d|max:20',
            'time' => 'required|date_format:H:i|max:20',
            'service' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->messages(),'Validation fails',400);
        }else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'date' => $request->date,
                'time' => $request->time,
                'service' => $request->service,
            ];

            DB::beginTransaction();
            try{
                Booking::create($data);
                DB::commit();
                return response()->json(['message'=>'Appointment booked successfully.'],200);
            }catch(\Exception $e){
                return $this->sendError($e->getMessage(),'Occurs an exception',500);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends BaseController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|string',

        ]);
        if ($validator->fails()) {
            return $this->sendError("validation failed", $validator->messages(), 400);
        } else {
            $data = [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
            ];
            DB::beginTransaction();
            try {
                // Mail::to($request->email)->send(new OrderMail($order, $user));
                $recipientEmail ="darshankc.xdezo@gmail.com";
                $senderEmail = env('Admin_mail');
                $senderEmail = "darshankc.xdezo@gmail.com";
                Mail::to($recipientEmail)->send(new ContactUsMail($data));
                DB::commit();
                return $this->sendResponse("Data stored and email sent successfully", [], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return $this->sendError("Failed to store data and send email", [], 500);
            }
        }
    }
}

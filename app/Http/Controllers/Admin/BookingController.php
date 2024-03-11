<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::latest()->paginate(10);
        return view('pages.booking.index',compact('bookings'));
    }
    public function view(string $id){
        $booking = Booking::findOrFail($id);
        return view('pages.booking.view',compact('booking'));
    }
    public function destroy($id){
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.booking.index')->with('status',"Booking deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Slot;
use App\Models\User;
use App\Models\Booking;
use App\Models\Treatment;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    //
    public function index(){
        //default date based on geographical
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if(request('date')){
            $dentists = $this->findDentistsBasedOnDate(request('date'));
            return view('welcome',compact('dentists'));
        }
        $dentists = Appointment::where('date',date('d-m-Y'))->get();
        return view('welcome',compact('dentists'));
    }

    public function show($dentistId,$date){
        $appointment = Appointment::where('user_id',$dentistId)->where('date',$date)->first();
        $slots = Slot::where('appointment_id',$appointment->id)->where('status',0)->get();
        $users = User::where('id',$dentistId)->first();
        $dentist_id = $dentistId;

        return view('appointment',compact('slots','date','users','dentist_id'));
    }

    public function findDentistsBasedOnDate($date)
    {
        $dentists = Appointment::where('date',$date)->get();
        return $dentists;

    }

    public function store(Request $request)
{
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $request->validate(['slot' => 'required']);

    $check = $this->checkBookingTimeInterval();
    if ($check) {
        return redirect()->back()->with('errmessage', 'You Already Booked An Appointment. Please Wait to Book Another Appointment!');
    }

    Booking::create([
        'user_id' => auth()->user()->id,
        'dentist_id' => $request->dentistId,
        'slot' => $request->slot,
        'date' => $request->date,
        'status' => 0
    ]);

    Slot::where('appointment_id', $request->appointmentId)
        ->where('slot', $request->slot)
        ->update(['status' => 1]);

    //send email notification
    $dentistName = User::where('id', $request->dentistId)->first();
    $mailData = [
        'name' => auth()->user()->name,
        'slot' => $request->slot,
        'date' => $request->date,
        'dentistName' => $dentistName->name
    ];

        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        } catch (\Exception $e) {
            // Log the error
            \Illuminate\Support\Facades\Log::error('Error sending email: ' . $e);
            
            return redirect()->back()->with('errmessage', 'Error sending email. Please try again later.');
        }
        return redirect()->back()->with('message', 'Appointment Successfully Booked');
    }
    

    public function checkBookingTimeInterval(){
        return Booking::orderBy('id', 'desc')
        ->where('user_id', auth()->user()->id)
        ->whereRaw('DATE_FORMAT(created_at, "%d-%m-%Y") = ?', [date('d-m-Y')])
        ->exists();
    }

    public function mybookings(){
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }

    public function myTreatment(){
        $treatments = Treatment::where('user_id',auth()->user()->id)->get();
        return view('my-treatment',compact('treatments'));

    }
}

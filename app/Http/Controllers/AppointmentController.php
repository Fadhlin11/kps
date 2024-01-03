<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Slot;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $myappointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        return view('admin.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //a dentist can only create slot for a date
        $this->validate($request,[
            'date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'slot'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id'=> auth()->user()->id,
            'date' => $request->date
        ]);
        foreach($request->slot as $slot){
            Slot::create([
                'appointment_id'=> $appointment->id,
                'slot'=> $slot,
                //'status'=>0
            ]);
        }
        
        return redirect()->back()->with('message','Appointment Successfully Created for '. $request->date);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function check(Request $request){
        $date = $request->date;
        $appointment= Appointment::where('date',$date)->where('user_id',auth()->user()->id)->first();
        if(!$appointment){
            return redirect()->to('/appointment')->with('errmessage','Appointment Slot Not Available For The Date');
        }
        $appointmentId = $appointment->id;
        $slots = Slot::where('appointment_id',$appointmentId)->get();

        return view('admin.appointment.index',compact('slots','appointmentId','date'));
    }

    public function updateSlot(Request $request){
        $appointmentId = $request->appointmentId;
        $appointment = Slot::where('appointment_id',$appointmentId)->delete();
        foreach($request->slot as $slot){
            Slot::create([
                'appointment_id'=>$appointmentId,
                'slot'=>$slot,
                'status'=>0
            ]);
        }
        return redirect()->route('appointment.index')->with('message','Appointment Slot Successfully Updated!');
    }
    
}

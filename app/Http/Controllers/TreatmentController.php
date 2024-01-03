<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    //
    public function index(){

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $bookings =  Booking::where('date',date('d-m-Y'))->where('status',1)->where('dentist_id',auth()->user()->id)->get();
        
        return view('treatment.index', compact('bookings'));
    }

    public function store(Request $request){

        $data = $request->all();
        Treatment::create($request->all());
        return redirect()->back()->with('message','Treatment Successfully Submitted!');

    }

    public function show($userId,$date){
        $treatment = Treatment::where('user_id',$userId)->where('date',$date)->first();
        return view('treatment.show',compact('treatment'));
    }

    //get all list of patients from treatment table
    public function listOfTreatments(){
        $patients = Treatment::get();
        return view('treatment.list',compact('patients'));

    }
}

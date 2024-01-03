<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index(){

        return view('profile.index');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required'
            // Add other validation rules for phone_number, address, etc.
        ]);
    
        User::where('id', auth()->user()->id)->update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address')
        ]);
    
        return redirect()->back()->with('message', 'Your Profile is Successfully Updated!');
    }
    
}

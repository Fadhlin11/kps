<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            // Add other validation rules for phone_number, address, etc.
            'password' => 'nullable|min:8|confirmed', // Make password fields nullable
        ]);

        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
        ]);

        // Check if the password fields are filled and update the password
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        return redirect()->back()->with('message', 'Your Profile is Successfully Updated!');
    }
}

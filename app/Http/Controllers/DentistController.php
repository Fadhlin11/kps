<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //condition retrieve only dentist
        $users = User::where('user_type', 1)->get();
        return view('admin.dentist.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dentist.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new User) ->userImage($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Dentist Added Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //delete page
        $users = User::find($id);
        return view('admin.dentist.delete',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::find($id);
        return view('admin.dentist.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $users = User::find($id);
        $imageName = $users->image;
        $userPassword = $users->password;
        if($request->hasFile('image')){
            $imageName = (new User) ->userImage($request);
            unlink(public_path('images/'.$users->image));
        }

        $data['image'] = $imageName;

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        else{
            $data['password']  = $userPassword;
        }
        $users->update($data);
        return redirect()->route('dentist.index')->with('message','Dentist Succesfully Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //self delete, unable
        if(auth()->user()->id == $id){
            abort(401);
        }
        //if not, admin delete
        $users = User::find($id);
        $userDelete = $users->delete();
        //if user delete, delete pro pic as well
        if($userDelete){
            unlink(public_path('images/'.$users->image));
        }
        return redirect()->route('dentist.index')->with('message','Dentist Succesfully Deleted');
    }
    
    public function validateStore($request)
    {
        //Validation rules for the incoming request data
        return $this->validate($request,[
        'name'=>'required',
        'email'=>'required|unique:users',
        'password'=>'required|min:6|max:25',           
        'gender'=>'required',
        'phone_number'=>'required|numeric',
        'address'=>'required',
        'position'=>'required',
        'education'=>'required',
        'image'=>'required|mimes:jpeg,jpg,png',
        'user_type'=>'required',
        'description_dentist'=>'required'
        ]);

    }

    public function validateUpdate($request,$id)
    {
        //Validation rules for the incoming request data
        return $this->validate($request,[
        'name'=>'required',
        'email'=>'required|unique:users,email,'.$id,
        'phone_number'=>'required|numeric',
        'address'=>'required',
        'position'=>'required',
        'education'=>'required',
        'image'=>'mimes:jpeg,jpg,png',
        'user_type'=>'required',
        'description_dentist'=>'required'
        ]);

    }
}

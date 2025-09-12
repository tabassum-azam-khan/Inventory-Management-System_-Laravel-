<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
     public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }

    // CREATE
        public function create(){
        return view('backend.users.create');
    }

    // STORE
    public function store(Request $request){
        $user=new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->remarks = $request->remarks;
        $user->save();
        session()->flash('message', 'Created Successfully');
        return redirect()-> route('users.index');
    }

    // SHOW
    public function show($id)
    {
        $user = User::find($id);
        return view('users.view', compact('user'));
    }


    // EDIT
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit',compact('user'));
    }


    // UPDATE
    public function update(Request $request, $id)
    {
        //validate input
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,' . $id,
            'phone'=>'required|string|max:11',
            'password'=>'nullable|string|min:6|confirmed',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
        ]);

        //update
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->remarks = $request->remarks;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        session()->flash('message', 'Updated Successfully');
        return redirect() -> route('users.index');
    }


    // SOFT DELETES
    public function get_trash(){
        $users = User::onlyTrashed()->get();
        return view('backend.users.trash',compact('users'));
    }

    public function destroy($id)
    {

        $user = User::find($id);

        if ($user) {
            $user->delete();
            session()->flash('message','User Moved to Trash');
        }
        return redirect()->route('users.index',compact('user'));
    }
    //RESTORE
    public function restore($id){
        $user = User::onlyTrashed()->findOrFail($id);
        if ($user) {
             $user->restore();
            session()->flash('message','User Restored Successfully');
        }

        return redirect()->route('users.index',compact('user'));
    }

    //PERMANENT DELETE
    public function forceDelete($id){
        $user = User::onlyTrashed()->find($id);
        if ($user) {
            $user->forceDelete();
            session()->flash('message','User Permanently Deleted');
        }
        return redirect()->route('users.index',compact('user'));
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return view('backend.customers.index',compact('customers'));
    }


    public function create()
    {
        return view('backend.customers.create');
    }


    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->password = Hash::make($request->password);
        $customer->remarks = $request->remarks;
        $customer->email_varified_at = $request->email_varified_at;
        $customer->save();

        return redirect()->route('customers.index')->with('message','Created Successfully');
    }


    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customers.view',compact('customer'));
    }


    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customers.edit',compact('customer'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:customers,email,' . $id,
            'phone'=>'required|string|max:14|min:11',
            'password'=>'nullable|string|min:6|confirmed',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
        ]);

        $customer = Customer::findOrFail($id);
         $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->remarks = $request->remarks;
        $customer->email_varified_at = $request->email_varified_at;

         if($request->filled('password')){
            $customer->password = Hash::make($request->password);
        }

        $customer->save();

        return redirect()->route('customers.index')->with('message','Updated Successfully');

    }

//SOFT DELETES
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        return view('backend.customers.trash',compact('customers'));
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('message','Move to Trash');
    }

      public function restore($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->route('customers.index')->with('message','Restored Successfully');
    }
   public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->forceDelete();
        return redirect()->route('customers.trash')->with('message','Permanently Deleted');
    }

}

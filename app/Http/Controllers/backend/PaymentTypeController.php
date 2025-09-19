<?php

namespace App\Http\Controllers\backend;

use App\Models\PaymentType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PaymentTypeController extends Controller
{

    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('backend.payment-types.index',compact('paymentTypes'));
    }


    public function create()
    {
        return view('backend.payment-types.create');
    }


    public function store(Request $request)
    {
        $paymentType = new PaymentType();
        $paymentType->name = $request->name;
        $paymentType->status = $request->status;
        $paymentType->remarks = $request->remarks;
        $paymentType->created_by = $request->created_by;
        $paymentType->updated_by = $request->updated_by;
        $paymentType->save();

        return redirect()->route('payment.index')->with('message','Created Successfully');
    }


    public function show($id)
    {
        $paymentType = PaymentType::findOrFail($id);
        return view('backend.payment-types.view',compact('paymentType'));
    }


    public function edit($id)
    {
        $paymentType = PaymentType::findOrFail($id);
        return view('backend.payment-types.edit',compact('paymentType'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $paymentType = PaymentType::findOrFail($id);
        $paymentType->name = $request->name;
        $paymentType->status = $request->status;
        $paymentType->remarks = $request->remarks;
        $paymentType->created_by = $request->created_by;
        $paymentType->updated_by = $request->updated_by;
        $paymentType->save();

        return redirect()->route('payment.index',compact('paymentType'))->with('message','Updated successfully');
    }


//SOFT DELETES
    public function trash(){
        $paymentTypes = PaymentType::onlyTrashed()->get();
        return view('backend.payment-types.trash',compact('paymentTypes'));
    }

    public function destroy($id)
    {
        $paymentType = PaymentType::findOrFail($id);
        $paymentType->delete();
        return redirect()->route('payment.index')->with('message','Moved to Trash');
    }

  public function restore($id){
        $paymentType = PaymentType::onlyTrashed()->findOrFail($id);
        $paymentType->restore();
        return redirect()->route('payment.index')->with('message','Restored Successfully');
    }

    public function forceDelete($id){
        $paymentType = PaymentType::onlyTrashed()->findOrFail($id);
        $paymentType->forceDelete();
        return redirect()->route('payment.trash')->with('message','Permanently Deleted');
    }

}

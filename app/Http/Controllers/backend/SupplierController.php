<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class SupplierController extends Controller
{

    public function index()
    {
         $suppliers = Supplier::all();
         return view('backend.suppliers.index',compact('suppliers'));
    }


    public function create()
    {
        $companies = Company::all();
         return view('backend.suppliers.create',compact('companies'));
    }


    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->company_id = $request->company_id;
        $supplier->status = $request->status;
        $supplier->remarks = $request->remarks;
        $supplier->approved_by = $request->approved_by;
        $supplier->created_by = $request->created_by;
        $supplier->updated_by = $request->updated_by;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('message','Created Successfully',compact('supplier'));
    }


    public function show($id)
    {
           $supplier = Supplier::findOrFail($id);
        return view('backend.suppliers.view',compact('supplier'));
    }


    public function edit($id)
    {
         $supplier = Supplier::findOrFail($id);
        $companies = Company::all();
        return view('backend.suppliers.edit',compact('supplier','companies'));
    }


    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>'required|string',
            'phone'=>'required|string|min:11|max:14',
            'email'=>'required|email|unique:suppliers,email,' . $id,
            'company_id'=>'required|exists:companies,id',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
            'approved_by'=>'nullable|string',
            'created_by'=>'nullable|string',
            'updated_by'=>'nullable|string',
        ]);

         $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->company_id = $request->company_id;
        $supplier->status = $request->status;
        $supplier->remarks = $request->remarks;
        $supplier->approved_by = $request->approved_by;
        $supplier->created_by = $request->created_by;
        $supplier->updated_by = $request->updated_by;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('message','Updated Successfully');
    }

   //SOFT DELETES
    public function trash(){
        $suppliers = Supplier::onlyTrashed()->get();
         return view('backend.suppliers.trash',compact('suppliers'));
    }
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
         return redirect()->route('suppliers.index')->with('message','Move to Trash');
    }
        public function restore($id)
    {
        $supplier = Supplier::onlyTrashed()->findOrFail($id);
        $supplier->restore();
        return redirect()->route('suppliers.index')->with('message','Restored Successfully');
    }
   public function forceDelete($id)
    {
        $supplier = Supplier::onlyTrashed()->findOrFail($id);
        $supplier->forceDelete();
        return redirect()->route('suppliers.trash')->with('message','Permanently Deleted');
    }

}

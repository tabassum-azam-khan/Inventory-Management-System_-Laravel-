<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function index()
    {
        $warehouses = Warehouse::all();
        return view('backend.warehouses.index',compact('warehouses'));
    }


    public function create()
    {
        return view('backend.warehouses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
            'approved_by'=>'nullable|integer',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->status = $request->status;
        $warehouse->remarks = $request->remarks;
        $warehouse->approved_by = $request->approved_by;
        $warehouse->created_by = $request->created_by;
        $warehouse->updated_by = $request->updated_by;
        $warehouse->save();

        return redirect()->route('warehouses.index')->with('message','Created Successfully');
    }


    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('backend.warehouses.view',compact('warehouse'));
    }


    public function edit($id)
    {
          $warehouse = Warehouse::findOrFail($id);
        return view('backend.warehouses.edit',compact('warehouse'));
    }


    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
            'approved_by'=>'nullable|integer',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $warehouse = Warehouse::findOrFail($id);
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->status = $request->status;
        $warehouse->remarks = $request->remarks;
        $warehouse->approved_by = $request->approved_by;
        $warehouse->created_by = $request->created_by;
        $warehouse->updated_by = $request->updated_by;
        $warehouse->save();

        return redirect()->route('warehouses.index')->with('message','Updated Successfully');
    }

//SOFT DELETES
    public function trash(){
        $warehouses = Warehouse::onlyTrashed()->get();
        return view('backend.warehouses.trash',compact('warehouses'));
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('message','Moved to Trash');

    }

    public function restore($id){
       $warehouse = Warehouse::onlyTrashed()->findOrFail($id);
        $warehouse->restore();
        return redirect()->route('warehouses.index')->with('message','Restored Successfully');

    }

        public function forceDelete($id){
       $warehouse = Warehouse::onlyTrashed()->findOrFail($id);
        $warehouse->forceDelete();
        return redirect()->route('warehouses.trash')->with('message','Permanently Deleted');

    }
}

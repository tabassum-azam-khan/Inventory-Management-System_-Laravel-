<?php

namespace App\Http\Controllers\backend;
use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Redis\RedisServiceProvider;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        return view('backend.units.index',compact('units'));
    }


    public function create()
    {
        return view('backend.units.create');
    }


    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->unit_name = $request->name;
        $unit->unit_short = $request->short;
        $unit->status = $request->status;
        $unit->remarks = $request->remarks;
        $unit->created_by = $request->created_by;
        $unit->updated_by = $request->updated_by;
        $unit->save();

        return redirect()->route('units.index')->with('message','Created Successfully');
    }


    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.units.view',compact('unit'));

    }


    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.units.edit',compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'short'=>'required|string|max:10',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->unit_name = $request->name;
        $unit->unit_short = $request->short;
        $unit->status = $request->status;
        $unit->remarks = $request->remarks;
        $unit->created_by = $request->created_by;
        $unit->updated_by = $request->updated_by;
        $unit->save();

        return redirect()->route('units.index')->with('message','Updated Successfully');
    }


//SOFT DELETE
    public function trash(){
        $units = Unit::onlyTrashed()->get();
        return view('backend.units.trash',compact('units'));
    }
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('units.index')->with('message','Moved to Trash');
    }

      public function restore($id)
    {
        $unit = Unit::onlyTrashed()->findOrFail($id);
        $unit->restore();
        return redirect()->route('units.index')->with('message','Restored Successfully');
    }

       public function forceDelete($id)
    {
        $unit = Unit::onlyTrashed()->findOrFail($id);
        $unit->forceDelete();
        return redirect()->route('units.trash')->with('message','Permanently Deleted');
    }
}

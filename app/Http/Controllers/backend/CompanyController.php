<?php

namespace App\Http\Controllers\backend;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        return view('backend.companies.index',compact('companies'));
    }


    public function create()
    {
        return view('backend.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'phone'=>'required|string|max:14|min:11',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->status = $request->status;
        $company->remarks = $request->remarks;
        $company->save();

        return redirect()->route('companies.index')->with('message','Created Successfully');
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('backend.companies.view',compact('company'));
    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('backend.companies.edit',compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'address'=>'required|string',
            'phone'=>'required|string|max:14|min:11',
            'status'=>'required|in:active,inactive',
            'remarks'=>'nullable|string|max:300',
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->status = $request->status;
        $company->remarks = $request->remarks;
        $company->save();

        return redirect()->route('companies.index')->with('message','Updated Successfully');
    }

//SOFT DELETES

    public function trash(){
        $companies = Company::onlyTrashed()->get();
        return view('backend.companies.trash',compact('companies'));
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('message','Moved to Trash');
    }

    public function restore($id){
        $company = Company::onlyTrashed()->findOrFail($id);
        $company->restore();
        return redirect()->route('companies.index')->with('message','Restored Successfully');
    }

    public function forceDelete($id){
        $company = Company::onlyTrashed()->findOrFail($id);
        $company->forceDelete();
        return redirect()->route('companies.trash')->with('message','Permanently Deleted');
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Models\Product_Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;



class SubCategoryController extends Controller
{

    public function index()
    {
    $subcategories = SubCategory::with('category')->get();

    return view('backend.subcategories.index',compact('subcategories'));
    }


    public function create()
    {
        $categories = Product_Category::all();
        return view('backend.subcategories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;
        $subcategory->remarks = $request->remarks;
        $subcategory->created_by = $request->created_by;
        $subcategory->updated_by = $request->updated_by;
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('message','Sub Category Created Successfully',compact('subcategory'));
    }


    public function show($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategories.view',compact('subcategory'));
    }

    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Product_Category::all(); //fetch category from product category table
        return view('backend.subcategories.edit',compact('subcategory','categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'category_id'=>'required|exists:product_categories,id',
            'status'=>'required|in:available,not available',
            'remarks'=>'nullable|string|max:300',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->status = $request->status;
        $subcategory->remarks = $request->remarks;
        $subcategory->created_by = $request->created_by;
        $subcategory->updated_by = $request->updated_by;
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('message','Updated Successfully');
    }

//SOFT DELETES

    public  function trash(){
        $subcategories = SubCategory::onlyTrashed()->get();
        return view('backend.subcategories.trash',compact('subcategories'));
    }


    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory-> delete();
        return redirect()->route('subcategories.index')->with('message','Moved to Trash');
    }

    public function restore($id){
        $subcategory = SubCategory::onlyTrashed()->findOrFail($id);
        $subcategory->restore();
        return redirect()->route('subcategories.index')->with('message','Restored Successfully');
    }

    public function forceDelete($id){
        $subcategory = SubCategory::onlyTrashed()->findOrFail($id);
        $subcategory->forceDelete();
        return redirect()->route('subcategories.trash')->with('message','Permanently Deleted');
    }
}

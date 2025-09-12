<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product_Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{

    public function index()
    {
         $categories = Product_Category::all();
         return view ('backend.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('backend.categories.create');
    }


    public function store(Request $request)
    {
        $category = new Product_Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->remarks = $request->remarks;
        $category->created_by = auth()->user()->name;
        $category->updated_by = auth()->user()->name;
        $category->save();

        session()->flash('message', 'Category Created Successfully');
        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        $category = Product_Category::find($id);
        return view('backend.categories.view', compact('category'));
    }


    public function edit($id)
    {
        $category = Product_Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        //validating input
        $request-> validate([
            'name'=>'required|string',
            'status'=>'required|in;active,inactive',
            'remarks'=>'nullable|string|max:300',
            'created_by'=>'nullable|integer',
            'updated_by'=>'nullable|integer',
        ]);

        $category = Product_Category::find($id);
        //UPDATE
        $category->name = $request->name;
        $category->status = $request->status;
        $category->remarks = $request->remarks;
        $category->created_by = $request->created_by;
        $category->updated_by = $request->updated_by;
        $category->save();

        session()->flash('message','Category Updated Successfully');
        return redirect()->route('categories.index');
    }

    //SOFT DELETES

    public function destroy($id){

    }



    }




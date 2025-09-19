<?php

namespace App\Http\Controllers\backend;
use App\Models\Product_Category;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category', 'subCategory','unit'])->get();
        return view('backend.products.index',compact('products'));
    }


    public function create()
    {
        $categories = Product_Category::all();
        $subcategories = SubCategory::all();
        $units = Unit::all();
        return view('backend.products.create',compact('categories','subcategories','units'));
    }


    public function store(Request $request)
    {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->unit_id = $request->unit_id;
            $product->product_code = $request-> product_code;
            $product->product_type = $request ->product_type;
            $product->product_weight = $request-> product_weight;
            $product->opening_quantity = $request-> opening_quantity;
            $product->qty_alert = $request-> qty_alert;
            $product->status = $request-> status;
            $product->generic_name = $request-> generic_name;
            $product->barcode = $request-> barcode;
            $product->remarks = $request-> remarks;
            $product->save();

            return redirect()->route('products.index')->with('message', 'Product Created Successfully.');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.view',compact('product'));
    }


    public function edit($id)
    {
        $categories = Product_Category::all();
        $subcategories = SubCategory::all();
        $units = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.products.edit',compact('categories','subcategories','units','product'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string',
        'category_id' => 'required|exists:product_categories,id',
        'sub_category_id' => 'required|exists:sub_categories,id',
        'unit_id' => 'required|exists:units,id',
        'product_code' => 'nullable|string|unique:products,product_code,' . $id,
        'product_type' => 'nullable|string',
        'product_weight' => 'nullable|string',
        'opening_quantity' => 'nullable|numeric|min:0',
        'qty_alert' => 'nullable|numeric|min:0',
        'status' => 'required|in:active,inactive',
        'generic_name' => 'nullable|string',
        'barcode' => 'nullable|string|unique:products,barcode,' . $id,
        'remarks' => 'nullable|string',
]);
    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->sub_category_id = $request->sub_category_id;
    $product->unit_id = $request->unit_id;
    $product->product_code = $request-> product_code;
    $product->product_type = $request ->product_type;
    $product->product_weight = $request-> product_weight;
    $product->opening_quantity = $request-> opening_quantity;
    $product->qty_alert = $request-> qty_alert;
    $product->status = $request-> status;
    $product->generic_name = $request-> generic_name;
    $product->barcode = $request-> barcode;
    $product->remarks = $request-> remarks;
    $product->save();
        return redirect()->route('products.index')->with('message', 'Product Updated Successfully.');
    }

   //SOFT DELETES

    public  function trash(){
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trash',compact('products'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product-> delete();
        return redirect()->route('products.index')->with('message','Moved to Trash');
    }

    public function restore($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.index')->with('message','Restored Successfully');
    }

    public function forceDelete($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('products.trash')->with('message','Permanently Deleted');
    }

}

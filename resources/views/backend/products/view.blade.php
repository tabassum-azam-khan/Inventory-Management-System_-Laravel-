@extends('backend.layouts.main')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Product Details</h1>
                    </div>
                </div>

                <div class="app-card shadow-sm mb-5">
                    <div class="app-header bg-body-primary">
                        <div class="row">
                            <h5 class="text-secondary m-3">{{ $product->name }}</h5>
                        </div>
                    </div>
                    <div class="app-card-body p-4">

                        <div class="row mb-3">
                            <div class="col-sm-3">ID :</div>
                            <div class="col-sm-9">{{ $product->id }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Category :</div>
                            <div class="col-sm-9">{{ $product->category->name }}</div>
                        </div>

                          <div class="row mb-3">
                            <div class="col-sm-3">Sub Category :</div>
                            <div class="col-sm-9">{{ $product->subcategory->name }}</div>
                        </div>

                          <div class="row mb-3">
                            <div class="col-sm-3">Unit :</div>
                            <div class="col-sm-9">{{ $product->unit->name }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Product Type :</div>
                            <div class="col-sm-9">{{ $product->product_type }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">Product Code :</div>
                            <div class="col-sm-9">{{ $product->product_code }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Product Weight :</div>
                            <div class="col-sm-9">{{ $product->product_weight }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Generic Name :</div>
                            <div class="col-sm-9">{{ $product->generic_name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Opening Quantity :</div>
                            <div class="col-sm-9">{{ $product->opening_quantity }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Qty Alert :</div>
                            <div class="col-sm-9">{{ $product->qty_alert }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Barcode :</div>
                            <div class="col-sm-9">{{ $product->barcode }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Status :</div>
                            <div class="col-sm-9">
                                @if ($product->status == 'active')
                                    <span class="badge bg-warning">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">Remarks :</div>
                            <div class="col-sm-9">{{ $product->remarks }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Created At :</div>
                            <div class="col-sm-9">{{ $product->created_at->format('F d, Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">Updated At :</div>
                            <div class="col-sm-9">{{ $product->updated_at->format('F d, Y') }}</div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <a href="{{ route('products.index') }}" class="btn app-btn-primary">
                                    <i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend.layouts.main')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <!-- Page Header -->
                <!-- Page Header -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Edit Product</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <!-- Search Form -->
                                <div class="col-auto">
                                    <form class="docs-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-docs" name="searchdocs"
                                                class="form-control search-docs" placeholder="Search" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--//row-->
                        </div>
                        <!--//page-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>

                <!-- Form Section -->
                <div class="tab-content" id="form-section">
                    <div class="tab-pane fade show active">
                        <div class="app-card shadow-sm mb-5">
                            <div class="app-card-body">

                                <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 px-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $product->name) }}" placeholder="Enter Name" required>
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select" id="category_id" name="category_id" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="sub_category_id" class="form-label">Sub-Category</label>
                                        <select class="form-select" id="sub_category_id" name="sub_category_id">
                                            <option value="">-- Select Subcategory --</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ $product->sub_category_id == $subcategory->id ? 'selected' : '' }}>
                                                    {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="unit_id" class="form-label">Unit</label>
                                        <select class="form-select" id="unit_id" name="unit_id">
                                            <option value="">-- Select Unit --</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ $product->unit_id == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->unit_short }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="product_type" class="form-label">Product Type</label>
                                        <input type="text" class="form-control" id="product_type" name="product_type"
                                            value="{{ old('product_type', $product->product_type) }}"  placeholder="Enter Type">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="product_code" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" id="product_code" name="product_code"
                                            value="{{ old('product_code', $product->product_code) }}" placeholder="Enter Product Code">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="generic_name" class="form-label">Generic Name</label>
                                        <input type="text" class="form-control" id="generic_name" name="generic_name"
                                            value="{{ old('generic_name', $product->generic_name) }}" placeholder="Enter Generic Name">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="product_weight" class="form-label">Product Weight</label>
                                        <input type="text" class="form-control" id="product_weight" name="product_weight"
                                            value="{{ old('product_weight', $product->product_weight) }}" placeholder="Enter Product Weight">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="qty_alert" class="form-label">Quantity Alert</label>
                                        <input type="number" step="0.01" class="form-control" id="qty_alert" name="qty_alert"
                                            value="{{ old('qty_alert', $product->qty_alert) }}" placeholder="Enter Quantity Alert">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="opening_quantity" class="form-label">Opening Quantity</label>
                                        <input type="number" step="0.01" class="form-control" id="opening_quantity" name="opening_quantity"
                                            value="{{ old('opening_quantity', $product->opening_quantity) }}" placeholder="Enter Opening Quantity">
                                    </div>

                                    <div class="mb-3 px-4">
                                        <label for="barcode" class="form-label">Barcode</label>
                                        <input type="text" class="form-control" id="barcode" name="barcode"
                                            value="{{ old('barcode', $product->barcode) }}" placeholder="Enter Barcode">
                                    </div>

                                    <div class="mb-4 px-4">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" cols="30" rows="5"
                                            placeholder="Add Remarks">{{ old('remarks', $product->remarks) }}</textarea>
                                    </div>

                                    <!-- Submit -->
                                    <div class="mb-3 px-4">
                                            <button type="submit" class="btn app-btn-primary">Update</button>
                                            <a href="{{ route('products.index') }}" class="btn app-btn-secondary">Cancel</a>
                                        </div>

                                </form>

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                </div>
                <!--//tab-content / form section-->
            </div>
            <!--//container-xl-->
        </div>
        <!--//app-content-->
    </div>
    <!--//app-wrapper-->
@endsection

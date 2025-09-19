@extends('backend.layouts.main')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <!-- Page Header -->
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Create New Warehouse</h1>
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
                <!--//row-->

                <!-- Form Section -->
                <div class="tab-content" id="form-section">
                    <div class="tab-pane fade show active">
                        <div class="app-card shadow-sm mb-5">
                            <div class="app-card-body">

                                <form action="{{ route('warehouses.store') }}" method="POST" class="p-4">
                                    @csrf
                                    <!-- Form fields -->
                                    <div class="mb-3 px-4">
                                        <label for="name" class="form-label" required>Name</label>
                                        <input type="text" class="form-control"
                                            id="name" name="name" placeholder="Enter Name">
                                                                           </div>
                                    <div class="mb-3 px-4">
                                        <label for="address" class="form-label" required>Address</label>
                                        <input type="text" class="form-control"
                                            id="address" name="address" placeholder="Enter Address">
                                                                           </div>

                                    <div class="mb-3 px-4">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>

                                    </div>

                                    <div class="mb-4 px-4">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" cols="30" rows="5" placeholder="Add Remarks"></textarea>

                                    </div>

                                    <div class="mb-3 px-4">
                                        <button type="submit" class="btn app-btn-primary">Create Warehouse</button>
                                    </div>
                                </form>

                            </div>
                            <!--//app-card-body-->
                        </div>s
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

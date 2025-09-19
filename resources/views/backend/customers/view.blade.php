@extends('backend.layouts.main')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                {{-- Main Part  --}}
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Customer Details</h1>
                    </div>
                </div>
                <div class="app-card shadow-sm mb-5">
                    <div class="app-header bg-body-primary">
                        <div class="row">
                            <h5 class="text-secondary m-3">{{ $customer->name }}</h5>
                        </div>
                    </div>

                    <div class="app-card-body p-4">
                        <div class="row mb-3">
                            <div class="col-sm-3">ID :</div>
                            <div class="col-sm-9">{{ $customer->id }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Email :</div>
                            <div class="col-sm-9">{{ $customer->email }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Phone :</div>
                            <div class="col-sm-9">{{ $customer->phone }}</div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">Address :</div>
                            <div class="col-sm-9">{{ $customer->address }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Status :</div>
                            <div class="col-sm-9">
                                @if ($customer->status == 'active')
                                    <span class="badge bg-warning">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">Remarks :</div>
                            <div class="col-sm-9">{{ $customer->remarks }}</div>
                        </div>

                          <div class="row mb-3">
                            <div class="col-sm-3">Email Varified at :</div>
                            <div class="col-sm-9">{{ $customer->email_varified_at }}</div>
                        </div>
                          <div class="row mb-3">
                            <div class="col-sm-3">Approved BY :</div>
                            <div class="col-sm-9">{{ $customer->approved_by }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">Created_at :</div>
                            <div class="col-sm-9">{{ $customer->created_at->format('F d, Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">Updated_at :</div>
                            <div class="col-sm-9">{{ $customer->updated_at->format('F d, Y') }}</div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <a href="{{ route('customers.index') }}" class="btn app-btn-primary">
                                    <i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
    </div>
    <!--//app-wrapper-->
@endsection

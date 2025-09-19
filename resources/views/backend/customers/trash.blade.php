@extends('backend.layouts.main')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                @if (Session::has('message'))
                    <div class="col-auto">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                {{-- Main Part  --}}
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Customers Trash</h1>
                    </div>
                </div>
                <!--//row-->

                <!-- Users Table  -->
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover text-left m-3">
                                        <thead>
                                            <tr>
                                                <th class="cell">ID</th>
                                                <th class="cell">Name</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">Phone</th>
                                                 <th class="cell">Address</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if ($customers->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center text-secondary">No user found.</td>
                                                </tr>
                                            @else

                                                @foreach ($customers as $customer)
                                                    <tr>
                                                       <td class="cell">{{ $customer->id }}</td>
                                                    <td class="cell">{{ $customer->name }}</td>
                                                    <td class="cell">{{ $customer->email }}</td>
                                                    <td class="cell">{{ $customer->phone }}</td>
                                                    <td class="cell">{{ $customer->address }}</td>
                                                        <td class="cell">
                                                            @if ($customer->status == 'active')
                                                                <span class="badge bg-warning">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="cell text-nowrap">
                                                            <div class="d-flex g-2">
                                                                <form action="{{ route('customers.restore', $customer->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn app-btn-primary2"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd"
                                                                            d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                                                        <path
                                                                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                                                    </svg></button>
                                                            </form>

                                                            <form action="{{ route('customers.forceDelete', $customer->id) }}"
                                                                method="POST" style="display:inline-block;"
                                                                onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn app-btn-danger"
                                                                    tooltip="Delete Permanently"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                                    </svg></button>
                                                            </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                </div>
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->
    </div>
    <!--//app-wrapper-->
@endsection

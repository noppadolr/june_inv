@extends('admin.layout.master')
@section('title','Add Supplier')
@section('content')
@push('style')

@endpush

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Supplier</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Inventory</a></li>
                            <li class="breadcrumb-item active">Add Supplier</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start input area -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Supplier</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{ route('supplier.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Supplier Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name">
                                        @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email">
                                        @error('email')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone">
                                        @error('phone')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <div>
                                            <textarea  class="form-control @error('address') is-invalid @enderror" rows="4" name="address"></textarea>
                                            @error('address')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div>
                                <button class="btn btn-primary mt-3" type="submit"><i class="fas fa-save" > Save</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- end input area -->

    </div>
</div>

@push('scripts')





@endpush
@endsection
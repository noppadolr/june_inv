@extends('admin.layout.master')
@section('title','All Supplier')
@section('content')
@push('style')
<!-- DataTables -->
<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endpush
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Supplier All</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Inventory</a></li>
                            <li class="breadcrumb-item active">Supplier All</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('supplier.add') }}"
                            class="btn btn-primary btn-rounded waves-effect waves-light" style="float:right;"><i
                                class="fas fa-plus-circle"> Add Supplier </i></a> <br> <br>
                       

                        <h4 class="card-title">Supplier All Data </h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone Number </th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>

                            </thead>
                            <tbody>

                                @foreach($suppliers as $key => $item)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->phone }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->address }} </td>
                                    <td>
                                        <a href="{{ route('supplier.edit',$item->id) }}"
                                            class="btn btn-warning btn-sm editbtn" id="editbutton" title="Edit Data"> <i
                                                class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('supplier.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"> <i
                                                class="fas fa-trash-alt"></i> </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
</div>
@push('scripts')
<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('code/code.js') }}"></script>

<!-- Datatable init js -->
{{-- <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script> --}}
<script>        
    @if(Session::has('supplier_updated'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    backdrop: true,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('supplier_updated') }}',  
                });
            
            });    
    @endif
    </script>

<script>        
    @if(Session::has('deleted'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    backdrop: true,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('deleted') }}',  
                });
            
            });    
    @endif
    </script>



@endpush
@endsection
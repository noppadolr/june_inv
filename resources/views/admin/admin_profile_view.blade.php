@extends('admin.layout.master')
@section('title','Admin Profile')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('avatarinput/style.css') }}">

@endpush
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">My Inventory</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-6">
                <!-- ข้อมูลส่วนบุคคล -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Your Profile</h4>
                    </div>
                    <center>
                        <img class="rounded-circle avatar-sm mt-2" src="{{ url($adminData->avatar) }}"
                        style="width: 100px;height: 100px;"
                        alt="Card image cap">

                    </center>
                    
                 

                    <div class="card-body">
                        <div class="row">   <hr>
                            <div class="col-md-2">
                                <h4 class="card-title">Name :</h4>
                            </div>
                            <div class="col-md-10">
                                <h4 class="card-title">{{ $adminData->name }}</h4>
                            </div>
                            <hr>
                        </div>
                        {{-- <hr> --}}
                        {{-- row --}}
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="card-title">Username :</h4>
                            </div>
                            <div class="col-md-10">
                                <h4 class="card-title">{{ $adminData->username }}</h4>
                            </div>
                            <hr>
                        </div>
                        {{-- row --}}
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="card-title">Email :</h4>
                            </div>
                            <div class="col-md-10">
                                <h4 class="card-title">{{ $adminData->email }}</h4>
                            </div>
                            <hr>
                        </div>
                        {{-- row --}}
                        <div class="row">
                            <div class="col-md-2">
                                <h4 class="card-title">Phone :</h4>
                            </div>
                            <div class="col-md-10">
                                <h4 class="card-title">{{ $adminData->phone }}</h4>
                            </div>
                            <hr>
                        </div>
                        {{-- row --}}


                    </div>
                </div>
                {{-- จบ ข้อมูลส่วนตัว --}}

                {{-- เปลี่ยน Password --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Your Password</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('admin.update.password')}}" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password"  >
                                        @error('current_password')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

               
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" >
                                        @error('password_confirmation')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                                



                            <div>

                                <button class="btn btn-warning mt-3" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- จบ เปลี่ยน Password --}}
            </div>
            <!-- แก้ข้อมูล -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{route('update.profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $adminData->name }}" >
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                        id="username" value="{{ $adminData->username }}" name="username" >
                                        @error('username')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $adminData->email }}" >
                                        @error('email')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $adminData->phone }}" >
                                        @error('phone')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="image" name="avatar">
                                    </div>
                                </div>  
                            </div>

                            <div class="row mb-2">
                                <label for="showImage" class="col-sm-1 col-form-label"></label>
                                <div class="col-sm-11">
                                    <img class="img-fluid rounded" id="showImage" src="{{ url($adminData->avatar) }}" alt="">
                                </div>
                            </div>

                            <div>

                                <button class="btn btn-primary mt-3" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- แก้ข้อมูล -->



        </div>
         <!-- ข้อมูลส่วนบุคคล -->


    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script>        
    @if(Session::has('Profileupdated'))
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
                title: '{{ session('Profileupdated') }}',  
                });
            
            });    
    @endif
    </script>


@endpush

@endsection
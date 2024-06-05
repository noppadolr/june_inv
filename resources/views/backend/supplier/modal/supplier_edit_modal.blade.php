



{{-- <div class="col-sm-6 col-md-4 col-xl-3"> --}}
    <!-- Modal -->
    <div class="modal fade" id="supplierEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="#supplierEditModal" aria-hidden="true">
        <div class="modal-dialog {{-- modal-dialog-centered --}}" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierEditModal"><i class="fas fa-edit"></i> Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="post" action="{{ route('supplier.update') }}">
                        @csrf
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Supplier Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" 
                                        name="name"
                                        value="{{ $item->name }}">
                                    @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Supplier Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" 
                                        name="phone"
                                        value="{{ $item->phone }}">
                                    @error('phone')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Supplier Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" 
                                        name="email"
                                        value="{{ $item->email }}">
                                    @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Address</label>
                                    <div>
                                        <textarea   class="form-control @error('address') is-invalid @enderror" 
                                                    rows="4" 
                                                    name="address" 
                                                    >{{ $item->address }}
                                        </textarea>
                                        @error('address')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> --}}
                        {{-- </div> --}}
                  
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </form>
            </div>

        </div>
    </div>
{{-- </div> --}}


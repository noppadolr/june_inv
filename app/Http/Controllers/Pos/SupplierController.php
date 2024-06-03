<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSupplierRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class SupplierController extends Controller
{
    public function SupplierAll(){

        
        $suppliers = Supplier::query()->latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));

    }
    //End Method

    public function SupplierAdd()
    {
        return view('backend.supplier.supplier_add');
    }
    //end method

    public function store(AddSupplierRequest $request)
    {
        $id = Auth::user()->id;
        Supplier::insert([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'address'=>$request->address,
            'created_by'=>$id,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Supplier Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }//End emthod





}

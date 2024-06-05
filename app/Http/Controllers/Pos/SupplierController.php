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

    public function SupplierEdit($id){
       $suppliers = Supplier::query()->findOrFail($id);
       return view('backend.supplier.supplier_edit',compact('suppliers'));

       
    }//end Method

    public function SupplierUpdate(Request $request){

        $request->validate(
           [
            'name'=>'required|string',
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'address'=>'required|string',
           ]
        );
        $supplier = Supplier::find($request->input('find_id'));
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_at = Carbon::now();
        $supplier->updated_by= Auth::user()->id;
        $supplier->update();
        return redirect(route('supplier.all'))->with('supplier_updated','Supplier Updated Successfully');
    }
    //end method
    public function SupplierDelete($id){
        Supplier::query()->findOrFail($id)->delete();
        return redirect()->back()->with('deleted','Supplier Delete Successfully');



    }
    //end method








}

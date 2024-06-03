<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function UpdateProfile(ProfileUpdateRequest $request)
    {
        $id = Auth::user()->id;
        $data = User::query()->find($id);
        $data->name =$request->name;
        $data->username =$request->username;
        $data->phone =$request->phone;
        $data->email =$request->email;
        $data->updated_at = Carbon::now();
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            @unlink(public_path('uploads/adminImages/' . $data->avatar));

            $filename ='uploads/adminImages/'. $id . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/adminImages'), $filename);
            $data['avatar'] = $filename;
        }
        $data->save();
        return redirect()->route('admin.profile')->with('Profileupdated','Admin Profile Updated');
    }//End method

    public function UpdatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        /** @var \App\Models\User $user **/
        $user->save();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login')->with('password-changed','Update Password Successfully');
    }//End Method
}

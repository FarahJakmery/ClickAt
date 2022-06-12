<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.User.users', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        Validator::make(
            $request->all(),
            [
                'name'            => 'required|string|max:255',
                'email'           => 'required|string|email', Rule::unique('users')->ignore($user->id),
                'password'        => 'required|confirmed|string|min:5|max:30',
                'mobile_number'   => 'required|string|min:10|max:25',
            ]
        );

        $user->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'mobile_number'  => $request->mobile_number,
            'password'       => Hash::make($request->password),
        ]);

        session()->flash('edit', 'تم تعديل بيانات المستخدم بنجاح');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        session()->flash('delete', 'تم حذف المستخدم بنجاح');
        return redirect('/admin/users');
    }
}

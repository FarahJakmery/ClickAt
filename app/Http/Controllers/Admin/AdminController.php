<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('Admin.admin.admins', compact('admins'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|unique:admins,email',
            'password'        => 'required|string|min:5|max:30',
        ]);

        $admin = new Admin();
        $admin->name          = $request->name;
        $admin->email         = $request->email;
        $admin->password      = Hash::make($request->password);
        $save                = $admin->save();

        if ($save) {
            return redirect()->back()->with('success', 'تم إنشاء حساب آدمن بنجاح');
        } else {
            return redirect()->back()->with('fail', 'حدث خطأ ما، فشل تسجيل الحساب');
        }
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
        Validator::make(
            $request->all(),
            [
                'name'            => 'required|string|max:255',
                'email'           => 'required|string|email', Rule::unique('admins')->ignore(auth()->id()),
                'password'        => 'required|string|min:5|max:30',
            ]
        );

        $admin = Admin::find($request->id);
        $admin->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
        ]);

        session()->flash('edit', 'تم تعديل بيانات مدير الموقع بنجاح');
        return redirect('/admin/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $admin = Admin::find($id);
        $admin->delete();
        session()->flash('delete', 'تم حذف مدير الموقع بنجاح');
        return redirect('/admin/admins');
    }

    public function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email'    => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'البريد الإلكتروني غير مطابق'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'بيانات الاعتماد غير صحيحة');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}

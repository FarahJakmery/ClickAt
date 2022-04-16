<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('User.Auth.login');
    }

    public function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|confirmed|min:5|max:30',
            'mobile_number'   => 'required',
        ]);

        $user = new User();
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $save                = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'تم إنشاء الحساب بنجاح');
        } else {
            return redirect()->back()->with('fail', 'حدث خطأ ما، فشل تسجيل الحساب');
        }
    }

    public function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'البريد الإلكتروني غير مطابق'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'بيانات الاعتماد غير صحيحة');
        }
    }

    function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}

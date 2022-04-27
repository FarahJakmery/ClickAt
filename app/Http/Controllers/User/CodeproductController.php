<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Codeproduct;
use Illuminate\Http\Request;

class CodeproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Codeproduct::all();
        return view('User.Code.codes', compact('codes'));
    }
}

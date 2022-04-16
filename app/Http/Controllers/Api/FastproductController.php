<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fastproduct;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FastproductController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new Carbon;
        $fastproducts = Fastproduct::translated()->where('expiry_date', '>', $date)->get();
        return $this->apiResponse($fastproducts, 'ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fastproduct = Fastproduct::find($id);
        if ($fastproduct) {
            return $this->apiResponse($fastproduct, 'OK', 200);
        }
        return $this->apiResponse($fastproduct, 'The Quick Selling Product Not Found', 401);
    }
}

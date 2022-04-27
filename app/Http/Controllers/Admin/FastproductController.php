<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Fastproduct;
use App\Models\Mcategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class FastproductController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Fastproduct::translated()->get();
        $MCates = Mcategory::translated()->get();
        return view('Admin.fastProducts.all_products', compact('products', 'MCates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MCates = Mcategory::translated()->get();
        return view('Admin.fastProducts.add_product', compact('MCates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'product_number'             => ['required'],
                'name_ar'                    => ['required'],
                'name_en'                    => ['required'],
                'description_ar'             => ['required'],
                'description_en'             => ['required'],
                'min_price'                  => ['required'],
                'max_price'                  => ['required'],
                'counter'                    => ['required'],
                'minutes'                    => ['required'],
                'quantity'                    => ['required'],
                'decreasing_value'           => ['required'],
                'photo_name'                 => ['required'],
                'mcategories'                => ['required'],
                'product_date'               => ['required'],
                'expiry_date'                => ['required'],
            ]
        );

        // fetch the values
        $startTime = Carbon::now();
        $endTime = $request->expiry_date;
        //
        $datetime1 = date_create($startTime);
        $datetime2 = date_create($endTime);
        // find the difference between to Dates
        $interval = date_diff($datetime1, $datetime2);
        // formating the result
        $counter = $interval->format('Year %y Month %m Day %d  Hours %h Minute %i Seconds %s ');
        // Store Image
        $image_name = $this->saveImage($request->file('photo_name'), 'images/Fast_Product', 230, 230);

        $data = [
            'product_number'             => $request['product_number'],
            'min_price'                  => $request['min_price'],
            'max_price'                  => $request['max_price'],
            'counter'                    => $counter,
            'minutes'                    => $request['minutes'],
            'quantity'                   => $request['quantity'],
            'decreasing_value'           => $request['decreasing_value'],
            'product_date'               => $request['product_date'],
            'expiry_date'                => $request['expiry_date'],
            'photo_name'                 => $image_name,
            'ar' => [
                'name'                    => $request['name_ar'],
                'description'             => $request['description_ar'],
            ],
            'en' => [
                'name'                    => $request['name_en'],
                'description'             => $request['description_en'],
            ],
        ];

        $product = Fastproduct::create($data);

        $product->mcategories()->attach($request->mcategories);

        session()->flash('Add', 'تم إضافة المنتج بنجاح');
        return redirect('/admin/fastSellingProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fastproduct  $fastproduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Fastproduct::find($id);
        return view('Admin.fastProducts.show_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fastproduct  $fastproduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Fastproduct::find($id);
        $MCates = Mcategory::translated()->get();
        return view('Admin.fastProducts.edit_product', compact('product', 'MCates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fastproduct  $fastproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Fastproduct::find($id);
        Validator::make(
            $request->all(),
            [
                'product_number'             => ['required'],
                'name_ar'                    => ['required'],
                'name_en'                    => ['required'],
                'description_ar'             => ['required'],
                'description_en'             => ['required'],
                'min_price'                  => ['required'],
                'max_price'                  => ['required'],
                'counter'                    => ['required'],
                'minutes'                    => ['required'],
                'quantity'                    => ['required'],
                'decreasing_value'           => ['required'],
                'photo_name'                 => ['required'],
                'mcategories'                => ['required'],
                'product_date'               => ['required'],
                'expiry_date'                => ['required'],
            ]
        );

        // Update The Image
        if ($request->hasFile('photo_name')) {
            $destination = $product->photo_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image_name = $this->saveImage($request->file('photo_name'), 'images/Fast_Product', 230, 230);
        }

        // fetch the values
        $startTime = Carbon::now();
        $endTime = $request->expiry_date;
        //
        $datetime1 = date_create($startTime);
        $datetime2 = date_create($endTime);
        // find the difference between to Dates
        $interval = date_diff($datetime1, $datetime2);
        // formating the result
        $counter = $interval->format('Year %y Month %m Day %d  Hours %h Minute %i Seconds %s ');



        $data = [
            'product_number'             => $request['product_number'],
            'min_price'                  => $request['min_price'],
            'max_price'                  => $request['max_price'],
            'counter'                    => $counter,
            'minutes'                    => $request['minutes'],
            'quantity'                   => $request['quantity'],
            'decreasing_value'           => $request['decreasing_value'],
            'product_date'               => $request['product_date'],
            'expiry_date'                => $request['expiry_date'],
            'photo_name'                 => $image_name,
            'ar' => [
                'name'                    => $request['name_ar'],
                'description'             => $request['description_ar'],
            ],
            'en' => [
                'name'                    => $request['name_en'],
                'description'             => $request['description_en'],
            ],
        ];

        $product->update($data);
        $product->mcategories()->sync($request->mcategories);

        session()->flash('Add', 'تم تعديل المنتج بنجاح');
        return redirect('/admin/fastSellingProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fastproduct  $fastproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fastProduct = Fastproduct::find($id);
        $destination = $fastProduct->photo_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $fastProduct->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/admin/fastSellingProduct');
    }
}

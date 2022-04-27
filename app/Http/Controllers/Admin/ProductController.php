<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mcategory;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::translated()->get();
        $MCates   = Mcategory::translated()->get();
        return view('Admin.Products.products', compact('products', 'MCates'));
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
                'product_name_ar'  => ['required|unique:products|max:255'],
                'product_name_en'  => ['required|unique:products|max:255'],
                'description_ar'   => ['required|string|max:255'],
                'description_en'   => ['required|string|max:255'],
                'url'              => ['required'],
                'price'            => ['required'],
                'photo_name'       => ['required|mimes:jpeg,png,jpg'],
                'mcategories'      => ['required|array']
            ],
            [
                'product_name_ar.required'    => 'Please enter the Main Category Name',
                'product_name_ar.unique'      => 'Main Category Name is already registered',
                'photo_name.mimes'            => 'Error, Logo must be in one of the required formats',
            ]
        );

        // Store Image
        $image_name = $this->saveImage($request->file('photo_name'), 'images/Product', 300, 310);

        $data = [
            'photo_name'          => $image_name,
            'url'                 => $request['url'],
            'price'               => $request['price'],
            'ar' => [
                'product_name'    => $request['product_name_ar'],
                'description'     => $request['description_ar'],
            ],
            'en' => [
                'product_name'   => $request['product_name_en'],
                'description'    => $request['description_en'],
            ],
        ];

        $product = Product::create($data);

        $product->maincategories()->attach($request->mcategories);

        session()->flash('Add', 'تم إضافة المنتج بنجاح');
        return redirect('/admin/products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $product = Product::find($id);
        Validator::make(
            $request->all(),
            [
                'product_name_ar'  => ['required|max:255|unique:products,photo_name,' . $id],
                'product_name_en'  => ['required|max:255|unique:products,photo_name,' . $id],
                'description_ar'   => ['required'],
                'description_en'   => ['required'],
                'url'              => ['required'],
                'price'            => ['required'],
                'photo_name'       => ['required|mimes:jpeg,png,jpg'],
                'mcategories'      => ['required|array']
            ],
            [
                'product_name_ar.required'    => 'Please enter the Product Name',
                'product_name_ar.unique'      => 'Product Name is already registered',
                'photo_name.mimes'            => 'Error, Photo must be in one of the required formats',
            ]
        );

        //Update Image
        if ($request->hasFile('photo_name')) {
            $destination = $product->photo_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image_name = $this->saveImage($request->file('photo_name'), 'images/Product', 300, 310);
        }

        $data = [
            'photo_name'          => $image_name,
            'url'                 => $request['url'],
            'price'               => $request['price'],
            'ar' => [
                'product_name'    => $request['product_name_ar'],
                'description'     => $request['description_ar'],
            ],
            'en' => [
                'product_name'   => $request['product_name_en'],
                'description'    => $request['description_en'],
            ],
        ];

        $product->update($data);

        $product->maincategories()->sync($request->mcategories);

        session()->flash('edit', 'تم تعديل المنتج بنجاح');
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $destination =  $product->photo_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/admin/products');
    }
}

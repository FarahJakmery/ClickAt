<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Codeproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CodeproductController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Codeproduct::translated()->get();
        return view('Admin.CodeProducts.codeproducts', compact('codes'));
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
                'codeproduct_name_ar'  => ['required|unique:codeproducts|max:255'],
                'codeproduct_name_en'  => ['required|unique:codeproducts|max:255'],
                'url'                  => ['required'],
                'code'                 => ['required'],
                'photo_name'           => ['required|mimes:jpeg,png,jpg'],
            ],
            [
                'codeproduct_name_ar.required'    => 'Please enter the Main Category Name',
                'codeproduct_name_ar.unique'      => 'Main Category Name is already registered',
                'photo_name.mimes'                => 'Error, Logo must be in one of the required formats',
            ]
        );
        // Store Image
        $image_name = $this->saveImage($request->file('photo_name'), 'images/Code_Product');

        $data = [
            'photo_name'           => $image_name,
            'url'                  => $request['url'],
            'code'                 => $request['code'],
            'ar' => [
                'codeproduct_name'    => $request['codeproduct_name_ar'],
            ],
            'en' => [
                'codeproduct_name'   => $request['codeproduct_name_en'],
            ],
        ];

        Codeproduct::create($data);

        session()->flash('Add', 'تم إضافة المنتج بنجاح');
        return redirect('/admin/productWithCode');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codeproduct  $codeproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $code = Codeproduct::find($id);
        Validator::make(
            $request->all(),
            [
                'codeproduct_name_ar'  => ['required|max:255|unique:codeproducts,photo_name,' . $id],
                'codeproduct_name_en'  => ['required|max:255|unique:codeproducts,photo_name,' . $id],
                'url'                  => ['required'],
                'code'                 => ['required'],
                'photo_name'           => ['required|mimes:jpeg,png,jpg'],
            ],
            [
                'codeproduct_name_ar.required'    => 'Please enter the Product Name',
                'codeproduct_name_ar.unique'      => 'Product Name is already registered',
                'photo_name.mimes'            => 'Error, Photo must be in one of the required formats',
            ]
        );

        if ($request->hasFile('photo_name')) {
            $destination = $code->photo_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image_name = $this->saveImage($request->file('photo_name'), 'images/Code_Product');
        }

        $data = [
            'photo_name'           => $image_name,
            'url'                  => $request['url'],
            'code'                 => $request['code'],
            'ar' => [
                'codeproduct_name'    => $request['codeproduct_name_ar'],
            ],
            'en' => [
                'codeproduct_name'   => $request['codeproduct_name_en'],
            ],
        ];

        $code->update($data);

        session()->flash('edit', 'تم تعديل المنتج بنجاح');
        return redirect('/admin/productWithCode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codeproduct  $codeproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $code = Codeproduct::find($id);
        $destination = $code->photo_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $code->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/admin/productWithCode');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\product;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use \Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = DB::table('products')->select(
            'products.*',
            'categories.*'
            )
            ->leftjoin('categories','categories.category_id', 'products.cat_id')
            ->where('products.user_id', Auth::user()->id)
            ->orderBy('products.id', 'desc')
            ->get();

      $data['objs'] = $shop;
      $data['header'] = "สินค้าทั้งหมด";
      return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $shop = DB::table('categories')->select(
            'categories.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('category_id', 'asc')
            ->get();

      $data['objs'] = $shop;


      $data['method'] = "post";
      $data['url'] = url('product');
      $data['header'] = "สร้างสินค้า ของคุณใหม่";
      return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
       'image' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
       'product_name' => 'required',
       'product_code' => 'required',
       'product_cat' => 'required',
       'product_sum' => 'required',
       'product_detail' => 'required'
      ]);

      $image = $request->file('image');

      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $img = Image::make($image->getRealPath());
       $img->resize(500, 500, function ($constraint) {
       $constraint->aspectRatio();
     })->save('assets/product/'.$input['imagename']);


     $package = new product;
     $package->user_id = Auth::user()->id;
     $package->cat_id = $request['product_cat'];
     $package->product_name = $request['product_name'];
     $package->product_detail = $request['product_detail'];
     $package->product_code = $request['product_code'];
     $package->product_sum = $request['product_sum'];
     $package->product_image = $input['imagename'];
     $package->product_status = 0;
     $package->save();

 $the_id = $package->id;

 return redirect(url('product/'.$the_id.'/edit'))->with('success_product','เพิ่มร้านค้าสำเร็จแล้วค่ะ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $shop = DB::table('products')->select(
              'products.*',
              'categories.*'
              )
              ->leftjoin('categories','categories.category_id', 'products.cat_id')
              ->where('products.user_id', Auth::user()->id)
              ->where('products.id', $id)
              ->orderBy('products.id', 'desc')
              ->first();

        $data['objs'] = $shop;


        $cat = DB::table('categories')->select(
              'categories.*'
              )
              ->where('user_id', Auth::user()->id)
              ->orderBy('category_id', 'asc')
              ->get();

        $data['cat'] = $cat;

        $data['header'] = 'แก้ไข '.$shop->product_name;
        $data['url'] = url('user_shop/'.$id);
        $data['method'] = "put";
        return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

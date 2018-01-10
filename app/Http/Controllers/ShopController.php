<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\province;
use App\shop;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shop = DB::table('shops')->select(
            'shops.*'
            )
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();

      $data['objs'] = $shop;
      $data['header'] = "Shop";
      return view('shop.user_shop', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $province = province::All();
      $data['province'] = $province;
      $data['header'] = 'New Shop';
      $data['method'] = 'post';
      $data['url'] = url('user_shop');
      return view('shop.create',$data);
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
       'file_source' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
       'shop_name' => 'required',
       'shop_group' => 'required',
       'shop_type' => 'required',
       'address' => 'required',
       'shop_phone' => 'required',
       'provience_id' => 'required',
       'lat' => 'required',
       'lng' => 'required',
       'shop_sale' => 'required',
       'shop_code' => 'required',
       'channel' => 'required',
       'shop_area' => 'required'
      ]);

         $image = $request->file('file_source');

         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
          $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/blog/'.$input['imagename']);


         $package = new shop;
         $package->user_id = Auth::user()->id;
         $package->shop_name = $request['shop_name'];
         $package->shop_group = $request['shop_group'];
         $package->shop_type = $request['shop_type'];
         $package->shop_address = $request['address'];
         $package->shop_phone = $request['shop_phone'];
         $package->provience_id = $request['provience_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->shop_sale = $request['shop_sale'];
         $package->shop_code = $request['shop_code'];
         $package->channel = $request['channel'];
         $package->shop_area = $request['shop_area'];
         $package->detail_shop = $request['detail_shop'];
         $package->image_shop = $input['imagename'];
         $package->save();

     $the_id = $package->id;

     return redirect(url('user_shop/'.$the_id.'/edit'))->with('success_shop','เพิ่มร้านค้าสำเร็จแล้วค่ะ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $shop = DB::table('shops')->select(
            'shops.*',
            'shops.id as p_id',
            'province.*'
            )
            ->leftjoin('province', 'province.PROVINCE_ID', '=', 'shops.provience_id')
            ->where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->first();

      $data['header'] = $shop->shop_name;
      $data['objs'] = $shop;
      $data['url'] = url('user_shop/'.$id);
      return view('shop.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $shop = DB::table('shops')->select(
            'shops.*',
            'shops.id as p_id',
            'province.*'
            )
            ->leftjoin('province', 'province.PROVINCE_ID', '=', 'shops.provience_id')
            ->where('shops.user_id', Auth::user()->id)
            ->where('shops.id', $id)
            ->first();

            $province = province::All();
            $data['province'] = $province;

      $data['objs'] = $shop;
      $data['header'] = 'แก้ไข '.$shop->shop_name;
      $data['url'] = url('user_shop/'.$id);
      $data['method'] = "put";
      return view('shop.edit',$data);
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
        $image = $request->file('file_source');



        if($image == NULL){

          $this->validate($request, [
           'shop_name' => 'required',
           'shop_group' => 'required',
           'shop_type' => 'required',
           'address' => 'required',
           'shop_phone' => 'required',
           'provience_id' => 'required',
           'lat' => 'required',
           'lng' => 'required',
           'shop_sale' => 'required',
           'shop_code' => 'required',
           'channel' => 'required',
           'shop_area' => 'required'
          ]);

          $package = shop::find($id);
          $package->user_id = Auth::user()->id;
          $package->shop_name = $request['shop_name'];
          $package->shop_group = $request['shop_group'];
          $package->shop_type = $request['shop_type'];
          $package->shop_address = $request['address'];
          $package->shop_phone = $request['shop_phone'];
          $package->provience_id = $request['provience_id'];
          $package->lat = $request['lat'];
          $package->lng = $request['lng'];
          $package->shop_sale = $request['shop_sale'];
          $package->shop_code = $request['shop_code'];
          $package->channel = $request['channel'];
          $package->shop_area = $request['shop_area'];
          $package->detail_shop = $request['detail_shop'];
          $package->save();

         return redirect(url('user_shop/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');

        }else{

          $this->validate($request, [
           'file_source' => 'required|mimes:jpg,jpeg,png,gif|max:8048',
           'shop_name' => 'required',
           'shop_group' => 'required',
           'shop_type' => 'required',
           'address' => 'required',
           'shop_phone' => 'required',
           'provience_id' => 'required',
           'lat' => 'required',
           'lng' => 'required',
           'shop_sale' => 'required',
           'shop_code' => 'required',
           'channel' => 'required',
           'shop_area' => 'required'
          ]);


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
           $img = Image::make($image->getRealPath());
           $img->resize(500, 500, function ($constraint) {
           $constraint->aspectRatio();
         })->save('assets/blog/'.$input['imagename']);


         $package = shop::find($id);
         $package->user_id = Auth::user()->id;
         $package->shop_name = $request['shop_name'];
         $package->shop_group = $request['shop_group'];
         $package->shop_type = $request['shop_type'];
         $package->shop_address = $request['address'];
         $package->shop_phone = $request['shop_phone'];
         $package->provience_id = $request['provience_id'];
         $package->lat = $request['lat'];
         $package->lng = $request['lng'];
         $package->shop_sale = $request['shop_sale'];
         $package->shop_code = $request['shop_code'];
         $package->channel = $request['channel'];
         $package->shop_area = $request['shop_area'];
         $package->detail_shop = $request['detail_shop'];
         $package->image_shop = $input['imagename'];
         $package->save();

         return redirect(url('user_shop/'.$id.'/edit'))->with('edit_success','คุณทำการแก้ไขอสังหา สำเร็จ');


        }




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

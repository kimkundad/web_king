<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = DB::table('users')
            ->select(
            'users.*'
            )
            ->where('users.id', Auth::user()->id)
            ->first();
        $data['header'] = "User Profile";
        $data['method'] = "put";
        $data['user'] = $user;
        return view('user_profile', $data);
    }

    public function update_pic(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= time().'.png';
        $path = public_path() . "/assets/img/avatar/" . $image_name;
        file_put_contents($path, $data);

        $id = Auth::user()->id;

        $package = User::find($id);
        $package->avatar = $image_name;
        $package->save();

        return response()->json(['success'=>'done']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $this->validate($request, [
      'company' => 'required',
      'name' => 'required',
      'email' => 'required|email|max:255|exists:users',
      'phone' => 'required',
      'first_name' => 'required',
      'last_name' => 'required',
      'address' => 'required'
      ]);

      $package = User::find($id);
      $package->name = $request['name'];
      $package->first_name = $request['first_name'];
      $package->last_name = $request['last_name'];
      $package->phone = $request['phone'];
      $package->address = $request['address'];
      $package->bio = $request['bio'];
      $package->company = $request['company'];
      $package->email = $request['email'];
      $package->save();

      return redirect(url('user_profile'))->with('success_user','แก้ไขบทความสำเร็จแล้วค่ะ');
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

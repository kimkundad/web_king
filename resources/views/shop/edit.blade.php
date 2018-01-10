@extends('layouts.template')
@section('stylesheet')
<link href="{{url('assets/croppie/croppie.css')}}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
.card-user .avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    position: relative;
    margin-bottom: 15px;
}
</style>
@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">


                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="...">
                            </div>
                            <div class="content">
                                <div class="author">


                                  @if($user->provider == 'email')
                                  <img class="avatar border-white" src="assets/img/avatar/{{$user->avatar}}" alt="{{Auth::user()->name}}">
                                  @else
                                  <img class="avatar border-white" src="//{{$user->avatar}}" alt="{{Auth::user()->name}}">
                                  @endif


                                  <h4 class="title">{{Auth::user()->name}}<br>
                                     <a href="#"><small>@ {{Auth::user()->name}}</small></a>
                                  </h4>
                                </div>
                                <p class="description text-center">
                                    "{{Auth::user()->bio}}"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5>12<br><small>Files</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>2GB<br><small>Used</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>24,6$<br><small>Spent</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>







                        @if($user->provider == 'email')
                        <style>
                        .croppie-container {
                            padding: 0px;
                        }
                        @media (min-width: 1200px)
                        {
                          .avatar-up{
                            max-width: 300px;
                          }

                        }
                        @media (min-width: 992px)
                        {
                          .avatar-up{
                            max-width: 300px;
                          }

                        }



                        </style>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Change Avatar</h4>
                            </div>
                            <div class="content" style="padding: 15px 15px 10px 10px;">


                              <div class="form-group">
                                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                                          <div id="upload-demo" class="avatar-up"></div>
                                                          <form enctype="multipart/form-data">
                                                          <div>
                                                            <br>
                                                              <span class=" btn-file">

                                                                  <input type="file" id="upload" name="image" accept="image/*" style="width: 200px;"> </span>

                                                          </div>
                                                           </form>
                                                      </div>

                                                  </div>
                                                  <div class="text-center">
                                                      <button type="submit" class="upload-result btn btn-info btn-fill btn-wd">Update Avatar</button>
                                                  </div>
                                                  <div class="clearfix"></div>

                            </div>
                        </div>
                        @endif




                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">

                              <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> แจ้งเตือน - </b> กรุณา กรอกข้อมูลให้ครบถ้วนตามเครื่องหมาย ( * ) ที่ระบุไว้</span>
                                </div>


                              <form  method="POST" action="{{ url('user_profile/'.Auth::user()->id) }}">
                                            {{ method_field($method) }}
                                            {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                                <label>Company*</label>
                                                <input type="hidden" name="id" class="form-control" value="{{Auth::user()->id}}" />
                                                <input type="text" class="form-control border-input" name="company" placeholder="Company" value="{{ old( 'company', Auth::user()->company) }}">
                                                @if ($errors->has('company'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ชื่อบริษัท</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label>Username*</label>
                                                <input type="text" class="form-control border-input" name="name" placeholder="Username" value="{{ old( 'name', Auth::user()->name) }}">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ชื่อเล่นของคุณ</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="exampleInputEmail1">Email address*</label>
                                                <input type="email" class="form-control border-input" name="email" placeholder="Email" value="{{ old( 'email', Auth::user()->email) }}">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ email ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>First Name*</label>
                                                <input type="text" class="form-control border-input" name="first_name" placeholder="First Name" value="{{ old( 'first_name', Auth::user()->first_name) }}">
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ชื่อจริง ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label>Last Name*</label>
                                                <input type="text" class="form-control border-input" name="last_name" placeholder="Last Name" value="{{ old( 'last_name', Auth::user()->last_name) }}">
                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ นามสกุล ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Address*</label>
                                                <input type="text" class="form-control border-input" name="address" placeholder="Home Address" value="{{ old( 'address', Auth::user()->address) }}">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ที่อยู่ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label>Phone number*</label>
                                                <input type="text" class="form-control border-input" name="phone" value="{{ old( 'phone', Auth::user()->phone) }}">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ เบอร์โทร ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Provider</label>
                                                <input type="text" class="form-control border-input" disabled value="{{Auth::user()->provider}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control border-input" name="bio" placeholder="Here can be your description" value="Mike">{{ old( 'bio', Auth::user()->bio) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>


                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>












@stop

@section('scripts')
<script src="{{url('assets/croppie/croppie.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>

<script type="text/javascript">


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 240,
        height: 240,
        type: 'circle'
    },
    boundary: {
        width: 270,
        height: 270
    }
});

$('#upload').on('change', function () {

	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});




$('.upload-result').on('click', function (ev) {

	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		$.ajax({
			url: "{{url('update_pic')}}",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
        type = ['success'];
        color = Math.floor((Math.random() * 4) + 1);
        $.notify({
          	icon: "ti-gift",
          	message: "ยินดีด้วย ได้ทำการเปลี่ยนรุป <b>User Profile</b> สำเร็จเรียบร้อยแล้วค่ะ"

          },{
              type: type[color],
              timer: 2000,
              placement: {
                  from: 'top',
                  align: 'right'
              }
          });


        var delayMillis = 3000;

        setTimeout(function() {
          window.location = "{{url('user_profile')}}";
        }, delayMillis);
			}
		});
	});
});

</script>

@if ($message = Session::get('success_user'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการเปลี่ยนรุป <b>User Profile</b> สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[color],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif


@stop('scripts')

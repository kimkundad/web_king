@extends('layouts.template')
@section('stylesheet')
<link href="{{url('assets/croppie/croppie.css')}}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                        </style>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Change Avatar</h4>
                            </div>
                            <div class="content" style="padding: 15px 15px 10px 10px;">


                              <div class="form-group">
                                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                                                          <div id="upload-demo" style="max-width: 280px;"></div>
                                                          <form enctype="multipart/form-data">
                                                          <div>
                                                            <br>
                                                              <span class=" btn-file">


                                                                  <input type="hidden" name="id" class="form-control" value="{{Auth::user()->id}}" />
                                                                  <input type="file" id="upload" name="image" accept="image/*" > </span>

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
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="{{Auth::user()->company}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="{{Auth::user()->first_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" value="{{Auth::user()->last_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" value="{{Auth::user()->address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control border-input" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Provider</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{Auth::user()->provider}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">{{Auth::user()->bio}}</textarea>
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
        width: 280,
        height: 280
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
			url: "{{url('image-crop')}}",
			type: "POST",
			data: {"image":resp, "user_id":{{Auth::user()->id}} },
			success: function (data) {
				swal("Success!", "Change avatar image success!", "success");

        var delayMillis = 3000;

        setTimeout(function() {
          window.location = "{{url('user_profile')}}";
        }, delayMillis);
			}
		});
	});
});

</script>
@stop('scripts')

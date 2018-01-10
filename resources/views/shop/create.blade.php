@extends('layouts.template')
@section('stylesheet')




@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">





                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">New Shop</h4>
                                <p class="category">Created using your new shop and shared data</p>
                            </div>
                            <div class="content">

                              <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> แจ้งเตือน - </b> กรุณา กรอกข้อมูลให้ครบถ้วนตามเครื่องหมาย ( * ) ที่ระบุไว้</span>
                                </div>


                              <form  method="POST" action="{{ url('') }}">
                                            {{ method_field($method) }}
                                            {{ csrf_field() }}


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                        <label>ชื่อร้าน/SHOP NAME*</label>
                                                        <input type="text" class="form-control border-input" name="address" placeholder="Home Address" value="">
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
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>กลุ่มสินค้า/ PRODUCT GROUP*</label>
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
                                                <label>ร้านค้าประเภท/SHOP TYPE*</label>
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
                                                <label>ที่อยู่/ADDRESS*</label>
                                                <input type="text" class="form-control border-input" name="address" placeholder="Home Address" value="">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ที่อยู่ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



  <hr>
  <br>
                                    <div class="row">
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">รูปหน้าร้าน <span class="text-danger">*</span></label>
                                              <div class="col-md-6">
                                                <div style="position:relative;">
		<a class='btn btn-primary' href='javascript:;'>
			Choose File...
			<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
		</a>
		&nbsp;
		<span class='label label-info' id="upload-file-info"></span>
	</div>
                                              </div>
                                            </div>
                                            </div>
                                            <br>
                                            <hr>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>เบอร์โทรศัพ์/TELEPHONE*</label>
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
                                                <label>จังหวัด/ PROVIENCE*</label>
                                                <select name="province_id" class="form-control border-input js-example-basic-single" required="">
                                                    <option value="">-- เลือกจังหวัด --</option>


                                                    @if(isset($province))
                                                      @foreach($province as $u)
                                                          <option value="{{$u->PROVINCE_ID}}">{{$u->PROVINCE_NAME}}</option>
                                                      @endforeach
                                                    @endif

                                            </select>
                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ นามสกุล ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12" style="padding: 12px;">
                                            <div class="form-group">
                                                <label>Location*</label>
                                                <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 12px;">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>latitude*</label>
                                                <input type="text" class="form-control border-input" name="lat" id="lat" size="10" value="{{ old('lat') }}" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 12px;">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>longitude*</label>
                                                <input type="text" class="form-control border-input" name="lng" id="lng" size="10" value="{{ old('lng') }}" required>

                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label>ยอดขายรายเดือน/SALEA AMOUNT*</label>
                                                <input type="text" class="form-control border-input" name="first_name" placeholder="First Name" value="{{ old( 'first_name', Auth::user()->first_name) }}">
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ชื่อจริง ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label>รหัสสาขา/CHANNEL CODE*</label>
                                                <input type="text" class="form-control border-input" name="last_name" placeholder="Last Name" value="{{ old( 'last_name', Auth::user()->last_name) }}">
                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ นามสกุล ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label>ช่องทางขาย/CHANNEL*</label>
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
                                            <div class="form-group">
                                                <label>พื้นที่/AREA</label>
                                                <textarea rows="5" class="form-control border-input" name="bio" placeholder="Here can be your description" value="Mike">{{ old( 'bio', Auth::user()->bio) }}</textarea>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>รายละเอียด/Shop Detail</label>
                                                <textarea rows="5" class="form-control border-input" name="bio" placeholder="Here can be your description" value="Mike">{{ old( 'bio', Auth::user()->bio) }}</textarea>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Create Shop</button>
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
<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


</script>

<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyA89Rb8Kz1ArY3ks6sSvz2cNrn66CHKDiA&libraries=places&sensor=false'></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(13.7211075, 100.5904873 ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>




@stop('scripts')

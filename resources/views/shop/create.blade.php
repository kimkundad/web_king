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



                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                            {{ method_field($method) }}
                                            {{ csrf_field() }}


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                                        <label>ชื่อร้าน/SHOP NAME*</label>
                                                        <input type="text" class="form-control border-input" name="shop_name" placeholder="SHOP NAME" value="{{ old( 'shop_name') }}">
                                                        @if ($errors->has('shop_name'))
                                                            <span class="help-block">
                                                                <strong>กรุณาใส่ ชื่อร้าน/SHOP NAME ของคุณด้วย</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('shop_group') ? ' has-error' : '' }}">
                                                <label>กลุ่มสินค้า/ PRODUCT GROUP*</label>
                                                <input type="text" class="form-control border-input" name="shop_group" placeholder="กลุ่มสินค้า" value="{{ old( 'shop_group')}}">
                                                @if ($errors->has('shop_group'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ กลุ่มสินค้า/ PRODUCT GROUP ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('shop_type') ? ' has-error' : '' }}">
                                                <label>ร้านค้าประเภท/SHOP TYPE*</label>
                                                <input type="text" class="form-control border-input" name="shop_type" placeholder="ร้านค้าประเภท" value="{{ old( 'shop_type') }}">
                                                @if ($errors->has('shop_type'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ร้านค้าประเภท ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>ที่อยู่/ADDRESS*</label>
                                                <input type="text" class="form-control border-input" name="address" placeholder="ที่อยู่" value="{{ old( 'address') }}">
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
                                      <label class="col-md-3 control-label">รูปหน้าร้าน <span class="text-danger">*</span><br> ควรใช้ขนาด กว้าง x สูง เท่ากัน<br> <span class="text-danger">(450 x 450 px)</span></label>
                                              <div class="col-md-6">
                                                <div style="position:relative;">
		<a class='btn btn-primary' href='javascript:;'>
			Choose File...
			<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());' required>
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
                                            <div class="form-group{{ $errors->has('shop_phone') ? ' has-error' : '' }}">
                                                <label>เบอร์โทรศัพท์/TELEPHONE*</label>
                                                <input type="text" class="form-control border-input" name="shop_phone" placeholder="081100775xxx.." value="{{ old( 'shop_phone') }}">
                                                @if ($errors->has('shop_phone'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ เบอร์โทรศัพท์ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('provience_id') ? ' has-error' : '' }}">
                                                <label>จังหวัด/ PROVIENCE*</label>
                                                <select name="provience_id" class="form-control border-input js-example-basic-single" required="">
                                                    <option value="">-- เลือกจังหวัด --</option>


                                                    @if(isset($province))
                                                      @foreach($province as $u)
                                                          <option value="{{$u->PROVINCE_ID}}">{{$u->PROVINCE_NAME}}</option>
                                                      @endforeach
                                                    @endif

                                            </select>
                                                @if ($errors->has('provience_id'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ จังหวัด ของคุณด้วย</strong>
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
                                            <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                                <label>latitude*</label>
                                                <input type="text" class="form-control border-input" name="lat" id="lat" size="10" value="{{ old('lat') }}" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 12px;">
                                            <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                                                <label>longitude*</label>
                                                <input type="text" class="form-control border-input" name="lng" id="lng" size="10" value="{{ old('lng') }}" required>

                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('shop_sale') ? ' has-error' : '' }}">
                                                <label>ยอดขายรายเดือน/SALEA AMOUNT*</label>
                                                <input type="number" class="form-control border-input" name="shop_sale" placeholder="150,000" value="{{ old( 'shop_sale') }}">
                                                @if ($errors->has('shop_sale'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ยอดขายรายเดือน ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('shop_code') ? ' has-error' : '' }}">
                                                <label>รหัสสาขา/CHANNEL CODE*</label>
                                                <input type="text" class="form-control border-input" name="shop_code" placeholder="ZX-1540000" value="{{ old( 'shop_code') }}">
                                                @if ($errors->has('shop_code'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ รหัสสาขา ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('channel') ? ' has-error' : '' }}">
                                                <label>ช่องทางขาย/CHANNEL*</label>
                                                <input type="text" class="form-control border-input" name="channel" placeholder="สื่อโฆษณาทีวี" value="{{ old( 'channel') }}">
                                                @if ($errors->has('channel'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ช่องทางขาย ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('shop_area') ? ' has-error' : '' }}">
                                                <label>พื้นที่/AREA</label>
                                                <textarea rows="5" class="form-control border-input" name="shop_area" placeholder="Here can be your Area" value="Mike">{{ old( 'shop_area') }}</textarea>
                                                @if ($errors->has('shop_area'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ พื้นที่ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>รายละเอียด/Shop Detail</label>
                                                <textarea rows="5" class="form-control border-input" name="detail_shop" placeholder="Here can be your detail" value="Mike">{{ old( 'detail_shop') }}</textarea>
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
      var mapOptions = { center: new google.maps.LatLng({{$objs->lat}}, {{$objs->lat}}), zoom: 2,
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

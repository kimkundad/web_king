@extends('layouts.template')
@section('stylesheet')

<style>
        .box-upload-file {
            background-image: url('{{url('front/asset/img/bg-blue-2.png')}}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .box-upload-file {
            padding: 25px;
            max-width: 410px;
            margin: 0 auto 50px;
        }

        .box-upload-file h4 {
            margin-bottom: 30px;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            margin: 10px;
            max-width: 150px;
            background: #fff;
            border: 2px solid #000;
            margin-top: 20px;
        }

        .file-upload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .croppie-container {
    padding: 0px;
}
.croppie-container .cr-vp-circle {
    border-radius: 0%;
}
img {
    vertical-align: middle;
    border-style: none;
}
    </style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">สร้างสินค้าใหม่</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">
                                                  <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                                      <label>ชื่อสินค้า*</label>
                                                      <input type="text" class="form-control border-input" name="product_name" value="{{$objs->product_name}}">
                                                      @if ($errors->has('product_name'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ ชื่อสินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                                                      <label>code สินค้า*</label>
                                                      <input type="text" class="form-control border-input" name="product_code" value="{{$objs->product_code}}">
                                                      @if ($errors->has('product_code'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ code สินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <hr>
                                                  <div style="text-align: center">
                                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($objs->product_code, 'C39+')}}" alt="barcode" />
                                                  </div>
                                                  <hr>
                                                  <div style="text-align: center">
                                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($objs->product_code, 'QRCODE',8,8)}}" alt="barcode"  />
                                                  </div>
                                                  <hr>


                                                  <div class="form-group{{ $errors->has('product_cat') ? ' has-error' : '' }}">
                                                      <label>หมวดหมู่ สินค้า*</label>
                                                      <select name="product_cat" class="form-control border-input" required>

                    								                      <option value="">-- เลือกหมวดหมู่ --</option>
                                                          @if($cat)
                    								                      @foreach($cat as $cats)
                    													  <option value="{{$cats->category_id}}" @if( $objs->cat_id == $cats->category_id)
                              selected='selected'
                              @endif>{{$cats->cat_name}}</option>
                    													  @endforeach
                                                @endif
                    								                    </select>
                                                      @if ($errors->has('product_cat'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ หมวดหมู่ ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>


                                                  <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                                      <label>เลือกร้านค้า*</label>
                                                      <select name="shop_name" class="form-control border-input" required>

                    								                      <option value="">-- เลือกหมวดหมู่ --</option>
                                                          @if($shop_id)
                    								                      @foreach($shop_id as $shop)
                    													  <option value="{{$shop->id}}" @if( $objs->shop_id == $shop->id)
                              selected='selected'
                              @endif>{{$shop->shop_name}}</option>
                    													  @endforeach
                                                @endif
                    								                    </select>
                                                      @if ($errors->has('shop_name'))
                                                          <span class="help-block">
                                                              <strong>กรุณา เลือกร้านค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('product_sum') ? ' has-error' : '' }}">
                                                      <label>จำนวนสินค้า*</label>
                                                      <input type="number" class="form-control border-input" name="product_sum" value="{{$objs->product_sum}}">
                                                      @if ($errors->has('product_sum'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ จำนวนสินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                                  <br>
                                                  <div class="col-md-12" style="text-align: center">
                                    <label for="imgAvatar"></label>
                                    <img width="150" id="imgAvatar" name="imgAvatar" src="{{url('assets/product/'.$objs->product_image)}}" width="250px" alt="">

                                    <div class="form-group">



                                      <div class="file-upload btn">
                              <span>เลือกรูปภาพ</span>
                              <input class="upload" id="fileAvatar" name="image" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">

                          </div>

                                            </div>


                                </div>




                                <div class="form-group{{ $errors->has('product_detail') ? ' has-error' : '' }}">
                                    <label>รายละเอียดสินค้า*</label>

                                    <textarea rows="3" class="form-control border-input" name="product_detail" placeholder="Here can be your description" value="Mike">{{$objs->product_detail}}</textarea>
                                    @if ($errors->has('product_detail'))
                                        <span class="help-block">
                                            <strong>กรุณาใส่ รายละเอียด ของคุณด้วย</strong>
                                        </span>
                                    @endif
                                </div>





                                              </div>


                                          </div>

                                          <div class="">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">กดสร้างสินค้า</button>
                                          </div>
                            </form>
                            <br>
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
        $(document).ready(function () {
            $("#fileAvatar").on("change", previewFile);
            $('#btn_submit').click(() => {
                const file = document.querySelector('#fileAvatar').files[0];
                if (file) {
                    window.location = 'step-4.html';
                }
            });
        });

        function previewFile() {
            const file = document.querySelector('#fileAvatar').files[0];
            const preview = document.querySelector('#imgAvatar');
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file); //reads the data as a URL
            }
        }
    </script>

    @if ($message = Session::get('success_edit_product'))
    <script type="text/javascript">
    type = ['success'];
    color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "ti-gift",
        message: "ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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

    @if ($message = Session::get('success_product'))
    <script type="text/javascript">
    type = ['success'];
    color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "ti-gift",
        message: "ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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

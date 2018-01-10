@extends('layouts.template')
@section('stylesheet')

<style>
.card-user .avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    position: relative;
    margin-bottom: 15px;
}
.card-user .avatar {
    width: 150px;
    height: 150px;
    border-radius: 5%;
    position: relative;
    margin-bottom: 15px;
}
h5, .h5 {
    font-size: 1em;
    font-weight: 700;
    line-height: 1.4em;
    margin-bottom: 15px;
}
.card .category, .card label {
    font-size: 13px;
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
                              <img src="{{url('assets/img/background.jpg')}}" alt="...">
                          </div>
                          <div class="content">
                              <div class="author">
                                <img class="avatar border-white" src="{{url('assets/blog/'.$objs->image_shop)}}" alt="...">


                                <h4 class="title">#{{$objs->shop_code}}<br>

                                </h4>
                              </div>

                              <h5>กลุ่มสินค้า
                                  <p class="category">{{$objs->shop_group}}</p>
                              </h5>
                              <h5>ร้านค้าประเภท
                                  <p class="category">{{$objs->shop_type}}</p>
                              </h5>
                              <h5>ที่อยู่
                                  <p class="category">{{$objs->shop_address}}</p>
                              </h5>
                              <h5>เบอร์โทรศัพ์
                                  <p class="category">{{$objs->shop_phone}}</p>
                              </h5>


                              <h5>ช่องทางขาย
                                  <p class="category">{{$objs->channel}}</p>
                              </h5>
                              <h5>พื้นที่
                                  <p class="category">{{$objs->shop_area}}</p>
                              </h5>

                              <h5>รายละเอียด
                                  <p class="category">{{$objs->detail_shop}}</p>
                              </h5>

                              <a href="{{url('user_shop/'.$objs->p_id.'/edit')}}" >
                                <i class="ti-settings"></i>
                                แก้ไขข้อมูล
                              </a>
                          </div>
                          <hr>
                          <div class="text-center">
                              <div class="row">
                                  <div class="col-md-5 col-md-offset-1">
                                      <h5>12<br><small>Product</small></h5>
                                  </div>
                                  <div class="col-md-6">
                                      <h5>2GB<br><small>Shared</small></h5>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Team พนักงานขาย</h4>
                          </div>
                          <div class="content">
                              <ul class="list-unstyled team-members">
                                          <li>
                                              <div class="row">
                                                  <div class="col-xs-3">
                                                      <div class="avatar">
                                                          <img src="{{url('assets/img/faces/face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-6">
                                                      DJ Khaled
                                                      <br>
                                                      <span class="text-muted"><small>Offline</small></span>
                                                  </div>

                                                  <div class="col-xs-3 text-right">
                                                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                  </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                                  <div class="col-xs-3">
                                                      <div class="avatar">
                                                          <img src="{{url('assets/img/faces/face-1.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-6">
                                                      Creative Tim
                                                      <br>
                                                      <span class="text-success"><small>Available</small></span>
                                                  </div>

                                                  <div class="col-xs-3 text-right">
                                                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                  </div>
                                              </div>
                                          </li>
                                          <li>
                                              <div class="row">
                                                  <div class="col-xs-3">
                                                      <div class="avatar">
                                                          <img src="{{url('assets/img/faces/face-3.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                      </div>
                                                  </div>
                                                  <div class="col-xs-6">
                                                      Flume
                                                      <br>
                                                      <span class="text-danger"><small>Busy</small></span>
                                                  </div>

                                                  <div class="col-xs-3 text-right">
                                                      <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Sales Amount</p>
                                            {{number_format($objs->shop_sale)}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-calendar"></i> ยอดขายรายเดือน
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>จำนวนสินค้า</p>
                                            105
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: #3091B2;">
                                        <i class="ti-location-pin"></i> จังหวัด {{$objs->PROVINCE_NAME}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class=" col-lg-8 col-md-7">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">สินค้าของ {{$objs->shop_name}}</h4>
                              <p class="category">คุณสามารถบริหารจัดการสินค้าของ <span>{{$objs->shop_name}}</span></p>
                          </div>
                          <div class="content table-responsive table-full-width">
                              <table class="table table-striped">
                                  <thead>
                                      <tr><th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                    <th>City</th>
                                  </tr></thead>
                                  <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                      </tr>
                                      <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                      </tr>
                                      <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                      </tr>
                                      <tr>
                                        <td>5</td>
                                        <td>Doris Greene</td>
                                        <td>$63,542</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                      </tr>
                                      <tr>
                                        <td>6</td>
                                        <td>Mason Porter</td>
                                        <td>$78,615</td>
                                        <td>Chile</td>
                                        <td>Gloucester</td>
                                      </tr>
                                  </tbody>
                              </table>

                                <ul class="pagination" style="padding-left:15px;">
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                </ul>


                          </div>
                      </div>
                    </div>


                </div>
            </div>
        </div>












@stop

@section('scripts')

<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>



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

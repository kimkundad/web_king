@extends('layouts.template')
@section('stylesheet')
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">
                            
                              <p class="category">คุณสามารถเพิ่มสินค้า และสามารถซ่อมจากการแชร์ข้อมูลสินค้าได้</p>
                          </div>






                          <div class="content table-responsive table-full-width">

                            <a class="btn btn-default " href="{{url('category/create')}}" role="button" style="margin-left:12px;">
                            <i class="fa fa-plus"></i> เพิ่มสินค้าใหม่</a>

                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>วันที่ส้ราง</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                  <tbody>

                                  </tbody>
                              </table>

                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">


                </div>

            </div>
        </div>













@stop

@section('scripts')
<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>

@if ($message = Session::get('edit_success'))
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

@if ($message = Session::get('add_success'))
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

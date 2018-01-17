@extends('layouts.template')
@section('stylesheet')
<style>

</style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">

                              <p class="category">คุณจำเป็นต้องสร้างหมวดหมู่ก่อน เพื่อใช้ในการสร้างสินค้าในขั้นตอนถัดไป</p>
                          </div>






                          <div class="content table-responsive table-full-width">

                            <a class="btn btn-default " href="{{url('category/create')}}" role="button" style="margin-left:12px;">
                            <i class="fa fa-plus"></i> เพิ่มหมวดหมู่</a>

                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th>จำนวนชนิดสินค้า</th>
                                    <th>วันที่ส้ราง</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                  <tbody>
                                    @if($objs)
                @foreach($objs as $u)
                                      <tr>
                                        <td>{{$u->category_id}}</td>
                                        <td>{{$u->cat_name}}</td>
                                        <td>{{$u->options}}</td>
                                        <td>{{$u->created_at}}</td>
                                        <td>

                                          <a style="float:left; margin-right:8px;" title="แก้ไขหมวดหมู่" class="btn btn-primary btn-xs" href="{{url('category/'.$u->category_id.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>

                                          <form  action="" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                            <input type="hidden" name="_method" value="DELETE">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" title="ลบหมวดหมู่" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
                                          </form>

                                          </td>
                                      </tr>
                                      @endforeach
                                                    @endif
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

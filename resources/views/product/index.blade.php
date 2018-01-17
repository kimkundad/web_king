@extends('layouts.template')
@section('stylesheet')
  <link rel="stylesheet" href="{{asset('./assets/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css')}}" />
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

                              <p class="category">คุณสามารถเพิ่มสินค้า และสามารถซ่อมจากการแชร์ข้อมูลสินค้าได้</p>
                          </div>






                          <div class="content table-responsive table-full-width">

                            <a class="btn btn-default " href="{{url('product/create')}}" role="button" style="margin-left:12px;">
                            <i class="fa fa-plus"></i> เพิ่มสินค้าใหม่</a>

                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>หมวดหมู่</th>
                                    <th>คงเหลือ</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                  <tbody>


              @if($objs)
                @foreach($objs as $u)
                                      <tr id="{{$u->id}}">
                                        <td>{{$u->product_code}}</td>
                                        <td>{{$u->product_name}}</td>
                                        <td>{{$u->cat_name}}</td>
                                        <td>{{$u->product_sum}}</td>
                                        <td>

                                          <input type="checkbox" name="my-checkbox" id="switch-size" data-size="mini"
                         @if($u->product_status == 1)
                          checked="checked"
                          @endif
                          />
                                        </td>
                                        <td>

                                          <a style="float:left; margin-right:5px;" title="แก้ไขหมวดหมู่" class="btn btn-primary btn-xs" href="{{url('product/'.$u->id.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>

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
<script src="{{asset('/assets/bootstrap-switch-master/js/bootstrap-switch.js')}}"></script>



<script type="text/javascript">
$(document).ready(function(){
  $("[name='my-checkbox']").bootstrapSwitch();
//  $("input:checkbox").change(function() {

$("[name='my-checkbox']").on('switchChange.bootstrapSwitch',function(){
    var product_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/post_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "product_id" : product_id },
            success: function(data){
              if(data.data.success){


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



              }
            }
        });
    });
});
</script>


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

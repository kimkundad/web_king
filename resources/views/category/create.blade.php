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
                              <h4 class="title">ตั้งชื่อหมวดหมู่</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
                                                      <label>ชื่อหมวดหมู่*</label>
                                                      <input type="text" class="form-control border-input" name="cat_name" value="{{ old( 'cat_name') }}">
                                                      @if ($errors->has('cat_name'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ ชื่อหมวดหมู่ ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">กดสร้าง</button>
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
@stop('scripts')

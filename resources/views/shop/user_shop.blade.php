@extends('layouts.template')
@section('stylesheet')
@stop('stylesheet')

@section('content')

<style>
.card .content {
    padding: 5px 5px 5px 5px;
}
</style>


        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                      <a href="{{url('user_shop/create')}}" class="btn btn-success btn-fill btn-wd"> New Shop</a>
                      <br><br>
                    </div>


                    @if($objs)
                @foreach($objs as $u)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                      <a href="{{url('user_shop/'.$u->id)}}">
                                        <img src="{{url('assets/blog/'.$u->image_shop)}}" class="img-responsive">
                                      </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    @endforeach
              @endif


                </div>
                <div class="row">


                </div>

            </div>
        </div>













@stop

@section('scripts')
@stop('scripts')

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



                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <img src="{{url('assets/img/shop/adidas-black_1.png')}}" class="img-responsive">
                                    </div>

                                </div>

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
@stop('scripts')

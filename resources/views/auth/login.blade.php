@extends('layouts.template-login')
@section('content')


<?php
if(Auth::check()){
  return Redirect::to('dashboard');
}else{

}
 ?>

<section class="body-sign body-locked">


            <div class="center-sign">
                <div id="showalert"></div>
                <!--
                <a href="#" class="logo pull-left" >
                    <img src="assets/images/logo.png" height="100" alt="Porto Admin" />
                </a> -->

                <div class="panel panel-sign">


                    <div class="panel-body">


                        <div class="current-user text-center" style="margin-top: -5px;">
                            <img id="LockUserPicture" src="{{asset('./assets/img/logo/linchak-logo.png')}}" height="80px;">

                        </div>

                        <form  role="form" method="POST" action="{{ url('/login') }}">
                             {{ csrf_field() }}



                            <div class="form-group mb-lg">
                                <label>Email</label>
                                <div class="input-group input-group-icon">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    <a href="#" class="pull-right">Lost Password?</a>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input id="password" type="password" class="form-control" name="password">
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom ">
                                        <input  name="rememberme" id="remember" value=""  type="checkbox">

                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">

                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>

                            <span class=" line-thru text-center text-uppercase" style="margin-bottom: 10px; margin-top: 10px;">
              								<span>or</span>
              							</span>

                            <div class="mb-xs text-center">
              								<a class="btn btn-facebook mb-md ml-xs mr-xs" href="{{url('/redirect')}}">Connect with <i class="fa fa-facebook"></i></a>

              							</div>

                            <p class="text-center" style="color:#777;">Don't have an account yet? <a style="color:#ec3781;" href="{{url('register')}}">Sign Up!</a></p>



                        </form>





                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. All Rights Reserved. </p>
            </div>
        </section>
@stop

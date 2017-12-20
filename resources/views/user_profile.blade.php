@extends('layouts.template')
@section('stylesheet')
@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="...">
                            </div>
                            <div class="content">
                                <div class="author">


                                  @if($user->provider == 'email')
                                  <img class="avatar border-white" src="assets/img/avatar/{{$user->avatar}}" alt="{{Auth::user()->name}}">
                                  @else
                                  <img class="avatar border-white" src="//{{$user->avatar}}" alt="{{Auth::user()->name}}">
                                  @endif


                                  <h4 class="title">{{Auth::user()->name}}<br>
                                     <a href="#"><small>@ {{Auth::user()->name}}</small></a>
                                  </h4>
                                </div>
                                <p class="description text-center">
                                    "{{Auth::user()->bio}}"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5>12<br><small>Files</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>2GB<br><small>Used</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>24,6$<br><small>Spent</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Team Members</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
                                                            <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
                                                            <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="{{Auth::user()->company}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="{{Auth::user()->first_name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" value="{{Auth::user()->last_name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" value="{{Auth::user()->address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control border-input" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Provider</label>
                                                <input type="text" class="form-control border-input" placeholder="Country" value="{{Auth::user()->provider}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">{{Auth::user()->bio}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
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
@stop('scripts')

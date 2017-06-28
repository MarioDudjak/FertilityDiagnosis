@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Welcome page</a>
                <a style="background-color:gainsboro" class="navbar-brand" href="{{ url ('home') }}">Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">{{Auth::user()->posts->last()?Auth::user()->posts->last()->created_at: "No posts"}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                   <i class="glyphicon glyphicon-thumbs-up"></i>  Last like
                                    <span class="pull-right text-muted small">{{Auth::user()->likes->last()?Auth::user()->likes->last()->created_at:"No likes"}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                   <i class="glyphicon glyphicon-education"></i>  Last test
                                    <span class="pull-right text-muted small">{{Auth::user()->tests->last()?Auth::user()->tests->last()->created_at:"No tests"}}</span>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#user_profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="{{route('account')}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                    <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li {{ (Request::is('home') ? 'class="active"' : '') }}>
                            <a href="{{ url ('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li {{ (Request::is('*statistics') ? 'class="active"' : '') }}>
                            <a href="{{ url ('stats') }}"><i class="fa fa-bar-chart-o fa-fw"></i>Statistics</a>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li {{ (Request::is('*fertility_tool') ? 'class="active"' : '') }}>
                            <a href="{{ url ('fertility_tool') }}"><i class="fa fa-edit fa-fw"></i>Fertility Diagnosis Tool</a>
                        </li>
                       
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome {{ Auth::user()->first_name }}! </h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div style="background-image:url('{{asset("assets/img/header-bg.jpg")}}');"  class="row">  
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
 
        <script src="{{URL::to('js/master.js')}}"></script>
      <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> 
      <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>﻿
   
      <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Edit the Post</label>
                  <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

<script>
    var token='{{Session::token()}}';
    var urlEdit='{{route('edit') }}';   
    var urlLike = '{{ route('like') }}';
</script>
@stop


@extends('layouts.dashboard') @section('page_heading','Dashboard') @section('section')
</br>
<!-- /.row -->
<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{sizeof($posts)}}</div>
                            <div>Posts!</div>
                        </div>
                    </div>
                </div>
                <a href="#timeline">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-fw fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{sizeof($users)}}</div>
                            <div>Accounts!</div>
                        </div>
                    </div>
                </div>
                <a href="#user_profile">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-education fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{sizeof($tests)}}</div>
                            <div>Tests!</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url ('fertility_tool') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-thumbs-up fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{sizeof($likes)}}</div>
                            <div>Likes!</div>
                        </div>
                    </div>
                </div>
                <a href="#timeline">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">

            @section ('pane2_panel_title', 'Your timeline') @section ('pane2_panel_body')

            <!-- /.panel -->


            <h1>What other people say...</h1>
            <section id="timeline" class="row posts">
                <ul class="timeline">
                    <!-- U foreach petlji koja ide kroz zadnji nekoliko postova, stavljam 2 <li> elementa, jedan s lijeva, drugi zdesna i stavljam podatke iz baze o postovima!-->

                    @foreach($posts as $post) @if($post->id%2==1)
                    <li class="post" data-postid="{{$post->id}}">
                        <div class="timeline-badge info">
                            <i class="fa fa-save"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$post->title}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p>{{$post->body}}</p>
                                <div class="info">
                                    <p>Posted by {{$post->user->first_name}} on {{$post->created_at}} </p>
                                    <p id="{{$post->id}}likes">{{$likes_on_posts[$post->id]}} Likes</p>
                                </div>
                                <hr>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-gear"></i>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a href="#" class="like" id="first_like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id',
                                                $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a>
                                        </li>
                                        <li>
                                            <a href="#" class="like" id="first_dislike">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id',
                                                $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike'
                                                : 'Dislike' }}</a>
                                        </li>

                                        @if(Auth::user()==$post->user)


                                        <li>
                                            <a href="#" class="edit">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                                        </li>

                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </li>
                    @endif @if($post->id%2==0)
                    <li class="post timeline-inverted" data-postid="{{$post->id}}">
                        <div class="timeline-badge info">
                            <i class="fa fa-save"></i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{$post->title}}</h4>
                            </div>
                            <div class="timeline-body">
                                <p>{{$post->body}}</p>
                                <div class="info">
                                    <p>Posted by {{$post->user->first_name}} on {{$post->created_at}} </p>
                                    <p id="{{$post->id}}likes">{{$likes_on_posts[$post->id]}} Likes</p>
                                </div>
                                <hr>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-gear"></i>
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a href="#" class="like" id="second_like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id',
                                                $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a>
                                        </li>
                                        <li>
                                            <a href="#" class="like" id="second_dislike">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id',
                                                $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike'
                                                : 'Dislike' }}</a>
                                        </li>
                                        @if(Auth::user()==$post->user)
                                        <li>
                                            <a href="#" class="edit">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                                        </li>
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </li>
                    @endif @endforeach

                </ul>
            </section>
            <!-- /.panel-body -->

            <!-- /.panel -->
            @endsection @include('widgets.panel', array('header'=>true, 'as'=>'pane2'))
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">


            @section ('pane1_panel_title', 'Your profile') @section ('pane1_panel_body')

            <div id="user_profile" class="list-group">
                @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3">
                        <img style="display:block; margin-left: auto; margin-right: auto; margin-bottom:5px;" src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}"
                            alt="" class="img-responsive">
                    </div>
                </section>
                @else
                <img style="display:block; margin-left: auto; margin-right: auto; margin-bottom:5px;" src="{{ asset("images/default_user_profile_image.png
                    ") }}" alt="Default user image"> @endif
                <a href="#" class="list-group-item">
                    <i class="glyphicon glyphicon-user"></i> User name
                    <span class="pull-right text-muted small">
                        <em>{{ Auth::user()->first_name }}</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> Number of posts

                    <span class="pull-right text-muted small">
                        <em>{{sizeof(Auth::user()->posts)}}</em>

                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="glyphicon glyphicon-thumbs-up"></i> Number of likes

                    <span id="likenumber" class="pull-right text-muted small">
                        <em>{{sizeof(Auth::user()->likes->where('like',1))}}</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-envelope fa-fw"></i> New post
                    <span class="pull-right text-muted small">
                        <em>{{Auth::user()->posts->last()?Auth::user()->posts->last()->created_at: "No posts"}}</em>
                    </span>
                </a>
                <!-- /.list-group -->
                <a href="{{route('account')}}" class="btn btn-default btn-block">Account Settings</a>

                <!-- /.panel-body -->

                @endsection @include('widgets.panel', array('header'=>true, 'as'=>'pane1'))


                <!-- /.panel -->
                @section ('pane3_panel_title', 'What do you have to say?') @section ('pane3_panel_body')

            </div>
            <!-- /.panel-heading -->
            @include('includes.message-block')
            <form action="{{route('post.create')}}" method="post">
                <div class="panel-body">

                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="10" placeholder="Your post..."></textarea>
                    </div>
                    <input type="hidden" value="{{Session::token()}}" name="_token">


                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" name="title" class="form-control input-sm" placeholder="Enter the title of your post" />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send
                            </button>
                        </span>
                    </div>

                </div>
            </form>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
        @endsection @include('widgets.panel', array('header'=>true, 'as'=>'pane3'))
    </div>

    <script src="{{URL::to('js/master.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

    <!-- /.col-lg-4 -->

    @stop
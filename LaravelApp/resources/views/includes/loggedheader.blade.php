
<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <!--
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button> -->
                <a class="navbar-brand page-scroll active" href="{{ url('/') }}">Welcome page</a>
                <a class="navbar-brand page-scroll active" href="{{ url('home') }}">Dashboard</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Global Social Network Of Fertility Diagnosis Users!</div>
                </br>
                </br>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="{{ url ('home') }}" class="page-scroll btn btn-xl">Go to Dashboard</a>
            </div>
        </div>
    </header>
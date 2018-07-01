<!doctype html>
<!--<html lang="{{ config('app.locale') }}"> -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css ") }}" />
    <script src="{{ asset("assets/scripts/frontend.js ") }}" type="text/javascript"></script>
    <link rel="shortcut icon" href="{{asset("assets/ico/icon.png ")}}">
    <link rel="stylesheet" href="{{ URL::asset('css/account.css') }}">
</head>

<body>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">

                <a class="navbar-brand page-scroll active" href="{{ url('/') }}">Welcome page</a>
                <a class="navbar-brand page-scroll active" href="{{ url('home') }}">Dashboard</a>

            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Your Account</h3>
            </header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input style="height: 200%;" type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
        </div>
    </section>
    @endif

    <div class="flex-center position-ref full-height">
        <div class="content">
        </div>
    </div>
</body>

</html>
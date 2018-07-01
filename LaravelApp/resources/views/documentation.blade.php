<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fertility Diagnosis Statistics</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css ") }}" />
    <script src="{{ asset("assets/scripts/frontend.js ") }}" type="text/javascript"></script>
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="{{asset("assets/font-awesome/css/font-awesome.min.css ")}}">
    <link rel="stylesheet" href="{{asset("assets/css/form-elements.css ")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css ")}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{asset("assets/ico/icon.png ")}}">
    <link rel="stylesheet" href="{{ URL::asset('css/documentation.css') }}">
</head>

<body>

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
        </div>
        <!-- /.container-fluid -->
    </nav>
    </br>
    </br>
    <!-- Description -->
    <div class="description-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 description-title">
                    <h2>Fertility Diagnosis API Documentation</h2>
                </div>
            </div>

        </div>
    </div>

    <!-- Multi Step Form -->
    <div class="msf-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 msf-title">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 msf-form">



                    <h4>API Definition
                        <span class="step"></span>
                    </h4>
                    <p>We built Fertility Diagnosis API for programmers like you so that you can use wide database of fertility
                        diagnosis users. API can be used to retrieve results of all conducted tests, and you can apply filter
                        on your search. There are three main extensions to base url, and they differ fetching all results,
                        only normal results and also altered results. You can apply filter on all three types of extensions.
                    </p>
                    </br>


                    <hr>

                    <h4>API Structure
                        <span class="step"></span>
                    </h4>
                    <p>Result data is retrieved via API URL. Structure of URL is: fertilitydiagnosis.herokuapp.com/api/{api_key}/results
                        .
                        <ul>
                            <li> For all tests: fertilitydiagnosis.herokuapp.com/api/{api_key}/results . </li>
                            <li> For tests with normal diagnosis: fertilitydiagnosis.herokuapp.com/api/{api_key}/results/normal
                                . </li>
                            <li> For tests with altered diagnosis: fertilitydiagnosis.herokuapp.com/api/{api_key}/results/altered
                                . </li>
                        </ul>
                    </p>
                    </br>

                    <hr>
                    <h4>API Filters
                        <span class="step"></span>
                    </h4>
                    <p>There are 9 variables that can be used as filters for API URL. Structure of URL with filters is: fertilitydiagnosis.herokuapp.com/api/{api_key}/results?attribute_name=attribute_value

                        <ul>
                            <li>Season in which the analysis was performed => 'season'</li>
                            <ul>
                                <li>Winter => -1</li>
                                <li>Spring => -0.33</li>
                                <li>Summer => 0.33</li>
                                <li>Fall => 1</li>
                            </ul>
                            </br>
                            <li>Age at the time of the analysis => 'age'</li>
                            <ul>
                                <li>Age number from 18 to 36</li>
                            </ul>
                            </br>
                            <li>Childish diseases => 'diseases'</li>
                            <ul>
                                <li>Yes=> 0</li>
                                <li>No => 1</li>
                            </ul>
                            </br>
                            <li>Accident or serious trauma => 'trauma'</li>
                            <ul>
                                <li>Yes=> 0</li>
                                <li>No => 1</li>
                            </ul>
                            </br>
                            <li>Surgical intervention => 'surgery'</li>
                            <ul>
                                <li>Yes=> 0</li>
                                <li>No => 1</li>
                            </ul>
                            </br>
                            <li>High fevers in last year => 'fevers'</li>
                            <ul>
                                <li>Less than three months ago=> -1</li>
                                <li>More than three months ago => 0</li>
                                <li>No => 1</li>
                            </ul>
                            </br>
                            <li>Frequency of alcohol consumption => 'alcohol'</li>
                            <ul>
                                <li>Several times a day=> 0.2</li>
                                <li>Every day => 0.4</li>
                                <li>Several times a week=> 0.6</li>
                                <li>Once a week=> 0.8</li>
                                <li>Hardly ever or never=> 1</li>
                            </ul>
                            </br>
                            <li>Smoking habit => 'smoking'</li>
                            <ul>
                                <li>Never=> -1</li>
                                <li>Occasional => 0</li>
                                <li>Daily => 1</li>
                            </ul>
                            </br>
                            <li>Numbers of hours spent sitting per day => 'sitting'</li>
                            <ul>
                                <li>Number from 0 to 16</li>
                            </ul>

                        </ul>
                    </p>
                    </br>
                    <hr>

                    <h4>API Example
                        <span class="step"></span>
                    </h4>
                    <p>
                        Example URL: http://fertilitydiagnosis.herokuapp.com/api/tICL0ypTCyLAsXBnx3M6nQBwDnyGIT6hSVf6QjTR9FieqM6CoZlunThnPfLw/results/normal?age=0&season=-1&smoking=0&alcohol=0.6&sitting=0.5
                    </p>
                    <p>
                        JSON Array: [{"id":1,"created_at":"2017-06-28 17:33:25","updated_at":"2017-06-28 17:33:25","season":"-1","age":"0","disease":"1","trauma":"0","surgery":"1","fevers":"0","alcohol":"0.6","smoking":"0","sitting":"0.5","result":0,"user_id":1,"post_id":0}]
                    </p>
                    <br>
                    <button id="submitAPIKey" type="submit" class="btn">Request API Key</button>

                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h4>Your API Key:
                        <span class="step"></span>
                    </h4>
                    <p id="api_key"></p>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#submitAPIKey', function () {
            var api = "{{$user->api_token}}";
            $('#api_key').text("API KEY: " + api);
        });
    </script>
    <!-- Javascript -->
    <script src="{{asset("assets/js/jquery-1.11.1.min.js ")}}"></script>
    <script src="{{asset("assets/js/jquery.backstretch.min.js ")}}"></script>
    <script src="{{asset("assets/js/scripts.js ")}}"></script>

</body>

</html>
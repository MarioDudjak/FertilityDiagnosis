<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fertility Diagnosis Tool</title>
       
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
        	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>


        <!-- CSS -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700"> 
       <link rel="stylesheet" href="{{asset("assets/font-awesome/css/font-awesome.min.css")}}">
       <link rel="stylesheet" href="{{asset("assets/css/form-elements.css")}}">
       <link rel="stylesheet" href="{{asset("assets/css/style.css")}}"> 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset("assets/ico/icon.png")}}">
        
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
        </br> </br>
        
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 description-title">
	                    <h2>Fertility Diagnosis Tool</h2>
	                </div>
	            </div>
	           
			</div>
		</div>
		
		<!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Output prediction of your fertility diagnosis test </h3>
	                   
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                        @include('includes.message-block')

	                    <form role="form" action="{{route('publishResult')}}" method="post" class="form-inline">
                                <input type="hidden" name="Result" value={{$result}}>
	          <div  class="row" >
        <div class="col-md-12">
            @if($result->result==0)
            <div style="background-color: green; color:white;" class="alert alert-info">
                Your diagnosis is {{$result->result ? 'Altered' : 'Normal' }}</div>
            @endif
             @if($result->result==1)
            <div style="background-color: red; color:white;" class="alert alert-info">
                Your diagnosis is {{$result->result ? 'Altered' : 'Normal' }}</div>
            @endif
            
            <div class="alert alert-success" style="display:none;">
                <span class="glyphicon glyphicon-ok"></span> Drag table row and cange Order</div>
            <table style="text-align: left" class="table">
                <thead>
                    <tr >
                        <th>
                            Attribute information
                        </th>
                        <th>
                            Attribute value
                        </th>
                        
                    </tr>
                </thead>
                <tbody style="color:black">
                    <tr class="active">
                        <td>
                            Season in which the analysis was performed
                        </td>
                        @if($result->season==1)
                        <td>
                           Fall
                        </td>
                        @endif
                         @if($result->season==-1)
                        <td>
                           Winter
                        </td>
                        @endif
                         @if($result->season==0.33)
                        <td>
                           Summer
                        </td>
                        @endif
                         @if($result->season==-0.33)
                        <td>
                           Spring
                        </td>
                        @endif
                        
                    </tr>
                    
                    <tr class="success">
                        <td>
                            Age at the time of analysis
                        </td>
                        <td>
                            {{$result->age*18 +18 }}
                        </td>
                       
                    </tr>
                    
                    <tr class="warning">
                        <td>
                           Childish diseases (ie , chicken pox, measles, mumps, polio)
                        </td>
                        <td>
                            {{$result->disease ? 'No' : 'Yes' }}
                        </td>
                        
                    </tr>
                   
                    <tr class="danger">
                        <td>
                            Accident or serious trauma
                        </td>
                        <td>
                            {{$result->trauma ? 'No' : 'Yes' }}
                        </td>
                       
                    </tr>
                    <tr class="active">
                        <td>
                            Surgical intervention
                        </td>
                        <td>
                            {{$result->surgery ? 'No' : 'Yes' }}
                        </td>
                        
                    </tr>
                    
                    <tr class="success">
                        <td>
                            High fevers in the last year
                        </td>
                        <td>
                           {{$result->fevers==1? 'No': $result->fevers==-1? 'Less than three months ago':"More than three months ago"}}
                        </td>
                       
                    </tr>
                    
                    <tr class="warning">
                        <td>
                          Frequency of alcohol consumption
                        </td>
                        @if($result->alcohol==1)
                        <td>
                           Hardly ever or never
                        </td>
                        @endif
                         @if($result->alcohol==0.8)
                        <td>
                           Once a week
                        </td>
                        @endif
                         @if($result->alcohol==0.6)
                        <td>
                           Several times a week
                        </td>
                        @endif
                         @if($result->alcohol==0.4)
                        <td>
                           Every day
                        </td>
                        @endif
                        @if($result->alcohol==0.2)
                        <td>
                           Several times a day
                        </td>
                        @endif
                        
                    </tr>
                   
                    <tr class="danger">
                        <td>
                            Smoking habit
                        </td>
                        <td>
                           {{$result->smoking==1? 'Daily': $result->smoking==-1? 'Never':"Occasional"}}

                        </td>
                       
                    </tr>
                <tr class="active">
                        <td>  
Number of hours spent sitting per day
                        </td>
                        <td>
                           {{$result->sitting*16}}
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
	                    <button type="submit" class="btn">Post your result to dashboard</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">	
	                    </form>
	                    
	                </div>
	            </div>
			</div>
		</div>
		
		

        <!-- Javascript -->
        <script src="{{asset("assets/js/jquery-1.11.1.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery.backstretch.min.js")}}"></script>
        <script src="{{asset("assets/js/scripts.js")}}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>


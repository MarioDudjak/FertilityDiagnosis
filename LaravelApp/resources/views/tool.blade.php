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
        </br>
         </br>
        <!-- Description -->
		<div class="description-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 description-title">
	                    <h2>Fertility Diagnosis Tool</h2>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 description-text">
	                    <p>
                               100 volunteers provided a semen sample which was analyzed according to the WHO 2010 criteria. Sperm concentration are related to socio-demographic data, environmental factors, health status, and life habits. 
                               Based on that samples we created a tool which can predict diagnosis of your test. 
	                    </p>
	                    <div class="divider-1">Before infertility testing, your doctor or clinic works to understand your sexual habits and may make recommendations based on these. In some infertile couples, no specific cause is found (unexplained infertility).

Infertility evaluation can be expensive, and sometimes involves uncomfortable procedures. Many medical plans may not reimburse the cost of fertility treatment. Finally, there's no guarantee — even after all the testing and counseling — that you are fertile.</div>
	                </div>
	            </div>
			</div>
		</div>
		
		<!-- Multi Step Form -->
		<div class="msf-container">
	        <div class="container">
	        	<div class="row">
	                <div class="col-sm-12 msf-title">
	                    <h3>Fill In The Form</h3>
	                    <p>Please complete the form below to get a prediction of output of your diagnosis.</p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 msf-form">
	                        @include('includes.message-block')

	                    <form role="form" action="{{route('result')}}" method="post" class="form-inline">
	                    	<fieldset>
	            				<h4>Season in which the analysis was performed <span class="step">(Step 1 / 9)</span></h4>
				                
	            				<div class="selects-1">
									<p>Select 1:</p>
					                <select class="form-control {{$errors->has('seasons') ? 'has-error':''}}" name="seasons">
					                	<option value="1">Winter</option>
					                	<option value="2">Spring</option>
					                	<option value="3">Summer</option>
					                	<option value="4">Fall</option>
					                </select>
								</div>
								
	            				<br>
	                    <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>

	            			</fieldset>
	                    	
	                    	<fieldset>
	            				<h4>Age at the time of analysis <span class="step">(Step 2 / 9)</span></h4>
	            				<div class="form-group {{$errors->has('age') ? 'has-error':''}}">
				                    <label for="age">Age (From 18 to 36):</label><br>
				                    <input type="number" min=18 max=36 name="age" class="age form-control" id="age" placeholder="27">
				                </div>
				               
	            				<br>
                                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Childish diseases <span class="step">(Step 3 / 9)</span></h4>
                                                <div class="form-group {{$errors->has('diseases') ? 'has-error':''}}">
	            				<div class="radio-buttons-1">
				                	<p>Childish diseases (ie , chicken pox, measles, mumps, polio):</p>
					                <label class="radio-inline">
					                	<input type="radio" name="diseases" value="0"> Yes
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="diseases" value="1"> No
					                </label>
					               </div>
								</div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Accident or serious trauma <span class="step">(Step 4 / 9)</span></h4>
                                                <div class="form-group {{$errors->has('trauma') ? 'has-error':''}}">
	            				<div class="radio-buttons-1">
				                	<p>Accident or serious trauma:</p>
					                <label class="radio-inline">
					                	<input type="radio" name="trauma" value="0"> Yes
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="trauma" value="1"> No
					                </label>
					               </div>
								</div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	                    	
	                    	<fieldset>
	            				<h4>Surgical intervention <span class="step">(Step 5 / 9)</span></h4>
                                                <div class="form-group {{$errors->has('surgery') ? 'has-error':''}}">
	            				<div class="radio-buttons-1">
				                	<p>Surgical intervention:</p>
					                <label class="radio-inline">
					                	<input type="radio" name="surgery" value="0"> Yes
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="surgery" value="1"> No
					                </label>
					               </div>
								</div>
				                
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>High fevers in the last year <span class="step">(Step 6 / 9)</span></h4>
                                               <div class="form-group {{$errors->has('fevers') ? 'has-error':''}}">
	            				<div class="radio-buttons-1">
				                	<p>High fevers in the last year:</p>
					                <label class="radio-inline">
					                	<input type="radio" name="fevers" value="-1"> less than three months ago
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="fevers" value="0"> more than three months ago
					                </label>
					               <label class="radio-inline">
					                	<input type="radio" name="fevers" value="1"> no
					                </label>
								</div>
                                               </div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Frequency of alcohol consumption <span class="step">(Step 7 / 9)</span></h4>
                                                <div class="form-group {{$errors->has('alcohol') ? 'has-error':''}}">
	            				<div class="radio-buttons-1">
				                	<p>Frequency of alcohol consumption:</p>
					                <label class="radio-inline">
					                	<input type="radio" name="alcohol" value="0.2"> several times a day
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="alcohol" value="0.4"> every day
					                </label>
					               <label class="radio-inline">
					                	<input type="radio" name="alcohol" value="0.6"> several times a week
					                </label>
                                                        <label class="radio-inline">
					                	<input type="radio" name="alcohol" value="0.8"> once a week
					                </label>
					               <label class="radio-inline">
					                	<input type="radio" name="alcohol" value="1"> hardly ever or never
					                </label>
								</div>
                                                </div>
                                                <br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
	            			
	            			<fieldset>
	            				<h4>Smoking habit <span class="step">(Step 8 / 9)</span></h4>
                                                 <div class="form-group {{$errors->has('smoking') ? 'has-error':''}}">
				               <div class="radio-buttons-1">
				                	<p>Smoking habit:</p>
					                <label class="radio-inline">
					                	<input type="radio" name="smoking" value="-1"> never
					                </label>
					                <label class="radio-inline">
					                	<input type="radio" name="smoking" value="0"> occasional
					                </label>
					               <label class="radio-inline">
					                	<input type="radio" name="smoking" value="1"> daily
					                </label>
                                                        </div>
								</div>
	            				<br>
	            				<button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
	            			</fieldset>
                                
                                         <fieldset>
	            				<h4>Number of hours spent sitting per day <span class="step">(Step 9 / 9)</span></h4>
	            				<div class="form-group {{$errors->has('sitting') ? 'has-error':''}}">
				                    <label for="sitting">Number of hours spent sitting per day (From 0 to 16):</label><br>
				                    <input type="number" min=0 max=16 name="sitting" class="sitting form-control" id="sitting" placeholder="8">
				                </div>
				               
	            				<br>
                                                <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
	            				<button type="submit" class="btn">Predict output</button>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
	            			</fieldset>
	                    	
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

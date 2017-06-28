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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
        	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
 <script src="https://d3js.org/d3.v3.min.js"></script> 
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
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
        <style>

.bar {
  fill: #e11843;
}

.bar:hover {
  fill: #fe7a47;
}

.axis {
	  font: 10px sans-serif;
	}

	.axis path,
	.axis line {
	  fill: none;
	  stroke: #fcfdfe;
	  shape-rendering: crispEdges;
	}
.d3-tip {
  line-height: 1;
  font-weight: bold;
  padding: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  border-radius: 2px;
}

/* Creates a small triangle extender for the tooltip */
.d3-tip:after {
  box-sizing: border-box;
  display: inline;
  font-size: 10px;
  width: 100%;
  line-height: 1;
  color: rgba(0, 0, 0, 0.8);
  content: "\25BC";
  position: absolute;
  text-align: center;
}

/* Style northward tooltips differently */
.d3-tip.n:after {
  margin: -1px 0 0 0;
  top: 100%;
  left: 0;
}
</style>
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
	                    <h2>Fertility Diagnosis Statistics</h2>
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
	                       

	             <!--       <form role="form" class="form-inline"> -->
	                    	<fieldset>
	            				<h4>Choose the variable to which you want to examine the output of the diagnosis<span class="step"></span></h4>
                                                <p>This statistics show percentage of normal outputs by some variable which you can choose. 
                                                    Data presented in form of a bar chart is retrieved from our large database and it shows how some attribute influences on output of your diagnosis.
                                                    Percentage is calculated according to results from all our users.
                                                    If some percentage is 100% it does not necessarily means that it is certain that your diagnosis will be normal too. 
                                                    That number only shows what percentage of our users had normal diagnosis while having that attribute value. 
                                                    Also, if the percentage is 0%, it does not mean that there is no chance that your diagnosis will be normal if corresponding attribute value is same for you. It can mean that zero or little number of users had that attribute value.
                                                </p>
                                                </br>
                                                <input type="hidden" id="tests" name="tests" value={{$tests->toJson() }}>
	            				<div class="selects-1">
									<p>Select variable:</p>
					                <select id="variableSelect" class="form-control" name="variable">
					                	<option value="1">Season in which the analysis was performed</option>
					                	<option value="2">Age at the time of the analysis</option>
					                	<option value="3">Childish diseases</option>
					                	<option value="4">Accident or serious trauma</option>
                                                                <option value="5">Surgical intervention</option>
					                	<option value="6">High fevers in last year</option>
					                	<option value="7">Frequency of alcohol consumption</option>
					                	<option value="8">Smoking habit</option>
                                                                <option value="9">Number of hours spent sitting per day</option>
					                </select>
								</div>
								
	            				<br>
	                    <button id="submitStats" type="submit" class="btn">Show statistics</button>
                           <!--    <input type="hidden" name="_token" value="{{ Session::token() }}"> -->
	            			</fieldset>
	                    	
	               <!--     </form> -->
	                    
	                </div>
	            </div>
                    <div  class="row">
                        </br> </br>
                        <div  id="chart" class="col-md-10 col-md-offset-1">
                            
                        </div>
                    </div>
			</div>
		</div>
		
		<script type="text/javascript">
                     var data = "{{ $tests->toJson() }}";
                     var data = JSON.parse(data.replace(/&quot;/g,'"'));
                     
                     var yValues=[];
                     var xValues=[];
                     var title;
                     $(document).on('click','#submitStats',function(){
                         yValues=[];
                         xValues=[];
                         title="";
                         d3.select("#svg").remove();
                     var select_number=$("#variableSelect").val();
                    
                     switch(parseInt(select_number)){
                         case 1:
                             title="% of Normal outputs to season of analysis";
                             var i=0;
                             var j=0;
                             for(i=0;i<4;i++){
                                  var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                    
                                     if((parseFloat(data[j]["season"])==-1)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["season"])==-0.33)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["season"])==0.33)&&(i==2)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["season"])==1)&&(i==3)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Winter";
                             if(i==1) xValues[i]="Spring";
                             if(i==2) xValues[i]="Summer";
                             if(i==3) xValues[i]="Fall";
                             }
                            
                             break;
                         case 2:
                             title ="% of Normal outputs to age of examinee"
                             var i=18;
                             var j=0;
                             for(i=0;i<19;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                         if(Math.round(parseFloat(data[j]["age"])*18+18)==(i+18)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             xValues[i]=i+18;
                             }
                            
                             break;
                         case 3:
                             title="% of Normal outputs to history of childish diseases";
                             var i=0;
                             var j=0;
                             for(i=0;i<2;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if((parseFloat(data[j]["disease"])==0)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["disease"])==1)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Had disease";
                             if(i==1) xValues[i]="No diseases";
                             }
                            
                             break;
                        case 4:
                            title="% of Normal outputs to history of serious trauma";
                             var i=0;
                             var j=0;
                             for(i=0;i<2;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if((parseFloat(data[j]["trauma"])==0)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["trauma"])==1)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Had trauma";
                             if(i==1) xValues[i]="No trauma";
                             }
                             break;
                        case 5:
                            title="% of Normal outputs to history of surgical interventions";
                             var i=0;
                             var j=0;
                             for(i=0;i<2;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if((parseFloat(data[j]["surgery"])==0)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["surgery"])==1)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Had surgery";
                             if(i==1) xValues[i]="No surgeries";
                             }
                             break;
                        case 6:
                            title="% of Normal outputs to history of high fevers";
                             var i=0;
                             var j=0;
                             for(i=0;i<3;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if((parseFloat(data[j]["fevers"])==-1)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["fevers"])==1)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["fevers"])==0)&&(i==2)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                    }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Within three months";
                             if(i==1) xValues[i]="More than three months ago";
                             if(i==2) xValues[i]="No fevers in last year";
                             }
                             break;
                        case 7:
                            title="% of Normal outputs to history of alcohol consumption";
                             var i=0;
                             var j=0;
                             for(i=0;i<5;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if((parseFloat(data[j]["alcohol"])==0.2)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["alcohol"])==0.4)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["alcohol"])==0.6)&&(i==2)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["alcohol"])==0.8)&&(i==3)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["alcohol"])==1)&&(i==4)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                    }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Several times a day";
                             if(i==1) xValues[i]="Every day";
                             if(i==2) xValues[i]="Several times a week";
                             if(i==3) xValues[i]="Once a week";
                             if(i==4) xValues[i]="Hardly ever or never";
                             }
                             break;
                        case 8:
                             title="% of Normal outputs to history of smoking habits";
                             var i=0;
                             var j=0;
                             for(i=0;i<3;i++){
                                  var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                    
                                     if((parseFloat(data[j]["smoking"])==-1)&&(i==0)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["smoking"])==1)&&(i==1)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                     if((parseFloat(data[j]["smoking"])==0)&&(i==2)){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                    }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             if(i==0) xValues[i]="Never";
                             if(i==1) xValues[i]="Occasionaly";
                             if(i==2) xValues[i]="Daily";
                             }
                             break;
                        case 9:
                            title ="% of Normal outputs to number of hours spent sitting"
                             var i=0;
                             var j=0;
                             for(i=0;i<17;i++){
                                 var normal=0;
                                     var altered=0;
                                 for(j=0;j<data.length;j++){
                                     
                                     if(Math.round(parseFloat(data[j]["age"])*16)==i){
                                         if(parseInt(data[j]["result"])==0) normal++;
                                         if(parseInt(data[j]["result"])==1) altered++;
                                     }
                                 }
                             if((normal+altered)==0) yValues[i]=0;
                             else
                             yValues[i]=((normal)/(normal+altered))*100;
                             xValues[i]=i;
                             }
                            break;
                     }
                   barchart();
                     });

                      function barchart(){
d3.select("#barchart").remove();

var margin = {top: 40, bottom: 40, left:40, right: 40};
var width = 800 - margin.left - margin.right;
var height = 500 - margin.top - margin.bottom;
var barPadding = 4;
var barWidth = width / yValues.length - barPadding;

var x = d3.scale.ordinal().domain(d3.range(xValues.length)).rangeRoundBands([0, width]);

var y = d3.scale.linear().domain([0,d3.max(yValues)]).range([height, 0]);

var svg = d3.select("body").select("#chart")
.append("svg")
.attr("id","svg")
.attr("width","800")
.attr("height","550")

var tip = d3.tip()
  .attr('class', 'd3-tip')
  .offset([-10, 0])
  .html(function(d,i) {
    return "<strong>Percentage:</strong> <span style='color:red'>" + Math.round(yValues[i]*100)/100 + "</span>";
  })


svg.call(tip);

var g = svg.append("g").attr("id","barchart")
        
.attr("transform", "translate(" + margin.left + "," + (margin.top+20) + ")");


 
var xAxis = d3.svg.axis()
.scale(x)
.orient("bottom")
.tickFormat(function(d, i) {return xValues[i];});

var yAxis = d3.svg.axis()
.scale(y)
.orient("left")
.ticks(10); 


g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
      .attr("fill","#fcfdfe")
.selectAll("text")
.attr("font-size",15)
.style("text-anchor", "middle");
      
g.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis)
      .attr("fill","#fcfdfe")
    .append("text")
    .attr("fill","#fcfdfe")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Percentage of normal outputs");
	

var barchart = g.selectAll("rect")
.data(yValues)
.enter()
.append("rect")
.attr("class","bar")
.attr("x", function(d, i) { return x(i); })
.attr("y", y) .attr("height", function(d) { return height - y(d); })
.on('mouseover', tip.show)
.on('mouseout', tip.hide)
.attr("width", barWidth)
.attr("id", function(d,i){ return "rect"+i});

g.append("text") 
		.attr("x", (width / 2)) 
		.attr("y",  margin.top-70) 
		.attr("text-anchor", "middle") 
                .attr("fill","#fcfdfe")
		.attr("font-size",30)
		.text(title);
}
                    </script>
        <!-- Javascript -->
        <script src="{{asset("assets/js/jquery-1.11.1.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery.backstretch.min.js")}}"></script>
        <script src="{{asset("assets/js/scripts.js")}}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>

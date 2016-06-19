<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>icarus</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/> </link>
	<link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}"/> </link>
	   <script src="{{asset('index/slider.js')}}"></script>
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	   <script src="{{asset('index/menu.js')}}"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  
  
<style type="text/css">
	td {
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<!--search code-->
 <script type="text/javascript">
  $(document).ready(function(){
	var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
	var $rows = $('#table tr');
$('#ss1').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
});
</script>
<!--search end code-->
</head>
<body>
<div id="body">
<div class="left-col">
		 <div class=" col-xs-7 col-md-7">
		 <a href="#" ><span class="glyphicon glyphicon-leaf"> </a>
		</div>
		<div class="col-xs-7 col-md-7">
		   <div class="input-group"  >
			  <input type="text" class="form-control" placeholder="Search for..." style="background:#363636" id="ss1">
			  <span class="input-group-btn">
				<button class="btn btn-default" style="background:#363636" type="button"><span class="glyphicon glyphicon-search" style="color:white"> </span></button>
			  </span>
			</div>
		</div>
		<div class="col-xs-7 col-md-9">
		  <div class="dashboards">
			<h6 style="text-align:center; color:#c3c3c3;" > DASHBOARDS</h6>
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="" id="menu"><a href="{{url('/menu')}}" >MENU</a></li>
					@foreach($menuall as $menuall)
					<li role="presentation" id="{{strtolower($menuall->name)}}" class=""><a href="{{strtolower($menuall->name)}}">{{$menuall->name}}</a></li>
			        @endforeach
			        <li role="presentation" id="career" class=""><a href="career">CAREER</a></li>
			        <li role="presentation" id="contact" class=""><a href="contact">CONTACT</a></li>
			    </ul>
		  
		  </div>
		</div>
	  
	  <div class="col-xs-7 col-md-9">
	  <div class="more">
		<h6 style=" text-align:center;color:#c3c3c3;"> MORE</h6>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a href="{{url('/email')}}">SEND EMAIL</a></li>
			<li role="presentation"><a href="{{url('/enquiry/create')}}">ENQUIRY</a></li>
			<li role="presentation" id="enquiry_show"><a href="{{url('/enquiry')}}">ENQUIRY SHOW</a></li>
				</div>
				</div>
			
		</ul>
	 </div>
	 </div>
   
  


<div class="right-col">
	 @if (session('status'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('status') }}
    </div>
    @endif
	<span style="margin-left:800px"><a href="{{url('/auth/logout')}}"><button type="button" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  	LOGOUT
  </span>
  </button></a></span>
 <div class="row">
  <div class="col-xs-7 col-md-12"> 
	<div class="input-group pull-right" style="width:150px;" >
		 <input type="text" class="form-control" value="01/01/15 - 01/08/15" id="datepicker">
		 <span class="input-group-btn">
         <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-calendar" > </span></button>
         </span>
	</div>
		<h6 style="color:#c3c3c3"> DASHBOARDS</h6>
  </div>
</div>
<div class="row block">
	 <div class="col-xs-7 col-md-4"> 
	<span><p class="Overview" style="color:white">Overview <p></span>
	</div>
	
</div>


<div class="row">
<div class="col-xs-2 col-md-4">
<div class="input-group"  >
	<span class="input-group-btn">
        <button class="btn btn-default" style="background:#363636" type="button"><span class="glyphicon glyphicon-search" style="color:white"> </span></button>
      </span>
      <input type="text" class="form-control" placeholder="Search orders" style="background:#363636" id="search">
      
    </div>
</div>
<div class="col-xs-offset-4 col-xs-4 col-md-offset-4 col-md-4" id="addmenu">
  <span><button id="myBtn" type="button" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  	ADD 
  </button>
  </span>
  
</div>
</div>

<div class="row">
<div class="col-xs-6 col-md-12">

 @yield('section')
 <script src="{{asset('js/jquery.js')}}"> </script>
<script src="{{asset('js/bootstrap.js')}}"> </script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"> </script>
<script type="text/javascript" src="{{asset('js/canvasjs.min.js')}}"></script>
<script type="text/javascript">
            
                $('#datepicker').datepicker();
           
        </script>

</div>
</div>


</div> <!--end-of-right-col-->

</div>
</body>

 
</html>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Icarus Solutions</title>
	<link rel="stylesheet" type="text/css" href="boot/css/bootstrap.min.css"/> </link>
	<link rel="stylesheet" type="text/css" href="boot/css/nstyle.css"/> </link>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<!-- Adding jQuery library -->
	<script type="text/javascript" src="boot/js/jquery.js"></script>

	<!-- Adding fancyBox main JS and CSS files -->
	<script type="text/javascript" src="boot/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="boot/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- for 16*16 logo on title bar-->	<link rel="shortcut icon" href="boot/pictures/twitter16.png" type="image/png">
<script type="text/javascript" src="js/enquiry.js"></script> 
</head>

<body data-spy="scroll" data-target="#navbar-example" >
<!-- navigation panel -->
<nav class="navbar  navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="glyphicon glyphicon-menu-hamburger" style="color:#fff;"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
	</button>
 
      <a class="navbar-brand" href="#"><h2 style="margin-top:-10px; color:#ccc;">Icarus Solutions Pvt.Ltd.</h2></a>
	 </div>
	
	
	 
 <div class="collapse navbar-collapse" id="navbar-collapse-main">
 <br/>
	<br/>
	<br/>
	
	 <div id="navbar-example">
      <ul  class="nav navbar-nav nav-pills"  role="tablist">
         @foreach($menuall as $menuall)
        <li><a href="#{{strtolower($menuall->name)}}">{{$menuall->name}}</a></li>
        @endforeach
          <li><a href="#careers">CAREERS</a></li>
          <li><a href="#contacts">CONTACT</a></li>
          <li id="myBtn"><a>ENQUIRY</a></li>
          <li><a href="{{url('auth/login')}}">SIGN IN</a></li>
	  </ul>
	  </div>
	  <div class="social-icons pull-right">
		<ul class="img-rounded ex1">
		<a href="#"><img src="boot/pictures/facebook.png"></a>
        <a href="#"><img src="boot/pictures/twitter.png" ></a>
        <a href="#"><img src="boot/pictures/linkedin.png"></a>
	    </ul>
		</div>
    </div><!-- /.navbar-collapse -->	
   
  </div><!-- /.container-fluid -->
</nav>
<!--testt-->
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;">ENQUIRY</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route'=>'enquiry.store','files' => true])!!}
            <span>
          <div class="form-group">
              <label for="email">EMAIL</label>
              <input type="text" class="form-control" name="email" placeholder="Enter yours email">
            </div>
          </span>
           <div class="form-group">
              <label for="name">NAME</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
           <div class="form-group">
              <label for="subject">SUBJECT</label>
              <input type="text" class="form-control" name="subject" placeholder="Enter subject">
            </div>
                <div class="form-group">
              <label for="message">MESSAGE</label>
              {!! Form::textarea('message',null,array('class'=>'form-control','id'=>'message')) !!}
            </div>
            <div class="form-group">
                     <label><b>ATTACEMENT</b></label>
                     {!! Form::file('attachment',null,array('class'=>'form-control','id'=>'attachment')) !!}
                 </div>
             <i id="error">@include('errors.list')</i>
            <button type="submit" class="btn btn-default btn-success btn-block">SEND</button>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div> 


<!--testt-->
@foreach($menu as $menu)
@if($menu->theme==5)
<!-- Home -->
<div id="{{strtolower($menu->name)}}">
   <script type="text/javascript">
$(document).ready(function(){
	var a='{{strtolower($menu->name)}}';
     $.ajax({
      url:"{{url('/tablefinder')}}",
      data:{set1:a},
      success:function(data){
        var obj = JSON.parse(data); 
        var i;
        for(i in obj) 
        {
        	if (i==0){
        	 $('.carousel-inner').append('<div class="item active"><div class="carousel-caption lead col-xs-4"> <h1>'+obj[i].header+'</h1></div><img class="img-responsive" src="{{strtolower($menu->name)}}s/'+obj[i].image+'" alt="..."></div>');
            }
            else
            {
            	 $('.carousel-inner').append('<div class="item"><div class="carousel-caption lead col-xs-4"> <h1>'+obj[i].header+'</h1></div><img class="img-responsive" src="{{strtolower($menu->name)}}s/'+obj[i].image+'" alt="..."></div>');

            }
      }
       
  }});
});
</script>
   <!--image slider -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>

  </ol>

  <!-- Wrapper for slides -->

  <div class="carousel-inner " role="listbox">
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!--image slider ends -->
 </div><!-- /home-->
<!-- /first section -->
@endif
<!-- second section - About -->
@if($menu->theme==1)
<div id="{{strtolower($menu->name)}}" class="img-rounded margins pad-section">
  <script type="text/javascript">
$(document).ready(function(){
  var a='{{strtolower($menu->name)}}';
  var b='{{$menu->name}}'+'about';
  var c='{{$menu->name}}'+'image';
     $.ajax({
      url:"{{url('/tablefinder')}}",
      data:{set1:a},
      success:function(data){
        var obj = JSON.parse(data); 
        var i;
        for(i in obj) 
        {
  
          $('#'+b).append(' <p class="text-justify">'+obj[i].content+'</p>');
          $('#'+c).append('<img class="img-responsive" src="{{strtolower($menu->name)."s"}}/'+obj[i].image+'" width="300"  alt="" />');
      }
       
  }});
});
</script>
  <div class="container">
    <div class="row">
      <div class="col-sm-4" id="{{$menu->name.'image'}}">
        
      </div>
      <div class="col-sm-6">
        <h2 style="color:#006495">{{$menu->name}}</h2><hr />
        <p id="{{$menu->name.'about'}}">
		</p>
      </div>
    </div>
</div>
</div>
<!-- /second section -->
@endif

@if($menu->theme==2)
<!-- third section - Services -->
<div id="{{strtolower($menu->name)}}" class="pad-section">
<script type="text/javascript">
$(document).ready(function(){
  var a='{{strtolower($menu->name)}}';
  var b='{{$menu->name}}'+'service';
     $.ajax({
      url:"{{url('/tablefinder')}}",
      data:{set1:a},
      success:function(data){
        var obj = JSON.parse(data); 
        var i;
        for(i in obj) 
        {
  
          $('#'+b).append('<div class="col-sm-3 col-xs-6"><img src="{{strtolower($menu->name)."s"}}/'+obj[i].image+'" class="img-circle" alt="Cinque Terre" width="170" height="200"/><h4 style="color:#006495;">'+obj[i].caption+'</h4><p>'+obj[i].detail+'</p></div>');
      }
       
  }});
});
</script>
  <div class="container">
    <h2 class="text-center" style="color:#006495;">{{$menu->name}}</h2> <hr />
    <div class="row text-center" id="{{$menu->name.'service'}}">
    </div>
  </div>
</div>
<!-- /third section -->
@endif
@if($menu->theme==4)
<!-- fourth section - products -->
<div id="{{strtolower($menu->name)}}" class="pad-section">
  <script type="text/javascript">
	var a='{{strtolower($menu->name)}}';
     $.ajax({
      url:"{{url('/tablefinder')}}",
      data:{set1:a},
      success:function(data){
        var obj = JSON.parse(data); 
        var i;
        for(i in obj) 
        {
           var id=obj[i].name+obj[i].idd;
           
              var lt='{{strtolower($menu->name)."_detail"}}';
           var idd=obj[i].idd;
           var ch='{{strtolower($menu->name)."_id"}}';
            $('#{{strtolower($menu->name)."ss"}}').append('<li class="active"><a data-toggle="tab" href="#'+obj[i].name+'">'+obj[i].name+'</a></li>'); 
            if(i==0){
            $('#{{strtolower($menu->name)."tab"}}').append('<div id="'+obj[i].name+'" class="tab-pane fade in active"><h3 id="'+obj[i].name+obj[i].idd+'">'+obj[i].name+'</h3></div>');
          }else
          {
             $('#{{strtolower($menu->name)."tab"}}').append('<div id="'+obj[i].name+'" class="tab-pane fade"><h3 id="'+obj[i].name+obj[i].idd+'">'+obj[i].name+'</h3></div>');
          }
            $.ajax({
              type:"GET",
               url:"{{url('/tabledetailfinder')}}",
                data:{set1:lt,set2:idd,set3:ch},
              success:function(result){
               var obj1 = JSON.parse(result); 
                  var x;
                  var z;
                  for(z in obj) 
                        {
                           var idd=obj[z].name+obj[z].idd;
                    for(x in obj1) 
                    {
                      var chh='{{strtolower($menu->name)."_id"}}';
                      if(obj[z].idd==obj1[x][chh]){
                      $('#'+idd).after('<div class="col-sm-4"><div class="panel"><div class="panel-heading"> <a href="#" type="link" data-toggle="modal" data-target="#'+obj1[x].id+'"><h2 style="color:#333;">'+obj1[x].menu+'</h2></a></div> <div class="panel-body ex2">'+obj1[x].menu_detail+'<a class="fancybox" href="{{strtolower($menu->name)}}details/'+obj1[x].image+'" width="100%" height="100%" data-fancybox-group="gallery" title="This is image of product 1"><img src="{{strtolower($menu->name)}}details/'+obj1[x].image+'"  width="200px" height="200px"></a></div></div></div>');
                      $("#{{strtolower($menu->name)}}").append('<div class="modal fade" id="'+obj1[x].id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">'+obj1[x].menu+'</h4> </div><div class="modal-body"><img class="img-responsive" src="{{strtolower($menu->name)."details"}}/'+obj1[x].image+'" >'+obj1[x].detail+'</div> <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div></div> </div></div>')
                    }
                    }
                  }
                  }});
          
            }
          
           

  }});
   

</script>


  		<div class="container">
			<h2 class="text-center"style="color:#004C70;font-family: 'Tangerine', serif; font-size:52px;">{{$menu->name}} &nbsp;<span class="glyphicon glyphicon-briefcase"></span></h2>
			
 
<ul class="nav nav-tabs" id="{{strtolower($menu->name).'ss'}}">
    
    
  </ul>

  <div class="tab-content" id="{{strtolower($menu->name).'tab'}}">
   
    
   
  </div>


		</div>

</div>
<!-- /fourth section -->

<!-- modal-->

<!--/modal-->
@endif
@endforeach
<div id="careers" class="pad-section">
<div class="container">
<div class="row">
  <div class="col-sm-12 ">
  <h1 style="color:#006495;text-align:center;">CAREERS</h1><br />
  <p class="text-justify"> ICARUS Information Technologies puts life in the work place by providing an opportunity to work on latest technologies in a team of highly competent engineers.

We give highest priority to every employee's development program. We conduct regular performance reviews to suitably assess development needs and provide various competency development trainings.

We accentuate individuals who have the zeal to grab the best out of everything, rather than the ones just looking for a good job. We hire individuals who wish to achieve new heights and build a lasting career with us. Our collaborative and multidisciplinary environment emphasizes teamwork as well as individual growth.

We have various kinds of positions in fields like Software Development, Database Administration, Software Testing, Systems Management, Network Management, and Project Management. However, we welcome applications from individuals with outstanding abilities, any time. If you are capable and interested in working with us, please do not hesitate to drop your CV here.

We are an equal opportunity employer.</p><br />
<h3 style="color:#006495; ">Vacancy</h3><br>
@if($check=='')
Sorry!!!We havenot any vacancy currently.
@else
<table class="table">
<thead>
<tr>
  <th>POST</th>
  <th>REQUIREMENT</th>
  <th>SALARY</th>
  <th>DEADLINE</th>
  </tr>
  </thead>
  <tbody>
  @foreach($career as $career)
    <tr>
  <td>{!!$career->post!!}</td>
  <td>{!!$career->requirement!!}</td>
  <td>RS,{!!$career->salary!!}</td>
  <td>{!!$career->deadline!!}</td>
  </tr>
  @endforeach
  </tbody>
</table>
Note:To apply for job please send yours cv and mention your post also.And, for apply go to enquiry menu.
@endif
  </div>
</div>

</div>
</div>

<!--fifth section-->
<br><br><br>
<div id="contacts" class="pad-section">
  <div class="container">
    
      <div class="col-sm-12">
        <h2  style="color:#006495;">Let's Get In Touch!</h2><hr />
        
      </div>
	  <!-- google map -->
<div id="google_map" class="pad-section">
<div class="col-sm-5 borders">
@foreach($contact as $contact)
<iframe src="{{$contact->iframe}}" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="col-sm-4">
<h3  style="color:#f05f40;">{{$contact->name}}</h3>
<h4  style="color:#f05f40;">{{$contact->location}}</h4>
<h6  style="color:#f05f40;"><span class="glyphicon glyphicon-earphone" ></span> &nbsp;{{$contact->contact_number}}</h6>
<h6 style="color:#f05f40;"><span class="glyphicon glyphicon-phone" ></span> &nbsp;{{$contact->contact_n2}} </h6>
<h6 style="color:#f05f40;"><span class="glyphicon glyphicon-envelope"></span> &nbsp;{{$contact->email}}</h6>
</div>
@endforeach
<div class="col-sm-1 ex1">
<a href="#"><img class="img-responsive" src="boot/pictures/facebook.png" width="50" height="50"></a>
</div>
<div class="col-sm-1 ex1">
<a href="#"><img class="img-responsive" src="boot/pictures/twitter.png" width="50" height="50"></a>
</div>
<div class="col-sm-1 ex1">
<a href="#"><img class="img-responsive" src="boot/pictures/linkedin.png"width="50" height="50"></a>
</div>
</div>
<!-- /google map -->
</div>
  
</div>
<!-- /fifth section-->

<footer>
<h6 align="right"> Copyright &copy;Icarus Solutions.All rights reserved.
</footer>
</body>

<script src="boot/js/bootstrap.js"> </script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
})

</script>

<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
</script>
	
	<script>
	$(window).scroll(function() {
    if($(this).scrollTop() > 500) {
        $('.navbar-fixed-top').addClass('opaque');
    } else {
        $('.navbar-fixed-top').removeClass('opaque');
    }
});
	</script>

<script>
		
		//Global variables: a reference to the
		
		//photo currently displayed on the page,
		
		var curImage = document.getElementById("photo");
		
		//a variable to store the timer,
		
		var galleryStarter;
		
		//a variable to store a true/false value indicating
		
		//to the program whether the gallery is on or off,
		
		var isGalleryOn = true;
		
		//an array containing 4 strings representing the filepaths
		
		//to the image files in the images folder,
		
		var images = ["boot/pictures/picture.jpg", "boot/pictures/application1.jpg", "boot/pictures/application2.jpg", "boot/pictures/application3.jpg"];
		
		//an empty array that will be filled with 4 preloaded
		
		//image objects: the src property of these image objects will correspond
		
		//to the filepaths contained in the images[] array,
		
		var preloadedImgs = [];
		
		//a variable that works as our counter to
		
		//advance from one image to the next.  It starts at 0.
		
		var counter = 0;
		
		
		
		/**************************************/
		
		
		
		//Init() starts with the image preloading routine.
		
		//First fill the preloadedImgs[] array with a
		
		//number of image objects corresponding to the length
		
		//of the images[] array:
		
		function init()
		
		{
		
		for (var i = 0; i < images.length; i++)
		
		{
		
		preloadedImgs[i] = new Image();
		
		}
		
		//now assign the value of the strings contained in the
		
		//images[] array to the src property of each image object
		
		//in the preloadedImgs[] array, using one more loop:
		
		for (var i = 0; i < preloadedImgs.length; i++)
		
		{
		
		preloadedImgs[i].src = images[i];
		
		}
		
		//Now, assign event handlers to the 2 buttons
		
		//to restart and stop the gallery:
		
		
		window.onload = startGallery;
		
		
		
		//Finally, check the isGalleryOn flag is true.  If it is
		
		//call the function that starts the gallery:
		
		if (isGalleryOn)
		
		{
		
		startGallery();
		
		}
		
		}
		
		
		
		/*********************************************/
		
		
		
		//Assign the init() function to the onload event
		
		onload = init;
		
		
		
		/***********************************************/
		
		
		
		//startGallery() contains the functionality
		
		//to extract the photos from the preloadedImgs[] array
		
		//for display and to set the timer in motion:
		
		function startGallery()
		
		{
		
		//extract the image filepath using the counter
		
		//variable as array index and assign it to the src
		
		//property of the curImage variable:
		
		curImage.src = preloadedImgs[counter].src;
		
		//advance the counter by 1:
		
		counter ++;
		
		//if the counter has reached the length of the
		
		//preloadedImgs[] array, take it back to 0, so the
		
		//photo gallery redisplays the images from the start:
		
		if (counter == preloadedImgs.length)
		
		{
		
		counter = 0;
		
		}
		
		//Set the timer using this same function as one
		
		//of the arguments and 2000 (2 milliseconds) as the other argument.
		
		galleryStarter = setTimeout("startGallery()", 3000);
		
		//Signal that the gallery is on to the rest of the program:
		
		isGalleryOn = true;
		
		}
		
</script>
</html>
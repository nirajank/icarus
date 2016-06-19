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
         <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#products">Products</a></li> 
		<li><a href="#google_map">Contact</a></li>
          <li><a href="#careers">CAREERS</a></li>
          <li><a href="{{url('/enquiry/create')}}">ENQUIRY</a></li>
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

@yield('section')
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
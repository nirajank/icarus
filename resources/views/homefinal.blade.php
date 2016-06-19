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
<!-- for 16*16 logo on title bar--> <link rel="shortcut icon" href="boot/pictures/twitter16.png" type="image/png">
  
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
  
          $('#'+b).append(obj[i].content);
          $('#'+c).append('<img class="img-responsive" src="{{strtolower($menu->name)."s"}}/'+obj[i].image+'" width="300"  alt="" />');
      }
       
  }});
});
</script>
  <div class="container">
    <div class="row">
      <div class="col-sm-4" id="{{$menu->name.'image'}}">
        
      </div>
      <div class="col-sm-6 text-center">
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
<div id="services" class="pad-section">
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
  
          $('#'+b).append('<div class="col-sm-3 col-xs-6"><i class="glyphicon glyphicon-cloud"> </i><h4 style="color:#006495;">'+obj[i].caption+'</h4><p>'+obj[i].detail+'</p></div>');
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
            $('#{{strtolower($menu->name)."ss"}}').append('<li><a data-toggle="tab" href="#'+obj[i].name+'">'+obj[i].name+'</a></li>'); 
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
                      if(obj[z].idd==obj1[x].product_id){
                      $('#'+idd).after('<div class="col-sm-4"><div class="panel"><div class="panel-heading"> <a href="#" type="link" data-toggle="modal" data-target="#'+obj1[x].menu+obj1[x].id+'"><h2 style="color:#333;">'+obj1[x].menu+'</h2></a></div> <div class="panel-body ex2">'+obj1[x].menu_detail+'<a class="fancybox" href="{{strtolower($menu->name)}}details/'+obj1[x].image+'" width="100%" height="100%" data-fancybox-group="gallery" title="This is image of product 1"><img src="{{strtolower($menu->name)}}details/'+obj1[x].image+'"  width="200px" height="200px"></a></div></div></div>');
                      $("#{{strtolower($menu->name)}}").append('<div class="modal fade" id="'+obj1[x].menu+obj1[x].id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">'+obj1[x].menu+'</h4> </div><div class="modal-body"><img class="img-responsive" src="{{strtolower($menu->name)."details"}}/'+obj1[x].image+'" >'+obj1[x].detail+'</div> <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div></div> </div></div>')
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
<!--fifth section-->
<div id="contacts" class="pad-section">
  <div class="container">
    
      <div class="col-sm-12">
        <h2  style="color:#006495;">Let's Get In Touch!</h2><hr />
        
      </div>
    <!-- google map -->
<div id="google_map" class="pad-section">
<div class="col-sm-5 borders">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.64621395394!2d85.25609251320085!3d27.708942727046708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu+44600!5e0!3m2!1sen!2snp!4v1448867245713" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="col-sm-4 text-center">
<h3  style="color:#f05f40;">Icarus Solutions Pvt. Ltd.,</h3>
<h4  style="color:#f05f40;">Minbhawan, Kathmandu</h4>
<h6  style="color:#f05f40;"><span class="glyphicon glyphicon-earphone" ></span> &nbsp; +977 - 01 - ******* </h6>
<h6 style="color:#f05f40;"><span class="glyphicon glyphicon-phone" ></span> &nbsp;+977 - 9841 - ****** </h6>
<h6 style="color:#f05f40;"><span class="glyphicon glyphicon-envelope"></span> &nbsp; abc@icarus.com</h6>
</div>
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
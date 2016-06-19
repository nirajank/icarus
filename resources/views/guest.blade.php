@extends('master')
@section('section')
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>

<style> 
#panel {
    background-color:black;
    border: solid 1px #c3c3c3;
    color:white;
    height:1000px;
   width:200px;

}

</style>


<nav class = "navbar navbar-inverse" role = "navigation" style="margin-bottom:0px">
   
   <div class = "navbar-header">
      <a class = "navbar-brand" href = "#">
          <span id="flip" class="glyphicon glyphicon-th-list"></span>
        </a>
   </div>
   
   <div>
      <ul class = "nav navbar-nav">
         <li class = "active"><a href = "#">DASHBOARD</a></li>
         <ul class="nav navbar-nav navbar-right">
        <li><a style="padding-left:1080px" href="{{url('auth/logout')}}"><span class="glyphicon glyphicon-off"></span><span style="padding-left:10px">Logout</span></a></li>
       
      </ul>
      </ul>
   </div>
   
</nav>
<aside id="panel" class="pull-left" style="margin-top:0px"><ul class="nav nav-sidebar">
	<li class="active" style="margin-top:10px;margin-bottom:10px;"><a href="{{url('/superadmin')}}"><span class="glyphicon glyphicon-user"></span><span style="padding-left:10px">USER<li>
	 <li style="margin-top:10px;margin-bottom:10px;"><a href="{{url('/branch')}}">
          <span class="glyphicon glyphicon-bold"></span><span  style="padding-left:10px">BRANCH</span>
        </a></li>
        <li style="margin-top:30px;margin-bottom:10px;"><a href="{{url('/warehouse')}}">
          <span class="glyphicon glyphicon-glass"></span><span  style="padding-left:10px">WAREHOUSE</span>
        </a></li>
    </ul></aside>

				   <div>
           <P> SOORY!!!!!YOU ARE NOT ACTIVE MEMBER AUTHORIZED!! PLEASE CONTACT TO THE ADMINISTRATOR </P>
</div>
				    	 @stop
				    	
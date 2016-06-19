
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
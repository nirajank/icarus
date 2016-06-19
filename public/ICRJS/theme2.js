
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

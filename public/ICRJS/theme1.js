
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

$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/index1')}}";
  });       
});
$(document).ready(function(){
  var i=$('#error').html();
  if(i!=''){
     $("#myModal").modal();
  }        
});
$(document).ready(function(){
  $("#exit").click(function(){
  $('#error').html("");
  });        
});
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});


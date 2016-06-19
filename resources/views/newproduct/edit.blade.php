@extends('master')
@section('section')  
<!--start edit modal-->
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>EDIT MENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::model($data, ['method'=>'PATCH', 'action'=>['newmenucontroller@menuupdate',$data->idd,$table]]) !!}
          <span>
                <div class="form-group">
              <label for="menu">MENU</label>
             {!! Form::text('name',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">EDIT</button>
           {!! Form::close()!!}
        </div>
      </div>
      
    </div>
  </div> 
</div>
 <!--end create modal-->
 <!--start edit modal-->
 
 <!--end edit modal-->

<script type="text/javascript">
$(document).ready(function(){
  $("#myModal").modal();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url($table)}}";
  });       
  
});</script>
<script type="text/javascript">$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});</script>
<script type="text/javascript">$(document).ready(function(){
  var i=$('#error').html();
  if(i!=''){
     $("#myModal").modal();
  }        
  
});</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
  $('#error').html("");
  });       
  
});
</script>
<script type="text/javascript">
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(490)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

@stop
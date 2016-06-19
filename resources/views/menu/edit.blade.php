@extends('master')
@section('section')  
<!--start edit modal-->
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>EDIT MENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
           {!! Form::model($data, ['method'=>'PATCH', 'action'=>['menucontroller@update',$data->id]]) !!}
          <span>
            <div class="form-group">
              <label for="name"> OLD NAME</label>
              {!! Form::text('name',null,array('class'=>'form-control','id'=>'dis','readonly'=>true)) !!}
            </div>
          </span>
          <div class="form-group">
              <label for="name"> NEW NAME</label>
              {!! Form::text('new_name',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
          </span>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">EDIT</button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 <!--start edit modal-->
 
 <!--end edit modal-->
 
<script type="text/javascript">
$(document).ready(function(){
  $("#slider").attr("class","");
   $("#menu").attr("class","active");
    $("#about").attr("class","");
     $("#services").attr("class","");
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#myModal").modal();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/menu')}}";
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

@stop
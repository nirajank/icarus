@extends('master')
@section('section')
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>DETAIL</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::model($data, ['method'=>'PATCH', 'action'=>['menucontroller@update',$data->id]]) !!}
          <div class="form-group">
              <label for="name">EMAIL</label>
               {!! Form::text('email',null,array('class'=>'form-control','id'=>'message','readonly'=>true)) !!}
            </div>
          <span>
          <div class="form-group">
              <label for="name">MESSAGE</label>
               {!! Form::textarea('message',null,array('class'=>'form-control','id'=>'message','readonly'=>true)) !!}
            </div>
          </span>
          {!!Form::close() !!}
                <div class="form-group">
                {!! Form::open(['method'=>'post', 'url'=>['/download',$data->id]]) !!}
                 <span> <span style="margin-left:20px"><button type="button" class="btn btn-default">ATTACHMENT</button></span><span style="margin-left:20px;margin-right:20px">{!!$data->document!!}</span><button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-download"> </span>
  </button></span>
    {!!Form::close() !!}
            </div>
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
  $("#slider").attr("class","");
   $("#menu").attr("class","");
    $("#about").attr("class","");
     $("#services").attr("class","");
      $("#enquiry_show").attr("class","active");
});</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/enquiry')}}";
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
$(document).ready(function(){
        $("#myModal").modal();
    });
</script>



@stop
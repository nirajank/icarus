@extends('master')
@section('section')
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>NAME</td>
  <td>SUBJECT</td>
  <td>EMAIL</td>
  <td>DATE</td>
  <td>ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($data as $data)
 <tr>
  <td>{!!$data->name!!}</td>
  <td>{!!$data->subject!!}</td>
  <td>{!!$data->email!!}</td>
   <td>{!!$data->created_at!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['EnquiryController@destroy',$data->id]]) !!}
       <span>{!! link_to_route('enquiry.show', '', array($data->id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
      <span> <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-remove "> </span> </span>
  {!!Form::close() !!}
  {!! Form::open(['method'=>'post', 'url'=>['reply',$data->id]]) !!}
  <span > <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6; margin-left:5px">
   REPLY
  </button></span>
   {!!Form::close() !!}
    </td>
  </tr>
   @endforeach
  </tbody>
  
</table>
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>Add Menu</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['route'=>'menu.store'])!!}
          <span>
          <div class="form-group">
              <label for="name">MESSAGE</label>
              <input type="text" class="form-control" name="name" placeholder="Enter header">
            </div>
          </span>
                <div class="form-group">
              <label for="link">LINK</label>
              <input type="text" class="form-control" name="link" placeholder="Enter header">
            </div>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">Add</button>
          </form>
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
   window.location="{{url('/menu')}}";
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
        $("#myBtn").remove();
    });
</script>


@stop
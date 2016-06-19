@extends('master')
@section('section')
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>NAME</td>
  <td>LOCATION</td>
  <td>CONTACT1</td>
  <td>CONTACT2</td>
  <td>EMAIL</td>
  <td>IFRAME</td>
  <td>ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($data as $data)
 <tr>
  <td>{!!$data->name!!}</td>
  <td>{!!$data->location!!}</td>
   <td>{!!$data->contact_number!!}</td>
    <td>{!!$data->contact_n2!!}</td>
     <td>{!!$data->email!!}</td>
      <td>{!!$data->iframe!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['contactcontroller@destroy',$data->id]]) !!}
       <span>{!! link_to_action('contactcontroller@edit', '', array($data->id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
      <span> <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-remove "> </span> </span>
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
          <h4>Add CONTACT</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['route'=>'contact.store'])!!}
          <span>
          <div class="form-group">
              <label for="name">NAME</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
          </span>
                <div class="form-group">
              <label for="link">LOCATION</label>
              <input type="text" class="form-control" name="location" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="link">CONTACT1</label>
              <input type="text" class="form-control" name="contact_number" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="link">CONTACT2</label>
              <input type="text" class="form-control" name="contact_n2" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="link">EMAIL</label>
              <input type="text" class="form-control" name="email" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="link">IFRAME</label>
              <input type="text" class="form-control" name="iframe" placeholder="Enter location">
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
      $("#contact").attr("class","active");
});</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/contact')}}";
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

@stop
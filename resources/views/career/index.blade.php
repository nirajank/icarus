@extends('master')
@section('section')
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>POST</td>
  <td>REQUIREMENT</td>
  <td>SALARY</td>
  <td>DEADLINE</td>
  <td>ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($data as $data)
 <tr>
  <td>{!!$data->post!!}</td>
   <td>{!!$data->requirement!!}</td>
    <td>{!!$data->salary!!}</td>
     <td>{!!$data->deadline!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['CareerController@destroy',$data->id]]) !!}
       <span>{!! link_to_action('CareerController@edit', '', array($data->id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
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
          <h4>Add CAREER</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['route'=>'career.store'])!!}
                <div class="form-group">
              <label for="post">POST</label>
              <input type="text" class="form-control" name="post" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="requiremnt">Requirement</label>
              <input type="text" class="form-control" name="requirement" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="salary">Salary</label>
              <input type="text" class="form-control" name="salary" placeholder="Enter location">
            </div>
             <div class="form-group">
              <label for="deadline">Deadline</label>
              <input type="text" class="form-control" name="deadline" placeholder="Enter location">
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
      $("#career").attr("class","active");
});</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/career')}}";
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
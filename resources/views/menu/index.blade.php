@extends('master')
@section('section')
<style>
table{
    table-layout: fixed;
    width: 200px;
}

th, td {
    overflow:hidden;
    width: 100px;
}
}
</style>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>NAME</td>
  <td>ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($data as $data)
 <tr>
  <td>{!!$data->name!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['menucontroller@destroy',$data->id]]) !!}
                  <span>{!! link_to_route('menu.edit', '', array($data->id), array('class' => 'glyphicon glyphicon-pencil' )) !!}<spamyBtnn>
      <span> <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-remove "> </span>
  </button></span>
    {!!Form::close() !!}</td>
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
          <h4>ADD MENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['action'=>'menucontroller@store'])!!}
          <span>
          <div class="form-group">
              <label for="name">NAME</label>
              <input type="text" class="form-control" name="name" placeholder="Enter header">
            </div>
          </span>
            <div class="form-group">
                <label><b>THEME</b></label>
                 {!!Form::select('theme',$theme,'',['class'=>'form-control','id'=>'theme','default'=>'null'])!!}
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
   $("#menu").attr("class","active");
    $("#about").attr("class","");
     $("#services").attr("class","");
});
</script>

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



@stop
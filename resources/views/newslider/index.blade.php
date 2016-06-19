@extends('master')
@section('section')
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>Image</td>
  <td>Header</td>
   <td>Action</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($data as $data)
 <tr>
  <td>{!!$data->image!!}</td>
  <td>{!!$data->header!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['newmenucontroller@menudestroy',$data->id,$id]]) !!}
                  <span>{!! link_to_action('newmenucontroller@menuedit', '', array($data->id,$id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
      <span> <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-remove "> </span>
  </button></span>
    {!!Form::close() !!}</td>
  </tr>
   @endforeach
  </tbody>
  
</table>

<!--start create modal-->
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>ADD {{strtoupper($id)}}</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['action'=>'newmenucontroller@store','files' => true])!!}
          <span>
             <div class="form-group">
                    <input type='file' onchange="readURL(this);" name="images" />
                         </br>
                   <div style="height=300px; width:500px;border-style: solid;"> 
                <img src="#" alt="image" style="width:495px;height:300px" id="blah"/>
               </div>
                 </div>
            
                <div class="form-group">
              <label for="header">HEADER</label>
              <input type="text" class="form-control" name="header" placeholder="Enter header">
            </div>
            <div class="form-group">
              <label for="header">SUBHEADER</label>
              <input type="text" class="form-control" name="subheader" placeholder="Enter subheader">
            </div>
            <input type="hidden" name="idd" value="{{$id}}"/>
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
     $("#service").attr("class","");
     $("#{{$id}}").attr("class","active");
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url($id)}}";
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
                    .width(495)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
@stop
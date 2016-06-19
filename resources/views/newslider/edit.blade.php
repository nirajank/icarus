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
          <h4>EDIT {{strtoupper($table)}}</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
           {!! Form::model($data, ['method'=>'PATCH', 'action'=>['newmenucontroller@menuupdate',$data->id,$table],'files' => true]) !!}
          <span>
          </span>
          <span>
             <div class="form-group">
             <input type='file' onchange="readURL(this);" name="images"/>
</br>
 <div style="height=300px; width:490px;border-style: solid;"> 

                 <img src="{!! url($find.'/'.$data->image) !!}" alt="image" style="width:490px;height:300px" id="blah"/>
               </div>
</div>
                
                <div class="form-group">
              <label for="header">HEADER</label>
               {!! Form::text('header',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
            <div class="form-group">
              <label for="header">SUBHEADER</label>
               {!! Form::text('subheader',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">EDIT</button>
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
  $("#{{$table}}").attr("class","active");
   $("#menu").attr("class","");
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
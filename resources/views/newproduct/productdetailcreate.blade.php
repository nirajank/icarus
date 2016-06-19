@extends('master')
@section('section')
<div class="modal fade" id="myModal1" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit1">&times;</button>
          <h4>ADD SUBMENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['action'=>'newmenucontroller@newproductdetailstore','files' => true])!!}
            <div class="form-group">
                <label><b>HEADER MENU</b></label>
                 {!!Form::select('menu', $menu, $menu,['class'=>'form-control','id'=>'menu'])!!}
            </div>
            <div class="form-group">
              <label for="submenu">MENU</label>
              <input type="text" class="form-control" name="submenu" placeholder="Enter menu">
            </div>
             <div class="form-group">
              <label for="menu_detail">MENU DETAIL</label>
              <input type="text" class="form-control" name="menu_detail" placeholder="Enter menu detail">
            </div>
             <div class="form-group">
                    <input type='file' onchange="readURL(this);" name="images" />
                         </br>
                   <div style="height=300px; width:500px;border-style: solid;"> 
                <img src="#" alt="image" style="width:495px;height:300px" id="blah"/>
               </div>
                 </div>
            
                <div class="form-group">
              <label for="detail">DETAIL</label>
            {!! Form::textarea('detail',null,array('class'=>'form-control','id'=>'detail')) !!}
            </div>
             <input type="hidden" name="maintable" value="{{$id}}"/>
             <i id="error1">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">Add</button>
          {!!Form::close()!!}
        </div>
      </div>
      
    </div>
  </div> 
</div>
 <!--end edit modal-->

<script type="text/javascript">
$(document).ready(function(){
  $("#slider").attr("class","");
   $("#menu").attr("class","");
    $("#about").attr("class","");
     $("#product").attr("class","");
     $("#{{$id}}").attr("class","active");
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit1").click(function(){
   window.location="{{url($id)}}";
  });       
  
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  var i=$('#error1').html();
  if(i!=''){
     $("#myModal1").modal();
  }        
  
});
</script>
<script type="text/javascript">
$(document).ready(function(){
 $("#myModal1").modal();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit1").click(function(){
  $('#error1').html("");
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
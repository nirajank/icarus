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
 <script src="bootstrap-select.js"></script>
   <link rel="stylesheet" href="bootstrap-select.css">
<table class="table" id="table">
  <thead style="color:white">
  <tr>
  <td>MENU</td>
  <td>SUBMENU</td>
  <td>DETAIL</td>
  <td>IMAGE</td>
  <td>MENU ACTION</td>
  <td>SUBMENU ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
 @foreach($dat as $dat)
 <tr>
  <td>{!!$dat->name!!}</td>
  <td>{!!$dat->menu!!}</td>
  <td>{!!$dat->detail!!}</td>
  <td>{!!$dat->image!!}</td>
    <td>{!! Form::open(['method'=>'DELETE', 'action'=>['newmenucontroller@menudestroy',$dat->idd,$id]]) !!}
                  <span>{!! link_to_action('newmenucontroller@menuedit', '', array($dat->idd,$id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
      <span> <button type="sumbit" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">
  <span class="glyphicon glyphicon-remove "> </span>
  </button></span>
    {!!Form::close() !!}</td>
     <td>{!! Form::open(['method'=>'DELETE', 'action'=>['newmenucontroller@newproductdetaildestroy',$dat->id,$submenu,$id]]) !!}
                  <span>{!! link_to_action('newmenucontroller@newproductdetailedit', '', array($dat->id,$submenu,$id), array('class' => 'glyphicon glyphicon-pencil','id'=>'myBtn' )) !!}<span>
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
          <h4>ADD MENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
           {!! Form::open(['action'=>'newmenucontroller@store'])!!}
          <span>
                <div class="form-group">
              <label for="menu">MENU</label>
              <input type="text" class="form-control" name="name" placeholder="Enter menu">
            </div>
            <input type="hidden" name="idd" value="{{$id}}"/>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">Add</button>
           {!! Form::close()!!}
        </div>
      </div>
      
    </div>
  </div> 
</div>
 <!--end create modal-->
 <!--start addmenu modal-->
<div class="modal fade" id="myModal1" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit1">&times;</button>
          <h4>ADD SUBMENU</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
         {!! Form::open(['action'=>'newmenucontroller@store','files' => true])!!}
          <div class="form-group">
              <label for="id">ID</label>
              <input type="text" class="form-control" name="id" placeholder="Enter id">
            </div>
            <div class="form-group">
                <label><b>HEADER MENU</b></label>
                 {!!Form::select('menu', $menu, $menu,['class'=>'form-control','id'=>'menu'])!!}
            </div>
            <div class="form-group">
              <label for="submenu">MENU</label>
              <input type="text" class="form-control" name="submenu" placeholder="Enter id">
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
            <input type="hidden" name="idd" value="{{$submenu}}"/>
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
  $("#exit").click(function(){
   window.location="{{url($id)}}";
  });       
  
});</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
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
 <script type="text/javascript">
$(document).ready(function(){
  $("#addmenu #myBtn").html('ADD MENU'); 
   $("#addmenu").append('<span><a href={{url("newproductdetail/create/".$id)}}><button type="button" class="btn" style="background:transparent; color:#1997c6; border-color:#1997c6;">SUBMENU</button></a></span>');   
$("#myBtn1").click(function(){
        $("#myModal1").modal();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
     $('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4
    });
      });
    </script>
@stop
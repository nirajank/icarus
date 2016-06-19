@extends('master')
@section('section')  
<!--start edit modal-->
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>EDIT CONTACT</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
           {!! Form::model($data, ['method'=>'PATCH', 'action'=>['contactcontroller@update',$data->id]]) !!}
          <span>
            <div class="form-group">
              <label for="name">NAME</label>
              {!! Form::text('name',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
          </span>
          <div  class="form-group">
              <label for="contact_number">CONTACT1</label>
              {!! Form::text('contact_number',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
            <div class="form-group">
              <label for="name">LOCATION</label>
              {!! Form::text('location',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
            <div cl
            <div class="form-group">
              <label for="contact_n2">CONTACT2</label>
              {!! Form::text('contact_n2',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
            <div class="form-group">
              <label for="iframe">IFRAME</label>
              {!! Form::text('iframe',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
             <div class="form-group">
              <label for="email">EMAIL</label>
              {!! Form::text('email',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
              
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
  $("#myModal").modal();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#exit").click(function(){
   window.location="{{url('/contact')}}";
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
@extends('master')
@section('section')
 <div class="modal fade" id="myModal" role="dialog" data-backdrop=false>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal" id="exit">&times;</button>
          <h4>EMAIL</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          {!! Form::open(['url'=>'enquiry/send','files' => true])!!}
          <span>
          <div class="form-group">
              <label for="email">EMAIL</label>
              <input type="text" class="form-control" name="email" placeholder="Enter header" value="{{$data}}">
            </div>
          </span>
           <div class="form-group">
              <label for="subject">SUBJECT</label>
              <input type="text" class="form-control" name="subject" placeholder="Enter header">
            </div>
                <div class="form-group">
              <label for="message">MESSAGE</label>
              {!! Form::textarea('message',null,array('class'=>'form-control','id'=>'dis')) !!}
            </div>
            <div class="form-group">
                     <label><b>ATTACEMENT</b></label>
                     {!! Form::file('attachment',null,array('class'=>'form-control','id'=>'attachment')) !!}
                 </div>
             <i id="error">@include('errors.list')</i>
              <button type="submit" class="btn btn-success btn-block">SEND</button>
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
  $("#exit").click(function(){
   window.location="{{url('/enquiry')}}";
  });       
  
});</script>
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
$(document).ready(function(){
  $("#myModal").modal();
});
</script>

@stop
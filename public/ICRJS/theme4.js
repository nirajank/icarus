 
	var a='{{strtolower($menu->name)}}';
     $.ajax({
      url:"{{url('/tablefinder')}}",
      data:{set1:a},
      success:function(data){
        var obj = JSON.parse(data); 
        var i;
        for(i in obj) 
        {
           var id=obj[i].name+obj[i].idd;
           
              var lt='{{strtolower($menu->name)."_detail"}}';
           var idd=obj[i].idd;
           var ch='{{strtolower($menu->name)."_id"}}';
            $('#{{strtolower($menu->name)."ss"}}').append('<li><a data-toggle="tab" href="#'+obj[i].name+'">'+obj[i].name+'</a></li>'); 
            if(i==0){
            $('#{{strtolower($menu->name)."tab"}}').append('<div id="'+obj[i].name+'" class="tab-pane fade in active"><h3 id="'+obj[i].name+obj[i].idd+'">'+obj[i].name+'</h3></div>');
          }else
          {
             $('#{{strtolower($menu->name)."tab"}}').append('<div id="'+obj[i].name+'" class="tab-pane fade"><h3 id="'+obj[i].name+obj[i].idd+'">'+obj[i].name+'</h3></div>');
          }
            $.ajax({
              type:"GET",
               url:"{{url('/tabledetailfinder')}}",
                data:{set1:lt,set2:idd,set3:ch},
              success:function(result){
               var obj1 = JSON.parse(result); 
                  var x;
                  var z;
                  for(z in obj) 
                        {
                           var idd=obj[z].name+obj[z].idd;
                    for(x in obj1) 
                    {
                      if(obj[z].idd==obj1[x].product_id){
                      $('#'+idd).after('<div class="col-sm-4"><div class="panel"><div class="panel-heading"> <a href="#" type="link" data-toggle="modal" data-target="#'+obj1[x].menu+obj1[x].id+'"><h2 style="color:#333;">'+obj1[x].menu+'</h2></a></div> <div class="panel-body ex2">'+obj1[x].menu_detail+'<a class="fancybox" href="{{strtolower($menu->name)}}details/'+obj1[x].image+'" width="100%" height="100%" data-fancybox-group="gallery" title="This is image of product 1"><img src="{{strtolower($menu->name)}}details/'+obj1[x].image+'"  width="200px" height="200px"></a></div></div></div>');
                      $("#{{strtolower($menu->name)}}").append('<div class="modal fade" id="'+obj1[x].menu+obj1[x].id+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">'+obj1[x].menu+'</h4> </div><div class="modal-body"><img class="img-responsive" src="{{strtolower($menu->name)."details"}}/'+obj1[x].image+'" >'+obj1[x].detail+'</div> <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></div></div> </div></div>')
                    }
                    }
                  }
                  }});
          
            }
          
           

  }});
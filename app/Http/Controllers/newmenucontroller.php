<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbouEditRequest;
use App\Http\Requests\AboutRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Menu;
use App\Theme;
use App;
use DB;
use File;
use Validator;
class newmenucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index($id)
    { 
         $data=DB::table($id)->latest()->get();
         $menuall=Menu::all();
         $m=Menu::where('name',$id)->pluck('theme');
          switch ($m)
          {
         case 1:
                return view('newabout.index',compact('data','menuall','temp','id'));
                break;
        
        case 2:
                 return view('newservice.index',compact('data','menuall','temp','id'));
                break;
       case 3:
                return view('newenquiry.index',compact('data','menuall','temp','id'));
                break;
       case 4:  
              $dat=DB::table($id)->join($id.'_detail',$id.'.idd', '=', $id.'_detail.'.$id.'_id')->select($id.'.*',  $id.'_detail.*')->get();
            $menu=DB::table($id)->lists('name','name');
            $submenu=$id.'_detail';
             return view('newproduct.index',compact('dat','id','menu','submenu'));
             break;
         
         case 5:
                 return view('newslider.index',compact('data','menuall','temp','id'));
                break;


      default: return view('newabout.index',compact('data','menuall','temp','id'));
                
} 
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**$rulesFirstRequest = ['field1' => 'required', 'field2' => 'required'];
    $rulesSecondRequest = ['field12' => 'required', 'field22' => 'required'];

    $validator1 = Validator::make($request->all(), $rulesFirstRequest);
    $validator2 = Validator::make($request->all(), $rulesSecondRequest);

    if ($validator1->fails() && $validator2->fails()) {
      //Do stuff and return with errors
   }**/
        $id=$request->idd;
        $tt=strtoupper($id);
        $themetype=DB::table('menus')->where('name',$tt)->pluck('theme');
        switch ($themetype) 
          {
         case 1: $rulesFirstRequest = ['content' => 'required', 'header' => 'required','image_caption'=>'required'];
                  $validator1 = Validator::make($request->all(), $rulesFirstRequest);
                  if ($validator1->fails()) {
                    return redirect($id)->withErrors($validator1)->withInput();
                   }
                   $c=DB::table($id)->count();
                   if($c!=1){
                $i=DB::table($id)->insertGetId(['content' =>$request->content, 'header' =>$request->header,'image_caption'=>$request->image_caption]);
                $ext = $request->file('images')->getClientOriginalExtension();
                $imageName = $i."." . $ext;
                $save=$id.'s';
                $request->file('images')->move(
                base_path() . '/public/'.$save, $imageName
                );
                DB::table($id)->where('id',$i)->update(['image' =>$imageName]); 
                return redirect($id)->with('status', 'Records saved!');
              }else
              {
                 return redirect($id)->with('status', 'ABOUT CANNOT BE MORE THAN ONE RECORDS CANNOT BE INSERTED'); 
              }

           case 2:$rulesSecoundRequest = ['caption' => 'required', 'detail' => 'required','images'=>'required'];
                  $validator2= Validator::make($request->all(),$rulesSecoundRequest); 
                  if ($validator2->fails()) {
                    return redirect($id)->withErrors($validator2)->withInput();
                   } 
                $i=DB::table($id)->insertGetId(['caption'=>$request->caption, 'detail' =>$request->detail]);
                $ext = $request->file('images')->getClientOriginalExtension();
                 $imageName = $i."." . $ext;
                $save=$id.'s';
                $request->file('images')->move(
                base_path() . '/public/'.$save, $imageName
                );
                DB::table($id)->where('id',$i)->update(['image' =>$imageName]); 
                return redirect($id)->with('status', 'Records saved!');
            case 4:
                       $rulesFirstRequest = ['name' => 'required|unique:'.$id];
                  $validator1 = Validator::make($request->all(), $rulesFirstRequest);
                  if ($validator1->fails()) {
                    return redirect($id)->withErrors($validator1)->withInput();
                   }
                   DB::table($id)->insert(['name' =>$request->name]); 
                   return redirect($id)->with('status','Records saved!');

            case 5:
                    $rulesSecoundRequest = ['header'=>'required', 'subheader'=>'required','images'=>'required|image'];
                  $validator2= Validator::make($request->all(),$rulesSecoundRequest); 
                  if ($validator2->fails()) {
                    return redirect($id)->withErrors($validator2)->withInput();
                   } 
                    $i=DB::table($id)->insertGetId(['subheader' =>$request->subheader, 'header' =>$request->header]);
                     $ext = $request->file('images')->getClientOriginalExtension();
                 $imageName = $i."." . $ext;
                $save=$id.'s';
                $request->file('images')->move(
                base_path() . '/public/'.$save, $imageName
                );
                 DB::table($id)->where('id',$i)->update(['image' =>$imageName]);
                return redirect($id)->with('status', 'Records saved!');

              default: return view('newabout.index',compact('data','menuall','temp','id'));   
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function menuedit($id,$table){
         $f=strtoupper($table);
        $themetype=DB::table('menus')->where('name',$f)->pluck('theme');
           switch ($themetype) 
          {
         case 1:
                $data=DB::table($table)->where('id',$id)->first();
                $i=$data->image;
                $find=$table.'s';
                $menuall=Menu::all();
                return view('newabout.edit',compact('data','menuall','table','find'));
                break;
        
        case 2:    $data=DB::table($table)->where('id',$id)->first();
                    $i=$data->image;
                    $find=$table.'s';
                   $menuall=Menu::all();
                 return view('newservice.edit',compact('data','menuall','table','find'));
                break;
       case 3:     $data=DB::table($table)->where('id',$id)->first();
                   $menuall=Menu::all();
                return view('newenquiry.edit',compact('data','menuall','table'));
                break;
       case 4:   $data=DB::table($table)->where('idd',$id)->first();
                $menuall=Menu::all();
               return view('newproduct.edit',compact('data','menuall','table'));
                break;

         case 5: 
                $data=DB::table($table)->where('id',$id)->first();
                 $i=$data->image;
                    $find=$table.'s';
                $menuall=Menu::all();
               return view('newslider.edit',compact('data','menuall','table','find'));
                break;        
      default: return 'no view';
                
} 
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function menuupdate(Request $request,$id,$table)
    {
         $f=strtoupper($table);
        $themetype=DB::table('menus')->where('name',$f)->pluck('theme');
           switch ($themetype) 
          {
         case 1:
              $rulesFirstRequest = ['content' => 'required', 'header' => 'required','image_caption'=>'required'];
                  $validator1 = Validator::make($request->all(), $rulesFirstRequest);
                  if ($validator1->fails()) {
                    return redirect('menuedit/'.$id.'/'.$table)->withErrors($validator1)->withInput();
                   }
              if($request->hasFile('images')){ 
                 $dd=DB::table($table)->where('id',$id)->pluck('image');
                 $file=public_path()."/". $table."s/".$dd;
                 File::delete($file);
             $ext = $request->file('images')->getClientOriginalExtension();
             $imageName = $id . "." . $ext;
             $find=$table.'s';
             $request->file('images')->move(
             base_path() . '/public'.'/'.$find, $imageName
              );
             }
            else{
             $data=DB::table($table)->where('id',$id)->pluck('image');
             $imageName=$data;
            }
            $data=DB::table($table)->where('id',$id)->update(['content'=>$request->content,'image'=>$imageName,'header'=>$request->header,'image_caption'=>$request->image_caption]);
             return redirect($table)->with('status', 'Records updated!');
        case 2:
               $rulesSecoundRequest = ['caption' => 'required', 'detail' => 'required'];
                  $validator2= Validator::make($request->all(),$rulesSecoundRequest); 
                  if ($validator2->fails()) {
                     return redirect('menuedit/'.$id.'/'.$table)->withErrors($validator2)->withInput();
                   } 
              if($request->hasFile('images')){ 
                $dd=DB::table($table)->where('id',$id)->pluck('image');
                $file=public_path()."/". $table."s/".$dd;
                 File::delete($file);
             $ext = $request->file('images')->getClientOriginalExtension();
             $imageName = $id . "." . $ext;
             $find=$table.'s';
             $request->file('images')->move(
             base_path() . '/public'.'/'.$find, $imageName
              );
             }
            else{
             $data=DB::table($table)->where('id',$id)->pluck('image');
             $imageName=$data;
            }
            $data=DB::table($table)->where('id',$id)->update(['caption'=>$request->caption, 'detail' =>$request->detail,'image'=>$imageName]);
             return redirect($table)->with('status', 'Records updated!');    
       case 4:
                  $rulesFirstRequest = ['name' => 'required|unique:'.$table];
                  $validator1 = Validator::make($request->all(), $rulesFirstRequest);
                  if ($validator1->fails()) {
                    return redirect('menuedit/'.$id.'/'.$table)->withErrors($validator1)->withInput();
                   }
                   DB::table($table)->where('idd',$id)->update(['name'=>$request->name]);
                    return redirect($table)->with('status', 'Records updated!'); 

        case 5:  
                $rulesFirstRequest = [ 'header'=>'required','subheader'=>'required'];
                  $validator1 = Validator::make($request->all(), $rulesFirstRequest);
                  if ($validator1->fails()) {
                    return redirect('menuedit/'.$id.'/'.$table)->withErrors($validator1)->withInput();
                   }
                    if($request->hasFile('images')){ 
                      $dd=DB::table($table)->where('id',$id)->pluck('image');
                $file=public_path()."/". $table."s/".$dd;
                 File::delete($file);
             $ext = $request->file('images')->getClientOriginalExtension();
             $imageName = $id . "." . $ext;
             $find=$table.'s';
             $request->file('images')->move(
             base_path() . '/public'.'/'.$find, $imageName
              );
             }
            else{
             $data=DB::table($table)->where('id',$id)->pluck('image');
             $imageName=$data;
            }
            $data=DB::table($table)->where('id',$id)->update(['header'=>$request->header, 'subheader' =>$request->subheader,'image'=>$imageName]);
             return redirect($table)->with('status', 'Records updated!');  
       
        default:return 'no updatad';

    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function menudestroy($id,$table)
    {
         $f=strtoupper($table);
        $themetype=DB::table('menus')->where('name',$f)->pluck('theme');
           switch ($themetype) 
          {
         case 1: 
                 $dd=DB::table($table)->where('id',$id)->first();
                 $i=$dd->image;
                 $find=$table.'s/';
                 $file= public_path(). '/'.$find.$i;
                 File::delete($file);
                 DB::table($table)->where('id',$id)->delete();
                 return redirect($table)->with('status', 'Record deleted!');

          case 2:  
                 $dd=DB::table($table)->where('id',$id)->first();
                 $i=$dd->image;
                 $find=$table.'s/';
                 $file= public_path(). '/'.$find.$i;
                 File::delete($file);
                 DB::table($table)->where('id',$id)->delete();
                 return redirect($table)->with('status', 'Record deleted!'); 
            case 4:
                   DB::table($table)->where('idd',$id)->delete();
                   return redirect($table)->with('status','Record deleted!');    

             case 5:
                     $dd=DB::table($table)->where('id',$id)->first();
                     $i=$dd->image;
                      $find=$table.'s/';
                      $file= public_path(). '/'.$find.$i;
                      File::delete($file);
                       DB::table($table)->where('id',$id)->delete();
                       return redirect($table)->with('status', 'Record deleted!');

         default:return 'no deleted';        
    }
}
     public function newproductdetailcreate($id)
     {

         $menu=DB::table($id)->lists('name','name');
          return view('newproduct.productdetailcreate',compact('menu','id'));
     }
     public function newproductdetailstore(Request $request)
     {
        $rulesFirstRequest = ['images'=>'required','menu'=>'required','detail'=>'required','submenu'=>'required','menu_detail'=>'required'];
         $validator1 = Validator::make($request->all(), $rulesFirstRequest);
        if ($validator1->fails()) 
        {
          $id=$request->maintable;
         $menu=DB::table($id)->lists('name','name');
          return redirect('newproductdetail/create/'.$id)->withErrors($validator1)->withInput();
        }
       $menu=$request->submenu;
       $headermenu=$request->menu;
       $m=DB::table($request->maintable)->where('name',$headermenu)->first();
       $menu_id=$m->idd;
       $table=$request->maintable.'_detail';
       $i=DB::table($table)->insertGetId(['menu'=>$menu,'detail'=>$request->detail,$request->maintable.'_id'=>$menu_id,'menu_detail'=>$request->menu_detail]);
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $i . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/'.$request->maintable.'details/', $imageName
        );
          DB::table($table)->where('id',$i)->update(['image'=>$imageName]);
        return redirect($request->maintable)->with('status', 'Records saved!');
     }


    public function newproductdetailedit($id,$table,$maint)
    {
        $data=DB::table($table)->where('id',$id)->first();
         $menuall=Menu::all();
        $im= '/'.$maint.'details';
        return view('newproduct.productedit',compact('data','menuall','maint','table','im'));
    }

   public function newproductdetailupdate(Request $request,$id,$table,$maint)
   {
    $rulesFirstRequest = ['menu'=>'required','detail'=>'required','menu_detail'=>'required'];
         $validator1 = Validator::make($request->all(), $rulesFirstRequest);
        if ($validator1->fails()) 
        {
          return redirect('newproductdetailedit/'.$id.'/'.$table.'/'.$maint)->withErrors($validator1)->withInput();
        }
      
     if($request->hasFile('images')){ 
      $dd=DB::table($table)->where('id',$id)->pluck('image');
                 $file=public_path(). "/".$maint."details/".$dd;
                 File::delete($file);
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/'.$maint.'details/', $imageName
        );
      }
      else{
         $data=DB::table($table)->where('id',$id)->pluck('image');
        $imageName=$data;
      }
        DB::table($table)->where('id',$id)->update(['image'=>$imageName,'menu'=>$request->menu,'detail'=>$request->detail,'menu_detail'=>$request->menu_detail]);
        return redirect($maint)->with('status', 'Records updated!');
   }
  
     public function newproductdetaildestroy($id,$table,$maint)
     {
        $dd=DB::table($table)->where('id',$id)->first();
        $i=$dd->image;
        $file= public_path(). "/".$maint.'details/'.$i;

       File::delete($file);

        DB::table($table)->where('id',$id)->delete();

       return redirect($maint)->with('status', 'Records deleted!');
     }

      public function tablefinder(Request $request){
        $id=$request->set1;
        $data=DB::table($id)->get();
        return json_encode($data);

      }
      public function tabledetailfinder(Request $request)
      {
        $lt=$request->set1;
        $id=$request->set2;
        $ch=$request->set3;
        $data=DB::table($lt)->where($ch,$id)->get();
        return json_encode($data);
      
      }
}
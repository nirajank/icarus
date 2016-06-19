<?php

namespace App\Http\Controllers;
use App\Http\Requests\menurequest;
use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Theme;
use Artisan;
use Schema;
use File;
class menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=Menu::latest()->get();
      
        $theme=Theme::where('id','!=',3)->lists('name','name');
       //
        return view('menu.index',compact('data','menuall','theme'));
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
    public function store(menurequest $request)
    {
         $newmenu=$request->name;
        // $arraycheck=array('product'=>'product','about'=>'about','service'=>'service','slider'=>'slider','contact'=>'contact','menu'=>'menu','enquiry'=>'enquiry','email'=>'email');
          $arraycheck=array('menu'=>'menu','enquiry'=>'enquiry','email'=>'email','careers'=>'careers','contact'=>'contact','career'=>'career');
         if(in_array($newmenu, $arraycheck)){
            return redirect('menu')->with('status', 'This menu is static and already exists');
         }
         else{
            $menu=new Menu();
            $menu->name=$request->name;
            $theme=$request->theme;
            $in=Theme::where('name',$theme)->pluck('id');
            $menu->theme=$in;
            $menu->save();
           $test=strtolower($request->name);
        switch ($in) {
         case 1:
                Schema::create($test, function ($table) {
            $table->increments('id');
            $table->string('image');
             $table->string('image_caption');
             $table->string('header');
            $table->longText('content');
            $table->timestamps();
        });     
                $save=$test.'s';
                $file= public_path(). '/'.$save;
                File::makeDirectory($file);
                return redirect('menu')->with('status', 'Record saved!');
                break;
        
       case 2:
           Schema::create($test, function ($table) {
            $table->increments('id');
            $table->string('caption');
            $table->longText('detail');
            $table->string('image');
            $table->timestamps();
        });
               $save=$test.'s';
                $file= public_path(). '/'.$save;
                File::makeDirectory($file);
                return redirect('menu')->with('status', 'Record saved!');
                break;
       case 3:
               Schema::create($test, function ($table) {
            $table->increments('id');
             $table->string('name');
              $table->string('email');
               $table->string('subject');
                $table->string('message');
                 $table->string('document');
                  $table->dateTime('receive_date');
            $table->timestamps();
        });
                return redirect('menu')->with('status', 'Record saved!');
                break;
       case 4:
            Schema::create($test, function ($table) {
            $table->increments('idd');
            $table->string('name');
            $table->timestamps();
            });
            $ttt=$test;
            Schema::create($test.'_detail', function ($table) use($ttt){
            $table->increments('id');
            $table->string('menu');
            $table->string('image');
            $table->string('menu_detail');
            $table->integer($ttt.'_id')->unsigned()->nullable();
            $table->foreign($ttt.'_id')->references('idd')->on($ttt)->onUpadate('cascade')->onDelete('cascade');
            $table->longText('detail');
            $table->timestamps();
        });
               $save=$test.'s';
                $save1=$test.'details';
                $file= public_path(). '/'.$save;
                $file1= public_path(). '/'.$save1;
                File::makeDirectory($file);
                 File::makeDirectory($file1);
                 $menu->name_detail=$test.'_detail';
                 $menu->save();
                  return redirect('menu')->with('status', 'Record saved!');
                break;


          case 5:
                  Schema::create($test, function ($table) {
            $table->increments('id');
            $table->string('image');
            $table->string('header');
            $table->string('subheader');
            $table->timestamps();
        });
                  $save=$test.'s';
                $file= public_path(). '/'.$save;
                File::makeDirectory($file);
                return redirect('menu')->with('status', 'Record saved!');
                break;
      default:  return redirect('menu')->with('status', 'Record saved!');
                break;
} 
                     /** switch ($request->theme) {
         case 1:
                Schema::create($test, function ($table) {
            $table->increments('id');
            $table->string('image');
             $table->string('image_caption');
             $table->string('header');
            $table->longText('content');
            $table->timestamps();
        });
                return redirect('menu')->with('status', 'Record saved!');
                break;
        
       case 2:
               Artisan::call('make:migration:schema',['name'=>$create,'--schema'=>'image_caption:string,image:string,header:string,content:longText','--model'=>'false']);
                 Artisan::call('migrate');
                return redirect('menu')->with('status', 'Record saved!');
                break;
       case 3:
              Artisan::call('make:migration:schema',['name'=>$create,'--schema'=>'image_caption:string,image:string,header:string,content:longText','--model'=>'false']);
                 Artisan::call('migrate');
                return redirect('menu')->with('status', 'Record saved!');
                break;

      default:  return redirect('menu')->with('status', 'Record saved!');
                break;
} **/
         
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $data=Menu::find($id);
         $menuall=Menu::all();
        return view('menu.edit',compact('data','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ud=Menu::findOrFail($id);
        $ud->update(['name' =>$request->new_name]);
        Schema::rename(strtolower($request->name),strtolower($request->new_name));
        $d1=strtolower($request->name);
       $d2=$d1.'s';
       $file= public_path(). "/$d2";
       $file1= public_path(). "/".strtolower($request->new_name)."s";
       File::move($file,$file1);

        return redirect('menu')->with('status', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $dd=Menu::find($id);
         $newmenu=$dd->name;
         $test=strtolower($newmenu);
        // $arraycheck=array('product'=>'product','about'=>'about','service'=>'service','slider'=>'slider','contact'=>'contact','menu'=>'menu');
          $arraycheck=array('menu'=>'menu','enquiry'=>'enquiry','email'=>'email');
         if(in_array($newmenu, $arraycheck)){
            return 'Cannot delete the static menu';
         }
         else{
         $theme=$dd->theme;
         if($theme==4)
         {
             Schema::drop($test.'_detail');
           Schema::drop($test);
            $d2=$test.'s';
            $d3=$test.'details';
           $file= public_path(). "/$d2";
           $file1= public_path(). "/$d3";
            File::deleteDirectory($file);
             File::deleteDirectory($file1);
              $dd->delete();
              return redirect('/menu')->with('status', 'Record deleted!');

         }   
         else{  
        $name=$dd->name;
       strtolower($name);
      
       $d1=strtolower($name);
        Schema::drop($d1);
       $d2=$d1.'s';
       $file= public_path(). "/$d2";
       File::deleteDirectory($file);
        $dd->delete();
        return redirect('/menu')->with('status', 'Record deleted!');
    }
    }
    }
}

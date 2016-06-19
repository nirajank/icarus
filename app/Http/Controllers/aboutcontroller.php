<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbouEditRequest;
use App\Http\Requests\AboutRequest;
use App\About;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

use App\Menu;
class aboutcontroller extends Controller
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
        $data=About::latest()->get();
         $menuall=Menu::all();
        return view('about.index',compact('data','menuall'));
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
    public function store(AboutRequest $request)
    {
        $data = new About;

    $data->content=$request->content;
     $data->header=$request->header;
     $data->image_caption=$request->image_caption;
        if($data->save())
         {
           $ext = $request->file('images')->getClientOriginalExtension();
           $imageName = $data->id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/abouts/', $imageName
        );
          $data->image=$imageName;
          $data->save();

         }
        return redirect('about')->with('status', 'Records saved!');
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
        $data=About::find($id);
        $i=$data->image;
        $file= public_path(). "/abouts/$i";
         $menuall=Menu::all();
       return view('about.edit',compact('data','file','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbouEditRequest $request, $id)
    {
          if($request->hasFile('images')){ 
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/abouts/', $imageName
        );
      }
      else{
         $data=About::find($id);
        $imageName=$data->image;
      }
        $data=About::find($id);
        $data->update(['content'=>$request->content,'image'=>$imageName,'header'=>$request->header,'image_caption'=>$request->image_caption]);
        return redirect('about')->with('status', 'Records updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $dd=About::find($id);
        $i=$dd->image;
        $file= public_path(). "/abouts/$i";

       File::delete($file);

        $dd->delete();

       return redirect('about')->with('status', 'Record deleted!');
    }
}

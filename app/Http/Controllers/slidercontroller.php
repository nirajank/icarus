<?php

namespace App\Http\Controllers;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SliderEditRequest;


use Illuminate\Http\Request;
use App\Slider;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use App\Menu;
class slidercontroller extends Controller
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
         $data=Slider::latest()->get();
          $menuall=Menu::all();
        return view('slider.index',compact('data','menuall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {  
        $data=new Slider;
        $data->header=$request->header;
        $data->subheader=$request->subheader;
         if($data->save()){
            $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $data->id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/sliders/', $imageName
        );
            $data->image=$imageName;
            $data->save();
         }
        return redirect('slider')->with('status', 'Records saved!');
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
        $data=Slider::find($id);
        $i=$data->image;
        $file= public_path(). "/sliders/$i";
         $menuall=Menu::all();
       return view('slider.edit',compact('data','file','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderEditRequest $request, $id)
    {

         if($request->hasFile('images')){ 
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/sliders/', $imageName
        );
      }
      else{
         $data=Slider::find($id);
        $imageName=$data->image;
      }
        $data=Slider::find($id);
        $data->update(['image'=>$imageName,'header'=>$request->header,'subheader'=>$request->subheader]);
        return redirect('slider')->with('status', 'Records updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd=Slider::find($id);
        $i=$dd->image;
        $file= public_path(). "/sliders/$i";

       File::delete($file);

        $dd->delete();

       return redirect('slider')->with('status', 'Records deleted!');
    }
}

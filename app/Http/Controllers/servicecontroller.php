<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceEditRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use File;
use App\Menu;
class servicecontroller extends Controller
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
        $data=Service::latest()->get();
        $menuall=Menu::all();
        return view('service.index',compact('data','menuall'));
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
    public function store(ServiceRequest $request)
    {
         $data=new Service;
         $data->caption=$request->caption;
         $data->detail=$request->detail;
         if($data->save())
         {
              $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $data->id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/services/', $imageName
        );
                $data->image=$imageName;
                $data->save();
         }
        return redirect('service')->with('status', 'Records saved!');
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
        $data=Service::find($id);
        $i=$data->image;
        $file= public_path(). "/services/$i";
         $menuall=Menu::all();
       return view('service.edit',compact('data','file','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceEditRequest $request, $id)
    {
          if($request->hasFile('images')){ 
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/services/', $imageName
        );
      }
      else{
         $data=Service::find($id);
        $imageName=$data->image;
      }
        $data=Service::find($id);
         $data=Service::create(['image'=>$imageName,'caption'=>$request->caption,'detail'=>$request->detail]);
        return redirect('service')->with('status', 'Records updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd=Service::find($id);
        $i=$dd->image;
        $file= public_path(). "/services/$i";

       File::delete($file);

        $dd->delete();

       return redirect('service')->with('status', 'Records deleted!');
    }
}

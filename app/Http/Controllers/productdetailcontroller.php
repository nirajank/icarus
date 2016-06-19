<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use App\Http\Requests\ProductDetailRequest;
use App\Http\Requests\ProductDetailEditRequest;
use File;
use App\Menu;


class productdetailcontroller extends Controller
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
        $pd=ProductDetail::latest()->get();
        $menuall=Menu::all();
        return view('product.index',compact('pd','menuall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu=Product::lists('menu','menu');
        $menuall=Menu::all();
        return view('product.productdetailcreate',compact('menu','menuall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDetailRequest $request)
    {
      $menu=$request->submenu;
       $headermenu=$request->menu;
       $m=Product::where('menu',$headermenu)->first();
       $menu_id=$m->id;
       $data=new ProductDetail;
       $data->menu=$menu;
       $data->detail=$request->detail;
       $data->product_id=$menu_id;
       $data->menu_detail=$request->menu_detail;
       if($data->save()){
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $data->id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/productdetails/', $imageName
        );
          $data->image=$imageName;
          $data->save();
       }
        return redirect('/product')->with('status', 'Records saved!');
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
        $data=ProductDetail::find($id);
         $menuall=Menu::all();
        return view('product.productedit',compact('data','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductDetailEditRequest $request, $id)
    {
        if($request->hasFile('images')){ 
        $ext = $request->file('images')->getClientOriginalExtension();
        $imageName = $id . "." . $ext;
          $request->file('images')->move(
            base_path() . '/public/productdetails/', $imageName
        );
      }
      else{
         $data=ProductDetail::find($id);
        $imageName=$data->image;
      }
        $data=ProductDetail::find($id);
        $data->update(['image'=>$imageName,'menu'=>$request->menu,'detail'=>$request->detail,'menu_detail'=>$request->menu_detail]);
        return redirect('product')->with('status', 'Records updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dd=ProductDetail::find($id);
        $i=$dd->image;
        $file= public_path(). "/productdetails/$i";

       File::delete($file);

        $dd->delete();

       return redirect('product')->with('status', 'Records deleted!');
    }
}

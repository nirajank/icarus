<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetail;
use File;
use App\Menu;
use App;

class productcontroller extends Controller
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
        
          $menu=Product::lists('menu','menu');
          $p=Product::latest()->get();
          $menuall=Menu::all();
        return view('product.index',compact('menu','p','menuall'));
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
    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return redirect('product')->with('status', 'Record saved!');
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
        $data=Product::find($id);
         $menuall=Menu::all();
        return view('product.edit',compact('data','menuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $data=Product::find($id);
        $data->update($request->all());
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
        $dd=Product::find($id);
        foreach ($dd->product_detail as $pd)
        {
              $pdi=$pd->image;
              $file= public_path(). "/productdetails/$pdi";
              File::delete($file);
        }
        $dd->delete();
        return redirect('product')->with('status', 'Records deleted!');
    }
}

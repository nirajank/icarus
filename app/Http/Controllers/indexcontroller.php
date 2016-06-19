<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Menu;
use App\Slider;
use App\Service;
use App\About;
use DB;
use Illuminate\Database\Eloquent\Collection;
use App\Contact;
use App\Career;
class indexcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        //$product=Product::all();
    {
        $menu=Menu::all();
        $menuall=Menu::all(); 
        $contact=Contact::all();
        $career=Career::all();
          $check=Career::first();
        return view('home',compact('menu','menuall','contact','career','check'));
       /** foreach ($m as $m) {
           echo $m->name;
        }*/
       /** $arrayName = array('fsf','ad`  sfaf'); 
        foreach ($array as $menuall) 
        {
            return $menuall->name;
            
           }   **/
        //return $menuall;
       return view('home',compact('menu','menuall'));
           //return view('welcome',compact('menu','a'));
        
          
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
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

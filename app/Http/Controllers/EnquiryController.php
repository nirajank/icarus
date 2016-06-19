<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnquiryRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Input;
use App\Enquiry;
use Response;
use File;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
    }
    public function index()
    {
        $data=Enquiry::latest()->get();
        return view('enquiry.index',compact('data'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnquiryRequest $request)
    {
          $messages=$request->message;
      $subject=$request->subject;
        $e=$request->email;
        $name=$request->name;
         $uploaded_file = $request->file('attachment');
        if (isset($uploaded_file)) { 
         $ext = $request->file('attachment')->getClientOriginalExtension();
        $attachment= $request->name. "." . $ext;
          $request->file('attachment')->move(
            base_path() . '/public/enquirys/', $attachment
        );}
          else 
            $attachment="no attachment";
           $data=Enquiry::create(['document'=>$attachment,'name'=>$name,'subject'=>$subject,'message'=>$messages,'email'=>$e]);
           return 'ENQUIRY SEND';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Enquiry::find($id);
        $messages=$data->message;
       $subject=$data->subject;
        $email=$data->email;
        $document=$data->document;
         $name=$data->name;
          $date=$data->created_at;
         
           return view('enquiry.show',compact('data'));
           
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
        $dd=Enquiry::find($id);
        $i=$dd->document;
        $file= public_path(). "/enquirys/$i";
       File::delete($file);
        $dd->delete();
        return redirect('enquiry')->with('status', 'Record deleted!');
    }
     public function send(EnquiryRequest $request)
    {
        $uploaded_file = $request->file('attachment');
        if (isset($uploaded_file)) 
        { 
             $ext = $request->file('attachment')->getClientOriginalExtension();
        $attachment= $request->email. "." . $ext;
          $request->file('attachment')->move(
            base_path() . '/public/emails/', $attachment
        );
          $file= public_path(). "/emails/$attachment";
      $messages=$request->message;
         \Mail::send('email',['key' =>$messages],function($message) use ($file){
                $message->from('nirajankay@gmail.com', 'Nirajan Kayastha');
         $message->to(Input::get('email'),Input::get('email') )->subject(Input::get('subject'));
          $message->attach($file);
        });

      }
     else
     {
         $messages=$request->message;
         \Mail::send('email',['key' =>$messages],function($message){
                $message->from('nirajankay@gmail.com', 'Your Application');
         $message->to(Input::get('email'),Input::get('email') )->subject(Input::get('subject'));
         });
     }
      $file= public_path(). "/emails/$attachment";
      File::delete($file);
       return 'mail send';
    }

    public function email()
    {
         $data="";
        return view('enquiry.email',compact('data'));

    }
    public function download($id)
    {
        $data=Enquiry::find($id);
         $document=$data->document;
         $file= public_path(). "/enquirys/$document";
        return Response::download($file);


    }
    public function reply($id)
    {
        $dat=Enquiry::find($id);
        $data=$dat->email;
        return view('enquiry.email',compact('data'));

    }
}

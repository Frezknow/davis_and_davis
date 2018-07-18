<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\ads;
use App\leads;
use App\messages;
use App\User;
use App\articles;
use Session;
use Illuminate\Support\Facades\Redirect;
class functions extends Controller
{
  public function add_Product_Listing(Request $request){
    $imgs="";
      if($request->file('imgs')){
       $file =$request->file('imgs');
       $destinationPath = 'imgs';
       $file->move($destinationPath,$file->getClientOriginalName());
       $imgs=$destinationPath."/".$file->getClientOriginalName();
      }

     ads::create([
      'link'=>$request->link,
      'title'=>$request->title,
      'description'=>$request->description,
      'imgs'=>$imgs,
      'business'=>$request->business
    ]);
    redirect('lg');
  }
 public function DeleteProduct(Request $request){
    ads::find($request->id)->delete();
 }
 public function lead(Request $request){
   leads::create([
    'email'=>$request->email,
    'number'=>$request->number,
    'name'=>$request->name,
    'type'=>$request->type,
    'business'=>",".$request->business
  ]);
  Session::flash('message', "Information was submitted We will be in contact.");
  return redirect::back();
 }
 public function createArticle(Request $request){
   $imgs="";
     if($request->file('imgs')){
      $file =$request->file('imgs');
      $destinationPath = 'imgs';
      $file->move($destinationPath,$file->getClientOriginalName());
      $imgs=$destinationPath."/".$file->getClientOriginalName();
     }
   articles::create([
     'title'=>$request->title,
     'section1'=>$request->section1,
     'section2'=>$request->section2,
     'imgs'=>$imgs,
     'type'=>$request->type
   ]);
   Session::flash('message', "Message Submitted Article created.");
   return redirect::back();
 }
 public function updateLeads(Request $request){
   $ids = $request->ids;
   $ids = explode(',',$ids);
   $ids = array_filter($ids);
   $email = $request->email;
   foreach($ids as $id){
   $lead = leads::select('business')->where('id',$id)->update(['business'=> DB::raw("CONCAT(business,',$email')")]);
  }
 }
  public function contact(Request $request){
    messages::create([
      'email'=>$request->email,
      'number'=>$request->number,
      'name'=>$request->name,
      'message'=>$request->message
    ]);
    Session::flash('message', "Message Submitted , We will be in Contact.");
    return redirect::back();

  }
public function createBusiness(Request $request){
  return User::create([
      'name' => $request->name,
      'email' =>  $request->email,
      'password' => Hash::make("43353"),
      'type'=>"business"
   ]);
   Session::flash('message', "Business was Created.");
   return redirect::back();
  }

 }

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\ads;
use App\leads;
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
    'business'=>$request->business
  ]);
 }

}

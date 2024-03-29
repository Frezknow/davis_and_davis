<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\ads;
use App\articles;
use Illuminate\Support\Facades\DB;
class views extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function methods(){
      return view('methods');
    }
    public function products(){
      $ads = ads::all();
      return view('products', array('ads'=>$ads));
    }
    public function marketing(){
      return view('marketing');
    }
    public function about(){
      return view('about');
    }
    public function contactus(){
      return view('contactus');
    }
    public function lg(){
      return view('lg');
    }
  public function go(Request $request){
    $id = $request->pid;
    $ad = ads::where('id',$id)->first();

    return view('go',array('ad'=>$ad));
  }
  public function article(Request $request){
    $id = $request->id;
    $article= articles::where('id',$id)->first();
    return view('article',array('article'=>$article));
  }
  public function articles(){
    $articles= articles::all();
    return view('articles',array('articles'=>$articles));
  }


}

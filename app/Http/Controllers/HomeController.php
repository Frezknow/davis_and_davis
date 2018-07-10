<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ads;
use App\leads;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $email = auth()->user()->email;
        if(auth()->user()->type=="admin"){
          $leads = leads::all();
          $ads = ads::all();
        }
        if(auth()->user()->type=="business"){
          $leads = leads::where('business',$email)->get();
          $ads = null;
        }
        echo auth()->user()->tyoe;

        if(auth()->user()->type=="admin")return view('home',array('ads'=>$ads,'leads'=>$leads));
        else return view('home',array('ads'=>$ads,'leads'=>$leads));
    }
}

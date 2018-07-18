@extends('layouts.app')
@section('content')

   <form id="article_form" style="background-image:url('{{$article->imgs}}');" method="post" action="{{Route('lead')}}">
     @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
     @endif
     <input type="hidden" value="{{csrf_token()}}" name="_token"/>
    <div id="Go_Inputs">
      <input type="hidden" name="type" value="{{$article->type}}"/>
      <input type="hidden" name="business" value=""/>
      <input type="text" name="name" placeholder="Your Name" required/>
      <input type="text" name="number" placeholder="Your Number" required/>
      <input type="text" name="email" placeholder="Your Email" required/>
    </div>
    <!--<img id="Article_Img" src="{{$article->imgs}}"/>-->
    <h1 style="text-align:center;color:#fff;">{{$article->title}}</h1>
    <p id="section1" style="color:#fff; font-size:15pt;">
      <br/>
      <i>{{$article->section1}}</i></p>
    <br/><br/>
    <p  id="section2">
      {{$article->section2}}
    </p>
    <input type="submit" id="Go_Submit"  value="Submit Contact Info"/>
   </form>

@endsection

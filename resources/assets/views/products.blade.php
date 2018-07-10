@extends('layouts.app')
@section('content')

 @foreach($products as $p)

  <div class="product">
    <b>{{$p->title}}</b><br/>
    <a href="{{$p->link}}">View Product?</a>
    <br/><br/>
    <p>{{$p->description}}</p>
    <br/>
  </div>
 @endforeach

@endsection

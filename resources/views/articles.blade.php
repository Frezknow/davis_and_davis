@extends('layouts.app')
@section('content')
<script src="{{ asset('js/jquery.js')}}"></script>
 @foreach($articles as $a)

  <div class="article" style="background-image:url('{{$a->imgs}}'); ">
    <b>{{$a->title}}</b><br/>
    <a href="article?id={{$a->id}}">View Article?</a>
    <br/>
  </div>
 @endforeach

@endsection

@extends('layouts.app')
@section('content')
  <form id="cform" action="{{Route('contact')}}" method="POST">
    @if (Session::has('message'))
     <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <center> <h1> Contact Us</h1> </center>
    <input type="hidden" value="{{csrf_token()}}" name="_token"/>

    <input type="text" name="name" placeholder="Name" required/>
    <input type="text" name="email" placeholder="Email" required/>
    <input type="text" name="number" placeholder="Number"/>
    <textarea name="message" placeholder="Message Here">
    </textarea>
    <input type="submit" class="btn-primary" value="Send Us the Information?" />
  </form>
@endsection

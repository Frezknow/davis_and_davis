<b> Form for adding Ad Funnels </b>
<form action="{{Route('Affiliate_Link')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
 <b>Image</b>
 <input type="file" name="imgs"/>
 <br/>
 <input type="text" name="link" placeholder="Link"/>
 <br/>
 <input type="text" name="title" placeholder="Title"/>
 <br/>
 <input type="text" name="description" placeholder="Description"/>
 <br/>
 <input type="text" name="business" placeholder="Business Email"/>
 <br/>
 <input type="submit" value="Add Ad"/>
</form>
<br/>
<div style="display:block; width:50%; background-color:#000; color:#fff; height:200px; overflow:scroll;">
   <?php
   $user = Auth::user();
   ?>
@if($user->type=="admin")
<b> link/go?pid="Product id"</b>
 <br/>
 @foreach($ads as $ad)
  <div class="Product{{$ad->id}}">
    <b>{{$ad->title}} |  ID = {{$ad->id}}  |</b>
    <a rel="{{$ad->id}}" class="DeleteProduct"> Delete?</a>
    <br/>
  </div>
 @endforeach
@endif

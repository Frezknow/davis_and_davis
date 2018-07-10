@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <?php
                $user = Auth::user();
                ?>
             @if($user->type=="admin")
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
               <b> Ads are below all links will need to have the following  link/go?pid="Product id"</b>
                 <br/>
                 <br/>
                 @foreach($ads as $ad)
                  <div class="Product{{$ad->id}}">
                    <b>{{$ad->title}} |  ID = {{$ad->id}}  |</b>
                    <a rel="{{$ad->id}}" class="DeleteProduct"> Delete?</a>
                    <br/>
                  </div>
                 @endforeach
          @endif
               </div>
               <div style="position: absolute;top:40%;display:block; width:46%; border-radius: 10px;background-color:#000; color:#fff; right:20px;height:60%; overflow:scroll;">
               @if($user->type!="")
               <b style="text-align:center;"> Leads are Below </b>
                 @foreach($leads as $lead)
                  <div class="Product{{$lead->id}}">
                    <b>Name : {{$lead->name}} |  Number : {{$lead->number}}  | Email : {{$lead->email}}</b>
                    <!--<a rel="{{$lead->id}}" class="DeleteProduct"> Delete?</a>-->
                    <br/>
                  </div>
                 @endforeach
              @endif
            </div>
            </div>
        </div>
    </div>
</div>
<script>
 $(document).on('click','.DeleteProduct',function(){
   var id = $(this).attr('rel');
   $.ajax({
     url:"DeleteProduct",
     type:"POST",
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{id:id},
     success:function(){
       $('.Product'+id).remove();
     },
     error:function(){
       alert("error");
     }
   });
 });
</script>
@endsection

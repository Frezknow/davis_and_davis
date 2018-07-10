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
                <b> Form for adding Products </b>
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
                 <input type="submit" value="Add Product"/>
               </form>
               <br/>
               <div style="display:block; width:50%; background-color:#000; color:#fff; height:200px; overflow:scroll;">
                 <b> link/go?pid="Product id"</b>
                   <br/>
                 @foreach($products as $product)
                  <div class="Product{{$product->id}}">
                    <b>{{$product->title}} |  ID = {{$product->id}}  |</b>
                    <a rel="{{$product->id}}" class="DeleteProduct"> Delete?</a>
                    <br/>
                  </div>
                 @endforeach
               </div>
            </div>
        </div>
    </div>
</div>
<script>
 $(document).on('click','.DeleteProduct',function(){
   var id = $(this).attr('rel');
   alert(id);
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

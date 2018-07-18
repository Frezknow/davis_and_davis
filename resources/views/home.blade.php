@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                <button class="Toggle" rel="AddFunnel">Toggle Funnel Form</button>
                <button class="Toggle" rel="AddArtical">Toggle Article Form</button>
                <button class="Toggle"  rel="Funnels">Toggle Funnel Links</button>
                  <hr/>
                <button class="Toggle"  rel="Businesses">Toggle Businesses</button>
                <button class="Toggle"  rel="AddBusiness">Toggle Business Form</button>
                <button class="Toggle"  rel="Messages">Toggle Messages</button>
                <div id="Businesses" >
                  <input type="hidden" value="" class="email"/>
                  <input type="hidden" value="" class="lead_ids"/>
                  <h3> Business Accounts are Below </h3>
                  @foreach($bizs as $biz)
                  <div class="biz">
                   {{$biz->name}} | <a class="Toggle" rel="Assignlead" email="{{$biz->email}}"> Assign Leads?</a>
                  </div>
                  @endforeach
                </div>
                <form id="AddBusiness" action="{{Route('createBusiness')}}"  method="POST" style="display:none;">
                    {{ csrf_field() }}
                  <input type="text" name="name" placeholder="Business Name"/><br/>
                  <input type="email" name="email" placeholder="Business Email"/><br/>
                  <input type="submit" value="Submit"/>
                </form>
                <form id="AddFunnel" action="{{Route('Affiliate_Link')}}" style="display:none; "method="POST" enctype="multipart/form-data">
                 <b> Form for adding Ad Funnels </b> <br/>
                  {{ csrf_field() }}
                 <b>Image</b>
                 <input type="file" name="imgs" required/>
                 <br/>
                 <input type="text" name="link" placeholder="Link"/>
                 <br/>
                 <input type="text" name="title" placeholder="Title" required/>
                 <br/>
                 <input type="text" name="description" placeholder="Description" required/>
                 <br/>
                 <input type="text" name="business" placeholder="Business Email"/>
                 <br/>
                 <input type="submit" value="Add Funnel"/>
               </form>
               <form id="AddArtical" action="{{Route('createArticle')}}" style="display:none; "method="POST" enctype="multipart/form-data">
                <b> Form for adding Articles </b> <br/>
                 {{ csrf_field() }}
                <b>Image</b>
                <input type="file" name="imgs" required/>
                <br/>
                <input type="text" name="title" placeholder="Title" required/>
                <br/>
                <textarea name="section1" placeholder="section one" required></textarea>
                <br/>
                <textarea name="section2" placeholder="section two" required></textarea>
                <br/>
                <input type="text" name="type" placeholder="Type" required/>
                <br/>
                <input type="submit" value="Create Article"/>
              </form>
               <br/>
               <div id="Funnels" style="display:none;">
               <b> Funnels are below all links will need to have the following  link/go?pid="Product id"</b>
                 <br/>
                 <br/>
                 @foreach($ads as $ad)
                  <div class="Product{{$ad->id}}">
                    <b>{{$ad->title}} |  ID = {{$ad->id}}  |</b>
                    <a rel="{{$ad->id}}" class="DeleteProduct"> Delete?</a>
                    <br/>
                  </div>
                 @endforeach
               </div>
               <div id="Messages" style="display:none;">
                 @foreach($messages as $message)
                  <div class="message">
                   <b>Name : {{$message->name}}</b>

                   <br/>
                   <b>Email : {{$message->email}}</b>

                   <br/>
                   <b>Number : {{$message->number}} </b>

                   <br/>
                   <b>Message : </b>
                   <br/>
                   <p>
                     {{$message->message}}
                   </p>
                 </div>
                 @endforeach
               </div>
               <div id="Assignlead">
               <a class="Toggle" rel="Assignlead" style="position:relative; float:right; font-size:17pt;">Close?</a>
               <button id="Update_Leads">Assign Leads ?</button>
                <b style="text-align:center;"> Leads are Below </b>
                 @foreach($leads as $lead)
                  @if($lead->business==",")
                  <div class="Product{{$lead->id}}">
                    <input type="checkbox" class="lead_check" id="{{$lead->id}}"/><b>Name : {{$lead->name}}
                      | Number : {{$lead->number}}
                      | Email : {{$lead->email}}
                      | Type : {{$lead->type}}
                    </b>
                    <br/>
                  </div>
                  @endif
                 @endforeach
              </div>
               @endif
               @if($user->type=="business")<button class="Toggle"  rel="Leads">Toggle Leads</button>@endif
               <div id="Leads" style="display:none;">
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
$(document).on('click','.Toggle',function(){
  var rel = $(this).attr('rel');
  $('#'+rel).toggle();
  var email = $(this).attr('email');
  if(email!=null)$('.email').val(email);
});

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
 $(document).on('click','.lead_check',function(){
   var id = $(this).attr('id');
   var check = $(this).attr('checked');
   if($(this).is(':checked')){
     var ids = $('.lead_ids').val();
     var ids = ids+","+id;
     $('.lead_ids').val(ids);
   }
   if(!$(this).is(':checked')){
     var ids = $('.lead_ids').val();
     var ids = ids.replace(","+id,"");
     $('.lead_ids').val(ids);
   }
   var new_ids = $('.lead_ids').val();
 });
  $(document).on('click','#Update_Leads',function(){
    var ids = $('.lead_ids').val();
    var email = $('.email').val();
    $.ajax({
      url:"updateLeads",
      type:"POST",
      data:{email:email,ids:ids},
      success:function(){
        alert("Business can now see assigned Leads.");
      },
      error:function(){
        alert("error");
      }
    });
  });
</script>
@endsection

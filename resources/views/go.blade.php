<html>
 <head>
  <script src="{{ asset('js/jquery.js')}}"></script>
  <link href="{{asset('css/part1.css')}}" rel="stylesheet" type="text/css">
 </head>
 <body>
   <form id="form">
     <input type="hidden" value="{{ csrf_token() }}" class="token"/>
    <div id="Go_Inputs">
      <input type="hidden" class="business" rel="{{$ad->business}}"/>
      <input type="text" class="name" placeholder="Your Name" required/>
      <input type="text" class="number" placeholder="Your Number" required/>
      <input type="text" class="email" placeholder="Your Email" required/>
    </div>
    <img id="Go_Img" src="{{$ad->imgs}}"/>
    <p id="Go_Description" style="color:#fff; font-size:15pt;"><b>{{$ad->title}}</b><br/><i>{{$ad->description}}</i></p>
    <input type="button" id="Go_Submit"  value="Continue to Product"/>
    <a id="No_Email">Continue to Product Without Providing Email?</a>
   </form>

 <script>
  /** Affiliate links will be hard coded. for now until i dynamically add them**/

   var pid = "{{$ad->id}}";

 $('#Go_Submit').on('click',function(e){
   e.preventDefault();
  var email = $('.email').val();
  var number = $('.number').val();
  var name = $('.name').val();
  //may not work because its a email
  var business = $('.business').attr('rel');
  var product = "{{$ad->link}}";
  var token = $('.token').val();
  alert(token)
  $.ajax({
    url:"lead",
    type:"POST",
    data:{_token:token,email:email,name:name,number:number,business:business,type:""},
    success:function(){
      window.location.replace(product);
    },
    error:function(){
      alert('error');
    }
  });


 });
 $('#No_Email').on('click',function(){
   var product = "{{$ad->link}}";
   alert(product)
   window.location.replace(product);
 });
 </script>
 </body>
</html>

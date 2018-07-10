<html>
 <head>
  <script src="{{ asset('js/jquery.js')}}"></script>
  <link href="{{asset('css/part1.css')}}" rel="stylesheet" type="text/css">
 </head>
 <body>
   <form id="form">
    <input type="text" class="email" placeholder="Your Email" required/><br/>
    <img id="Go_Img" src="{{$product->imgs}}"/>
    <input type="submit" style="margin-bottom:0; margin-top:0;top:27%" value="Continue to Product"/>
    <a id="No_Email">Continue to Product Without Providing Email?</a>
   </form>

 <script>
  /** Affiliate links will be hard coded. for now until i dynamically add them**/

   var pid = "{{$product->id}}";

 $('#form').on('submit',function(e){
   e.preventDefault();
  var email = $('.email').val();
  var product = "{{$product->link}}";
  alert(email);
  alert(product);
  window.location.replace(product);

 });
 $('#No_Email').on('click',function(){
   var product = "{{$product->link}}";
   alert(product)
   window.location.replace(product);
 });
 </script>
 </body>
</html>

@extends("front/layout")
@section('container')
@if(Session::has('USER_LOGIN'))
<script>
window.location.href="/";
</script>


@else

@endif 
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-8">
        <div class="aa-myaccount-area">   
        <div id="msg"></div>      
         <div class="aa-myaccount-register" id="register_area">                 
       
                <h4>Register</h4>
                 <form id="registerform" class="aa-login-form" autocomplete="off">
                    @csrf
                    <label for="username">Username<span>*</span></label>
                    <input type="text"name="username"id="username" placeholder="Username" autocomplete="off"  />
              
                    <label for="email">Email address<span>*</span></label>
                    <input type="text"name="email"id="regemail"autocomplete="off" placeholder="email" aria-required="true" required>
                    <div id="emailerror"></div>
                    <label for="password">Password<span>*</span></label>
                    <input type="password" name="password" autocomplete="off" id="regpassword" placeholder="Password" aria-required="true" required>
                    <div id="formerror"></div>

                    <button type="submit" id="frmsubmit" onclick="registersub(e);" class="aa-browse-btn">Register</button>                             
                  </form>
                  
            
                             
            </div>        
               
         </div>
        
       </div>
       
     </div>

   </div>
   
 </section>
 

@endsection
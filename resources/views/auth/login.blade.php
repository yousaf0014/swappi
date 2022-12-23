<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    
    
    
    <title>Login - Swappi ApS</title>
    <meta name="description" content="">
  	<meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
<script>
            function callUrl(url){
                fbq('track', 'CompleteRegistration');
                setTimeout('redirectTo("'+url+'")',5000);

            }
            function redirectTo(url){
                window.location = url;
            }
        </script>
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1737004623206519'); // Insert your pixel ID here.
        fbq('track', 'PageView');
        fbq('track', 'CompleteRegistration');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1737004623206519&ev=PageView&noscript=1"
        /></noscript>
        <!-- DO NOT MODIFY -->
        <!-- End Facebook Pixel Code -->
        
<div class="main">
 <div class="wrapper" style="width:100%;">
 
   <div class="create_user_section">
    <div class="container">
     <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      
        <div class="col-md-5 col-sm-5 col-xs-12">
            <h1>Log ind på din<br>Swappi konto</h1>
            <div class="email_login_section">
                <form id="login-form" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="col-md-12 col-sm-12 col-xs-12 pad_create_Ad" >
                        <div class="right-inner-addon">
                            <div>
                                <input id="email" type="email" class="form-control" autofocus="true" name="email" placeholder="E-mail adresse" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Adgangskode">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="checkbox_har_du">
                        <label><input type="checkbox" name="remember">Husk mig</label>
                        <p><a class="" href="{{ url('/password/reset') }}">Har du glemt din kode?</a></p>
                    </div>
                    <div class="opret_logind">
                        <button type="submit" class="btn-link pull-left" style="padding: 0;"><h4>Log ind</h4></button>
                        <p>Er du allerede tilmeldt? <a href="{{ url('/register') }}" style="color:#4470b4;">Opret din profil</a></p>
                    </div>
                </form>
            </div>
          
           <div class="Eller_border"> Eller </div>
           
           <div class="social_icon_create">
           	<a href="javascript:;" onclick="callUrl('{{ url('/social/auth/redirect', ['facebook']) }}')">
                    <img src="{{ asset('images/facebook01.png') }}" />
                </a>
                <a href="javascript:;" onclick="callUrl('{{ url('/social/auth/redirect', ['google']) }}')">
                    <img src="{{ asset('images/googleplus002.png') }}" />
                </a>
                
           </div>
          
        </div>
        
      
        
        <div class="col-md-7 col-sm-7 col-xs-12 create_ad_section_right">
          <a href="{{ url('/') }}"><img src="{{ asset('images/create_ad_logo.png') }}"></a>
        </div>
        
      </div>
     </div>
    </div>
   </div>
   
 </div>
</div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">
        $("#login-form").validate({
        	errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }                
            },
            messages: {
                email: "Venligst indtast en gyldig e-mail addresse.",
                password: {
                    required: "Indtast venligst din adgangskode.",
                    minlength: "Indtast venligst mindst 6 tegn."
                }                
            }
        });
    </script>

</body>
</html>
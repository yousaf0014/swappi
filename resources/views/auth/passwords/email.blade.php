<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Swappi ApS</title>
    <meta name="description" content="">
  	<meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

<div class="main">
 <div class="wrapper">
 
   <div class="create_user_section">
    <div class="container">
     <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      
        <div class="col-md-5 col-sm-5 col-xs-12">
        	<h1>Indtast din <span style="font-family: 'Lato-Regular';">email.</span></h1>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="reset-password" class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group ">
                            <label for="email" class="col-md-12">E-mail adresse</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <label id="email-error" class="error help-block" for="email">
                                        {{ $errors->first('email') }}
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Nulstil mit kodeord</button>
                            </div>
                        </div>
                    </form>
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
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">
        $("#reset-password").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: "Indtast din email.",
            }
        });
    </script>
</body>
</html>
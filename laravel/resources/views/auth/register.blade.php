<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Register - Swappi ApS</title>
    <meta name="description" content="">
  	<meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style type="text/css">
        .Vælge_profiltype .radio-inline{
            padding-top: 0;
        }
    </style>
</head>

<body>

<div class="main">
 <div class="wrapper">
 
   <div class="create_user_section">
    <div class="container">
     <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      
        <div class="col-md-5 col-sm-5 col-xs-12">
            <!-- Display Validation Errors -->
            <?php /* ?>@include('common.errors')<?php */ ?>
            
			<!-- //Stepped Registration Form -->
			<form id="register" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
                <div id="step-1" class="form-step">
                		<h1>Opret din <br><span style="font-family: 'Lato-Regular';">Swappi profil</span></h1>
             
    		          <div class="email_login_section">
    		            
    		             <div class="col-md-12 col-sm-12 col-xs-12 pad_create_Ad" >
    		                <div class="right-inner-addon">
    		                	<?php /* ?>
                                    <div class="form-group">
        			                    <input id="userName" type="text" class="form-control" name="userName" placeholder="Username" value="{{ old('userName') }}">
        								@if ($errors->has('userName'))
        	                            	<span class="help-block">
        	                            		<strong>{{ $errors->first('userName') }}</strong>
        	                            	</span>
        	                            @endif
                                    </div>
                                <?php */ ?>
    		                	<div class="">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="E-mail adresse" value="{{ session('email') }}">
    								@if ($errors->has('email'))
    	                            	<span class="help-block">
    	                            		<strong>{{ $errors->first('email') }}</strong>
    	                            	</span>
    	                            @endif
                                </div>
    		                    <div class="">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Adgangskode" value="{{ session('pass_secret') }}">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <?php /* ?>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                <?php */ ?>
    		                </div>
    		            </div>
    		           <div class="opret_logind">
    		           	<button type="button" name="next" class="next open2 btn-link pull-left" style="padding: 0;"><h4>Opret profil</h4></button>
    		            <p>Er du allerede tilmeldt? <a href="{{ url('login') }}"><span style="color:#4470b4;">Log ind her</span></a></p>
    		           </div>
    		          </div>
    		          
    		           <div class="Eller_border"> Eller </div>
    		           
    		           <div class="social_icon_create">
    		           	<a href="{{ url('/social/auth/redirect', ['facebook']) }}">
    		           		<img src="{{ asset('images/facebook_create_user.png') }}" style="margin-right:12px;">
    		           	</a>
    		           	<a href="{{ url('/social/auth/redirect', ['google']) }}">
    		           		<img width="211" src="{{ asset('images/google-create.png') }}">
    		           	</a>
                    </div>
    	            	
                </div>
                <div id="step-2" class="form-step">
                	
    				<h1>Lad os begynde<br><span style="font-family: 'Lato-Regular';">på din profil</span></h1>

                    <div class="col-md-12 col-sm-12 col-xs-12 Navn_Fornavn_Efternavn">
                       <label>Navn</label>
                       <div class="">
                            <input id="firstName" type="text" class="" name="firstName" placeholder="Fornavn" value="{{ old('firstName') }}">
                            @if ($errors->has('firstName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                            @endif
                        </div>
                       <div class="">
                            <input id="lastName" type="text" class="" name="lastName" placeholder="Efternavn" value="{{ old('lastName') }}">
                            @if ($errors->has('lastName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                      
                    <div class="col-md-12 col-sm-12 col-xs-12 Navn_Fornavn_Efternavn">
                       <label>Bopæl</label>
                       <div class=" dropdown">
                            <select id="country" name="country" class="">
                                <option value="">Land</option>
                                <option value="Afghanistan">Afghanistan</option><option value="Albanien">Albanien</option><option value="Algeriet">Algeriet</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua og Barbuda">Antigua og Barbuda</option><option value="Argentina">Argentina</option><option value="Armenien">Armenien</option><option value="Australien">Australien</option><option value="Østrig">Østrig</option><option value="Aserbajdsjan">Aserbajdsjan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Hviderusland">Hviderusland</option><option value="Belgien">Belgien</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnien-Hercegovina">Bosnien-Hercegovina</option><option value="Botswana">Botswana</option><option value="Brasilien">Brasilien</option><option value="Brunei">Brunei</option><option value="Bulgarien">Bulgarien</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodja">Cambodja</option><option value="Cameroun">Cameroun</option><option value="Canada">Canada</option><option value="Kap Verde">Kap Verde</option><option value="Centralafrikanske Republik">Centralafrikanske Republik</option><option value="Tchad">Tchad</option><option value="Chile">Chile</option><option value="Kina">Kina</option><option value="Colombia">Colombia</option><option value="Comorerne">Comorerne</option><option value="Costa Rica">Costa Rica</option><option value="Elfenbenskysten">Elfenbenskysten</option><option value="Kroatien">Kroatien</option><option value="Cuba">Cuba</option><option value="Cypern">Cypern</option><option value="Tjekkiet">Tjekkiet</option><option value="Demokratiske Republik Congo">Demokratiske Republik Congo</option><option value="Danmark">Danmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominikanske Republik">Dominikanske Republik</option><option value="Østtimor">Østtimor</option><option value="Ecuador">Ecuador</option><option value="Egypten">Egypten</option><option value="El Salvador">El Salvador</option><option value="Ækvatorialguinea">Ækvatorialguinea</option><option value="Eritrea">Eritrea</option><option value="Estland">Estland</option><option value="Etiopien">Etiopien</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="Frankrig">Frankrig</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgien">Georgien</option><option value="Tyskland">Tyskland</option><option value="Ghana">Ghana</option><option value="Grækenland">Grækenland</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Ungarn">Ungarn</option><option value="Island">Island</option><option value="Indien">Indien</option><option value="Indonesien">Indonesien</option><option value="Iran">Iran</option><option value="Irak">Irak</option><option value="Irland">Irland</option><option value="Israel">Israel</option><option value="Italien">Italien</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kasakhstan">Kasakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kirgisistan">Kirgisistan</option><option value="Laos">Laos</option><option value="Letland">Letland</option><option value="Libanon">Libanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyen">Libyen</option><option value="Liechtenstein">Liechtenstein</option><option value="Litauen">Litauen</option><option value="Luxembourg">Luxembourg</option><option value="Madagaskar">Madagaskar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldiverne">Maldiverne</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshalløerne">Marshalløerne</option><option value="Mauretanien">Mauretanien</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Mikronesien">Mikronesien</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongoliet">Mongoliet</option><option value="Montenegro">Montenegro</option><option value="Marokko">Marokko</option><option value="Mozambique">Mozambique</option><option value="Burma">Burma</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Holland">Holland</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Nordkorea">Nordkorea</option><option value="Norge">Norge</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua Ny Guinea">Papua Ny Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Filippinerne">Filippinerne</option><option value="Polen">Polen</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Republikken Congo">Republikken Congo</option><option value="Makedonien">Makedonien</option><option value="Rumænien">Rumænien</option><option value="Rusland">Rusland</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts og Nevis">Saint Kitts og Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent og Grenadinerne">Saint Vincent og Grenadinerne</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="São Tomé og Príncipe">São Tomé og Príncipe</option><option value="Saudi-Arabien">Saudi-Arabien</option><option value="Senegal">Senegal</option><option value="Serbien">Serbien</option><option value="Seychellerne">Seychellerne</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakiet">Slovakiet</option><option value="Slovenien">Slovenien</option><option value="Salomonøerne">Salomonøerne</option><option value="Somalia">Somalia</option><option value="Sydafrika">Sydafrika</option><option value="Sydkorea">Sydkorea</option><option value="Sydsudan">Sydsudan</option><option value="Spanien">Spanien</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Surinam">Surinam</option><option value="Swaziland">Swaziland</option><option value="Sverige">Sverige</option><option value="Schweiz">Schweiz</option><option value="Syrien">Syrien</option><option value="Tadsjikistan">Tadsjikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad og Tobago">Trinidad og Tobago</option><option value="Tunesien">Tunesien</option><option value="Turkiet">Turkiet</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="Forenede Arabiske Emirater">Forenede Arabiske Emirater</option><option value="Storbritannien">Storbritannien</option><option value="USA">USA</option><option value="Uruguay">Uruguay</option><option value="Usbekistan">Usbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                            </select>

                            @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                       <?php /* said to remove. ?>
                        <div class="form-group">
                            <input type="text" name="city" id="city" class="" placeholder="City" value="{{ old('city') }}">

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <?php */ ?>
                        <div class="">
                            <input type="text" name="postCode" id="postCode" class="" placeholder="Postnr." value="{{ old('postCode') }}">

                            @if ($errors->has('postCode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postCode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
             
    	            <div class="opret_logind_Fortsæt">
                        <!-- said to remove 
                        <button type="button" name="next" class="previous btn-link pull-left"><h4 style="color:#4470b4;background: #ffffff;padding: 9px 20px;border: 1px solid #dddddd;">Back</h4></button> 
                        -->
                        <button type="button" name="next" class="next open3 btn-link pull-left" style="padding: 0;"><h4>Fortsæt</h4></button>
                        <?php /*<p><span style="color:#4470b4;"> Gem og fortsæt senere</span></p>*/ ?>
                    </div>
    	            
                	<div class="step-pagination col-md-12 no-padding">
    					<ul class="nav nav-pills">
    						<li class="page-1"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-2"><a><i class="fa fa-circle">&nbsp;</i></a></li>
    						<li class="page-3"><a href="javascript:;" class="next"><i class="fa fa-circle-o">&nbsp;</i></a></li>
    						<li class="page-4"><a href="javascript:;" class="next"><i class="fa fa-circle-o">&nbsp;</i></a></li>
                            <li class="page-5"><a href="javascript:;" class="next"><i class="fa fa-circle-o">&nbsp;</i></a></li>
    					</ul>
    				</div>
                </div>
                <div id="step-3" class="form-step">
                	
                	<h1>Hvad er din <br><span style="font-family: 'Lato-Regular';">nuværende stilling</span></h1>
             
                    <?php /* ?>
                    <div class="Vælge_profiltype">
                        Vælge profiltype :
                        <label class="radio-inline">
                            <input type="radio" checked="checked" name="profileType" id="individual" value="individual"> Privat
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="profileType" id="business" value="business"> Virksomhed
                        </label>
                    </div>
                    <?php */ ?>

                    <div class="col-md-12 col-sm-12 col-xs-12 Navn_Fornavn_Efternavn">
               
                        <div class="">
                            <input type="text" name="jobTitle" id="jobTitle" class="" placeholder="Jobtitel*" value="{{ old('jobTitle') }}">
                        </div>
                        <div class="">
                            <input type="text" name="businessLine" id="businessLine" class="" placeholder="Virksomhed*" value="{{ old('businessLine') }}">
                        </div>
                        <?php /* ?>
                        <div class="">
                            <select class="form-control" id="industry" name="industry">
                                <option value="Finance">Finance</option>
                                <option value="Manufacturing">Manufacturing</option>
                                <option value="Retail">Retail</option>
                                <option value="Technology">Technology</option>
                            </select>
                        </div>
                        <?php */ ?>
                    </div>

                    <div class="opret_logind_Fortsæt">
                        <button type="button" name="next" class="next open4 btn-link pull-left" style="padding: 0;border: 0;"><h4 style="margin: 0;">Fortsæt</h4></button>
                        <div class="next Spring_over">
                            Spring over
                        </div>
                        <?php /*<p><span style="color:#4470b4;"> Gem og fortsæt senere</span></p> */ ?>
                    </div>
    		             
                    <div class="opret_logind">
                    	<!-- said to remove <button type="button" name="next" class="previous btn-link pull-left"><h4 style="color:#4470b4;background: #ffffff;padding: 9px 20px;border: 1px solid #dddddd;">Back</h4></button> -->
                    	
                    </div>
                	
                	<div class="step-pagination col-md-12 no-padding">
    					<ul class="nav nav-pills">
    						<li class="page-1"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-2"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-3"><a><i class="fa fa-circle">&nbsp;</i></a></li>
    						<li class="page-4"><a href="javascript:;" class="next"><i class="fa fa-circle-o">&nbsp;</i></a></li>
                            <li class="page-5"><a href="javascript:;" class="next"><i class="fa fa-circle-o">&nbsp;</i></a></li>
    					</ul>
    				</div>
                </div>
                <div id="step-4" class="form-step">
                	
    				<h1>Hvad er dine <br><span style="font-family: 'Lato-Regular';">kompetencer</span></h1>

                    <div class="Kompetencer">
                      <label for="skills">Kompetencer</label>
                      <input type="text" name="skills" id="skills" class="form-control" placeholder="Skriv fx. male, tegne, designe ..." value="{{ old('skills') }}">
                    </div>

                    <div class="opret_logind">
                    	<!-- said to remove 
                        <button type="button" name="next" class="previous btn-link pull-left"><h4 style="color:#4470b4;background: #ffffff;padding: 9px 20px;border: 1px solid #dddddd;">Back</h4></button> 
                        -->
                        <button type="button" name="" class="next btn-link pull-left" style="padding: 0;"><h4>Fortsæt</h4></button>
                    </div>

                	<div class="step-pagination col-md-12 no-padding">
    					<ul class="nav nav-pills">
    						<li class="page-1"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-2"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-3"><a href="javascript:;" class="previous"><i class="fa fa-check">&nbsp;</i></a></li>
    						<li class="page-4"><a><i class="fa fa-circle">&nbsp;</i></a></li>
    					</ul>
    				</div>
                </div>

                <div id="step-5" class="form-step">
                    <h1>En beskrivelse<br><span style="font-family: 'Lato-Regular';">af dig selv</span></h1>
                    
                    <div class="form-group create_user_five" style="margin-left: 0;margin-right: 0;">
                        <textarea rows="5" name="description" class="form-control" id="description" placeholder="Fortæl os om dig selv">{{ old('desciption') }}</textarea>
                    </div>

                    <div class="opret_logind_Fortsæt">
                        <button type="submit" name="submit" class="btn-link pull-left" style="padding: 0;"><h4 style="width:185px;">Afslut oprettelse</h4></button>
                        <p><span style="color:#3e3e3d;"> Glemte du noget? <a href="#" class="previous">Gå tilbage</a></span></p>
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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            var foruser = window.location.hash.substr(1);
            if(foruser != ''){
                var foruserid = foruser.split('/');
                if(foruserid[1] == 2){
                    $('#step-1').find('.next').click();
                }
            }
        });

		$('.next').click(function(){
			var form = $("#register");
			form.validate({
				errorElement: 'span',
				errorClass: 'help-block',
				highlight: function(element, errorClass, validClass) {
					$(element).closest('.form-group').addClass("has-error");
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.form-group').removeClass("has-error");
				},
	            rules: {
	                firstName: {
	                    required: true,
	                },
	                lastName: {
	                    required: true,
	                },
	                userName: {
	                    required: true,
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                phone: {
	                    required: true,
	                    number: true
	                },
	                password: {
	                    required: true,
	                    minlength: 6
	                },
	                password_confirmation: {
	                    required: true,
	                    minlength: 6,
	                    equalTo: "#password"
	                },
	                country: {
	                    required: true,
	                },
	                postCode: {
	                    required: true,
	                    number: true,
	                    maxlength: 4,
	                    minlength: 4,
	                },
	                profileType: {
	                    required: true,
	                },
	            },
	            messages: {
	                firstName: {
	                    required: "Please provide a first name",
	                },
	                lastName: {
	                    required: "Please provide a last name",
	                },
	                email: "Please enter a valid email address",
	                phone: {
	                    required: "Please provide a phone",
	                },
	                password: {
	                    required: "Please provide a password",
	                },
	                password_confirmation: {
	                    required: "Please provide a confirm password",
	                    equalTo: "Please enter the same password as above"
	                },
	                country: {
	                    required: "Please provide a country",
	                },
	                postCode: {
	                    required: "Indtast venligst et gyldigt postnr.",
                        number: "Indtast venligst et gyldigt postnr.",
                        maxlength: "Indtast venligst et gyldigt postnr.",
                        minlength: "Indtast venligst et gyldigt postnr."
	                },
	                profileType: {
	                    required: "Please provide a type",
	                },
	            }
	        });
			if (form.valid() === true){
				if ($('#step-1').is(":visible")){
					current_fs = $('#step-1');
					next_fs = $('#step-2');
				}else if($('#step-2').is(":visible")){
					current_fs = $('#step-2');
					next_fs = $('#step-3');
				}else if($('#step-3').is(":visible")){
					current_fs = $('#step-3');
					next_fs = $('#step-4');
				}else if($('#step-4').is(":visible")){
                    current_fs = $('#step-4');
                    next_fs = $('#step-5');
                }
				
				next_fs.show(); 
				current_fs.hide();
			}
		});
		
		$('.previous').click(function(){
			if ($('#step-2').is(":visible")){
				current_fs = $('#step-2');
				next_fs = $('#step-1');
			}else if($('#step-3').is(":visible")){
				current_fs = $('#step-3');
				next_fs = $('#step-2');
			}else if($('#step-4').is(":visible")){
				current_fs = $('#step-4');
				next_fs = $('#step-3');
			}else if($('#step-5').is(":visible")){
                current_fs = $('#step-5');
                next_fs = $('#step-4');
            }
			
			next_fs.show(); 
			current_fs.hide();
		});

    </script>

	  <script type="text/javascript">
		  $( function() {
		    var availableTags = {!! $skills !!};
		    
		    function split( val ) {
		      return val.split( /,\s*/ );
		    }
		    function extractLast( term ) {
		      return split( term ).pop();
		    }

		 
		    $( "#skills" )
		      // don't navigate away from the field on tab when selecting an item
		      .on( "keydown", function( event ) {
		        if ( event.keyCode === $.ui.keyCode.TAB &&
		            $( this ).autocomplete( "instance" ).menu.active ) {
    		          event.preventDefault();
    		    }
		      })
		      .autocomplete({
		        minLength: 0,
		        source: function( request, response ) {
		          // delegate back to autocomplete, but extract the last term
		          response( $.ui.autocomplete.filter(
		            availableTags, extractLast( request.term ) ) );
		        },
		        focus: function() {
		          // prevent value inserted on focus
		          return false;
		        },
		        select: function( event, ui ) {
		          var terms = split( this.value );
		          // remove the current input
		          terms.pop();
		          // add the selected item
		          terms.push( ui.item.value );
		          // add placeholder to get the comma-and-space at the end
		          terms.push( "" );
		          this.value = terms.join( ", " );
		          return false;
		        }
		      });
		  } );
	</script>
  
</body>
</html>
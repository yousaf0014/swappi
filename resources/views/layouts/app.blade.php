<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php /*?><meta name="viewport" content="width=device-width, initial-scale=1.0"><?php */?>
		<title>@yield('metaTitle') - Swappi ApS</title>
		<meta name="description" content="@yield('metaDescription')">
		<meta name="keywords" content="@yield('metaKeywords')">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
		<style>
		.sidebar-inner ul li a{
			margin-right: 0px !important;
		}
			.close-button{
				color: #fff;
			    position: absolute;
			    top: -9px;
			    left: -28px;
			    font-size: 1.2em;
			    width: 30px;
			    height: 30px;
			    padding: 4px 9px 1px;
			    margin: 0;
			    cursor: pointer;
			    z-index: 999;
			}
			.header-affix.affix{
				background:#ffffff;
				z-index:9;
				width:100%;
			}
			.home-sidebar{
				display:none;
				position: absolute;
				right: 0;top: 10px;
				width: 144px;
			}
			.sidebar-inner{
				background: #4470b4;
				padding: 40px 20px 40px 20px;
				float: left;position:relative;right:30px;
				margin-top:-12px;
			}
			.sidebar-inner ul li a {
			    color: #fff !important;
			    font-size: 19px !important;
			    font-family: 'Lato-Semibold';
			}
			.sidebar-inner ul li a:hover{background:none !important;}
			.header_profile_right .sidebar-inner .social li a{color:#fff !important;font-size:14px !important;font-family: 'Lato-Light';}
			.override.Opret_annonce{
				margin-top:0px !important;
			}
			.navbar-right li a{
				padding: 6px 2px !important;
			}
			li.profile-item a{
			    position: relative !important;
    			bottom: 7px ;
			}
			#bar-toggle{
				margin-top: 6px;
			}
		</style>
		
			<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-77908100-1', 'auto');
		ga('send', 'pageview');
		</script>
	</head>
	<body>
		<script>
			function callUrl(url){
				fbq('track', 'CompleteRegistration');
				setTimeout(redirectTo(url),5000);
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
			<div class="wrapper">
				
				@include('layouts.header')
				
				@yield('content')
				
				<div class="announcer_profiler">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<p>{{ $activeAdCount }}</p>
									<span>Aktive annoncer</span>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<p>{{ $userCount }}</p>
									<span>Tilmeldte profiler</span>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<p>{{ $rattingCount }}</p>
									<span>Anmeldelser</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="Hold_dig_opdateret">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<h1>Hold dig opdateret</h1>
								<p>Få de seneste nyheder fra Swappi omkring announcer tilbud og meget andet.</p>
								<div class="input_sbmit">
									<div class="Skriv_Tilmeld">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Skriv din e-mail adresse">
											<span class="input-group-btn">
												<button class="btn btn-secondary" type="button">Tilmeld dig</button>
											</span>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				
				<!--<div class="footer">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<p><img src="{{ asset('images/footer_logo.png') }}"></p>
								
								<div class="col-md-3 col-sm-3 col-xs-12 swapi_apps">
									<ul>
										<li>Swappi ApS<br>
											Peter Fabers Gade 39, 4 tv.<br>
										2200 København N</li>
										<li>Tlf.: 93 93 11 81
											Email: <a href="mailto:info@swappi.dk">info@swappi.dk</a>
										CVR. 36558709</li>
										
									</ul>
								</div>
								
								<div class="col-md-3 col-sm-3 col-xs-12 social_icon">
									<ul>
									 <li><a href="https://www.facebook.com/swappi.dk/"><img src="{{ asset('images/fb_icon.png') }}" style="margin-right:10px;"><b>Facebook</b></a></li>
									 <li><a href="http://www.linkedin.com/company/swappi"><img src="{{ asset('images/linkedin.png') }}" style="margin-right:10px;"><b>LinkedIn</b></a></li>
									</ul>
									<!--<ul>
										<li><a href="#"><img src="{{ asset('images/fb_icon.png') }}" style="margin-right:10px;"><b>Facebook</b></a></li>
										<li><a href="#"><img src="{{ asset('images/twitter.png') }}" style="margin-right:10px;">Twitter</a></li>
										<li><a href="#"><img src="{{ asset('images/google_icon.png') }}" style="margin-right:10px;">Google+</a></li>
										<li><a href="#"><img src="{{ asset('images/vimeo.png') }}" style="margin-right:10px;">VIMEO</a></li>
										<li><a href="#"><img src="{{ asset('images/pinterest.png') }}" style="margin-right:10px;">Pinterest</a></li>
									</ul>--
								</div>
								
								<div class="col-md-3 col-sm-3 col-xs-12 laer_osed_kende">
									<ul>
										<li><a href="#" onclick="return false;"><b>Lær os at kende</b></a></li>
										<li><a href="{{ url('p/om-swappi') }}">Om Swappi</a></li>
										<li><a href="{{ url('kontakt-os') }}">Kontakt Swappi</a></li>
										<li><a href="{{ url('p/tillidsbarometer') }}">Tillidsbarometer</a></li>
										<li><a href="{{ url('p/ledige-stillinger') }}">Ledige stillinger</a></li>
										<li><a href="{{ url('p/presse') }}">Presse</a></li>
									</ul>
								</div>
								
								<div class="col-md-3 col-sm-3 col-xs-12 laer_osed_kende">
									<ul>
										<li><a href="#" onclick="return false;"><b>Sikkerhed og vilkår</b></a></li>
										<li><a href="{{ url('p/handelsbetingelser') }}">Handelsbetingelser</a></li>
										  <li><a href="{{ url('p/Brugervilkår') }}">Brugervilkår</a></li>
										  <li><a href="{{ url('p/regler-for-annoncering') }}">Regler for annoncering</a></li>
										  <li><a href="{{ url('p/Fortrolighedspolitik') }}">Fortrolighedspolitik</a></li>
										 <li><a href="{{ url('p/cookie-politik') }}">Cookie Politik</a></li>
										
									</ul>
								</div>
								
								<?php /*?><div class="col-md-2 col-sm-2 col-xs-12 laer_osed_kende">
									<ul>
										<li><a href="#"><b>Erhverv</b></a></li>
										<li><a href="{{ url('webshops') }}">Swappi  Business webshops</a></li>
										<li><a href="{{ url('admanager') }}">Swappi  Business Admanager</a></li>
										<li><a href="{{ url('banner-ads') }}">Swappi  Business bannerannoncer</a></li>
										
										
									</ul>
								</div><?php */?>
								
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-3 col-sm-3 col-xs-12 copyright">
									© {{ Carbon\Carbon::now()->format('Y') }}, Swappi ApS. All rights reserved
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12 copyright_credits">
									Credits - <img src="{{ asset('images/sampedro.png') }}">
								</div>
							</div>
							
						</div>
					</div>
				</div>-->
				@include('layouts.footer')
			</div>
		</div>

		<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        	<div class="modal-dialog">
            	<div class="modal-content">
            		<div class="modal-body">
				    	Du har ikke gemt. Er du sikker på, at du vil forlade siden?
					</div>
					<div class="modal-footer">
				    	<button type="button" data-dismiss="modal" class="btn btn-primary" id="yes">Ja</button>
				    	<button type="button" data-dismiss="modal" class="btn" id="no">Nej</button>
					</div>
            	</div>
            </div>
        </div>
		
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/site.util.js') }}"></script>
		<script type="text/javascript">
		
			$(document).ready(function(e){
				$('.bar-toggle').on('click', function(e){
					e.preventDefault();
					if($(this).hasClass('opened')){
						closesidebar();
					}else{
						$('.home-sidebar').show();
						$(this).addClass('opened');
					}
				});
				$('.home-sidebar .close').on('click', function(e){
					closesidebar();
				});
				$('.search-icon').on('click', function(){
					if($(this).hasClass('opened')){
						closesearch();
					}else{
						$('.search-hidden').show();
						$('.search-icon').addClass('opened');
					}
					return false;
				});
			});
			function closesearch(){
				$('.search-hidden').hide();
				$('.search-icon').removeClass('opened');
			}
			function closesidebar(){
			$('.home-sidebar').hide();
				$('.bar-toggle').removeClass('opened');
		}
			
			$('body').click(function(e){
				if($(e.target).parents('#sidebar-con').length)
					return;
			//Do processing of click event here for every element except with id menu_content
			closesidebar();
			});
		</script>
		 <script type="text/javascript">
		 	$('.close-button').on('click', function(){
		 		$('.home-sidebar').hide();
				$(this).removeClass('opened');
				$('#bar-toggle').removeClass('opened');
		 	});
		 </script>
		@yield('scripts')

		@if(Request::segment(1) == 'p' || Request::segment(1) == 'category')
			<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '1737004623206519');
			fbq('track', "PageView");</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1737004623206519&ev=PageView&noscript=1"
			/></noscript>
			<!-- End Facebook Pixel Code -->
		@endif
	

	</body>
</html>
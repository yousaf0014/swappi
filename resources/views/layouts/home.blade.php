<!DOCTYPE html>

	<html lang="en">

	  <head>

		<meta charset="UTF-8">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Swappi ApS</title>

		<meta name="description" content="">

	  	<meta name="keywords" content="">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

		<link rel="stylesheet" href="{{ asset('css/circle.css') }}">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
		@if(Auth::check())
        
        	<style>
				
				@media (max-width: 767px) {
					.header .nav.navbar-nav{width:60%;}
					.nav.navbar-nav.navbar-right{float:right;width:40%;text-align:right;}
					.nav.navbar-nav.navbar-right > li:LAST-CHILD{text-align:right;float:right;}
				}
			</style>
       
        @endif
		<style type="text/css">

		.close-button{
		    color: #fff;
		    position: absolute;
		    top: 0;
		    left: 0;
		    font-size: 1.2em;
		    width: 30px;
		    height: 30px;
		    padding: 7px 11px 1px;
		    margin: 0;
		    cursor: pointer;
	

		}
		.Udvikling_left_txt a{
			color: #ddd !important;
		}

			.header-affix.affix{

				background:#ffffff;

				z-index:9;

				width:100%;

			}



			#image-slider {

			  margin: 0 auto;

			  width: 100%;

			  height: 550px;

			  overflow: hidden;

			  position: relative;

			  /*background-color: rgb(128, 128, 128);*/

			}

			.transition-timer-carousel-progress-bar {

			    height: 3px;

			    background-color: #5cb85c;

			    width: 0%;

			    margin: 0px 0px 0px 0px;

			    border: none;

			    z-index: 11;

			    position: absolute;

				bottom: 0;

			}

			.cprogress-right {

			    right: 30px;

			    position: absolute;

			    bottom: 30px;

			}

			.c100::after{

				background: #ffffff;

			}

			

			.home-sidebar{
			    display: none;
			    position: absolute;
			    right: 30px;
			    width: 144px;
			    top: -2px;
			}

			.sidebar-inner{

				background: #4470b4;padding:40px 20px 40px 20px;float: left;

			}

			.sidebar-inner ul li a{color:#fff !important;font-size:19px;font-family: 'Lato-Semibold';}

			.sidebar-inner .social li a{color:#fff !important;font-size:14px;font-family: 'Lato-Light';}

			.header .user-loggedin .navbar-nav li a{ color: #8f8f8c; padding-top: 5px;margin-right:10px; }

			
			.navbar-right li a {
    padding-bottom: 6px !important;
    padding-left: 2px !important;
    padding-right: 2px !important;
    padding-top: 6px !important;}
	
	

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

	 			<div class="header">

	 			    <div class="header-affix" data-spy="affix" data-offset-top="150">

				   <div class="container" style="position: relative;z-index: 9;">

					    <div class="row">

					    	

					    	<div class="col-md-12 col-sm-12 col-xs-12">

							    <div class="col-md-3 col-sm-3 col-xs-12 logo">

							    	<div class="@if(!Auth::check()) home_blade_logo @endif"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a></div>

							    </div>

							    <div class="col-md-9 col-sm-9 col-xs-12">

							    	<nav class="navbar navbar-inverse " role="navigation" style="background: none;border: none;">

								        <div class="">

								            <!-- Brand and toggle get grouped for better mobile display -->

								            <div class="navbar-header">

								                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

								                    <span class="sr-only">Toggle navigation</span>

								                    <span class="icon-bar"></span>

								                    <span class="icon-bar"></span>

								                    <span class="icon-bar"></span>

								                </button>

								                <a class="navbar-brand" href="#"></a>

								            </div>

								            <!-- Collect the nav links, forms, and other content for toggling -->

								            @if(!Auth::check())

									            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

									                <ul class="nav navbar-nav" style="float: right;">

									                    @if(!Auth::check())

										                    <li>

										                        <a href="{{ url('login') }}">Log ind </a>

										                    </li>

										                    <li>

									                        <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ url('register') }}">Opret profil</a>

		                                                     <ul class="dropdown-menu dropdown-menu-right">

		                                                      <li style="padding: 15px;display: inline-block;">

		                                                        <div class="opret_profil_submenu">

		                                                         <div class="opret_profil_submenu_left">

		                                                          <h1>Opret manuelt</h1>

		                                                          <p>Udfyld formularen</p>

		                                                             <form method="post" action="{{ url('hold_register') }}">

		                                                                {{ csrf_field() }}

		                                                                <div class="form-group">

		                                                                	<input type="email" class="form-control" name="email" id="email" placeholder="Skriv din e-mail">

		                                                                </div>

		                                                                <div class="form-group">

		                                                                 

		                                                                  <input type="password" class="form-control" name="password" id="pwd" placeholder="Skriv din adgangskode">

		                                                                </div>

		                                                                

		                                                                <button type="submit" class="btn btn-default" id="register-submit">Opret bruger</button>

		                                                              </form>

		                                                         </div>

		                                                         <div class="opret_profil_submenu_right">

		                                                          <h1>Opret med de sociale medier</h1>

		                                                          <p>Klik på den du vil benytte</p>

		                                                          <div class="social_icons_fb">

		                                                            <a href="javascript:;" onclcik="callUrl('{{ url('/social/auth/redirect', ['facebook']) }}')">
																						<img src="{{ asset('images/facebook01.png') }}" />
																	</a>
																	<a href="javascript:;" onclcik="callUrl('{{ url('/social/auth/redirect', ['google']) }}')">
																		<img src="{{ asset('images/googleplus002.png') }}" />
																	</a>

		                                                            <?php /*<img src="{{ asset('images/instagram003.png') }}" />*/?>

		                                                          </div>

		                                                         </div>

		                                                        </div>

		                                                      </li>

		                                                     </ul>

									                    </li>

										                @endif

									                    <!--<li>

									                        <a href="{{ url('business') }}">Virksomhed</a>

									                    </li>-->

									                    <li class="Opret_annonce">

									                      <a href="{{ url('ad/create') }}">Opret annonce</a>

									                    </li>

									                    <li id="sidebar-con" class="" style="">

									                      <a id="bar-toggle" class="bar-toggle" href="#">

									                      	<img class="bar-white" src="{{ asset('images/toggle-button.png') }}" />

									                      	<img class="bar-gray" style="display:none;" src="{{ asset('images/toggle-png-grey.png') }}" />

									                      </a>

									                      <div id="home-sidebar" class="home-sidebar">

									                      	<div class="sidebar-inner">

									                      		<p class="close-button"><i class="fa fa-times"></i></p>

										                      	<ul>

										                      		<li>

												                      <a href="#">Forside</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/om-swappi') }}">Om Swappi</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/presse') }}">Presse</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/ledige-stillinger') }}">Jobs</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/kontakt-os') }}">Kontakt os</a>

												                    </li>

												                    @if(Auth::check())

													                    <li>

													                      <a href="{{ url('logout') }}">Log ud</a>

													                    </li>

												                    @endif

										                      	</ul>

										                      	<div class="devide"></div>

										                      	<ul class="social">

										                      		<li>

												                      <a href="https://www.facebook.com/swappi.dk/">Facebook</a>

												                    </li>

												                    

												                    <li>

												                      <a href="http://www.linkedin.com/company/swappi">Linkedin</a>

												                    </li>

												                   

												                </ul>

									                      	</div>

									                      </div>

									                    </li>

									                </ul>

									            </div>

								            @else

								            	<div class="collapse navbar-collapse user-loggedin" id="bs-example-navbar-collapse-1">

								            		<ul class="nav navbar-nav">

														@if(Auth::check())

														<li class="{{ Request::is('ad/search') ? 'Opret_annonce' : '' }}">

															<a href="{{ url('ad/search') }}">Find annoncer</a>

														</li>

														<li class="{{ Request::is('profile/search') ? 'Opret_annonce' : '' }}">

															<a href="{{ url('profile/search') }}">Find profiler</a>

														</li>

														<li class="{{ Request::is('ads') ? 'Opret_annonce' : '' }}">

															<a href="{{ url('ads') }}">Mine annoncer</a>

														</li>

														@else

														<li>

															<a href="{{ url('login') }}">Log ind </a>

														</li>

														<li>

															<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ url('register') }}">Opret profil</a>

															<ul class="dropdown-menu dropdown-menu-right">

																<li style="padding: 15px;display: inline-block;">

																	<div class="opret_profil_submenu">

																		<div class="opret_profil_submenu_left">

																			<h1>Opret manuelt</h1>

																			<p>Udfyld formularen</p>

																			<form>

																				<div class="form-group">

																					

																					<input type="email" class="form-control" id="email" placeholder="Skriv dit navn">

																				</div>

																				<div class="form-group">

																					

																					<input type="password" class="form-control" id="pwd" placeholder="Skriv din e-mail">

																				</div>

																				

																				<button type="submit" class="btn btn-default">Opret bruger</button>

																			</form>

																		</div>

																		<div class="opret_profil_submenu_right">

																			<h1>Opret med de sociale medier</h1>

																			<p>Klik på den du vil benytte</p>

																			<div class="social_icons_fb">

																				<a href="javascript:;" onclcik="callUrl('{{ url('/social/auth/redirect', ['facebook']) }}')">
																						<img src="{{ asset('images/facebook01.png') }}" />
																				</a>
																				<a href="javascript:;" onclcik="callUrl('{{ url('/social/auth/redirect', ['google']) }}')">
																					<img src="{{ asset('images/googleplus002.png') }}" />
																				</a>

																				<?php /*

																				<img src="{{ asset('images/instagram003.png') }}" />

																				*/ ?>

																			</div>

																		</div>

																	</div>

																</li>

															</ul>

														</li>

														<!--<li>

															<a href="{{ url('business') }}">Virksomhed</a>

														</li> -->

														@endif

														<li class="">

															<a href="{{ url('ad/create') }}">Opret annonce</a>

														</li>

													</ul>

													<ul class="nav navbar-nav navbar-right">

														@if(Auth::check())

														<li>

															<div class="search-hidden">

																<form method="get" action="{{ url('ad/search') }}" class="">

																	{{ csrf_field() }}

																	<input type="text" name="ad_search" id="search-field" placeholder="Søg efter ydelser">

																</form>

															</div>

															<a class="search-icon" href="#"><img src="{{ asset('images/search_profile_header.png') }}"> </a>

														</li>

														<li>

															<a href="{{ url('message') }}"><img src="{{ asset('images/Chat-Icon.png') }}"></a>

														</li>

														<!--<li>

															<a href="#"><img src="{{ asset('images/Files-Icon.png') }}"></a>

														</li>-->

														

														<li class="profile-item">

															<a href="{{ url('profile') }}"><img width="35" class="img-circle" src="{{ profile_image_link(Auth::user()->profilePic) }}"></a>

														</li>

														@endif

														<!-- sidbar goes here -->

														<li id="sidebar-con" class="" style="">

									                      <a id="bar-toggle" class="bar-toggle" href="#">

									                      	

									                      	<img class="bar-gray show" src="{{ asset('images/toggle-png-grey.png') }}" />

									                      </a>

									                      <div id="home-sidebar" class="home-sidebar">

									                      	<div class="sidebar-inner">

									                      	<p class="close-button"><i class="fa fa-times"></i></p>

										                      	<ul>

										                      		<li>

												                      <a href="{{url('/')}}">Forside</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/om-swappi') }}">Om Swappi</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/presse') }}">Presse</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('p/ledige-stillinger') }}">Jobs</a>

												                    </li>

												                    <li>

												                      <a href="{{ url('kontakt-os') }}">Kontakt</a>

												                    </li>

												                    @if(Auth::check())

													                    <li>

													                      <a href="{{ url('logout') }}">Log ud</a>

													                    </li>

												                    @endif

										                      	</ul>

										                      	<div class="devide"></div>

										                      	<ul class="social">

										                      		<li>

												                      <a href="https://www.facebook.com/">Facebook</a>

												                    </li>

												                    

												                    <li>

												                      <a href="https://www.linkedin.com/">Linkedin</a>

												                    </li>

												                    

												                </ul>

									                      	</div>

									                      </div>

									                    </li>

													</ul>

								            	</div>

								            @endif

								            <!-- /.navbar-collapse -->

								        </div>

								        <!-- /.container -->

									</nav>



							    </div>

							    </div>

						    

					    </div>

				    </div>

	                </div>

				   <div class="container-fluid" style="position: relative;top: -81px;">

				    <div class="row">

				     <div class="col-md-12 col-sm-12 col-xs-12 container_slider">

				      <div class="col-md-5 col-sm-5 col-xs-12 container_slider_left @if(Auth::check()) loggedin_left @endif">

				       <div class="header_left">

				         <?php /* ?>

				         <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a></div>

				         <?php */ ?>

				         <h1>Få løst en opgave</h1>

				         <h2>Byt med en ydelse <img src="{{ asset('images/arrow_btm_head.png') }}"></h2>

				         <form method="get" action="{{ url('ad/search') }}">

				         	<div class="srch_box_head k" id='v'>

				         		<input type="text" id='link' name="ad_search" placeholder="Søg efter ydelser eller produkter ...">

				         	</div>

				         	{{ csrf_field() }}

				         </form>

				         

				         <div class="tab_nav"> 

				          <p>Du kan også vælge en kategori :</p>

				          <ul class="nav nav-pills">

				          	@foreach($categories as $k => $category)

				             <li class=""><a href="{{ url('category/' . $category->slug) }}">{{ $category->categoryName }}</a></li>

				            @endforeach

				            @if(count($categories) > 6)

				             <li><a href="#more-categories" style="background:none !important;color:#4470b4;padding:10px 0 !important;">Vis flere</a></li>

				            @endif

				         </ul>

				        </div>

				        

				        <div class="Hvorfor"><img src="{{ asset('images/arrow_light_btm_head.png') }}" >Hvorfor Swappi</div>

				       

				       </div>

				      </div>

				      <div class="col-md-7 col-sm-7 col-xs-12 container_slider_right @if(Auth::check()) loggedin_right @endif">

				      

				       <div class="header_right">

				           

					       <div id="image-slider" class="carousel home-carousel slide" data-ride="carousel">

						      <!-- Wrapper for slides -->

							  <div class="carousel-inner" role="listbox">

							    <div class="item active">

							    	<div style="background: url({{ asset('images/Slider.png') }});background-repeat: no-repeat;background-size: contain;height: 555px;background-position: 100%;" onclick="$('#videoModal').modal('show')">

							    		<!--<div class="btn-link" data-toggle="modal" data-target="#videoModal">

							    			<img style="width: 50px;height: 50px;" src="{{ asset('images/play-icon.png') }}"> <span>Sådan virker det</span>

							    		</div>-->

							    	</div>

							    </div>

								 <div class="item">

							    	<div style="background: url({{ asset('images/slider/swappi-forside-1.png') }});background-repeat: no-repeat;background-size: contain;height: 555px;background-position:100%;">

	                                 

							    	</div>			      

							    </div>

							    <div class="item">

							    	<div style="background: url({{ asset('images/slider/swappi-forside-2.png') }});background-repeat: no-repeat;background-size: contain;height: 555px;background-position: 100%">

	                                 

							    	</div>			      

							    </div>

								<div class="item">

							    	<div style="background: url({{ asset('images/slider/swappi-forside-3.png') }});background-repeat: no-repeat;background-size: contain;height: 555px;background-position: 100%">

	                                 

							    	</div>			      

							    </div>

							  </div>

					        

							  <!-- Controls -->

							<div class="left carousel-control" href="#image-slider" role="button" data-slide="prev" style="bottom: 30px;right: 100px;position: absolute;width: 50px;height: 50px;top: unset;left: unset;opacity: 1;">

							    <!-- <span class="fa fa-long-arrow-left" aria-hidden="true"></span> -->				

							    <img src="{{ asset('images/arrow.png') }}">

							</div>						

							<div id="cprogress" class="c100 p40 small cprogress-right" style="font-size:55px;background-color: none;color: #000000;opacity: 1;bottom: 25px;">

					            <span class="right carousel-control" href="#image-slider" role="button" data-slide="next">

					            	<!-- <i class="fa fa-long-arrow-right" style="float: left;width: 100%;height: auto;font-size: 26px;margin-top: 6px;"></i> -->

					            	<img src="{{ asset('images/01.png') }}" style="margin: 0;width: 45px;">

					            </span>

					            <div class="slice">

					                <div class="bar"></div>

					                <div class="fill"></div>

					            </div>

					        </div>

						</div>



						<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

							<div class="modal-dialog modal-lg" role="document">

								<div class="">

									<div class="modal-body">

										<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: relative;

	top: -20px;

	color: #ffffff;

	opacity: 1;

	left: 5px;

	font-size: 16px;">

											<i class="fa fa-times-circle"></i>

										</button>

										<div class="embed-responsive embed-responsive-16by9">

											<iframe width="100%" height="500" src="https://www.youtube.com/embed/lZX8jeTvxOY" frameborder="0" allowfullscreen></iframe>

										</div>

									</div>

								</div>

							</div>

						</div>

					       <!--<img src="images/Slider.png" style="width:100%;height:600px;">-->

					       

				       </div>

				      </div>

				     </div>

				    </div>

				   </div>

				</div>

	  			

	  			<div class="banner_support24">

				   <div class="container">

				    <div class="row">

				     <div class="col-md-12 col-sm-12 col-xs-12">

				      <div class="col-md-4 col-sm-4 col-xs-12 banner_support24_left">

				       <p><img src="{{ asset('images/support_24.png') }}"></p>

				       <h1>Support</h1>

				       <span>Har du spørgsmål om Swappi, står vi til rådighed for at hjælpe dig.</span>

				       <div class="Kontakt_kundeservice"><a href="{{ url('kontakt-os') }}"><p>Kontakt kundeservice</p></a></div>

				      </div>

				      <div class="col-md-4 col-sm-4 col-xs-12 banner_support24_left">

				       <p><img src="{{ asset('images/tilfreindsbarometer.png') }}" /></p>

				       <h1>Tilfredsbarometer</h1>

				       <span>For at give brugere en bedre tryghed ved valg af profiler, har vi udviklet et tilfredsbarometer.</span>

				       <div class="Kontakt_kundeservice" onclick="$('#Tilfredsbarometer').modal('show')"><a href="#"><p>Læs om tilfredsbarometeret</p></a></div>

				      </div>

				      <div class="col-md-4 col-sm-4 col-xs-12 banner_support24_left">

				       <p><img src="{{ asset('images/swappi.png') }}" /></p>

				       <h1>Hvorfor vælge Swappi</h1>

				       <span>Swappi giver dig relationer,<br> der kan styrke din forretningsidé.</span>

				       <div class="Kontakt_Swappi"  onClick="$('#about').modal('show')"><a href="#"><p>Læs om Swappi</p></a></div>

				      </div>

				     </div>

				    </div>

				   </div>

				</div>

				

				@if(count($featuredAds) > 0)

					<div class="Udvikling_Fotograf">

					   <div class="container">

					    <div class="row">

					     <div class="col-md-12 col-sm-12 col-xs-12">

					     	@foreach($featuredAds as $ad)

				     		  <div class="col-md-6 col-sm-6 col-xs-12">

						        <div class="col-md-6 col-sm-6 col-xs-12 Udvikling_Fotograf_left">

						        	<div class="ad-favorite-icon" data-toggle="tooltip" data-placement="top" title="Gem til din ønskeliste" data-ad-id="{{ $ad->id }}" style="position: absolute;left: 10px;top: 10px;cursor: pointer;">

						        		<span class="fa-stack fa-lg">

							        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

							        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

						        		</span>

						        	</div>

						        	<!-- <img src="{{ asset('uploads/' . $ad->adimages[0]->image) }}" style="width:100%;">-->

						        	<a href="{{ url('ad/' . $ad->id . '/detail') }}"><img src="{{ asset(Croppa::url('/uploads/' . returnFeaturedImage($ad->adimages), 270, 270)) }}" width="100%" /></a>

						        </div>

						        <div class="col-md-6 col-sm-6 col-xs-12 Udvikling_left_txt">

						          <div class="Annonce"><h3>Annonce</h3></div>

						          <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>

						          <h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>

						          <h2><img src="{{ asset('images/bytter_icon.png') }}" style="margin-right:7px;">Bytter med {{ $ad->inExchange }}</h2>

						          <a href="{{ url('ad/' . $ad->id . '/detail') }}" class="btn-link"><span>Kontakt</span></a>

						          <div class="Oprettet_den"><img src="{{ asset('images/operated.png') }}" style="margin-right:10px;">Oprettet den {{ $ad->createdAt->format('d / m / Y') }}</div>

						        </div>

						      </div>

						 	@endforeach

					     </div>

					    </div>

					   </div>

					</div>

				@endif

		

				@if (isset($carouselAds) && count($carouselAds) > 0)

	   

				<div class="Forside_annoncer">

				   <div class="container">

				    <div class="row">  

				     <div class="col-md-12 text-center"><h3>Forside <label style="color:#4470b4;font-family: 'Lato-Semibold';">annoncer</label><img src="images/forside_icon.png" style="margin-left:7px;"></h3></div>

						<div class="col-md-12">

						<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="adsCarousel">

						  <div class="carousel-inner">
						  
						  	@foreach($carouselAds as $k => $ad)

								<div class="item {{ $k == 0 ? 'active' : '' }}">

								  <div class="col-md-3 col-sm-3 col-xs-12">

									<div class="Udbyder_Leo_Hansen">

									  <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>

									  <span class="ad-favorite-icon"   data-ad-id="{{ $ad->id }}">
									
									  @if(isset($ad->favorite_by_user[0]) && $ad->favorite_by_user[0]->ad_id == $ad->id)
									  	<span class="fa-stack fa-lg">

							        		<i class="fa fa-circle fa-stack-2x" style="color: green;"></i>

									  		<i class="fa fa-stack-1x fa-check" aria-hidden="true" style="color: rgb(255, 255, 255); font-size: 15px;"></i>

									  	</span>	

									  @else
									  	<span class="fa-stack fa-lg">

							        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

									  		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

									  	</span>

									  @endif
									  	

									  </span>

									  <h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>

									  <h2><img src="{{ asset('images/bytter_icon.png') }}" style="margin-right:7px;">Bytter med {{ $ad->inExchange }}</h2>

									  <div class="calender_carosel">

										<p><img src="{{ asset('images/calender_icon.png') }}" style="margin-right:7px;">{{ $ad->createdAt->format('d / m / Y') }}</p>

										<a href="{{ url('ad/' . $ad->id . '/detail') }}" class="btn-link"><span>Kontakt</span></a>

									  </div>

									  

									</div>

									<!-- <div class="bdo"><img src="{{ asset('images/bdo.png') }}"></div> said to remove. -->

								  </div>

								</div>

							@endforeach

						  </div>

						  <a class="left carousel-control" href="#adsCarousel" data-slide="prev" style="width: 20px;"></a>

						  <a class="right carousel-control" href="#adsCarousel" data-slide="next" style="width: 20px;"></a>

						</div>

					</div>

				   </div>

				  </div>

				</div>

				@endif

				<!--<div class="Vier_meget_glad_banner">

			      <div class="container">

			       <div class="row">

			        <div class="col-md-12 col-sm-12 col-xs-12">

			          <div class="bogforing_square">

			           <span><img src="{{ asset('images/inverted_comma.png') }}"></span>

			           <h1>Vi er meget glad for den <br>hjemmeside vi fik lavet i<br> bytte for 10 timers<br> bogføring</h1>

			           <p style="font-family: 'Lato-Bold';margin-top:5px;">Anja Offenberg</p>

			           <p style="font-family: 'Lato-Regular';">Senior Consultant, Training, BDO</p>

			          </div>

			        </div>

			       </div>

			      </div>

			    </div>-->

			    

			    <div class="rigtige_opgave" id="more-categories">

			      <div class="container">

			       <div class="row">

			        <div class="col-md-12 col-sm-12 col-xs-12">

			        	<p>Find den helt rigtige til din opgave</p>

			        	<div id="categories-con"></div>

			        	<div class="kategorier_btn" id="see-more-categories" data-currentpage="" style="cursor: pointer;"><span>Se flere kategorier</span></div><?php //TODO OnClick ? ?>

			        </div>

			       </div>

			      </div> 

			    </div>

			    

			    <div class="Udvikling_Fotograf">

				   <div class="container">

				    <div class="row">

				     <div class="col-md-12 col-sm-12 col-xs-12">

				     	@foreach($users as $k => $user)

				     		@if($k < 2)

						      <div class="col-md-6 col-sm-6 col-xs-12" style="    max-height: 250px;
    overflow: hidden;">

						        <div class="col-md-6 col-sm-6 col-xs-12 Udvikling_Fotograf_left">

					             @if(Auth::check())

					             	@if($user->id != Auth::user()->id)

							         <div class="user-favorite-icon" data-user-id="{{ $user->id }}" style="position: absolute;left: 10px;top: 10px;cursor: pointer;">


							         @if(count($user->friendsOfMine) > 0)
										  	<span class="fa-stack fa-lg">

								        		<i class="fa fa-circle fa-stack-2x" style="color: green;"></i>

										  		<i class="fa fa-stack-1x fa-check" aria-hidden="true" style="color: rgb(255, 255, 255); font-size: 15px;"></i>

										  	</span>	

										  @else
										  	<span class="fa-stack fa-lg">

								        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

										  		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

										  	</span>

										  @endif
						        	<!-- 	<span class="fa-stack fa-lg">

							        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

							        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

						        		</span>
 -->
						        	 </div>

						        	@endif

						         @else



						         	<div class="user-favorite-icon" data-user-id="{{ $user->id }}" style="position: absolute;left: 10px;top: 10px;cursor: pointer;">



						        		<span class="fa-stack fa-lg">

							        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

							        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

						        		</span>

						        	 </div>

						       	 @endif

						         <a href="

						         	@if(Auth::check() && $user->id != Auth::user()->id) 

						         		{{ $profile_link = url('profile/user/' . $user->id) }} 

						         	@else

						         		{{ $profile_link = url('profile') }} 

						         	@endif

						         " class="btn-link"><img src="{{ profile_image_link($user->profilePic, 270, 270) }}" style="width:100%;" /></a>

						        </div>

						        <div class="col-md-6 col-sm-6 col-xs-12 Digital_designer Udvikling_left_txt">

						          <div class="Annonce_digital"><h3>Annonce</h3></div>

						          <p>{{ $user->fName }} {{ $user->lName }}</p>

								  <h1>@if(isset($user->experiences[0])){{ $user->experiences[0]->designation }}@endif</h1>

						          <h2>{!! print_ratting(average_ratting($user->reviews)) !!}<b style="font-size:15px;">{{ average_ratting($user->reviews) }}/5</b> - {{ $connections }} anmeldelser</h2>

						          <a href="{{ $profile_link }}" class="btn-link"><span>Kontakt</span></a>

						          @if($user->city)

						          	<div class="Oprettet_den"><img src="images/adress_icon.png" style="margin-right:10px;">{{ $user->city }} <?php //TODO "Last Active - 1 day ago" ?></div>

						          @endif

						        </div>

						      </div>

							@endif

					 	@endforeach

				     </div>

				    </div>

				   </div>

				</div>

				  

			    <div class="Forside_annoncer">

				   <div class="container">

				    <div class="row">  

				     <div class="col-md-12 text-center"><h3 style="color:#3e3e3d;">Seneste vurderede <b style="color:#4470b4;">profiler</b><img src="images/forside_icon.png" style="margin-left:7px;"></h3></div>

						<div class="col-md-12">

						<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="usersCarousel">

						  <div class="carousel-inner">

						  	@foreach($users as $k => $user)

							    <div class="item {{ $k == 0 ? 'active' : '' }}">

							      <div class="col-md-3 col-sm-3 col-xs-12">

							        <div class="rune_peterson_advocate">

							          <p>

							          	<a href="

								         	@if(Auth::check() && $user->id != Auth::user()->id) 

								         		{{ $profile_link = url('profile/user/' . $user->id) }} 

								         	@else

								         		{{ $profile_link = url('profile') }} 

								         	@endif

								         "><img width="119" class="img-circle" src="{{ profile_image_link($user->profilePic, 119, 119) }}" /></a>

							          	@if(Auth::check())

							             	@if($user->id != Auth::user()->id)

									         <div class="user-favorite-icon"  data-user-id="{{ $user->id }}" style="position: absolute;left: 10px;top: 10px;cursor: pointer;">

									         	@if(count($user->friendsOfMine) > 0)
												  	<span class="fa-stack fa-lg">

										        		<i class="fa fa-circle fa-stack-2x" style="color: green;"></i>

												  		<i class="fa fa-stack-1x fa-check" aria-hidden="true" style="color: rgb(255, 255, 255); font-size: 15px;"></i>

												  	</span>	

												  @else
												  	<span class="fa-stack fa-lg">

										        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

												  		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

												  	</span>

												  @endif
										         
								        		<!-- <span class="fa-stack fa-lg">

									        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

									        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

								        		</span> -->

								        	 </div>

								        	@endif

								         @else

								         	<div class="user-favorite-icon" data-user-id="{{ $user->id }}" style="position: absolute;left: 10px;top: 10px;cursor: pointer;">

								        		<span class="fa-stack fa-lg">

									        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>

									        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>

								        		</span>

								        	 </div>

								       	 @endif

							          </p>

							          <h1>{{ $user->fName }} {{ $user->lName }}</h1>

							          <h2>

							          	@if(isset($user->experiences[0]))

							          		{{ $user->experiences[0]->designation }}

							          	@endif

							          </h2>

							          <p>{!! print_ratting(average_ratting($user->reviews)) !!}</p>

							          <p class="hert_anmeldelser"><span style="font-size:15px;font-family: 'Lato-Bold';">{{ average_ratting($user->reviews) }}/5</span> - {{ $connections }} anmeldelser</p>

							          <div class="calender_København">

							          	@if($user->city)

							            	<p><img src="images/adress_icon.png" style="margin-right:7px;">{{ $user->city }}</p>

							            @endif

							            <a href="{{ $profile_link }}"><span>Kontakt</span></a>

							          </div>

							          

							        </div>

							        @if(isset($user->experiences[0]))

									<!-- <div class="bdo"><img src="{{ asset('uploads/' . $user->experiences[0]->logo) }}"></div> said to remove. -->

							        @endif

							      </div>

							    </div>

							@endforeach

						  </div>

						  <a class="left carousel-control" href="#usersCarousel" data-slide="prev" style="width: 20px;"></a>

						  <a class="right carousel-control" href="#usersCarousel" data-slide="next" style="width: 20px;"></a>

						</div>

						</div>

				   </div>

				  </div>

				</div>

	  

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

				   

				<?php //TODO Newsletter ?>

				<div class="Hold_dig_opdateret">

				    <div class="container">

				     <div class="row">

				      <div class="col-md-12 col-sm-12 col-xs-12">

				       <h1>Hold dig opdateret</h1>

				       <p>Få de seneste nyheder fra Swappi omkring announcer tilbud og meget andet.</p>

				       <div class="input_sbmit">

				        <div class="Skriv_Tilmeld">

						<form id="add-subs" >

				         <div class="input-group">

						 {{ csrf_field()  }}

				           <input type="text" class="form-control" name="email" placeholder="Skriv din e-mail adresse">

				            <span class="input-group-btn">

				             <button class="btn btn-secondary" type="submit" >Tilmeld dig</button>

				            </span>

				        </div>

						<p id="subs-err" class="text-danger"></p>

						</form>

				       </div>

				      </div>

				       

				      </div>

				     </div>

				    </div>

				</div>

				

				@include('layouts.footer')

				  		  



			</div>

		</div>



		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

	    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

	    <script type="text/javascript">

			//add subscribers

			$('#add-subs').on('submit', function(e){

				e.preventDefault();

				var form = new FormData($(this)[0]);

				

				$.ajax({

					url: '{{url("/subscribe")}}',

					data:form,

					type:"POST",

					processData: false,

					contentType: false,

					beforeSend:function(){

						$('#subs-err').empty();

					},

					success: function(response){

						var data = $.parseJSON(response);

						if(data.status == true){

							alert(data.message);

						}else{

							if(data.data == ''){

								alert(data.message);

							} else {

								$('#subs-err').html('<p class="text-danger remove-err">'+data.data.email[0]+'</p>');

							}

						}

					},

					complete:function(){

						

					}

				})

			});

		

		

	    	$(function () {

	    		$('[data-toggle="tooltip"]').tooltip({
	    			container: 'html'
	    		});

	    	});

	    

	    	function closesidebar(){

	    		$('.home-sidebar').hide();

				$('.bar-toggle').removeClass('opened');

	    	}



			$(document).ready(function(e){

				$('.bar-toggle').on('click', function(e){

					e.preventDefault();



					if($(this).hasClass('opened')){

						$('.home-sidebar').hide();

						$(this).removeClass('opened');

					}else{

						$('.home-sidebar').show();

						$(this).addClass('opened');

					}

				});

				$('.home-sidebar .close').on('click', function(e){

					closesidebar();

				});

				

				$('body').click(function(e){

					if($(e.target).parents('#sidebar-con').length)

				   		return;



			      	//Do processing of click event here for every element except with id menu_content

			       	closesidebar();

				});

			});

		</script>

		 <script type="text/javascript">



		 	$(document).ready(function(){

		 		// $('#see-more-categories').click();



		 		// $('#see-more-categories').on('click', function(){

		 			var token = $('[name="_token"]').val();



		 			//Make ajax call

					$.ajax({

						url: "{{ url('home/get_categories') }}",

						method: "GET",

						headers: {'X-CSRF-TOKEN': token},

					}).done(function(data) {

						$('#see-more-categories').attr('data-currentpage', '2');

						$('#categories-con').html(data);

					});

		 		// });



		 		$('#see-more-categories').on('click', function(){

					var token = $('[name="_token"]').val();

					var current = $('#see-more-categories').attr('data-currentpage');



					//Make ajax call

					$.ajax({

						url: "{{ url('home/get_categories?page=') }}"+current,

						method: "GET",

						headers: {'X-CSRF-TOKEN': token},

					}).done(function(data) {

						current++

						$('#see-more-categories').attr('data-currentpage', current);

						

						if(data.indexOf("false") > -1){

							$('#see-more-categories').hide();

							$('#categories-con').append('<div class="col-md-12 text-center"></div>');

						}else{

							$('#categories-con').append(data);

	  					}

					});

				});

		 	});



		 	$(document).ready(function(){

				var percent = 0, 

				bar = $('.transition-timer-carousel-progress-bar'), 

				crsl = $('#image-slider');

				control = $('.carousel-control .bar');

				function progressBarCarousel() {

					bar.css({width:percent+'%'});

					$('#cprogress').attr('class', '').addClass('c100 p'+Math.ceil(percent)+' small cprogress-right');

					percent = percent +0.5;

					if (percent > 100) {

				    	percent = 0;

				    	crsl.carousel('next');

					}      

				}

				crsl.carousel({

				    interval: false,

				    pause: true,

				    keyboard: true

				}).on('slid.bs.carousel', function () {});

				var barInterval = setInterval(progressBarCarousel, 30);

				crsl.hover(

				    function(){

				        clearInterval(barInterval);

				    },

				    function(){

				        barInterval = setInterval(progressBarCarousel, 30);

	          		}

	          	);



		    });





			 $(document).ready(function(){  



				//  $('.home-carousel').carousel({

				// 	interval: 3000,

				// });



				 $('.carousel').carousel({

					interval: 8000,

				});

				 

			   $('.carousel[data-type="multi"] .item').each(function(){

				  var next = $(this).next();

				  if (!next.length) {

				    next = $(this).siblings(':first');

				  }

				  next.children(':first-child').clone().appendTo($(this));

				

				  for (var i=0;i<2;i++) {

				    next=next.next();

				    if (!next.length) {

				    	next = $(this).siblings(':first');

				  	}

				    

				    next.children(':first-child').clone().appendTo($(this));

				  }

				});



				

				$('.ad-favorite-icon').on('click', function(){

					var adid = $(this).attr('data-ad-id');

					var token = $('[name="_token"]').val();

					var $that = $(this);

					

					@if(Auth::check())

						//Make ajax call

						$.ajax({

							url: "{{ url('ad/favorite') }}",

							method: "POST",

							headers: {'X-CSRF-TOKEN': token},

		 					data: {'ad': adid, 'user': "{{ Auth::user()->id }}"}

						}).done(function(data) {

							data = $.parseJSON(data);

							$that.find('.fa-circle').css({'color':'green'});

							$that.find('.fa-star').removeClass('fa-star').addClass('fa-check').css({'color':'#ffffff'});

							$('body').append('<div class="favorite alert alert-success">'+data.msg+'</div>');



							setInterval(remove_alert, 1000);

						});

					@else

						alert('Please login to mark favorite.');

					@endif

				});



				$('.user-favorite-icon').on('click', function(){

					var favoriteid = $(this).attr('data-user-id');

					var token = $('[name="_token"]').val();

					var $that = $(this);



					@if(Auth::check())

						//Make ajax call

						$.ajax({

							url: "{{ url('profile/request') }}/" + favoriteid,

							method: "GET",

							headers: {'X-CSRF-TOKEN': token},

		 					// data: {'favorite_id': favoriteid, 'user_id': "{{ Auth::user()->id }}"}

						}).done(function(data) {

							data = $.parseJSON(data);

							$('body').append('<div class="favorite alert alert-success">'+data.msg+'</div>');

							

							if(data.status){

								$that.find('.fa-circle').css({'color':'green'});

								$that.find('.fa-star').removeClass('fa-star').addClass('fa-check').css({'color':'#ffffff'});

							}else{

								

								setInterval(remove_alert, 1000);

							}

						});

					@else

						alert('Please login to mark favorite.');

					@endif

				});

				

			  });



			function remove_alert(){

				$('.alert').remove();

			}

			  

		   $(document).ready(function() {
			   
			  $('#link').keyup(function(){
				$('#link').focus();
				$('.container_slider_left').css('margin-top','200px');
			  });

			  $('a[href^="#more-categories"]').click(function() {

				  var target = $(this.hash);

				  if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');

				  if (target.length == 0) target = $('html');

				  $('html, body').animate({ scrollTop: target.offset().top-200 }, 1000);

				  return false;

			  });

			});

		   $('.close-button').on('click', function(){

		 		$('.home-sidebar').hide();

				$(this).removeClass('opened');

				$('#bar-toggle').removeClass('opened');

		 	});


			 
		 </script>



		<div id="about" class="modal fade" role="dialog">

		  <div class="modal-dialog">



			<!-- Modal content-->

			<div class="modal-content">

			  <button type="button" class="close" data-dismiss="modal" style="position: relative; top: -20px;

	color: #ffffff; opacity: 1;left: 16px;

	font-size: 16px;"><i class="fa fa-times-circle"></i></button>

			  <div class="modal-body">

				<h2><strong>Hvorfor v&aelig;lge Swappi?</strong></h2>

				<p><strong>Fordele ved Swappi</strong></p>

				<p><strong>Bytte ydelser uden at bruge penge<br /> </strong>Hvis du v&aelig;lger Swappis platform for bytte af ydelser, kan du f&aring; en brugbar og m&aring;lrettet ydelse uden at hive dankortet frem. Du bytter simpelt hen ydelse med en anden bruger af Swappi, og der er s&aring;ledes ikke penge involveret i udvekslingen. Hvis du fx er programm&oslash;r, kan du tilbyde fire timers programmering for fire timers revisorhj&aelig;lp, uden at det koster jer andet end de fire timers ydelse. Det er b&aring;de nemt, ukompliceret og omkostningsfrit.</p>

				<p><strong>F&aring; et netv&aelig;rk du kan bruge til din forretning<br /> </strong>Du kan ved hj&aelig;lp af Swappi f&aring; en masse nyttige forbindelser og relationer, som du kan bruge til at styrke din virksomhed eller din forretningside. Det er is&aelig;r utrolig vigtigt, hvis du er nystartet iv&aelig;rks&aelig;tter, som dels har brug for de rette ydelser, uden at det koster noget, dels har brug for noget nyttig erfaring, s&aring; du kan realisere dine mange kreative ideer. &nbsp;</p>

				<p><strong>Skabe en v&aelig;rdifuld portef&oslash;lje<br /> </strong>N&aring;r du bruger Swappi, kan du opbygge en portef&oslash;lje med kunder, partnere og potentielle samarbejdspartnere, som du kan f&oslash;lge t&aelig;t. Hos Swappi er kontakten og dialogen med de &oslash;vrige brugere mere personlig, direkte og til gavn for begge parter, da I kan tilbyde den anden noget konkret og v&aelig;rdifuldt. Swappi kan ogs&aring; bruges til at udvide dit netv&aelig;rk, og det er nemt for andre, som har brug for dine kompetencer, at finde dig p&aring; Swappi. &nbsp;</p>

				<p><strong>Gratis og enkelt at bruge Swappi<br /> </strong>Lidt om hvordan man bruger Swappi - kort!</p>

			  </div>

			</div>



		  </div>

		</div>

		

		<div id="Tilfredsbarometer" class="modal fade" role="dialog">

		  <div class="modal-dialog">



			<!-- Modal content-->

			<div class="modal-content">

				<button type="button" class="close" data-dismiss="modal" style="position: relative;

	top: -20px;

	color: #ffffff;

	opacity: 1;

	left: 16px;

	font-size: 16px;"><i class="fa fa-times-circle"></i></button>

			

			  <div class="modal-body">

				<h1>Tillidsbarometer</h1>

						<p>Det er vigtigt at der gives en seriøs bedømmelse og du at bedømmer de tre kriterier separat. Useriøse bedømmelse kan og vil blive fjerne af Swappi.</p><br>

						<p><strong>Kvalitet af det udførte arbejde</strong></p>

						<p>Her skal du vurdere om det arbejde personen er udførte levede op til de forventninger du havde. Swappi anbefaler at i forventningsafstemmer inden start og bliver enige om hvilket arbejde der skal udføreres. Hvis der opstår uoverensstemmelser eller snyd, kan du kontakte Swappi <a href="mailto:swappi@swappi.dk">swappi@swappi.dk</a></p><br>

						<p><strong>Kommunikation</strong></p>

						<p>Hvordan har kommunikationen været? Har vedkommende vendt hurtigt tilbage på henvendelser? Samt har opgaven været oplyst fra starten?</p><br>

						<p><strong>Vil du arbejde med personen igen?</strong></p>

						<p>Her skal du vurdere det samlede arbejde, fra da du så annoncen til da arbejdet blev udført. Levede det hele op til dine forventninger og vil du arbejde med personen igen.</p><br>

						<p><strong>Over all rate</strong></p>

						<p>Swappi vil du fra dine 3 bedømmelser regne en samlet score frem, som vil blive din rate.</p><br>

						<p><strong>Fritekst</strong></p>

						<p>Her kan du uddybe din bedømmelse, så andre kan få en bedre forståelse for hvordan forløbet har været.</p>

			  </div>

			  

			</div>



		  </div>

		</div>

	</body>

	</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('metaTitle') - Swappi ApS</title>
	<meta name="description" content="@yield('metaDescription')">
	<meta name="keywords" content="@yield('metaKeywords')">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.header-affix.affix{
			background:#ffffff;
			z-index:9;
			width:100%;
		}

		.home-sidebar{
			display:none;
			position: absolute;
			left: 0;
		}
		.sidebar-inner{
			background: #4470b4;
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
	<div class="main">
		<div class="wrapper">
 
			<div class="header_profile">
				<div class="header-affix" data-spy="affix" data-offset-top="150">
			   <div class="container">
			    <div class="row">
		    	 <div class="col-md-12 col-sm-12 col-xs-12">
			     
			      <div class="col-md-9 col-sm-9 col-xs-12">
			       <div class="header_profile_left">
			         <div class="logo col-md-4 col-sm-4 col-xs-12"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a></div>
			         
			         <nav class="navbar navbar-inverse col-md-8 col-sm-8 col-xs-12" role="navigation">
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
			            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                <ul class="nav navbar-nav extra-fixes">
			                    <li class="{{ Request::is('ad/search') ? 'Opret_annonce' : '' }}">
			                        <a href="{{ url('ad/search') }}">Find annoncer</a>
			                    </li>
			                    <li class="{{ Request::is('profile/search') ? 'Opret_annonce' : '' }} " >
			                        <a href="{{ url('profile/search') }}">Find profiler</a>
			                    </li>
			                    <li class="{{ Request::is('ads') ? 'Opret_annonce' : '' }}">
			                        <a href="{{ url('ads') }}">Mine annoncer</a>
			                    </li>
			                    <li class="">
			                      <a href="{{ url('ad/create') }}">Opret annonce</a>
			                    </li> 
			                </ul>
			            </div>
			            <!-- /.navbar-collapse -->
			        </div>
			        <!-- /.container -->
			    </nav>
			         
			         
			       </div>
			      </div>
			      
			      <div class="col-md-3 col-sm-3 col-xs-12">
			       <div class="header_profile_right">
			        
			       <div id="image-slider">
			       <nav class="navbar navbar-inverse " role="navigation">
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
			            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			                <ul class="nav navbar-nav navbar-right">
			                	@if(Auth::check())
				                    <li>
				                        <a href="#"><img src="{{ asset('images/search_profile_header.png') }}"> </a>
				                    </li>
				                    <li>
				                        <a href="{{ url('message') }}"><img src="{{ asset('images/Chat-Icon.png') }}"></a>
				                    </li>
				                   <!-- <li>
				                        <a href="#"><img src="{{ asset('images/Files-Icon.png') }}"></a>
				                    </li> -->
				                    
				                    <li class="Opret_annonce">
				                      <a href="{{ url('profile') }}"><img width="35" class="img-circle" src="{{ profile_image_link(Auth::user()->profilePic) }}"></a>
				                    </li>
				                @endif 
			                    <?php /* ?>
			                    <li style="padding-left:15px;">
			                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			                        	<img src="{{ asset('images/border_icon.png') }}">
			                        </a>
			                        @if(Auth::check())
				                        <ul class="dropdown-menu">
								            <li><a href="{{ url('logout') }}">Log ud</a></li>
								    	</ul>
								    @endif
				                </li> 
				                <?php */ ?>
				                <li id="sidebar-con" class="" style="display: relative;">
			                      <a class="bar-toggle" href="#"><img src="{{ asset('images/toggle-button.png') }}" /></a>
			                      <div class="home-sidebar">
			                      	<span class="close"><i class="fa fa-times"></i></span>
			                      	<div class="sidebar-inner">
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
			            <!-- /.navbar-collapse -->
			        </div>
			        <!-- /.container -->
			    </nav>
			       
			       </div>
			      </div>
			     </div>
			     
			     </div>
			    </div>
			   </div>
			   </div>
			  </div>
			
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
			        <span>Aktive annoncer</span>
			       </div>
			       <div class="col-md-4 col-sm-4 col-xs-12">
			          <p>{{ $rattingCount }}</p>
			        <span>Aktive annoncer</span>
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
			       <p>Få de seneste nyheder fra Swappi omkring, annoncer, tilbud og meget andet.</p>
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
			   
			@include('layouts.footer')
			<!--<div class="footer">
			    
				-->
				<div class="container">
			     <div class="row">
			      <div class="col-md-12 col-sm-12 col-xs-12">
			       <p><img src="{{ asset('images/footer_logo.png') }}"></p>
			       
			       <div class="col-md-2 col-sm-2 col-xs-12 swapi_apps">
			        <ul>
			         <li>Swappi ApS
			Peter Fabers Gade 39, 4. tv.
			2200 København N</li>
			         <li>Tlf. xx xx xx xx
			E-mail: info@swappi.dk 
			CVR. 36558709</li>
			        
			        </ul>
			       </div>
			       
			       <div class="col-md-2 col-sm-2 col-xs-12 social_icon">
						<ul>
						 <li><a href="https://www.facebook.com/swappi.dk/"><img src="{{ asset('images/fb_icon.png') }}" style="margin-right:10px;"><b>Facebook</b></a></li>
						 <li><a href="http://www.linkedin.com/company/swappi"><img src="{{ asset('images/linkedin.png') }}" style="margin-right:10px;"><b>LinkedIn</b></a></li>
						</ul>
			          <!--<li><a href="#"><img src="{{ asset('images/twitter.png') }}" style="margin-right:10px;">Twitter</a></li>
			         <li><a href="#"><img src="{{ asset('images/google_icon.png') }}" style="margin-right:10px;">Google+</a></li>
			         <li><a href="#"><img src="{{ asset('images/vimeo.png') }}" style="margin-right:10px;">VIMEO</a></li>
			         <li><a href="#"><img src="{{ asset('images/pinterest.png') }}" style="margin-right:10px;">Pinterest</a></li>-->
			       </div>
			       
			        <div class="col-md-2 col-sm-2 col-xs-12 laer_osed_kende">
			         <ul>
			          <li><a href="#"><b>Lær os at kende</b></a></li>
			          <li><a href="{{ url('p/help') }}">Hjælp</a></li>
			          <li><a href="{{ url('kontakt-os') }}">Kontakt Swappi</a></li>
					  			<li><a href="{{ url('p/tillidsbarometer') }}">Tillidsbarometer</a></li>
			          <li><a href="{{ url('p/vacancies') }}">Ledige stillinger</a></li>
			          <li><a href="{{ url('p/press') }}">Presse</a></li>
			          <li><a href="{{ url('blog') }}">Blog</a></li>
			         </ul>
			        </div>
			        
			        <div class="col-md-2 col-sm-2 col-xs-12 laer_osed_kende">
			         <ul>
			          <li><a href="#"><b>Sikkerhed og vilkår</b></a></li>
			          <li><a href="{{ url('handelsbetingelser') }}">Handelsbetingelser</a></li>
			          <li><a href="{{ url('Brugervilkår') }}">Brugervilkår</a></li>
			          <li><a href="{{ url('regler-for-annoncering') }}">Regler for annoncering</a></li>
			          <li><a href="{{ url('Fortrolighedspolitik') }}">Fortrolighedspolitik</a></li>
			         <li><a href="{{ url('cookie-politik') }}">Cookie Politik</a></li>
			         
			         </ul>
			        </div>
			        
			        <div class="col-md-2 col-sm-2 col-xs-12 laer_osed_kende">
			         <ul>
			          <li><a href="#"><b>Erhverv</b></a></li>
			          <li><a href="{{ url('webshops') }}">Swappi  Business webshops</a></li>
			          <li><a href="{{ url('admanager') }}">Swappi  Business Admanager</a></li>
			          <li><a href="{{ url('banner-ads') }}">Swappi  Business bannerannoncer</a></li>
			         
			         
			         </ul>
			        </div>
			       
			      </div>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			        <div class="col-md-3 col-sm-3 col-xs-12 copyright">
			          � 2015, Swappi ApS. All rights reserved
			        </div>
			        <div class="col-md-9 col-sm-9 col-xs-12 copyright_credits">
			         Credits - <img src="{{ asset('images/sampedro.png') }}">
			        </div>
			      </div>
			      
			     </div>
			    </div>
			   </div>
      
		</div>
	</div>
	
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/site.util.js') }}"></script>
	<script type="text/javascript">
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
		});

		$('body').click(function(e){
			if($(e.target).parents('#sidebar-con').length)
		   		return;

	      	//Do processing of click event here for every element except with id menu_content
	       	closesidebar();
		});
	</script>
	    
    @yield('scripts')

</body>
</html>
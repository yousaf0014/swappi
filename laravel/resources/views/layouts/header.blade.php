<style type="text/css">
	#bs-example-navbar-collapse-1 {
	    margin-top: 30px;
	}
</style>
<div class="header_profile">
					<div class="header-affix" data-spy="affix" data-offset-top="150">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									
									<div class="">
										<div class="header_profile_left">
											<div class="logo col-md-3 col-sm-3 col-xs-12"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a></div>
											
											<nav class="navbar navbar-inverse col-md-9 col-sm-9 col-xs-12" role="navigation">
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
														<ul class="nav navbar-nav" @if(!Auth::check()) {!! 'style="float:right;"' !!} @endif>
															@if(Auth::check())
															<li class="{{ Request::is('ad/search') ? 'Opret_annonce' : '' }} override" >
																<a href="{{ url('ad/search') }}">Find annoncer</a>
															</li>
															<li class="{{ Request::is('profile/search') ? 'Opret_annonce' : '' }} override">
																<a href="{{ url('profile/search') }}">Find profiler</a>
															</li>
															<li class="{{ Request::is('ads') ? 'Opret_annonce' : '' }} override">
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
																				<form method="post" action="{{ url('hold_register') }}">
																					{{ csrf_field() }}
																					<div class="form-group">
																						
																						<input type="email" class="form-control" name="email" id="email" placeholder="Skriv din e-mail">
																					</div>
																					<div class="form-group">
																						
																						<input type="password" class="form-control" name="password" id="pwd" placeholder="Skriv din adgangskode">
																					</div>
																					
																					<button type="submit" class="btn btn-default">Opret bruger</button>
																				</form>
																			</div>
																			<div class="opret_profil_submenu_right">
																				<h1>Opret med de sociale medier</h1>
																				<p>Klik på den du vil benytte</p>
																				<div class="social_icons_fb">
																					<a href="{{ url('/social/auth/redirect', ['facebook']) }}">
																						<img src="{{ asset('images/facebook01.png') }}" />
																					</a>
																					<a href="{{ url('/social/auth/redirect', ['google']) }}">
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
															<!-- <li>
																<a href="{{ url('business') }}">Virksomhed</a>
															</li> -->
															@endif
															<li class="">
																<a href="{{ url('ad/create') }}">Opret annonce</a>
															</li>
															@if(!Auth::check())
															<li id="sidebar-con" class="" style="">
																	<a class="bar-toggle" href="#"><img src="{{ asset('images/toggle-png-grey.png') }}" /></a>
																	<div id="home-sidebar" class="home-sidebar">
                                                              			<p class="close-button"><i class="fa fa-times"></i></p>
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
																@endif
														</ul>

														@if(Auth::check())
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
											                      <p class="close-button"><i class="fa fa-times"></i></p>
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
														@endif
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
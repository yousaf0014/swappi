@extends('layouts.app')

@section('metaTitle', 'My profiler')


@section('content')
<style type="text/css">
	.innernavigation{margin-top:0 !important;}
</style>
	<form method="post" action="{{ url('profile/update') }}" enctype="multipart/form-data" onsubmit="setFormSubmitting()">
		<div class="profile_banner" id="profile_banner" style="background-image: url({{ cover_image_link(Auth::user()->coverPic) }});">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
	      				<center class="banner_change_link">
	      					<img src="{{ asset('images/change-bg-btn.png') }}">
	      				</center>
	      				<input type="file" name="coverPic" id="coverPic" accept='image/*'>
	      			</div>
	     		</div>
	    	</div>
		</div>
        {{ csrf_field() }}
      	<input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
		<div class="navigation_pages">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 xol-xs-12">
						<div class="col-md-3 col-sm-3 col-xs-12 navigation_pages_left">
							<img id="profilePic" height="" src="{{ profile_image_link(Auth::user()->profilePic) }}">
							<a href="#" style="    width: 170px;
    margin-left: 15px;
" class="change-profile" data-toggle="modal" data-target="#profile-pic-crop"><i class="fa fa-camera"></i> Skift profilbillede.</a>
							<input type="file" name="profilePic" id="profileImg" accept='image/*'>
						</div>
						<div class="modal fade" id="profile-pic-crop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					      <div class="modal-dialog" role="document">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title">Crop Profile Image</h4>
					          </div>
					          <div class="modal-body">
					            <img src="{{ profile_image_link(Auth::user()->profilePic) }}" id="profile-pic-target" alt="[Jcrop Example]" />
					
					            <div id="preview-pane">
					              <div class="preview-container">
					                <img src="{{ profile_image_link(Auth::user()->profilePic) }}" id="profile-pic-preview" class="jcrop-preview" alt="Preview" />
					              </div>
					            </div>
					
					            <div id="preview-pane-1">
					              <div class="preview-container">
					                <img src="{{ profile_image_link(Auth::user()->profilePic) }}" id="profile-pic-preview-1" class="jcrop-preview" alt="Preview" />
					              </div>
					            </div>
					            <div id="preview-pane-2">
					              <div class="preview-container">
					                <img src="{{ profile_image_link(Auth::user()->profilePic) }}" id="profile-pic-preview-2" class="jcrop-preview" alt="Preview" />
					              </div>
					            </div>
					            <div id="preview-pane-3">
					              <div class="preview-container">
					                <img src="{{ profile_image_link(Auth::user()->profilePic) }}" id="profile-pic-preview-3" class="jcrop-preview" alt="Preview" />
					              </div>
					            </div>
					          </div>
					          <div class="modal-footer">
					            <input type="hidden" id="x" name="x" />
					            <input type="hidden" id="y" name="y" />
					            <input type="hidden" id="w" name="w" />
					            <input type="hidden" id="h" name="h" />
					            <input type="button" value="Beskær billede" class="btn btn-large btn-inverse" data-dismiss="modal" />
					          </div>
					        </div><!-- /.modal-content -->
					      </div><!-- /.modal-dialog -->
					    </div><!-- /.modal -->
				        <div class="col-md-9 col-sm-9 col-xs-12 navigation_pages_right">
				        	<nav class="navbar navbar-inverse " role="navigation">
				        		<div class="">
				            		<!-- Brand and toggle get grouped for better mobile display -->
						           <!-- <div class="navbar-header">
						                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						                    <span class="sr-only">Toggle navigation</span>
						                    <span class="icon-bar"></span>
						                    <span class="icon-bar"></span>
						                    <span class="icon-bar"></span>
						                </button>
						                <a class="navbar-brand" href="#"></a>
						            </div>
				            		<!-- Collect the nav links, forms, and other content for toggling -->
						            <div class="collapse navbar-collapse innernavigation" id="bs-example-navbar-collapse-1">
						                <ul class="nav navbar-nav">
						                    <li>
						                        <a class="scroll" href="#beskrivelse">Beskrivelse</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#projekter">Projekter</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#certificeringer">Certificeringer</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#erfaring">Erfaring</a>
						                    </li>
						                   <!--  <li>
						                        <a class="scroll" href="#anbefalinger">Anbefalinger</a>
						                    </li> -->
						                    <li>
						                        <a class="scroll" href="#kompetencer">Kompetencer</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#uddannelse">Uddannelse</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#forbindelser">Forbindelser</a>
						                    </li>
						                    <li>
						                        <a class="scroll" href="#anmeldeser">Anmeldelser</a>
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

		<div class="profile_main_section">
	     <div class="container">
	      <div class="row">
	      	<div class="col-md-9 col-md-offset-3 hide">
		      	@include('admin.error')
	    		@include('admin.success')
	    	</div>
	       <div class="col-md-12 col-sm-12 col-xs-12">
	       	
			<!--        	// Left column -->
	        <div class="col-md-3 col-sm-3 col-xs-12">
	         <div class="Rune_Petersen_profile_section">
	          <div class="rune_vip">
	           <h1 class="user-flname">
	           	<div class="user-fname">{{ Auth::user()->fName }}</div> <div class="user-lname">{{ Auth::user()->lName }}</div>
	           	<input type="text" name="fName" id="fName" class="form-control hide" value="{{ Auth::user()->fName }}" />
	           	<input type="text" name="lName" id="lName" class="form-control hide" value="{{ Auth::user()->lName }}" />
	           	<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
	           </h1>
	           
	           @if($user[0]->isVip == 1)
	           	<span>VIP</span>
	           @endif
	           <!--<h5>{{ '@'.$user[0]->username }}</h5>-->
	          </div>
	          @if(average_ratting($user[0]->reviews) != 0 )
	          	<div class="heart_icon_section">{!! print_ratting(average_ratting($user[0]->reviews)) !!} {{ average_ratting($user[0]->reviews) }}/5</div>
	          @endif
	          <div class="Digital_designer_section">
	            @if(count($user[0]->experiences) > 0)
	            	<h2 class="user-jobtitle">
	            		<span>{{ $user[0]->experiences[0]->designation }}</span>
	            		<input class="form-control hide" name="user[designation]" id="designation" value="{{ $user[0]->experiences[0]->designation }}">
	           			<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
	            	</h2>
	            	<h3 class="user-orgname">
	            		Arbejder hos : <span>{{ $user[0]->experiences[0]->orgName }}</span>
	            		<input class="form-control hide" name="user[orgName]" id="orgName" value="{{ $user[0]->experiences[0]->orgName }}">
	           			<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
	            	</h3>
	            @endif
	            @if(count($user[0]->trainings) > 0)
	            	<h4 class="user-trainingname">
	            		Uddannelse : <span>{{ $user[0]->trainings[0]->name }}</span>
	            		<input class="form-control hide" name="user[trainingName]" id="trainingName" value="{{ $user[0]->trainings[0]->name }}">
	           			<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
	            	</h4>
	            @endif
	          </div>
	          
	          <ul>
	           <li><img src="{{ asset('images/forbidensor_profile.png') }}">{{ count($connections) }} forbindelser</li>
	           <li><img src="{{ asset('images/anmeld_heart_profile.png') }}">{{ count($user[0]->reviews) or 0 }} anmeldelser</li>
	           @if(Auth::user()->businessLink)
	           	<li class="user-businessLink">
	           		<img src="{{ asset('images/create_it_profile.png') }}">
	           		<span>{{ Auth::user()->businessLink }}</span>
	           		<input class="form-control hide" name="businessLink" id="businessLink" value="{{ Auth::user()->businessLink }}">
	           		<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
	           	</li>
	           @endif
	           @if(Auth::user()->city)
	           	<li class="user-city">
	           		<img src="{{ asset('images/koben_profile.png') }}">
	           		<span>{{ Auth::user()->city }}</span>
	           		<input class="form-control hide" name="city" id="city" value="{{ Auth::user()->city }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#usercity"><i class="fa fa-pencil"></i></a>
	           	</li>
	           @endif
				<li>
					<img src="{{ asset('images/tilmel_profile.png') }}">
					Tilmeldt {{ dateMonthLocale(Auth::user()->createdAt->format('F')) }} {{ Auth::user()->createdAt->format('Y') }}
				</li>
	           	<li class="user-address">
					<p class="text-uppercase text-var">Adresse</p>
	           		<span>{{ Auth::user()->address == '' ? 'ingen Adresse' : Auth::user()->address }}</span>
	           		<input class="form-control hide" name="address" id="address" value="{{ Auth::user()->address }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#useraddress"><i class="fa fa-pencil"></i></a>
	           	</li>
				
				<li class="user-phone1">
					<p class="text-uppercase text-var">Telefon</p>
	           		<span>{{ Auth::user()->phone1 == '' ? 'ingen telefon' : Auth::user()->phone1 }}</span>
	           		<input class="form-control hide" name="phone1" id="phone1" value="{{ Auth::user()->phone1 }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#userphone1"><i class="fa fa-pencil"></i></a>
	           	</li>
	           	
	           	<li class="user-cvr">
					<p class="text-uppercase text-var">CVR</p>
	           		<span>{{ Auth::user()->cvr == '' ? 'ingen cvr' : Auth::user()->cvr }}</span>
	           		<input class="form-control hide" name="cvr" id="cvr" value="{{ Auth::user()->cvr }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#usercvr"><i class="fa fa-pencil"></i></a>
	           	</li>
				
	           	<li class="user-skype">
					<p class="text-uppercase text-var">Skype</p>
	           		<span>{{ Auth::user()->skype == '' ? 'ingen skype' : Auth::user()->skype }}</span>
	           		<input class="form-control hide" name="skype" id="skype" value="{{ Auth::user()->skype }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#userskype"><i class="fa fa-pencil"></i></a>
	           	</li>

	           	<li class="user-twitter">
					<p class="text-uppercase text-var">Twitter</p>
	           		<span>{{ Auth::user()->twitter == '' ? 'ingen twitter' : Auth::user()->twitter }}</span>
	           		<input class="form-control hide" name="twitter" id="twitter" value="{{ Auth::user()->twitter }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#usertwitter"><i class="fa fa-pencil"></i></a>
	           	</li>

	           	<li class="user-facebook">
					<p class="text-uppercase text-var">Facebook</p>
	           		<span>{{ Auth::user()->facebook == '' ? 'ingen facebook' : Auth::user()->facebook }}</span>
	           		<input class="form-control hide" name="facebook" id="facebook" value="{{ Auth::user()->facebook }}">
	           		<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#userfacebook"><i class="fa fa-pencil"></i></a>
	           	</li>
	          </ul>
	          
	          <?php //TODO "Contact information" button ?>
	          <div class="Send_en_meddelse">
	          	<button type="submit" name="update" class="btn-link" style="width: unset;font-size: inherit;">Gem ændringer</button>
	          </div>
	         </div>
	        </div>
	        
			<!--        // Center column -->
			<div class="col-md-6 col-sm-6 col-xs-12">
	        	<div class="col-xs-12" style="height:50px;"></div>
	        	<ul id="sortable">
	        	
	          		<div id="beskrivelse" class="ui-state-default Beskrivelse_section_profile">
		           <h1>
		           		<img src="{{ asset('images/bescrivels.png') }}"><div class="besk">Beskrivelse</div>
		           		@if(!Auth::user()->description)
		           			<small class="add-description pull-right "><i class="fa fa-plus"></i> Tilføj Beskrivelse</small>
		           		@endif
		           		
		           </h1>
                   <div class="add-sort-button">
		           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
	           			</div>
		           
		           <div class="user-description">
		           		@if(Auth::user()->description)
		           			<span>{!! nl2br(Auth::user()->description) !!}</span>
		           			<textarea class="form-control hide" name="description" id="" rows="8">{{ Auth::user()->description }}</textarea>
		           			<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
		           		@else
		           			<span class="not-alert">Ingen Beskrivelse</span>
		           			<textarea class="form-control hide" name="description" id="" rows="8">{{ Auth::user()->description }}</textarea>
		           		@endif
		           </div>
	           
	          </div>
		        
		        
	          
	          		<!-- Projects section -->
	          	  <div id="projekter" class="ui-state-default Projekter_section">
		            <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0 !important;">
                    <h1>
		            	<img src="{{ asset('images/projecktor.png') }}">Projekter
		            	
		            	
		            </h1>
                    <div class="add-sort-button">
                    
                           <div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
		           			<small class="add-new pull-right" data-toggle="modal" data-target="#add-project"><i class="fa fa-plus"></i> Tilføj Projekter</small>
		           			
	           		</div>
                   </div>
		            @forelse($user[0]->projects as $project)
			            <div class="col-md-6 col-sm-6 col-xs-12 Projekter_section_left user-project project-{{ $project->id }}">
			              <p><img src="{{ asset('uploads/' . $project->logo) }}" style="width:80px;"></p>
			              <h5 class="project-cat">
			              	<div>{{ $project->category->categoryName }}</div>
			              </h5>
			              <h1 class="project-title">
			              	<div>{{ $project->title }}</div>
			              	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-project-{{ $project->id }}"><i class="fa fa-pencil"></i></a>
			              </h1>
			              <?php /*
			              <span><img src="{{ asset('images/greater_icon.png') }}">Se projektet her</span>
			              */ ?>
			            </div>
			            
			            <!-- //User Project modal -->
			           <div class="modal fade user-pro" id="user-project-{{ $project->id }}" data-projectid="{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="add-projectLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	<input type="hidden" name="project[id]" id="project-id-{{ $project->id }}" class="form-control" value="{{ $project->id }}" />
						      	<div class="form-horizontal">
						      		<div class="form-group">
						      			<label class="col-md-2">Titel</label>
						      			<div class="col-md-10">
						      				<input type="text" name="project[title]" id="project-title-{{ $project->id }}" class="form-control" value="{{ $project->title }}" />
						      			</div>
						      		</div>						      		
						      		<div class="form-group">
						      			<label class="col-md-2">Logo</label>
						      			<div class="col-md-10">
						      				<img width="75" id="project-img-{{ $project->id }}" src="{{ asset('uploads/' . $project->logo) }}" />
						      				<input type="file" name="project[logo]" id="project-logo-{{ $project->id }}" class="project-logo" accept="image/*" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Category</label>
						      			<div class="col-md-10">
						      				<select name="project[category]" id="project-category-{{ $project->id }}" class="form-control">
						      					<option value="">SELECT</option>
						      					@foreach($categories as $category)
						      						<option @if($category->id == $project->category->id) {{ 'selected="selected"' }} @endif value="{{ $category->id }}">{{ $category->categoryName }}</option>
						      					@endforeach
						      				</select>
						      			</div>
						      		</div>
						      		<!-- <div class="form-group">
						      			<label class="col-md-2">Start – Slutdato</label>
						      			<div class="col-md-5">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input type="text" name="project[startDate]" id="project-startDate-{{ $project->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $project->startDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      				</div>
						      			</div>
						      			<div class="col-md-5">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input type="text" name="project[endDate]" id="project-endDate-{{ $project->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $project->endDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      				</div>
						      			</div>
						      		</div> -->
						      	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
						      </div>
						    </div>
						  </div>
			          </div>
			        @empty
			        	<div class="not-alert ">Ingen Projekter</div>
			        @endforelse
		          </div>
		          
		          <!-- //User Project modal -->
		           <div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="add-projectLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Tilføj Projekter</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-horizontal">
					      		<div class="form-group">
					      			<label class="col-md-2">Titel</label>
					      			<div class="col-md-10">
					      				<input type="text" name="title" id="title" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Logo</label>
					      			<div class="col-md-10">
					      				<input type="file" name="logo" id="logo" accept="image/*" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Category</label>
					      			<div class="col-md-10">
					      				<select name="category" id="category" class="form-control">
					      					<option value="">SELECT</option>
					      					@foreach($categories as $category)
					      						<option value="{{ $category->id }}">{{ $category->categoryName }}</option>
					      					@endforeach
					      				</select>
					      			</div>
					      		</div>
					      		<!-- <div class="form-group">
					      			<label class="col-md-2">Start – Slutdato</label>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input type="text" name="startDate" id="startDate" class="form-control" placeholder="DD/MM/YYYY" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input type="text" name="endDate" id="endDate" class="form-control" placeholder="DD/MM/YYYY" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      		</div> -->
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
					      </div>
					    </div>
					  </div>
		          </div>
		        
		        
	          		<!-- Certifications section -->
		          <div id="certificeringer" class="ui-state-default Certificeringer_section">
		           <h1>
		           	<img src="{{ asset('images/certifingers_icon.png') }}">Certificeringer
		           	
		           
		           </h1>
                   	<div class="add-sort-button">
	           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
                        <small class="add-new pull-right" data-toggle="modal" data-target="#add-certificate"><i class="fa fa-plus"></i> Tilføj Certificeringer</small>
           			</div>
		           
		           @forelse($user[0]->certifications as $certification)
		            <div class="BestinDesign">
		             <div class="col-md-5 col-sm-9 col-xs-12 user-certification cert-{{ $certification->id }}">
		              <h2 class="cert-name">
		              	<div>{{ $certification->certName }}</div>
		              </h2>
		              <div class="cert-org">
		              	<span>{{ $certification->certOrg }}</span>
		              </div>
		              <a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-certification-{{ $certification->id }}"><i class="fa fa-pencil"></i></a>
		              	<h3 class="cert-date text-capitalize"><p style="text-transform: capitalize;display:inline">Startdato:</p> {{ dateMonthLocale($certification->certDate->format('F')) }} {{ $certification->certDate->format('Y') }}</h3>
		             </div>
		             
		              <div class="col-md-7 col-sm-3 col-xs-12">
		               <div class="certificeringes_img"> <img src="{{ asset('uploads/' . $certification->certLogo) }}" height="60" width="230"></div>
		              </div>
		            </div>
		            
		            <!-- //Edit User Certificae modal -->
		           <div class="modal fade user-cert" id="user-certification-{{ $certification->id }}" data-certid="{{ $certification->id }}" tabindex="-1" role="dialog" aria-labelledby="add-certificationLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Change</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-horizontal">
					      		<input type="hidden" name="certificate[id]" id="certificate-id-{{ $certification->id }}" class="form-control" value="{{ $certification->id }}" />
					      		<div class="form-group">
					      			<label class="col-md-2">Name</label>
					      			<div class="col-md-10">
					      				<input type="text" name="certificate[certName]" id="certificate-certName-{{ $certification->id }}" class="form-control" value="{{ $certification->certName }}" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Virksomhed</label>
					      			<div class="col-md-10">
					      				<input name="certificate[certOrg]" id="certificate-certOrg-{{ $certification->id }}" class="form-control" value="{{ $certification->certOrg }}" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Logo</label>
					      			<div class="col-md-10">
					      				<img id="certificate-img-{{ $certification->id }}" width="75" src="{{ asset('uploads/' . $certification->certLogo) }}" />
					      				<input type="file" name="certificate[certLogo]" id="certificate-logo-{{ $certification->id }}" accept="image/*" >
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Dato</label>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input name="certificate[certDate]" id="certificate-certDate-{{ $certification->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $certification->certDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      		</div>
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
					      </div>
					    </div>
					  </div>
		          </div>
		           @empty
		           <br/>
		           	<div class="not-alert text-left">Ingen Certificeringer</div>
		           @endforelse
		          </div>
		          
		          <!-- //User Certificate modal -->
		           <div class="modal fade" id="add-certificate" tabindex="-1" role="dialog" aria-labelledby="add-certificateLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Tilføj Certificeringer</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-horizontal">
					      		<div class="form-group">
					      			<label class="col-md-2">Titel</label>
					      			<div class="col-md-10">
					      				<input name="certName" id="certName" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Virksomhed</label>
					      			<div class="col-md-10">
					      				<input name="certOrg" id="certOrg" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Logo</label>
					      			<div class="col-md-10">
					      				<input type="file" name="certLogo" id="certLogo" accept="image/*" >
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Dato</label>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input name="certDate" id="certDate" class="form-control" placeholder="DD/MM/YYYY" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      		</div>
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
					      </div>
					    </div>
					  </div>
		          </div>
		        
	          
	          		<!-- Experiences section -->
	          	  <div id="erfaring" class="ui-state-default Erfaring_section">
		            <h1>
		            	<img src="{{ asset('images/erfaring.png') }}">Erfaring
		            	
		            	
		            </h1>
                    <div class="add-sort-button">
		           			
		           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
                            <small class="add-new pull-right" data-toggle="modal" data-target="#add-experience"><i class="fa fa-plus"></i> Tilføj Erfaring</small>
	           			</div>
		            
		            @forelse($user[0]->experiences as $k=>$experience)
			            <div class="col-md-6 col-sm-6 col-xs-12 padd_erfaring user-experience ex-{{ $experience->id }}" @if(is_float($k/2)) {!! 'style="padding-right:0;"' !!} @endif >
			             <div class="Erfaring_section_left">
			              <h2 class="ex-designation">
			              	<div style="height:40px;width:150px;">{{ $experience->designation }}</div>
			              	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-experience-{{ $experience->id }}"><i class="fa fa-pencil"></i></a>
			              </h2>
			              <div class="ex-orgname">
			              	<span>{{ $experience->orgName }}</span>
			              	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-experience-{{ $experience->id }}"><i class="fa fa-pencil"></i></a>
			              </div>
			              <div class="ex-description">
			              	<p>{{ $experience->description }}</p>
			              	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-experience-{{ $experience->id }}"><i class="fa fa-pencil"></i></a>
			              </div>
						<!-- 	              TODO Recommendation count -->
			              <h3><img src="{{ asset('uploads/' . $experience->logo) }}" height="60px;"></h3>
			              </div>
			              <div class="july_date_erfaring">
			                <p>
			                	<img src="{{ asset('images/juli_erfaring_icon.png') }}">
			                	<span class="ex-dates">{{ dateMonthLocale($experience->startDate->format('F')) }} {{ $experience->startDate->format('Y') }} – i dag
			                	@if($experience->end_date_identifier == 0)
			                		({{ dateDiff($experience->startDate, $experience->endDate) }})
			                	@else
			                		(Arbejder i øjeblikket)
			                		@endif
			                		</span>
			                </p>
			                <span class="ex-city">{{ $experience->city }}</span>, <span class="ex-country">{{ $experience->country }}</span>
			                <a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-experience-{{ $experience->id }}"><i class="fa fa-pencil"></i></a>
			              </div>
			            </div>
			            
			            <!-- //Edit User Experience modal -->
			           <div class="modal fade user-exp" id="user-experience-{{ $experience->id }}" data-exid="{{ $experience->id }}" tabindex="-1" role="dialog" aria-labelledby="userexperienceLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-horizontal">
						      		<input name="experience[id]" id="experience-id-{{ $experience->id }}" class="form-control" value="{{ $experience->id }}" type="hidden">
						      		<div class="form-group">
						      			<label class="col-md-2">Titel</label>
						      			<div class="col-md-10">
						      				<input name="designation" id="experience-designation-{{ $experience->id }}" class="form-control" value="{{ $experience->designation }}" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Virksomhed</label>
						      			<div class="col-md-10">
						      				<input name="orgName" id="experience-orgName-{{ $experience->id }}" class="form-control" value="{{ $experience->orgName }}" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Beskrivelse</label>
						      			<div class="col-md-10">
						      				<textarea rows="4" maxlength="150" name="experience[description]" id="experience-description-{{ $experience->id }}" class="form-control" >{{ $experience->description }}</textarea>
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Logo</label>
						      			<div class="col-md-10">
						      				<img id="experience-img-{{ $experience->id }}" width="75" src="{{ asset('uploads/' . $experience->logo) }}" />
						      				<input type="file" name="logo" id="experience-logo-{{ $experience->id }}" accept="image/*" >
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Start – Slutdato</label>
						      			<div class="col-md-5">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input name="startDate" id="experience-startDate-{{ $experience->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $experience->startDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      				</div>
						      			</div>
						      			<div class="col-md-5">
						      				<div class="working_here" onclick="change_status()">I øjeblikket arbejder her</div>
						      				<div class="input-group date end-cal {{$experience->end_date_identifier == 0 ? '' : 'hide'}}">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												
						      					<input name="endDate" id="experience-endDate-{{ $experience->id }}" class="form-control " placeholder="DD/MM/YYYY" value="{{ $experience->endDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      					
						      					
						      					<input type="hidden" name="edi" value="{{ $experience->end_date_identifier }}" />
						      				</div>
					      					<div class="hide" style="padding: 7px;border: 1px solid #ccc;border-radius: 5px;background: rgba(204, 204, 204, 0.64);" class="{{$experience->end_date_identifier == 0 ? 'hide' : ''}} " id="working_cal">
    											<span style="padding: 0px 9px 0px 6px;" ><i class="fa fa-calendar"></i></span>
					      						I øjeblikket arbejder her
					      					</div>
						      			</div>
						      		</div>
						      		<script type="text/javascript">
						      			
						      		</script>
						      		<div class="form-group">
						      			<label class="col-md-2">By - Land</label>
						      			<div class="col-md-5">
						      				<input name="experience[city]" id="experience-city-{{ $experience->id }}" class="form-control" placeholder="By" value="{{ $experience->city }}" />
						      			</div>
						      			<div class="col-md-5">
						      				<input name="country" id="experience-country-{{ $experience->id }}" class="form-control" placeholder="Land" value="{{ $experience->country }}" />
						      			</div>
						      		</div>
						      	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
						      </div>
						    </div>
						  </div>
						</div>
		            
		            @empty
		            	<div class="not-alert" style=" clear: both;    padding: 1em;"><p class="text-center">Ingen Erfaringer</p></div>
		            @endforelse
		            
		            
		          </div>
		          
		          <!-- //User Experience modal -->
		           <div class="modal fade" id="add-experience" tabindex="-1" role="dialog" aria-labelledby="add-experienceLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Tilføj Erfaring</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-horizontal">
					      		<div class="form-group">
					      			<label class="col-md-2">Titel</label>
					      			<div class="col-md-10">
					      				<input name="designation" data-parsley-required id="designation" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Virksomhed</label>
					      			<div class="col-md-10">
					      				<input name="orgName" data-parsley-required id="orgName" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Beskrivelse</label>
					      			<div class="col-md-10">
					      				<textarea rows="4" maxlength="150" name="experience[description]" id="description" class="form-control" ></textarea>
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Logo</label>
					      			<div class="col-md-10">
					      				<input type="file" name="logo" id="logo" accept="image/*" >
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Start – Slutdato</label>

					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input name="startDate" id="startDate" class="form-control" placeholder="Start Dato" />
					      				</div>
					      			</div>
					      			<div class="col-md-5">
					      				<div class="working_here" onclick="change_status('new')">I øjeblikket arbejder her</div>
					      				<div class="input-group date end-cal-new">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											
					      					<input name="endDate" id="endDate" class="form-control" placeholder="End Dato" onblur="isValidDate(this)" />
					      					<input type="hidden" name="edi_new" value="0" />
					      				</div>

				      					<div style="padding: 7px;border: 1px solid #ccc;border-radius: 5px;background: rgba(204, 204, 204, 0.64);" class="{{isset($experience) && $experience->end_date_identifier == 0 ? 'hide' : ''}} " id="working_cal_new">
											<span style="padding: 0px 9px 0px 6px;" ><i class="fa fa-calendar"></i></span>
				      						I øjeblikket arbejder her
				      					</div>
					      			</div>

					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">By - Land</label>
					      			<div class="col-md-5">
					      				<input name="experience[city]" id="city" class="form-control" placeholder="By" />
					      			</div>
					      			<div class="col-md-5">
					      				<input name="country" id="country" class="form-control" placeholder="Land" />
					      			</div>
					      		</div>
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
					      </div>
					    </div>
					  </div>
		          </div>
	          
	         	<?php //TODO Recommendations(Anbefalinger) section ?>
		 		<?php //TODO competencies(Kompetencer) section ?>
				
				<!-- Trainings section -->
				<div id="uddannelse" class="ui-state-default Uddannelse_section">
		            <h1>
		            	<img src="{{ asset('images/udanalse.png') }}">Uddannelse
		            	
		            	
		            </h1>
                    <div class="add-sort-button">
		           			
		           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
                            <small class="add-new pull-right" data-toggle="modal" data-target="#add-training"><i class="fa fa-plus"></i> Tilføj Uddannelse</small>
	           			</div>
		            @forelse($user[0]->trainings as $training)
			            <div class="Uddannelse_business_sec user-training taining-{{ $training->id }}">
				             <div class="col-md-9 col-sm-9 col-xs-12">
					              <h2 class="train-name">{{ $training->name }}</h2>
					              <h6 class="train-tagline">{{ $training->tagLine }}</h6>
					              <a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#user-training-{{ $training->id }}"><i class="fa fa-pencil"></i></a>
					              <h3 class="train-dates">{{ $training->startDate->format('Y') }} – {{ $training->endDate->format('Y') }}</h3>
				             </div>
				             <div class="col-md-3 col-sm-3 col-xs-12 Uddannelse_section_right">
				              	<img src="{{ asset('uploads/' . $training->logo) }}" height="60px;">
				             </div>
			            </div>
			            
			            <!-- //Edit User Training modal -->
			           <div class="modal fade user-train" id="user-training-{{ $training->id }}" data-trainid="{{ $training->id }}" tabindex="-1" role="dialog" aria-labelledby="usertrainingLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-horizontal">
						      		<input name="training[id]" id="training-id-{{ $training->id }}" class="form-control" value="{{ $training->id }}" type="hidden">
						      		<div class="form-group">
						      			<label class="col-md-2">Uddannelsessted</label>
						      			<div class="col-md-10">
						      				<input type="text" name="name" id="training-name-{{ $training->id }}" class="form-control" value="{{ $training->name }}" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Logo</label>
						      			<div class="col-md-10">
						      				<img id="training-img-{{ $training->id }}" width="75" src="{{ asset('uploads/' . $training->logo) }}" />
						      				<input type="file" name="logo" id="training-logo-{{ $training->id }}" accept="image/*" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Uddannelse</label>
						      			<div class="col-md-10">
						      				<input type="text" name="tagLine" id="training-tagLine-{{ $training->id }}" class="form-control" value="{{ $training->tagLine }}" />
						      			</div>
						      		</div>
						      		<div class="form-group">
						      			<label class="col-md-2">Start – Slutdato</label>
						      			<div class="col-md-5">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input name="startDate" id="training-startDate-{{ $training->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $training->startDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      				</div>
						      			</div>
						      			<div class="col-md-5">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input name="endDate" id="training-endDate-{{ $training->id }}" class="form-control" placeholder="DD/MM/YYYY" value="{{ $training->endDate->format('d/m/Y') }}" onblur="isValidDate(this)" />
						      				</div>
						      			</div>
						      		</div>
						      	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
						      </div>
						    </div>
						  </div>
						</div>
			        @empty
			        	<div class="not-alert" style=" clear: both;    padding: 1em;"><p class="text-center">Ingen Uddannelse</p></div>
		            @endforelse
			        	
		        </div>
		        
		        <!-- //User Training modal -->
		           <div class="modal fade" id="add-training" tabindex="-1" role="dialog" aria-labelledby="add-trainingLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Tilføj Uddannelse</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-horizontal">
					      		<div class="form-group">
					      			<label class="col-md-2">Uddannelsessted</label>
					      			<div class="col-md-10">
					      				<input type="text" name="name" id="name" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Logo</label>
					      			<div class="col-md-10">
					      				<input type="file" name="logo" id="logo" accept="image/*" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Uddannelse</label>
					      			<div class="col-md-10">
					      				<input type="text" name="tagLine" id="tagLine" class="form-control" />
					      			</div>
					      		</div>
					      		<div class="form-group">
					      			<label class="col-md-2">Start – Slutdato</label>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input name="startDate" id="startDate" class="form-control" placeholder="DD/MM/YYYY" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      			<div class="col-md-5">
					      				<div class="input-group date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					      					<input name="endDate" id="endDate" class="form-control" placeholder="DD/MM/YYYY" onblur="isValidDate(this)" />
					      				</div>
					      			</div>
					      		</div>
					      	</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Gem ændringer</button>
					      </div>
					    </div>
					  </div>
		          </div>
	          
				<?php //TODO Compounds(Forbindelser) section ?>    
			
				<div id="forbindelser" class="ui-state-default Forbindelser_section">
		            <h1>
		            	<img src="{{ asset('images/forbindelsor_icon.png') }}">Forbindelser
		            	
		            </h1>
                    <div class="add-sort-button">
		           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
	           			</div>
		            <div id="forbindelser-carousel" class="carousel slide" data-ride="carousel">
		            	<div class="Forbindelser_inner_section">
		             	
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
				             	@foreach($user[0]->friends as $k => $con)
				             		@if($con->pivot->status != 0)
				             			<?php $k = $k + 1; ?>
					             		<?php 
					             			if($k%10 == 1){ 
					             				echo '<div class="item';
					             				if($k == 1) echo ' active';
					             				echo '">';
					             			}
					             		?>
						             		{!! $k%2 != 0 ? '<div class="col-md-12 no-padding">' : '' !!}
							             		<div class="col-md-6 col-sm-6 col-xs-12 padd_ina_rosen_section{{ $con->pivot->status == 0 ? ' pending' : '' }}">
									              <div class="ina_rosen_section">
									               <div class="col-md-3 col-sm-3 col-xs-12 padd_ina_rosen_section"> 
									                <span>
									                	<img width="60" class="img-circle" src="{{ profile_image_link($con->profilePic, 60, 60) }}">
									                	{!! $con->pivot->status == 2 ? '<span class="label label-warning">Afventer</span>' : '' !!}
									                </span>
									               </div>
									               <div class="col-md-9 col-sm-9 col-xs-12 padd_ina_rosen_section_right"> 
									                <h2><a href="{{ url('profile/user/' . $con->id) }}">{{ $con->fName }} {{ $con->lName }}</a> 
									                	@if($con->pivot->status == 1)
									                		@if($con->phone1) ({{ $con->phone1 }}) @endif
									                	@endif
									                </h2>
									                <p>{{ $con->jobTitle }}</p>
									                @if($con->pivot->user_id == Auth::user()->id && $con->pivot->status == 2)
									                	<a href="{{ url('profile/accept/' . $con->pivot->follower_id) }}" class="btn-link accept-pending" title="Accept">Godkend</a>
									                	<a href="{{ url('profile/deny/' . $con->pivot->follower_id) }}" class="btn-link accept-pending" title="Deny">Afvis</a>
									                @endif
									               </div>
									              </div>
									           </div>
									    	{!! $k%2 == 0 || count($user[0]->friends) == $k ? '</div>' : '' !!}
								    	{!! $k%10 == 0 || count($user[0]->friends) == $k ? '</div>' : '' !!}
					            	@endif
					            @endforeach
		            		</div>
		            	</div>        
		            
			            <div class="forrig_forbidden_section">
						   <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section">
							<a class="left carousel-control" href="#forbindelser-carousel" role="button" data-slide="prev">
								<img src="{{ asset('images/forig_side.png') }}">Forrige side
							</a>
						   </div>
						   <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section text-center">
							<img src="{{ asset('images/forbiden_400.png') }}">{{ count($user[0]->friends) }} forbindelser
						   </div>
						   <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section_4right">
							<a class="right carousel-control" href="#forbindelser-carousel" role="button" data-slide="next">
								<img src="{{ asset('images/naeste_side.png') }}">Næste side
							</a>
						   </div>
						</div>
					</div>
		            
		          </div>
		          
			
				<!-- Reviews section -->
				  	<div id="anmeldeser" class="ui-state-default Anmeldelser_section">
		             <h1><img src="{{ asset('images/anmeldeser.png') }}" />Anmeldelser</h1>
		             
                     <div class="add-sort-button">
		           			<div class="sort-handle"><img src="{{ asset('images/move_icon01.png') }}"></div>
	           			</div>
                        <h2>
		             	<img src="{{ asset('images/anmeldesor_search.png') }}">{{ count($user[0]->reviews) }}
		             	
		             </h2>
		             @forelse($user[0]->reviews as $review)
			             <div class="Anmeldelser_inner_section">
			               <div class="PSD_til_HTML5">
			                <div class="PSD_til_HTML5_left">
			                 <h3>{{ $review->reviewTitle }}</h3>
			                 <span>Opgave løst : {{ dateMonthLocale($review->solutionDate->format('F')) }} {{ $review->solutionDate->format('d') }}, {{ $review->solutionDate->format('Y') }} </span>
			                </div>
			                <div class="PSD_til_HTML5_right">
			                 {!! print_ratting($review->ratting) !!}
			               </div>
			             </div>
			             <div class="Kristian_Wind_section">
			               <div class="col-md-2 col-sm-2 col-xs-12">
			                <img width="48" class="img-circle" src="{{ profile_image_link($review->user->profilePic, 48, 48) }}">
			               </div>
			               <div class="col-md-10 col-sm-10 col-xs-12">
			                <h4>{{ $review->user->fName }} {{ $review->user->lName }}</h4>
			                <?php //TODO tag line ?>
			                <h5></h5>
			                <h6>{{ $review->comment }}</h6>
			                
							<p>Anmeldt for {{ $review->createdAt->diffForHumans() }}</p>
			               </div>
			
			             </div>
			          </div>
			      @empty
			      	<div class="not-alert col-md-12 no-padding">Ingen anmeldelser</div>
		          @endforelse
			          
		        </div>
	          	
			
				</ul>
			</div>
			
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="col-xs-12" style="height:50px;"></div>
	          <div class="Annoncer_interesse_section">
	           <h1>Annoncer der måske har interesse</h1>
	           @foreach($ads as $k => $sad)
	           		<div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 28px;height: 61px !important;">
		            	<?php //<img src="{{ asset('images/logo_left_design.png') }}"> ?>
			            <div class="lego_left_announce">
							<a href="{{ url('ad/' . $sad->id . '/detail') }}">
								<img width="81" src="{{ asset('uploads/' . $sad->adImages[0]->image) }}" width="80px;">
							</a>
						</div>
						<div class="anoune_sec_lego">
						  <span>Annonce</span>
						  <h2>Udbyder : <a href="{{ url('profile/user/' . $sad->user->id) }}">{{ $sad->user->fName }}</a></h2>
						  <h3><a href="{{ url('ad/' . $sad->id . '/detail') }}">{{ $sad->adHeadline }}</a></h3>
						</div>
			       	</div>
	           @endforeach
	          </div>
	          
	          <div class="Du_kunne_section">
	            <h1>Du kunne måske også se andre områder</h1>
	            @foreach($rightCategories as $category)
		            <div class="fotograph_profile_section">
		              <div class="col-sm-2" style="padding: 0">
		              	<a href="{{ url('category/' . $category->slug) }}">
		              		<img width="28" src="{{ asset('uploads/' . $category->categoryIcon) }}">
		              	</a>
		              </div>
		              <div class="col-sm-10" style="padding: 0">
		              	<b><a href="{{ url('category/' . $category->slug) }}">{{ $category->categoryName }}</a></b> {{ count($category->ads) }} tilgængelig
		              </div>
		            </div>
	            @endforeach            
	          </div>
	          
	          @if(count($sugestUsers) > 0)
		          <div class="Andre_kiggede_profile">
		            <h1>Andre kiggede også på disse profiler</h1> 
		            @foreach($sugestUsers as $user)
		            	<div class="Andre_kiggede_inner_profile">
			             <div class="col-md-4 col-sm-4 col-xs-12">
							<img  class="img-circle" src="{{ profile_image_link($user->profilePic, 60, 60) }}">
			             </div>
			             <div class="col-md-8 col-sm-8 col-xs-12">
			               <h2><a href="{{ url('profile/user/' . $user->id) }}">{{ $user->fName }} {{ $user->lName }}</a></h2>
			               @if(isset($user->experiences[0]))
			               	<h3>{{ $user->experiences[0]->designation }}</h3>
			               @endif
			             </div>
			            </div>
				    @endforeach
		          </div>
	          @endif
	          
	        </div>

	        <!---  This is conetect endorsment segment  start -->

			
	        <div id="anbefalinger" class="ui-state-default anbefalinger_section"> 
			    <h1>
		    	<img src="{{ asset('images/erfaring.png') }}">Anbefalinger
		    </h1>            
		    <div class="add-sort-button">
		        <div class="sort-handle pull-right" style="margin-top: -2%;"><img src="{{ asset('images/move_icon01.png') }}"></div>
		        <small class="add-new" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tilføj Anbefalinger</small>
				</div>
				<div style="background-color: #ffffff;height: 340px;">
				    <div class="col-md-12 col-sm-12" style="margin-top: 3%;">
				        <h4>Digital designer - Founder</h4>
				        <span class="anbefalinger_sub_title">LEGO</span>
				    </div>
				    
				    <div class="col-md-2 col-sm-2" style="margin-top: 5%;">
				        <img width="50" class="img-circle" src="{{ asset('images/default-avatar-270x270.png') }}">
				    </div>
				    
				    <div class="col-md-10 col-sm-10" style="margin-top: 5%;">
				        <h5 style="color: #1F618D ;">Torben K. Nielsen</h5>
				        <h5>Business Area Manager Jackon A/S</h5>
				        <p class="anbefalinger_p">I have worked with Rune for about two years at LEGO, and learned a great deal from him. Rune is a hardworking, competent and digital designer, and therefore I can only put forward the best recommendations.</p>
				        <hr />
				        
				        <span class="anbefalinger_span">7. december 2010 : Torben rapporterede til Rune hos LEGO</span>
				    </div>
				    
				</div>
		</div>
				 		
				 		
				 		<?php //TODO competencies(Kompetencer) section ?>
		<div id="kompetencer" class="ui-state-default kompetencer_section"> 
		     <h1>
		    	<img src="{{ asset('images/erfaring.png') }}">Kompetencer
		    </h1>  
		    
		    <div class="add-sort-button">
		        <div class="sort-handle pull-right" style="margin-top: -2%;"><img src="{{ asset('images/move_icon01.png') }}"></div>
		        <small class="add-new" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tilføj Kompetencer</small>
				</div>
				
				<div class="col-md-5 col-sm-5" style="margin-top: 1%;">
				    <span class="kom_span_count">99</span>
				    <span class="kom_span_cat">B2B</span>
				</div>
				
				<div class="col-md-7 col-sm-7">
		    	<div style="width: 100%;" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
		                  <div class="carousel-inner">
		                    <div class="item active">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/e499e4/fff&text=1" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/e477e4/fff&text=2" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/eeeeee&text=3" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/f4f4f4&text=4" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/f566f5/333&text=5" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/f477f4/fff&text=6" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/eeeeee&text=7" class="img-responsive"></a>
		                    </div>
		                    <div class="item">
		                      <a href="#"><img style="float:left;width: 30px; height: 30px;" src="http://placehold.it/500/fcfcfc/333&text=8" class="img-responsive"></a>
		                    </div>
		                  </div>
		                  <a style="margin-left: -16%;" class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="{{ asset('images/left-icon.png') }}" height="20" width="20" /></a>
		                  <a style="padding-left: 8%;" class="right carousel-control" href="#myCarousel" data-slide="next"><img src="{{ asset('images/right-icon.png') }}" height="30" width="30" /></a>
		                </div>
				</div>
		</div>


			<!---  This is conetect endorsment segment  End -->	       
	      </div>
	     </div>
	    </div>
	   </div>
    
    </form>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/jquery.Jcrop.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-ui-1.10.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/site.util.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.are-you-sure.js') }}"></script>
	
	<link href="{{ asset('css/jquery.Jcrop.css') }}" rel="stylesheet">

	</style>
	
	  <script type="text/javascript">

	  
		    $('.input-group.date input').bind('keypress', function(event) {
		        var inputLength = event.target.value.length;
		    	if((event.keyCode >= 48 && event.keyCode <=57)) { 
			        if(inputLength === 2 || inputLength === 5){
			          var thisVal = event.target.value;
			          thisVal += '/';
			          $(event.target).val(thisVal);
			        }

			        if(inputLength === 2 &&  parseInt(event.target.value) > 31){
			        	$(event.target).closest('.modal-footer > button.btn.btn-primary').attr('disabled', 'disabled');
			        	console.log('invalid');
			        } else {
			        	$(event.target).removeAttr('disabled');
			        }

			        if(inputLength === 5){
			        	var five = event.target.value;
			        	if(parseInt(five.substr(3, 4)) > 12){
			        		$(event.target).closest('.modal-footer > button.btn.btn-primary').attr('disabled', 'disabled');
						}
			        	console.log('invalid');
			        } else {
			        	$(event.target).removeAttr('disabled');
			        }

			        if(inputLength >= 10){
			        	return false;
			        }

                }else {
                    return false;
                }

                
		      });
	  	 $(".scroll").click(function(event){
	         event.preventDefault();
	         //calculate destination place
	         var dest=0;
	         if($(this.hash).offset().top > $(document).height()-$(window).height()){
	              dest=$(document).height()-$(window).height();
	         }else{
	              dest=$(this.hash).offset().top;
	         }
	         //go to destination
	         $('html,body').animate({
	         	scrollTop:dest - 225
	         }, 1000,'swing');
	     });

		  $( function() {
		    $( "#sortable" ).sortable({
		    	revert: true,
		    	handle: '.sort-handle',
		    });
		    $( "#draggable" ).draggable({
			      connectToSortable: "#sortable",
			      helper: "clone",
			      revert: "invalid"
		    });
		    //$( "ul, li" ).disableSelection();
		  } );
	  </script>
	
	<script type="text/javascript">
	    $(document).ready(function () {
	    	$('.carousel').carousel({
				interval: false
    		});
		    if(<?php echo  $firstLogin;?> == 1){
				fbq('track', 'CompleteRegistration');
			}
	        
	    });
	</script>
	
	<script type="text/javascript">

	    jQuery(function($){
	
	      // Create variables (in this scope) to hold the API and image size
	      var jcrop_api,
	          boundx,
	          boundy,
	          orignalx,
	          orignaly,
	
	          // Grab some information about the preview pane
	          $preview = $('#preview-pane'),
	          $pcnt = $('#preview-pane .preview-container'),
	          $pimg = $('#preview-pane .preview-container img'),
	
	          xsize = $pcnt.width(),
	          ysize = $pcnt.height();
	
	          $preview1 = $('#preview-pane-1'),
	          $pcnt1 = $('#preview-pane-1 .preview-container'),
	          $pimg1 = $('#preview-pane-1 .preview-container img'),
	
	          xsize1 = $pcnt1.width(),
	          ysize1 = $pcnt1.height();

	          $preview2 = $('#preview-pane-2'),
	          $pcnt2 = $('#preview-pane-2 .preview-container'),
	          $pimg2 = $('#preview-pane-2 .preview-container img'),
	
	          xsize2 = $pcnt2.width(),
	          ysize2 = $pcnt2.height();

	          $preview3 = $('#preview-pane-3'),
	          $pcnt3 = $('#preview-pane-3 .preview-container'),
	          $pimg3 = $('#preview-pane-3 .preview-container img'),
	
	          xsize3 = $pcnt3.width(),
	          ysize3 = $pcnt3.height();
	      
	      
	      $('.change-profile').on('click', function(e){
	        $('#profileImg').click();
	        
	      });
	      
	    function handleFileSelect(evt) {
	      var files = evt.target.files;
	
	        // Loop through the FileList and render image files as thumbnails.
	        for (var i = 0, f; f = files[i]; i++) {
	
	          // Only process image files.
	          if (!f.type.match('image.*')) {
	            continue;
	          }
	
	          var reader = new FileReader();
	
	          // Closure to capture the file information.
	          reader.onload = (function(theFile) {
	            return function(e) {
	              // Render thumbnail.
	              document.getElementById('profile-pic-target').src = e.target.result;
	              document.getElementById('profile-pic-preview').src = e.target.result;
	              document.getElementById('profile-pic-preview-1').src = e.target.result;
	              document.getElementById('profile-pic-preview-2').src = e.target.result;
	              document.getElementById('profile-pic-preview-3').src = e.target.result;
	              document.getElementById('profilePic').src = e.target.result;
	              
	              $('.jcrop-holder img').attr('src', e.target.result).attr('style', '');
	              if(jcrop_api){
	                  $('#profile-pic-target').attr('style', '');
	                  jcrop_api.destroy();
	               }
	
	              $('#profile-pic-target').Jcrop({
	                onChange: updatePreview,
	                onSelect: updatePreview,
	                aspectRatio: xsize / ysize
	              }, function(){
	                // Use the API to get the real image size
	                var bounds = this.getBounds();
	                boundx = bounds[0];
	                boundy = bounds[1];
	                // Store the API in the jcrop_api variable
	                jcrop_api = this;
	
	                var image  = new Image();
	                image.src = e.target.result;
	                image.onload = function () {
	                  orignalx = this.width;
	                  orignaly = this.height;
	                };
	
	                // Move the preview into the jcrop container for css positioning
	                $preview.appendTo(jcrop_api.ui.holder);
	                $preview1.appendTo(jcrop_api.ui.holder);
	                $preview2.appendTo(jcrop_api.ui.holder);
	                $preview3.appendTo(jcrop_api.ui.holder);
	              });
	            };
	          })(f);
	
	          // Read in the image file as a data URL.
	          reader.readAsDataURL(f);
	        }
	      }
	
	      document.getElementById('profileImg').addEventListener('change', handleFileSelect, false);
	
	      function updatePreview(c)
	      {
	        
	
	        if (parseInt(c.w) > 0)
	        {
	          var rx = xsize / c.w;
	          var ry = ysize / c.h;
	
	          var x = ((c.x) * (orignalx / boundx));
	          var y = ((c.y) * (orignaly / boundy));
	          var w = ((c.w) * (orignalx / boundx));
	          var h = ((c.h) * (orignaly / boundy));
	          $('#x').val(x);
	          $('#y').val(y);
	          $('#w').val(w);
	          $('#h').val(h);
	
	          $pimg.css({
	            width: Math.round(rx * boundx) + 'px',
	            height: Math.round(ry * boundy) + 'px',
	            marginLeft: '-' + Math.round(rx * c.x) + 'px',
	            marginTop: '-' + Math.round(ry * c.y) + 'px'
	          });

	          $('.navigation_pages_left #profilePic').css({
	            width: Math.round(rx * boundx) + 'px',
	            height: Math.round(ry * boundy) + 'px',
	            marginLeft: '-' + Math.round(rx * c.x) + 'px',
	            marginTop: '-' + Math.round(ry * c.y) + 'px'
	          });
	
	          var rx1 = xsize1 / c.w;
	          var ry1 = ysize1 / c.h;
	
	          $pimg1.css({
	            width: Math.round(rx1 * boundx) + 'px',
	            height: Math.round(ry1 * boundy) + 'px',
	            marginLeft: '-' + Math.round(rx1 * c.x) + 'px',
	            marginTop: '-' + Math.round(ry1 * c.y) + 'px'
	          });

	          var rx2 = xsize2 / c.w;
	          var ry2 = ysize2 / c.h;
	
	          $pimg2.css({
	            width: Math.round(rx2 * boundx) + 'px',
	            height: Math.round(ry2 * boundy) + 'px',
	            marginLeft: '-' + Math.round(rx2 * c.x) + 'px',
	            marginTop: '-' + Math.round(ry2 * c.y) + 'px'
	          });

	          var rx3 = xsize3 / c.w;
	          var ry3 = ysize3 / c.h;
	
	          $pimg3.css({
	            width: Math.round(rx3 * boundx) + 'px',
	            height: Math.round(ry3 * boundy) + 'px',
	            marginLeft: '-' + Math.round(rx3 * c.x) + 'px',
	            marginTop: '-' + Math.round(ry3 * c.y) + 'px'
	          });
	        }
	      }
	
	      function checkCoords()
	      {
	        if (parseInt($('#w').val())) return true;
	        alert('Please select a crop region then press submit.');
	        return false;
	      };

	      
	
	    });
	
	    
	  </script>
	
	<script type="text/javascript">

		$(document).ready(function(){
			$('.banner_change_link').on('click', function(e){
		        $('#coverPic').click();
		    });
	    });

		function handleCoverSelect(evt) {
			var files = evt.target.files;

		    // Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {

		      // Only process image files.
		      if (!f.type.match('image.*')) {
		        continue;
		      }

		      var reader = new FileReader();

		      // Closure to capture the file information.
		      reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          document.getElementById('profile_banner').src = e.target.result;
		          document.getElementById('profile_banner').style.backgroundImage = "url('"+e.target.result+"')"
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		      setTimeout(function(){
		      	$('.Send_en_meddelse button').trigger('click');
		      }, 3000);
		    }
		  }

		  document.getElementById('coverPic').addEventListener('change', handleCoverSelect, false);

	  $('.user-flname .edit-icon').on('click', function () {
			parent = $('.user-flname');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('div').removeClass('hide');
				parent.find('.user-fname').text(parent.find('input#fName').val());
				parent.find('.user-lname').text(parent.find('input#lName').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('div').addClass('hide');
			}
			
			return false;
		});

		$('.user-jobtitle .edit-icon').on('click', function () {
			parent = $('.user-jobtitle');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-orgname .edit-icon').on('click', function () {
			parent = $('.user-orgname');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-trainingname .edit-icon').on('click', function () {
			parent = $('.user-trainingname');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-businessLink .edit-icon').on('click', function () {
			parent = $('.user-businessLink');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-city .edit-icon').on('click', function () {
			parent = $('.user-city');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-phone1 .edit-icon').on('click', function () {
			parent = $('.user-phone1');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-cvr .edit-icon').on('click', function () {
			parent = $('.user-cvr');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-address .edit-icon').on('click', function () {
			parent = $('.user-address');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-skype .edit-icon').on('click', function () {
			parent = $('.user-skype');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-twitter .edit-icon').on('click', function () {
			parent = $('.user-twitter');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-facebook .edit-icon').on('click', function () {
			parent = $('.user-facebook');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('span').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});

		$('.user-description .edit-icon, .add-description').on('click', function () {
			parent = $('.user-description');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('textarea').addClass('hide');
				parent.find('span').removeClass('hide').html(nl2br(parent.find('textarea').val()));
			}else{
				parent.addClass('opened');
				parent.find('textarea').removeClass('hide');
				parent.find('span').addClass('hide');
			}
			
			return false;
		});


		//start : Project add/edit script. 
		function handleProjectImage(e, id){
			var file = document.getElementById('project-logo-' + id).files[0];
			var reader = new FileReader();
			reader.readAsText(file, 'UTF-8');
			reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          document.getElementById('project-img-' + id).src = e.target.result;
		        };
			})(file);
			reader.readAsDataURL(file);
		}
		
		$('.user-pro').on('shown.bs.modal', function () {
			var modal = $(this);
			var id = $(this).attr('data-projectid');
			
			//
			document.getElementById('project-logo-' + id).addEventListener('change', function(e){ handleProjectImage(e, id); }, false);
			//
		});
		
		$('.user-pro').on('hidden.bs.modal', function () {
			
			var modal = $(this);
			var id = $(this).attr('data-projectid');
			
			$('.project-' + id).find('.project-title div').text(modal.find('#project-title-' + id).val());
			$('.project-' + id).find('.project-cat div').text(modal.find('#project-category-' + id + ' > option:selected').text());

			var token = $('[name="_token"]').val();
			var imgsrc = '';

			var dataimg = new FormData();
		    dataimg.append('id', modal.find('#project-id-' + id).val());
		    dataimg.append('title', modal.find('#project-title-' + id).val());
		    dataimg.append('logo_extention', modal.find('#project-img-' + id).attr('data-extension'));
			if(typeof(modal.find('#project-logo-' + id)[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#project-logo-' + id)[0].files[0]);
			}
		    dataimg.append('description', modal.find('#project-description-' + id).val());
		    dataimg.append('category_id', modal.find('#project-category-' + id).val());
		    dataimg.append('startDate', modal.find('#project-startDate-' + id).val());
		    dataimg.append('endDate', modal.find('#project-endDate-' + id).val());
			
			$.ajax({
				url: "{{ url('profile/project/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});

		$('#add-project').on('hidden.bs.modal', function () {

			var modal = $(this);
			var token = $('[name="_token"]').val();
			
			var dataimg = new FormData();
			dataimg.append('user_id', {{ Auth::user()->id }});
		    if(modal.find('#title').val() == ''){
		    	return false;
		    }
		    dataimg.append('title', modal.find('#title').val());
			if(typeof(modal.find('#logo')[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#logo')[0].files[0]);
			}
		    dataimg.append('description', modal.find('#description').val());
		    dataimg.append('category_id', modal.find('#category').val());
		    dataimg.append('startDate', modal.find('#startDate').val());
		    dataimg.append('endDate', modal.find('#endDate').val());
			
			$.ajax({
				url: "{{ url('profile/project/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});
		//end 

		//start : Certifications add/edit script.
		function handleCertificateImage(e, id){
			var file = document.getElementById('certificate-logo-' + id).files[0];
			var reader = new FileReader();
			reader.readAsText(file, 'UTF-8');
			reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          document.getElementById('certificate-img-' + id).src = e.target.result;
		        };
			})(file);
			reader.readAsDataURL(file);
		}
		
		$('.user-cert').on('shown.bs.modal', function () {
			var modal = $(this);
			var id = $(this).attr('data-certid');
			
			//
			document.getElementById('certificate-logo-' + id).addEventListener('change', function(e){ handleCertificateImage(e, id); }, false);
			//
		});
		
		$('.user-cert').on('hidden.bs.modal', function () {
			var modal = $(this);
			
			var id = $(this).attr('data-certid');
			$('.cert-' + id).find('.cert-name div').text(modal.find('#certificate-certName-' + id).val());
			$('.cert-' + id).find('.cert-org span').text(modal.find('#certificate-certOrg-' + id).val());
			$('.cert-' + id).find('.cert-date').text('' + modal.find('#certificate-certDate-' + id).val());

			var token = $('[name="_token"]').val();
			var imgsrc = '';

			var dataimg = new FormData();
		    dataimg.append('id', modal.find('#certificate-id-' + id).val());
		    dataimg.append('name', modal.find('#certificate-certName-' + id).val());
		    dataimg.append('org', modal.find('#certificate-certOrg-' + id).val());
		    dataimg.append('logo_extention', modal.find('#certificate-img-' + id).attr('data-extension'));
			if(typeof(modal.find('#certificate-logo-' + id)[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#certificate-logo-' + id)[0].files[0]);
			}
		    dataimg.append('date', modal.find('#certificate-certDate-' + id).val());
			
			$.ajax({
				url: "{{ url('profile/certificate/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});

		$('#add-certificate').on('hidden.bs.modal', function () {

			var modal = $(this);
			var token = $('[name="_token"]').val();
			
			var dataimg = new FormData();
			dataimg.append('user_id', {{ Auth::user()->id }});
			if(modal.find('#certName').val() == ''){
				alert('field required');
				return false;
			}
			dataimg.append('name', modal.find('#certName').val());
		    dataimg.append('org', modal.find('#certOrg').val());
		    if(typeof(modal.find('#certLogo')[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#certLogo')[0].files[0]);
			}
		    dataimg.append('date', modal.find('#certDate').val());
			
			
			
			$.ajax({
				url: "{{ url('profile/certificate/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});
		//end
		
		//start : Experience add/edit script.
		function handleExperienceImage(e, id){
			var file = document.getElementById('experience-logo-' + id).files[0];
			var reader = new FileReader();
			reader.readAsText(file, 'UTF-8');
			reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          document.getElementById('experience-img-' + id).src = e.target.result;
		        };
			})(file);
			reader.readAsDataURL(file);
		}
		
		$('.user-exp').on('shown.bs.modal', function () {
			var modal = $(this);
			var id = $(this).attr('data-exid');
			
			//
			document.getElementById('experience-logo-' + id).addEventListener('change', function(e){ handleExperienceImage(e, id); }, false);
			//
		});
		
		$('.user-exp').on('hidden.bs.modal', function () {
			var modal = $(this);
			
			var id = $(this).attr('data-exid');
			$('.ex-' + id).find('.ex-designation div').text(modal.find('#experience-designation-' + id).val());
			$('.ex-' + id).find('.ex-orgname span').text(modal.find('#experience-orgName-' + id).val());
			$('.ex-' + id).find('.ex-description p').text(modal.find('#experience-description-' + id).val());
			var dates = modal.find('#experience-startDate-' + id).val() + ' - ' + modal.find('#experience-endDate-' + id).val();
			$('.ex-' + id).find('.ex-dates').text(dates);
			$('.ex-' + id).find('.ex-city').text(modal.find('#experience-city-' + id).val());
			$('.ex-' + id).find('.ex-country').text(modal.find('#experience-country-' + id).val());

			var token = $('[name="_token"]').val();
			var imgsrc = '';

			var dataimg = new FormData();
		    dataimg.append('id', modal.find('#experience-id-' + id).val());
		    dataimg.append('designation', modal.find('#experience-designation-' + id).val());
		    dataimg.append('orgName', modal.find('#experience-orgName-' + id).val());
		    dataimg.append('description', modal.find('#experience-description-' + id).val());
			if(typeof(modal.find('#experience-logo-' + id)[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#experience-logo-' + id)[0].files[0]);
			}
			dataimg.append('startDate', modal.find('#experience-startDate-' + id).val());
			dataimg.append('endDate', modal.find('#experience-endDate-' + id).val());
			dataimg.append('city', modal.find('#experience-city-' + id).val());
			dataimg.append('country', modal.find('#experience-country-' + id).val());
			dataimg.append('edi', $('[name="edi"]').val());
			
			$.ajax({
				url: "{{ url('profile/experience/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});

		$('#add-experience').on('hidden.bs.modal', function () {

			var modal = $(this);
			var token = $('[name="_token"]').val();
			
			var dataimg = new FormData();
			dataimg.append('user_id', {{ Auth::user()->id }});
			if(modal.find('#designation').val() == ''){
				return false;
			}
			dataimg.append('designation', modal.find('#designation').val());
		    dataimg.append('orgName', modal.find('#orgName').val());
		    dataimg.append('description', modal.find('#description').val());
			if(typeof(modal.find('#logo')[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#logo')[0].files[0]);
			}
			dataimg.append('startDate', modal.find('#startDate').val());
			dataimg.append('endDate', modal.find('#endDate').val());
			dataimg.append('city', modal.find('#city').val());
			dataimg.append('country', modal.find('#country').val());
			
			$.ajax({
				url: "{{ url('profile/experience/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});
		//end

		//start : Training add/edit script.
		function handleTrainingImage(e, id){
			var file = document.getElementById('training-logo-' + id).files[0];
			var reader = new FileReader();
			reader.readAsText(file, 'UTF-8');
			reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          document.getElementById('training-img-' + id).src = e.target.result;
		        };
			})(file);
			reader.readAsDataURL(file);
		}
		
		$('.user-train').on('shown.bs.modal', function () {
			var modal = $(this);
			var id = $(this).attr('data-trainid');
			
			//
			document.getElementById('training-logo-' + id).addEventListener('change', function(e){ handleTrainingImage(e, id); }, false);
			//
		});
		
		$('.user-train').on('hidden.bs.modal', function () {
			var modal = $(this);
			
			var id = $(this).attr('data-trainid');
			$('.taining-' + id).find('.train-name').text(modal.find('#training-name-' + id).val());
			$('.taining-' + id).find('.train-tagline').text(modal.find('#training-tagLine-' + id).val());
			var dates = modal.find('#training-startDate-' + id).val() + ' - ' + modal.find('#training-endDate-' + id).val();
			$('.taining-' + id).find('.train-dates').text(dates);

			var token = $('[name="_token"]').val();
			var imgsrc = '';
			
			var dataimg = new FormData();
		    dataimg.append('id', modal.find('#training-id-' + id).val());
		    dataimg.append('name', modal.find('#training-name-' + id).val());
		    dataimg.append('tagLine', modal.find('#training-tagLine-' + id).val());
			if(typeof(modal.find('#training-logo-' + id)[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#training-logo-' + id)[0].files[0]);
			}
			dataimg.append('startDate', modal.find('#training-startDate-' + id).val());
			dataimg.append('endDate', modal.find('#training-endDate-' + id).val());
			
			$.ajax({
				url: "{{ url('profile/training/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
		});

		$('#add-training').on('hidden.bs.modal', function () {

			var modal = $(this);
			var token = $('[name="_token"]').val();
			
			var dataimg = new FormData();
			dataimg.append('user_id', {{ Auth::user()->id }});
			if(modal.find('#name').val() == ''){
				return false;
			}
			dataimg.append('name', modal.find('#name').val());
		    dataimg.append('tagLine', modal.find('#tagLine').val());
			if(typeof(modal.find('#logo')[0].files[0]) != 'undefined'){
		    	dataimg.append('logo', modal.find('#logo')[0].files[0]);
			}
			dataimg.append('startDate', modal.find('#startDate').val());
			dataimg.append('endDate', modal.find('#endDate').val());
			
			$.ajax({
				url: "{{ url('profile/training/save') }}",
				type: "POST",
				cache : false,
		        contentType : false,
		        processData: false,
				headers: {'X-CSRF-TOKEN': token},
				data: dataimg
			}).done(function(data) {
				data = $.parseJSON(data);
				setFormSubmitting()
				location.reload();
			});
			
		});
		//end

		//cvr validation
		$('#cvr').on('keypress', function(e){
   			if((e.keyCode >= 48 && e.keyCode <=57)) { 
				// entered key is a number
			}else {
				return false;
			}

			if($(this).val().length >= 8) {
				return false;
			}
   		});

		/**
		*	Set endDate to presently working here
		*
		*	@return void
		*/
   		var change_status = function(type){
			//get value
			if(type == 'new'){
				var curent_status= $('[name="edi_new"]').val();

				if(curent_status == 0){
					var update  = 1;
					$('.end-cal-new').addClass('hide');
					$('#working_cal_new').removeClass('hide');
				} else {
					var update = 0;
					$('.end-cal-new').removeClass('hide');
					$('#working_cal_new').addClass('hide');
				}
				$('[name="edi_new"]').val(update);

			} else {
				var curent_status= $('[name="edi"]').val();
				if(curent_status == 0){
					var update  = 1;
					$('.end-cal').addClass('hide');
					$('#working_cal').removeClass('hide');
				} else {
					var update = 0;
					$('.end-cal').removeClass('hide');
					$('#working_cal').addClass('hide');
				}
				$('[name="edi"]').val(update);
			}


			return ;
		}
	</script>
	<style>
.text-var{
    margin: 0;
    padding: 00;
    font-size: 10px;
    font-weight: 600;
    color: grey;
}

#profilePic{
    padding: 5px;
    background: #ffffff;
    max-height: 180px;
    width: auto !important;
    margin: 11px
}
.user-cvr:hover .edit-icon {
    opacity:1;
}
.working_here{
    text-align: right;
    font-size: 10px;
    position: absolute;
    top: -2em;
    right: 15px;
    cursor: pointer;
    color: #009de0;
}
</style>
@endsection
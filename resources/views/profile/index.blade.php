@extends('layouts.app')

@section('metaTitle', $user[0]->fName . ' ' . $user[0]->lName)

@section('content')
<style type="text/css">
	.innernavigation{margin-top:0 !important;}
</style>
	<div class="profile_banner" style="background-image: url({{ cover_image_link($user[0]->coverPic) }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
      
      			</div>
     		</div>
    	</div>
	</div>
	
	<div class="navigation_pages">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 xol-xs-12">
					<div class="col-md-3 col-sm-3 col-xs-12 navigation_pages_left" style="overflow:visible">
						{{ csrf_field() }}
						<img width="203" height="" src="{{ profile_image_link($user[0]->profilePic) }}">
						<div class="user-favorite-icon" data-user-id="{{ $user[0]->id }}" style="    position: absolute;
    right: 2px;
    top: -10px;
    cursor: pointer;">
			        		<span class="fa-stack fa-lg">
				        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>
				        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>
			        		</span>
			        	 </div>
					</div>
			        <div class="col-md-9 col-sm-9 col-xs-12 navigation_pages_right">
			        	<nav class="navbar navbar-inverse " role="navigation">
			        		<div class="">
			            		<!-- Brand and toggle get grouped for better mobile display -->
					            <!--<div class="navbar-header">
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
					                    <li>
					                        <a class="scroll" href="#anbefalinger">Anbefalinger</a>
					                    </li>
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
       <div class="col-md-12 col-sm-12 col-xs-12">
       	
		<!--        	// Left column -->
        <div class="col-md-3 col-sm-3 col-xs-12">
         <div class="Rune_Petersen_profile_section">
          <div class="rune_vip">
           <h1>{{ $user[0]->fName }} {{ $user[0]->lName }}</h1>
           @if($user[0]->isVip == 1)
           	<span>VIP</span>
           @endif
           <!--<h5>{{ '@'.$user[0]->username }}</h5>-->
           <!-- <pre>
	
           </pre> -->
          </div>
          @if(average_ratting($user[0]->reviews) != 0 )
          	<div class="heart_icon_section">{!! print_ratting(average_ratting($user[0]->reviews)) !!} {{ average_ratting($user[0]->reviews) }}/5</div>
          @else
          	<div class="heart_icon_section">
          		0 Anmeldelser
          	</div>
          @endif
          <div class="Digital_designer_section">
            @if(count($user[0]->experiences) > 0)
            	<h2>Arbejder hos : {{ $user[0]->jobTitle }}</h3>
            	<h3>{{ $user[0]->description }}</h3>
            @endif
            @if(count($user[0]->trainings) > 0)
            	<h4>Uddannelse : {{ $user[0]->trainings[0]->name }}</h4>
            @endif
          </div>
          
          <ul>
           <li><img src="{{ asset('images/forbidensor_profile.png') }}">{{ count($connections) }} forbindelser</li>
           <li><img src="{{ asset('images/anmeld_heart_profile.png') }}">{{ count($user[0]->reviews) or 0 }} anmeldelser</li>
           @if($user[0]->businessLink)
           	<li><img src="{{ asset('images/create_it_profile.png') }}">{{ $user[0]->businessLink }}</li>
           @endif
           @if($user[0]->city)
           	<li><img src="{{ asset('images/koben_profile.png') }}">{{ $user[0]->city }}</li>
           @endif
           <li><img src="{{ asset('images/tilmel_profile.png') }}">Tilmeldt {{ dateMonthLocale($user[0]->createdAt->format('F')) }} {{ $user[0]->createdAt->format('Y') }}</li>
		   
		   <li class="user-address">
					<p class="text-uppercase text-var">Adresse</p>
	           		<span>{{ $user[0]->address == '' ? 'ingen Adresse' : $user[0]->address }}</span>
	           	</li>
				
				<li class="user-phone1">
					<p class="text-uppercase text-var">TELEFONE</p>
	           		<span>{{ $user[0]->phone1  == '' ? 'ingen telefon' : $user[0]->phone1 }}</span>
	           	</li>

	           	<li class="user-cvr">
					<p class="text-uppercase text-var">CVR</p>
	           		<span>{{ $user[0]->cvr == '' ? 'ingen cvr' : $user[0]->cvr }}</span>
	           	</li>
				
	           	<li class="user-skype">
					<p class="text-uppercase text-var">Skype</p>
	           		<span>{{ $user[0]->skype == '' ? 'ingen skype' : $user[0]->skype }}</span>
	           	</li>

	           	<li class="user-twitter">
					<p class="text-uppercase text-var">Twitter</p>
	           		<span>{{$user[0]->twitter == '' ? 'ingen twitter' : $user[0]->twitter }}</span>
	           	</li>

	           	<li class="user-facebook">
					<p class="text-uppercase text-var">Facebook</p>
	           		<span>{{ $user[0]->facebook == '' ? 'ingen facebook' : $user[0]->facebook }}</span>
	           	</li>
          </ul>
          
          <?php //TODO "Send a message" button action  ?>
          @if(in_array($user[0]->id, Auth::user()->friends->pluck('id')->toArray()))
          	<div><a class="Send_en_meddelse" href="{{ url('message#user/' . $user[0]->id) }}">Send en meddelse</a></div>
          @else
          	<div><a class="Send_en_meddelse" href="#" onclick="alert('Not a connection !');return false">Send en meddelse</a></div>
          @endif
          
          <?php //TODO "Contact information" button action ?>
          <!--<div><a class="Kontaktoplysninger" href="#">Kontaktoplysninger</a></div>-->
         </div>
        </div>
        
		<!--        // Center column -->
		<div class="col-md-6 col-sm-6 col-xs-12">
        	<div class="col-xs-12" style="height:50px;"></div>
        	@if($user[0]->description)
	          <div id="beskrivelse" class="Beskrivelse_section_profile">
	           <h1><img src="{{ asset('images/bescrivels.png') }}">Beskrivelse</h1>
	           <span>{!! nl2br($user[0]->description) !!}</span>
	          </div>
	        @endif
          
          	@if(count($user[0]->projects))
	          <div id="projekter" class="Projekter_section">
	            <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0 !important;">
	            	<h1><img src="{{ asset('images/bescrivels.png') }}">Projekter</h1>
	            </div>
	            @foreach($user[0]->projects as $project)
		            <div class="col-md-6 col-sm-6 col-xs-12 Projekter_section_left">
		              <p><img src="{{ asset(Croppa::url('uploads/' . $project->logo, 315, 204)) }}" style="width:100%;"></p>
		              <h5>{{ $project->category->categoryName }}</h5>
		              <h1 class="project-title">{{ $project->title }}</h1>
		              <?php //TODO See Project ?>
		              <!-- <span><img src="{{ asset('images/greater_icon.png') }}">Se projektet her</span> -->
		            </div>
		        @endforeach
	          </div>
			 @else
				<div class="not-alert col-md-12 no-padding">Ingen Projekter</div>
	        @endif
          
          	@if(count($user[0]->certifications))
	          <div id="certificeringer" class="Certificeringer_section">
	           <h1><img src="{{ asset('images/certifingers_icon.png') }}">Certificeringer</h1>
	           
	           @foreach($user[0]->certifications as $certification)
	            <div class="BestinDesign">
	             <div class="col-md-9 col-sm-9 col-xs-12">
	              <h2>{{ $certification->certName }}</h2>
	              <span>{{ $certification->certOrg }}</span>
	              <h3 style="margin-top: 18px;">{{ dateMonthLocale($certification->certDate->format('F')) }} {{ $certification->certDate->format('Y') }}</h3>
	             </div>
	             
	              <div class="col-md-3 col-sm-3 col-xs-12">
	               <div class="certificeringes_img"> <img src="{{ asset(Croppa::url('uploads/' . $certification->certLogo, 100, 60)) }}"></div>
	              </div>
	            </div>
	           @endforeach
	          </div>
			   @else
				<div class="not-alert col-md-12 no-padding">Ingen Certificeringer</div>
	        @endif
          
          	@if(count($user[0]->experiences))
	          <div id="erfaring" class="Erfaring_section">
	            <h1><img src="{{ asset('images/erfaring.png') }}">Erfaring</h1>
	            <div class="drop-experiences">
		            @foreach($user[0]->experiences as $e => $experience)
		            	@if($e < 4)
				            <div class="col-md-6 col-sm-6 col-xs-12 padd_erfaring" style="float: none;display: inline-grid;width: 49%;">
				             <div class="Erfaring_section_left">
				              <h2>{{ $experience->designation }}</h2>
				              <span>{{ $experience->orgName }}</span>
				              <p>{{ $experience->description }}</p>
							<!-- 	              TODO Recommendation count -->
				              <h3>
				              	@if($experience->logo != '')
				              		<img src="{{ asset(Croppa::url('uploads/' . $experience->logo, 100, 60)) }}">
				              	@endif
				              </h3>
				            </div>
				              <div class="july_date_erfaring">
				                <p><img src="{{ asset('images/juli_erfaring_icon.png') }}">{{ dateMonthLocale($experience->startDate->format('F')) }} {{ $experience->startDate->format('Y') }} – i dag
									({{ dateDiff($experience->startDate, $experience->endDate) }})</p>
				                <span>{{ $experience->city }}, {{ $experience->country }}</span>
				              </div>
				            </div>
						
				    	@endif
		            @endforeach
	            </div>
	            @if(count($user[0]->experiences) > 4)
		            <div class="Vis_hele_erfaringen">
		            	<a class="entire-experience" href="{{ url('profile/user/' . $user[0]->id . '/experience') }}"><span>Vis hele erfaringen</span></a>
		            </div>
				 @else
					<div class="not-alert col-md-12 no-padding">Ingen Erfaringer</div>
		        @endif
	            
	          </div>
	        @endif
          
         <?php //TODO Recommendations(Anbefalinger) section ?>
		 <?php //TODO competencies(Kompetencer) section ?>
			@if(count($user[0]->trainings))
			<div id="uddannelse" class="Uddannelse_section">
	            <h1><img src="{{ asset('images/udanalse.png') }}">Uddannelse</h1>
	            @foreach($user[0]->trainings as $training)
		            <div class="Uddannelse_business_sec">
		             <div class="col-md-9 col-sm-9 col-xs-12">
		              <h2>{{ $training->name }}</h2>
		              <h6>{{ $training->tagLine }}</h6>
		              <h3>{{ $training->startDate->format('Y') }} – {{ $training->endDate->format('Y') }}</h3>
		             </div>
		             <div class="col-md-3 col-sm-3 col-xs-12 Uddannelse_section_right">
		              <img src="{{ asset(Croppa::url('uploads/' . $training->logo, 100, 60)) }}">
		             </div>
		            </div>
	            @endforeach
	          </div>
			  @else
					<div class="not-alert col-md-12 no-padding">Ingen Uddannelse</div>
	        @endif
          
		<?php //TODO Compounds(Forbindelser) section ?>     
			
			@if(count($user[0]->friends) > 0)
				<div class="Forbindelser_section">
		            <h1><img src="{{ asset('images/forbindelsor_icon.png') }}">Forbindelser</h1>
		            <div id="forbindelser-carousel" class="carousel slide" data-ride="carousel">
			            <div class="Forbindelser_inner_section">
			            
			            	<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
				             	@foreach($user[0]->friends as $k => $con)
				             		<?php $k = $k + 1; ?>
				             		<?php 
				             			if($k%10 == 1){ 
				             				echo '<div class="item';
				             				if($k == 1) echo ' active';
				             				echo '">';
				             			}
				             		?>
				             			{!! $k%2 != 0 ? '<div class="col-md-12 no-padding">' : '' !!}
						             		<div class="col-md-6 col-sm-6 col-xs-12 padd_ina_rosen_section">
								              <div class="ina_rosen_section">
								               <div class="col-md-3 col-sm-3 col-xs-12 padd_ina_rosen_section"> 
								                <span>
								                	<img width="60" class="img-circle" src="{{ profile_image_link($con->profilePic, 60, 60) }}">
								                </span>
								               </div>
								               <div class="col-md-9 col-sm-9 col-xs-12 padd_ina_rosen_section_right"> 
								                <h2><a href="{{ url('profile/user/' . $con->id) }}">{{ $con->fName }} {{ $con->lName }}</a> ({{ $con->phone1 }})</h2>
								                <p>{{ $con->jobTitle }}</p>
								               </div>
								              </div>
								           </div>
						           		{!! $k%2 == 0 || count($user[0]->friends) == $k ? '</div>' : '' !!}
						           	{!! $k%10 == 0 || count($user[0]->friends) == $k ? '</div>' : '' !!}
					            @endforeach
					        </div>		              		             
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
		    @endif
		     		
          	@if(count($user[0]->reviews))
	          	<div id="anmeldelser" class="Anmeldelser_section">
	             <h1><img src="{{ asset('images/anmeldeser.png') }}" />Anmeldelser</h1>
	             <h2><img src="{{ asset('images/anmeldesor_search.png') }}">{{ count($user[0]->reviews) }}</h2>
	             <div class="drop-reviews">
		             @foreach($user[0]->reviews as $r => $review)
		             	@if($r < 3)
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
			          @endif
		          	@endforeach
		          </div>
	          
				  @if(count($user[0]->reviews) > 3)
			          <div class="Vis_hele_erfaringen">
			          	<a class="entire-review" href="{{ url('profile/user/' . $user[0]->id . '/review') }}"><span>Vis flere anmeldelser</span></a>
			          </div>
			      @endif
	          
	        </div>
          @endif
          	
		</div>
		
		<div class="col-md-3 col-sm-3 col-xs-12">
			<div class="col-xs-12" style="height:50px;"></div>
       	  <div class="Annoncer_interesse_section">
           <h1>Annoncer der måske har interesse</h1>
           @foreach($ads as $k => $sad)
           		<div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
	            	<?php //<img src="{{ asset('images/logo_left_design.png') }}"> ?>
		            <div class="lego_left_announce">
						<a href="{{ url('ad/' . $sad->id . '/detail') }}">
							<img width="81" src="{{ asset(Croppa::url('uploads/' . $sad->adImages[0]->image, 80, 80)) }}">
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
       
      </div>
     </div>
    </div>
   </div>
    
@endsection

@section('scripts')
	<script>
		 $(document).ready(function(e){  

		 	$('.carousel').carousel({
				interval: false
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
							// $('body').append('<div class="favorite alert alert-success">'+data.msg+'</div>');
							setInterval(remove_alert, 1000);
						}
					});
				@else
					alert('Please login to mark favorite.');
				@endif
			});

			$('.entire-experience').on('click', function(e){
				e.preventDefault();
				
				var url = $(this).attr('href');
				$.ajax({
					url: url,
					method: "GET",
				}).done(function(data) {
					$('.drop-experiences').html(data);
				});
			});

			$('.entire-review').on('click', function(e){
				e.preventDefault();
				
				var url = $(this).attr('href');
				$.ajax({
					url: url,
					method: "GET",
				}).done(function(data) {
					$('.drop-reviews').html(data);
				});
			});
			
		});

		 function remove_alert(){
			$('.alert').remove();
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
.Rune_Petersen_profile_section ul li{
	margin-bottom:10px !important;
}
.navigation_pages_left img	{
    padding: 5px;
    background: #ffffff;
    max-height: 180px;
    width: auto !important;
    margin: 11px;
}

</style>
@endsection

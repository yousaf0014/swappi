@extends('layouts.app')

@section('metaTitle', $ad->adHeadline.' - Annonce')

@section('content')
	
	<div class="fotograph_ad_section">
	    <div class="container">
	     <div class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	      
	        <div class="col-md-9 col-sm-9 col-xs-12 fotograph_ad_section_left">
	        
	         <div class="photograph_fhotoshoot">
	           <h1>{{ $ad->adHeadline }}</h1>
	           <ul>
	            <li><img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad->inExchange }}</b></li>
	            <li>Udbyder : {{ $ad->user->fName }} {{ $ad->user->lName }}</li>
	            <li><img src="{{ asset('images/operatted_icon.png') }}">Oprettet den {{ $ad->createdAt->format('d / m-Y') }}</li>
	            <li>
	            	<span class="ad-favorite-icon" data-ad-id="{{ $ad->id }}">
					  	<i class="fa fa-star" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>
					</span>
	            </li>
	           </ul>
	         </div>
	         
	         <div class="slider_fotograph_ad">
	           <div class="col-md-10 col-sm-10 col-xs-12 slider_fotograph_ad_left" id="gal-featured">
	             <img src="{{ asset('uploads/' . $featured) }}" style="width:100%;">
	           </div>
	           <div class="col-md-2 col-sm-2 col-xs-12 slider_fotograph_ad_right">
	           	@foreach($ad->adImages as $image)
	            	<p><a href="#" class="gal-thumb" data-big="{{ asset('uploads/' . $image->image) }}"><img src="{{ asset(Croppa::url('uploads/' . $image->image, 107, 71)) }}" style="width:100%;"></a></p>
	            @endforeach
	           </div>
	         </div>
	         
	         <div class="Annoncer_section">
	           <h1>Annoncer der måske har interesse</h1>
	           @foreach($ads as $k => $ad2)
	           		@if($k < 2)
			           <div class="col-md-6 col-sm-6 col-xs-12">
			            	<?php //<img src="{{ asset('images/logo_left_design.png') }}"> ?>
				            <div class="lego_left_announce">
								<img width="120" src="{{ asset(Croppa::url('uploads/' . $ad2->adImages[0]->image, 120, 120)) }}">
							</div>
							<div class="anoune_sec_lego">
								<div class="anoune_sec_lego_scroll">
								  <span>Annonce</span>
								  <h2>Udbyder : <a href="{{ url('profile/user/' . $ad2->user->id) }}">{{ $ad2->user->fName }}</a></h2>
								  <h3><a href="{{ url('ad/' . $ad2->id . '/detail') }}" class="btn-link">{{ $ad2->adHeadline }}</a></h3>
								</div>
							</div>
			           </div>
			   		@endif
	           @endforeach
	         </div>
	        
	         <div class="Beskrivelse_section">
	           <h1>Beskrivelse</h1>
	           <p>{{ $ad->adDescription }}</p>
	           <h3><a href="{{ url('profile/user/' . $ad->user->id) }}">Kontakt udbyder</a></h3>
	           	@if(Auth::check())
		        	
		           		@if(count($swap) > 0)
		           			@if($swap[0]->status != 3)
				           		@if($swap[0]->swaper->id != Auth::user()->id)
				           			@if($ad->user->id != Auth::user()->id)
				           				<h4 class="swap-done"><a class="swap" href="#" onclick="return false;">SWAP</a></h4>
				           			@endif
					           	@else
					           		@if($swap[0]->ad_swaper_skipped == 0)
					           			<h4 class="swap-done" data-toggle="modal" data-target="#review-modalLabel"><a class="done" href="#" onclick="return false;">Done</a></h4>
					           		@endif
					           	@endif
					           	@if($swap[0]->owner->id == Auth::user()->id)
					           		@if($swap[0]->ad_owner_skipped == 0)
					           			<h4 class="swap-done" data-toggle="modal" data-target="#review-modal"><a class="done" href="#" onclick="return false;">Done</a></h4>
					           		@endif
					           	@endif

					        @else
					           	<h4 class="swap-done"><a class="done" href="#" onclick="alert('Denne annonce er blevet byttet')" >Inaktiv</a></h4>
					           
					        @endif
			        	@else
			        		
				        		@if($ad->user->id != Auth::user()->id)
				        			<h4 class="swap-done"><a class="swap" href="#" onclick="return false;">SWAP</a></h4>
				           		@endif
				           	
			           	@endif
			        
		       	@endif
	         </div>

	         @if(count($swap) > 0)
	         <!-- Review Modal -->
				<div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="review-modalLabel">
				  <div class="modal-dialog modal-md" role="document">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<form class="form" method="POST" action="{{ url('ad/post_review') }}" >
					      	{{ csrf_field() }}
					      	<input type="hidden" name="ad_id" value="{{ $ad->id }}">
					      	@if(Auth::user()->id == $ad->user->id)
					      		<input type="hidden" name="from_user_id" value="{{ $swap[0]->owner->id }}">
					      		<input type="hidden" name="user_id" value="{{ $swap[0]->swaper->id }}">
					      		<input type="hidden" name="owner_reviewed" value="1">
					      	@else
					      		<input type="hidden" name="from_user_id" value="{{ $swap[0]->swaper->id }}">
					      		<input type="hidden" name="user_id" value="{{ $swap[0]->owner->id }}">
					      		<input type="hidden" name="swaper_reviewed" value="1">
					      	@endif
					      	<input type="hidden" name="reviewTitle" value="{{ $ad->adHeadline }}">
					      	<input type="hidden" name="solutionDate" value="{{ date('Y-m-d H:i:s') }}">
					      	<div class="row">
						      	<div class="col-md-12">
						      		<div class="col-md-9">
						      			<h3>{{ $ad->adHeadline }}</h3>
						      			<span>Opgave løst: {{ date('d M Y') }}</span>
						      		</div>
						      		<div class="col-md-3 pull-right">
						      			{!! get_ratting() !!}
						      		</div>
						      	</div>
						    </div>
						    <div class="row">
						      	<div class="col-md-12">
						      		<div class="col-md-2">
						      			<img width="61" class="img-circle" src="{{ asset('uploads/' . Auth::user()->profilePic) }}">
						      		</div>
						      		<div class="col-md-10">
						      			<h4>{{ Auth::user()->fName }} {{ Auth::user()->lName }}</h4>
						      			<div class="email">{{ Auth::user()->email }}</div>
						      			<textarea class="form-control" id="comment" name="comment"></textarea>
						      		</div>
						      	</div>
						    </div>
						    <div class="form-group">
						      	<div class="row">
						      		<div class="col-md-12">
								      	<button type="submit" class="btn btn-primary pull-right" title="Report">Anmeld</button>
								      	<button type="button" id="review-skipped" class="btn btn-default pull-right" data-dismiss="modal" aria-label="Close" title="Skip">Spring over</button>
								    </div>
						      	</div>
						    </div>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
			 @endif
	         
	         <div class="Annoncer_product_section">
	           <h1>Annoncer der kunne være interessante</h1>
	           @foreach($ads as $k => $ad3)
		          <div class="col-md-4 col-sm-4 col-xs-12 Advokat_søges{{ $k+1 == count($ads) ? ' last_col_advocate' : '' }}">
		             <div class="Udbyder_star">
		             	<h5>Udbyder : <a href="{{ url('profile/user/' . $ad3->user->id) }}">{{ $ad3->user->fName }}</a></h5>
		             	<span class="ad-favorite-icon" data-ad-id="{{ $ad3->id }}">
						  	<i class="fa fa-star" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>
						</span>
		             </div>
		             <h1>{{ $ad3->adHeadline }}</h1>
		             <p><img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad3->inExchange }}</b></p>
		             <div class="kontact_date_annoc">
		               <h4><img src="{{ asset('images/date_advoc.png') }}"> {{ $ad3->createdAt->format('d/m/Y') }}</h4>
		               <a href="{{ url('ad/' . $ad3->id . '/detail') }}" class="btn-link"><span>Kontakt</span></a>
		             </div>
		             <div class="bottom_section_advocate"></div>
		           </div>
	           @endforeach
	         </div>
	         
	       </div>
	       
	       <div class="col-md-3 col-sm-3 col-xs-12">
	          <div class="rune_peterson_section">
	          	<a href="{{ url('profile/user/' . $user->id) }}">
		          	<p>
		           		<img width="61" class="img-circle" src="{{ profile_image_link($ad->user->profilePic, 60, 60) }}">
		           		@if($user->isVip)
		           			<span class="label label-primary">VIP</span>
		           		@endif
		           	</p>
	           		<h1>{{ $user->fName }} {{ $user->lName }}</h1>
	           	</a>
	          <!-- <span>{{ '@' . $user->username }}</span>-->
	          @if(average_ratting($user->reviews) != 0)
	           <p class="">{!! print_ratting(average_ratting($user->reviews)) !!}<span class="rune_peter_rt">{{ average_ratting($user->reviews) }}/5</span></p>
	          @endif
	           
	           <div class="digital_designer_section">
	             {!! '<h2>'.$user->jobTitle.'</h2>' !!}
	             {!! '<h3>Arbejder hos : '.$user->businessLine.'</h3>' !!}
	             <!-- <h3>Uddannelse : Aarhus Business College</h3> -->
	             <ul>
	               <li><label><img src="{{ asset('images/forbidensor.png') }}"></label>{{ count($connections) }} forbindelser</li>
	               <li><label><img src="{{ asset('images/anmeldser.png') }}"></label>{{ count($user->reviews) or 0 }} anmeldelser</li>
	               @if($user->businessLink)
	               	<li><label><img src="{{ asset('images/createit.png') }}"></label>{{ $user->businessLink }}</li>
	               @endif
	               @if($user->city)
	               	<li><label><img src="{{ asset('images/kobenhawn.png') }}"></label>{{ $user->city }}</li>
	               @endif
	               <li><label><img src="{{ asset('images/tilmted_tome.png') }}"></label>Tilmeldt {{ dateMonthLocale($user->createdAt->format('F')) }} {{ $user->createdAt->format('Y') }}</li>
	             </ul>
	             <h4><a href="{{ url('profile/user/' . $user->id) }}">Kontakt udbyder</a></h4>
	           </div>
	           
	          </div>
	          
	          @if(!Auth::check())
		          <div class="hardu_operate_profil">
		            <h1>Har du endnu ikke en profil?</h1>
		            <div class="gratis_operate_profile">
		              <p><img src="{{ asset('images/endnu_profile.png') }}"></p>
		              <div class="operate_gratis">
		              	<p>Det er gratis at oprette en profil</p> 
		              	<a href="{{ url('register') }}"><span>Opret gratis profil her</span></a>
		              </div>
		            </div>
		          </div>
	          @endif
	          
	          <div class="fotograph_maler_advocate">
	           <h1>Du kunne måske også se andre områder</h1>
	           @foreach($rightCategories as $category)
		            <div class="fotograph_profile_section">
		              <div class="col-sm-2" style="padding: 0">
		              	<a href="{{ url('category/' . $category->slug) }}">
		              		@if($category->categoryIcon)
				      			<img width="28" src="{{ asset('uploads/' . $category->categoryIcon) }}">
				      		@else
				      			<img width="28" src="{{ asset('images/MicrolyticIcon.jpg') }}">
				      		@endif
		              		
		              	</a>
		              </div>
		              <div class="col-sm-10" style="padding: 0">
		              	<b><a href="{{ url('category/' . $category->slug) }}">{{ $category->categoryName }}</a></b> {{ count($category->ads) }} tilgængelig
		              </div>
		            </div>
	            @endforeach
	          </div>
	          
	        </div>
	       
	      </div>
		</div>
	</div>
</div>
	   
	
@endsection

@section('scripts')

	<!-- custom scrollbar stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">

	<style type="text/css">
		.green-rate{
			color: #4d8c3f;
		}
		.yellow-rate{
			color: #bfbd56;
		}
		.red-rate{
			color: #bf5656;
		}

		.anoune_sec_lego {
		    display: block;
		}
		.anoune_sec_lego_scroll{
			height: 120px;
		}

		/*////////////////////////////////////////////////*/
		
	</style>

	<!-- custom scrollbar plugin -->
	<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	
	<script>
		(function($){
			$(window).on("load",function(){
				
				$(".anoune_sec_lego_scroll").mCustomScrollbar({
					theme:"minimal"
				});
				
			});
		})(jQuery);
	</script>

	<script>
		$(document).ready(function(e){  

			$('.rate').on('click', function(){
				$('.rate').removeClass('green-rate').removeClass('yellow-rate').removeClass('red-rate');
				var rate = $(this).attr('data-rate');
				for(var i = 1; i <= rate ; i++){
					if(rate == 1 || rate == 2){
						$('.rate-'+i).addClass('red-rate');
					}else if(rate == 3){
						$('.rate-'+i).addClass('yellow-rate');
					}else{
						$('.rate-'+i).addClass('green-rate');	
					}					
				}
			});

			$('.rate').mouseover(function(){
				$('.rate').css({'color':'#cccccc'});
				var rate = $(this).attr('data-rate');
				for(var i = 1; i <= rate ; i++){
					if(rate == 1 || rate == 2){
						$('.rate-'+i).css({'color':'#bf5656'});
					}else if(rate == 3){
						$('.rate-'+i).css({'color':'#bfbd56'});
					}else{
						$('.rate-'+i).css({'color':'#4d8c3f'});
					}					
				}
			});
			$('.rate').mouseleave(function(){
				$('.rate').attr('style', '');
			});

			$('#review-skipped').on('click', function(){
				@if(Auth::check())
					@if(Auth::user()->id == $ad->user->id)
						var who_skipped = 'ad_owner_skipped';
						var flag = 'ad_owner_id';
					@else
						var who_skipped = 'ad_swaper_skipped';
						var flag = 'ad_swaper_id';
					@endif
					var user_skiped =  {{ Auth::user()->id }};
					var token = $('[name="_token"]').val();

					$.ajax({
						url: "{{ url('ad/skip_review') }}",
						method: "POST",
						headers: {'X-CSRF-TOKEN': token},
	 					data: { 
	 						'ad_id': "{{ $ad->id }}", 
	 						'who_skipped': who_skipped,
	 						'user_skipped': user_skiped,
	 						'flag': flag
	 					}
					}).done(function(data) {
						
						window.location.reload();
						
					});
				@endif
			});

			$('a.swap').on('click', function(e){
				e.preventDefault();
				
				var token = $('[name="_token"]').val();
				@if(Auth::check())
					$.ajax({
						url: "{{ url('ad/makeswap') }}",
						method: "POST",
						headers: {'X-CSRF-TOKEN': token},
	 					data: { 
	 						'send': '1', 
	 						'ad_id': "{{ $ad->id }}", 
	 						'reciever': "{{ $ad->user->id }}", 
	 						'sender': "{{ Auth::user()->id }}",  
	 					}
					}).done(function(data) {
						
						window.location.reload();
						
					});
				@else
					alert('Please login to mark favorite.');
				@endif
			});

			$('.gal-thumb').on('click', function(){
				var $big = $(this).attr('data-big');
				$('#gal-featured img').attr('src', $big);
				return false;
			});
			
		   
			$('.ad-favorite-icon').on('click', function(){
				var adid = $(this).attr('data-ad-id');
				var token = $('[name="_token"]').val();
				@if(Auth::check())
					//Make ajax call
					$.ajax({
						url: "{{ url('ad/favorite') }}",
						method: "POST",
						headers: {'X-CSRF-TOKEN': token},
	 					data: {'ad': adid, 'user': "{{ Auth::user()->id }}"}
					}).done(function(data) {
						data = $.parseJSON(data);
						
						if(data.status){
							console.log(data.msg);
						}else{
							console.log(data.msg);
						}
					});
				@else
					alert('Please login to mark favorite.');
				@endif
			});
			
		 });
	 </script>
@endsection
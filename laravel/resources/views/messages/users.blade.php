@extends('layouts.app')

@section('metaTitle', 'Messages')
<style type="text/css">
	.accept-pending {
	    display: inline-block !important;
	}
</style>
@section('content')
	<div class="profile_mail_section">
	   <div class="container">
	    <div class="row">
	     <div class="col-md-12 col-sm-12 col-xs-12">
	      
	      <div class="col-md-3 col-sm-3 col-xs-12">
	       <div class="mailbox_besk">
	         <h1>Mailboks</h1>
	         <p><a class="new-msg" id="" href="#" data-toggle="modal" data-target="#new-msg"><img src="images/plus_icon.png">Ny besked</a></p>
	       </div>
	       <div id="custom-search-input sog_efter_search">
	            <div class="input-group col-md-12">
	             <input type="text" class="search-query form-control" placeholder="Søg efter profil" />
	            </div>                       
	       </div>
	       @if(count($connections) > 0)	
			   @foreach($messages as $message)
			       <div class="karsten_profile" data-name="{{ strtolower($message->fName) }} {{ strtolower($message->lName) }}">
			       	<?php /*{{ $message->id.' - '. $message->msgText .' - '. $message->sender->id }}*/ ?>
			       	<a class="msg-user pull-left" href="{{ url('message/user/' . $message->id) }}" data-userid="{{ $message->id }}">
				        <div class="col-md-2 col-sm-2 col-xs-12 padd_ina_rosen_section_leftt">
				        	<p><img width="40" class="img-circle msg-user-img" src="{{ profile_image_link($message->profilePic, 48, 48) }}"></p>
				        </div>
				        <div class="col-md-8 col-sm-8 col-xs-12 padd_ina_rosen_section_right">
				        	<h6><label class="msg-user-name" style="color:#4470b4">{{ $message->fName }} {{ $message->lName }}</label> | {{ $message->pivot->createdAt }}</h6>
				        	<span>{{ str_limit($message->pivot->msgText) }}</span>
				        	<div class="msg-user-businessline hide">{{ $message->businessLine }}</div>
				        </div>
				        <div class="col-md-2 col-sm-2 col-xs-12">
				        	<p><img src="images/right_icon_karsten.png"></p>
				        </div>
				   	</a>
				   	 
			       </div>
			   @endforeach
		   @else
				<div class="notice"><p class="text-danger">You don't have any connection</p></div>
			@endif
	       
	       <!-- Modal -->
			<div class="modal fade" id="new-msg" tabindex="-1" role="dialog" aria-labelledby="newmsgLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="newmsgLabel">Select User</h4>
			      </div>
			      <div class="modal-body">
			      	@if(count($connections) > 0)
				        <ul class="nav">
					        @foreach($connections as $connection)
					        	<li><a href="{{ url('message/user/' . $connection->id) }}" class="msg-user select-user" data-userid="{{ $connection->id }}" data-dismiss="modal">{{ $connection->fName }} {{ $connection->lName }}</a></li>
					        @endforeach
					  	</ul>
					@else
						<div class="notice"><p class="text-danger">You don't have any connection</p></div>
					@endif
			      </div>
			    </div>
			  </div>
			</div>
	       
	      </div>
	      
	      <div class="col-md-6 col-sm-6 col-xs-12 ">
	      
	        <div class="torben_nielson_section" id="msg-box-user">
	          <div class="col-md-1 col-sm-1 col-xs-12">
	           <img width="48" class="img-circle" src="images/torben_profile.png">
	          </div>
	          <div class="col-md-8 col-sm-8 col-xs-12">
	           <h1>Torben K. Nielsen</h1>
	           <p>Business Area Manager - Jackon A/S</p>
	          </div>
	          <div class="col-md-3 col-sm-3 col-xs-12">
	           <a href="#" data-href="{{ url('message/unread/') }}" class="unread-msg" data-userid=""><h2>Marker som ulæst</h2></a>
	           <a href="#" data-href="{{ url('message/delete/') }}" class="delete-msg" data-userid=""><h2>Slet besked</h2></a>
	          </div>
	        </div>
	        
	        <div class="torben_nielson_section_description" id="msg-box">
	          <!-- <h1>12 jan.</h1> -->
	         <div class="hej_rune_section">
	          <!-- <div class="hej_rune col-md-10 col-sm-10 col-xs-12">
	             <h2>Hej Rune</h2>
	             <h3>Sender dette, da jeg tænker det kan have din interesse. Afslut ugen ved at lave næste uges første forretninger. :)   </h3>
	             <h4>Tjek det ud og bliv gratis medlem ved at sende oplysningerne fra dit visitkort til blicher@businessafterhours.dk </h4>
	          </div> -->
	         </div>
	          <!-- <p class="time_left">17.41</p> -->
	          
	         <div class="hej_torben_section">
	          <!-- <div class="hej_torben col-md-10 col-sm-10 col-xs-12">
	             <h2>Hej Torben,</h2>
	             <h3>Mange tak for tilbudet! :) <br>
	Jeg springer dog over da tiden ikke er til det :) Travlt med opgaver.  </h3>
	             <h4>- Ivan</h4>
	          </div> -->
	         </div>
	          <!-- <p class="time_right">20.04</p>
	           <h1>13 jan.</h1> -->
	           
	         <div class="hej_rune_section">
	          <!-- <div class="hej_rune col-md-10 col-sm-10 col-xs-12">
	             <h2>Det er helt okay. Dette netværk er dog ikke tidskrævende, men nemt og gratis at være med og holde sig opdateret. </h2>
	             <h3>Der er ingen møde tvang, så derfor kan man "nøjes" med at komme de dage som passer i kalenderen.   </h3>
	             <h4>Medlemskab for at kunne holde sig opdateret er ligeledes gratis og alt man skal gøre er at sende oplysningerne fra sit visitkort til blicher@businessafterhours.dk</h4>
	          </div> -->
	         </div>
	        <!-- <p class="time_left"> 09.34</p> -->
	        
	        <!-- <div class="Skriv_din_meddelse_section">
	          <h5>Skriv din meddelse her ...</h5>
	          <div class="col-md-10 col-sm-10 col-xs-12 Skriv_padding">
	           <img src="images/elipse_cross_img.png">
	          </div>
	          <div class="col-md-2 col-sm-2 col-xs-12 Skriv_padding">
	           <img src="images/vector_icon_mail.png"><img src="images/vector_icon_spects.png">
	          </div>
	        </div> -->
	        
	        <h6>Send meddelse</h6>
	           
	        </div>
	
	      </div>
	     
	      <div class="col-md-3 col-sm-3 col-xs-12">
	        <div class="Annoncer_interesse_section">
	           <h1 style="margin-top:0;">Annoncer der måske har interesse</h1>
	           @foreach($ads as $k => $sad)
	           		<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
		            	<?php //<img src="{{ asset('images/logo_left_design.png') }}"> ?>
			            <div class="lego_left_announce">
							<img width="100%;" height="81px;" src="{{ asset('uploads/' . $sad->adImages[0]->image) }}">
						</div>
						<div class="anoune_sec_lego">
						  <span>Annonce</span>
						  <h2>Udbyder : <a href="{{ url('profile/user/' . $sad->user->id) }}">{{ $sad->user->fName }}</a></h2>
						  <h3><a href="{{ url('ad/' . $sad->slug . '/detail') }}">{{ $sad->adHeadline }}</a></h3>
						</div>
			       	</div>
	           @endforeach
	        </div>
	        
	        <div class="Du_kunne_section">
	            <h1>Du kunne måske også se andre områder</h1>
	            @foreach($rightCategories as $category)
		            <div class="fotograph_profile_section">
		              <div class="col-sm-2" style="padding: 0">
		              	<img width="28" src="{{ asset('uploads/' . $category->categoryIcon) }}">
		              </div>
		              <div class="col-sm-10">
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
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.loader').hide();

			var foruser = window.location.hash.substr(1);
			if(foruser != ''){
				var foruserid = foruser.split('/');
				callUser($('.msg-user[data-userid="'+foruserid[1]+'"]'));
			}else{
				@if(isset($connections[0]))
					callUser($('.msg-user[data-userid="{{ $connections[0]->id }}"]'));
				@endif
			}

			$('.search-query').on('keyup', function(){
				var text = $(this).val();
				$('.karsten_profile').hide();
				$('.karsten_profile[data-name*="'+text+'"]').show();
				if(text == ''){
					$('.karsten_profile').show();
				}
			});
		});

		$('#msg-box-user').on('click', '.delete-msg', function(e){
			var $this = $(this);
			var link = $(this).attr('data-href');
			var userid = $(this).attr('data-userid');
			$.ajax({
				url: link + '/' + userid,
				method: "GET",
			}).done(function(data) {
				console.log(data);
			});

			e.preventDefault();
		});

		$('#msg-box-user').on('click', '.unread-msg', function(e){
			var $this = $(this);
			var link = $(this).attr('data-href');
			var userid = $(this).attr('data-userid');
			$.ajax({
				url: link + '/' + userid,
				method: "GET",
			}).done(function(data) {
				console.log(data);
			});

			e.preventDefault();
		});
				
		$('.msg-user').on('click', function(e){
			var $this = $(this);
			callUser($this);

			e.preventDefault();
		});

		function callUser($this){
			var link = $this.attr('href');
			$.ajax({
				url: link,
				method: "GET",
			}).done(function(data) {
				$('#msg-box-user img').attr('src', $this.find('.msg-user-img').attr('src'));
				$('#msg-box-user h1').text($this.find('.msg-user-name').text());
				$('#msg-box-user p').text($this.find('.msg-user-businessline').text());
				$('#msg-box-user .delete-msg').attr('data-userid', $this.attr('data-userid'));
				$('#msg-box-user .unread-msg').attr('data-userid', $this.attr('data-userid'));
				
				$('#msg-box').html(data);
			});
		}

		$('#msg-box').on('click', '#msgSend', function(){
			var form = $("#msg-form");
			form.validate({
				errorElement: 'span',
				errorClass: 'help-block',
				highlight: function(element, errorClass, validClass) {
					$(element).closest('.textarea-cont').addClass("has-error");
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.textarea-cont').removeClass("has-error");
				},
	            rules: {
	                msgText: {
	                    required: true,
	                },
	                
	            },
	            messages: {
	            	msgText: {
	                    required: "Message Text is missing",
	                },
	                
	            }
	        });
			if (form.valid() === true){
				var $this = $(this);
				var form = $('#msg-form').serialize();
				var link = $('#msg-form').attr('action');
				$this.find('.loader').show();
				$.ajax({
					url: link,
					method: "POST",
					data: form
				}).done(function(data) {
					data = $.parseJSON(data);
					$this.find('.loader').hide();
					if(data.status){
						$.ajax({
							url: "{{ url('message/user') }}/" + $('#reciever_id').val(),
							method: "GET",
						}).done(function(data) {
							$('#msg-box').html(data);
						});
						$('#msgText').val('');
	
						$this.parent('div').find('.form-response').html('<span>Message sent</span>');
					}else{
						$this.parent('div').find('.form-response').html('<span>Oops! something went wrong.</span>');
					}
				});
			}
		});
	</script>
@endsection
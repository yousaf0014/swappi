@extends('layouts.app')

@section('metaTitle', 'Kontakt os')

@section('content')
	
	<div class="contact_us_banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!--<h1>Kontakt os</h1>
					<p>Ring til os på 86 43 44 12</p> -->
				</div>
			</div>
		</div>
	</div>
	@include('pages.menu-1')
	<div class="swapi_apps_graph">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-6 col-xs-12 swapi_apps_graph_left">
						<h1>Swappi ApS</h1>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<h2>Adresse</h2>
							<p>Peter Fabers Gade 39, 4. tv.<br> 2200 København N</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
	         				<h2>Kontakt info</h2>
	        				<p>Tlf. 93 93 11 81 <br>E-mail: <a href="mailto:info@swappi.dk">info@swappi.dk</a></p>
	       				</div>
	       				<div class="col-md-4 col-sm-4 col-xs-12">
					        <h2>Virksomhed info</h2>
					        <p>CVR. 36558709</p>
	       				</div>
						<div class="form_contact">
							@if(Session::has('success'))
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
							@endif
							<form method="post" action="{{ url('contact-us/send') }}" id="contact-form">
								{{ csrf_field() }}
								<div class="col-md-6 col-sm-6 col-xs-12 form-group Dit_navn_group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Dit navn">
        						</div>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group Din_e-mail_group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Din e-mail adresse">
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
      								<textarea class="form-control" rows="5" id="message" name="message" placeholder="Din besked"></textarea>
         						</div>
								<div class="btn_send_cntct">
          							<button type="submit" name="send" id="send" class="btn-link" style="padding-left: 0;border: 0;">
          								<span>Send</span>
          							</button>
         						</div>
           					</form>
      					</div>
	      			</div>
	      			<div class="col-md-6 col-sm-6 col-xs-12"></div>
	     		</div>
			</div>
		</div>
	</div>
   
	  
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	
	<script type="text/javascript">
		$("#contact-form").validate({
	    	errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
	        rules: {
		        name: {
		        	required: true,
			    },
	            email: {
	                required: true,
	                email: true
	            },
	        },
	        messages: {
	        	name: "Indtast venligst dit navn.",
	            email: "Indtast venligst en gyldig email.",
	        }
	    });
	</script>
@endsection

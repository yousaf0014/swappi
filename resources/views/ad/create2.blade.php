<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Annonce - Swappi ApS</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.cat-skills label{
			padding: 0px 5px;
		}
		.cat-skills input[type="radio"]:checked+label {
			background-color: #4470b4;
			color: #fff;
		}
		.tab_nav.cat-list > ul > li > span {
		    float: left;
		    padding: 10px 0 10px 10px;
		}
		.cat-skills ul li:first-child .saperate {
		    display: none;
		}
		.email_add_telefornne textarea{
			float:left;
			width:100%;
			padding:15px;
		}
		.cat-skills .saperate {
		    float: left;
		    padding: 0 5px 0 0;
		    color: #8f8f8c;
		}
		.card {
		    position: relative;
		  }
		  .card-brand {
		    position: absolute;
		    right: 5px;
		    top: 5px;
		    font-weight: bold;
		    width: auto !important;
		    margin: 0 !important;
		  }
		  .package_price{	
		  	font-size: 11px;
		    text-align: center;
		    display: block;
		    font-weight: 100;
		    width: 100%;
		    margin: 0;
		    padding: 0 5px;
		    margin-top: 0px !important;
		  }
		  .select-style{float: left; width: 100%; padding: 15px; height: 3.8em; border-radius: 0; border-color: #a9a9a9;}
		  select.error{    border-color: red;}
	</style>
</head>
<body>
	<div class="main">
	 <div class="wrapper">
	   <div class="create_ad_section">
	    <div class="container">
	     <div class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	        <div class="col-md-6 col-sm-6 col-xs-12">
	         	<form id="ad-create" method="post" action="{{ url('ad/save') }}" enctype="multipart/form-data">
	         		{{ csrf_field() }}
		      		<input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}">
	         	  <!-- //select category for ad setp 1 -->
		          <div id="step-1" class="form-step">
		          	<h1>Opret din <br> <span style="font-family: 'Lato-Regular';">annonce</span></h1>
		          	<div class="Hvad_s??ger_du_section">
			             <h2>Hvad s??ger du?</h2>
			             <div class="col-md-12 col-sm-12 col-xs-12 pad_create_Ad" >
			                <div class="right-inner-addon">
			                    <i class="icon-search"></i>
			                    {{ csrf_field() }}
			                    <input type="text" id="category" class="form-control" placeholder='Fx. "Grafiker" eller "Revisor" ' />
			                </div>
			             </div>
			             <p>Du kan ogs?? <a class="get-cat-list" href="#" style="color:#4470b4;">v??lge fra vores liste</a></p>
					 	<div class="tab_nav cat-list"></div>
						<div class="step-pagination col-md-12 no-padding">
							<div class="form-group">
								<div class="">
									<button type="button" name="next" class="next open2 Forts??t_som_gratis_annonce" style="border: none;">N??ste skridt</button>
								</div>
							</div>
							<div class="col-md-12 no-padding">
								<ul class="nav nav-pills">
									<li class="page-1"><a href="#"><i class="fa fa-circle"></i></a></li>
									<li class="page-2"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
									<li class="page-3"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
									<li class="page-4"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
		          </div>
		          <!-- //choose a payment option setp 2 -->
		          <div id="step-2" class="form-step">
		          	<h1>F?? din annonce<br> <span style="font-family: 'Lato-Regular';">mere synlig</span></h1>
		          	<div class="Hvad_s??ger_du_section">
            			<h2>Du kan v??lge en af disse 3 pakker eller lave en gratis annonce</h2>
			          	<table class="ad-packages" width="100%" border="0" cellpadding="10" cellspacing="0">
							<tr>
								<th style="padding:10px 0;"></th>
								@if(isset($packages) && count($packages) > 0 )
									@foreach ($packages as $package)
										<th class="text-capitalize" style="background:#7a7a78;border-right:1px solid #e2e6e2;"><h2 style="color:#fff;margin:0;">{{$package->package_identifier}}</h2>
										<?php $package->package_price = $package->package_price != '' ? $package->package_price/100 : 0; ;?>
										<p class="package_price">{{$package->package_price.' kr. for 30 dage'}}</p></th>
									@endforeach
								@endif
									<!--	<th style="background:#7a7a78;border-right:1px solid #e2e6e2;">Gold</th>
										<th style="background:#7a7a78;padding:10px 0;">Standard</th>  -->
							</tr>
							<tr style="background:#f5f5f0;">
								<td style="border-right:1px solid #e2e6e2;">Topannonce <!-- masthead --></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td style="border-right:1px solid #e2e6e2;"></td>
								<td style=""></td>
							</tr>
							<tr>
								<td style="border-right:1px solid #e2e6e2;">Karrusel galleri <!-- carousel gallery --></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td style="border-right:1px solid #e2e6e2;"></td>
								<td></td>
							</tr>
								<tr style="background:#f5f5f0;">
								<td style="border-right:1px solid #e2e6e2;">Top annonce i kategori <!-- Top ad category --></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td></td>
							</tr>
							<tr>
								<td style="border-right:1px solid #e2e6e2;">Fremh??vet annonce <!-- Highlighted ad --></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td style="border-right:1px solid #e2e6e2;"><img src="{{ asset('images/right_icon.png') }}"></td>
								<td><img src="{{ asset('images/right_icon.png') }}"></td>
							</tr>
							<tr style="border-left:none;border-right:none;border-bottom:none;">
								<td></td>
								@if(isset($packages) && count($packages) > 0 )
									@foreach ($packages as $package)
								<td class="V??lg_{{ucfirst($package->package_identifier)}} next">
									<input type="radio" name="package" id="{{$package->package_identifier}}-package" class="btn-package" value="{{ $package->package_identifier }}" style="display: none;" />
		          					<label class="" for="{{$package->package_identifier}}-package">{{ $package->package_name }}</label>
								</td>
									@endforeach
								@endif
								<!--<td class="V??lg_Gold next">
									<input type="radio" name="package" id="gold-package" class="btn-package" value="gold" style="display: none;" />
		          					<label class="" for="gold-package">V??lg Gold</label>
								</td>
								<td class="V??lg_Standard next">
									<input type="radio" name="package" id="standard-package" class="btn-package" value="standard" style="display: none;" />
		          					<label class="" for="standard-package">V??lg Standard</label>
								</td>-->
							</tr>
			          	</table>
			          	<div class="Forts??t_som_Tilbage">
							<div class="Forts??t_som_gratis_annonce next" style="padding:0;">
								<label for="free-package" class="" style="padding:15px 0;">Forts??t som gratis annonce</label>
								<input type="radio" selected="selected" name="package" id="free-package" value="free" class="btn-package" style="display: none;" />
							</div>
							<div class="">
								<button type="button" name="next" class="previous close3 Tilbage">Tilbage</button>
							</div>
							<?php /*
							<div class="ad-draft Gemog_forts??t_senere">
								Gem og forts??t senere
							</div>
							*/ ?>
			            </div>
			        </div>
		          	<div class="step-pagination">
						<ul class="nav nav-pills">
							<li class="page-1"><a><i class="fa fa-check"></i></a></li>
							<li class="page-2"><a><i class="fa fa-circle"></i></a></li>
							<li class="page-3"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
							<li class="page-4"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
						</ul>
					</div>
		          </div>
		          <!-- //basic ad details setp 3 -->
		          <div id="step-3" class="form-step">
		          	<h1>Udfyld oplysninger<br> <span style="font-family: 'Lato-Regular';">til annoncen</span></h1>
		          	<div style="">
			          	<div class="email_add_telefornne">
			          		<label for="headline">Overskrift</label>
			          		<div class="col-md-12" style="padding: 0;">
			          			<div class="col-md-12" style="padding: 0;">
			          				<input name="headline" id="headline" class="" value="" placeholder="Indtast maks. 50 tegn" />
			          				<p id="error_head"></p>
			          			</div>			          			
			          		</div>
			          	</div>
			          	<div class="email_add_telefornne">
			          		<label for="exchange">Hvad bytter du med?</label>
			          		<input name="exchange" id="exchange" class="" value="" placeholder="Eks. ???Grafisk design ?? 4 timer???" />
			          	</div>
			          	<!--<div class="email_add_telefornne gallery-section">
			          		<input type="hidden" name="extra_images" id="extra_images" value="0">
					        <input type="hidden" name="extra_images_price" id="extra_images_price" value="0">
			          		<input type="hidden" name="gallery_images" id="gallery_images" value="">
			          		<label for="adimage">
			          			Galleri
			          			<div class="col-md-2 pull-right text-right" style="padding: 0;">
			          				<strong>5 kr.</strong><img  src="{{ asset('images/question_mark_blue.png') }}" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
			          			</div>
			          		</label>
			          		<div class="col-md-12 no-padding image-row">
					        	<div class="col-md-3 no-left-padding">
					        		<button style="display: none;" type="button" class="btn btn-sm btn-primary remove-image"data-image-name=""><i class="fa fa-minus"></i></button>
					        		<button type="button" id="" class="btn btn-sm btn-primary add-image"><i class="fa fa-plus"></i></button>
					        	</div>
					        	<div class="col-md-6 no-left-padding image-input">
					        		<input type="file" name="adimage[]" class="adImage" data-image-name="" accept="image/*">
					        	</div>
					        	<div class="col-md-3 no-padding image-preview">
					        		<img class="blah" width="50" src="#" alt="your image" />
					        	</div>
					        </div>
			          	</div>-->
						<div class="email_add_telefornne">
			          		<label for="adimage">Galleri</label>
			          		<div class="col-md-12" style="padding: 0;">
			          			<div class="col-md-4" style="padding: 0;">
					          		<div style="position: relative;display: block;">
						          		<div class="Forts??t_som_gratis_annonce" id="upload-button" style="float: left;width: auto;">
						          			<input type="file" name="adimage[]" id="adimage" class="" multiple accept='image/*' />Tilf??j billeder
						          		</div>
					          		</div>
					          	</div>
					          	<input type="hidden" name="extra_images" id="extra_images" value="0">
					          	<input type="hidden" name="extra_images_price" id="extra_images_price" value="0">
					          	<div class="col-md-8" style="padding: 0;">
			          				<strong class="D_f??rste">De f??rste tre er gratis. Derefter 5 kr. pr. stk.</strong>
			          			</div>
					        </div>
			          		<div class="col-sm-12 no-padding" id="adimage-temp"></div>
			          	</div>
			          	<?php /* ?>//
			          	<div class="email_add_telefornne">
			          		<label for="short_description">Manchet</label>
			          		<div class="col-md-12" style="padding: 0;">
			          			<div class="col-md-10" style="padding: 0;">
			          				<textarea disabled="true" name="short_description" id="short_description" class="" maxlength="250" rows="3" cols="" placeholder="Indtast maks 250 tegn."></textarea>
			          			</div>
			          			<div class="col-md-2" style="padding: 0;">
			          				<strong>5 kr.</strong><img src="{{ asset('images/question_mark_blue.png') }}" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
			          			</div>
			          		</div>
			          		<p class="help-block">(omk. pr. md. 5 kr.)</p>
			          	</div>
			          	<?php */ ?>
						<div class="email_add_telefornne Beskrivelse_section_step_three">
							<h4>Beskrivelse</h4>
							<textarea name="description" id="description" class="" maxlength="500" placeholder="Indtast maks 500 tegn"></textarea>
						</div>
						<div class="Kontaktoplysninger_step_three">Kontaktoplysninger</div>
						<div class="col-md-12 col-sm-12 col-xs-12 email_add_telefornne">
				        	<label>E-mail</label>
				        	<input type="text" name="contact[email]" placeholder="E-mail">
				        </div>
				        <div class="col-md-12 col-sm-12 col-xs-12 email_add_telefornne">
							<label>Adresse</label>
							<input type="text" name="contact[address]" placeholder="Adresse">
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 email_add_telefornne Postnr_postnr_left">
							<input type="text" name="zipcode" id="zipcode" placeholder="Postnr.">
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12 email_add_telefornne Postnr_postnr_right">
							<input type="text" name="contact[town]" placeholder="By">
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 email_add_telefornne">
							<label>Telefonnummer</label>
							<div class="col-md-6 col-sm-6 col-xs-12 Telefonnummer_tele">
								<input type="text" name="phone1" id="phone1" placeholder="Telefon 1" >
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 Telefonnummer_tele_right">
								<input type="text" name="phone2" id="phone2" placeholder="Telefon 2" class="col-md-6 col-sm-6 col-xs-12">
							</div>
						</div>
						<div class="Forts??t_som_Tilbage">
							<div class="">
								<button type="button" name="" data-validate="true" class="next Forts??t_som_gratis_annonce paylink" style="width:150px;border: none;">Forts??t</button>
							</div>
							<div class="">
								<button type="button" name="previous" class="previous close3 Tilbage" style="padding: 14px 0;">Tilbage</button>
							</div>
							<?php /*
							<div class="ad-draft Gemog_forts??t_senere">
								Gem og forts??t senere
							</div>
							*/ ?>
						</div>
					</div>
		          	@if(Auth::check())
		          		<input type="hidden" name="user" id="user" value="{{ Auth::user()->id }}" />
		          	@endif
		          	<div class="step-pagination">
						<ul class="nav nav-pills">
							<li class="page-1"><a><i class="fa fa-check"></i></a></li>
							<li class="page-2"><a><i class="fa fa-check"></i></a></li>
							<li class="page-3"><a><i class="fa fa-circle"></i></a></li>
							<li class="page-4"><a href="javascript:;" class="next"><i class="fa fa-circle-o"></i></a></li>
						</ul>
					</div>
		          </div>
		         	<div id="step-4" class="form-step">
		        		<h1>Betaling af<br> <span style="font-family: 'Lato-Regular';">din annonce</span></h1>
		        	</div>
					<iframe id="iframe" calss="col-md-12" style=" border: 0 none;min-height:580px; width:100%; display:none" src="">

					</iframe>	
	          
		          <br>
		          <!-- <button type="submit" name="submit" class="btn btn-primary pull-left">Submit</button> -->
		        </form>
		        
				
					
	        </div>
	        
	        <div class="col-md-6 col-sm-6 col-xs-12 create_ad_section_right">
	          <a href="{{ url('/') }}"><img src="{{ asset('images/create_ad_logo.png') }}" alt="Swappi"></a>
	        </div>
	      </div>
	     </div>
	    </div>
	   </div>
	 </div>
	</div>
	<div style="display:none" id="iframediv">
		<a href="{{url('ad/iframe')}}" id="a_iframe" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-edit edit_info"></a>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-body">

	            </div>
	        </div>
	    </div>
	</div>

	<style>
		.btn-custom{
			background: transparent;
		    border: 1px solid #ccc;
		    border-radius: 0px;
		    width: 100%;
		    text-align: left;
		    color: #7a7a78;
		    font-size: 16px;
		    font-family: 'Lato-Regular';
		    padding: 1em;
		}
		#premium-package:checked ~ label[for="premium-package"],
		#gold-package:checked ~ label[for="gold-package"],
		#standard-package:checked ~ label[for="standard-package"] {
		    background: #f00;
		    border: none;
		}
		.gallery-section input{
			padding: 0;
		}
		.image-row:last-child {
		    border-bottom: 1px solid #cccccc;
		}
		.image-row {
		    margin: 2px 0;
		    border-top: 1px solid #cccccc;
		    padding: 5px 0 !important;
		}
		.bigger{
		    display: inline-block;
		    position: absolute;
		    padding: 5px 15px;
		}
		.bigger input{
	       left: 0;
    		width: 10%;
		}
		.bigger span{
		    margin-left: 19PX;
		    color: #7a7a78;
		    font-size: 16px;
		    font-family: 'Lato-Regular';
		    margin-bottom: 20px;
		    cursor: pointer;
		    text-decoration:underline;
		}
	</style>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript">//added for new gallery changes 2017-04-26
	var skill_click = function(id, sid){
		$.ajax({
			url:'<?=url("/ad/get_category/");?>/'+id+':'+sid,
			contentType:false,
			type:'GET',
			success:function(response){
			var d = $.parseJSON(response);
				if(d.status == true){
					$('input[name=headline]').val(d.data);
				}
			}
		});
	}
		// Variable to store your files
		var files, file;
		var formdata = new FormData();
		var total_images = 1;
		var extra_images = 0;
		var extra_images_price = 0;
		$('.gallery-section').on('click', '.add-image', function(){
			var cloned = $(this).parent().parent().clone();
			$('.gallery-section').append(cloned);
			cloned.find('.remove-image').show();
			total_images = total_images + 1;
			extra_images = total_images - 3;
			extra_images_price = (extra_images * 5) + '00';
			$('#extra_images').val(extra_images);
			$('#extra_images_price').val(extra_images_price);
		});
		$('.gallery-section').on('click', '.remove-image', function(){
			var name = $(this).attr('data-image-name');
			var images = $('#gallery_images').val();
			images = images.replace(name, '');
			$('#gallery_images').val(images);
			$(this).parent().parent().remove();
			total_images = total_images - 1;
			extra_images = total_images - 3;
			extra_images_price = (extra_images * 5) + '00';
			$('#extra_images').val(extra_images);
			$('#extra_images_price').val(extra_images_price);
		});
		// Add events
		$('input[type=file]').on('change', prepareUpload);
		// Grab the files and set them to our variable
		function prepareUpload(event)
		{
			files = event.target.files;
		}
		function readURL(input, file) {
			var that = $(input);
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            //$('.blah').attr('src', e.target.result);
		            that.parent().parent('.image-row').find('.image-preview .blah').attr('src', e.target.result);
		            ajax_form_submit(input, file);
		        }
		        reader.readAsDataURL(file);
		    }
		}
		$('.gallery-section').on('change', ".adImage", function(evt){
			var i = 0, len = this.files.length, img, reader, file;
		    //document.getElementById("response").innerHTML = "Uploading . . ."
		    for ( ; i < len; i++ ) {
		      file = this.files[i];
		    }
		    readURL(this, file);
		});
		function ajax_form_submit(input, file){
			var token = $('[name="_token"]').val();
			// Create a formdata object and add the files
		    formdata.append('adimage', file);
			$.ajax({
				url: "{{ url('ad/save_images') }}",
				method: "POST",
				headers: {'X-CSRF-TOKEN': token},
				cache: false,
				data: formdata,
				processData: false, // Don't process the files
        		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			}).done(function(data) {
				data = $.parseJSON(data);
				if(data.status == true){
					$(input).attr('data-image-name', data.image);
					$(input).parent().parent().find('.remove-image').attr('data-image-name', data.image);
					var images = $('#gallery_images').val();
					if(images != ''){
						images = images + ',' + data.image;
					}else{
						images = data.image;
					}
					$('#gallery_images').val(images);
				}else{
					alert('Image not uploaded! Please try again');
				}
			});
		}
	</script>
    <script type="text/javascript">
    	$(function () {
    	  $('[data-toggle="popover"]').popover();
    	});
    	$('body').on('click', function (e) {
    	    //did not click a popover toggle or popover
    	    if ($(e.target).data('toggle') !== 'popover'
    	        && $(e.target).parents('.popover.in').length === 0) { 
    	        $('[data-toggle="popover"]').popover('hide');
    	    }
    	});
    	var $payment_link = "{{ url('/') }}";
		$('.next').click(function(){
			var package = $(this).find('.btn-package');
			if(typeof(package.val()) != 'undefined'){
				if(package.val() == 'free' && $('input[name=total_amount]').val() == 0){
					$('.paid-field').hide();
					$('#p_gateways').hide();
					$('.bigger').hide();
					$('.bigger input').attr('checked', 'checked');
					$('.Godkend_betaling input').removeAttr('disabled');
				}else{
					$('.bigger').css('display','inline-block');
					$('.bigger input').removeAttr('checked');
					$('.Godkend_betaling input').attr('disabled', 'disabled');
					$('.bigger').css('position', 'absolute');
					$('.paid-field').show();
				}
			}
			var form = $("#ad-create");
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
	            	headline: {
	                    required: true,
	                },
	                exchange: {
	                    required: true,
	                },
	                description: {
	                    required: true,
	                },
	                zipcode: {
	                	number: true,
	                    maxlength: 4,
	                },
	                phone1: {
	                	number: true,
	                    maxlength: 8,
	                },
	                phone2: {
	                	number: true,
	                    maxlength: 8,
	                },
	            },
	            messages: {
	            	headline: "Angiv venligst en overskrift",
	                exchange: "Venligst indtast hvad du bytter med",
	                description: "Venligst indtast en beskrivelse",
	            }
	        });
			if (true){
				if ($('#step-1').is(":visible")){
					current_fs = $('#step-1');
					next_fs = $('#step-2');
				}else if($('#step-2').is(":visible")){
					current_fs = $('#step-2');					
					next_fs = $('#step-3');		
					//clearing queued files while navigating through steps 
					// if($('input[name=package]:checked').val() == 'free'){
						$('input[type=file]').val('');
						$('#adimage-temp').empty();
					// }
				}else if($('#step-3').is(":visible")){
					if($(this).attr('data-validate') == 'true'){
						if(form.valid()){
							current_fs = $('#step-3');
							next_fs = $('#step-4');	
						}else{
							return false;
						}
					}
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
				var con = confirm('All selected images would be lost');
				if(con == true){
					$('#extra_images').val('');
					$('#extra_images_price').val('');
					current_fs = $('#step-3');
					next_fs = $('#step-2');
				}else{
					return false;
				}
			}else if($('#step-4').is(":visible")){
				current_fs = $('#step-4');
				next_fs = $('#step-3');
			}
			next_fs.show(); 
			current_fs.hide();
		});
		$('.next.paylink').on('click', function(){
			var token = $('[name="_token"]').val();
			var selected_pack = $("input[name='package']:checked").val();
			//call for payment link
			$.ajax({
				url: "{{ url('ad/get_payment_link') }}",
				method: "POST",
				headers: {'X-CSRF-TOKEN': token},
				cache: false,
				data: {
					'package': selected_pack,
					'extra_images_price': $('#extra_images_price').val(),
				},
			}).done(function(data) {
				values = $.parseJSON(data);
				if(values.status == true){
					$('#pay-link').attr('data-pay-link', values.data.payment_link);
					$payment_link = $payment_link + values.data.payment_link
					$('#final_amount').html(parseInt(values.data.amount)/100+ ' kr.');		
					var hrf = $('a#a_iframe').attr('href');
					hrf += '/'+values.data.order_id + '/'+values.data.amount+'/'+values.data.checksum;
					//$('a#a_iframe').attr('href',hrf).trigger('click');
					//$('#iframe').attr('src',hrf);
					//$('#iframe').load(hrf).show();
					window.open(hrf, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
				}else{
					alert(values.data);
				}
			});
		});
    </script>
	<script type="text/javascript">
		$(document).ready(function(){
			function loadCategories($all = false){
				var text = $('#category').val();
				var token = $('[name="_token"]').val();
				if($all != false){
					text = '';
				}
				$.ajax({
					url: "{{ url('category/search') }}",
					method: "POST",
					headers: {'X-CSRF-TOKEN': token},
					data: {'category': text}
				}).done(function(data) {
					var $html = '<ul class="nav nav-pills">';
					data = $.parseJSON(data);
					$.each(data, function(index, value){
						$html += '<li class="cat-'+value.id+'"><a class="cat-pill" data-catid="'+value.id+'" href="javascript:;">'+value.categoryName+'</a><span><img src="{{ asset('images/right_icon_aro.png') }}" /></span><div class="cat-skills">';
							$html += '<ul>';
								$.each(value.skills, function(index, svalue){
									$html += '<li';
									if(index > 2){ $html += ' class="cat-skills-hidden" '; }
									$html += '><input type="radio" class="hide" name="skills" id="skill'+svalue.id+'" value="'+value.id+':'+svalue.id+'" /><label for="skill'+svalue.id+'" onclick="skill_click('+value.id+', '+svalue.id+')">'+svalue.skillName+'</label><span class="saperate">|</span></li>';	
								});
							$html += '</ul>';
							if(value.skills.length > 3){ $html += '<a class="skills-more" data-viewmore="'+value.id+'" href="#">Vis flere</a>'; }
						$html += '</div></li>';
					});
					$html += '</ul>';
					$('.cat-list').html($html);
				});
			}
			$('.get-cat-list').on('click', function(){
				loadCategories('all');
				$(this).parent().hide();
				return false;
			});
			$('#category').on('keyup', function(){
				loadCategories();
			});
			$('.cat-list').on('click', '.skills-more', function(){
				$(this).prev('ul').find('.cat-skills-hidden').attr('style', 'display:inline-block;');
				$(this).hide();
				return false;
			});
			<?php /* ?>
			$('.cat-list').on('mouseover', '.cat-pill', function(){
				var catid = $(this).attr('data-catid');
				var token = $('[name="_token"]').val();
				$.ajax({
					url: "{{ url('category/skills') }}",
					method: "POST",
					headers: {'X-CSRF-TOKEN': token},
					data: {'category': catid}
				}).done(function(data) {
					data = $.parseJSON(data);
					var $html = '<ul>';
					$.each(data, function(index, value){
						$html += '<li><input type="radio" class="hide" name="skills" id="skill'+value.id+'" value="'+catid+':'+value.id+'" /><label for="skill'+value.id+'" class="">'+value.skillName+'</label><span class="saperate">|</span></li>';	
					});
					$html += '</ul>';
					$('li.cat-'+catid+' .cat-skills').html($html);
				});
			});
			<?php */ ?>
		});
		// function handleFileSelect(evt) {
			// var extra_images = 0;
			// var extra_images_price = 0;
			// //$('#adimage-temp > span').remove();
		    // var files = evt.target.files;
			// if(files.length > 3){
				// extra_images = files.length - 3;
				// extra_images_price = (extra_images * 5) + '00';
				// //alert(files.length + ' image selected, only 3 images are.');
				// $('#extra_images').val(extra_images);
				// $('#extra_images_price').val(extra_images_price);
				// //return false;
			// }
		    // // Loop through the FileList and render image files as thumbnails.
		    // for (var i = 0, f; f = files[i]; i++) {
		      // // Only process image files.
		      // if (!f.type.match('image.*')) {
		        // continue;
		      // }
		      // var reader = new FileReader();
		      // // Closure to capture the file information.
		      // reader.onload = (function(theFile) {
		        // return function(e) {
		          // // Render thumbnail.
		          // var span = document.createElement('span');
		          // span.innerHTML = 
		          // [
		            // '<img style="height: 75px; margin: 10px 5px 0 0" src="', 
		            // e.target.result,
		            // '" title="', escape(theFile.name), 
		            // '"/>'
		          // ].join('');
		          // document.getElementById('adimage-temp').insertBefore(span, null);
		        // };
		      // })(f);
		      // // Read in the image file as a data URL.
		      // reader.readAsDataURL(f);
		    // }
		  // }
		  //document.getElementById('adimage').addEventListener('change', handleFileSelect, false);
		  var files = '';
		  var appendFile = '';
		  function handleFileSelect(evt) {
			var extra_images = 0;
			var extra_images_price = 0;
			$('#adimage-temp > span').remove();
		    var files = evt.target.files;
			if(files.length > 3){
				extra_images = files.length - 3;
				extra_images_price = (extra_images * 5) + '00';
				//alert(files.length + ' images selected, you can select max 3 images as a free user.');
				$('#extra_images').val(extra_images);
				$('#extra_images_price').val(extra_images_price);
				$('.paid-field').show();
				//return false;
			}
			// if(files.length != 0){
				// var appendFile = files;
			// }
			// if(appendFile.length != 0){
				// var count = files.length;
				// for(i = 0;i <= appendFile.length; i++){
					// files[parseInt(count)+1]=appendFile[i];
				// }
			// }
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
		          var span = document.createElement('span');
		          span.innerHTML = 
		          [
		            '<img style="height: 75px; margin: 10px 5px 0 0" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '"/>'
		          ].join('');
		          document.getElementById('adimage-temp').insertBefore(span, null);
		        };
		      })(f);
		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		  }
		  document.getElementById('adimage').addEventListener('change', handleFileSelect, false);
	</script>
	<script src="https://payment.quickpay.net/embedded/v1/quickpay.js"></script>
	<script type="text/javascript">
	$('.Forts??t_som_gratis_annonce.paylink').on('click', function(){
		var plan = $('input[name=package]:checked').val();
		var attrs = $('[data-quickpay="cardnumber"], [data-quickpay="cvd"]');
		attrs.attr('disabled', 'disabled');
	  	setTimeout(function(){
			var tm = $('input[name=total_amount]').val();
			if(	parseInt(tm) > 0){
		  		quickpay();
		  		attrs.removeAttr('disabled');
		  	}
		 }, 3000);
	    if($('#extra_images_price').val() > 0){
		  	quickpay();
		  	attrs.removeAttr('disabled');
	    }
	 });
	var quickpay = function(){
		QuickPay.Embedded.Form(document.querySelector("#ad-create"), {
			merchant_id: 16544,
			agreement_id: 59367,
			payment_link: $payment_link,
			brandChanged: function(brand) {
			  document.querySelector(".card-brand").innerHTML = brand;
			},
			beforeCreate: function(form) {
			  var button = document.querySelector("#ad-create [name='submit']");
			  button.setAttribute("disabled", "disabled");
			  button.innerHTML = "Please wait...";
			},
			validChanged: function(form, isValid, fields) {
			  if (isValid) {
				var inputs = document.querySelectorAll("input.error");
				for (var i = 0; i < inputs.length; i++) {
				  inputs[i].classList.remove("error");
				}
			  }
			},
			success: function(form, data) {
				var token = $('[name="_token"]').val();
				var ct = data.token;
				var payment_id = $('#payment_id').val();
				var total_amount = $('#total_amount'). val();
				$.ajax({
					url: "{{ url('ad/payment_authorize') }}",
					method: "POST",
					headers: {'X-CSRF-TOKEN': token},
					data: {'ct': ct, 'amount': total_amount, 'payment_id': payment_id}
				}).done(function(data) {
					$('select').removeClass('error');
					if($('input[name=check]:checked').val() == 1){
						$("[name='submit']").click();
					} else {
						alert('Please accept terms and conditions');
					}
				});
				return true; // Return false to prevent form submit
			},
			failure: function(form, type, message) {
			  switch (type) {
				case "validation":
				  for (var i = 0; i < message.length; i++) {
					  if(message[i] == 'expiration'){
					  	$('select[name=month]').addClass('error');
					  	$('select[name=year]').addClass('error');
					  } else {
						document.querySelector('input[data-quickpay=' + message[i] + ']').classList.add('error');
					  }
				  }
				  break;
				default:
				  alert(type + ': ' + message);
			  }
			  // document.querySelector("#ad-create[name='submit']").innerHTML = "Pay";
			}
		  });
		  $('[data-quickpay="cardnumber"]').on('blur', function(){
			var val = $(this).val();
			if(val == ''){
				$(this).addClass('error');
			}else{
				$(this).removeClass('error');
			}
		  });
		  $('[data-quickpay="expiration"]').on('blur', function(){
			var val = $(this).val();
			if(val == ''){
				$('select[name=month]').addClass('error');
			  	$('select[name=year]').addClass('error');
				$(this).addClass('error');
			}else{
				$('select[name=month]').removeClass('error');
			  	$('select[name=year]').removeClass('error');
				$(this).removeClass('error');
			}
		  });
		  $('[data-quickpay="cvd"]').on('blur', function(){
			var val = $(this).val();
			if(val == ''){
				$(this).addClass('error');
			}else{
				$(this).removeClass('error');
			}
		  });
	}
	$('select[name=month], select[name=year]').on('change', function(){
		var month = $('select[name=month]').val();
		var year = $('select[name=year]').val();
		if(month.length == 1 ){
			month = '0'+month;
		}
		$('[data-quickpay="expiration"]').val(month+'/'+year.slice(2, 4));
		var searchInput = $('[data-quickpay="expiration"]');
		$(searchInput).removeClass('hide');
		$(searchInput).css({
		    position: 'absolute',
		    bottom: '-100px'
		});
		var strLength = searchInput.val().length;
		searchInput.focus();
		searchInput[0].setSelectionRange(strLength, strLength);
		$(searchInput).addClass('hide');
	});
	$('input[name=check]').change(function(){
		if ($('input[name=check]:checked').val() == 1) {
			$('.Godkend_betaling input').removeAttr('disabled');
		} else {
			$('.Godkend_betaling input').attr('disabled', 'disabled');
		}
	});
	$('.Godkend_betaling input').attr('disabled', 'disabled');
	$('#headline').on('keypress', function(e){
		if($(this).val().length > 25 ){
			$('#error_head').html('<p class="text-danger">Du kan ikke skrive mer enn 25 tegn</p>');
			return false;
		}
	});
	$('#headline').on('blur', function(){
		$('#error_head').empty();
	});
</script>
<div id="terms" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" style="position: relative;top: -20px;color: #ffffff;opacity: 1;left: 16px;font-size: 16px;"><i class="fa fa-times-circle"></i></button>
		  <div class="modal-body">
				<h3><span style="color: inherit; font-family: inherit; line-height: 1.1;">Introduktion</span></h3>
				<p>Swappi er en portal, hvor du kan bytte dine kompetencer gratis. N??r du bes??ger Swappi, accepterer du f??lgende vilk??r. Disse ydelser stilles til r??dighed for dig af Swappi, CVR-nr. 36558709, Peter Fabers Gade 39 4. tv., 2200 K??benhavn N, Danmark. <br><br>Denne politik tr??der i kraft den 1. januar 2017.</p>
				<h2 id="ANVENDELSE-AF-SWAPPI">Anvendelse af Swappi</h2>
				<p>For at benytte Swappi skal du lave en brugerprofil. Vi anbefaler, at du g??r dig umage med din beskrivelse af dig selv og dine kompetencer. Jo mere specifik og uddybende du kan skrive om, hvem du er, og hvad du kan tilbyde, jo lettere f??r du ved at bytte dine kompetencer. N??r du har lavet en bruger, kan du tage platformen i brug og lave en annonce. Det er her igen en rigtig god id??, at v??re s?? specifik omkring den opgave/kompetence, du ??nsker byttet, samt hvad du kan tilbyde til geng??ld. Alle annoncer skal overholde reglerne om annoncering, som kan findes her (Regler om annoncering).</p>
				<p>Ved anvendelse af Swappi indvilger du i ikke at g??re f??lgende:</p>
				<ul class="ul_style">
					<li>overtr??de relevant lovgivning, herunder forbrugeraftaleloven, aftaleloven, k??beloven, markedsf??ringsloven samt andre relevante love</li>
					<li>kr??nke disse brugervilk??r eller vores Regler om annoncering</li>
					<li>agere usandt eller vildledende</li>
					<li>distribuere eller inkludere, spam, virus eller andre teknologier, der kr??nker Swappi eller brugerne heraf</li>
					<li>??ndre, kopiere og/eller distribuere andre personers materiale</li>
					<li>kr??nke tredjemands rettigheder, herunder immaterielle rettigheder</li>
					<li>sammenstille eller indsamle oplysninger om andre uden deres samtykke</li>
					<li>omg?? foranstaltninger, der er anvendt for at hindre eller begr??nse adgang til Swappis ydelser</li>
				</ul>
				<p>Du har mulighed for at bed??mme det stykke arbejde, du har byttet dig til. Dette er ikke et krav, og du kan ikke g??re krav p?? at f?? bed??mt dit arbejde, selvom du har gjort det for den anden. Vi tager st??rkt afstand fra betalende bed??mmelser, og det kan medf??re, at begge involveredes kontoer bliver lukket.</p>
				<p><strong>Misbrug af Swappi</strong></p>
				<p>Vi har implementeret en ???Anmeld annonce??? knap p?? alle annoncer. Vi ??nsker, at vores brugere skal benytte denne, hvis de oplever, at en side viser st??dende indhold eller ikke overholder reglerne. Vi forbeholder os retten til at slette annoncer, fjerne indhold og tr??ffe juridiske og tekniske foranstaltninger for at slette brugere uden forklaring. Vi forbeholder os yderligere retten til eventuelt at udlevere personlige oplysninger til politiet, hvis ikke lovgivningen bliver overholdt. Vi p??tager os ikke ansvaret for overv??gning af vores brugere. Derfor er det vigtigt, at I hj??lper os med at overholde alle normer og regler. Vi ??nsker ikke, at du laver mere end ??n bruger. Dette vil resultere i lukning af den ene konto (evt. begge). Der m?? p?? ingen m??de indsamles kontaktoplysninger p?? andre brugere til brug for egen markedsf??ring. Man m?? ikke betale sig for at f?? en god bed??mmelse for sit arbejde.</p>
				<h2 id="PRISER-OG-BETALINGER">Priser og betalinger</h2>
				<p>Vi har visse ydelser, som vi kr??ver betaling for. Prisen for disse ydelser fremg??r af Swappis hjemmeside <a href="http://www.swappi.dk">www.swappi.dk</a>. Vi forbeholder os retten til at ??ndre priserne herp?? uden varsel. Disse ydelser skal betales med det samme og kan ikke k??bes p?? afbetaling. Ydelserne er opgivet i danske kroner (DKK) og er inkl. moms. Du vil modtage en kvittering, uanset om du har betalt for din annonce eller ej. Vi sender ingen faktura ud, som skal betales, da dette allerede er sket i forbindelse med oprettelse af annoncen. Betalinger af till??gsydelser p?? annoncer kan ikke refunderes.</p>
				<h2 id="SIKKERHED">Sikkerhed</h2>
				<p>Kontakt os p?? <a href="mailto:info@swappi.dk">info@swappi.dk</a>, hvis du oplever eller har mistanke om, at din konto har v??ret misbrugt. Vi behandler dine personlige oplysninger med st??rste forsigtighed, ingen af dine oplysninger vil blive videregivet, medmindre du selv har anmodet om det eller givet dit eksplicitte samtykke hertil. Der henvises i den forbindelse til Swappis g??ldende handelsbetingelser, som kan findes p?? hjemmesiden <a href="http://www.swappi.dk">www.swappi.dk</a>.</p>
				<p>Hvis du oplever trusler eller andet ubehag fra en anden bruger i forbindelse med en byttehandel, skal dette anmelde til os p?? <a href="mailto:info@swappi.dk">info@swappi.dk</a>. Derefter vil sagen blive behandlet.</p>
				<h2 id="LUKNING-AF-DIN-KONTO">Lukning af Din Konto</h2>
				<p>Vi forbeholder os retten til at lukke eller sp??rre din konto uden varsel eller forklaring. Du kan skrive til <a href="mailto:info@swappi.dk">info@swappi.dk</a>, hvis du ??nsker den gen??bnet. Du kan l??se mere om hvad der kan resultere lukning af din konto under ???Misbrug af Swappi???.</p>
				<h2 id="ANSVAR-FOR-OPRETTELSE-AF-INDHOLD">Ansvar for oprettelse af Indhold</h2>
				<p>Du er selv ansvarlig for, at de annoncer, du opretter, er i overensstemmelse med Swappis regler for annoncering og ikke overtr??der nogen love (herunder den danske markedsf??ringslov) og ikke kr??nker tredjemands rettigheder. Du skal til enhver tid kunne redeg??re for, at dine referencer er dine og ikke kopieret fra tredjemand. Brud p?? disse regler vil medf??re lukning af din konto og eventuel politianmeldelse. Vi gennemg??r ikke alle annoncer, du opretter, du er dermed ansvarlig for at alle regler og love bliver overholdt. Du er indvilliget i at skadesl??sholde Swappi for ethvert tab, som Swappi m??tte lide som f??lge af kr??nkelse af Swappi tjenester, brud p?? loven og eventuel kr??nkelse af tredjemands rettigheder.</p>
				<h2 id="SWAPPI-OG-BRUGERNES-ANSVAR">Swappi og brugernes ansvar</h2>
				<p>Swappi stiller sin platform til r??dighed og er ikke involveret i selve byttehandlen mellem platformens brugere. Swappi er derfor ikke ansvarlig for de ydelser, der udveksles eller kvaliteten af det arbejde, der udf??res som en del af handlen p?? Swappis platform. Swappi fraskriver sig udtrykkeligt alle garantier, indest??elser, betingelser (udtrykkelige eller implicitte), herunder om kvalitet, salgbarhed, handelsm??ssig kvalitet, mv., der m??tte f??lge af lovgivningen.</p>
				<p>Du er selv ansvarlig for, at relevant lovgivning bliver overholdt, herunder skattelovgivningen (Du kan l??se mere om skat og moms ved byttehandler her). Det er vigtigt, at du s??tter dig ind i disse regler, f??r du benytter vores hjemmeside.</p>
				<p>Swappi er hverken ansvarlig for, at brugen af platformen medf??rer tab af penge, goodwill, omd??mme, f??lgeskader eller for at begge parter udf??rer deres arbejde i henhold til indg??et aftale. Swappi kan derfor heller ikke refundere eller give anden godtg??relse for tabt eller d??rligt udf??rt arbejde. Der er ingen penge involveret i byttehandlerne, og der kan ikke g??res krav p?? det, selvom om modparten ikke er i stand til at udf??re arbejdet. Hvis to brugere beslutter sig for at udveksle penge i en byttehandel, er det p?? eget ansvar.</p>
				<h2 id="PERSONLIGE-OPLYSNINGER">Personlige oplysninger</h2>
				<p>Ved brug af Swappis platform og ydelser, indvilger du i at f??lge Swappis persondatapolitik. Du kan finde vores fortrolighedspolitik her (fortrolighedspolitik) og vores persondatapolitik her (handelsbetingelser).</p>
				<p>Du er alene ansvarlig for, at din adgangskode er sikret. Hvis du oplever, at din konto eller din adgangskode er blevet misbrugt eller har mistanke om, at den er blevet det, b??r du straks ??ndre adgangskode og evt. kontakte kundesupport her (Kundesupport).</p>
				<h2 id="??NDRINGER ELLER RETTELSER">??ndringer eller Rettelser</h2>
				<p>Swappi opdaterer l??bende ??ndringer og rettelser i brugervilk??rene, og du er selv ansvarlig for at holde dig opdateret. Hvis du har sp??rgsm??l eller kommentarer til brugervilk??rene, kan du kontakte vores Kundesupport.</p>
		  </div>
		</div>
	  </div>
	</div>
</body>
</html>

@extends('layouts.app')

@section('metaTitle', $ad->adHeadline.' - Edit Annonce')

@section('content')
	
	<div class="fotograph_ad_section">
	    <div class="container">
	     <div class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	      
	        <div class="col-md-9 col-sm-9 col-xs-12 fotograph_ad_section_left">
	        	@include('admin.error')
	            @include('admin.success')
	        	<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('ad/update') }}">
		      		{{ csrf_field() }}
		      		<input type="hidden" name="ad_id" id="ad_id" value="{{ $ad->id }}">
		      		<input type="hidden" name="slug" id="slug" value="{{ $ad->slug }}">
			         <div class="photograph_fhotoshoot">
			         	<h1 class="ad-headline">
				           	<span>{{ $ad->adHeadline }}</span>
				           	<input class="form-control hide" name="adHeadline" id="adHeadline" value="{{ $ad->adHeadline }}">
				           	<a class="btn btn-link edit-icon" href="#"><i class="fa fa-pencil"></i></a>
			         	</h1>
			           <ul>
				            <li class="ad-exchange">
				            	<img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad->inExchange }}</b>
				            	<input class="form-control hide" name="adExchange" id="adExchange" value="{{ $ad->inExchange }}">
				            	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#adexchange"><i class="fa fa-pencil"></i></a>
				            </li>
				            <li>Udbyder : {{ $ad->user->fName }} {{ $ad->user->lName }}</li>
				            <li class="ad-created">
				            	<img src="{{ asset('images/operatted_icon.png') }}">Oprettet den <span>{{ $ad->createdAt->format('d /m-Y') }}</span>
				            	<div class="input-group date hide">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				            		<input class="form-control " name="adCreated" id="adCreated" value="{{ $ad->createdAt->format('d /m-Y') }}">
				            	</div>
				            	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#adcreated"><i class="fa fa-pencil"></i></a>
				            </li>
				            
			           </ul>
			           
			         </div>
		         
			         <div class="slider_fotograph_ad">
			           <div class="col-md-10 col-sm-10 col-xs-12 slider_fotograph_ad_left">
			           		<span class="edit-gallery-icon"><a href="#" class="add-images"><i class="fa fa-picture-o" aria-hidden="true"></i> Rediger galleri</a></span>
			           		<input type="file" name="add_images[]" id="add_images" class="file-hide" multiple accept='image/*'>
			             <img src="{{ asset('uploads/' . $featured) }}" style="width:100%;">
			           </div>
			           <div class="col-md-2 col-sm-2 col-xs-12 slider_fotograph_ad_right" id="adimage-temp">
			           	@foreach($ad->adImages as $image)
			            	<p>
		            			<img src="{{ asset('uploads/' . $image->image) }}" style="width:100%;">
		            			<input type="hidden" name="adImages[]" value="{{ $image->id }}">
								<a href="#" class="img-remove" data-toggle="tooltip" title="Remove"><i class="fa fa-trash"></i></a>
								<a href="#" class="img-featured pull-right" data-flag="{{ $image->isFeatured ? 'featured' : 'nofeatured' }}" data-imgid="{{ $image->id }}">
									@if($image->isFeatured)
										<i class="fa fa-star" data-toggle="tooltip" title="Remove Featured"></i>
									@else
										<i class="fa fa-star-o" data-toggle="tooltip" title="Mark Featured"></i>
									@endif
								</a>
			            	</p>
			            @endforeach
			           </div>			           
			         </div>
		         
			         <div class="Annoncer_section">
			           <h1>Annoncer der måske har interesse</h1>
			           @foreach($ads as $k => $sad)
			           		@if($k < 2)
					           <div class="col-md-6 col-sm-6 col-xs-12">
					            	<?php //<img src="{{ asset('images/logo_left_design.png') }}"> ?>
						            <div class="lego_left_announce">
										<img width="120" src="{{ asset(Croppa::url('uploads/' . $sad->adImages[0]->image, 120, 120)) }}">
									</div>
									<div class="anoune_sec_lego">
									  <span>Annonce</span>
									  <h2>Udbyder : <a href="{{ url('profile/user/' . $sad->user->id) }}">{{ $sad->user->fName }}</a></h2>
									  <h3><a href="{{ url('ad/' . $sad->id . '/detail') }}">{{ $sad->adHeadline }}</a></h3>
									</div>
					           </div>
					   		@endif
			           @endforeach
			         </div>
		         
			         <div class="Beskrivelse_section">
			           <h1>Beskrivelse</h1>
			           <div class="ad-description">
				       		<p>{{ $ad->adDescription }}</p>
				       		<textarea class="form-control hide" name="adDescription" id="adDescription">{{ $ad->adDescription }}</textarea>
							<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#addescription"><i class="fa fa-pencil"></i></a>
			           </div>
			           <h3><button type="submit" name="update" class="btn-link">Gem ændringer</button></h3>
			           
			         </div>
		         
			         <div class="Annoncer_product_section">
			           <h1>Annoncer der kunne være interessante</h1>
			           @foreach($ads as $k => $ad3)
				          <div class="col-md-4 col-sm-4 col-xs-12 Advokat_søges{{ $k+1 == count($ads) ? ' last_col_advocate' : '' }}">
				             <div class="Udbyder_star">
				             	<h5>Udbyder : <a href="{{ url('profile/user/' . $ad3->user->id) }}">{{ $ad3->user->fName }}</a></h5>
				             	<span><img src="{{ asset('images/advoc_star.png') }}"></span>
				             </div>
				             <h1>{{ $ad3->adHeadline }}</h1>
				             <p><img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad3->inExchange }}</b></p>
				             <div class="kontact_date_annoc">
				               <h4><img src="{{ asset('images/date_advoc.png') }}"> {{ $ad3->createdAt->format('d/m-Y') }}</h4>
				               <a href="{{ url('ad/' . $ad3->id . '/detail') }}" class="btn-link"><span>Kontakt</span></a>
				             </div>
				             <div class="bottom_section_advocate">
				             </div>
				           </div>
			           @endforeach
			         </div>
				</form>
	       </div>
	       
	       <div class="col-md-3 col-sm-3 col-xs-12">
	          <div class="rune_peterson_section">
	          	<p>
	           		<img width="61" class="img-circle" src="{{ asset('uploads/' . $ad->user->profilePic) }}">
	           		@if($user->isVip)
	           			<span class="label label-primary">VIP</span>
	           		@endif
	           	</p>
	           <h1>{{ $user->fName }} {{ $user->lName }}</h1>
	           <span>{{ '@' . $user->username }}</span>
	           <p class="">{!! print_ratting(average_ratting($user->reviews)) !!}{{ average_ratting($user->reviews) }}/5</p>
	           
	           <div class="digital_designer_section">
	             <h2>Digital designer / Frontender</h2>
	             <h3>Arbejder hos : CreateIT</h3>
	             <h3>Uddannelse : Aarhus Business College</h3>
	             <ul>
	               <li><img src="{{ asset('images/forbidensor.png') }}">{{ count($connections) }} forbindelser</li>
	               <li><img src="{{ asset('images/anmeldser.png') }}">{{ count($user->reviews) or 0 }} anmeldelser</li>
	               @if($user->businessLink)
	               	<li><img src="{{ asset('images/createit.png') }}">{{ $user->businessLink }}</li>
	               @endif
	               @if($user->city)
	               	<li><img src="{{ asset('images/kobenhawn.png') }}">{{ $user->city }}</li>
	               @endif
	               <li><img src="{{ asset('images/tilmted_tome.png') }}">Tilmeldt {{ $user->createdAt->format('F Y') }}</li>
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
		              		<img width="28" src="{{ asset('uploads/' . $category->categoryIcon) }}">
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
	
	<script type="text/javascript" src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
	<link href="{{ asset('assets/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
	
	<style>
		.edit-gallery-icon {
		    position: absolute;
		    top: 10px;
		    left: 10px;
		    background: rgba(0,0,0,0.5);
		    color: #ffffff;
		    padding: 3px 7px;
		    cursor: pinter;
		}
		.file-hide{
			opacity: 0;
			width: 0px;
			height: 0px;
		}
		.edit-icon {
		    display: inline;
		    opacity:0;
		    background: #eee;
			color: #aaa;
		}
		.modal-dialog {
		    margin-top: 106px;
		}
		.ad-headline:hover .edit-icon {
		    opacity:1;
		}
		.ad-exchange:hover .edit-icon{
			opacity:1;
		}
		.ad-created:hover .edit-icon{
			opacity:1;
		}
		.ad-description:hover .edit-icon{
			opacity:1;
		}
		.ad-description {
		    position: relative;
		}
		.ad-description .edit-icon {
		    position: absolute;
		    right: -38px;
		    top: 0;
		}
	</style>
	
	<script type="text/javascript">
	    $(document).ready(function () {
	        $('.input-group.date').datepicker({
		        format: 'dd /mm-yyyy',
	            calendarWeeks: true,
	            autoclose: true
	        });
	    });
	</script>
	
	<script type="text/javascript">

		$('.add-images').click(function(){
			$('#add_images').click();
			return false;
	    });

		$('#adimage-temp').on('click', '.img-remove', function(){
			$(this).parent().remove();
			return false;
        });
		
	    function handleFileSelect(evt) {
			$('#adimage-temp > p.temp').remove();
	        
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
		          var span = document.createElement('p');
		          span.className = 'temp';
		          span.innerHTML = 
		          [
		            '<img style="width:100%;height:auto;" src="', 
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
	
		  document.getElementById('add_images').addEventListener('change', handleFileSelect, false);


		  $('.img-featured').on('click', function(){
				var imgid = $(this).attr('data-imgid');
				var flag = $(this).attr('data-flag');
				var token = $('[name="_token"]').val();
				
				$.ajax({
					url: "{{ url('ad/markimage') }}",
					method: "POST",
					headers: {'X-CSRF-TOKEN': token},
					data: {'imgid' : imgid, 'flag' : flag}
				}).done(function(data) {
					data = $.parseJSON(data);
					
					location.reload();
				});
				
				return false;
		  });

		  
	
		$('.ad-headline .edit-icon').on('click', function () {
			parent = $('.ad-headline');
			
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

		$('.ad-exchange .edit-icon').on('click', function () {
			parent = $('.ad-exchange');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('input').addClass('hide');
				parent.find('b').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('input').removeClass('hide');
				parent.find('b').addClass('hide');
			}
			
			return false;
		});

		$('.ad-created .edit-icon').on('click', function () {
			parent = $('.ad-created');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('.input-group.date').addClass('hide');
				parent.find('span:not(.input-group-addon)').removeClass('hide').text(parent.find('input').val());
			}else{
				parent.addClass('opened');
				parent.find('.input-group.date').removeClass('hide');
				parent.find('span:not(.input-group-addon').addClass('hide');
			}
			
			return false;
		});

		$('.ad-description .edit-icon').on('click', function () {
			parent = $('.ad-description');
			
			if(parent.hasClass('opened')){
				parent.removeClass('opened');
				parent.find('textarea').addClass('hide');
				parent.find('p').removeClass('hide').text(parent.find('textarea#adDescription').val());
			}else{
				parent.addClass('opened');
				parent.find('textarea').removeClass('hide');
				parent.find('p').addClass('hide');
			}
			
			return false;
		});

	</script>
	
@endsection
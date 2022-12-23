@extends('layouts.app')

@section('content')
	
	<div class="fotograph_ad_section">
	    <div class="container">
	     <div class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	      
	        <div class="col-md-9 col-sm-9 col-xs-12 fotograph_ad_section_left">
	        	@include('admin.error')
	            @include('admin.success')
	        	<form class="form-horizontal" method="post" action="{{ url('ad/update') }}">
		      		{{ csrf_field() }}
		      		<input type="hidden" name="ad_id" id="ad_id" value="{{ $ad->id }}">
		      		<input type="hidden" name="slug" id="slug" value="{{ $ad->slug }}">
			         <div class="photograph_fhotoshoot">
			         	<h1 class="ad-headline">
				           	<span>{{ $ad->adHeadline }}</span>
				           	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#adheadline"><i class="fa fa-pencil"></i></a>
			         	</h1>
						<!-- Ad Headline Modal -->
						<div class="modal fade" id="adheadline" tabindex="-1" role="dialog" aria-labelledby="adHeadlineLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	
						      		<div class="form-group">
						      			<label class="col-md-2">Headline</label>
						      			<div class="col-md-10">
						      				<input type="text" name="adHeadline" id="adHeadline" class="form-control" value="{{ $ad->adHeadline }}" />
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
						      </div>
						    </div>
						  </div>
						</div>
			           <ul>
				            <li class="ad-exchange">
				            	<img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad->inExchange }}</b>
				            	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#adexchange"><i class="fa fa-pencil"></i></a>
				            </li>
				            <li>Udbyder : {{ $ad->user->fName }} {{ $ad->user->lName }}</li>
				            <li class="ad-created">
				            	<img src="{{ asset('images/operatted_icon.png') }}">Oprettet den <span>{{ $ad->createdAt->format('d / m-Y') }}</span>
				            	<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#adcreated"><i class="fa fa-pencil"></i></a>
				            </li>
				            
			           </ul>
			           <!-- Ad Exchange Modal -->
						<div class="modal fade" id="adexchange" tabindex="-1" role="dialog" aria-labelledby="adExchangeLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	
						      		<div class="form-group">
						      			<label class="col-md-2">In Exchange</label>
						      			<div class="col-md-10">
						      				<input type="text" name="adExchange" id="adExchange" class="form-control" value="{{ $ad->inExchange }}" />
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" name="update" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
						      </div>
						    </div>
						  </div>
						</div>
						
						<!-- Ad created Modal -->
						<div class="modal fade" id="adcreated" tabindex="-1" role="dialog" aria-labelledby="adCreatedLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	
						      		<div class="form-group">
						      			<label class="col-md-2">Created</label>
						      			<div class="col-md-10">
						      				<div class="input-group date">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						      					<input type="text" name="adCreated" id="adCreated" class="form-control" value="{{ $ad->createdAt->format('d /m-Y') }}" />
						      				</div>
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
						      </div>
						    </div>
						  </div>
						</div>
			         </div>
		         
			         <div class="slider_fotograph_ad">
			           <div class="col-md-10 col-sm-10 col-xs-12 slider_fotograph_ad_left">
			             <img src="{{ asset('uploads/' . $featured) }}" style="width:100%;">
			           </div>
			           <div class="col-md-2 col-sm-2 col-xs-12 slider_fotograph_ad_right">
			           	@foreach($ad->adImages as $image)
			            	<p><a href="#"><img src="{{ asset('uploads/' . $image->image) }}" style="width:100%;"></a></p>
			            @endforeach
			           </div>
			         </div>
		         
			         <div class="Annoncer_section">
			           <h1>Annoncer der måske har interesse</h1>
			           <div class="col-md-6 col-sm-6 col-xs-12">
			            <img src="{{ asset('images/logo_left_design.png') }}">
			           </div>
			           <div class="col-md-6 col-sm-6 col-xs-12">
			            <img src="{{ asset('images/logo_right_photograph.png') }}">
			           </div>
			         </div>
		         
			         <div class="Beskrivelse_section">
			           <h1>Beskrivelse</h1>
			           <div class="ad-description">
				       		<p>{{ $ad->adDescription }}</p>
							<a class="btn btn-link edit-icon" href="#" data-toggle="modal" data-target="#addescription"><i class="fa fa-pencil"></i></a>
			           </div>
			           <h3><button type="submit" name="update" class="btn-link">Gem ændringer</a></h3>
			           
			           <!-- Ad description Modal -->
						<div class="modal fade" id="addescription" tabindex="-1" role="dialog" aria-labelledby="adDescriptionLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Change</h4>
						      </div>
						      <div class="modal-body">
						      	
						      		<div class="form-group">
						      			<label class="col-md-2">Description</label>
						      			<div class="col-md-10">
						      				<textarea type="text" name="adDescription" id="adDescription" class="form-control">{{ $ad->adDescription }}</textarea>
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
						      </div>
						    </div>
						  </div>
						</div>
			         </div>
		         
			         <div class="Annoncer_product_section">
			           <h1>Annoncer der kunne være interessante</h1>
			           @foreach($ads as $k => $ad)
				          <div class="col-md-4 col-sm-4 col-xs-12 Advokat_søges{{ $k+1 == count($ads) ? ' last_col_advocate' : '' }}">
				             <div class="Udbyder_star">
				             	<h5>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></h5>
				             	<span><img src="{{ asset('images/advoc_star.png') }}"></span>
				             </div>
				             <h1>{{ $ad->adHeadline }}</h1>
				             <p><img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad->inExchange }}</b></p>
				             <div class="kontact_date_annoc">
				               <h4><img src="{{ asset('images/date_advoc.png') }}"> {{ $ad->createdAt->format('d/m-Y') }}</h4>
				               <a href="{{ url('ad/' . $ad->slug . '/detail') }}" class="btn-link"><span>Kontakt</span></a>
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
	           			<span>VIP</span>
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
	               <li><img src="{{ asset('images/forbidensor.png') }}">{{ $connections }} forbindelser</li>
	               <li><img src="{{ asset('images/anmeldser.png') }}">{{ count($user->reviews) or 0 }} anmeldelser</li>
	               @if($user->businessLink)
	               	<li><img src="{{ asset('images/createit.png') }}">{{ $user->businessLink }}</li>
	               @endif
	               @if($user->city)
	               	<li><img src="{{ asset('images/kobenhawn.png') }}">{{ $user->city }}</li>
	               @endif
	               <li><img src="{{ asset('images/tilmted_tome.png') }}">Tilmeldt {{ $user->createdAt->format('F Y') }}</li>
	             </ul>
	             <h4><a href="{{ url('profile/user/' . $user->username) }}">Kontakt udbyder</a></h4>
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
			$('#adheadline').on('hidden.bs.modal', function () {
				$('.ad-headline span').text($('#adHeadline').val());
			});

			$('#adexchange').on('hidden.bs.modal', function () {
				$('.ad-exchange b').text($('#adExchange').val());
			});

			$('#adcreated').on('hidden.bs.modal', function () {
				$('.ad-created span').text($('#adCreated').val());
			});

			$('#addescription').on('hidden.bs.modal', function () {
				$('.ad-description p').text($('#adDescription').val());
			});
	</script>
	
@endsection
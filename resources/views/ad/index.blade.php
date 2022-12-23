@extends('layouts.app')



@section('metaTitle', 'Mine Annonces')



@section('content')

	<div class="profile_mail_ads">

	   <div class="container">

	    <div class="row">

	     <div class="col-md-12 col-sm-12 col-xs-12">

	    

	      <div class="col-md-3 col-sm-3 col-xs-12">

	        <div class="rune_peterson_profile_mail_ads">

	         <p>

	         	<img width="61" class="img-circle" src="{{ profile_image_link(Auth::user()->profilePic, 61, 61) }}">

	         	@if(Auth::user()->isVip == 1)

	           		<span class="label label-primary">VIP</span>

				@endif

	         </p>

	         <h1>{{ Auth::user()->fName }} {{ Auth::user()->lName }}</h1>

	         <!--<span>{{ '@' . Auth::user()->username }}</span> -->

	        </div>

	        <div class="announce_mail_ads">

	          <p><img src="{{ asset('images/announcer_mail_ads.png') }}">{{ $allAds }} annoncer</p>

	          <p><img src="{{ asset('images/favorate_star_ads.png') }}">{{ count(Auth::user()->favorite_ads) }} favorit annoncer</p>

	          <p><img src="{{ asset('images/active_ads.png') }}">{{ $activeAds }} aktive annoncer</p>

	          <p><img src="{{ asset('images/inactive_ads.png') }}">{{ $inactiveAds }} inaktive annoncer</p>

	          <h2><a href="{{ url('ad/create') }}">Opret annonce</a></h2>

	        </div>

	      </div>

	      

	      <div class="col-md-9 col-sm-9 col-xs-12">

	          

	          <div class="Profiler_section_head">

	           <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section">

	            <h1>Mine annoncer ({{ $allAds }})</h1>

	           </div>

	           <div class="col-md-8 col-sm-8 col-xs-12 padd_ina_rosen_section">

	            <p>

	            	<a href="{{ url('ads') }}"><span>Alle annoncer</span></a>

	            	<a href="{{ url('ads/active') }}"><span>Aktive annoncer</span></a>

	            	<a href="{{ url('ads/inactive') }}"><span>Inaktive annoncer</span></a>

	            </p>

	           </div>

	          </div>

	          

	         <div class="table-responsive Profile_mail_ads_table">          

	              <table class="table">

	                <thead>

	                  <tr style="background:#e0e0dc;border-bottom:1px solid #e0e0dc;">

	                    <th>Annonce</th>

	                    <th></th>

	                    <th>Type</th>

	                    <th>Favoriter</th>

	                    <th>Udløber</th>

	                    <th></th>

	                  </tr>

	                </thead>

	                <tbody>

					

	                	@foreach($ads as $ad)

		                  <tr>

		                    <td>

		                     <p class="announce_category_p"><img width="80" src="{{ asset(Croppa::url('uploads/' . returnFeaturedImage($ad->adImages), 80,80)) }}"></p>

		                    </td>

		                    <td>

		                     <div class="announce_category_ad">

		                      <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>

		                      <h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>

		                      <p class="byterr_green"><img src="{{ asset('images/vector_byter.png') }}">Bytter med {{ $ad->inExchange }}</p>

		                      <p class="operatted_den"><img src="{{ asset('images/operated_category.png') }}">Oprettet den {{ $ad->createdAt->format('d/m-Y') }}</p>

		                     </div>

		                    </td>
		                    <td> <p style="text-transform: capitalize;">@if(count($ad->transactions) > 0) {{ $ad->transactions[0]->txnType }} @else {{ 'Gratis' }} @endif</p></td>

		                    <td>{{ count($ad->favorite_by_user) }}</td>

		                    <td>

								@if(count($ad->transactions))

								

								<?php

								//print_r($ad->transactions);

		                    		$c = count($ad->transactions) ;

									echo $ad->transactions[$c-1]->endDate ;

									

									?>

		                    	@else

		                    		-

		                    	@endif

							</td>

		                    <td>

							@if(count($ad->transactions) > 0 && @$ad->transactions[0]->txnType != 'free') 

		                    	<a style="display:block;margin-bottom: 10px;margin-top:15px;" href="#" onClick="renew_ad({{$ad->id}}, '{{$ad->transactions[0]->txnType}}')">

		                    		<?php // TODO renew ad ?>

		                    		<img title="Renew Announce" src="{{ asset('images/forny_announce.png') }}">

		                    	</a>

							@endif

		                    	<a href="{{ url('ad/' . $ad->id . '/edit') }}">

		                    		<img title="Edit Announce" src="{{ asset('images/rediger_announce.png') }}">

		                    	</a>

		                    </td>

		                  </tr>

		            	@endforeach

	                  

	                </tbody>

	                   

	              </table>

	           </div>

	           

	         <div class="Profiler_section_head Mine_favoritter">

	           <div class="col-md-12 col-sm-12 col-xs-12 padd_ina_rosen_section">

	            <h1>Mine favoritter ({{ count(Auth::user()->favorite_ads) }})</h1>

	           </div>

	          </div>

	          

	          <div class="table-responsive Profile_mail_ads_table Profile_mail_ads_table_bottom">          

	              <table class="table">

	                <thead>

	                  <tr style="background:#e0e0dc;border-bottom:1px solid #e0e0dc;">

	                    <th>Annonce</th>

	                    <th></th>

	                    <th>Favoriter</th>

	                    <th>Udløber</th>

	                    <th></th>

	                  </tr>

	                </thead>

	                <tbody>

	                  @foreach(Auth::user()->favorite_ads as $favorite)

		                  <tr>

		                    <td>

		                     <p class="announce_category_p"><img width="80" src="{{ asset('uploads/' . $favorite->ad->adImages[0]->image) }}"></p>

		                    </td>

		                    <td>

		                     <div class="announce_category_ad">

		                      <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>

		                      <h1><a href="{{ url('ad/' . $favorite->ad->id . '/detail') }}">{{ $favorite->ad->adHeadline }}</a></h1>

		                      <p class="byterr_green"><img src="{{ asset('images/vector_byter.png') }}">Bytter med {{ $favorite->ad->inExchange }}</p>

		                      <p class="operatted_den"><img src="{{ asset('images/operated_category.png') }}">Oprettet den {{ $favorite->ad->createdAt->format('d/m-Y') }}</p>

		                     </div>

		                    </td>

							

		                    <td>{{ count($favorite->ad->favorite_by_user) }}</td>

		                    <td>

								@if(count($ad->transactions))

		                    		{{ $ad->transactions[0]->endDate }}

		                    	@else

		                    		-

		                    	@endif

							</td>

		                    <td>

		                    	<a style="display:block;margin-bottom: 10px;margin-top:15px;" href="#" ">

		                    		<?php // TODO renew ad ?>

		                    		<img title="Renew Announce" src="{{ asset('images/forny_announce.png') }}">

		                    	</a>

		                    	<a href="{{ url('ad/' . $favorite->ad->id . '/edit') }}">

		                    		<img title="Edit Announce" src="{{ asset('images/rediger_announce.png') }}">

		                    	</a>

		                    </td>

		                  </tr>

	                  @endforeach

	                </tbody>

	                   

	              </table>

	           </div>

	      

	      </div>

	          

	      </div>

	      

	     </div>

	    </div>

	   </div>

	</div>

	  	<script>

			var renew_ad = function(ad_id, package_name){

				var form = new FormData();

				form.append('_token', '{{ csrf_token() }}');

				form.append('package', package_name);

				form.append('ad_id', ad_id);

				$.ajax({

					url: "{{url('/ad/get_payment_link')}}",

					type: 'POST',

					data:form,

					processData:false,

					contentType: false,

					beforeSend:function(){

						var conf = confirm('This will redirect you to the payment page, click Ok to continue!');

							

						if(conf !== true){

							return false;

						}

					},

					success:function(response){

						var data = $.parseJSON(response);

						if(data.status == true){

							window.open(data.data.payment_link, '_blank');

						}else{

							alert('Something went wrong');

						}

					}

				});

			}

		</script>

@if (session('status'))

		<script>

			alert('{{session("status")}}');

		</script>

		@endif

@endsection
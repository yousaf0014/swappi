@extends('layouts.app')



@section('metaTitle', 'Find Annonces')



@section('content')

	<div class="profile_mail_ads">

	   <div class="container">

	    <div class="row">

	     <div class="col-md-12 col-sm-12 col-xs-12">

	     

	      <div class="col-md-3 col-sm-3 col-xs-12">

	      	<div class="category_page_section_left">

		      	<form action="{{ url()->current() }}" method="get" id="main_form">

		      		{{ csrf_field() }}

			        <div class="input_search_profile_find">

			         <input type="text" name="ad_search" placeholder="Søg efter Annoncer" value="{{ empty($fields) ? '' : $fields['ad_search'] }}">

			        </div>

			        <?php /*

			        <div class="Regioner_section_find_profile">

			         <h1>Skills</h1>

			         <div class="Regioner_inner_section">

			         	@foreach($skills as $skill)

			           		<label><input type="checkbox"

			           		@if(isset($fields['skills']))

			           			@if(in_array($skill->id, $fields['skills']))

			           				checked="checked"

			           			@endif

			           		@endif

			           		 name="skills[]" value="{{ $skill->id }}">{{ $skill->skillName }}</label></br>

			           	@endforeach

			         </div>

			        </div>*/ ?>

			        <div class="Regioner_section_find_profile">

			         <h1>Kategorier</h1>

			         <div class="Regioner_inner_section">

			         	@foreach($categories as $category)

			           		<div class="check_box_check"><input type="checkbox" class="regular-checkbox" id="check-{{$category->id}}"

			           		@if(isset($fields['categories']))

			           			@if(in_array($category->id, $fields['categories']))

			           				checked="checked"

			           			@endif

			           		@endif

			           		 name="categories[]" value="{{ $category->id }}">{{ $category->categoryName }}<label for="check-{{$category->id}}"></label></div>

			           	@endforeach

			         </div>

			        </div>

			        <div class="Vis_flere_btn_profile">

			        	<button type="submit" name="find" class="btn btn-link" value="ad" style="padding: 0;"><span>Find</span></button>

			        </div>

			  	</form>

			</div>

	      </div>

	      

	      <div class="col-md-9 col-sm-9 col-xs-12">

	          

	          <div class="Profiler_section_head">

	           <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section">

	            <h1>Annoncer ({{ $ads->total() }})</h1>

	           </div>	           

	          </div>

	          

	         <div class="table-responsive Profile_mail_ads_table">          

	              <table class="table" id="ads-table">

	                <thead>

	                  <tr style="background:#e0e0dc;border-bottom:1px solid #e0e0dc;">

	                    <th>Annonce</th>

	                    <th></th>

	                    <!-- <th>Type</th> -->

	                    <th>Favoritter</th>

	                    <th>Udløber</th>

	                    <th></th>

	                  </tr>

	                </thead>

	                <tbody>

	                	@forelse($ads as $ad)

	                		

			                  <tr class="{{$ad->transactions[0]->txnType}}">

			                    <td>

			                     <p class="announce_category_p"><img width="80" src="{{ profile_image_link(returnFeaturedImage($ad->adImages), 90, 90) }}"></p>

			                    </td>

			                    <td>

			                     <div class="announce_category_ad">

			                      <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>

			                      <h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>

			                      <p class="byterr_green"><img src="{{ asset('images/vector_byter.png') }}">Bytter med {{ $ad->inExchange }}</p>

			                      <p class="operatted_den"><img src="{{ asset('images/operated_category.png') }}">Oprettet den {{ $ad->createdAt->format('d/m-Y') }}</p>

			                     </div>

			                    </td>

			                    <!-- <td> -->
			                    
			                    <!-- </td> -->

			                    <td>{{ count($ad->favorite_by_user) }}</td>

			                    <td>

			                    	@if(count($ad->transactions))

			                    		{{ $ad->transactions[count($ad->transactions)-1]->endDate }}
			                    			@if(count($ad->transactions) > 0)
			                    			@if($ad->transactions[0]->txnType == 'free')

					                    		@elseif($ad->transactions[0]->txnType == 'premium')
					                				<div style="margin-top: 2em;text-align: left;" >
					                    		   		<p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -25px;">    		
					                    				Top annonce 
					                    				</p>
					                    			</div>

					                    		@elseif($ad->transactions[0]->txnType == 'gold')
					                				<div style="margin-top: 2em;text-align: left;" >
					                    		   		<p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -25px;">    		
					                    				Fremhævet annonce 
					                    				</p>
					                    			</div>
					                    		@else 
					                    			<div style="margin-top: 2em;text-align: left;" >
					                    		   		<p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -25px;">    
					                    				{{$ad->transactions[0]->txnType}}
					                    				</p>
					                    			</div>
					                    		@endif

					                    	@endif

			                    	@else

			                    		

			                    	@endif

			                    </td>

			                    <td>

			                    	<a class="btn btn-primary" href="{{ url('ad/' . $ad->id . '/detail') }}">Detaljer</a>		        
			                    	           
				                    	<!--</p>      	
			                    	</div> -->
			                    </td>

			                  </tr>

			            	

		                @empty

		                	<tr><td colspan="6">Ingen annoncer fundet</td></tr>

		            	@endforelse

	                  

	                </tbody>

	                <tfoot>

	                	@if($ads->total() > 20)

		                	<tr>

		                		<td colspan="6" align="center">

		                			<div class="Hent_btn_table">

		                				<span id="see-more-ads" data-currentpage="2">Hent flere annoncer</span>

		                			</div>

		                		</td>

		                	</tr>

		                @endif

	                </tfoot>

	                   

	              </table>

	           </div>

	           

	      </div>

	          

	      </div>

	      

	     </div>

	    </div>

	   </div>

	</div>

	

@endsection



@section('scripts')
	<style type="text/css">
		.premium{
			background: #e6edf5 !important;
		}
	</style>
	<script>

		$(document).ready(function(){



			$('#see-more-ads').on('click', function(){

				var token = $('[name="_token"]').val();

				var current = $('#see-more-ads').attr('data-currentpage');



				//Make ajax call

				$.ajax({

					url: "{{ url('ad/get_ads/?page=') }}"+current,

					method: "GET",

					headers: {'X-CSRF-TOKEN': token},

				}).done(function(data) {

					current++;

					$('#see-more-ads').attr('data-currentpage', current);

					

					if(data.indexOf("false") > -1){

						$('#see-more-ads').hide();

						$('#ads-table tbody').append('<tr><td colspan="6" align="center">Ingen annoncer fundet</tr></td>');

					}else{

						$('#ads-table tbody').append(data);

  					}

				});

			});

		 });

		$('#main_form').on('submit', function(e){
			if($('#main_form input[name=ad_search]').val() == '' ){
				$('.error-rm').remove();
				$('input[name=ad_search]').focus();
				$('#main_form input[name=ad_search]').closest('div').append('<p class="error-rm text-danger"><i class="fa fa-times"></i> Indtast nogle søgeord</p>');
				e.preventDefault();
			}
		});
	 </script>

@endsection
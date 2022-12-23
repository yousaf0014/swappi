@extends('layouts.app')

@section('metaTitle', 'Category')

@section('content')
	
	<div class="category_page_section">
	   <div class="container">
	    <div class="row">
	     <div class="col-md-12 col-sm-12 col-xs-12">
	     
	     	<div class="col-md-3 col-sm-3 col-xs-12">
		       <div class="category_page_section_left">
		       	<form method="get" action="">
		       		{{ csrf_field() }}
		       		<?php // TODO form working ?>
		       		<?php /* ?>
			        <div class="advocate_category">
			         <p>
			         	<img src="{{ asset('images/category_vector_advocate.png') }}">
			         	{{ $category->categoryName }} <label style="font-size:13px;">{{ count($category->ads) }} tilgængelig</label>
			         	<img src="{{ asset('images/vector_ad_icon.png') }}">
			         </p>
			        </div>
			        <?php */ ?>
			        <!-- Single button -->

					<div class="advocate_category btn-group">
						<p class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				         	<img src="{{ asset('images/category_vector_advocate.png') }}">
				         	{{ $category->categoryName }} 
				         	<label style="font-size:13px;">{{ count($category->ads) }} tilgængelig</label>
				         	<img src="{{ asset('images/vector_ad_icon.png') }}">
				        </p>
						<ul class="dropdown-menu">
							@foreach($count as $cat)
								<li><a href="{{ url('category/' . $cat->slug) }}">{{ $cat['categoryName'] }} ({{ $cat['ads_count'] }}) tilgængelig</a></li>
							@endforeach
						</ul>
					</div>
		        
			        <!-- <div class="Regioner_section">
			          <h1>Regioner</h1>
			          @foreach($cities as $city)
			          	@if($city->city)
                       
				          <div class="check_box_check">
				          	<input type="checkbox" class="regular-checkbox" id="check-{{$city->city}}" name="cities" value="{{ $city->city }}">{{ $city->city }}<label for="check-{{$city->city}}"></label>
				          </div>
				        @endif
			          @endforeach
			      	</div> -->
		      
					<div class="Kompetencer_section">
				      	<h1>Kompetencer</h1>
				      	<div class="skills-container">
				      		<div class="skills-container-scroll">
				      		@foreach($category->skills as $skill)
                            
                             <div class="check_box_check">
				          	<input type="checkbox" class="regular-checkbox" id="kon-{{$skill->id}}" name="skills[]" value="{{ $skill->id }}">{{ $skill->skillName}}<label for="kon-{{$skill->id}}"></label>
				          </div>
                            
					          <!--<div class="checkbox">
					           <label><input type="checkbox" name="skills[]" value="{{ $skill->id }}">{{ $skill->skillName }}</label>
					          </div>-->
					        @endforeach
					        </div>
					    </div>
				      </div>
		      
		      		<p class="Vis_flere"><span>Vis flere</span></p>
		      
					<div class="Periode_section">
				         <h1>Periode</h1>
				         <div class="button-holder">
                         	<input type="radio" id="radio-1-1" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 1 ? 'checked' : '';?> value="1" />
            				<label for="radio-1-1"></label>I dag ({{ $todayCount }})
				         </div>
                         
                         <div class="button-holder">
                         	<input type="radio" id="radio-1-2" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 2 ? 'checked' : '';?> value="2" />
            				<label for="radio-1-2"></label>Siden igår ({{ $yesterdayCount }})
				         </div>
                         
                         <div class="button-holder">
                         	<input type="radio" id="radio-1-3" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 3 ? 'checked' : '';?> value="3" />
            				<label for="radio-1-3"></label>De seneste 3 dage ({{ $threeDayCount }})
				         </div>
                         
                         <div class="button-holder">
                         	<input type="radio" id="radio-1-4" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 7 ? 'checked' : '';?> value="7" />
            				<label for="radio-1-4"></label>De seneste 7 dage ({{ $weekCount }})
				         </div>
                         
                         <div class="button-holder">
                         	<input type="radio" id="radio-1-5" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 14 ? 'checked' : '';?> value="14" />
            				<label for="radio-1-5"></label>De seneste 14 dage ({{ $towWeeksCount }})
				         </div>
                         
                         <div class="button-holder">
                         	<input type="radio" id="radio-1-6" name="range" class="regular-radio" <?=isset($_GET['duration']) && $_GET['duration'] == 'all' ? 'checked' : '';?> value="all" />
            				<label for="radio-1-6"></label>Alle dage ({{ $allCount }})
				         </div>
                         
                         
				         <!--<div class="radio">
				           <label><input type="radio" name="range" value="2" <?=isset($_GET['duration']) && $_GET['duration'] == 2 ? 'checked' : '';?>>Siden igår ({{ $yesterdayCount }})</label>
				         </div>
				        <div class="radio">
				          <label><input type="radio" name="range" value="3" <?=isset($_GET['duration']) && $_GET['duration'] == 3
				           ? 'checked' : '';?>	>De seneste 3 dage ({{ $threeDayCount }})</label>
				        </div>
				         <div class="radio">
				           <label><input type="radio" name="range" value="7" <?=isset($_GET['duration']) && $_GET['duration'] == 7 ? 'checked' : '';?>>De seneste 7 dage ({{ $weekCount }})</label>
				         </div>
				         <div class="radio">
				           <label><input type="radio" name="range" value="14" <?=isset($_GET['duration']) && $_GET['duration'] == 14 ? 'checked' : '';?>>De seneste 14 dage ({{ $towWeeksCount }})</label>
				         </div>
				        <div class="radio">
				          <label><input type="radio" name="range" value="all" <?=isset($_GET['duration']) && $_GET['duration'] == 'all' ? 'checked' : '';?>>Alle dage ({{ $allCount }})</label>
				        </div>-->
			      </div>
			    </form>
		        
		       </div>
		    </div>
		      
	      
			<div class="col-md-9 col-sm-9 col-xs-12 pull-right">
		        <div class="category_page_section_right">
		        
		          <div class="Søger_advokat_section">
		          	@if($category->categoryImage)
		            	<span><img src="{{ asset('uploads/' . $category->categoryImage) }}" style="width:100%;"></span>
		            @endif
		            @if($category->categoryTitle)
		            	<h1>{!! $category->categoryTitle !!}</h1>
		            @endif
		            <p>{{ $category->categoryDescription }}</p>
		          </div>
		          
		          <div class="category_Advokat_søges">
		          	@foreach($catAds as $ad)
			           <div class="col-md-4 col-sm-12 col-xs-12 Advokat_søges">
			             <div class="Udbyder_star">
			             	<h5>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></h5>
			             	<span class="ad-favorite-icon" data-ad-id="{{ $ad->id }}">
							  	<!-- <i class="fa fa-star" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i> -->
							  	<span class="fa-stack fa-lg">
					        		<i class="fa fa-circle fa-stack-2x" style="color: #ffffff;"></i>
					        		<i class="fa fa-star fa-stack-1x" aria-hidden="true" style="color: #bbbbbb;font-size:15px;"></i>
				        		</span>
							</span>
			             </div>
			             <h1>{{ $ad->adHeadline }}</h1>
			             <p><img src="{{ asset('images/vector_byter.png') }}">Bytter med <b>{{ $ad->inExchange }}</b></p>
			             <div class="kontact_date_annoc">
			               <h4><img src="{{ asset('images/date_advoc.png') }}"> {{ $ad->createdAt->format('d/m-Y') }}</h4>
			               <a href="{{ url('ad/' . $ad->id . '/detail') }}" class="btn-link"><span>Kontakt</span></a>
			             </div>
			             <div class="bottom_section_advocate">
			             </div>
			           </div>
			         @endforeach
		          </div>
		          
		          <div class="category_Annoncer_section">
		             <h1>Annoncer (<span id="count">{{ $ads->total() }}</span>) <?=isset($_GET['duration']) && $_GET['duration'] != '' ? $_GET['duration'].' dage' : '';?></h1>
		            <div class="table-responsive">          
		              <table class="table" id="ads-table">
		                <thead>
		                  <tr style="background:#edede8;border-bottom:1px solid #e0e0dc;">
		                    <th>Annonce</th>
		                    <th>Favoritter</th>
		                    <th>Udløber</th>
		                  </tr>
		                </thead>
		                <tbody id="ajax_filter">
		                	@forelse($ads as $ad)
								<tr>
									<td>
									 <p class="announce_category_p"><img width="80" src="{{ asset('uploads/' . returnFeaturedImage($ad->adImages)) }}"></p>
									 <div class="announce_category_ad">
									  <p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>
									  <h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>
									  <p class="byterr_green"><img src="{{ asset('images/vector_byter.png') }}">Bytter med {{ $ad->inExchange }}</p>
									  <p class="operatted_den"><img src="{{ asset('images/operated_category.png') }}">Oprettet den {{ $ad->createdAt->format('d/m-Y') }}</p>
									 </div>
									</td>
									<td>{{ count($ad->favorite_by_user) }}</td>
									<td>
										@if(count($ad->transactions))
				                    		{{ $ad->transactions[0]->endDate }}
				                    	@else
				                    		-
				                    	@endif
			                    	</td>
								</tr>
			                	
			                @empty
			                	<tr><td colspan="3" align="center">No records found</td></tr>
			                @endforelse
		                  
		                </tbody>
		                <tfoot>
		                	@if($ads->total() > 10)
			                	<tr>
			                		<td colspan="3" align="center">
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
	  </div>
	  
	
@endsection

@section('scripts')
	
	<!-- custom scrollbar stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">

	<style type="text/css">
		.skills-container {
		    height: 132px;
		    overflow: hidden;
		}
		.Vis_flere{
			cursor: pointer;
		}
		.category_page_section_right strong {
		    font-family: 'Lato-Semibold';
		}
		.skills-container .mCSB_draggerRail {
		    opacity: 1;
		    background-color: rgba(0,0,0,1) !important;
		    filter: unset !important;
		}

	</style>

	<!-- custom scrollbar plugin -->
	<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	
	<script>
		(function($){
			$(window).on("load",function(){
				
				$(".skills-container-scroll").mCustomScrollbar({
					theme:"minimal"
				});
				
			});
		})(jQuery);
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('.Vis_flere').on('click', function(){
				$('.skills-container').css({'height':'auto'});
				$('.skills-container-scroll').css({'height':'150px'});
				$(this).hide();
			});

			$('#see-more-ads').on('click', function(){
				var token = $('[name="_token"]').val();
				var current = $('#see-more-ads').attr('data-currentpage');

				//Make ajax call
				$.ajax({
					url: "{{ url('category/get_ads/'.$category->slug.'?page=') }}"+current,
					method: "GET",
					headers: {'X-CSRF-TOKEN': token},
				}).done(function(data) {
					current++;
					$('#see-more-ads').attr('data-currentpage', current);
					
					if(data.indexOf("false") > -1){
						$('#see-more-ads').hide();
						$('#ads-table tbody').append('<tr><td colspan="3" align="center">No more ads to show</tr></td>');
					}else{
						$('#ads-table tbody').append(data);
  					}
				});
			});
		   
			$('.ad-favorite-icon').on('click', function(){
				var adid = $(this).attr('data-ad-id');
				var token = $('[name="_token"]').val();
				var $that = $(this);
				@if(Auth::check())
					//Make ajax call
					$.ajax({
						url: "{{ url('ad/favorite') }}",
						method: "POST",
						headers: {'X-CSRF-TOKEN': token},
	 					data: {'ad': adid, 'user': "{{ Auth::user()->id }}"}
					}).done(function(data) {
						data = $.parseJSON(data);
						
						$that.find('.fa-circle').css({'color':'green'});
						$that.find('.fa-star').removeClass('fa-star').addClass('fa-check').css({'color':'#ffffff'});
						$('body').append('<div class="favorite alert alert-success">'+data.msg+'</div>');

						setInterval(remove_alert, 1000);
					});
				@else
					alert('Please login to mark favorite.');
				@endif
			});

			function remove_alert(){
				$('.alert').remove();
			}
			
		 });
	 </script>
	
	 <script>
	 var radio_range = $('input[name=range]');

	 $('input[name=range]').on('click', function(e){
	 	var value = $('input[name=range]:checked').val();
	 	var url = "{{url('/').'/'.Request::path()}}"+ "?duration="+value;
	 	location.replace(url);
	 	
	 });

	 $('input:checkbox').on('change', function(){
	 	var form = new FormData();
	 	var arr = $('[name="skills[]"]:checked').map(function(){
	        return this.value;
	    }).get();
	    console.log(arr);
	 	form.append('skills', arr);
	 	form.append('slug', '{{$slug}}');
	 	form.append('_token', '{{csrf_token()}}');
	 	$.ajax({
	 		url: '{{url('/category/filter')}}',
	 		data:form,
	 		type:"POST",
	 		processData:false,
	 		contentType:false,
	 		success:function(response){
	 			var data = $.parseJSON(response);
	 			$('#count').html(data.count);
 				$('#ajax_filter').html(data.data);
	 		},
	 		complete:function(){

	 		}
	 	});
	 });
	 </script>
@endsection
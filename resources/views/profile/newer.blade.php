@extends('layouts.app')

@section('metaTitle', 'Find profiler')

@section('content')
	<div class="profile_find_profile_section">
    <div class="container">
     <div class="row">
     
      <div class="col-md-12 col-sm-col-xs-12">
       <div class="col-md-3 col-sm-3 col-xs-12">
       	<form action="{{ url()->current() }}" method="get">
	        
	        <div class="input_search_profile_find">
	         <input type="text" name="firstName" placeholder="Søg efter profil" value="{{ empty($fields) ? '' : $fields['firstName'] }}">
	        </div>
	        <!-- <div class="Regioner_section_find_profile">
	          <h1>Regioner</h1>
	          <div class="Regioner_inner_section">
	          	@foreach($cities as $city)
	          		@if($city->city)
                    <div class="check_box_check">
	           			<input type="checkbox" id="check-{{$city->city}}"
	           				@if(isset($fields['cities']))
		           				@if(in_array($city->city, $fields['cities']))
		           					{{ 'checked="checked"' }}
		           				@endif
		           			@endif
	           			name="cities[]" class="regular-checkbox " value="{{ $city->city }}">{{ $city->city }}<label for="check-{{$city->city}}"></label>
                        </div> 
	           		@endif
	           	@endforeach
	          </div>
	        </div> -->
	        <div class="Regioner_section_find_profile">
	          <h1>Kompetencer</h1>
	          <div class="Regioner_inner_section">
	          	@foreach($categories as $category)
                	<div class="check_box_check">
	           		<input type="checkbox" id="check-{{$category->id}}"
	           			@if(isset($fields['categories']))
	           				@if(in_array($category->id, $fields['categories']))
	           					{{ 'checked="checked"' }}
	           				@endif
	           			@endif
	           		 name="categories[]" class="regular-checkbox " value="{{ $category->id }}">{{ $category->categoryName }}<label for="check-{{$category->id}}"></label>
                     </div>
	           	@endforeach
	          </div>
	        </div>
	        
	        <div class="Vis_flere_btn_profile">
	        	<span>Vis flere</span>
	        	{{ csrf_field() }}
	        	<button type="submit" name="find" class="btn btn-link" value="profile"><span>Find</span></button>
	        </div>
   		</form>
        
       </div>
       <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="profile_find_profile_section_find">
        
          <div class="Profiler_section_head">
           <div class="col-md-4 col-sm-4 col-xs-12 padd_ina_rosen_section">
            <h1>Profiler ({{ count($users) }})</h1>
           </div>
           <div class="col-md-8 col-sm-8 col-xs-12 padd_ina_rosen_section">
            <p>
            	<a href="{{ url('profile/search') }}"><span>Alle profiler</span></a>
            	<a href="{{ url('profile/newer') }}"><span>Nye profiler</span></a>
            	<a href="{{ url('profile/popular') }}"><span>Populære profiler</span></a>
            </p>
           </div>
          </div>
          
          <div class="table_profile_find">
            <div class="table-responsive">          
            	<table class="table" id="users-con">
	                <thead>
	                  <tr>
	                    <th></th>
	                    <th></th>
	                    <th>Kompetencer</th>
	                    <th>Forbindelser</th>
	                    <th></th> 
	                  </tr>
	                </thead>
	                <tbody>
	                	
	              	</tbody>
	            
	            </table>
            </div>
            <div class="Vis_hele_erfaringen">
            	<span id="see-more-users" data-currentpage="" style="cursor: pointer;">Vis hele erfaringen</span>
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
	<script type="text/javascript">

	 	$(document).ready(function(){
			var token = $('[name="_token"]').val();

				//Make ajax call
			$.ajax({
				url: "{{ url('profile/get_newer_users') }}",
				method: "GET",
				headers: {'X-CSRF-TOKEN': token},
			}).done(function(data) {
				$('#see-more-users').attr('data-currentpage', '2');
				$('#users-con tbody').html(data);
			});

			$('#see-more-users').on('click', function(){
				var token = $('[name="_token"]').val();
				var current = $('#see-more-users').attr('data-currentpage');

				//Make ajax call
				$.ajax({
					url: "{{ url('profile/get_newer_users?page=') }}"+current,
					method: "GET",
					headers: {'X-CSRF-TOKEN': token},
				}).done(function(data) {
					current++
					$('#see-more-users').attr('data-currentpage', current);
					
					if(data.indexOf("false") > -1){
						$('#see-more-users').hide();
						$('#users-con tbody').append('<tr><td align="center" colspan="5">No more users to show</td></tr>');
					}else{
						$('#users-con tbody').append(data);
  					}
				});
			});
		});
	</script>
@endsection
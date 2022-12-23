@forelse($categories as $category)

  	<div class="col-md-3 col-sm-3 col-xs-12 fotograph">

  		<a href="{{ url('category/' . $category->slug) }}">

  			@if($category->categoryIcon)

      			<p><img src="{{ asset('uploads/' . $category->categoryIcon) }}"></p>

      		@else

      			<p><img src="{{ asset('images/MicrolyticIcon.jpg') }}"></p>

      		@endif

      		<h1>{{ count($category->userAds) }} tilgængelig</h1>

      		<span>{{ $category->categoryName }}</span>

  		</a>

  	</div>

@empty

false

@endforelse
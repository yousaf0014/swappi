@foreach($experiences as $experience)
            <div class="col-md-6 col-sm-6 col-xs-12 padd_erfaring" style="float: none;display: inline-grid;width: 49%;">
             <div class="Erfaring_section_left">
              <h2>{{ $experience->designation }}</h2>
              <span>{{ $experience->orgName }}</span>
              <p>{{ $experience->description }}</p>
			<!-- 	              TODO Recommendation count -->
	              <h3><img src="{{ asset('uploads/' . $experience->logo) }}"></h3>
	            </div>
	              <div class="july_date_erfaring">
	                <p><img src="{{ asset('images/juli_erfaring_icon.png') }}">{{ dateMonthLocale($experience->startDate->format('F')) }} {{ $experience->startDate->format('Y') }} – 
						{{ dateMonthLocale($experience->endDate->format('F')) }} {{ $experience->endDate->format('Y') }} 
						({{ dateDiff($experience->startDate, $experience->endDate) }})</p>
	                <span>{{ $experience->city }}, {{ $experience->country }}</span>
	              </div>
	            </div>
            @endforeach
@forelse($ads as $ad)
	<tr>
		<td>
			<p class="announce_category_p"><img width="80" src="{{ asset('uploads/' . returnFeaturedImage($ad->adImages)) }}"></p>
			<div class="announce_category_ad">
				<p>Udbyder : <a href="{{ url('profile/user/' . $ad->user->id) }}">{{ $ad->user->fName }}</a></p>
				<h1><a href="{{ url('ad/' . $ad->id . '/detail') }}">{{ $ad->adHeadline }}</a></h1>
				<p class="byterr_green">
					<img src="{{ asset('images/vector_byter.png') }}">Bytter med {{ $ad->inExchange }}
				</p>
				<p class="operatted_den">
					<img src="{{ asset('images/operated_category.png') }}">Oprettet den {{ $ad->createdAt->format('d/m-Y') }}
				</p>
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
false
@endforelse
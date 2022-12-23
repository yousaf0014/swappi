@forelse($users as $user)
  	<tr>
		<td>
		<p>
			<img width="80" class="img-circle" src="{{ profile_image_link($user->profilePic, 80, 80) }}">
			@if($user->isVip == 1)
		   		<span class="label label-primary">VIP</span>
		   @endif
		</p>
		@if($user->city)
			<p style="color: #8f8f8c;font-size: 10px;margin-top: 10px;text-align: center;"><img src="{{ asset('images/kobenhawn_find_icon.png') }}">{{ $user->city }}</p>
		@endif
		</td>
		<td style="width:25%;">
		    <h1>{{ $user->fName }} {{ $user->lName }}</h1>
		    @if(isset($user->experiences[0]))
		    	<h2>{{ $user->experiences[0]->designation }}</h2>
		    @endif
		    <p>
		    	{!! print_ratting(average_ratting($user->reviews)) !!}
		    	<span style="color:#8f8f8c;font-size:18px;font-family: 'Lato-Bold';">{{ average_ratting($user->reviews) }}/5 </span>- {{ count($user->reviews) }} anmeldelser
		    </p>
		    @if(isset($user->experiences[0]))
		    	<p><a href="#"><img width="61" src="{{ asset('uploads/' . $user->experiences[0]->logo) }}"></a></p>
		    @endif
		</td>
		<td style="width:25%;">
			@if(count($user->skills))
		    	@foreach($user->skills as $skill)
		    		<p>{{ $skill->skillName }}</p>
		    	@endforeach
		    	
		    	<?php /*<span>Se alle kompetencerne</span>*/ ?>
		    @else
		    	<span>Ingen Kompetencer</span>
			@endif
		</td>
		<td style="width:20%;">
			{{ count($user->friends) }}
		</td>
		<td>
			<a href="{{ url('profile/user/' . $user->id) }}" style="display:block;margin-bottom: 10px;margin-top:15px;">
				<img src="{{ asset('images/kontact_find_profilw.png') }}"> <!--  //Contact profile -->
			</a>
			@if(!in_array($user->id, $friendIds))
		    	<a href="{{ url('profile/request/' . $user->id) }}">
		    		<img src="{{ asset('images/folg_find_profile.png') }}">	<!-- //Follow profile -->
		    	</a>
		    @endif
		</td>
	</tr>
@empty
false
@endforelse
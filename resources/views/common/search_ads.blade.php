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


    <td>{{ count($ad->favorite_by_user) }}</td>

    <td>

    	@if(count($ad->transactions))

          {{ $ad->transactions[count($ad->transactions)-1]->endDate }}
            @if(count($ad->transactions) > 0)
            @if($ad->transactions[0]->txnType == 'free')

              @elseif($ad->transactions[0]->txnType == 'premium')
              <div style="margin-top: 2em;text-align: left;" >
                    <p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -36px;">       
                  Top annonce 
                  </p>
                </div>

              @elseif($ad->transactions[0]->txnType == 'gold')
              <div style="margin-top: 2em;text-align: left;" >
                    <p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -36px;">       
                  Fremhævet annonce 
                  </p>
                </div>
              @else 
                <div style="margin-top: 2em;text-align: left;" >
                    <p class="text-capitalize label label-primary label-lg" style="padding: 3px 6px;font-weight: 100; letter-spacing: 0.7px;position: relative;bottom: -36px;">    
                  {{$ad->transactions[0]->txnType}}
                  </p>
                </div>
              @endif

            @endif

        @endif

    </td>

    <td>

    	<a class="btn btn-primary" href="{{ url('ad/' . $ad->id . '/detail') }}">Detaljer</a>		                    	

    </td>

  </tr>



@empty

false

@endforelse
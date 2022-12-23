@foreach($reviews as $r => $review)
		<div class="Anmeldelser_inner_section">
               <div class="PSD_til_HTML5">
                <div class="PSD_til_HTML5_left">
                 <h3>{{ $review->reviewTitle }}</h3>
                 <span>Opgave løst : {{ dateMonthLocale($review->solutionDate->format('F')) }} {{ $review->solutionDate->format('d') }}, {{ $review->solutionDate->format('Y') }} </span>
                </div>
                <div class="PSD_til_HTML5_right">
                 {!! print_ratting($review->ratting) !!}
               </div>
             </div>
             <div class="Kristian_Wind_section">
               <div class="col-md-2 col-sm-2 col-xs-12">
                <img width="48" class="img-circle" src="{{ profile_image_link($review->user->profilePic, 48, 48) }}">
               </div>
               <div class="col-md-10 col-sm-10 col-xs-12">
                <h4>{{ $review->user->fName }} {{ $review->user->lName }}</h4>
                <?php //TODO tag line ?>
                <h5></h5>
                <h6>{{ $review->comment }}</h6>
				<p>Published {{ $review->createdAt->diffForHumans() }}</p>
               </div>

             </div>
          </div>
      @endforeach
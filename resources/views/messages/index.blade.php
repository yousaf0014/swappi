
        	<div class="msg-box-inner">
        		<div class="msg-boxes">
	        		@foreach ($messages as $k => $message)
	        			@if($k != 0)
		        			@if($message->createdAt->format('Ymd') != $messages[$k - 1]->createdAt->format('Ymd'))
		        				<h1>{{ $message->createdAt->format('d M') }}.</h1>
		        			@endif
		        		@else
		        			<h1>{{ $message->createdAt->format('d M') }}.</h1>
		        		@endif
	        			
	        			@if($message->sender_id === Auth::id())
	        				
	        				<div class="hej_torben_section">
					    		<div class="hej_torben col-md-10 col-sm-10 col-xs-12">
					        		<p>{!! nl2br($message->msgText) !!}</p>
					          </div>
					         </div>
					          <p class="time_right">{{ $message->createdAt->format('H.i') }}</p>
	        			@else
	        				
					         <div class="hej_rune_section">
					          <div class="hej_rune col-md-10 col-sm-10 col-xs-12">
					             <p>{!! nl2br($message->msgText) !!}</p>
					          </div>
					         </div>
					         <p class="time_left">{{ $message->createdAt->format('H.i') }}</p>
	        			@endif
	        			
	        		@endforeach
        		</div>
	        
		        <form class="msg-form" id="msg-form" action="{{ url('message/save') }}" method="post">
		        	{{ csrf_field() }}
		        	<input type="hidden" name="send" id="send" value="send">
		        	<input type="hidden" name="sender" id="sender_id" value="{{ $sender }}">
		        	<input type="hidden" name="reciever" id="reciever_id" value="{{ $reciever }}">
	        		<div class="textarea-cont">
	        			<textarea name="msgText" id="msgText" class="Skriv_din_meddelse_section" placeholder="Skriv din meddelse her ..."></textarea>
	        		</div>
	        		<div>
	        			<button class="btn-link" id="msgSend" name="msgSend" type="button" style="padding-left: 0;">
	        				<h6><i class="fa fa-spinner fa-pulse fa-fw hide loader" aria-hidden="true"></i> Send meddelse</h6>
	        			</button>
	        			<div class="form-response"></div>
	        		</div>
	        	</form>
	        		        
	       </div>
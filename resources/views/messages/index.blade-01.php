@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<table class="table table-striped table-condensed">
	        	@foreach ($messages as $message)
	        		<tr>
		        		<td @if($message->sender_id === Auth::id()) {{ 'class=text-right' }} @endif >
		        			<p>
		        			<img width="30" class="@if($message->sender_id === Auth::id()) {{ 'pull-right' }} @endif img-circle" src="{{ asset('uploads/' . $message->user->profilePic) }}">
		        			{{ $message->msgText }}
		        			<br><small>{{ $message->createdAt }}</small></p>
		        		</td>
		        	</tr>
	        	@endforeach
        	</table>
        	<form>
        		<div class="form-group">
        			<textarea name="" class="form-control"></textarea>
        		</div>
        		<div class="form-group">
        			<button class="btn btn-primary pull-right" type="button">Send</button>
        		</div>
        	</form>
		</div>
	</div>
</div>

@endsection
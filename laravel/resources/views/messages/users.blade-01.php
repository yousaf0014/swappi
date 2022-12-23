@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if (count($users) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Users
					</div>

					<div class="panel-body">
						<table class="table table-striped user-table">

							<!-- Table Headings -->
							<thead>
								<th>User Name</th>
								<th>Option</th>
							</thead>

							<!-- Table Body -->
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>
											<div>
												{{ $user->fName }} {{ $user->lName }}<br>
												<img width="45" src="{{ profile_image_link($user->profilePic) }}" />
											</div>
										</td>
										<td><a href="{{ url('message/user/'.$user->id) }}" class="btn btn-sm btn-primary">Message</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		
		</div>
		</div>
	</div>

@endsection

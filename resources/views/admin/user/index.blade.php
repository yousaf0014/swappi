@extends('admin.layouts.app')

@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	      <div class="col-lg-8">
	        <h2>Users</h2>
	        <ol class="breadcrumb">
	          <li> <a href="#">Home</a> </li>
	          <li class="active"> <strong>Users</strong> </li>
	        </ol>
	      </div>
	    </div>
	    
	    <div class="wrapper wrapper-content animated fadeInRight">
	      <div class="row">
	        <div class="col-lg-12">
	          <div class="ibox float-e-margins">
	            <div class="ibox-content">
	              @include('admin.error')
	              @include('admin.success')
	              <table class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" >
	                <thead>
	                  <tr>
	                    <th>Image</th>
						<th>Name</th>
						<th>Created</th>
						<th>Status</th>
						<th>Edit</th>
	                  </tr>
	                </thead>
	                <tbody>
						@foreach($users as $user)
							<tr>
								<td>
									<img width="50" class="img-circle" src="{{ asset('uploads/' . $user->profilePic) }}" alt="{{ $user->fName }} {{ $user->lName }}">
								</td>
								<td>
									{{ $user->fName }} {{ $user->lName }}
									@if($user->isVip)
										<br><br><span class="label label-success">{{ 'VIP' }}</span>
									@endif
								</td>
								<td>{{ $user->createdAt->format('d F Y') }}</td>
								<td>{!! status_icons($user->status) !!}</td>
								<td>
									<a class="opreation-icon" href="{{ url('admin/user/edit/' . $user->id) }}"><i class="fa fa-pencil"></i></a>
<!-- 									<a class="opreation-icon" href="#"><i class="fa fa-trash"></i></a> -->
								</td>
							</tr>
						@endforeach
					</tbody>
	              </table>
	              <div class="clearfix"></div>
	              {{ $users->links() }}
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	
@endsection
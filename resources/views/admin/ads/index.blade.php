@extends('admin.layouts.app')

@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	      <div class="col-lg-8">
	        <h2>Ads</h2>
	        <ol class="breadcrumb">
	          <li> <a href="#">Home</a> </li>
	          <li class="active"> <strong>Ads</strong> </li>
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
					
						<!-- Table Headings -->
						<thead>
							<th>Image</th>
							<th>Ad Headline</th>
							<th>In Exchange</th>
							<th>User</th>
							<th>Created</th>
							<th>Status</th>
							<th>Edit</th>
						</thead>
					
						<!-- Table Body -->
						<tbody>
							@foreach($ads as $ad)
								<tr>
									<td>
										@foreach($ad->adimages as $image)
											@if($image->isFeatured == 1)
												<img width="75" src="{{ asset('uploads/' . $image->image) }}">
											@endif
										@endforeach
									</td>
									<td>
										<a target="_blank" href="{{ url('ad/' . $ad->slug . '/detail') }}">{{ $ad->adHeadline }}</a>
										@if($ad->isFeatured)
											<br><br><span class="label label-success">{{ 'Featured' }}</span>
										@endif
									</td>
									<td>{{ $ad->inExchange }}</td>
									<td>{{ $ad->user->fName }}</td>
									<td>{{ $ad->createdAt->format('d F Y') }}</td>
									<td>{!! status_icons($ad->status) !!}</td>
									<td>
										<a class="opreation-icon" href="{{ url('admin/ad/edit/' . $ad->id) }}"><i class="fa fa-pencil"></i></a>
<!-- 										<a class="opreation-icon" href="#"><i class="fa fa-trash"></i></a> -->
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $ads->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
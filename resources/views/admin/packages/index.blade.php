@extends('admin.layouts.app')
@section('metaTitle', 'All Packages')
@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	      <div class="col-lg-8">
	        <h2>Packages</h2>
	        <ol class="breadcrumb">
	          <li> <a href="{{url('admin')}}">Home</a> </li>
	          <li class="active"> <strong>Packages</strong> </li>
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
						<th>Name</th>
						<th>Price</th>
						<th>Created</th>
						<th>Edit</th>
	                  </tr>
	                </thead>
	                <tbody>
					
						@foreach($packages as $package)
							<tr>
								<td>{{ $package->package_name }}</td>
								<td>{{ $package->package_price }}</td>
								<td>{{ $package->createdAt->format('d F Y') }}</td>
								<td>
									<a class="opreation-icon" href="{{ url('admin/package/edit/' . $package->id) }}"><i class="fa fa-pencil"></i></a>
<!-- 									<a class="opreation-icon" href="#"><i class="fa fa-trash"></i></a> -->
								</td>
							</tr>
						@endforeach
					</tbody>
	              </table>
	              <div class="clearfix"></div>
	             
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	
@endsection
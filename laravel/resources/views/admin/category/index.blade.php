@extends('admin.layouts.app')

@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	      <div class="col-lg-8">
	        <h2>Categories</h2>
	        <ol class="breadcrumb">
	          <li> <a href="#">Home</a> </li>
	          <li class="active"> <strong>Categories</strong> </li>
	        </ol>
	      </div>
	      <div class="col-lg-4"><a class="btn btn-primary adduser-btn" href="{{ url('admin/category/create') }}">Add</a> </div>
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
						@foreach($categories as $category)
							<tr>
								<td>
									<img width="75" src="{{ asset('uploads/' . $category->categoryImage) }}" alt="{{ $category->categoryName }}">
								</td>
								<td>{{ $category->categoryName }}</td>
								<td>{{ $category->createdAt->format('d F Y') }}</td>
								<td>{!! status_icons($category->status) !!}</td>
								<td>
									<a class="opreation-icon" href="{{ url('admin/category/edit/' . $category->id) }}"><i class="fa fa-pencil"></i></a>
<!-- 									<a class="opreation-icon" href="#"><i class="fa fa-trash"></i></a> -->
								</td>
							</tr>
						@endforeach
					</tbody>
	              </table>
	              <div class="clearfix"></div>
	              {{ $categories->links() }}
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	
@endsection
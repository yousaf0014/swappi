@extends('admin.layouts.app')
@section('metaTitle', 'All Pages')
@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	      <div class="col-lg-8">
	        <h2>Pages</h2>
	        <ol class="breadcrumb">
	          <li> <a href="{{url('admin')}}">Home</a> </li>
	          <li class="active"> <strong>Pages</strong> </li>
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
						<th>Content</th>
						<th>Created</th>
						<th>Action</th>
	                  </tr>
	                </thead>
	                <tbody>
					
						@foreach($pages as $page)
							<tr>
								<td>{{ $page->page_name }}</td>
								<td>{{ substr(strip_tags($page->page_content), 0, 200).'..' }}</td>
								<td>{{ $page->createdAt->format('d F Y') }}</td>
								<td width="100">
									<center>
									<a class="opreation-icon" href="{{ url('admin/page/edit/' . $page->id) }}"><i class="fa fa-pencil"></i></a>
									<a class="opreation-icon" href="{{ url('p/' . $page->page_identifier) }}" target="_blank"><i class="fa fa-eye"></i></a>
									</center>
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
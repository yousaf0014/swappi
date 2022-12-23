@extends('admin.layouts.app')

@section('content')

	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Skills</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Skills</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a class="btn btn-primary adduser-btn" href="{{ url('admin/skill/create') }}">Add</a> </div>
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
								<th>Name</th>
								<th>Category</th>
								<th>Created</th>
								<th>Status</th>
								<th>Edit</th>
							</thead>
					
							<!-- Table Body -->
							<tbody>
								@foreach($skills as $skill)
									<tr>
										<td>{{ $skill->skillName }}</td>
										<td>{{ $skill->category->categoryName }}</td>
										<td>{{ $skill->createdAt->format('d F Y') }}</td>
										<td>{!! status_icons($skill->status) !!}</td>
										<td>
											<a class="opreation-icon" href="{{ url('admin/skill/edit/' . $skill->id) }}"><i class="fa fa-pencil"></i></a>
<!-- 											<a class="opreation-icon" href="#"><i class="fa fa-trash"></i></a> -->
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $skills->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
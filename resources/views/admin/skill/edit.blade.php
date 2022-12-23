@extends('admin.layouts.app')

@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Skills</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Edit Skill</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a href="{{ url('admin/skills') }}" class="btn btn-primary adduser-btn">Back</a></div>
	</div>
	
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="add-skill" method="post" enctype="multipart/form-data" action="{{ url('admin/skill/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $skill->id }}">
							<div class="form-group">
								<label class="col-md-2" for="title">Title</label>
								<div class="col-md-10">
									<input type="text" name="title" id="title" class="form-control" value="{{ $skill->skillName }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="image">Category</label>
								<div class="col-md-10">
									<select name="category" id="category" class="form-control">
										<option value="">SELECT</option>
										@foreach($categories as $category)
											<option @if($skill->category_id == $category->id) {{ 'selected="selected"' }} @endif value="{{ $category->id }}">{{ $category->categoryName }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2">Status</label>
								<div class="col-md-10">
									<label for="status1" class="checkbox-inline">
										<input type="radio" name="status" @if($skill->status == 1) {{ 'checked="checked"' }} @endif id="status1" value="1" class="">
										Active
									</label>
									<label for="status0" class="checkbox-inline">
										<input type="radio" name="status" @if($skill->status == 0) {{ 'checked="checked"' }} @endif id="status0" value="0" class="">
										Inactive
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button class="btn btn-primary pull-left" type="submit">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript">
        $("#add-skill").validate({
        	errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
            rules: {
                title: {
                    required: true,
                },
                category: {
                    required: true,
                }
            },
            messages: {
            	title: "Please provide a title",
            	category: "Please select an category",
            }
        });
    </script>
    	 
@endsection
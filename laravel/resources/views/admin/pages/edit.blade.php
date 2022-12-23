@extends('admin.layouts.app')
@section('metaTitle', 'Edit '.$page->page_name)
@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Packages</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Edit Package</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a href="{{ url('admin/pages') }}" class="btn btn-primary adduser-btn">Back</a></div>
	</div>
	
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="save-page" method="post" action="{{ url('admin/page/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $page->id }}">
							<div class="form-group">
								<label class="col-md-2" for="name">Page Name</label>
								<div class="col-md-10">
									<input type="text" name="name" id="name" class="form-control" value="{{ $page->page_name}}">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="price">Page Content</label>
								<div class="col-md-10">
									<textarea class="summernote" name="content">
									{{$page->page_content}}
									</textarea>
									
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
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" integrity="sha256-b/eFeUOogpWzaqEa/+UZt1QlI3x4uQww0/YFWlDQpIg=" crossorigin="anonymous" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.min.js" integrity="sha256-+xpvFKckte4EEA5HIpqOOD2jNuVZJEwS5hGZJx+aCgc=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript">
	// $('#save-page').on('submit', function(e){
		
		// $('.content-errr').remove();
		// var ele = $("textarea[name=content]").val();
		// if($("<div/>").html(ele).text() == ''){
			
			// console.log($(ele).text());
			// $('textarea[name=content]').closest('div').append('<p class="text-danger content-errr">Add some content to your page</p>');
			// return false;
		// }
	// })
			
		$("#save-page").validate({
        	errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
            rules: {
                name: {
                    required: true,
                },
                content: {
                    required: true,
                }
            },	
            messages: {
            	name: "Please provide a name",
            	content: "Please add some content to the page",
            }
        });
		$('.summernote').summernote({
		  height: 250,   //set editable area's height
		  
		});
    </script>
    	 
@endsection
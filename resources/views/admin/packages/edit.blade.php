@extends('admin.layouts.app')
@section('metaTitle', 'Edit '.$package->package_name)
@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Packages</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Edit Package</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a href="{{ url('admin/packages') }}" class="btn btn-primary adduser-btn">Back</a></div>
	</div>
	
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="edit-package" method="post" action="{{ url('admin/package/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $package->id }}">
							<div class="form-group">
								<label class="col-md-2" for="name">Package Name</label>
								<div class="col-md-10">
									<input type="text" name="name" id="name" class="form-control" value="{{ $package->package_name}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="price">Package Price</label>
								<div class="col-md-10">
									<input type="text" name="price" id="title" class="form-control" value="{{ $package->package_price }}">
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
	
		$("#edit-package").validate({
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
                price: {
                    required: true,
                }
            },
            messages: {
            	name: "Please provide a name",
            	price: "Please provide package price",
            }
        });
       // $('#edit-package').on('submit', function(e){
			// e.preventDefault();
			// var form = new FormData($(this)[0]);
			// $.ajax({
				// url: $(this).attr('action'),
				// data:form,
				// type:"POST",
				// processData:false,
				// contentType:false,
				// beforeSend:function(){
				
				// },
				// success:function(response){
					// var data = $.parseJSON(response);
					// if (data.status == true) {
						
					// } else {
						
					// }
					
				// }
				
			// })
	   // })
    </script>
    	 
@endsection
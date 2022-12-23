@extends('admin.layouts.app')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="add-category" method="post" enctype="multipart/form-data" action="{{ url('admin/profile/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ Auth::user()->id }}">
							<div class="form-group">
								<label class="col-md-2" for="fName">Name</label>
								<div class="col-md-5">
									<input type="text" name="fName" id="fName" class="form-control" value="{{ Auth::user()->fName }}">
									<p class="help-block">First Name</p>
								</div>
								<div class="col-md-5">
									<input type="text" name="lName" id="lName" class="form-control" value="{{ Auth::user()->lName }}">
									<p class="help-block">Last Name</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="country">Country</label>
								<div class="col-md-10">
									<input type="text" name="country" id="country" class="form-control" value="{{ Auth::user()->country }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="profilePic">Profile Pic</label>
								<div class="col-md-10">
									<div id="profile-pic">
										<img width="75" alt="No Image" src="{{ asset('uploads/' . Auth::user()->profilePic) }}">
									</div>
									<input type="file" name="profilePic" id="profilePic" accept='image/*'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="phone1">Contact Numbers</label>
								<div class="col-md-5">
									<input type="text" name="phone1" id="phone1" class="form-control" value="{{ Auth::user()->phone1 }}">
									<p class="help-block">Phone</p>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
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
	<script type="text/javascript" src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
	<link href="{{ asset('assets/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
	<script type="text/javascript">
	    $(document).ready(function () {
	        $('.input-group.date').datepicker({
		        format: 'dd/mm/yyyy',
	            calendarWeeks: true,
	            autoclose: true
	        });
	    });
	</script>
	<script type="text/javascript">
        
        //Profile Pic JS
        function handleProfileSelect(evt) {
			$('#profile-pic img').remove();
			
		    var files = evt.target.files;

		    // Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {

		      // Only process image files.
		      if (!f.type.match('image.*')) {
		        continue;
		      }

		      var reader = new FileReader();

		      // Closure to capture the file information.
		      reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          var span = document.createElement('div');
		          span.className = '';
		          span.innerHTML = 
		          [
		            '<img style="width:75px;height:auto;" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '"/>'
		          ].join('');
		          
		          document.getElementById('profile-pic').insertBefore(span, null);
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		  }

		  document.getElementById('profilePic').addEventListener('change', handleProfileSelect, false);
		  //END profile pic JS

		  
		  //Cover Pic JS
		  function handleCoverSelect(evt) {
			  $('#cover-pic img').remove();
				
		    var files = evt.target.files;

		    // Loop through the FileList and render image files as thumbnails.
		    for (var i = 0, f; f = files[i]; i++) {

		      // Only process image files.
		      if (!f.type.match('image.*')) {
		        continue;
		      }

		      var reader = new FileReader();

		      // Closure to capture the file information.
		      reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          var span = document.createElement('div');
		          span.className = '';
		          span.innerHTML = 
		          [
		            '<img style="width:100px;height:auto;" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '"/>'
		          ].join('');
		          
		          document.getElementById('cover-pic').insertBefore(span, null);
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		  }

		  document.getElementById('coverPic').addEventListener('change', handleCoverSelect, false);
		  //END cover pic JS
		  
    </script>
    	 
@endsection
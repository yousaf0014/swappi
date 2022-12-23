@extends('admin.layouts.app')

@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Users</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Edit User</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a href="{{ url('admin/users') }}" class="btn btn-primary adduser-btn">Back</a></div>
	</div>
	
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="add-category" method="post" enctype="multipart/form-data" action="{{ url('admin/user/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $user->id }}">
							<div class="form-group">
								<label class="col-md-2" for="fName">Name</label>
								<div class="col-md-5">
									<input type="text" name="fName" id="fName" class="form-control" value="{{ $user->fName }}">
									<p class="help-block">First Name</p>
								</div>
								<div class="col-md-5">
									<input type="text" name="lName" id="lName" class="form-control" value="{{ $user->lName }}">
									<p class="help-block">Last Name</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="username">Username</label>
								<div class="col-md-10">
									<input type="text" name="username" disabled="true" id="username" class="form-control" value="{{ $user->username }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="country">Country</label>
								<div class="col-md-10">
									<input type="text" name="country" id="country" class="form-control" value="{{ $user->country }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="city">City</label>
								<div class="col-md-10">
									<input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="postCode">Post Code</label>
								<div class="col-md-10">
									<input type="text" name="postCode" id="postCode" class="form-control" value="{{ $user->postCode }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="profileType">Profile Type</label>
								<div class="col-md-10">
									<label for="individual" class="checkbox-inline">
										<input type="radio" name="profileType" @if($user->profileType == 'individual') {{ 'checked="checked"' }} @endif id="individual" value="individual" class="">
										Individual
									</label>
									<label for="business" class="checkbox-inline">
										<input type="radio" name="profileType" @if($user->profileType == 'business') {{ 'checked="checked"' }} @endif id="business" value="business" class="">
										Business
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="jobTitle">Job Title</label>
								<div class="col-md-10">
									<input type="text" name="jobTitle" id="jobTitle" class="form-control" value="{{ $user->jobTitle }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="businessLine">Business Line</label>
								<div class="col-md-10">
									<input type="text" name="businessLine" id="businessLine" class="form-control" value="{{ $user->businessLine }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="businessLink">Business Link</label>
								<div class="col-md-10">
									<input type="text" name="businessLink" id="businessLink" class="form-control" value="{{ $user->businessLink }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="description">Description</label>
								<div class="col-md-10">
									<textarea name="description" id="description" class="form-control">{{ $user->description }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="profilePic">Profile Pic</label>
								<div class="col-md-10">
									<div id="profile-pic">
										<img width="75" alt="No Image" src="{{ asset('uploads/' . $user->profilePic) }}">
									</div>
									<input type="file" name="profilePic" id="profilePic" accept='image/*'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="coverPic">Cover Pic</label>
								<div class="col-md-10">
									<div id="cover-pic">
										<img width="75" alt="No Image" src="{{ asset('uploads/' . $user->coverPic) }}">
									</div>
									<input type="file" name="coverPic" id="coverPic" accept='image/*'>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="phone1">Contact Numbers</label>
								<div class="col-md-5">
									<input type="text" name="phone1" id="phone1" class="form-control" value="{{ $user->phone1 }}">
									<p class="help-block">Phone</p>
								</div>
								<div class="col-md-5">
									<input type="text" name="phone2" id="phone2" class="form-control" value="{{ $user->phone2 }}">
									<p class="help-block">Additional Phone</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="status">Status</label>
								<div class="col-md-10">
									<label for="status1" class="checkbox-inline">
										<input type="radio" name="status" @if($user->status == 1) {{ 'checked="checked"' }} @endif id="status1" value="1" class="">
										Active
									</label>
									<label for="status0" class="checkbox-inline">
										<input type="radio" name="status" @if($user->status == 0) {{ 'checked="checked"' }} @endif id="status0" value="0" class="">
										Inactive
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="isVip">Is VIP</label>
								<div class="col-md-10">
									<label for="isVip1" class="checkbox-inline">
										<input type="radio" name="isVip" @if($user->isVip == 1) {{ 'checked="checked"' }} @endif id="isVip1" value="1" class="">
										Mark VIP
									</label>
									<label for="isVip0" class="checkbox-inline">
										<input type="radio" name="isVip" @if($user->isVip == 0) {{ 'checked="checked"' }} @endif id="isVip0" value="0" class="">
										Unmark VIP
									</label>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-md-2" for="isVip">Other Details</label>
								<div class="tabs-container col-md-10">

								<!-- Nav tabs -->
								  <ul class="nav nav-tabs" role="tablist">
								    <li role="presentation" class="active"><a href="#certifications" aria-controls="certifications" role="tab" data-toggle="tab">Certifications</a></li>
								    <li role="presentation"><a href="#experiences" aria-controls="experiences" role="tab" data-toggle="tab">Experiences</a></li>
								    <li role="presentation"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
								    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
								    <li role="presentation"><a href="#trainings" aria-controls="trainings" role="tab" data-toggle="tab">Trainings</a></li>
								  </ul>
								
								  <!-- Tab panes -->
								  <div class="tab-content">
								    <div role="tabpanel" class="tab-pane active" id="certifications">
								    	@forelse($user->certifications as $certification)
								    		<fieldset>
										    	<div class="form-group"></div>
										    	<div class="form-group">
													<label class="col-md-2" for="certName">Name</label>
													<div class="col-md-10">
														<input type="text" name="certName" id="certName" value="{{ $certification->certName }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="certOrg">Org</label>
													<div class="col-md-10">
														<input type="text" name="certOrg" id="certOrg" value="{{ $certification->certOrg }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="certLogo">Logo</label>
													<div class="col-md-10">
														<img width="75" class="img-circle" alt="" src="{{ asset('uploads/' . $certification->certLogo) }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="certDate">Date</label>
													<div class="col-md-10">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="certDate" id="certDate" value="{{ $certification->certDate->format('F Y') }}" class="form-control date">
														</div>
													</div>												
												</div>
											</fieldset>
										@empty
										    <p>No Certifications</p>
										@endforelse
								    </div>
								    <div role="tabpanel" class="tab-pane" id="experiences">
								    	@forelse($user->experiences as $experience)
								    		<fieldset>
										    	<div class="form-group"></div>
										    	<div class="form-group">
													<label class="col-md-2" for="certName">Designation</label>
													<div class="col-md-10">
														<input type="text" name="designation" id="designation" value="{{ $experience->designation }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="orgName">Org</label>
													<div class="col-md-10">
														<input type="text" name="orgName" id="orgName" value="{{ $experience->orgName }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="description">Description</label>
													<div class="col-md-10">
														<textarea name="description" id="description" class="form-control">{{ $experience->description }}</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="certLogo">Logo</label>
													<div class="col-md-10">
														<img width="75" class="img-circle" alt="" src="{{ asset('uploads/' . $experience->logo) }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="startDate">Start - End Date</label>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="startDate" id="startDate" value="{{ $experience->startDate->format('F Y') }}" class="form-control date">
														</div>
													</div>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="endDate" id="endDate" value="{{ $experience->endDate->format('F Y') }}" class="form-control date">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="description">Address</label>
													<div class="col-md-10">
														<textarea name="address" id="address" class="form-control">{{ $experience->address }}</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="country">Country</label>
													<div class="col-md-10">
														<input type="text" name="country" id="country" value="{{ $experience->country }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="city">City</label>
													<div class="col-md-10">
														<input type="text" name="city" id="city" value="{{ $experience->city }}" class="form-control">
													</div>
												</div>
											</fieldset>
										@empty
											<p>No Experiences</p>
										@endforelse
								    </div>
								    <div role="tabpanel" class="tab-pane" id="projects">
								    	@forelse($user->projects as $project)
								    		<fieldset>
										    	<div class="form-group"></div>
										    	<div class="form-group">
													<label class="col-md-2" for="title">Name</label>
													<div class="col-md-10">
														<input type="text" name="title" id="title" value="{{ $project->title }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="description">Description</label>
													<div class="col-md-10">
														<textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="logo">Logo</label>
													<div class="col-md-10">
														<img width="75" alt="" src="{{ asset('uploads/' . $project->logo) }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="category">Category</label>
													<div class="col-md-10">
														<select name="category" id="category" class="form-control">
															<option value="">SELECT</option>
															@foreach($categories as $category)
																<option @if($category->id == $project->category_id) {{ 'selected="selected"' }} @endif value="{{ $category->id }}">{{ $category->categoryName }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="startDate">Start - End Date</label>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="startDate" id="startDate" value="{{ $project->startDate->format('F Y') }}" class="form-control date">
														</div>
													</div>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="endDate" id="endDate" value="{{ $project->endDate->format('F Y') }}" class="form-control date">
														</div>
													</div>
												</div>
											</fieldset>
										@empty
											<p>No Projects</p>
										@endforelse
								    </div>
								    <div role="tabpanel" class="tab-pane" id="reviews">
								    	@forelse($user->reviews as $review)
								    		<fieldset>
										    	<div class="form-group"></div>
										    	<?php //TODO for-from user ids  ?>
										    	<div class="form-group">
													<label class="col-md-2" for="reviewTitle">Title</label>
													<div class="col-md-10">
														<input type="text" name="reviewTitle" id="reviewTitle" value="{{ $review->reviewTitle }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="comment">Comment</label>
													<div class="col-md-10">
														<textarea name="comment" id="comment" class="form-control">{{ $review->comment }}</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="solutionDate">Solution Date</label>
													<div class="col-md-10">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="solutionDate" id="solutionDate" class="form-control" value="{{ $review->solutionDate->format('F Y') }}">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="ratting">Ratting</label>
													<div class="col-md-10">
														{!! print_ratting($review->ratting) !!}
														<input type="text" name="ratting" id="ratting" class="form-control" value="{{ $review->ratting }}">
													</div>
												</div>
											</fieldset>
										@empty
											<p>No Reviews</p>
										@endforelse
								    </div>
								    <div role="tabpanel" class="tab-pane" id="trainings">
								    	@forelse($user->trainings as $training)
								    		<fieldset>
										    	<div class="form-group"></div>
										    	<div class="form-group">
													<label class="col-md-2" for="name">Name</label>
													<div class="col-md-10">
														<input type="text" name="name" id="name" value="{{ $training->name }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="logo">Logo</label>
													<div class="col-md-10">
														<img width="75" alt="" src="{{ asset('uploads/' . $training->logo) }}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="tagLine">Tag Line</label>
													<div class="col-md-10">
														<input type="text" name="tagLine" id="tagLine" value="{{ $training->tagLine }}" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2" for="tagLine">Start - End Date</label>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="startDate" id="startDate" value="{{ $training->startDate->format('F Y') }}" class="form-control">
														</div>
													</div>
													<div class="col-md-5">
														<div class="input-group date">
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															<input type="text" name="endDate" id="endDate" value="{{ $training->endDate->format('F Y') }}" class="form-control">
														</div>
													</div>
												</div>
											</fieldset>											
										@empty
											<p>No Trainings</p>
										@endforelse
								    </div>
								  </div>
							  
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
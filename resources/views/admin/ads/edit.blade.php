@extends('admin.layouts.app')

@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-8">
	        <h2>Ads</h2>
	        <ol class="breadcrumb">
	        	<li> <a href="http://localhost/wheel/admin/profile">Home</a></li>
	            <li class="active"><strong>Edit Ad</strong> </li>
	        </ol>
	    </div>
	    <div class="col-lg-4"><a href="{{ url('admin/ads') }}" class="btn btn-primary adduser-btn">Back</a></div>
	</div>
	
	<div class="wrapper wrapper-content animated fadeInRight">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox float-e-margins">
	                <div class="ibox-content">
	                	@include('admin.error')
	                	@include('admin.success')
						<form class="form-horizontal" id="add-ad" method="post" enctype="multipart/form-data" action="{{ url('admin/ad/save') }}">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $ad->id }}">
							
							<input type="hidden" name="adskillid" value="{{ !empty($ad->categories[0]) ? $ad->categories[0]->id:'' }}">
							<div class="form-group">
								<label class="col-md-2" for="title">Title</label>
								<div class="col-md-10">
									<input type="text" name="title" id="title" class="form-control" value="{{ $ad->adHeadline }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="slug">Slug</label>
								<div class="col-md-10">
									<input type="text" name="slug" id="slug" class="form-control" value="{{ $ad->slug }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="inExchange">In Exchange</label>
								<div class="col-md-10">
									<input type="text" name="inExchange" id="inExchange" class="form-control" value="{{ $ad->inExchange }}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="description">Description</label>
								<div class="col-md-10">
									<textarea type="text" name="description" id="description" class="form-control" rows="6">{{ $ad->adDescription }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2">Images</label>
								<div class="col-md-10">
									<div id="adimage-temp">
										@foreach($ad->adImages as $image)
											<div class="col-md-2">
												<img width="100%" alt="{{ $image->image }}" src="{{ asset('uploads/' . $image->image) }}">
												<input type="hidden" name="adImages[]" value="{{ $image->id }}">
												<a href="#" class="img-remove"><i class="fa fa-times"></i></a>
												<a href="#" class="img-featured pull-right" data-flag="{{ $image->isFeatured ? 'featured' : 'nofeatured' }}" data-imgid="{{ $image->id }}">
													@if($image->isFeatured)
														<i class="fa fa-star"></i>
													@else
														<i class="fa fa-star-o"></i>
													@endif
												</a>
											</div>
										@endforeach
									</div>
									<div class="col-md-12">
										<a href="#" class="add-images">Add Images</a>
										<input type="file" name="add_images[]" id="add_images" class="file-hide" multiple accept='image/*'>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2" for="skills">Skills</label>
								<div class="col-md-10">
									<select name="skills" id="skills" class="form-control">
										<option value="">SELECT</option>
										@foreach($skills as $skill)
											<option 
											@if(in_array($skill->id, $adSkillIds))
												{!! 'selected="selected"' !!}
											@endif
											 value="{{ $skill->category_id }}:{{ $skill->id }}">{{ $skill->category->categoryName }} > {{ $skill->skillName }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2">Featured</label>
								<div class="col-md-10">
									<label for="featured1" class="checkbox-inline">
										<input type="radio" name="isFeatured" @if($ad->isFeatured == 1) {{ 'checked="checked"' }} @endif id="featured1" value="1" class="">
										On
									</label>
									<label for="featured0" class="checkbox-inline">
										<input type="radio" name="isFeatured" @if($ad->isFeatured == 0) {{ 'checked="checked"' }} @endif id="featured0" value="0" class="">
										Off
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2">Status</label>
								<div class="col-md-10">
									<label for="status1" class="checkbox-inline">
										<input type="radio" name="status" @if($ad->status == 1) {{ 'checked="checked"' }} @endif id="status1" value="1" class="">
										Active
									</label>
									<label for="status0" class="checkbox-inline">
										<input type="radio" name="status" @if($ad->status == 0) {{ 'checked="checked"' }} @endif id="status0" value="0" class="">
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
        $("#add-ad").validate({
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
                slug: {
                    required: true,
                },
                inExchange: {
                    required: true,
                },
                description: {
                    required: true,
                }
            },
            messages: {
            	title: "Please provide a title",
            	slug: "Please provide a slug",
            	inExchange: "Please provide a exchange",
            	description: "Please provide a description",
            }
        });

        $('.add-images').click(function(){
			$('#add_images').click();
			return false;
        });

        $('#adimage-temp').on('click', '.img-remove', function(){
			$(this).parent().remove();
			return false;
        });

        function handleFileSelect(evt) {
			$('#adimage-temp > .col-md-2.temp').remove();
            
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
		          span.className = 'col-md-2 temp';
		          span.innerHTML = 
		          [
		            '<img style="width:100%;height:auto;" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '"/>'
		          ].join('');
		          
		          document.getElementById('adimage-temp').insertBefore(span, null);
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
		    }
		  }

		  document.getElementById('add_images').addEventListener('change', handleFileSelect, false);

		  $('.img-featured').on('click', function(){
				var imgid = $(this).attr('data-imgid');
				var flag = $(this).attr('data-flag');
				var token = $('[name="_token"]').val();
				
				$.ajax({
					url: "{{ url('admin/ad/markimage') }}",
					method: "POST",
					headers: {'X-CSRF-TOKEN': token},
					data: {'imgid' : imgid, 'flag' : flag}
				}).done(function(data) {
					data = $.parseJSON(data);
					
					location.reload();
				});
				
				return false;
		  });
    </script>
    	 
@endsection
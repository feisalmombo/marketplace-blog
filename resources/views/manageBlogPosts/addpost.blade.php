@extends('layouts.app')

@section('title', 'Add Post')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Post</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create Post<a href="{{ url('/blog/post') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/blog/post') }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="col-lg-12 center-block">
										{{-- <h2 style="text-align: center;">User Information</h2> --}}
										<div class="form-group">
											<label>Title/Heading: </label>
											<input class="form-control" type="text" name="title" id="title"required="required"  placeholder="eg: Financial Sector">
                                        </div>

                                        <div class="form-group">
                                                <label>Post Description</label>
                                                <textarea class="form-control" type="text" name="postdescription" id="postdescription" required="required"  rows="4" placeholder="eg: This is a financial sector which helps customer to make different request about loan and other financial education ."></textarea>
                                        </div>

                                        <div class="form-group">
											<label>Post Image: </label>
											<input class="form-control" type="file" name="postimage" id="postimage" required="required">
                                        </div>

										<div class="form-group">
											<label>Category</label>
											<select class="form-control" name="postcategoryId" id="postcategoryId" required="required">
                                                <option selected="selected">--- Select Category ---</option>
												@foreach($categories as $category)
												<option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
												@endforeach
											</select>
										</div>


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Publish
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection

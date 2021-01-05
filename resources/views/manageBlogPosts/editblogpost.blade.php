@extends('layouts.app')

@section('title', 'Update Post')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Update Post</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Update Post<a href="{{ url('/blog/post') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/blog/post/'.$posts->id) }}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
                                    {{ method_field('PATCH') }}
									<div class="col-lg-12 center-block">
										<div class="form-group">
											<label>Title/Heading: </label>
											<input class="form-control" type="text" name="title" id="title" value="{{ isset($posts->title) ? $posts->title : old('title') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Post Description</label>
                                            {{-- <textarea class="form-control" name="post_description" rows="4">{{{ Input::old('post_description') }}}</textarea> --}}
											<input class="form-control" type="text" row="10" name="post_description" id="post_description" value="{{ isset($posts->post_description) ? $posts->post_description : old('post_description') }}">
                                        </div>

                                        <div class="form-group">
											<label>Post Image: </label>
											<input class="form-control" type="file" name="postimage" id="postimage" required="required">
                                        </div>

										<div class="form-group">
											<label>Category</label>
											<select class="form-control" name="postcategoryId" id="postcategoryId" required="required">
												@foreach($categories as $category)
                                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                                {{-- <option value={{$category_name}} {{(old('status') == $list?'selected':'')}} >{{$list}}</option> --}}
												@endforeach
											</select>
										</div>


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Update
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

@extends('layouts.app')

@section('title', 'Update Category')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Update Category</h1>
</div>

<div class="row">
    <section class="content">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Update Category<a href="{{ url('/view/all/category') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="container col-sm-offset-3">
						<div class="container-page">
							<div class="col-sm-6">
								<form role="form"  action="{{ url('/view/all/category/'.$categories->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

									<div class="col-lg-12 center-block">
										{{-- <h2 style="text-align: center;">User Information</h2> --}}
										<div class="form-group">
											<label>Category Name: </label>
											<input class="form-control" type="text" name="category" value="{{ isset($categories->category_name) ? $categories->category_name : old('category') }}">
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

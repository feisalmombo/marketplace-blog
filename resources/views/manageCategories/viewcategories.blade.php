@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<div class="col-lg-12">
<h1 class="page-header">All Categories</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        List of all categories
        <a href="{{ url('/view/all/category/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Category</a>
    </div>

    <div class="panel-body">
        @if(!empty($categories))

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Category Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($categories as $key=>$category)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" href='#{{ $category->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $category->id."show" }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Category Details</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Category Name: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $category->category_name }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr/>

                                          <div class="row">
                                                <div class="col-sm-3">
                                                 <div class="center-block">
                                                    <div class="form-group">
                                                        <label>Duration: </label>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-9">
                                                   <div class="center-block">
                                                    <div class="form-group">
                                                        {{date("F jS, Y", strtotime($category->created_at))}}
                                                    </div>
                                                </div>
                                                </div>
                                              </div>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('/view/all/category/'.$category->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href='#{{ $category->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $category->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><strong>Delete</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete Category? <h9 style="color: blue;">{{ $category->category_name }}</h9>
                                        </div>
                                        <form action="/view/all/category/{{ $category->id  }}" method="POST" role="form">

                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                         {{--  <td>{{ \Carbon\Carbon::parse($bodytype->created_at)->diffForHumans() }}</td>  --}}
                         <td>{{date("F jS, Y", strtotime($category->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Category found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection



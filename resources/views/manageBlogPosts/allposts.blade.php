@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

<div class="col-lg-12">
<h1 class="page-header">All Posts</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        List of all posts
        <a href="{{ url('/blog/post/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add Post</a>
    </div>

    <div class="panel-body">
        @if(!empty($blogposts))
        {{-- @if(count($userData)>0) --}}

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category Name</th>
                <th>Post Image</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Created Day</th>
                <th>Updated Day</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($blogposts as $key=>$post)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->post_description }}</td>
                        {{-- <td>{{ str_limit($post->post_description, 40) }}</td> --}}
                        <td>{{ $post->category_name }}</td>
                        <td>
                            <img src="{{ asset('storage/' .$post->post_image_path) }}" alt="Post Image" width="240px">
                        </td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" href='#{{ $post->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $post->id."show" }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Post Details</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Title: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $post->title }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr/>
                                          <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Description: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $post->post_description }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr>

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
                                                    {{ $post->category_name }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr>

                                          <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Post Image: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    <span style="font-size:30px; color: white"; class="">
                                                        <img src="{{ asset('storage/' .$post->post_image_path) }}" alt="Post Image" width="240px">
                                                    </span>
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr>

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
                                                        {{date("F jS, Y", strtotime($post->created_at))}}
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
                            <a href="{{ url('/blog/post/'.$post->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href='#{{ $post->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $post->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><strong>Delete</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete Post? <h9 style="color: blue;">{{ $post->title }}</h9>
                                        </div>
                                        <form action="/blog/post/{{ $post->id  }}" method="POST" role="form">

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
                        <td>
                         <td>{{date("F jS, Y", strtotime($post->created_at))}}</td>
                        </td>
                        <td>{{date("F jS, Y", strtotime($post->updated_at))}}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Post found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection



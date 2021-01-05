@extends('layouts.app')

@section('title', 'All Comments')

@section('content')

<div class="col-lg-12">
<h1 class="page-header">All Comments</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        List of all comments
        <a href="{{ url('/blog/post') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
    </div>

    <div class="panel-body">
        @if(!empty($contacts))

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Message</th>
                <th>Show</th>
                <th>Delete</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($contacts as $key=>$contact)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" href='#{{ $contact->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $contact->id."show" }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Comments Details</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Name: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $contact->first_name }} {{ $contact->last_name }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr/>
                                          <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Email: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $contact->email }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Phone Number: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $contact->phone_number }}
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                             <div class="center-block">
                                                <div class="form-group">
                                                    <label>Message: </label>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-sm-9">
                                               <div class="center-block">
                                                <div class="form-group">
                                                    {{ $contact->message }}
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
                                                        {{date("F jS, Y", strtotime($contact->created_at))}}
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
                            <a href='#{{ $contact->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
                            <div class="modal fade" id="{{ $contact->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><strong>Delete</strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete contact for user? <h9 style="color: blue;">{{ $contact->first_name }} {{ $contact->last_name }}</h9>
                                        </div>
                                        <form action="/contact/all/contacts/{{ $contact->id  }}" method="POST" role="form">

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
                         <td>{{date("F jS, Y", strtotime($contact->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Comments found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection



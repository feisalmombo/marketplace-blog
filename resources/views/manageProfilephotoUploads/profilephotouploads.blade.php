@extends('layouts.app')

@section('title', 'View Profile Photo')

@section('content')


<div class="col-lg-12">
<h1 class="page-header">View Profile Photo</h1>
</div>
<section class="content">
<div class="row">
<div class="col-lg-12">
@include('msgs.success')
<div class="panel panel-default">
    <div class="panel-heading">
        Upload Photo
        <a href="{{ url('/view-users/profile/photo/upload/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Upload Photo</a>
    </div>
    <div class="panel-body">
        @if(count($profilephotos)>0)

        <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="text-align: center">Profile Photo</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($profilephotos as $key=>$profilephoto)
                    <tr class="odd gradeX">
                        <td class="center">
                            <center>
                                <input type='image' src="{{ asset('storage/' .$profilephoto->profile_image_path) }}"  style='width:180px;height:234.7px;overflow:none; border-radius:20px' value=''>
                            </center>
                                <center><a href="{{url('/view-users/profile/photo/upload/create')}}">[ Upload/Change Passport Size ]</a>
                                </center>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>No Profile Photo found</strong>
        </div>
        @endif
    </div>
</div>
</div>
</div>
</section>
@endsection

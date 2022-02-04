@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Users</h1>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-12 portlets">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Edit</strong> User</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <form role="form" id="contactForm" action="{{route('user.edit', $user->id)}}" method="POST">
                            @csrf
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="user[email]" value="{{$user->email}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="user[name]" value="{{$user->name}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="user[phone]" value="{{$user->phone}}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Role</label>
                                <select class="form-control" name="user[is_admin]">
                                    @if($user->is_admin == 1)
                                        <option value="1" selected>Admin</option>
                                        <option value="0" >User</option>
                                    @else
                                        <option value="1">Admin</option>
                                        <option value="0" selected>User</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="user[location_details]" value="{{$user->location_details}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

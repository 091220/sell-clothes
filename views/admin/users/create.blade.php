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
                        <h2><strong>Create</strong> User</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <form role="form" id="contactForm" action="{{route('user.create')}}" method="POST">
                            @csrf
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="user[email]">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="text" class="form-control" name="user[password]">
                                @if($errors->has('user.password'))
                                    <p>{{$errors->first('user.password')}}</p>
                                @endif
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="user[name]">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="user[phone]">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Role</label>
                                <select class="form-control" name="user[is_admin]">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <input type="hidden" name="user[is_locked]" value="0">
                            <div class="form-group col-lg-6">
                                <label>Location</label>
                                <input type="text" class="form-control" name="user[location_details]">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

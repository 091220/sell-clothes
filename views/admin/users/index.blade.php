@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Users</h1>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>List </strong>User</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="data-table-toolbar">
                            <div class="row">
                                <div class="col-md-4">
                                    <form role="form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <div class="toolbar-btn-action">
                                        <a class="btn btn-success"><i class="fa fa-plus-circle"></i> Add User</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table data-sortable class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th data-sortable="false">Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><strong>{{$user->name}}</strong></td>
                                        <td>{{$user->phone}}</td>
                                        <td><a href="mailto:#">{{$user->email}}</a></td>
                                        <td>{{$user->location_details}}</td>
                                        @if ($user->is_admin == 1)
                                            <td>Admin</td>
                                        @else
                                            <td>User</td>
                                        @endif
                                        @if ($user->is_locked == 0)
                                            <td><span class="label label-success">Active</span></td>
                                        @else
                                            <td><span class="label label-danger">Locked</span></td>
                                        @endif
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <a data-toggle="tooltip" title="Off" class="btn btn-default"><i class="fa fa-power-off"></i></a>
                                                <a data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="data-table-toolbar">
                            {!!@h_paginate($users)!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

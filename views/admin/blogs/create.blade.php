@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Blogs</h1>
@endsection
@section('content')
    <div class="content">
        <div class="box-info box-messages animated fadeInDown">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-header transparent">
                            <h2><strong>Create</strong> Blog</h2>
                            <div class="additional-btn">
                                <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                                <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                                <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            </div>
                        </div>
                        <div class="widget-content padding">
                            <form role="form" class="form-horizontal" method="POST" action="{{route('blog.create')}}">
                                @csrf
                                <div class="form-group col-lg-6">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="blog[title]">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Content</label>
                                    <textarea class="summernote-small form-control" name="blog[content]"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


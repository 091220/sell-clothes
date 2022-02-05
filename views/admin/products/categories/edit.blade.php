@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Categories</h1>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-12 portlets">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Edit</strong> Category</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <form role="form" id="contactForm" action="{{route('category.edit', $category->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="category[name]" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="category[parent_id]">
                                    <option value="" >No Category Parent</option>
                                    @foreach ($categories as $key => $value)
                                        @if($category->id == $value->id)
                                            @continue
                                        @endif
                                        <option
                                            @if ($category->parent_id == $value->id)
                                            selected
                                            @endif
                                            value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

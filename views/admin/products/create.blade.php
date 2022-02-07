@extends('admin.layouts.master')
@section('title')
    <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
    </button> <h1 class="title">Products</h1>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-12 portlets">
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Create</strong> Product</h2>
                        <div class="additional-btn">
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                        </div>
                    </div>
                    <div class="widget-content padding">
                        <form role="form" id="contactForm" action="{{route('product.create')}}" method="POST">
                            @csrf
                            <div class="form-group col-lg-6">
                                <label>Category</label>
                                <select class="form-control" name="product[category_id]">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="product[name]" required>
                            </div>
                            <div class="variant row">
                                @foreach ($attributes as $attribute)
                                    <div class="form-group col-lg-6">
                                        <label>{{$attribute->name}}</label>
                                        <input type="text" class="form-control" name="attribute_products[1][{{$attribute->id}}]" required>
                                    </div>
                                @endforeach
                                <div class="form-group col-lg-6">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="product_details[1][price]" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="product_details[1][quantity]" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="product_details[1][description]" required>
                                </div>
                                <div class="form-group col-lg-3 ">
                                    <label>Current Image</label>
                                    <div class="img-wrap">
                                        <img id="previewImg" src="" style="width:270px;height:200px" alt="No Image!">
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 ">
                                    <label>New Image</label>
                                    <input type="file" class="form-control" name="product_details[1][images]" onchange="document.getElementById('previewImg').src = window.URL.createObjectURL(this.files[0])" required>
                                </div>
                                <div class="col-lg-6">
                                    <p class="delete_variant" style="background:green;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">-</p>
                                </div>
                            </div>
                            <div class="append"></div>
                            <div class="col-lg-6">
                                <p class="add_variant" style="background:red;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">+</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.add_variant').click(function(){
                let count = uuidv4();
                let html =
                    `<div class="variant row">`+
                    <?php
                    foreach ($attributes as $attribute){ ?>
                    `<div class="form-group col-lg-6">
              <label>`+`<?php echo $attribute->name; ?>`+`</label>
              <input type="text" class="form-control" name="attribute_products[${count}][<?php echo $attribute->id; ?>]" required>
          </div>`+
                    <?php } ?>
                    `
          <div class="form-group col-lg-6">
              <label>Price</label>
              <input type="number" class="form-control" name="product_details[${count}][price]" required>
          </div>
          <div class="form-group col-lg-6">
              <label>Quantity</label>
              <input type="number" class="form-control" name="product_details[${count}][quantity]" required>
          </div>
          <div class="form-group col-lg-6">
              <label>Description</label>
              <input type="text" class="form-control" name="product_details[${count}][description]" required>
          </div>
          <div class="form-group col-lg-3 ">
              <label>Current Image</label>
              <div class="img-wrap">
                  <img id="${count}" src="" style="width:270px;height:200px" alt="No Image!">
              </div>
          </div>
          <div class="form-group col-lg-3 ">
              <label>New Image</label>
              <input type="file" class="form-control" name="product_details[${count}][images]" onchange="document.getElementById('${count}').src = window.URL.createObjectURL(this.files[0])" required>
          </div>
          <div class="col-lg-6">
              <p class="delete_variant" style="background:green;width:30px;height:30px;border-radius:5px;color:white;font-size:18px;text-align:center;line-height:30px;cursor:pointer;font-weight:bold">-</p>
          </div>
      </div>`;
                $('.append').append(html)
            });
            $('body').on('click','.delete_variant',function(){
                $(this).parents('.variant').remove();
            })
        });

        function uuidv4(){
            return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }
    </script>
@endsection

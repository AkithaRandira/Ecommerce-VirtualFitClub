<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
            color: #1726ef;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }


        .dev_design {
            padding-bottom: 15px;
        }

        .dev_design_cate {
            padding-bottom: 100px;
        }


        .btn-primary {
            background-color: #1726ef;
            color: #fff;
            padding: 10px 20px;
            border: none;

            border-radius: 10px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #1726ef;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="div_center">
                    <h1 class="font_size">Edit Product</h1>

                    <form action="{{ url('/update_product_confirm',$product->id) }}"
                         method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="dev_design">
                            <label>Product Title </label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title"
                                required="" value="{{($product->title)}}">
                        </div>

                        <div class="dev_design">
                            <label>Product Description </label>
                            <input class="text_color" type="text" name="description"
                                placeholder="Write a Description" 
                                required="" value="{{($product->description)}}">
                        </div>

                        <div class="dev_design">
                            <label>Product Price</label>
                            <input class="text_color" type="number" name="price" 
                            placeholder="Price" 
                            required="" value="{{($product->price)}}">
                        </div>

                        <div class="dev_design">
                            <label>Product Quantity</label>
                            <input class="text_color" type="number" min="0" name="quantity"
                                placeholder="Quantity ? " required="" 
                                value="{{($product->quantity)}}">
                        </div>

                        <div class="dev_design">
                            <label>Discount Price</label>
                            <input class="text_color" type="number" name="dis_price" 
                            placeholder="Discount Price" value="{{($product->discount_price)}}">
                        </div>

                        <div class="dev_design_cate">
                            <label>Product Category</label>
                            <select class="text_color" name="category" required="">
                                <option value="{{($product->category)}}" selected="">
                                {{$product->category}}    
                                </option>

                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                    </option>
                                @endforeach

                                

                            </select>
                        </div>

                        <div class="dev_design">
                            <label>Current Product Image </label>
                            <img style="margin:auto" height="100" width="100" src="/product/{{$product->image}}">

                        </div>


                        <div class="dev_design">
                            <label>Change Product Image </label>
                            <input type="file" name="image" >

                        </div>

                        <div>

                            <input type="submit" value="Edit Product" class="btn btn-primary">

                        </div>
                    </form>

                </div>

            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

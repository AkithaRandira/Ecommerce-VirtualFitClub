<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #1726ef;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        table,
        th,
        td {
            border: 1px solid #1726ef;
            border-collapse: collapse;
            padding: 10px;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
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
                    <h2 class="h2_font">List Of Products</h2>

                </div>

                <table class=center>
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                        <img src="/product/{{$product->image}}" width="100px" height="100px">
                        </td>

                        <td><a class="btn btn-success" 
                            href="{{url('update_product',$product->id)}}">Edit</a></td>

                        <td><a class="btn btn-danger" 
                            onclick="return confirm('Are You Sure to Delete This')" 
                            href="{{url('delete_product',$product->id)}}">Delete</a></td>
                    @endforeach
                    
                </table>
            </div>
        </div>


        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

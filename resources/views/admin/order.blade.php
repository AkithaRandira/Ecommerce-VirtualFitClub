<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .title_deg {
            text-align: center;
            padding-top: 40px;
            padding-bottom: 40px;
            font-size: 40px;
            color: #1726ef;
        }

        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #1726ef;
            border-collapse: collapse;
            padding: 10px;
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
                <h1 class="title_deg">All Orders</h1>

                <table>
                    <tr>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Name</th>
                        <th>Qut</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivary Status</th>
                        <th>Image</th>
                        <th>Delivared</th>
                        <th>Print</th>
                      
                        

                    </tr>

                    @foreach ($order as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivary_status }}</td>
                            <td>
                                <img src="/product/{{$order->image}}" 
                                alt="Image" width="100px" height="100px">
                            </td>
                            <td>
                                @if ($order->delivary_status=='processing')
                                    
                                
                                <a href="{{url('delivared',$order->id)}}"
                                    onclick="return confirm
                                    ('Are you sure this product is delivared !!')"
                                    class="btn btn-primary">Delivared</a>

                                   

                                    @else
                                    <p class="btn btn-success">Delivared</p>
                                    @endif
                            </td>
                            

                            <td>
                                <a href="{{url('print_pdf',$order->id)}}"
                                    onclick="return confirm
                                    ('Are you sure you want to print this order !!')"
                                    class="btn btn-secondary" style="color: red">Print</a>
                            </td>

                        </tr>
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

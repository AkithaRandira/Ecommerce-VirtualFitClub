<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .main-panel {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content-wrapper {
            padding: 20px;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #1726ef;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .input_color {
            color: #333;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
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

        .center {
            margin-top: 20px;
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
                        {{ session()->get('message') }}
                    </div>
                @endif



                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="Type a Category Name">
                        <input type="submit" name="submit" value="Add Category" class="btn btn-primary mt-1">
                    </form>

                </div>

                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td>
                                <a onlick="return confirm('Are you sure to delete?')" class="btn btn-danger"
                                    href="{{ url('delete_category', $data->id) }}">Delete</a>
                                <a href="{{ url('/edit_category' . $data->id) }}" class="btn btn-success">Edit</a>

                            </td>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
        }

        h1 {
            color: #1726ef;
            text-align: center;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Virtual Fit Club</h2>
    <h1>Order Details</h1>

    <table>
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
        <tr>
            <td><strong>Customer Name</strong></td>
            <td>{{ $order->name }}</td>
        </tr>
        <tr>
            <td><strong>Customer Email</strong></td>
            <td>{{ $order->email }}</td>
        </tr>
        <tr>
            <td><strong>Customer Phone</strong></td>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <td><strong>Customer Address</strong></td>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <td><strong>Customer Customer Id</strong></td>
            <td>{{ $order->user_id }}</td>
        </tr>
        <tr>
            <td><strong>Product Price</strong></td>
            <td>{{ $order->price }}.00</td>
        </tr>
        <tr>
            <td><strong>Product Quantity</strong></td>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <td><strong>Product Status</strong></td>
            <td>{{ $order->payment_status }}</td>
        </tr>
        <tr>
            <td><strong>Product Id</strong></td>
            <td>{{ $order->product_id }}</td>
        </tr>

        


    </table>
</body>

</html>

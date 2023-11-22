<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="text-center">
        <div style="font-size: 25px">Coffe Shop</div>
    </div>
    <div class="container w-100">
        <div class="row w-100">
            <br>
            <hr>
            <br>
            <div style="font-size: 15px">Order Code : {{ $data->order->order_code }}</div>
            <div style="font-size: 15px">Customer Name : {{ $data->order->customer_name }}</div>
            <div style="font-size: 15px">Order Type : {{ $data->order->order_type }}</div>
            <div style="font-size: 15px">Time : {{ $data->date_time }}</div>
            <br>
            <hr>
            <br>
        </div>

        <div class="table w-100">
            <table class="w-100">
                <thead class="w-100">
                    <tr class="w-100">
                        <th>No</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Product Price</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp.{{ $item->product->price }}, -</td>
                            <td>Rp.{{ $item->sub_total_price }}, -</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <br>
        <hr>
        <br>
        <div style="font-size: 15px; font-weight: bold">Total transaction : Rp.{{ $data->total_price }},-
            {{ $data->order->order_type == 'Take Away' ? '(Packaging Cost : +Rp.2500)' : '' }}</div>
    </div>
</body>

</html>

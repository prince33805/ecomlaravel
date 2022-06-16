<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
          width:100%;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 15px;
          text-align: left;
        }
        table#t01 tr:nth-child(even) {
          background-color: #eee;
        }
        table#t01 tr:nth-child(odd) {
         background-color: #fff;
        }
        table#t01 th {
          background-color: black;
          color: white;
        }
    </style>
    <title>Order PDF</title>
</head>
<body>

    <h1 class="title">Order Information</h1><br> 
    <table class="table"  >
        <tbody>
            <tr>
                <th style="padding:10px;font-size:20px;">Order Id</th>
                <td class="align-middle"   >{{$data->id}}</td>
                <th style="padding:10px;font-size:20px;">User Name</th>
                <td class="align-middle"   >{{$data->name}}</td>
            </tr>
            <tr>
                <th style="padding:10px;font-size:20px;">Phone</th>
                <td class="align-middle"   >{{$data->phone}}</td>
                <th style="padding:10px;font-size:20px;">Address</th>
                <td class="align-middle"   >{{$data->address}}</td>
            </tr>
            <tr>
                <th style="padding:10px;font-size:20px;">Total Quantity</th>
                <td class="align-middle"   >{{$data->totalquantity}}</td>
                <th style="padding:10px;font-size:20px;">Total Price</th>
                <td class="align-middle"   >{{$data->totalprice}}</td>
            </tr>
            <tr>
                <th style="padding:10px;font-size:20px;">Created At</th>
                <td class="align-middle"   >{{$data->created_at}}</td>
                <th style="padding:10px;font-size:20px;">Status</th>
                <td class="align-middle"   >{{$data->status}}</td>
            </tr>
        </tbody>
    </table> 

    <br>

    <h1 class="title">Product</h1><br> 
    <table class="table"  >
        <tr>
            <th style="padding:10px;font-size:20px;">No</th>
            <th style="padding:10px;font-size:20px;">Product Title</th>
            <th style="padding:10px;font-size:20px;">Price  Per Piece</th>
            <th style="padding:10px;font-size:20px;">Quantity</th>
            <th style="padding:10px;font-size:20px;">Total Price</th>
        </tr>
        @foreach($order as $i=>$row)
        <tr>
            <td class="align-middle"  >{{$i+1}}</td>
            {{-- <td>{{$row->id}}</td> --}}
            <td class="align-middle"  >{{$row->product_title}}</td>
            <td class="align-middle"  >{{$row->priceperpiece}}</td>
            <td class="align-middle"  >{{$row->quantity}}</td>
            <td class="align-middle"  >{{$row->price}}</td>
        </tr>
        @endforeach
    </table>
        
</body>
</html>
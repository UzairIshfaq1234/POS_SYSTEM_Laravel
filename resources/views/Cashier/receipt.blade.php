<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt</title>
</head>
<body>
    <!-- Add the barcode at the top -->
    @php
        // Format the Product_order_id and generate barcode
        $formattedProductOrderID = implode('   ', str_split($Product_order_id));
        $barcode = DNS1D::getBarcodeHTML($formattedProductOrderID, 'C128');
    @endphp

    {!! $barcode !!} <!-- Display the barcode -->

    <!-- Add the rest of the receipt content -->
    <h1>Receipt</h1>
    <p>Date: {{ now()->format('Y-m-d H:i:s') }}</p>

    <h2>Products Purchased:</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order['items'] as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['price'] * $item['qty'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Amount: £{{ $order['totalAmount'] }}</p>
    <p>Amount Paid: £{{ $order['amountPaid'] }}</p>
    <p>Amount Given: £{{ $order['amountGiven'] }}</p>


    
</body>
</html>

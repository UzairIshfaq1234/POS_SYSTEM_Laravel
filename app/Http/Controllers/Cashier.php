<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Product_order;
use App\Models\product_order_details;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Cashier extends Controller
{
    public function Cashier_view()
    {
        return view('Cashier.Cashier_view2');
    }

    public function findProduct(Request $request)
    {
        $barcode = $request->input('barcode');

        // Query the database to find the product by barcode
        $product = product::where('Product_Code', $barcode)->first();

        // Return the product details as JSON response
        return response()->json($product);
    }

    public function sava_order_Product(Request $request)
    {
        $orderData = $request->input('order');

        // Create a new ProductOrder record
        $productOrder = new Product_order();
        $productOrder->order_total_amount = $orderData['totalAmount'];
        $productOrder->created_at = Carbon::now();
        $productOrder->updated_at = Carbon::now();
        $productOrder->save();

        // Loop through items and create ProductOrderDetail records
        foreach ($orderData['items'] as $item) {
            $productOrderDetail = new product_order_details();
            $productOrderDetail->product_order_id = $productOrder->id;
            $productOrderDetail->product_name = $item['name'];
            $productOrderDetail->product_qty = $item['qty'];
            $productOrderDetail->product_price = $item['price'];
            $productOrderDetail->created_at = Carbon::now();
            $productOrderDetail->updated_at = Carbon::now();
            $productOrderDetail->save();
        }

        // Clear the order table (you may need to adjust this based on your table structure)
        // You can use Eloquent or DB queries to delete the records from the order table

        // Return a response to indicate the success of the order saving
        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['Product_Name','Product_Code', 'Product_SKU', 'Product_Description', 'Product_Stock', 'Product_Sale_Price', 'Product_Retail_Price', 'Product_Image', 'Product_Barcode'];

    use HasFactory;
}

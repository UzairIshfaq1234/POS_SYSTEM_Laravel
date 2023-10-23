<?php

namespace App\Http\Controllers;

use App\Models\product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Milon\Barcode\DNS1D;


class Product extends Controller
{
    public function Add_Product_view()
    {
        $formroute = '/AddProductData';
        return view('Products.Add_Product')->with(compact('formroute'));
    }


    public function Add_Product_data(Request $request)
    {

        // dd($request);

        $validatedData = $request->validate([
            'P_Image'                  => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'Product_Name'             => 'required',
            'Product_Code'             => 'required|numeric|unique:products,Product_Code',
            'Product_SKU'              => 'required|regex:/^[A-Za-z0-9-]+$/|unique:products,Product_SKU',
            'Product_Description'      => 'required',
            'Product_Sale_Price'       => 'required|numeric',
            'Product_Retail_Price'     => 'numeric',
            'Product_Stock'            => 'required|numeric',



        ]);



        $image = $request->file('P_Image');
        $filename = time() . '_' . $request->Product_Code . '.' . $image->getClientOriginalExtension();
        $publicPath = public_path('Product_Images/' . $filename);

        // Resize the image to fit within a 250x250 pixel box without cutting
        Image::make($image)
            ->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->resizeCanvas(250, 250, 'center', false, 'ffffff')
            ->save($publicPath);





        $data = ModelsProduct::create([
            'Product_Name'              => request('Product_Name'),
            'Product_Code'              => request('Product_Code'),
            'Product_SKU'               => request('Product_SKU'),
            'Product_Description'       => request('Product_Description'),
            'Product_Stock'             => request('Product_Stock'),
            'Product_Sale_Price'        => request('Product_Sale_Price'),
            'Product_Retail_Price'      => request('Product_Retail_Price'),
            'Product_Image'             => $filename,
            'Product_Barcode'           => 'test'


        ]);




        if ($data) {
            return response()->json(['message' => 'Admin Added successfully']);
        }


        return redirect()->back();
    }


    public function All_Product_data()
    {

        $all_product_records = ModelsProduct::all();
        $formroute = '/UpdateProductData';


        return view('Products.All_Product', compact('all_product_records', 'formroute'));
    }

    public function Del_Product_data($id)
    {
        // $record = admin::find($id);
        // dd($record);
        // $record->delete();

        $affectedRows = ModelsProduct::where('Id', $id)->delete();

        return response()->json(['toast_message' => 'Product Deleted Successfully']);
    }

    public function Update_Product_data(Request $request)
    {

        // dd($request);

        $validatedData_UpdateProduct = $request->validate([
            'P_Image'                  => 'image|mimes:jpeg,png,jpg|max:3000',
            'Product_Name'             => 'required',
            'Product_Description'      => 'required',
            'Product_Sale_Price'       => 'required|numeric',
            'Product_Retail_Price'     => 'numeric',
            'Product_Stock'            => 'required|numeric',


        ]);



        if ($request->P_Image) {

            $image = $request->file('P_Image');
            $filename = time() . '_' . 'updated' . '_' . $request->Id . '.' . $image->getClientOriginalExtension();
            $publicPath = public_path('Product_Images/' . $filename);

            // Resize the image to fit within a 250x250 pixel box without cutting
            Image::make($image)
                ->resize(250, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->resizeCanvas(250, 250, 'center', false, 'ffffff')
                ->save($publicPath);
        } else {
            $prduct_pre_image = ModelsProduct::where('Id', $request->Id)->first();
            $filename = $prduct_pre_image->Product_Image;
        }



        $data = ModelsProduct::where('Id', $request->Id)->update([
            'Product_Name'              => request('Product_Name'),
            'Product_Description'       => request('Product_Description'),
            'Product_Stock'             => request('Product_Stock'),
            'Product_Sale_Price'        => request('Product_Sale_Price'),
            'Product_Retail_Price'      => request('Product_Retail_Price'),
            'Product_Image'             => $filename,


        ]);



        // $Update_Admin_Result = ModelsProduct::where('Id', $request->Id)->update($validatedData_UpdateAdmin);

        if ($data) {

            return response()->json(['message' => 'Product Updated Successfully']);
        } else {
            return response()->json(['message' => 'Error! Product Updated Failed !']);
        }
    }


    public function View_Product_data($id)
    {
        $Product_view_data = ModelsProduct::where('Id', $id)->first();

        return view('Products.View_Product', compact('Product_view_data'));



    }
}

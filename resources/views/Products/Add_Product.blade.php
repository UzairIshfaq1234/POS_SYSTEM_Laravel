<x-resources.adminheader title="Add Products" />


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">




            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Add Product</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Add your Product details correctly.
                        </p>


                        <x-formcomponents.Adminformhead formroute="{{ $formroute }}" />


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Product_Name">Product Name <span style="color:red;">*</span></label>
                                    <input type="text" name="Product_Name" parsley-trigger="change" required
                                        placeholder="Enter Product Name" class="form-control" id="Product_Name">
                                    @error('Product_Name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Product_Code">Product Code <span style="color:red;">*</span></label>
                                    <input type="number" min="0" name="Product_Code" parsley-trigger="change"
                                        required placeholder="Enter Product Code" class="form-control" id="userName">
                                    @error('Product_Code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Product_SKU">Product SKU <span style="color:red;">*</span></label>
                                    <input type="text" name="Product_SKU" parsley-trigger="change" required
                                        placeholder="Enter Product SKU" class="form-control" id="Product_SKU">
                                    @error('Product_SKU')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Product_Description">Product Description <span
                                            style="color:red;">*</span></label>
                                    <input type="text" name="Product_Description" parsley-trigger="change" required
                                        placeholder="Enter Product Description" class="form-control" id="userName">
                                    @error('Product_Description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="Product_Sale_Price">Product Sale Price <span
                                            style="color:red;">*</span></label>
                                    <input type="number" min="0" name="Product_Sale_Price"
                                        parsley-trigger="change" required placeholder="Enter Product Sale Price"
                                        class="form-control" id="Product_Sale_Price">
                                    @error('Product_Sale_Price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="Product_Retail_Price">Product Retail Price </label>
                                    <input type="number" min="0" name="Product_Retail_Price"
                                        parsley-trigger="change" required placeholder="Enter Product Retail Price"
                                        class="form-control" id="Product_Retail_Price">
                                    @error('Product_Retail_Price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label for="Product_Stock">Product Stock </label>
                                    <input type="number" min="0" name="Product_Stock" parsley-trigger="change"
                                        required placeholder="Enter Product Stock" class="form-control"
                                        id="Product_Stock">
                                    @error('Product_Stock')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Image <span style="color:red;">*</span></label>
                            <input type="file" name="P_Image" class="filestyle" parsley-trigger="change"
                                data-input="false">
                            @error('P_Image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <br>

                        <div class="form-group text-right m-b-0 m-t-20">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                Cancel
                            </button>
                        </div>

                        </form>
                    </div>
                </div>


            </div>



            <x-formcomponents.ajaxvalidationform ajaxroute={{$formroute}} />



            <x-resources.adminfooter />

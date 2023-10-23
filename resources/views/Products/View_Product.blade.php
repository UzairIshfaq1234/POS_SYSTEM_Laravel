<x-resources.adminheader title="Products Views" />

<style>
    .text-black {
        color: black !important;
    }

    @media print {
        img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    }

    .image-container {
        text-align: center;
    }

    .image-container img {
        margin: 0 auto;
        /* Center the image horizontally */
    }
    hr {
        border: none; /* Remove the default border */
        height: 2px; /* Set the height of the line */
        background-color: black; /* Set the line color to black */
        font-weight: bold; /* Make the line bold */
    }
</style>



<div id="content-to-print">

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                            <h4>Invoice</h4>
                                        </div> -->
                            <div class="panel-body">
                                <div class="clearfix">

                                    <div id="content-to-print">
                                        <div class="content-page">
                                            <!-- ... (Your other HTML code) ... -->

                                            <div class="clearfix">
                    
                                                <br>
                                                <!-- Wrap the image in a container div and apply the "image-container" class -->
                                                <div class="image-container">
                                                    <img src="{{ asset('/Product_Images') }}/{{ $Product_view_data->Product_Image }}"
                                                        id="previous-image" />
                                                </div>
                                            </div>

                                            <!-- ... (Your other HTML code) ... -->
                                        </div>
                                    </div>

                                </div>
                                <hr style="background-color: black">
                

                                <div class="m-h-10"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table ">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-black"><b>PRODUCT NAME : </b></td>
                                                        <td>{{ $Product_view_data->Product_Name }}</td>
                                                        <td class="text-black"><b>PRODUCT CODE : </b></td>
                                                        <td>{{ $Product_view_data->Product_Code }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-black"><b>PRODUCT SKU : </b></td>
                                                        <td>{{ $Product_view_data->Product_SKU }}</td>
                                                        <td class="text-black"><b>PRODUCT DESCRIPTION : </b></td>
                                                        <td>{{ $Product_view_data->Product_Description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-black"><b>PRODUCT STOCK : </b></td>
                                                        <td>{{ $Product_view_data->Product_Stock }}</td>
                                                        <td class="text-black"><b>PRODUCT SALE PRICE : </b></td>
                                                        <td>£ {{ $Product_view_data->Product_Sale_Price }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-black"><b>PRODUCT RETAIL PRICE :</b></td>
                                                        <td>£ {{ $Product_view_data->Product_Retail_Price }}</td>
                                                        <td class="text-black"><b>PRODUCT ADDED ON : </b></td>
                                                        <td>
                                                            @php
                                                                
                                                                $created_timestamp = strtotime($Product_view_data->created_at);
                                                                $Created_Date = date('Y-F-d h:i:s A', $created_timestamp);
                                                                
                                                                $updated_timestamp = strtotime($Product_view_data->updated_at);
                                                                $Updated_Date = date('Y-F-d h:i:s A', $updated_timestamp);
                                                            @endphp


                                                            {{ $Created_Date }}</td>
                                                    </tr>


                                                    <tr>
                                                        <td class="text-black"><b>PRODUCT LAST UPDATED : </b></td>
                                                        <td>{{ $Updated_Date }}</td>

                                                    </tr>

                                                    <br>
                                                    <tr>






                                                    </tr>


                                                </tbody>
                                            </table>

                                            <div class="col-sm-12" style="margin-top: 20px;margin-bottom:20px">
                                                <h4 class="text-black"><b>PRODUCT BAR-CODE :</b> </h4>

                                                <div class="barcode-container">
                                                    <?php
                                                    $productCode = $Product_view_data->Product_Code; // Replace this with your actual product code
                                                    $formattedProductCode = implode('   ', str_split($productCode));
                                                    echo DNS1D::getBarcodeHTML($productCode, 'C128');
                                                    ?>
                                                </div>

                                            </div>
                                            <br>
                                            <br>

                                        </div>

                                    </div>
                                </div>

                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" id="print-button"
                                            class="btn btn-inverse waves-effect waves-light"><i
                                                class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
        {{date('Y')}} POS-SYSTEM DESIGNED BY: MUHAMMAD UZAIR ISHFAQ
        </footer>

    </div>
</div>
<script>
    function printContent() {
        var printWindow = window.open('', '', 'width=800,height=600');
        var contentToPrint = document.getElementById('content-to-print').innerHTML;

        printWindow.document.write('<html><head><title>Print</title></head><body>' + contentToPrint + '</body></html>');

        printWindow.document.close();

        // Delay printing to ensure the barcode is generated
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 1000); // Delay for 1 second (adjust as needed)
    }


    // Call the printContent function when a print button is clicked
    document.getElementById('print-button').addEventListener('click', printContent);
</script>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->




<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<x-resources.adminfooter />

<x-resources.adminheader title="Cashier" />




<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
                </div>
            </div>






            <div class="row">



                <div class="col-lg-6">
                    <div class="card-box">
                        {{-- <a href="#" class="pull-right btn btn-default btn-sm waves-effect waves-light">View All</a> --}}
                        <h4 class="text-dark header-title m-t-0">Recent Orders</h4>
                        <p class="text-muted m-b-30 font-13">
                            Use the button classes on an element.
                        </p>

                        <div class="form-group">
                            <label for="userName">Product Barcode <span
                                    style="font-weight: bolder; color: red;">*</span></label>
                            <input type="text" id="product-barcode" placeholder="Enter Barcode" class="form-control">
                        </div>

                        <div class="table-responsive">
                            <table id="product-table" class="table table-actions-bar m-b-0">
                                <thead>
                                    <tr>
                                        <th>No of Item</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Qty</th>
                                        <th style="min-width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="text-black text-center header-title m-t-0 m-b-30">Total Sales</h4>

                        <div class="row m-b-30">
                            <div class="col-md-12">
                                <label for="">Total Amount : </label>
                                <h2 id="total-amount" class="text-danger font-weight-bold">£ 0.00</h2>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 m-b-30 ">

                                <label for="">Amount Paid by Customer : </label>
                                <input type="number" id="amount-paid" class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 m-b-30">
                                <label for="">Amount Given to Customer : </label>
                                <h2 id="amount-given" class="text-danger font-weight-bold">£ 0.00</h2>

                            </div>
                        </div>

                        <!-- Add a button for generating PDF -->
                        <!-- Add a button for completing the order -->
                        <button id="complete-order" class="btn btn-success">Complete Order</button>

                        <div id="morris-area-with-dotted" style="height: 300px;"></div>

                    </div>

                </div>

                <!-- col -->

                <!-- end col -->



            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Ubold.
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->





<!-- Include jQuery and jsPDF libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product-barcode').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                var barcode = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('find.product') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'barcode': barcode
                    },
                    success: function(response) {
                        if (response && response.Product_Name) {
                            // Update the table with the product details
                            var newRow = '<tr>' +
                                '<td>' + response.id + '</td>' +
                                '<td>' + response.Product_Name + '</td>' +
                                '<td>' + response.Product_Sale_Price + '</td>' +
                                '<td><input type="number" name="product_qty[]" class="form-control" value="1" required /></td>' +
                                '<td><button class="btn btn-danger btn-sm remove-item">Remove</button></td>' +
                                '</tr>';
                            $('#product-table tbody').append(newRow);

                            // Calculate and update the total amount
                            calculateTotalAmount();

                            // Clear the input field
                            $('#product-barcode').val('');
                        } else {
                            alert('Product not found!');
                        }
                    },
                    error: function() {
                        alert('Error occurred while fetching product data.');
                    }
                });
            }
        });

        // Event handler for item removal
        $('#product-table').on('click', '.remove-item', function() {
            $(this).closest('tr').remove();
            calculateTotalAmount();
        });

        // Event handler for quantity input changes
        $('#product-table').on('input', 'input[name="product_qty[]"]', function() {
            calculateTotalAmount();
        });

        // Event handler for "Amount Paid by Customer" input
        $('#amount-paid').on('input', function() {
            calculateTotalAmount();
        });


        // Event handler for completing the order
        // Event handler for completing the order
        // Event handler for completing the order
        $('#complete-order').on('click', function() {
            // Create an empty order object
            var order = {
                items: [],
                totalAmount: parseFloat($('#total-amount').text().replace('£ ', '')),
                amountPaid: parseFloat($('#amount-paid').val())
            };

            // Loop through the rows in the product table to populate the 'items' array
            $('#product-table tbody tr').each(function() {
                var item = {
                    name: $(this).find('td:eq(1)').text(),
                    price: parseFloat($(this).find('td:eq(2)').text()),
                    qty: parseInt($(this).find('input[name="product_qty[]"]').val())
                };
                order.items.push(item);
            });

            // Send the order data to the server for saving
            $.ajax({
                type: 'POST',
                url: '{{ route('save.order') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'order': order
                },
                success: function(response) {
                    if (response && response.success) {
                        alert('Order saved successfully.');

                        // Clear the order table
                        $('#product-table tbody').empty();

                        // Reset total amount and amount given
                        $('#total-amount').text('£ 0.00');
                        $('#amount-given').text('£ 0.00');
                        $('#amount-paid').val('');

                    } else {
                        alert('Error occurred while saving the order.');
                    }
                },
                error: function() {
                    alert('Error occurred while saving the order.');
                }
            });
        });



        // Function to recalculate total amount
        function calculateTotalAmount() {
            var totalAmount = 0;
            $('#product-table tbody tr').each(function() {
                var price = parseFloat($(this).find('td:eq(2)').text());
                var qty = parseInt($(this).find('input[name="product_qty[]"]').val());
                totalAmount += price * qty;
            });
            $('#total-amount').text('£ ' + totalAmount.toFixed(2));

            // Update "Amount Given to Customer" correctly
            var amountPaid = parseFloat($('#amount-paid').val());
            if (!isNaN(amountPaid)) {
                var amountGiven = amountPaid - totalAmount;
                $('#amount-given').text('£ ' + amountGiven.toFixed(2));
            } else {
                $('#amount-given').text('£ 0.00'); // Reset if amountPaid is not a valid number
            }
        }
    });
</script>

<x-resources.adminfooter />
</body>

</html>

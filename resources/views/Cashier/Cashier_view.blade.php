<x-resources.adminheader title="Cashier" />

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="form-group">
                <label for="userName">Product Barcode <span style="font-weight: bolder; color: red;">*</span></label>
                <input type="text" id="product-barcode" placeholder="Enter Barcode" class="form-control">
            </div>

            <div class="p-t-10">
                <table id="product-table" class="table m-0">
                    <thead>
                        <tr>
                            <th>No of Item</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Total Amount : </label>
                    <span id="total-amount">£ 0.00</span>
                </div>
                <div class="col-md-6">
                    <label for="">Amount Paid by Customer : </label>
                    <input type="number" id="amount-paid" class="form-control" />
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Amount Given to Customer : </label>
                    <span id="amount-given">£ 0.00</span>
                </div>
            </div>

            <!-- Add a button for generating PDF -->
            <!-- Add a button for completing the order -->
            <button id="complete-order" class="btn btn-success">Complete Order</button>

        </div> <!-- content -->
        <footer class="footer">
            {{ date('Y') }} POS-SYSTEM DESIGNED BY: MUHAMMAD UZAIR ISHFAQ
        </footer>
    </div>
</div>

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

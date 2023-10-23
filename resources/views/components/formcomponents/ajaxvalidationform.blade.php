<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            var routter = @json($ajaxroute);

            var formData = new FormData(this); // Create a FormData object from the form

            $.ajax({
                url: routter,
                type: "POST",
                data: formData, // Use FormData object
                processData: false, // Don't process the data
                contentType: false, // Don't set content type (let jQuery handle it)
                success: function(response) {
                    // Handle success response
                    console.log(response);

                    // Show success notification to the user
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect back after the success notification
                            window.location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // If validation fails, display errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '<br>';
                        });
                        // Show error notification to the user
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: errorMessage,
                        });
                    } else {
                        // Handle other error cases
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.',
                        });
                    }
                }
            });
        });
    });
</script>

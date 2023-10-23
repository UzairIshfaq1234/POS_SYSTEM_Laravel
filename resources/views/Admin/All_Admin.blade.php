<x-resources.adminheader title="All Admin" />

@if (session('toast_type') && session('toast_message'))
    <x-Elements.toasteralert />
@endif

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">



            <!-- End row -->
            <!-- Page-Title -->
            <div class="row ">
                <div class="col-sm-12">
                    <h4 class="page-title ">All Admins</h4>

                </div>


            </div>
            <br>


            <div class="panel">

                <div class="panel-body">

                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-responsive table-striped" id="datatable-editable">
                            <thead>
                                <tr>
                                    <th>Username</th>

                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_admin_records as $record)
                                    <tr class="gradeX">
                                        <td>{{ $record->Username }}</td>

                                        <td>{{ $record->Email }}</td>

                                        <td>{{ $record->Password }}</td>
                                        <td class="actions">

                                            <!-- Custom Modals -->

                                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Update Admin Data</h4>
                                                        </div>
                                                        <x-formcomponents.Adminformhead
                                                            formroute="{{ $formroute }}" />

                                                        <div class="modal-body">
                                                            <div class="row all-data-input">

                                                                <div class="form-group col-md-12">
                                                                    <label for="field-3"
                                                                        class="control-label">Name</label>
                                                                    <input type="text" name="Name" class="form-control"
                                                                        id="field-1">
                                                                </div>
                                                            </div>

                                                            <div class="row all-data-input">

                                                                <div class="form-group col-md-12">
                                                                    <label for="field-3"
                                                                        class="control-label">Email</label>
                                                                    <input type="email" disabled name="Email" class="form-control"
                                                                        id="field-2" >
                                                                </div>
                                                            </div>
                                          
                                                            <div class="row all-data-input">

                                                                <div class="form-group col-md-12">
                                                                    <label for="field-3"
                                                                        class="control-label">Password</label>
                                                                    <input type="text" name="Password" class="form-control"
                                                                        id="field-3" >
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-md-12">
                                                        
                                                                    <input type="hidden" name="Id" class="form-control"
                                                                        id="field-4" >
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-info waves-effect waves-light">Save
                                                                changes</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div><!-- /.modal -->

                                            <a href="#" class="on-default waves-effect waves-light edit-button"
                                                data-record="{{ json_encode($record) }}" data-toggle="modal"
                                                data-target="#con-close-modal">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('Admin.deldata', ['id' => $record->Id]) }}"
                                                class="on-default delete-link-admin" data-id="{{ $record->Id }}">
                                                <i class="fa fa-trash-o"></i>
                                             </a>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end: page -->

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.delete-link-admin').click(function(event) {
            event.preventDefault(); // Prevent the default link behavior
    
            var deleteUrl = $(this).attr('href');
            var recordId = $(this).data('id');
    
            // Show confirmation dialog
            Swal.fire({
                title: 'Delete Confirmation',
                text: 'Are you sure you want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#5FBEAA',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with deletion
                    deleteRecord(deleteUrl, recordId);
                }
            });
        });
    
        function deleteRecord(url, id) {
            $.ajax({
                url: url,
                type: "GET", // or "POST" based on your route definition
                success: function(response) {
                    // Handle success response
                    console.log(response);
    
                    // Show success notification to the user
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.toast_message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect back after the success notification
                            window.location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    // Handle error cases
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again.',
                    });
                }
            });
        }
    });
    </script>
    

<script>
    $(document).ready(function() {
        $('.edit-button').click(function() {
            var recordData = $(this).data('record');
            $('#field-1').val(recordData.Name);
            $('#field-2').val(recordData.Email);
            $('#field-3').val(recordData.Password);
            $('#field-4').val(recordData.Id);

            // You can add more fields similarly if needed
        });
    });
</script>
<x-formcomponents.ajaxvalidationform ajaxroute={{$formroute}} />




<x-resources.adminfooter />

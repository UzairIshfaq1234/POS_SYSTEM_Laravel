<x-resources.adminheader title="Add Admin" />


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
                        <h4 class="m-t-0 header-title"><b>Add Admin</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Add your details correctly.
                        </p>


                        <x-formcomponents.Adminformhead formroute="{{ $formroute }}" />


                        <div class="form-group">
                            <label for="userName">Name <span style="color:red;">*</span></label>
                            <input type="text" name="Name" parsley-trigger="change" required
                                placeholder="Enter Name" class="form-control" id="userName">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Username">Username <span style="color:red;">*</span></label>
                            <input type="text" name="Username" parsley-trigger="change" required
                                placeholder="Enter Username" class="form-control" id="Username">
                            @error('Username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Email Address <span style="color:red;">*</span></label>
                            <input type="email" name="Email" parsley-trigger="change" required
                                placeholder="Enter email" class="form-control" id="emailAddress">
                            @error('Email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password <span style="color:red;">*</span></label>
                            <input id="pass1" type="text" name="Password" placeholder="Password" required
                                class="form-control">

                            @error('Password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass1">Status <span style="color:red;">*</span></label>
                            <div>
                                <select name="Status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Not Active</option>

                                </select>

                            </div>
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

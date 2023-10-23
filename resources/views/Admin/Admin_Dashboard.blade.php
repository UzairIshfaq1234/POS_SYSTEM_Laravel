<x-resources.adminheader title="Admin Dashboard" />


@if (session('toast_type') && session('toast_message'))
<x-Elements.toasteralert />
@endif
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
                    <h4 class="page-title">ADMIN DASHBOARD</h4>
                    <p class="text-muted page-title-alt">Welcome to <b>POS SYSTEM </b>Admin
                        portal !</p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-info">
                                        <i class="icon-layers"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>12560</b></h4>
                                    <p class="text-muted m-b-0 m-t-0">Total Revenue</p>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-bar" data-colors="#34d3eb,#ebeff2" data-width="120"
                                        data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-custom">
                                        <i class="icon-layers"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>356</b></h4>
                                    <p class="text-muted m-b-0 m-t-0">Ave. weekly Sales</p>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50"
                                        data-height="45">1/5</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-box">
                        <div class="bar-widget">
                            <div class="table-box">
                                <div class="table-detail">
                                    <div class="iconbox bg-danger">
                                        <i class="icon-layers"></i>
                                    </div>
                                </div>

                                <div class="table-detail">
                                    <h4 class="m-t-0 m-b-5"><b>96562</b></h4>
                                    <p class="text-muted m-b-0 m-t-0">Visiters</p>
                                </div>
                                <div class="table-detail text-right">
                                    <span data-plugin="peity-donut" data-colors="#f05050,#ebeff2" data-width="50"
                                        data-height="45">1/5</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="portlet">
                        <!-- /primary heading -->
                        <div class="portlet-heading">
                            <h3 class="portlet-title text-dark text-uppercase">
                                Projects
                            </h3>
                            <div class="portlet-widgets">
                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                <span class="divider"></span>
                                <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i
                                        class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="portlet2" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th>Assign</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <td>8</td>
                                                <td>Ubold Admin v1.3</td>
                                                <td>01/01/2015</td>
                                                <td>31/05/2015</td>
                                                <td><span class="label label-warning">Coming soon</span></td>
                                                <td>Coderthemes</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->


            </div>

            <!-- end row -->






            <x-resources.adminfooter />

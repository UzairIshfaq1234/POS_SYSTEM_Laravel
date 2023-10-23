{{-- header --}}
<x-resources.header title="POS-Login" />


<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <div class="text-center"> <img src="{{ asset('assets/images/pos.png') }}" class="img thumb-lg"
                    alt="">
            </div>
            <h3 class="text-center"><strong class="text-success">LOGIN</strong> </h3>
        </div>


        {{-- TOAST --}}




        @if (session('toast_type') && session('toast_message'))
            <x-Elements.toasteralert />
        @endif

        {{-- TOAST --}}


        <div class="panel-body">
            <x-formcomponents.formhead formroute="{{ $formroute }}" />

            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" style="border 2px solid black" class="form-control" required name="username" parsley-type="email"
                        placeholder="Enter a valid Username" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input type="password" class="form-control" required name="password" parsley-type="password"
                        placeholder="Enter a valid Password" />
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit">Log
                        In</button>
                </div>
            </div>

            <div class="form-group m-t-30">
                <div class="col-sm-12">
                    <a href="page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your
                        password?</a>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>

{{-- footer --}}
<x-resources.footer />

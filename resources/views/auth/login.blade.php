<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>{{config('settings.ProjectName')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Connect-PS" name="description" />
        <meta content="Connect-PS" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('')}}/assets/admin/images/favicon.png">

        <!-- App css -->
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/app.min.css" rel="stylesheet" type="text/css" />
<style>
    @import url('https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic');
body {
    font-family: 'Cairo', sans-serif;
 /*background-image: url("{{url('')}}/assets/admin/images/2132976.jpg");*/
 /*-webkit-background-size: cover;*/
 /* -moz-background-size: cover;*/
 /* -o-background-size: cover;*/
 /* background-size: cover;*/
}
html {
    height: 100%
}
</style>

</head>

    <body>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-50 m-auto">
                                    <a href="{{url('')}}">
                                        <span><img src="{{url('')}}/assets/admin/images/logo-dark.png" alt="" height="100"></span>
                                    </a>
                                   
                                </div>

                      <form method="POST" action="{{ route('login') }}">
                      @csrf

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">{{__('lang.email')}} @error('email'): <strong style="color:red;">{{ $message }}</strong>@enderror</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required="" placeholder="Enter your email">
                                    </div>



                                    <div class="form-group mb-3">
                                        <label for="password">{{__('lang.password')}} @error('password'): <strong style="color:red;">{{ $message }}</strong>@enderror </label>


                                        <input class="form-control" type="password" required="" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
                                    </div>



                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin"> {{__('lang.remember_me')}}  </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> {{__('lang.login_in')}}  </button>
                                    </div>

                                </form>




                            </div> <!-- end card-body -->
                        </div>



                    </div> <!-- end col -->
                </div>

             <footer style="color:#000" class="footer footer-alt">
            {{date('Y')}} &copy; {{config('settings.ProjectName')}} - {{config('settings.PowerdBy')}}
            </footer>

                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->




        <!-- Vendor js -->
        <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

    </body>

<!-- Mirrored from Connect-PS.com/Connect-PS/layouts/light/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2019 13:30:23 GMT -->
</html>

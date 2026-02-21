@extends('backend.layouts.default')

@section('content')
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">


                                    <h4 class="header-title mb-4"> {{__('lang.create_languages')}}  </h4>

{!! Form::open([ 'route' => 'languages.store', 'role' => 'form' , 'class' => 'form' ]) !!}
@include('backend.pages.languages.form')
{!!Form::close()!!}

</div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.languages')}} | {{__('lang.app_name')}}</title>



         <!-- Plugins css -->
         <link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
		 <link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<!-- third party css -->
        <link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/css-{{DirUser()}}/app.min.css" rel="stylesheet" type="text/css" />


@endsection

@section('scripts')

 <!-- Right bar overlay-->
       <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>
        <!-- Chart JS -->
        <script src="{{url('')}}/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/moment/moment.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Chat app -->
        <script src="{{url('')}}/assets/admin/js/pages/jquery.chat.js"></script>
        <!-- Todo app -->
        <script src="{{url('')}}/assets/admin/js/pages/jquery.todo.js"></script>
        <!-- Dashboard init JS -->
        <script src="{{url('')}}/assets/admin/js/pages/dashboard-3.init.js"></script>
        <!-- App js-->
        <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

@endsection

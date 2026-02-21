@extends('backend.layouts.default')

@section('content')
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">



<p class="header-title mb-6"> <B> {{__('lang.update_vendor')}} | {{$vendor->title}} </B> </p>
{!! Form::model( $vendor ,[ 'url' =>  config('settings.BackendPath').'/vendors/'.$vendor->id, 'method'=>'PATCH' ,  'class' => 'form' ,  'files' => 'true' ]) !!}
@include('backend.pages.vendors.form')
{!!Form::close()!!}

</div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.update_vendor')}} | {{$vendor->title}} | {{config('settings.ProjectName')}}</title>

         <!-- Plugins css -->
         <link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
		 <link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<!-- third party css -->
        <link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <link href="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

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

        <script src="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/dropify/dropify.min.js"></script>
        <!-- Init js-->
        <script src="{{url('')}}/assets/admin/js/pages/form-fileuploads.init.js"></script>

@endsection

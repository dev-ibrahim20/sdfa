@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card-box">

<p class="header-title mb-6"> <B> {{__('lang.create_job_order')}}</B> </p>

{!! Form::open([ 'route' => 'job-orders.store', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}
@include('backend.pages.job_orders.form')
{!! Form::hidden('building_id', $building_id) !!}
{!!Form::close()!!}
</div>
    </div><!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->
@endsection


@section('head')

<title>  {{__('lang.create_job_order')}} |  {{config('settings.ProjectName')}}</title>

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


        <link href="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- select css -->
        <link href="{{url('')}}/assets/admin/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />


        <!-- picker css -->
        <link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('')}}/assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('scripts')
 <!-- Vendor js -->
 <script src="{{url('')}}/assets/admin/js/vendor.min.js"></script>
        <!-- Chart JS -->
        <script src="{{url('')}}/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/moment/moment.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Dashboard init JS -->
        <script src="{{url('')}}/assets/admin/js/pages/dashboard-3.init.js"></script>

        <script src="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/dropify/dropify.min.js"></script>
        <!-- Init js-->
        <script src="{{url('')}}/assets/admin/js/pages/form-fileuploads.init.js"></script>

        <script src="{{url('')}}/assets/admin/libs/jquery-nice-select/jquery.nice-select.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/switchery/switchery.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/multiselect/jquery.multi-select.js"></script>
        <script src="{{url('')}}/assets/admin/libs/select2/select2.min.js"></script>

        <script src="{{url('')}}/assets/admin/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <script src="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="{{url('')}}/assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Init js-->
       <script src="{{url('')}}/assets/admin/js/pages/form-pickers.init.js"></script>

       <!-- App js-->
       <script src="{{url('')}}/assets/admin/js/app.min.js"></script>

@endsection

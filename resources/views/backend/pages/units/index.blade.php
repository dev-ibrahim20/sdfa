@extends('backend.layouts.default')
@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-sm-4">
<h4 class="page-title"> 
    <i class="fa fa-users"></i> 

    {{__('lang.units')}} 
    
</h4>
</div>
<div class="col-sm-8">
<div class="text-sm-right">

@can('create_units')
<a href="{{url('')}}/{{config('settings.BackendPath')}}/units/create"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_unit')}} </button></a>
@endcan

<div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
<button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
</div>
<div class="btn-group mb-3 d-none d-sm-inline-block">
<button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
</div>
</div>
</div><!-- end col-->
</div> 
<!-- end row-->


<div class="row">


@foreach($units as $unit)
<!--  Start projects -->
<div class="col-xl-4">
<div class="card-box project-box">
<div class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/units/{{$unit->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>


<a href="#" class="dropdown-item get_activity_log" subject_id="{{$unit->id}}" subject_type="{{get_class($unit)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a>

</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h5 class="mt-0"><a href="javascript: void(0);" class="text-dark">  {{$unit->title}}</a></h5>

</div> <!-- end card box-->
</div><!-- end col-->
@endforeach


</div>
<!-- end row -->


<!-- 
<div class="row">
<div class="col-12">
<div class="text-center mb-3">
<a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
</div>
</div> 
</div>
-->


<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title> {{__('lang.units')}} | {{config('settings.ProjectName')}}</title>

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

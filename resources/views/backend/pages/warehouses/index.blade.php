@extends('backend.layouts.default')
@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-sm-4">
<h4 class="page-title"> 
    <i class="mdi mdi-adjust"></i> 
    @if(isset($project))
    {{__('lang.warehouses')}} | 
    @endif
    {{$project->title ?? __('lang.all_warehouses')}}  

</h4>
</div>

@if( isset($project_id) )
<div class="col-sm-8">
<div class="text-sm-right">

<a href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/create/{{$project_id ?? ''}}"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_warehouse')}} </button></a>

<div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
<button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
</div>
<div class="btn-group mb-3 d-none d-sm-inline-block">
<button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
</div>
</div>
</div><!-- end col-->
@endif
</div> 
<!-- end row-->




<div class="row">
@foreach($projects as $project)
@can('list_project_'.$project->id)

<div class="row col-12">
<h5 class=" text-uppercase bg-light p-2"><i class="mdi mdi-adjust"></i> {{$project->title}}  </h5>
<hr>
</div>

@foreach($project->warehouses as $warehouse)

<!--  Start projects -->
<div class="col-xl-4">
<div class="card-box project-box">
<div class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/transactions/{{$warehouse->id}}"> <i class="fe-refresh-ccw"> </i> {{__('lang.add_transaction')}}</a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/{{$warehouse->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/products/{{$warehouse->id}}"> <i class="mdi mdi-apps "> </i>  {{__('lang.products')}}</a>

<a href="#" class="dropdown-item get_activity_log" subject_id="{{$warehouse->id}}" subject_type="{{get_class($warehouse)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a>

</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h5  style="text-align:center;"  class="mt-0"><a href="javascript: void(0);" class="text-dark"> <B> {{$warehouse->title}} </B> (<b>{{$warehouse->products->count()}}</b> {{__('lang.products')}}) </a></h5>
@if($warehouse->supervisor_name)
<p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small>{{$warehouse->supervisor_name}}</small></p>
@endif
 
</div> <!-- end card box-->
</div><!-- end col-->


<!-- end row -->

@endforeach
@endcan
@endforeach

</div>

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

<title> {{__('lang.warehouses')}} | {{config('settings.ProjectName')}}</title>

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

@extends('backend.layouts.default')
@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<!-- end page title --> 

<div class="row ">
<div class="col-sm-4">

<h4 class="page-title"> 
<i class="fe-grid"></i> 

{{__('lang.buildings')}} | {{$project->title ?? ''}}

</h4>

</div>
<div class="col-sm-8">
<div class="text-sm-right">


<a href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/create?project={{$project_id ?? ''}}"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_building')}} </button></a>

<div  class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-filter m-0  h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">
<a href="#" class="dropdown-item" > <i class="fa fa-undo"> </i> {{__('lang.all')}}</a>
@foreach( $project_stages as $stage )
<a href="#" class="dropdown-item" > <i class="fa fa-list"> </i> {{ $stage->title }} </a>
@endforeach
</div>
</div> <!-- end dropdown -->
@include('backend.includes.data_view_type')
</div>
</div><!-- end col-->
</div> 
<!-- end row-->


<div class="row">
@include('backend.pages.buildings.table')
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

<title>{{__('lang.projects')}} | {{config('settings.ProjectName')}}</title>

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

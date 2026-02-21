@extends('backend.layouts.default')

@section('content')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content">

<!-- Start Content-->
<div class="container-fluid">


<div class="row">
<div class="col-12">
<div class="card-box">
@can('create_roles')
<a href="{{url(config('settings.BackendPath').'/roles/create')}}" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> Create Role
</a>
@endcan

<h4 class="header-title mb-4"> {{__('lang.roles')}}  </h4>

<table class="table  m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> {{__('lang.title')}}  </th>
<th> {{__('lang.status')}} </th>
@canany(['edit_roles','publish_roles','delete_roles'])
<th class="hidden-sm">{{__('lang.options')}}</th>
@endcanany
</tr>
</thead>

<tbody>

@foreach ( $data as $row )
<tr>
<td >  <B> {{$row->title}} </B> </td>
<td >
@if( $row->status == 1 )
<span class="label label-sm label-success">{{__('lang.approved')}}</span>
@else
<span class="label label-sm label-danger"> {{__('lang.blocked')}} </span>
@endif
</td>

@canany(['edit_roles','publish_roles','delete_roles'])
<td>
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

@can('edit_roles')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.edit')}}</a>
@endcan

@can('publish_roles')
@if( $row->status == 1 )
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/status/{{$row->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.block')}}</a>
@else
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.approve')}} </a>
@endif
@endcan

@can('delete_roles')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/roles/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.delete')}}</a>
@endcan

</div>
</div>
</td>
@endcanany
</tr>

@endforeach


</tbody>
</table>


{{$data->links()}}


</div>
</div><!-- end col -->
</div>
<!-- end row -->







</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title> {{__('lang.roles')}} | {{__('lang.app_name')}}</title>




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

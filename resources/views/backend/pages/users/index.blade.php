@extends('backend.layouts.default')

@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">


<div class="row">
<div class="col-12">
<div class="card-box">
@can('create_users')
<a href="{{url(config('settings.BackendPath').'/users/create')}}" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i>  {{__('lang.new')}}
</a>
@endcan

<h4 class="header-title mb-4">{{__('lang.users')}}</h4>

<table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> {{__('lang.name')}} </th>
<th> {{__('lang.email')}} </th>
<th> {{__('lang.phone')}} </th>
<th> {{__('lang.status')}} </th>
<th> {{__('lang.roles')}} </th>
<th> {{__('lang.joined')}} </th>
<th class="hidden-sm">{{__('lang.options')}}</th>


</tr>
</thead>

<tbody>

@foreach ( $data as $row )

<tr>

<td> {{$row->name}} </td>
<td>{{$row->email}}</td>
<td>{{$row->phone}}</td>

<td>
@if( $row->status == 1 )
<span class="label label-sm label-success">{{__('lang.approved')}}</span>
@else
<span class="label label-sm label-danger"> {{__('lang.blocked')}} </span>
@endif
</td>

<td>@foreach ( $row->roles as $role )
<span class="label label-sm label-success">{{$role->title}}</span>
@endforeach</td>

<td class="center">{{$row->created_at}} </td>

@canany(['create_users','edit_users','publish_users','delete_users'])
<td>
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

@can('create_users')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/login_as/{{$row->id}}"><i class="mdi mdi-eye mr-2 text-muted font-18 vertical-middle"></i>  Login as   </a>
@endcan

@can('edit_users')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.edit')}}</a>
@endcan

@can('publish_users')
@if( $row->status == 1 )
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/status/{{$row->id}}/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.block')}}</a>
@else
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.approve')}} </a>
@endif
@endcan

@can('delete_users')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/users/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.delete')}}</a>
@endcan


<a href="#" class="dropdown-item get_activity_log" subject_id="{{$row->id}}" subject_type="{{get_class($row)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 

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

<title>{{__('lang.app_name')}}</title>




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

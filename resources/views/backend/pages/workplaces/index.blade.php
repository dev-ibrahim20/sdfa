@extends('backend.layouts.default')
@section('content')
<div class="content">
<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">
<div class="card-box">

@can('create_workplaces')
<a href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/create" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> {{__('lang.add_new')}}
</a>
@endcan

<h3 class="header-title mb-4">{{__('lang.workplaces')}}</h4>

<table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> {{__('lang.name')}} </th>
{{-- <th> {{__('lang.status')}} </th> --}}
{{-- @can('order_workplaces')
<th> {{__('lang.order_list')}} </th>
@endcan --}}
@canany(['edit_workplaces','publish_workplaces','delete_workplaces'])
<th> {{__('lang.options')}}</th>
@endcanany

</tr>
</thead>

<tbody>

@foreach ( $data as $row )
<tr >
<td>{{$row->name}}</td>
{{-- <td style="padding:2px;vertical-align: middle;">
@if( $row->status == 1 )
<span class="label label-sm label-success"> <span class="badge badge-success"> <i class="fe-check"></i></span>
@else
<span class="label label-sm label-danger"> <span class="badge badge-danger"> <i class="fe-eye-off"></i> </span>
@endif
</td> --}}


{{-- @can('order_workplaces')
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-danger btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i> @if (isset($row->order_list)) {{$row->order_list}} @endif </a>
<div class="dropdown-menu dropdown-menu-right">
@for ($i = 1; $i <= count($data) ; $i++)
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/order/{{$row->id}}/{{$i}}"> {{$i}}   </a>
@endfor
</div>
</div>
</td>
@endcan --}}

@canany(['edit_workplaces','publish_workplaces','delete_workplaces'])
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light  btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

@can('edit_workplaces')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/{{$row->id}}/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.edit')}}</a>
@endcan

{{-- @can('publish_workplaces')
@if( $row->status == 1 )
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/status/{{$row->id}}/0"><i class="mdi mdi-close mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.block')}}</a>
@else
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/status/{{$row->id}}/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.approve')}} </a>
@endif
@endcan --}}

@can('delete_workplaces')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/workplaces/delete/{{$row->id}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>{{__('lang.delete')}}</a>
@endcan

</div>
</div>
</td>
@endcanany

</tr>

@endforeach


</tbody>
</table>



</div>
</div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
    <div class="text-center mb-3">
    {{$data->links()}}
    </div>
    </div> 
    </div>
    
</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.workplaces')}} | {{config('settings.ProjectName')}}</title>

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

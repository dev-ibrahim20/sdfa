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
{{__('lang.tasks')}} | {{$task->title ?? ''}} 
</h4>

</div>

</div> 
<!-- end row-->


<div class="row">

<div class="col-12">
<div class="card-box">
<div class="row">


    
<table class="table table-hover table-striped m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> Title </th>
<th> Stage </th>
<th> Actions </th>
</tr>
</thead>

<tbody>

@foreach($task->tasks as $k=>$sub_task)
<tr>
<td>
    @if( $sub_task->tasks->count() )
    <a href="{{url('')}}/{{config('settings.BackendPath')}}/tasks/{{$sub_task->id}}">
        @endif
        {{$sub_task->title}}
        @if( $sub_task->tasks->count() )
    </a>
    @endif
</td>
<td> <div style="background-color:{{ $sub_task->stage->color ?? ''}}" class="badge bg-soft-success mb-3">
{{ $sub_task->stage->title ?? ''}} </div></td>

<td>
<div  class="dropdown float-center">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">

@if( $sub_task->stage->is_editable )

@can('edit_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/task/{{$sub_task->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>
@endcan

<hr>
@endif


@can('publish_projects')
@foreach( $project_stages as $stage )
@if( $stage->id != $sub_task->stage_id )

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/task_update_stage/{{$sub_task->id}}/{{ $stage->id }}"> <i class="fab fa-wpforms  "> </i>  {{ $stage->title }} </a>

@endif
@endforeach
@endcan

<a href="#" class="dropdown-item get_activity_log" subject_id="{{$sub_task->id}}" subject_type="{{get_class($sub_task)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 
</div>
</div>
</td>

</tr>

@endforeach


</tbody>
</table>
</div>
</div>
</div>



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



<!-- Modal -->
<div class="modal fade" id="list_filesexampleModal" tabindex="-1" role="dialog" aria-labelledby="list_filesexampleModal" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title list_files_title" id="list_filesexampleModal">   </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">


{!! Form::open([ 'route' => 'job_orders.add_file', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}
{!! Form::hidden('job_order_id', null , ['id' => 'job_order_id'] ) !!}

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title')}} <span class="text-danger">*</span></label>
{!! Form::text('title', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title')] ) !!}
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Files (docx,pdf,xlsx,jpg,png) <span class="text-danger">*</span></label>
</br>
{!! Form::file('file', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title')] ) !!}
</div>
</div>
</div>
<hr>

<span class="list_files_table">

</span>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add File</button>
{!!Form::close()!!}


</div>
</div>
</div>
</div>

@endsection


@section('head')

<title>{{__('lang.job_orders')}} | {{config('settings.ProjectName')}}</title>

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

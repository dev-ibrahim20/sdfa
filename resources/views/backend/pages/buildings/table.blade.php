
@if( \Auth::user()->data_view_type == 'kanban' )

@foreach($buildings as $building)

<!--  Start projects -->
<div class="col-xl-4" >
<div  class="card-box project-box">
<div  class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/floor_tasks/{{$building->id}}"> <i class="fas fa-list"> </i>  تحديث التقارير </a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/report/{{$building->id}}?report_type=pull"> <i class="fas fa-list"> </i> تقرير سحب الكابلات </a>


@if( $building->stage->is_editable )

@can('edit_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/{{$building->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>
@endcan

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders?building={{$building->id}}">
<i class="fas fa-tasks"> </i> {{__('lang.job_orders')}}</a>

@can('delete_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/delete/{{$building->id}}">  <i class="fas fa-trash"> </i> {{__('lang.delete')}}</a>
@endcan


<hr>
@endif


@can('publish_projects')
@foreach( $project_stages as $stage )
@if( $stage->id != $building->stage_id )

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/update_stage/{{$building->id}}/{{ $stage->id }}"> <i class="fab fa-wpforms  "> </i>  {{ $stage->title }} </a>

@endif
@endforeach
@endcan


<a href="#" class="dropdown-item get_activity_log" subject_id="{{$building->id}}" subject_type="{{get_class($building)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 

</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h4 style="text-align:center;" class="mt-0"><a href="javascript: void(0);" class="text-dark">  {{$building->title}}</a></h4>
@if( $building->supervisor_name )
<p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small>{{$building->supervisor_name}}</small></p>
@endif

<div style="background-color:{{ $building->stage->color ?? ''}}" class="badge bg-soft-success mb-3">
{{ $building->stage->title ?? ''}} </div>
<!-- Task info-->

<p class="mb-1">
<span class="text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-apps  text-muted"></i>
<b>{{ $building->job_orders->count()}} </b> {{__('lang.job_orders')}}
</span>

<span class="text-nowrap ml-2 mb-2 d-inline-block">
<i class="fa fa-hammer"></i> 
{{ $building->job_orders->first()->contractor->title ?? ''}} 
</span>
</p>

<!-- Progress-->
<p class="mb-2 font-weight-bold">  {{__('lang.job_orders_completed')}}: <span class="float-right">{{ $building->job_orders_completed()}}/{{ $building->job_orders->count()}}</span></p>
<div class="progress mb-1" style="height: 7px;">
<div  class="progress-bar"
role="progressbar" aria-valuenow="{{$building->job_orders_completed_percentage()}}" aria-valuemin="0" aria-valuemax="100"
style="width: {{$building->job_orders_completed_percentage()}}%;min-width:0%;background-color:{{$building->progressbar_color()}};">
</div><!-- /.progress-bar .progress-bar-danger -->
</div><!-- /.progress .no-rounded -->

</div> <!-- end card box-->
</div><!-- end col-->


@endforeach















@else


<div class="card-box col-12">

<table style="width:100%" class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> {{__('lang.name')}} </th>
<th> {{__('lang.email')}} </th>
<th> {{__('lang.phone')}} </th>



</tr>
</thead>

<tbody>

@foreach($buildings as $building)
@can('list_project_'.$building->id)

<tr>

<td> {{$building->title}} </td>
<td></td>
<td></td>

</tr>

@endcan
@endforeach

</tbody>
</table>

</div>

@endif



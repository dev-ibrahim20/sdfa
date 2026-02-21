
@if( \Auth::user()->data_view_type == 'kanban' )

@foreach($projects as $project)
@can('list_project_'.$project->id)
<!--  Start projects -->
<div class="col-xl-4" >
<div  class="card-box project-box">
<div  class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">

@if( $project->stage->is_editable )

@can('edit_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/projects/{{$project->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>
@endcan

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings?project={{$project->id}}">
<i class="fas fa-tasks"> </i> {{__('lang.buildings')}}</a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/{{$project->id}}"><i class="mdi mdi-adjust "> </i> {{__('lang.warehouses')}}</a>


<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders?project={{$project->id}}">
<i class="fas fa-tasks"> </i> {{__('lang.job_orders')}}</a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/projects/vendors-products/{{$project->id}}">
<i class="mdi mdi-apps"> </i> {{__('lang.products')}}</a>


@can('delete_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/projects/delete/{{$project->id}}">  <i class="fas fa-trash"> </i> {{__('lang.delete')}}</a>
@endcan


<hr>
@endif


@can('publish_projects')
@foreach( $project_stages as $stage )
@if( $stage->id != $project->stage->id )

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/projects/update_stage/{{$project->id}}/{{ $stage->id }}"> <i class="fab fa-wpforms  "> </i>  {{ $stage->title }} </a>

@endif
@endforeach
@endcan


<a href="#" class="dropdown-item get_activity_log" subject_id="{{$project->id}}" subject_type="{{get_class($project)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 

</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h4 style="text-align:center;" class="mt-0"><a href="javascript: void(0);" class="text-dark">{{$project->title}}</a></h4>
@if( $project->supervisor_name )
<p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small>{{$project->supervisor_name}}</small></p>
@endif

<div style="background-color:{{ $project->stage->color ?? ''}}" class="badge bg-soft-success mb-3">
{{ $project->stage->title ?? ''}} </div>
<!-- Task info-->
<p class="mb-1">
<span class="pr-2 text-nowrap mb-2 d-inline-block">
<i class="fas fa-tasks text-muted"></i>
<b><a href="{{url('')}}/{{config('settings.BackendPath')}}/buildings?project={{$project->id}}"> {{ $project->buildings->count()}}</b> {{__('lang.buildings')}} </a>
</span>
<span class="text-nowrap ml-2 mb-2 d-inline-block">
<i class="mdi mdi-adjust text-muted"></i>
<b> <a href="{{url('')}}/{{config('settings.BackendPath')}}/warehouses/{{$project->id}}">{{$project->warehouses->count()}}</b> {{__('lang.warehouses')}} </a>
</span>
</p>

<p class="mb-1">
<span class="text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-apps  text-muted"></i>
<b><a href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders?project={{$project->id}}">{{ $project->job_orders_count() }}</b> {{__('lang.job_orders')}}</a>
</span>

<span class="text-nowrap ml-2 mb-2 d-inline-block">
<i class="fa fa-hammer text-muted"></i> 

<b> <a href="{{url('')}}/{{config('settings.BackendPath')}}/contractors"> {{ $project->contractors_count() }}</b> 

{{__('lang.contractors')}}

</a>
</span>
</p>

<!-- Progress-->
<p class="mb-2 font-weight-bold">  {{__('lang.buildings_completed')}}: <span class="float-right">{{ $project->buildings_completed()}}/{{ $project->buildings->count()}}</span></p>
<div class="progress mb-1" style="height: 7px;">
<div  class="progress-bar"
role="progressbar" aria-valuenow="{{$project->buildings_completed_percentage()}}" aria-valuemin="0" aria-valuemax="100"
style="width: {{$project->buildings_completed_percentage()}}%;min-width:0%;background-color:{{$project->progressbar_color()}};">
</div><!-- /.progress-bar .progress-bar-danger -->
</div><!-- /.progress .no-rounded -->

</div> <!-- end card box-->
</div><!-- end col-->

@endcan
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

@foreach($projects as $project)
@can('list_project_'.$project->id)

<tr>

<td> {{$project->title}} </td>
<td></td>
<td></td>

</tr>

@endcan
@endforeach

</tbody>
</table>

</div>

@endif



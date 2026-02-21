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
{{__('lang.job_orders')}}  {{$building->title ?? ''}} {{$contractor->title ?? ''}}
</h4>

</div>
@if( isset($building_id) )
<div class="col-sm-8">
<div class="text-sm-right">


<a href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/create?building={{$building_id ?? ''}}"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_job_order')}} </button></a>

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
@endif
</div> 
<!-- end row-->


<div class="row">
<div class="col-12">
<div class="card-box">
<div class="row">

<form action="?" class="form-inline">

<div class="col-lg-12">

 
<div class="row">
    
<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> Number  </label>
{!! Form::text('number' ,$request->get('number') ?? null , ['id'=>'number','class' => 'form-control', 'placeholder'=> 'Job order Number'] ) !!}
</div>

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> Keyword  </label>
{!! Form::text('keyword' ,$request->get('keyword') ?? null , ['id'=>'keyword','class' => 'form-control', 'placeholder'=> 'Search in description by words'] ) !!}
</div>
</div>


<div class="row">

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.project')}}  </label>
{!! Form::select('project' , $projects->pluck('title','id') , $request->get('project') ?? null , ['id'=>'project','class' => 'custom-select', 'placeholder'=> __('lang.all')] ) !!}
</div>

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.building')}}  </label>
{!! Form::select('building' , [] , $request->get('building') ?? null , ['id'=>'building','class' => 'custom-select', 'placeholder'=> __('lang.all')] ) !!}
</div>

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.contractor')}}  </label>
{!! Form::select('contractor_id' , $contractors->pluck('title','id'), $request->get('contractor_id') ?? null , ['id'=>'contractor_id','class' => 'custom-select', 'placeholder'=> __('lang.all')] ) !!}
</div>

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.stage')}}  </label>
{!! Form::select('stage_id' , $project_stages->pluck('title','id'), $request->get('stage_id') ?? null , ['id'=>'stage_id','class' => 'custom-select', 'placeholder'=> __('lang.all')] ) !!}
</div>




<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.date_from')}}  </label>
{!! Form::date('planned_start_from' , $request->get('planned_start_from') ?? null , ['id'=>'planned_start_from','class' => 'custom-select'] ) !!}
</div>

<div class="form-group mb-3 mx-sm-2 ">
<label for="status-select" class="mr-1"> {{__('lang.date_to')}}  </label>
{!! Form::date('planned_start_to' , $request->get('planned_start_from') ?? null , ['id'=>'planned_start_to','class' => 'custom-select'] ) !!}
</div>
<div style="width:200px" class="form-group mb-3 mx-sm-2 ">

<select placeholder="Category"  data-live-search="true"  data-actions-box="true" name="category_id" class="selectpicker"  data-selected-text-format="count > 6" data-style="btn-light">
<option value="" label="Category">Category</option>
        @foreach( $categories as $category)
        @if( count($category->sub_categories) )
        <optgroup label="{{$category->title}}">
        @foreach( $category->sub_categories as $sub_category)
        <option @if( $request->get('category_id') && $sub_category->id == $request->get('category_id')) ) selected @endif value="{{$sub_category->id}}">{{$sub_category->title}}</option>
        @endforeach
        </optgroup>
        @endif
        @endforeach
        </select>
</div>

<div class="form-group mb-3 mx-sm-1 ">
<button type="submit" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-filter-variant"></i></button>
</div>

{!!Form::close()!!}

</div>
</div>


</div> <!-- end row -->
</div> <!-- end card-box -->
</div><!-- end col-->


<div class="col-12">
<div class="card-box">
<div class="row">


    
<table class="table table-hover table-striped m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> Serial </th>
<th> Job Order </th>
<th> Planned Start Date </th>
<th> Actual Start Date </th>
<th> Stage </th>
<th> Category </th>
<th> Files </th>
<th> Actions </th>
</tr>
</thead>

<tbody>

@foreach($job_orders as $k=>$job_order)
<tr>
<td>{{$job_order->id}}</td>
<td><a href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/{{$job_order->id}}">{{$job_order->title_ar}} - {{$job_order->building->title ?? ''}}</a></td>

<td>{{ $job_order->planned_start_date}}</td>

<td>{{ $job_order->actual_start_date }}</td>

<td> <div style="background-color:{{ $job_order->stage->color ?? ''}}" class="badge bg-soft-success mb-3">
{{ $job_order->stage->title ?? ''}} </div></td>

<td>{{ $job_order->category->title ?? ''}} </td>

<td>
<span class="text-nowrap ml-2 mb-2 d-inline-block">
<a href="#" class="list_files" job_order_id="{{$job_order->id}}" job_order_title="{{$job_order->title}}" style="color:#6C757D"   data-toggle="modal" data-target="#list_filesexampleModal" ><i class="text-muted fa fa-paperclip" aria-hidden="true"></i><b> {{ $job_order->files->count()}} </b></a>
</span></td>

<td>
<div  class="dropdown float-center">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div  class="dropdown-menu dropdown-menu-right">

@if( $job_order->stage->is_editable )

@can('edit_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/{{$job_order->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>
@endcan

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/products/{{$job_order->id}}">
<i class="fas fa-tasks"> </i> {{__('lang.products')}}</a>

@can('delete_projects')
<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/delete/{{$job_order->id}}">  <i class="fas fa-trash"> </i> {{__('lang.delete')}}</a>
@endcan


<hr>
@endif


@can('publish_projects')
@foreach( $project_stages as $stage )
@if( $stage->id != $job_order->stage_id )

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders/update_stage/{{$job_order->id}}/{{ $stage->id }}"> <i class="fab fa-wpforms  "> </i>  {{ $stage->title }} </a>

@endif
@endforeach
@endcan

<a href="#" class="dropdown-item get_activity_log" subject_id="{{$job_order->id}}" subject_type="{{get_class($job_order)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a> 
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


<script type="text/javascript">
var buildings = @json($buildings);
var buildings_menu = $('select[name="building"]');



@if(isset($request))

var project = $('select[name="project"]').val();
buildings_menu.empty().trigger('change');
buildings_menu.append("<option value=''>{{trans('lang.all')}}</option>");
$.each(buildings, function(i,building) {
if( building.project_id == project ){
    if( building.id == '{{Arr::get($request,'building')}}' ){
        var selected = ' selected ';
    }else{
        var selected = '';
    }
    buildings_menu.append("<option" + selected +  " value='"+ building.id +"'>" + building.title + "</option>");
}
});
buildings_menu.trigger('change');
@endif

$('select[name="project"]').on('change',function(){
let project = $(this).val();
buildings_menu.empty().trigger('change');
buildings_menu.append("<option value=''>{{trans('lang.all')}}</option>");
$.each(buildings, function(i,building) {
if( building.project_id == project ){
    buildings_menu.append("<option value='"+ building.id +"'>" + building.title + "</option>");
}
});
});



$('.list_files').on('click',function(){
let job_order_id = $(this).attr('job_order_id');
let job_order_title = $(this).attr('job_order_title');

$('#job_order_id').val(job_order_id);

$('.list_files_title').html('<i class="fa fa-paperclip" aria-hidden="true"></i> Files | ' + job_order_id + '# '+ job_order_title);

$('.list_files_table').load("{{url('')}}/{{config('settings.BackendPath')}}/job_orders/list_files/" + job_order_id);

});


</script>
@endsection

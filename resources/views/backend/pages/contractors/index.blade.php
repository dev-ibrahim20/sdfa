@extends('backend.layouts.default')
@section('content')


<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-sm-4">
<h4 class="page-title"> 
    <i class="fa fa-hammer"></i> 

    {{__('lang.contractors')}} 
    
</h4>
</div>
<div class="col-sm-8">
<div class="text-sm-right">

@can('create_contractors')
<a href="{{url('')}}/{{config('settings.BackendPath')}}/contractors/create"><button type="button" class="btn btn-danger btn-rounded mb-3"><i class="mdi mdi-plus"></i> {{__('lang.create_contractor')}} </button></a>
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


@foreach($contractors as $k=>$contractor)
<!--  Start projects -->
<div class="col-xl-4">
<div class="card-box project-box">
<div class="dropdown float-right">
<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
</a>
<div class="dropdown-menu dropdown-menu-right">

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/job-orders?contractor_id={{$contractor->id}}"> <i class="fas fa-pencil-alt"> </i> {{__('lang.job_orders')}}</a>

<a class="dropdown-item" href="{{url('')}}/{{config('settings.BackendPath')}}/contractors/{{$contractor->id}}/edit"> <i class="fas fa-pencil-alt"> </i> {{__('lang.edit')}}</a>

<a href="#" class="dropdown-item get_activity_log" subject_id="{{$contractor->id}}" subject_type="{{get_class($contractor)}}" data-toggle="modal" data-target="#activityLogModal"> <i class="fa fa-history"> </i> {{__('lang.activity_list')}} </a>

</div>
</div> <!-- end dropdown -->
<!-- Title-->
<h5 class="mt-0"><a href="javascript: void(0);" class="text-dark"> <B>  {{$contractor->title}} </B> </a></h5>

<p class="mb-1">

<span class="text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-apps  text-muted"></i>
<b>{{$contractor->buildings()}}</b> {{__('lang.buildings')}}
</span>


<span class="text-nowrap mb-2 d-inline-block">
<i class="mdi mdi-apps  text-muted"></i>
<b>{{$contractor->job_orders->count()}}</b> {{__('lang.job_orders')}}
</span>

</p>

<!-- Progress-->
<p class="mb-2 font-weight-bold">  {{__('lang.job_orders_completed')}}: <span class="float-right">{{ $contractor->job_orders_completed()}}/{{ $contractor->job_orders->count()}}</span></p>
<div class="progress mb-1" style="height: 7px;">
<div  class="progress-bar"
role="progressbar" aria-valuenow="{{$contractor->job_orders_completed_percentage()}}" aria-valuemin="0" aria-valuemax="100"
style="width: {{$contractor->job_orders_completed_percentage()}}%;min-width:0%;background-color:{{$contractor->progressbar_color()}};">
</div><!-- /.progress-bar .progress-bar-danger -->
</div><!-- /.progress .no-rounded -->



<!-- Progress-->
<p class="mb-2 font-weight-bold">  {{__('lang.buildings_completed')}}: <span class="float-right">{{ $contractor->buildings_completed()}}/{{ $contractor->buildings()}}</span></p>
<div class="progress mb-1" style="height: 7px;">
<div  class="progress-bar"
role="progressbar" aria-valuenow="{{$contractor->buildings_completed_percentage()}}" aria-valuemin="0" aria-valuemax="100"
style="width: {{$contractor->buildings_completed_percentage()}}%;min-width:0%;background-color:{{$contractor->buildings_progressbar_color()}};">
</div><!-- /.progress-bar .progress-bar-danger -->
</div><!-- /.progress .no-rounded -->

<span class="text-nowrap mb-2 d-inline-block">

<a href="#" contractor_id="{{$contractor->id}}" contractor_name="{{$contractor->title}}" rate_type="up" style="color:#48ad56" class="add_rating"  data-toggle="modal" data-target="#exampleModal" ><i data-toggle="modal" data-target="#exampleModal" class="fa fa-thumbs-up" aria-hidden="true"> {{$contractor->ratings->where('rating',1)->count()}} </i></a>
&nbsp;&nbsp;&nbsp;

<a href="#" contractor_id="{{$contractor->id}}" contractor_name="{{$contractor->title}}" rate_type="down" style="color:#ED314C" class="add_rating"  data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-thumbs-down " aria-hidden="true"> {{$contractor->ratings->where('rating',0)->count()}} </i> </a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="#" class="list_comments " contractor_id="{{$contractor->id}}" contractor_name="{{$contractor->title}}" style="color:#6C757D"   data-toggle="modal" data-target="#list_commentsexampleModal" ><i class="mdi mdi-comment-multiple-outline" aria-hidden="true">   </i>  {{$contractor->ratings->whereNotNull('comment')->count()}}</a>
&nbsp;&nbsp;&nbsp;

<a href="#" class="list_files" contractor_id="{{$contractor->id}}" contractor_name="{{$contractor->title}}" style="color:#6C757D" data-toggle="modal" data-target="#list_filesexampleModal" ><i class="fa fa-paperclip" aria-hidden="true"></i> {{$contractor->files->count()}}</a>


</span>



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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title rating_title" id="exampleModalLabel">   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
{!! Form::open([ 'route' => 'contractors.add_rating', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}

{!! Form::hidden('contractor_id', null , ['id' => 'contractor_id' , 'class'=>'contractor_id']  ) !!}
{!! Form::hidden('rating', null , ['id' => 'rating'] ) !!}

{!! Form::textarea('comment', null , ['class' => 'form-control' , 'rows'=>3 , 'placeholder'=> __('lang.comment_here')] ) !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Comment</button>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="list_commentsexampleModal" tabindex="-1" role="dialog" aria-labelledby="list_commentsexampleModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title list_comments_title" id="list_commentsexampleModal">   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body list_comments_body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>






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


{!! Form::open([ 'route' => 'contractors.add_file', 'role' => 'form' , 'class' => 'form' , 'files'=>'true' ]) !!}
{!! Form::hidden('contractor_id', null , ['id' => 'contractor_id' , 'class'=>'contractor_id'] ) !!}

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

<title> {{__('lang.contractors')}} | {{config('settings.ProjectName')}}</title>

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

<script type="text/javascript">
$('.add_rating').on('click',function(){
let rate_type = $(this).attr('rate_type');
let contractor_id = $(this).attr('contractor_id');
let contractor_name = $(this).attr('contractor_name');
if( rate_type == 'up' ) {
     $('.rating_title').html('<i class="fa fa-thumbs-up" aria-hidden="true"></i> Up Rating and Add Comment to ' + contractor_name);
     $('#rating').val(1);
}else{
    $('.rating_title').html('<i class="fa fa-thumbs-down" aria-hidden="true"></i> Down Rating and Add Comment to ' + contractor_name);
    $('#rating').val(0);
}
$('#contractor_id').val(contractor_id);
});

$('.list_comments').on('click',function(){
let contractor_id = $(this).attr('contractor_id');
let contractor_name = $(this).attr('contractor_name');
$('.list_comments_title').html('<i class="fa fa-thumbs-down" aria-hidden="true"></i> Comments | ' + contractor_name );
$('.list_comments_body').load("{{url('')}}/{{config('settings.BackendPath')}}/contractors/list_comments/" + contractor_id);
});




$('.list_files').on('click',function(){
let contractor_id = $(this).attr('contractor_id');
let contractor_name = $(this).attr('contractor_name');

$('.contractor_id').val(contractor_id);

$('.list_files_title').html('<i class="fa fa-paperclip" aria-hidden="true"></i> Files | ' + contractor_name);

$('.list_files_table').load("{{url('')}}/{{config('settings.BackendPath')}}/contractors/list_files/" + contractor_id);

});


</script>


@endsection

@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card-box">



<p class="header-title mb-6"> <B> {{__('lang.update')}} | {{$task->title}} </B> </p>

{!! Form::model( $task ,[ 'url' =>  config('settings.BackendPath').'/update_task/'.$task->id, 'method'=>'POST' ,  'class' => 'form' ,  'files' => 'true' ]) !!}

<div class="form-body">

<div class="row">

<div class="col-xl-12">
<div class="card-box">

<div class="row">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_ar')}} <span class="text-danger">*</span> </label>
{!! Form::text('title_ar', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.title_ar')] ) !!}
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> {{__('lang.title_en')}} </label>
{!! Form::text('title_en', null , ['class' => 'form-control', 'placeholder'=> __('lang.title_en')] ) !!}
</div>
</div>

</div>

<hr>

<div class="row">

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-"></i> Planned QTY </label>
{!! Form::number('planned', null , ['class' => 'form-control' , 'placeholder'=> 'Planned QTY'] ) !!}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-"></i> Actual QTY </label>
{!! Form::number('actual', null , ['class' => 'form-control' , 'placeholder'=> 'Actual QTY'] ) !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-calendar"></i> {{__('lang.planned_start_date')}} </label>
{!! Form::date('planned_start_date', null , ['class' => 'form-control flatpickr-input active' , 'placeholder'=> __('lang.planned_start_date')] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fa fa-calendar"></i> {{__('lang.actual_start_date')}} </label>
{!! Form::date('actual_start_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.actual_start_date')] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-calendar"></i> {{__('lang.planned_finish_date')}} </label>

{!! Form::date('planned_finish_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.planned_finish_date')] ) !!}

</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <i class="fa fa-calendar"></i> {{__('lang.actual_finish_date')}} </label>

{!! Form::date('actual_finish_date', null , ['class' => 'form-control' , 'placeholder'=> __('lang.actual_finish_date')] ) !!}

</div>
</div>


</div>


<div class="row">

<div class="col-md-12">
<div class="form-group">
<label for="projectinput1"> <i class="fe-list"></i> {{__('lang.activity_description')}} </label>

{!! Form::textarea('activity_description', null , ['class' => 'form-control' , 'placeholder'=> __('lang.activity_description')] ) !!}

</div>
</div>

</div>




<div class="row">
<div class="col-md-12">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-primary">

{{ __('lang.save')}} <i class="fa fa-save"></i>

</button>
</div>

</div>
</div>


</div>






</div>

</div>


{!!Form::close()!!}

</div>
    </div><!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{__('lang.update')}} | {{$task->title}} | {{config('settings.ProjectName')}}</title>

<!-- Plugins css -->
<link href="{{url('')}}/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- third party css -->
<link href="{{url('')}}/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<link href="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

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

<script src="{{url('')}}/assets/admin/libs/dropzone/dropzone.min.js"></script>
<script src="{{url('')}}/assets/admin/libs/dropify/dropify.min.js"></script>
<!-- Init js-->
<script src="{{url('')}}/assets/admin/js/pages/form-fileuploads.init.js"></script>

@endsection

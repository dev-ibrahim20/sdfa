@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">
<div class="card-box">

<h4 class="header-title mb-4">{{trans('lang.general_settings')}}</h4>

@can('edit_general_settings')
{!! Form::model($settings , [ 'url' => config('settings.BackendPath').'/general_settings', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}
@endcan


<div class="form-body">


<h4 class="form-section"><i class="la la-pencil-square"></i>   </h4>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput4">  {{__('lang.website_header_logo')}} - PNG 400w x 120h  </label>
<img src="{{url('')}}/assets/web/theme_1/img/{{$settings->website_header_logo ?? ''}}" alt="">
{!! Form::file('website_header_logo', null ,['class' => 'form-control'] ) !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput4">  {{__('lang.project_name')}}  </label>
{!! Form::text('project_name', config('settings.ProjectName') ,['class' => 'form-control' , 'placeholder'=> __('lang.project_name')] ) !!}
</div>
</div>

</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput4">  {{__('lang.default_language')}}    </label>
{!! Form::select('default_language', ['ar'=>'العربية','en'=>'الإنجليزية'] , config('settings.DefaultLanguage') ,['class' => 'form-control' ] ) !!}
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput4">  {{__('lang.backend_path')}}    </label>
{!! Form::text('backend_path', config('settings.BackendPath') ,['class' => 'form-control' , 'placeholder'=> __('lang.backend_path') ] ) !!}
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="projectinput4">  {{__('lang.powerd_by')}}  </label>
{!! Form::text('powerd_by', config('settings.PowerdBy') ,['class' => 'form-control' , 'placeholder'=> __('lang.powerd_by')] ) !!}
</div>
</div>
</div>

</div>


<div class="form-actions">

<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> {{__('lang.update')}}
</button>
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
<title> {{trans('lang.general_settings')}} | {{__('lang.app_name')}}</title>
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

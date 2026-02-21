<!DOCTYPE html>
<html lang="{{\Auth::user()->language}}"  >
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="noindex,follow" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="{{__('lang.app_name')}}" name="description" />
<meta content="{{__('lang.app_name')}}" name="author" />
<link rel="shortcut icon" href="{{url('')}}/assets/favicon/favicon.ico" />


<!-- Summernote css -->

<link href="{{url('')}}/assets/admin/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
@yield('head')

<style>
#sidebar-menu>ul>li>a.active {
    color: #ffffff;
    background-color: #6658dd;
}
</style>


<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
body {
    font-family: 'Cairo';
}
</style>

</head>
<body>
<!-- Begin page -->
<div id="wrapper">
@include('backend.includes.header')
@include('backend.includes.sidebar')
</br>
<div class="content-page">
@include('backend.includes.alert_messages')
@yield('content')

<div class="modal fade" id="activityLogModal" tabindex="-1" role="dialog" aria-labelledby="activityLogLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl " role="document">
    <div id="activity_log_modal_body" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="activityLogLabel"> {{__('lang.activity_list')}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Loading ......
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@include('backend.includes.footer')
</div>
<!-- END wrapper -->


@yield('scripts')
<!-- Summernote js -->
<script src="{{url('')}}/assets/admin/libs/summernote/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
$('.summernote').summernote({
height: 100,
});
});


$(document).on('click', '.get_activity_log', function(e){ 
e.preventDefault();
var subject_id = $(this).attr('subject_id');
var subject_type = $(this).attr('subject_type');
$('#activity_log_modal_body').load("{{route("activity_log")}}?subject_id=" + subject_id + "&subject_type=" + subject_type);
});

</script>

<!--
@if (Session()->has('msg'))
<script src="{{url('')}}/assets/admin/js/notify.min.js"></script>
<script>
$.notify("{!! Session::get("msg") !!}",
{ position:"bottom right",
  className: '{{ Session::get('alert') }}',
 }
);
</script>
@endif
-->


@stack('scripts')
</body>
</html>

@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card-box">


<p class="header-title mb-6"> <B> Report | {{$building->title}} </B> </p>


<p class="header-title mb-6"> <B> Update Report Data with excel file </B> </p>

{!! Form::open([ 'url' =>  config('settings.BackendPath').'/buildings/upload_xls/'.$building->id, 'method'=>'post' ,  'class' => 'form' ,  'files' => 'true' ]) !!}

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> Select File <span class="text-danger">*</span> </label>
{!! Form::file('xls_file', null , ['class' => 'form-control'] ) !!}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i>  نوع التقرير <span class="text-danger">*</span> </label>
{!! Form::select('report_type', [
  'pull'=>'سحب كابلات',
  'installation'=>'تركيب الراكات',
  'locking'=>'تقفيل الراكات',

  'internal'=>' سحب  الفايبر الداخلى',
  'welding_internal'=>' لحام الفايبر الداخلى',

  'external'=>' سحب الفايبر الخارجى',
  'welding_external'=>' لحام الفايبر الخارجى',


  ] , ['class' => 'form-control'] ) !!}
</div>
</div>




<div class="col-md-3">
<div class="form-group">

<button style="float:{{\Auth::user()->language == 'en' ? 'right' : 'left'}}" type="submit" class="btn btn-danger">

Upload <i class="fa fa-save"></i>

</button>
</div>

</div>

</div>
 


{!!Form::close()!!}
<hr>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:center;vertical-align:top}
</style>

<!--
<table class="tg table table-responsive">
<thead>
  <tr>
    <th class="tg-0lax" rowspan="2">Floor</th>
    @foreach($tasks as $task)
    <th class="tg-0lax" colspan="2">{{$task->title}}</th>
    @endforeach
  </tr>

  
  <tr>
    @foreach($tasks as $k=>$task)
    @if($task->title == 'L.C.R')
    <th class="tg-0lax">مخطط</th>
    <th class="tg-0lax"></th>
    @else
    <th class="tg-0lax">مخطط</th>
    <th class="tg-0lax">منفذ</th>
    @endif
    
    @endforeach
  </tr>


</thead>
<tbody>

@foreach($building->floors as $floor)
  <tr>
    <td  class="tg-0lax">{{$floor->title}}</td>
    @foreach($tasks as $task)

    @if($task->title == 'L.C.R')
    <td class="tg-0lax">{!! Form::text('planned', $building->get_progress($floor->id,$task->id,'planned') , ['style'=>'width:100px','class' => 'form-control set_progress', 'building_id'=> $building->id, 'task_id'=> $task->id , 'floor_id'=> $floor->id  , 'col'=>'planned' ,  'placeholder'=> 'المخطط'] ) !!}</td>
    <td class="tg-0lax"></td>
    @else

    <td class="tg-0lax">{!! Form::number('planned', $building->get_progress($floor->id,$task->id,'planned') , ['style'=>'width:100px','class' => 'form-control set_progress', 'building_id'=> $building->id, 'task_id'=> $task->id , 'floor_id'=> $floor->id  , 'col'=>'planned' ,  'placeholder'=> 'المخطط'] ) !!}</td>
    
    <td class="tg-0lax" style="width:50px" >{!! Form::number('actual', $building->get_progress($floor->id,$task->id,'actual') , [
        'style'=>'width:100px', 'building_id'=> $building->id, 'floor_id'=> $floor->id ,  'task_id'=> $task->id, 'col'=>'actual','class' => 'form-control set_progress' ,  'placeholder'=> 'المنفذ'] ) !!}</td>

        @endif

    @endforeach
  </tr>
  @endforeach

</tbody>
</table>
    -->

</div>
    </div><!-- end col -->
</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{$building->title}} | {{config('settings.ProjectName')}}</title>

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

<script type="text/javascript">
$('.set_progress').on('change',function(){
var val = $(this).val();
var col = $(this).attr('col');
var building_id = $(this).attr('building_id');
var task_id = $(this).attr('task_id');
var floor_id = $(this).attr('floor_id');

$.ajax({
  url:"{{ route('set_floor_progress') }}",
  method:"POST",
  data:{val:val, _token:"{{csrf_token()}}",col:col,building_id:building_id,task_id:task_id,floor_id:floor_id},
    success:function(){

    }
});



});
</script>


@endsection

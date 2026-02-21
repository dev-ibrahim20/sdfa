@extends('backend.layouts.default')

@section('content')

<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">
<div class="card-box">

<img style="float:right" src="{{url('')}}/assets/admin/images/logo-light.png" alt="" height="50"><br>
<p class="header-title mb-6"> <B> الموقف التنفيذي للمبانى </B> </p>

<hr>

@if( isset( $_GET['list_all'] ) &&  $_GET['list_all']  == 1 )
<a style="float:right" href="?list_all=0" ><button class="btn btn-dark">  Back  <i class="fa fa-undo"></i></button></a>
@else
<a style="float:right" href="?list_all=1" ><button class="btn btn-success"> كل المبانى <i class="fa fa-list"></i></button></a>
@endif




<table id="ExcelTable" dir="rtl" class="tg table table-responsive" style="border-width: 1px;border-color:#000;border-style:solid;">
<thead>
<tr style="background-color:#16618A;color:#fff;border-width: 1px;border-color:#000;border-style:solid;">
<th class="tg-0pky" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%" >المبنى</th>

<th class="tg-0pky" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:10%">عدد غرف التيار الخفيف</th>

<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%">نسبة السحب</th>

<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%"> تركيب الراكات </th>

<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%"> تقفيل الراكات </th>

<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%">  سحب الفايبر الداخلى </th>

<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%">   لحام الفايبر الداخلى </th>






<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%">  سحب الفايبر الخارجى </th>


<th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:30%">  لحام الفايبر الخارجى </th>


<th class="tg-0pky" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;width:10%">  النسبة الاجمالية للمبنى  </th>

</tr>
<tr>

<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>




<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>




<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>



<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>



<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>



<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>


<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center">مخطط</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6;text-align:center">منفذ</th>
<th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6;text-align:center">%</th>


</tr>
</thead>
<tbody>

@foreach($buildings as $building)
<tr>
@php  $total_prog = 0 ; @endphp
<td class="tg-0lax"  style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >{{$building->title}}</td>


<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >{{$building->get_count_lcr()}}</td>






<!--  سحب الكابلات -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >

@php
$build_prog = $building->get_total_progress('actual') ? round(  $building->get_total_progress('actual') / $building->get_total_progress('planned') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp

{{ $build_prog }}%</td>

<!-- تركيب الراكات -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','installation')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','installation')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >


@php
$build_prog = $building->get_total_progress('actual','installation') ? round(  $building->get_total_progress('actual','installation') / $building->get_total_progress('planned','installation') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp


{{ $build_prog }}%</td>

<!-- تقفيل الراكات -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','locking')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','locking')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >


@php
$build_prog = $building->get_total_progress('actual','locking') ? round(  $building->get_total_progress('actual','locking') / $building->get_total_progress('planned','locking') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp

{{ $build_prog }}%</td>


<!--  سحب الفايبر الداخلى -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','internal')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','internal')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >

@php
$build_prog = $building->get_total_progress('actual','internal') ? round(  $building->get_total_progress('actual','internal') / $building->get_total_progress('planned','internal') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp


{{ $build_prog }}%</td>

<!--  لحام الفايبر الداخلى -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','welding_internal')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','welding_internal')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >

@php
$build_prog = $building->get_total_progress('actual','welding_internal') ? round(  $building->get_total_progress('actual','welding_internal') / $building->get_total_progress('planned','welding_internal') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp


{{ $build_prog }}%</td>


<!--  سحب الفايبر الخارجى -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','external')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','external')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >

@php
$build_prog = $building->get_total_progress('actual','external') ? round(  $building->get_total_progress('actual','external') / $building->get_total_progress('planned','external') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp

{{ $build_prog }}%</td>


<!--  لحام الفايبر الخارجى -->
<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned','welding_external')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual','welding_external')}}</td>

<td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6" >

@php
$build_prog = $building->get_total_progress('actual','welding_external') ? round(  $building->get_total_progress('actual','welding_external') / $building->get_total_progress('planned','welding_external') * 100 , 0 ) : 0;
$total_prog = $total_prog + $build_prog;
@endphp

{{ $build_prog }}%</td>

<td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" > {{round($total_prog / 7 , 2) }} %</td>

</tr>
@php  $total_prog = 0 ; @endphp
@endforeach

</tbody>
</table>
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/reports/sample_report/sample_report_print?pdf=1">
<button class="btn btn-danger">
PDF <i class="fa fa-arrow-down"></i></button>
</a>
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/reports/sample_report/sample_report_print">
<button class="btn btn-success">
Print <i class="fa fa-print"></i></button>
</a>


<a download="الموقف التنفيذي_{{date('d-m-Y_h:i')}}" href="#" onclick="return ExcellentExport.excel(this, 'ExcelTable', 'Sheet1');"><button class="btn btn-warning">
Excel <i class="fa fa-file"></i></button></a>


</div>
</div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
<div class="col-12">
<div class="card-box">
<p class="header-title mb-6"> <B> نسب السحب للمبانى </B> </p>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
['المبانى', 'نسبة السحب'],
@foreach($buildings as $building)
@if( $building->get_total_progress('planned') > 0 )
['{{$building->title}}', {{ $building->get_total_progress('planned') ? round( $building->get_total_progress('actual') / $building->get_total_progress('planned') * 100  , 0 ) : 0 }} ],
@endif
@endforeach


        ]);

      

        var options = {
          vAxis: {
          title: '',
          width: 600,
          height: 300,
          minValue: 0,
          maxValue: 100,
          bar: {groupWidth: "50%"},
          format: '#\'%\'',
          gridlines: {
          color: '#000'
    }
        },

         
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>



<div id="columnchart_material" style="overflow:scroll;width: 100%; height: 300px;"></div>


</div>
</div><!-- end col -->
</div>






</div> <!-- container -->

</div> <!-- content -->


@endsection


@section('head')

<title>{{__('lang.app_name')}}</title>




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
<script>

$(document).on('change', '.type', function(){ 
let type = $('#type').val();
if(  type == 'in_qty' ){
$('.vendors').show();
}else{
$('.vendors').hide();
}
});
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/excellentexport@3.4.3/dist/excellentexport.min.js"></script>




@endsection

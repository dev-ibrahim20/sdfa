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



<title>الموقف التنفيذي - {{config('settings.ProjectName')}}</title>



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

<div class="content-page">





<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card-box">
<p style="float:right" class="header-title mb-6"> <B> الموقف التنفيذي للمبانى  </B> </p>

<img style="float:center" src="{{url('')}}/assets/admin/images/logo-light.png" alt="" height="50"><br>


<table class="tg table table-responsive" dir="rtl" style="font-size:13px;border-width: 0px;border-color:#000;border-style:solid;">

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



<p style="font-size:10px" class="header-title mb-6">  Last update {{date('Y-m-d H:i')}} </p>

</div>
    </div><!-- end col -->
</div>
<!-- end row -->
<br><br>

<div class="row">
    <div class="col-12">
        <div class="card-box">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="columnchart_material"></div>

        </div>
    </div><!-- end col -->
</div>


</div>

</div> <!-- container -->

</div> <!-- content -->


</body>
</html>

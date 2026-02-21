<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<style>

      
body { font-family: 'XBRiyaz', sans-serif; direction: rtl; text-align: right;color: #636466;font-size:25px; }
page { background: white;  display: block;  margin: 0 auto;  margin-bottom: 0.5cm;  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5); }
@media print {  body, page {    margin: 0;    box-shadow: 0;  } }
page[size="A4"][layout="landscape"] {  width: 29.7cm;  height: 21cm; }
page[size="A4"] {  width: 21cm;  height: 29.7cm;    direction: rtl;    direction: rtl;}


</style>
</head>

<body>
    

<page size="A4" layout="landscape">
<div class="invoiceno_table">
<div >  <img src="{{ public_path('assets/admin/images/logo-light.png') }}" style="width: 100px;"> </div>

<p style="font-size:12px;" ><B> الموقف التنفيذي لسحب الكابلات فى مبنى {{$building->title}} </B> </p>
<table style="border-width: 0px;border-color:#000;border-style:solid;vertical-align:top">
<thead>
  <tr style="background-color:#16618A;color:#fff;border-width: 1px;border-color:#000;border-style:solid;">
    <th  rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;color:#fff" >Floor</th>
    <th  rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;color:#fff">L.C.R</th>
    @foreach($tasks as $task)
    <th  colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;color:#fff">{{$task->title}}</th>
    @endforeach


    <th  colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;color:#fff">Total</th>

  </tr>
  <tr>
  @foreach($tasks as $task)
    <th  style="border-width: 1px;border-color:#000;border-style:solid;">مخطط</th>
    <th  style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6">منفذ</th>
    <th  style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6">%</th>
  @endforeach


    <th  style="border-width: 1px;border-color:#000;border-style:solid;">مخطط</th>
    <th  style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6">منفذ</th>
    <th  style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6">%</th>

  </tr>
</thead>
<tbody>

@foreach($building->floors->where('report_type','pull') as $floor)
@foreach($floor->lcrs as $k=>$lcr)
  <tr>
    @if($k == 0)
    <td rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >{{$floor->title}}</td>
    @endif

    <td style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#ededed">{{$lcr->title}}</td>
    @foreach($tasks as $task)
    <td style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_progress($lcr->id,$task->id,'planned')}}</td>
    <td style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_progress($lcr->id,$task->id,'actual')}}</td>
    <td  style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_progress($lcr->id,$task->id,'planned')  ? round(  $building->get_progress($lcr->id,$task->id,'actual') / $building->get_progress($lcr->id,$task->id,'planned')  * 100 , 0) : 0}}% </td>
    @endforeach


    <td style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_progress($lcr->id,'total','planned')}}</td>


    <td style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_progress($lcr->id,'total','actual')}}</td>

    <td  style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_progress($lcr->id,'total','planned')  ? round(  $building->get_progress($lcr->id,'total','actual') / $building->get_progress($lcr->id,'total','planned')  * 100 , 0) : 0}}% </td>
  </tr>
@endforeach
@endforeach




<tr style="font-size:15px;font-weight: bold;color:#16618A;">
  
    <td class="tg-0lax" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >Total</td>
 

    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#ededed">{{$building->get_count_lcr()}}</td>
    @foreach($tasks as $task)
    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_b_progress($task->id,'planned')}}</td>
    <td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_b_progress($task->id,'actual')}}</td>
    <td class="tg-0lax"  style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_b_progress($task->id,'planned')  ? round(  $building->get_b_progress($task->id,'actual') / $building->get_b_progress($task->id,'planned')  * 100 , 0) : 0}}% </td>
    @endforeach

    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_total_progress('planned')}}</td>

    <td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_total_progress('actual')}}</td>

    <td class="tg-0lax"  style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_total_progress('planned')  ? round(  $building->get_total_progress('actual') / $building->get_total_progress('planned')  * 100 , 0) : 0}}% </td>
  </tr>
 
</tbody>
</table>
<p style="font-size:10px" class="header-title mb-6">  Last update {{date('Y-m-d H:i')}} </p>
</div>   
<page>
</body>
</html>

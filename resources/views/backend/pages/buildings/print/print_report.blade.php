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



<title>{{$building->title}} | {{config('settings.ProjectName')}}</title>



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

<img style="float:right" src="{{url('')}}/assets/admin/images/logo-light.png" alt="" height="50"><br>

<p style="float:right" class="header-title mb-6"> <B> الموقف التنفيذي لسحب الكابلات فى مبنى {{$building->title}} </B> </p>


<table class="tg table table-responsive" style="font-size:13px;border-width: 0px;border-color:#000;border-style:solid;">
<thead>
  <tr style="background-color:#16618A;color:#fff;border-width: 1px;border-color:#000;border-style:solid;">
    <th class="tg-0pky" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >Floor</th>
    <th class="tg-0pky" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;">L.C.R</th>
    @foreach($tasks as $task)
    <th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;">{{$task->title}}</th>
    @endforeach


    <th class="tg-0pky" colspan="3" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">Total</th>

  </tr>
  <tr>
  @foreach($tasks as $task)
    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;">مخطط</th>
    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6">منفذ</th>
    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6">%</th>
  @endforeach


    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;">مخطط</th>
    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#a7e0a6">منفذ</th>
    <th class="tg-0pky" style="border-width: 1px;border-color:#000;border-style:solid;background-color:#f2d2c6">%</th>

  </tr>
</thead>
<tbody>

@foreach($building->floors->where('report_type','pull') as $floor)
@foreach($floor->lcrs as $k=>$lcr)
  <tr>
    @if($k == 0)
    <td class="tg-0lax" rowspan="2" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;vertical-align:middle;" >{{$floor->title}}</td>
    @endif

    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#ededed">{{$lcr->title}}</td>
    @foreach($tasks as $task)
    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_progress($lcr->id,$task->id,'planned')}}</td>
    <td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_progress($lcr->id,$task->id,'actual')}}</td>
    <td class="tg-0lax"  style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_progress($lcr->id,$task->id,'planned')  ? round(  $building->get_progress($lcr->id,$task->id,'actual') / $building->get_progress($lcr->id,$task->id,'planned')  * 100 , 0) : 0}}% </td>
    @endforeach


    <td class="tg-0lax" style="border-width: 1px;border-color:#000;border-style:solid;text-align:center;">{{$building->get_progress($lcr->id,'total','planned')}}</td>


    <td class="tg-0lax" style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#a7e0a6" >{{$building->get_progress($lcr->id,'total','actual')}}</td>

    <td class="tg-0lax"  style="width:50px;border-width: 1px;border-color:#000;border-style:solid;text-align:center;background-color:#f2d2c6">{{ $building->get_progress($lcr->id,'total','planned')  ? round(  $building->get_progress($lcr->id,'total','actual') / $building->get_progress($lcr->id,'total','planned')  * 100 , 0) : 0}}% </td>
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
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Job', 'نسبة السحب' ],
          
          @foreach($tasks as $task)
          ['{{$task->title}}', {{ $building->get_b_progress($task->id,'planned') ? round( $building->get_b_progress($task->id,'actual') / $building->get_b_progress($task->id,'planned') * 100  , 0 ) : 0 }}],
          @endforeach

        ]);

      

        var options = {
          vAxis: {
          title: '',
          minValue: 0,
          maxValue: 100,
          format: '#\'%\'',
          gridlines: {
          color: '#000'
    }
        },

          colors: [

            '#45A347'
            
            ]
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


</div>

</div> <!-- container -->

</div> <!-- content -->


</body>
</html>

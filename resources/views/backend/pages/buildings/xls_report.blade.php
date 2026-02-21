@extends('backend.layouts.default')

@section('content')
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div id="content1" class="card-box html-content">
   
<img style="float:right" src="{{url('')}}/assets/admin/images/logo-light.png" alt="" height="50"><br>

<span id="ExcelTable" >
    
<table style="border-collapse: collapse; border: medium none; border-spacing: 0px;">
    <thead>
	<tr>
		<th >
			 <p style="font-size:14px;" ><B> الموقف التنفيذي لسحب الكابلات فى مبنى {{$building->title}} </B> </p>  
		</th>
	</tr>
	</thead>
</table>

<table class="tg table table-responsive" style="border-width: 1px;border-color:#000;border-style:solid;">
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
</span>
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/print-report/{{ $building->id }}?pdf=1">
<button class="btn btn-danger">
PDF <i class="fa fa-arrow-down"></i></button></a>

<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/buildings/print-report/{{ $building->id }}">
<button class="btn btn-success">
Print <i class="fa fa-print"></i></button>
</a>

 <a download="الموقف التنفيذي لسحب الكابلات فى مبنى {{$building->title}}_{{date('d-m-Y_h:i')}}" href="#" onclick="return ExcellentExport.excel(this, 'ExcelTable', 'Sheet1');"><button class="btn btn-warning">
Excel <i class="fa fa-file"></i></button></a>


</div>
    </div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card-box">
<p class="header-title mb-6"> <B> نسب السحب | {{$building->title}} </B> </p>
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




</div> <!-- container -->

</div> <!-- content -->

@endsection


@section('head')

<title>{{$building->title}} | {{config('settings.ProjectName')}}</title>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/excellentexport@3.4.3/dist/excellentexport.min.js"></script>



@endsection

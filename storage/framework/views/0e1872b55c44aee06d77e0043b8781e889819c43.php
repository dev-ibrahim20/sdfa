<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content">

<!-- Start Content-->
<div class="container-fluid">

  <form action="?" method="GET">
            <div class="row">
                <div class="col-4">
                    <div class="form-group mb-3 mx-sm-2">
                        <label for="start_date">من :</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo e(request('start_date') ?: now()->startOfMonth()->toDateString()); ?>">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group mb-3 mx-sm-2">
                        <label for="end_date">الي :</label>
                        <input type="date" name="end_date" id="end_date" class="form-control"  value="<?php echo e(request('end_date') ?: now()->endOfMonth()->toDateString()); ?>">
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group mb-3 mx-sm-2">
                        <button type="submit" class="btn btn-success waves-effect waves-light" style="width: 100%; margin-top: 30px;">
                            <i class="mdi mdi-filter-variant"></i> فلتر
                        </button>
                    </div>
                </div>
            </div>
        </form>

<!-- end page title -->






<div class="row">

<div class="col-md-6 col-xl-3">
<div class="card-box">
<div class="row">
<div class="col-6">
<div class="avatar-sm bg-blue rounded">
<i class="fe-grid avatar-title font-22 text-white"></i>
</div>
</div>
<div class="col-6">
<div class="text-right">
<h3 class="text-dark my-1"><span data-plugin="counterup">
  

<?php echo e($totalSamples); ?>



</span></h3>
<p class="text-muted mb-1 text-truncate"> <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings">  العينات </a> </p>
</div>
</div>
</div>

</div> <!-- end card-box-->
</div> <!-- end col -->

<div class="col-md-6 col-xl-3">
<div class="card-box">
<div class="row">
<div class="col-6">
<div class="avatar-sm bg-success rounded">
<i class="fas fa-tasks avatar-title font-22 text-white"></i>
</div>
</div>
<div class="col-6">
<div class="text-right">
<h3 class="text-dark my-1"><span data-plugin="counterup">

<?php echo e($deliveredSamples); ?>


</span></h3>
<p class="text-muted mb-1 text-truncate">  <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings">   العينات المستلمه   </a></p>
</div>
</div>
</div>

</div> <!-- end card-box-->
</div> <!-- end col -->

<div class="col-md-6 col-xl-3">
<div class="card-box">
<div class="row">
<div class="col-6">
<div class="avatar-sm bg-warning rounded">
<i class="mdi mdi-adjust avatar-title font-22 text-white"></i>
</div>
</div>
<div class="col-6">
<div class="text-right">
<h3 class="text-dark my-1"><span data-plugin="counterup">

<?php echo e($rejectedSamples); ?>


</span></h3>
<p class="text-muted mb-1 text-truncate"> <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings?status=rejected">  العينات المرفوضه </a></p>
</div>
</div>
</div>

</div> <!-- end card-box-->
</div> <!-- end col -->

<div class="col-md-6 col-xl-3">
<div class="card-box">
<div class="row">
<div class="col-6">
<div class="avatar-sm bg-info rounded">
<i class="mdi mdi-apps avatar-title font-22 text-white"></i>
</div>
</div>
<div class="col-6">
<div class="text-right">
<h3 class="text-dark my-1"><span data-plugin="counterup"><?php echo e(\App\Models\Workplace::count()); ?></span></h3>
<p class="text-muted mb-1 text-truncate"><a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/workplaces">المنافذ</a></p>
</div>
</div>
</div>

</div> <!-- end card-box-->
</div> <!-- end col -->

</div>

<div class="row">
<div class="col-6">
<div class="card-box">

<h4 class="header-title mb-4">  العينات</h4>
<div id="piechart" style=" height: 300px;"></div>
</div>

<!--
<div class="card-box">
<h4 class="header-title mb-4"> <?php echo e(__('lang.warehouses')); ?>  </h4>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>
</div>chart_div
-->


</div><!-- end col -->

<div class="col-6">
<div class="card-box">

<h4 class="header-title mb-4">  </h4>القطاعات</h4>
<div id="barchart" style=" height: 300px;"></div>
</div>


</div><!-- end col -->
<div class="col-12">
<div class="card-box">

<h4 class="header-title mb-4">  </h4>المقرات</h4>
<div id="chart_div" style=" height: 600px;"></div>
</div>


</div><!-- end col -->





 

</div>




</div> <!-- content -->


<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

<title><?php echo e(__('lang.app_name')); ?></title>

<!-- Plugins css -->
<link href="<?php echo e(url('')); ?>/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('')); ?>/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- third party css -->
<link href="<?php echo e(url('')); ?>/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('')); ?>/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<!-- App css -->
<link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/app.min.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet"
href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>

.task-board {
display: inline-block;
padding: 12px;
border-radius: 5px;
width: 100%;
white-space: nowrap;
overflow-x: scroll;
min-height: 300px;
}

.status-card {
width: 250px;
margin-right: 8px;
background: #e2e4e6;
border-radius: 5px;
display: inline-block;
vertical-align: top;
}

.status-card:last-child {
margin-right: 0px;
}

.card-header {
width: 100%;
padding: 10px 10px 0px 10px;
box-sizing: border-box;
border-radius: 5px;
display: block;
font-weight: bold;
}

.card-header-text {
display: block;
}

ul.sortable {
padding-bottom: 10px;
}

ul.sortable li:last-child {
margin-bottom: 0px;
}

ul {
list-style: none;
margin: 0;
padding: 0px;
}

.text-row {
padding: 15px 10px;
margin: 10px;
background: #fff;
box-sizing: border-box;
border-radius: 5px;
border-bottom: 1px solid #ccc;
cursor: pointer;
white-space: normal;
line-height: 20px;
}

.ui-sortable-placeholder {
visibility: inherit !important;
background: transparent;
border: #666 2px dashed;
}
</style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- Vendor js -->
<script src="<?php echo e(url('')); ?>/assets/admin/js/vendor.min.js"></script>
<!-- Chart JS -->
<script src="<?php echo e(url('')); ?>/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
<script src="<?php echo e(url('')); ?>/assets/admin/libs/moment/moment.min.js"></script>
<script src="<?php echo e(url('')); ?>/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
<script src="<?php echo e(url('')); ?>/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Chat app -->
<script src="<?php echo e(url('')); ?>/assets/admin/js/pages/jquery.chat.js"></script>
<!-- Todo app -->
<script src="<?php echo e(url('')); ?>/assets/admin/js/pages/jquery.todo.js"></script>
<!-- Dashboard init JS -->
<script src="<?php echo e(url('')); ?>/assets/admin/js/pages/dashboard-3.init.js"></script>
<!-- App js-->
<script src="<?php echo e(url('')); ?>/assets/admin/js/app.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['الحاله', 'Sampling Count'],
        ['تم استلامها', <?php echo e($samplingCounts['delivered']); ?>],
        ['لم يتم استلامها', <?php echo e($samplingCounts['not_delivered']); ?>],
        ['لم يتم سحبها', <?php echo e($samplingCounts['not_been_withdrawn']); ?>],
        ['مرفوضه', <?php echo e($samplingCounts['rejected']); ?>],

    ]);

    var options = {
        colors: ['green', 'orange', 'red','blue'],
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
</script>

<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the data
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'القطاع');
            data.addColumn('number', 'عدد العينات');
            data.addColumn({type: 'string', role: 'tooltip'});
            data.addColumn({type: 'string', role: 'style'}); // Add color role

            // Add the data from PHP array
            data.addRows([
                <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $statistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    ['<?php echo e($statistic->sector->name); ?>', <?php echo e($statistic->count); ?>, '<?php echo e($statistic->sector->name); ?>: <?php echo e($statistic->count); ?>', '<?php echo e($colors[$index % count($colors)]); ?>'],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]);

            // Set chart options
            var options = {
                title: 'احصائيات العينه حسب القطاع ',
                bars: 'horizontal', // Use horizontal bars
                hAxis: {
                    title: 'عدد العينات '
                },
                vAxis: {
                    title: 'القطاع'
                }
            };

            // Instantiate and draw the chart
            var chart = new google.visualization.BarChart(document.getElementById('barchart'));
            chart.draw(data, options);
        }
    </script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Define the data
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'المقر');
        data.addColumn('number', 'عدد العينات ');
        data.addColumn({type: 'string', role: 'style'}); // Add color role

        // Add the data from PHP array
        data.addRows([
            <?php $__currentLoopData = $workplace_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workplaces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                ['<?php echo e($workplaces->workplace->name ??'-'); ?>', <?php echo e($workplaces->count); ?>, '<?php echo e($colors[$index % count($colors)]); ?>'],
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);

        // Set chart options
        var options = {
            title: 'عدد العينات لكل مقر',
            bars: 'vertical', // Use vertical bars
            vAxis: {
                title: 'عدد العينات'
            },
            hAxis: {
                title: 'المقر'
            }
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/index.blade.php ENDPATH**/ ?>
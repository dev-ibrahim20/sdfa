<?php $__env->startSection('content'); ?>
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <form action="?">
    <div class="row">
    
        <div class="col-md-2">
            <div class="form-group">
            <label for="projectinput1"><i class="fa fa-list"></i> <?php echo e(__('lang.sector')); ?> </label>
            <?php echo Form::select('sector', $sectors,Arr::get($filter,'sector'), ['class' => 'form-control'  , 'placeholder'=> __('lang.sector')] ); ?>

            </div>
            </div>
            <div class="col-md-2">
            <div class="form-group">
            <label for="projectinput1"><i class="fa fa-list"></i> <?php echo e(__('lang.workplace_address')); ?> </label>
            <?php echo Form::select('workplace_id', $workplaces,Arr::get($filter,'workplace_id'), ['class' => 'form-control'  , 'placeholder'=> __('lang.workplace_address')] ); ?>

            </div>
            </div>
                  <div class="col-md-1">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> <?php echo e(__('lang.status')); ?> </label>
        <?php echo Form::select('status',['delivered' => 'تم تسليمها ','not_delivered' => 'لم يتم تسليمها ','not_been_withdrawn' => 'لم يتم سحبها ','rejected' => 'رفض' ,  'photo_only'=>'تصوير فقط'],Arr::get($filter,'status'), ['class' => 'form-control'  , 'placeholder'=> __('lang.status')] ); ?>

        </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
            <label for="projectinput1"><i class="fa fa-list"></i> رقم الطلب </label>
            <?php echo Form::text('order_number',Arr::get($filter,'order_number'), ['class' => 'form-control'  , 'placeholder'=>"رقم الطلب "] ); ?>

            </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                <label for="projectinput1"><i class="fa fa-date"></i> من </label>
                <?php echo Form::date('from', Arr::get($filter, 'from'), ['class' => 'form-control'  , 'من'] ); ?>

                </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label for="projectinput1"><i class="fa fa-date"></i> الي </label>
                    <?php echo Form::date('to', Arr::get($filter, 'to'), ['class' => 'form-control'  , 'الي'] ); ?>

                    </div>
                    </div>
                <div class="col-md-1 ">
                    <div class="form-group">
                    </br>
                    <button style="float:<?php echo e(\Auth::user()->language == 'en' ? 'right' : 'left'); ?>" type="submit" class="btn btn-primary">
                    <i class="fa fa-filter"></i>
                    </button>
                    
                    
                    </div>
                    </div>
    </div>
    <div class="col-12">
    <div class="card-box">
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_samplings')): ?>
    <button type="submit" name="export" value="excel"  class="btn btn-success mb-2 float-left" style="float: left !important">
        تصدير إلى إكسل
    </button>    
    </a>
    <?php endif; ?>
    
    <h3 class="header-title mb-4">تقارير العينات</h4>
    
    <table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
    <thead>
    <tr>
    <th> # </th>   
    
    <th> اسم المنتج </th>
    <th> اسم الشركه</th>
    <th> <?php echo e(__('lang.request_date')); ?> </th>
    <th> <?php echo e(__('lang.request_sender_name')); ?> </th>
    <th> <?php echo e(__('lang.workplace_address')); ?> </th>
    <th> حاله الطلب </th>
    
    
    
    
    </tr>
    </thead>
    
    <tbody>
    
    
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <tr >
    <td><a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/<?php echo e($row->id); ?>"><?php echo e($row->id); ?></a></td>
    
    
    <td><?php echo e($row->samplingItems()->first()->product_name ?? '-'); ?></td>
    <td><?php echo e($row->samplingItems()->first()->manufacturer_company ?? '-'); ?></td>
    <td><?php echo e($row->collection_date ?? '-'); ?></td>
    <td><?php echo e($row->request_sender_name); ?></td>
    <td><?php echo e($row->workplace->name ?? '-'); ?></td>
    <td>   
    
        <?php if($row->status_order == 1): ?>
            <h2 class="badge badge-info">طلب جديد</h2>
        <?php else: ?>
        <h2 class="badge badge-success">مكتمل</h2>    
        <?php endif; ?>

        
    </td>
    
    
    
    
    
 
    
    </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    </tbody>
    </table>
    
    
    
    </div>
    </div><!-- end col -->
    </div>
    <!-- end row -->
    
    
            <div class="row">
                <div class="col-8">
                    <div class="text-center mb-3">
                        <?php echo e($data->links()); ?>

                    </div>
                </div>
          
            </div>
        
    </div> <!-- container -->
    
    </div> <!-- content -->
    
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection('head'); ?>
    
    <title><?php echo e(__('lang.samplings')); ?> | <?php echo e(config('settings.ProjectName')); ?></title>
    
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
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/reports/stock_transactions.blade.php ENDPATH**/ ?>
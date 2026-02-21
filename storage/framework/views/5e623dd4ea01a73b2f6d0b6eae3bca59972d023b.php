<?php $__env->startSection('content'); ?>
<div class="content">
<!-- Start Content-->
<div class="container-fluid">

<div class="row">
<div class="col-12">
<div class="card-box">

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_workplaces')): ?>
<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/workplaces/create" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> <?php echo e(__('lang.add_new')); ?>

</a>
<?php endif; ?>

<h3 class="header-title mb-4"><?php echo e(__('lang.workplaces')); ?></h4>

<table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> <?php echo e(__('lang.name')); ?> </th>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_workplaces','publish_workplaces','delete_workplaces'])): ?>
<th> <?php echo e(__('lang.options')); ?></th>
<?php endif; ?>

</tr>
</thead>

<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr >
<td><?php echo e($row->name); ?></td>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_workplaces','publish_workplaces','delete_workplaces'])): ?>
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light  btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_workplaces')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/workplaces/<?php echo e($row->id); ?>/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.edit')); ?></a>
<?php endif; ?>



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_workplaces')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/workplaces/delete/<?php echo e($row->id); ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.delete')); ?></a>
<?php endif; ?>

</div>
</div>
</td>
<?php endif; ?>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>
</table>



</div>
</div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
    <div class="text-center mb-3">
    <?php echo e($data->links()); ?>

    </div>
    </div> 
    </div>
    
</div> <!-- container -->

</div> <!-- content -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

<title><?php echo e(__('lang.workplaces')); ?> | <?php echo e(config('settings.ProjectName')); ?></title>

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

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/website_db52dcbb/resources/views/backend/pages/workplaces/index.blade.php ENDPATH**/ ?>
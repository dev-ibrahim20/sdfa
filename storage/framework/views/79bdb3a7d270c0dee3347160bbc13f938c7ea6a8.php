<?php $__env->startSection('content'); ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content">

<!-- Start Content-->
<div class="container-fluid">


<div class="row">
<div class="col-12">
<div class="card-box">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_roles')): ?>
<a href="<?php echo e(url(config('settings.BackendPath').'/roles/create')); ?>" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> Create Role
</a>
<?php endif; ?>

<h4 class="header-title mb-4"> <?php echo e(__('lang.roles')); ?>  </h4>

<table class="table  m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> <?php echo e(__('lang.title')); ?>  </th>
<th> <?php echo e(__('lang.status')); ?> </th>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_roles','publish_roles','delete_roles'])): ?>
<th class="hidden-sm"><?php echo e(__('lang.options')); ?></th>
<?php endif; ?>
</tr>
</thead>

<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td >  <B> <?php echo e($row->title); ?> </B> </td>
<td >
<?php if( $row->status == 1 ): ?>
<span class="label label-sm label-success"><?php echo e(__('lang.approved')); ?></span>
<?php else: ?>
<span class="label label-sm label-danger"> <?php echo e(__('lang.blocked')); ?> </span>
<?php endif; ?>
</td>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_roles','publish_roles','delete_roles'])): ?>
<td>
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_roles')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/roles/<?php echo e($row->id); ?>/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.edit')); ?></a>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('publish_roles')): ?>
<?php if( $row->status == 1 ): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/roles/status/<?php echo e($row->id); ?>/0"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.block')); ?></a>
<?php else: ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/roles/status/<?php echo e($row->id); ?>/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.approve')); ?> </a>
<?php endif; ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_roles')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/roles/delete/<?php echo e($row->id); ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.delete')); ?></a>
<?php endif; ?>

</div>
</div>
</td>
<?php endif; ?>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>
</table>


<?php echo e($data->links()); ?>



</div>
</div><!-- end col -->
</div>
<!-- end row -->







</div> <!-- container -->

</div> <!-- content -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

<title> <?php echo e(__('lang.roles')); ?> | <?php echo e(__('lang.app_name')); ?></title>




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

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/roles/index.blade.php ENDPATH**/ ?>
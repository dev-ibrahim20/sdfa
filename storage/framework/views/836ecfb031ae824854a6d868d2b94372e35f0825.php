<?php $__env->startSection('content'); ?>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <h4 class="header-title mb-6"> <?php echo e(__('lang.create_samplings')); ?> </h4>

                        <?php echo Form::open(['route' => 'samplings.store', 'role' => 'form', 'class' => 'form', 'files' => 'true']); ?>

                        <?php echo $__env->make('backend.pages.samplings.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo Form::close(); ?>

                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>
    <title> <?php echo e(__('lang.create_samplings')); ?> | <?php echo e(config('settings.ProjectName')); ?></title>

    <!-- Plugins css -->
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/datatables/responsive.bootstrap4.css" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <link href="<?php echo e(url('')); ?>/assets/admin/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/icons.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(url('')); ?>/assets/admin/css-<?php echo e(DirUser()); ?>/app.min.css" rel="stylesheet" type="text/css" />



    <link href="<?php echo e(url('')); ?>/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"
        type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="<?php echo e(url('')); ?>/assets/admin/js/vendor.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/chart-js/Chart.bundle.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/moment/moment.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Dashboard init JS -->
    <script src="<?php echo e(url('')); ?>/assets/admin/js/pages/dashboard-3.init.js"></script>
    <!-- App js-->
    <script src="<?php echo e(url('')); ?>/assets/admin/js/app.min.js"></script>

    <script src="<?php echo e(url('')); ?>/assets/admin/libs/dropzone/dropzone.min.js"></script>
    <script src="<?php echo e(url('')); ?>/assets/admin/libs/dropify/dropify.min.js"></script>
    <!-- Init js-->
    <script src="<?php echo e(url('')); ?>/assets/admin/js/pages/form-fileuploads.init.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/samplings/create.blade.php ENDPATH**/ ?>
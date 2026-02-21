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
                <div class="col-md-2">
        <div class="form-group">
        <label for="projectinput1"><i class="fa fa-list"></i> <?php echo e(__('lang.city')); ?> </label>
        <?php echo Form::select('city_id', $cities,Arr::get($filter,'city_id'), ['class' => 'form-control'  , 'placeholder'=> __('lang.city')] ); ?>

        </div>
        </div>
        <div class="col-md-2">
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
                            <label for="projectinput1"><i class="fa fa-date"></i> البيان الجمركي / رقم البلاغ</label>
                            <?php echo Form::text('commercial_registration_number', Arr::get($filter, 'commercial_registration_number'), ['class' => 'form-control', 'البيان الجمركي']); ?>

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
                
                <div class="col-md-2">
    <div class="form-group">
        <label for="sample_collection_location"><i class="fa fa-building"></i> اسم الشركة </label>
        <?php echo Form::text('sample_collection_location', Arr::get($filter, 'sample_collection_location'), ['class' => 'form-control', 'placeholder' => 'اسم الشركة']); ?>

    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <label for="request_sender_name"><i class="fa fa-user"></i> اسم مرسل الطلب </label>
        <?php echo Form::text('request_sender_name', Arr::get($filter, 'request_sender_name'), ['class' => 'form-control', 'placeholder' => 'اسم مرسل الطلب']); ?>

    </div>
</div>

<div class="col-md-2">
    <div class="form-group">
        <label for="collection_staff_name"><i class="fa fa-user"></i> موظف السحب </label>
        <?php echo Form::text('collection_staff_name', Arr::get($filter, 'collection_staff_name'), ['class' => 'form-control', 'placeholder' => 'اسم موظف السحب']); ?>

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
<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/create" class="btn btn-sm btn-blue waves-effect     waves-light float-right">
<i class="mdi mdi-plus-circle"></i> <?php echo e(__('lang.add_new')); ?>

</a>
<?php endif; ?>

<h3 class="header-title mb-4"><?php echo e(__('lang.samplings')); ?></h4>

<table class="table table-hover dt-responsive m-2 table-centered nowrap w-100" id="tickets-table">
<thead>
<tr>
<th> # </th>   

<th> اسم المنتج </th>
<th> اسم المستورد</th>
<th> <?php echo e(__('lang.request_date')); ?> </th>
<th> <?php echo e(__('lang.request_sender_name')); ?> </th>
<th> <?php echo e(__('lang.collection_staff_name')); ?> </th>
<th> <?php echo e(__('lang.workplace_address')); ?> </th>
<th> حاله الطلب </th>
<th> الحاله  </th>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_samplings','publish_samplings','delete_samplings'])): ?>
<th> <?php echo e(__('lang.options')); ?></th>
<?php endif; ?>

</tr>
</thead>

<tbody>


<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr >
<td><a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/<?php echo e($row->id); ?>"><?php echo e($row->id); ?></a></td>


<td><?php echo e($row->samplingItems()->first()->product_name ?? '-'); ?></td>
<td>
    <?php if(!empty($row->customs_clearance_contact_number)): ?>
        <?php echo e($row->customs_clearance_contact_number); ?>

    <?php else: ?>
        <?php echo e($row->sample_collection_location ?? '-'); ?>-<?php echo e($row->container_location ?? '-'); ?>

    <?php endif; ?>
</td>
<td><?php echo e($row->collection_date ?? '-'); ?></td>
<td><?php echo e($row->request_sender_name); ?></td>
<td><?php echo e($row->collection_staff_name ?? '-'); ?></td>
<td><?php echo e($row->workplace->name ?? '-'); ?></td>
<td>   

<?php if($row->status_order == 1): ?>
    <h2 class="badge badge-info">طلب جديد</h2>
<?php elseif(is_null($row->status)): ?>
    <h2 class="badge badge-success">مكتمل</h2>
<?php else: ?>
    <h2 class="badge badge-success"><?php echo e(__('lang.statuss.' . $row->status)); ?></h2>
<?php endif; ?>


    
<td>
    <?php if($row->closed == 0): ?>
        <h2 class="badge badge-danger">لم يتم التدقيق</h2>
    <?php else: ?>
    <h2 class="badge badge-success"> تم التدقيق</h2>    
    <?php endif; ?>
    
</td>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit_samplings','publish_samplings','delete_samplings'])): ?>
<td style="padding:2px;vertical-align: middle;">
<div class="btn-group dropdown">
<a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light  btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
<div class="dropdown-menu dropdown-menu-right">

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_samplings')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/<?php echo e($row->id); ?>/edit"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.edit')); ?></a>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/<?php echo e($row->id); ?>/edit?repate=1"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.repate')); ?></a>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/<?php echo e($row->id); ?>"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.details')); ?></a>

<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('new_order_samplings')): ?>  
<?php if( $row->status_order == 1 ): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/status_order/<?php echo e($row->id); ?>/0"><i class="mdi mdi-close mr-2 text-muted font-18 vertical-middle"></i>مكتمل</a>
<?php endif; ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('auditing_samplings')): ?> 
<?php if( $row->closed == 1 ): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/closed/<?php echo e($row->id); ?>/0"><i class="mdi mdi-close mr-2 text-muted font-18 vertical-middle"></i>لم يتم التدقيق</a>
<?php else: ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/closed/<?php echo e($row->id); ?>/1"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>تم التدقيق</a>
<?php endif; ?>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_samplings')): ?>
<a class="dropdown-item" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/samplings/delete/<?php echo e($row->id); ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i><?php echo e(__('lang.delete')); ?></a>
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
            <div class="col-8">
                <div class="text-center mb-3">
                    <?php echo e($data->links()); ?>

                </div>
            </div>
            <div class="col-4">
               <div class="text-center mb-3">
                   العينات - <?php echo e($data->total()); ?>

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

<?php echo $__env->make('backend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/website_db52dcbb/resources/views/backend/pages/samplings/index.blade.php ENDPATH**/ ?>
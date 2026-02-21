<div class="modal-header">
<h5 class="modal-title" id="activityLogLabel"> <?php echo e(__('lang.activity_list')); ?> | <?php echo e($info->title ?? $info->product->title ?? $info->project->title ?? $info->user->name ?? $info->warehouse->title ?? $info->name  ?? ''); ?> </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="card">
<div class="card-body">
<div  class="row">

<table id="div_task_products_table" class="table table-hover mt-1 mb-0">
<thead class="thead-light">
<tr>
<th>#</th>
<th><?php echo e(__('lang.activity')); ?></th>
<th><?php echo e(__('lang.created_at')); ?></th>
<th><?php echo e(__('lang.created_by')); ?></th>
<th><?php echo e(__('lang.before')); ?></th>
<th><?php echo e(__('lang.after')); ?></th>
</tr>
</thead>
<tbody >

<?php $__currentLoopData = $activity_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<th scope="row"><?php echo e($k+1); ?></th>
<td><?php echo e(__('lang.'.$log->description)); ?></td>                                 
<td><?php echo e($log->created_at); ?></td> 
<td><?php echo e($log->user->name ?? ''); ?></td>   
<td>
<?php if( is_array(Arr::get($log , 'properties.old') ) ): ?>
<?php $__currentLoopData = Arr::get($log , 'properties.old'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$log_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li> <?php echo e(__('lang.'.$k)); ?> : <?php echo e(get_key_trans($k,$log_item)); ?> </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</td>  
<td>
<?php if( is_array(Arr::get($log , 'properties.attributes') ) ): ?>
<?php $__currentLoopData = Arr::get($log , 'properties.attributes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$log_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li> <?php echo e(__('lang.'.$k)); ?> : <?php echo e(get_key_trans($k,$log_item)); ?> </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</td>  
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>


</div>  <!-- end row -->
</div> <!-- end card body-->
</div> <!-- end card -->

</div>

<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/includes/activity_log_modal.blade.php ENDPATH**/ ?>
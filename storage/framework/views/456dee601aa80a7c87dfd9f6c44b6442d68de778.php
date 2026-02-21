
<div class="form-body">



<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('lang.basic_information')); ?></h4>



<div class="row">

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <?php echo e(__('lang.name')); ?> </label>

<?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('lang.name')] ); ?>


</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1">  <?php echo e(__('lang.phone')); ?>     </label>

<?php echo Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01000000000'] ); ?>


</div>

</div>





</div>

<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('lang.login_information')); ?>    </h4>


</div>
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput3">  <?php echo e(__('lang.email')); ?>   </label>

<?php echo Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('lang.email')] ); ?>


</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label for="projectinput1">  <?php echo e(__('lang.password')); ?>    </label>

<?php echo Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('lang.password')] ); ?>

<?php if( isset($data) ): ?>
اتركها بدون كلمة مرور فى حال عدم تغيير كلمة المرور
<?php endif; ?>
</div>

</div>


</div>

<h4 class="form-section"><i class="la la-key"></i> <?php echo e(__('lang.roles')); ?>    </h4>

<div class="row">




<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="form-group  col-md-2">
<label>

<input <?php if(isset($data->roles)): ?> <?php $__currentLoopData = $data->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($current_role->id == $role->id): ?> checked <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
name='role_id[]' value='<?php echo e($role->id); ?>' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B
title='<?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(__("lang.".$permission->name)); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' > <?php echo e($role->title); ?></B>

</label>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>

<div class="form-actions">

<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> <?php echo e(__('lang.save')); ?>

</button>
</div>
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/website_db52dcbb/resources/views/backend/pages/users/form.blade.php ENDPATH**/ ?>
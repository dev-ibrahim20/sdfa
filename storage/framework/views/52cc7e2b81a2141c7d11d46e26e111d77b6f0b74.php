
<?php if(count($errors) || Session()->has('msg')): ?>

<div class="col-12 alert_div">

<?php if(count($errors)): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">
<p style="color:red;"> <i style="color:black;" class="fe-alert-circle"></i>  <?php echo $error; ?> </p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php if(Session()->has('msg')): ?>
<div class="alert alert-<?php echo e(Session::get('alert')); ?>" role="<?php echo e(Session::get('alert')); ?>"  >
<i class="fe-check"></i> <?php echo Session::get("msg"); ?>

</div>
<?php endif; ?>

</div>
<?php $__env->startPush('scripts'); ?>
<script>
$('.alert_div').show().delay(5000).fadeOut();
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/website_db52dcbb/resources/views/backend/includes/alert_messages.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(\Auth::user()->language); ?>"  >
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="noindex,follow" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="<?php echo e(__('lang.app_name')); ?>" name="description" />
<meta content="<?php echo e(__('lang.app_name')); ?>" name="author" />
<link rel="shortcut icon" href="<?php echo e(url('')); ?>/assets/favicon/favicon.ico" />


<!-- Summernote css -->

<link href="<?php echo e(url('')); ?>/assets/admin/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
<?php echo $__env->yieldContent('head'); ?>

<style>
#sidebar-menu>ul>li>a.active {
    color: #ffffff;
    background-color: #6658dd;
}
</style>


<link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
body {
    font-family: 'Cairo';
}
</style>

</head>
<body>
<!-- Begin page -->
<div id="wrapper">
<?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backend.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</br>
<div class="content-page">
<?php echo $__env->make('backend.includes.alert_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>

<div class="modal fade" id="activityLogModal" tabindex="-1" role="dialog" aria-labelledby="activityLogLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl " role="document">
    <div id="activity_log_modal_body" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="activityLogLabel"> <?php echo e(__('lang.activity_list')); ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Loading ......
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- END wrapper -->


<?php echo $__env->yieldContent('scripts'); ?>
<!-- Summernote js -->
<script src="<?php echo e(url('')); ?>/assets/admin/libs/summernote/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
$('.summernote').summernote({
height: 100,
});
});


$(document).on('click', '.get_activity_log', function(e){ 
e.preventDefault();
var subject_id = $(this).attr('subject_id');
var subject_type = $(this).attr('subject_type');
$('#activity_log_modal_body').load("<?php echo e(route("activity_log")); ?>?subject_id=" + subject_id + "&subject_type=" + subject_type);
});

</script>

<!--
<?php if(Session()->has('msg')): ?>
<script src="<?php echo e(url('')); ?>/assets/admin/js/notify.min.js"></script>
<script>
$.notify("<?php echo Session::get("msg"); ?>",
{ position:"bottom right",
  className: '<?php echo e(Session::get('alert')); ?>',
 }
);
</script>
<?php endif; ?>
-->


<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/layouts/default.blade.php ENDPATH**/ ?>
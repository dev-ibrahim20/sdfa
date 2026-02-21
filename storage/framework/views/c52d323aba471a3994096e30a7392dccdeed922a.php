
<div class="form-body">

<div class="row">



<div class="col-xl-12">
<div class="card-box">


<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.name')); ?> <span class="text-danger">*</span></label>
<?php echo Form::text('name', null , ['class' => 'form-control' , 'required'=>'required', 'placeholder'=> __('lang.name')] ); ?>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="projectinput1"><i class="fe-list"></i> <?php echo e(__('lang.sector')); ?> </label>

<?php echo Form::select('sector_id', $sectors , isset($data) ?$data->sector_id: null  ,['class' => 'form-control' ] ); ?>


</div>
</div>



<div class="col-md-12">
<div class="form-group mb-3">
<div class="form-actions">
<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> <?php echo e(__('lang.save')); ?>

</button>
</div>
</div>

</div>

</div>



</div>

</div>


<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/website_db52dcbb/resources/views/backend/pages/cities/form.blade.php ENDPATH**/ ?>
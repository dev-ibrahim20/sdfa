
<div class="form-body">


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> <?php echo e(__('lang.title')); ?> </label>
<?php echo Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('lang.title')] ); ?>

</div>
</div>
</div>



</div>






<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('lang.reports')); ?>    </h4>
<div class="row">

<table class="table table-striped table-responsive">
<tr>
<th>Section</th>
<th>List</th>
</tr>

<tr>
<td> التقارير </td>
<td> <input  name='permissions[]'  value='stock_transactions_report'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'stock_transactions_report')): ?> checked <?php endif; ?> > </td>
</tr>
</table>

</div>




<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('lang.settings')); ?>    </h4>
<div class="row">

<table class="table table-striped table-responsive">
<tr>
<th>Section</th>
<th>List</th>
<th>New</th>
<th>Update</th>
<th>Stages</th>
<th>Delete</th>
<th>Order</th>
<th>New Order</th>
<th>Auditing</th>

</tr>

























<tr>
    <td> <?php echo e(__('lang.cities')); ?> </td>
    <td> <input  name='permissions[]'  value='list_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_cities')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='create_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'create_cities')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='edit_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_cities')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='publish_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'publish_cities')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='delete_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'delete_cities')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='order_cities'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'order_cities')): ?> checked <?php endif; ?> ></td>
</tr>
<tr>
    <td> <?php echo e(__('lang.workplaces')); ?> </td>
    <td> <input  name='permissions[]'  value='list_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_workplaces')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='create_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'create_workplaces')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='edit_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_workplaces')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='publish_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'publish_workplaces')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='delete_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'delete_workplaces')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='order_workplaces'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'order_workplaces')): ?> checked <?php endif; ?> ></td>
</tr>
<tr>
    <td> <?php echo e(__('lang.samplings')); ?> </td>
    <td> <input  name='permissions[]'  value='list_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_samplings')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='create_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'create_samplings')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='edit_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_samplings')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='publish_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'publish_samplings')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='delete_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'delete_samplings')): ?> checked <?php endif; ?> > </td>
    <td> <input  name='permissions[]'  value='order_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'order_samplings')): ?> checked <?php endif; ?> ></td>
    <td> <input  name='permissions[]'  value='new_order_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'new_order_samplings')): ?> checked <?php endif; ?> ></td>
    <td> <input  name='permissions[]'  value='auditing_samplings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'auditing_samplings')): ?> checked <?php endif; ?> ></td>


</tr>
<tr>
<td> <?php echo e(__('lang.users')); ?> </td>
<td> <input  name='permissions[]'  value='list_users'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_users')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='create_users'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'create_users')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='edit_users'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_users')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='publish_users'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'publish_users')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='delete_users'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'delete_users')): ?> checked <?php endif; ?> > </td>
<td></td>
</tr>


<tr>
<td> <?php echo e(__('lang.roles')); ?>  </td>
<td> <input  name='permissions[]'  value='list_roles'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_roles')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='create_roles'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'create_roles')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='edit_roles'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_roles')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='publish_roles'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'publish_roles')): ?> checked <?php endif; ?> > </td>
<td> <input  name='permissions[]'  value='delete_roles'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'delete_roles')): ?> checked <?php endif; ?> > </td>
<td>  </td>
</tr>

 
<tr>
<td>  <?php echo e(__('lang.translate')); ?>  </td>
<td> <input  name='permissions[]'  value='list_translate'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_translate')): ?> checked <?php endif; ?> > </td>
<td></td>
<td> <input  name='permissions[]'  value='edit_translate'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_translate')): ?> checked <?php endif; ?> > </td>
<td> </td>
<td> </td>
<td> </td>
</tr>


<tr>
<td>  Clear Cash   </td>
<td> <input  name='permissions[]'  value='list_clear_cache'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_clear_cache')): ?> checked <?php endif; ?> > </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>


<tr>
<td>  General Settings  </td>
<td> <input  name='permissions[]'  value='list_general_settings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'list_general_settings')): ?> checked <?php endif; ?> > </td>
<td>  </td>
<td> <input  name='permissions[]'  value='edit_general_settings'  type="checkbox" <?php if( isset($data->id) && $data->permissions->contains('name' , 'edit_general_settings')): ?> checked <?php endif; ?> > </td>
<td>  </td>
<td>  </td>
<td> </td>
</tr>

</table>

</div>

<div class="form-actions">

<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> <?php echo e(__('lang.save')); ?>

</button>
</div>
<?php /**PATH /home2/wqbicmmy/adeco.com/adeco/public/test1/resources/views/backend/pages/roles/form.blade.php ENDPATH**/ ?>

<div class="form-body">


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="projectinput1"> {{__('lang.title')}} </label>
{!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('lang.title')] ) !!}
</div>
</div>
</div>



</div>



{{-- <h4 class="form-section"><i class="la la-commenting"></i>  {{__('lang.projects')}}    </h4>
<div class="row">

<table class="table table-striped table-responsive">
<tr>
<th>Project</th>
<th>List</th>
<th>New</th>
<th>Update</th>
<th>Stages</th>
<th>Delete</th>
</tr>

@foreach( $projects as $project )
<tr>
<td> {{ $project->title }} </td>
<td> <input  name='permissions[]'  value='list_project_{{ $project->id }}'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_project_'.$project->id)) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_project_{{ $project->id }}'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_project_'.$project->id)) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_project_{{ $project->id }}'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_project_'.$project->id)) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_project_{{ $project->id }}'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_project_'.$project->id)) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_project_{{ $project->id }}'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_project_'.$project->id)) checked @endif > </td>

</tr>
@endforeach


</table>

</div> --}}


<h4 class="form-section"><i class="la la-commenting"></i>  {{__('lang.reports')}}    </h4>
<div class="row">

<table class="table table-striped table-responsive">
<tr>
<th>Section</th>
<th>List</th>
</tr>

<tr>
<td> التقارير </td>
<td> <input  name='permissions[]'  value='stock_transactions_report'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'stock_transactions_report')) checked @endif > </td>
</tr>
<tr>
<td> احصائيات العينات </td>
<td> <input  name='permissions[]'  value='view_sampling_statistics'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'view_sampling_statistics')) checked @endif > </td>
</tr>
<tr>
     <td> تعديل تاريخ ووقت تقديم النموذج </td>
    <td> <input name='permissions[]' value='edit_sampling_datetime' type="checkbox" @if(isset($data->id) && $data->permissions->contains('name', 'edit_sampling_datetime')) checked @endif > </td>   
</tr>    
<tr>
     <td> حذف صنف من العينة </td>
    <td> <input name='permissions[]' value='delete_sampling_item' type="checkbox" @if(isset($data->id) && $data->permissions->contains('name', 'delete_sampling_item')) checked @endif > </td>   
</tr>
<tr>
     <td> تعديل تاريخ ووقت تسليم العينة </td>
    <td> <input name='permissions[]' value='edit_sample_delivery_datetime' type="checkbox" @if(isset($data->id) && $data->permissions->contains('name', 'edit_sample_delivery_datetime')) checked @endif > </td>   
</tr>    
</table>

</div>




<h4 class="form-section"><i class="la la-commenting"></i>  {{__('lang.settings')}}    </h4>
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


{{-- <tr>
<td> {{__('lang.projects')}} </td>
<td> <input  name='permissions[]'  value='list_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_projects')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_projects')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_projects')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_projects')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_projects')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_projects'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_projects')) checked @endif ></td>
</tr>
 --}}

{{-- <tr>
<td> {{__('lang.buildings')}} </td>
<td> <input  name='permissions[]'  value='list_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_tasks')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_tasks')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_tasks')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_tasks')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_tasks')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_tasks'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_tasks')) checked @endif ></td>
</tr> --}}


{{-- <tr>
<td> {{__('lang.warehouses')}} </td>
<td> <input  name='permissions[]'  value='list_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_warehouses')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_warehouses')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_warehouses')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_warehouses')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_warehouses')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_warehouses'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_warehouses')) checked @endif ></td>
</tr> --}}

{{-- <tr>
<td> {{__('lang.products')}} </td>
<td> <input  name='permissions[]'  value='list_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_products')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_products')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_products')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_products')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_products')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_products'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_products')) checked @endif ></td>
</tr> --}}


{{-- <tr>
<td> {{__('lang.vendors')}} </td>
<td> <input  name='permissions[]'  value='list_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_vendors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_vendors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_vendors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_vendors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_vendors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_vendors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_vendors')) checked @endif ></td>
</tr> --}}


{{-- <tr>
<td> {{__('lang.contractors')}} </td>
<td> <input  name='permissions[]'  value='list_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_contractors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_contractors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_contractors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_contractors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_contractors')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_contractors'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_contractors')) checked @endif ></td>
</tr> --}}


{{-- <tr>
<td> {{__('lang.categories')}} </td>
<td> <input  name='permissions[]'  value='list_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_categories')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_categories')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_categories')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_categories')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_categories')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_categories'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_categories')) checked @endif ></td>
</tr> --}}

{{-- <tr>
<td> {{__('lang.units')}} </td>
<td> <input  name='permissions[]'  value='list_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_units')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_units')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_units')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_units')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_units')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_units'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_units')) checked @endif ></td>
</tr> --}}


{{-- <tr>
<td> {{__('lang.project_stages')}} </td>
<td> <input  name='permissions[]'  value='list_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_project_stages')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_project_stages')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_project_stages')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_project_stages')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_project_stages')) checked @endif > </td>
<td> <input  name='permissions[]'  value='order_project_stages'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_project_stages')) checked @endif ></td>
</tr> --}}

<tr>
    <td> {{__('lang.cities')}} </td>
    <td> <input  name='permissions[]'  value='list_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_cities')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='create_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_cities')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='edit_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_cities')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='publish_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_cities')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='delete_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_cities')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='order_cities'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_cities')) checked @endif ></td>
</tr>
<tr>
    <td> {{__('lang.workplaces')}} </td>
    <td> <input  name='permissions[]'  value='list_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_workplaces')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='create_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_workplaces')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='edit_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_workplaces')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='publish_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_workplaces')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='delete_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_workplaces')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='order_workplaces'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_workplaces')) checked @endif ></td>
</tr>
<tr>
    <td> {{__('lang.samplings')}} </td>
    <td> <input  name='permissions[]'  value='list_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_samplings')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='create_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_samplings')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='edit_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_samplings')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='publish_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_samplings')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='delete_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_samplings')) checked @endif > </td>
    <td> <input  name='permissions[]'  value='order_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'order_samplings')) checked @endif ></td>
    <td> <input  name='permissions[]'  value='new_order_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'new_order_samplings')) checked @endif ></td>
    <td> <input  name='permissions[]'  value='auditing_samplings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'auditing_samplings')) checked @endif ></td>


</tr>
<tr>
<td> {{__('lang.users')}} </td>
<td> <input  name='permissions[]'  value='list_users'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_users')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_users'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_users')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_users'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_users')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_users'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_users')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_users'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_users')) checked @endif > </td>
<td></td>
</tr>


<tr>
<td> {{__('lang.roles')}}  </td>
<td> <input  name='permissions[]'  value='list_roles'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_roles')) checked @endif > </td>
<td> <input  name='permissions[]'  value='create_roles'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'create_roles')) checked @endif > </td>
<td> <input  name='permissions[]'  value='edit_roles'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_roles')) checked @endif > </td>
<td> <input  name='permissions[]'  value='publish_roles'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'publish_roles')) checked @endif > </td>
<td> <input  name='permissions[]'  value='delete_roles'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'delete_roles')) checked @endif > </td>
<td>  </td>
</tr>

 
<tr>
<td>  {{__('lang.translate')}}  </td>
<td> <input  name='permissions[]'  value='list_translate'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_translate')) checked @endif > </td>
<td></td>
<td> <input  name='permissions[]'  value='edit_translate'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_translate')) checked @endif > </td>
<td> </td>
<td> </td>
<td> </td>
</tr>


<tr>
<td>  Clear Cash   </td>
<td> <input  name='permissions[]'  value='list_clear_cache'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_clear_cache')) checked @endif > </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>


<tr>
<td>  General Settings  </td>
<td> <input  name='permissions[]'  value='list_general_settings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'list_general_settings')) checked @endif > </td>
<td>  </td>
<td> <input  name='permissions[]'  value='edit_general_settings'  type="checkbox" @if ( isset($data->id) && $data->permissions->contains('name' , 'edit_general_settings')) checked @endif > </td>
<td>  </td>
<td>  </td>
<td> </td>
</tr>

</table>

</div>

<div class="form-actions">

<button type="submit" class="btn btn-primary">
<i class="la la-check-square-o"></i> {{ __('lang.save')}}
</button>
</div>
